<?php
/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 29/09/2018
 * Time: 11:10 AM
 */

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!isset($this->session->user_id)){
			redirect(base_url(), 'refresh');
		}
	}

	public function index(){
		$this->Users->roles();
		$persons = $this->Persons->getPerson();
		$dataStudens = 	$this->Persons->getDataStudent();
		$getStudetsCreditNumber = $this->Persons->getStudetsCreditNumber();
		$coutLost = $this->Matters->getMatterCount(2);
		$coutWon = $this->Matters->getMatterCount(1);
		$missingMatter = $this->Matters->getMissingMatterCount();

		if(isset($dataStudens->currentPensum_id)){
			$this->session->currentPensum_id = $dataStudens->currentPensum_id;
		}
		$dpto = $this->Careers->getCareer();
		$this->view("layout.appDashboard",[
			'title' => $this->config->item('title'),
			'favicon' => $this->config->item('favicon'),
			'bootstrap' => $this->config->item('bootstrap'),
			'description' => $this->config->item('description'),
			"urlAjax" => base_url(Proyect::class."/"),
			'token' => $this->config->item("token"),
			"user_id" => isset($this->session->user_id) ? $this->session->user_id : null,
			"emailName" => isset($this->session->email) ? explode("@", $this->session->email)[0] : null,
			"email" => isset($this->session->email) ? $this->session->email : null,
			"img" => isset($persons->img) ? $persons->img : $this->config->item("favicon"),
			"role_name" => isset($this->session->role_name) ? $this->session->role_name : null,
			"role_id" => isset($this->session->roles_id) ? $this->session->roles_id : null,
			"name" =>  isset($persons) ?
				ucwords($persons->first_name)." ".ucwords($persons->second_name)." ".ucwords($persons->first_surname)." ".ucwords($persons->second_surname) :  null,
			"credit_numbers" => isset($dataStudens->credit_numbers) ? $dataStudens->credit_numbers : null,
			"studets_credit_numbers" => isset($getStudetsCreditNumber) ? $getStudetsCreditNumber : null,
			"matterLost" => isset($coutLost) ? $coutLost : null,
			"matterWon" => isset($coutWon) ? $coutWon : null,
			"missingMatter" => isset($missingMatter) ? $missingMatter : null,
			"persons" => isset($persons) ? $persons : null,
			"jefeDpto" => isset($dpto->nameP) ? $dpto->nameP : null,
			"career" => isset($dpto->nameC) ? $dpto->nameC : null,
			"menu" => empty(!$this->Menu_Sections->getMenu()) ? $this->Menu_Sections->getMenu() : null,
			"section" => empty(!$this->Menu_Sections->getSection()) ? $this->Menu_Sections->getSection() : null,
		]);
	}

	/**
	 * @return mixed|void
	 */
	public function destroy_session(){
		$this->destroy();
	}

	public function getPerson(){
		$dataStudens = 	$this->Persons->getDataStudent();
		$dat = (($this->Persons->getStudetsCreditNumber()/$dataStudens->credit_numbers)*100);
		echo $dat;
	}


	public function getDataPondered(){
		$this->response($this->Matters->getDatachartPondered());
	}

	public function test(){
		var_dump($this->Users->test());
	}

	public function getCesh()
	{
		$this->response($this->Matters->getCesh($this->getInputJson()["tipo"]));
	}

	public function getMatter(){
		$this->response($this->Matters->getMatter());
	}

	public function getFullMetter(){
		$this->response($this->Matters->getFullMetter());
	}

	public function savePerson(){

		$person = [
			"first_name" => $this->getInputJson()["first_name"],
			"second_name" =>  $this->getInputJson()["second_name"],
			"first_surname" =>  $this->getInputJson()["first_surname"],
			"second_surname" =>  $this->getInputJson()["second_surname"],
			"img" =>  isset($this->getInputJson()["img"]) ? $this->getInputJson()["img"] : $this->config->item("favicon")
		];
		if(isset($this->getInputJson()["password1"]) && isset($this->getInputJson()["password2"])){
			if(($this->getInputJson()["password1"] == $this->getInputJson()["password2"])){
				$password = ["password"=>$this->Users->encrypt($this->getInputJson()["password1"])];
				$this->Persons->update("users",$password,array("user_id"=>$this->session->user_id));
			}
		}
		$this->response($this->Persons->update("persons",$person,array("user_id"=>$this->session->user_id)));
	}



}
