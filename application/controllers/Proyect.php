<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyect extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('unit_test');

	}

	public function index()
	{

		$this->view('layout.appIndex',[
			'title' => $this->config->item('title'),
			'favicon' => $this->config->item('favicon'),
			'bootstrap' => $this->config->item('bootstrap'),
			'description' => $this->config->item('description'),
			"urlAjax" => 'Proyect/',
			'token' => $this->config->item("token"),
			'get_you_accout' => $this->lang->line('get_you_accout'),
			"user_id" => isset($this->session->user_id) ? $this->session->user_id : null,
			"email" => isset($this->session->email) ? explode("@", $this->session->email)[0] : null,
			"menu" => empty(!$this->Menu_Sections->getMenu()) ? $this->Menu_Sections->getMenu() : null,
			"role_id" => isset($this->session->roles_id) ? $this->session->roles_id : null,
		]);
	}

	public function login(){
		$data = $this->getInputJson();
		if(isset($data)){
			$data = $this->Validate->validateLogin($data);
			$data = $this->menssage($data,$data["status"]);
			$this->response($data,$data["status"]);
		}
	}

	public function recoveryPassword(){
		$data = $this->getInputJson();
		if(isset($data)){
			$data = $this->Validate->validateRecovery($data);
			$data = $this->menssage($data,$data["status"]);
			$this->response($data,$data["status"]);
		}
	}

	public function getRecoveryMail($token,$email){
		if($this->Users->isMail($email) && is_numeric($token)){
			if($this->Users->isTokent($email,$token)){
				redirect(base_url("?status=ok"), 'refresh');
			}else{
				redirect(base_url("?status=fail"), 'refresh');
			}
		}
	}

	public function admin_ajax(){
		$this->response(0);
	}

	public function destroy_session(){
		$this->destroy();
	}


	public function test(){
		var_dump($this->Menu->getMenu());
	}
}


