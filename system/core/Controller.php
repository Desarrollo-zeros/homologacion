<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2018, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2018, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/general/controllers.html
 */
use Coolpraz\PhpBlade\PhpBlade;
class CI_Controller
{

	/**
	 * Reference to the CI singleton
	 *
	 * @var    object
	 */
	private static $instance;

	/**
	 * Class constructor
	 *
	 * @return    void
	 */
	protected $blade;

	public function __construct()
	{
		self::$instance =& $this;

		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class) {
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');
		$this->load->initialize();


		$this->blade = new PhpBlade(VIEWPATH, APPPATH . '/cache');
		$this->blade->view()->composer("*", function ($view) {
			$view->with("session", $this->session);
			$view->with("uri", $this->uri);
		});

		log_message('info', 'Controller Class Initialized');
	}

	// --------------------------------------------------------------------

	/**
	 * Get the CI singleton
	 *
	 * @static
	 * @return    object
	 */
	public static function &get_instance()
	{
		return self::$instance;
	}

	/**
	 * @vieBlade extends PhpBlade
	 * @function
	 * @return templante
	*/
	protected function view($name, $body = [])
	{
		echo isset($body) == true ?
			$this->blade->view()->make("$name", $body)->render() :
			$this->blade->view()->make("{$name}")->render();
	}

	//return get Header
	protected function getHeaderData(){
		//$headers = getallheaders();
		$headers = $this->input->request_headers();
		if(isset($headers["X-Auth-Token"])){
			if(strtoupper($headers["X-Auth-Token"]) == strtoupper($this->config->item("token"))){
				return $headers["data"];
			}else{
				$this->response(array("error"=>$this->lang->line('token_error')),false);
				return false;
			}
		}else{
			$this->response(array("error"=>$this->lang->line('token_error')),false);
			return false;
		}
	}

	//return get JSON to Array Object
	protected function getInputJson(){
		$content = $this->input->raw_input_stream;
		//trim(file_get_contents("php://input"));}
		$data = json_decode($content,true);
		return $data;
	}

	protected function getPost(){
		return $_POST;
	}

	//send data to API

	protected function menssage($data = [],$status = true){
		switch ($status){
			case true:
				if(isset($data["success"])){
					$data["success"]= "<p style='color: green;'>{$data["success"]}</p>";
				}
				break;
			case false:
				if(isset($data["error"])){
					$data["error"] = "<p style='color: red;'>{$data["error"]}</p>";
				}
				break;
		}
		return $data;
	}

	protected function response($data = array(), $status = true,$type = "application/json"){
		return $this->output
			->set_content_type($type)
			->set_status_header((!$status) ? 404 : 200)
			->set_output(json_encode(["data"=>$data, "status" => $status]));
	}



	protected function destroy(){
		session_reset();
		session_destroy();
		$this->session = [];
		unset($this->session);
		redirect(base_url(), 'refresh');
	}
}
