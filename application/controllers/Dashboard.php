<?php
/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 29/09/2018
 * Time: 11:10 AM
 */

use GuzzleHttp\Psr7\Request;
class Dashboard extends CI_Controller
{
	public  $client = null;
	public function __construct()
	{
		parent::__construct();
		if(!isset($this->session->user_id)){
			redirect(base_url(), 'refresh');
		}
		$this->client = new GuzzleHttp\Client();
	}

	public function index($tipo = "/"){

		$this->Users->roles();
		$persons = $this->Persons->getPerson();
		$dataStudens = 	$this->Persons->getDataStudent();
		$getStudetsCreditNumber = $this->Persons->getStudetsCreditNumber();
		$coutLost = $this->Matters->getMatterCount(2);
		$coutWon = $this->Matters->getMatterCount(1);
		$missingMatter = $this->Matters->getMissingMatterCount();
		$this->session->person_id = $persons->person_id;
		if(isset($dataStudens->currentPensum_id)){
			$this->session->currentPensum_id = $dataStudens->currentPensum_id;
		}
		$dpto = $this->Careers->getCareer();

		switch ($this->session->roles_id){
			case 1:{
				return $this->view("layout.appDashboard",[
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
			case 2:{
				return $this->view("layout.appDashboard",[]);
			}
			case 3:{
				return $this->view("layout.appDashboard",[
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
					"jefePensum" => $this->Persons->getJefePensum()
				]);
			}
			case 4:{
				return $this->view("layout.appDashboard",[]);
			}
			case 5:{

				$this->load->database();
				return $this->view("layout.appDashboard",[
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
					"menu" => empty(!$this->Menu_Sections->getMenu()) ? $this->Menu_Sections->getMenu() : null,
					"section" => empty(!$this->Menu_Sections->getSection()) ? $this->Menu_Sections->getSection() : null,
					"jefeDpto" => isset($dpto->nameP) ? $dpto->nameP : null,
					"career" => isset($dpto->nameC) ? $dpto->nameC : null,
					"persons" => isset($persons) ? $persons : null,
					"countFaculties" => (int)$this->Faculties->getCount(),
					"countMatters" => (int)$this->Matters->getCount(),
					"countPensums" => (int)$this->Pensums->getCount(),
					"countUsers" => (int)$this->Users->getCount(),
					"roles" => $this->Users->getRoles(),
					"users" => $this->Users->get("users","","roles_id > 1"),
					"configEmail" => $this->config->item("email"),
					"db" => $this->db,
					"sectionAll" => $this->Menu_Sections->getSectionAll(),
					"facultad" => $this->Faculties->getFaculties(),
					"carreras" => $this->Careers->get(),
					"jefes" => $this->Users->getJefe(),
					"pensum" => $this->Pensums->getAll()
				]);
			}
		}
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
		return  $this->response($this->Matters->getDatachartPondered());
	}

	public function getCesh()
	{
		return $this->response($this->Matters->getCesh($this->getInputJson()["tipo"]));
	}

	public function getMatter(){
		return  $this->response($this->Matters->getMatter());
	}

	public function getFullMetter(){
		if($this->session->roles_id == 3){
			return  $this->response($this->Matters->getFullMetter($this->getInputJson()["new_pensum_id"],$this->getInputJson()["person_id"]));
		}else{
			return  $this->response($this->Matters->getFullMetter());
		}

	}

	public function savePerson(){

		$person = [
			"first_name" => $this->getInputJson()["first_name"],
			"second_name" =>  $this->getInputJson()["second_name"],
			"first_surname" =>  $this->getInputJson()["first_surname"],
			"second_surname" =>  $this->getInputJson()["second_surname"],
			"img" => $this->getInputJson()["img"]
		];

		if(isset($this->getInputJson()["password1"]) && isset($this->getInputJson()["password2"])){
			if(($this->getInputJson()["password1"] == $this->getInputJson()["password2"])){
				$password = ["password"=>$this->Users->encrypt($this->getInputJson()["password1"])];
				$this->Persons->update("users",$password,array("user_id"=>$this->session->user_id));
			}
		}
		$this->response($this->Persons->update("persons",$person,array("user_id"=>$this->session->user_id)));
	}


	public function gestionAdministrador($tipo = 0){
		if($this->session->roles_id == 5){
			$data = $this->getPost();
			switch ($tipo){
				//usuario 1,2,3,4
				case 1:{
					return  $this->response($this->Users->get("users","","roles_id > 1"));
				}
				case 2:{
					$data["password"] = $this->Users->encrypt($data["password"]);

					$validate = $this->Users->validate($data);
					return is_array($validate)
						? $this->response($validate,false)
						: $this->response(true);
				}
				case 3:{
					$data = $this->getPost();
					if(!strlen($data["password"]) < 15){
						$this->Users->encrypt($data["password"]);
					}
					return $this->response($this->Users->update( [ "user_id"=>$data["user_id"] ], $data ));
				}
				case 4: {
					return $this->response($this->Users->update(["user_id"=>$this->input->post("user_id")],["status"=>0]));
				}
				//admin
				case 5:{

					$db = fopen("application/config/proyect.php", "w");
					$raw = $this->Validate->updateConfig();
					fwrite($db, trim($raw));
					return $this->response(fclose($db));
				}
				case 6:{
					$db = fopen("application/config/database.php", "w");
					$raw = $this->Validate->updateConfigDB();
					fwrite($db, trim($raw));
					return $this->response(fclose($db));
				}
				case 7:{
					return $this->response($this->Menu_Sections->getSectionAll());
				}
				case 8:{
					return $this->response($this->Faculties->getFaculties());
				}
				case 9:{
					$validate = $this->Faculties->validate($_POST);
					return is_array($validate)
						? $this->response($validate,false)
						: $this->response(true);
				}
				case 10:{
					return $this->response($this->Faculties->update(["faculty_id"=>$this->input->post("faculty_id")],$_POST));
				}
				case 11:{
					return $this->response($this->Careers->getAll());
				}
				case 12:{
					$validate = $this->Careers->validate($_POST);
					return is_array($validate)
						? $this->response($validate,false)
						: $this->response(true);
				}
				case 13:{
					return $this->response($this->Careers->update(["career_id"=>$this->input->post("career_id")],$_POST));
				}
				case 14:{
					return $this->response($this->Pensums->getAll());
				}
				case 15:{
					$validate = $this->Pensums->validate($_POST);
					return is_array($validate)
						? $this->response($validate,false)
						: $this->response(true);
				}
				case 16:{
					return $this->response($this->Pensums->update(["pensum_id"=>$this->input->post("pensum_id")],$_POST));
				}
				case 17:{
					return $this->response($this->Persons->getJefes());
				}
				case 18:{
					return $this->response($this->Persons->removeJefes($this->input->post("teacher_id")));
				}
				case 19:{
					$validate = $this->Persons->validate($_POST);
					return is_array($validate)
						? $this->response($validate,false)
						: $this->response(true);
				}
			}
		}
		return $this->response(true);
	}


	function gestionBoss($tipo = 0){
		return $this->response($this->Matters->getCharData($tipo,$this->input->post("pensum_id")));
	}


	public function searchCodePensum(){
		return $this->response($this->Pensums->getCode($this->input->post("code")));
	}


	public function gestionStudens($tipo = ""){
		switch ($tipo){
			case 1:{
				if($this->session->roles_id == 1){
					$data = [
						"student_id" => $this->Persons->getidStudent($this->session->person_id,$this->session->currentPensum_id),
						"teacher_id" => $this->Persons->getJefe($this->session->currentPensum_id),
						"current_pensum_id" => $this->session->currentPensum_id,
						"new_pensum_id" => $this->Persons->getNewPensum_id(),
						"status" => 1
					];
					return $this->response($this->Persons->requestChange($data));
				}else{
					$data = [
						"student_id" => $this->input->post("student_id"),
						"teacher_id" => $this->Persons->getJefe($this->input->post("current_pensum_id")),
						"current_pensum_id" =>$this->input->post("current_pensum_id"),
						"new_pensum_id" => $this->input->post("new_pensum_id"),
						"status" => $this->input->post("status")
					];
					return $this->response($this->Persons->requestChange($data));
				}
			}
			case 3:{
				$data = $this->Persons->getPerson($this->input->post("document"));
				if(!isset($data)){
					return $this->response(false);
				}
				$current_pensum_id = $data->pensum_id;
				$person_id = $data->person_id;
				$code_current_pensum = $data->code;
				$new_pensum_id = $this->Persons->getNewPensum_id($current_pensum_id);
				$code_new_pensum = $new_pensum_id->code;
				$new_pensum_id  = $new_pensum_id->newPensum_id;
				$data = ["student_id"=>$data->student_id,"code_current_pensum" => $code_current_pensum,"code_new_pensum" => $code_new_pensum,"current_pensum_id"=>$current_pensum_id, "new_pensum_id" => $new_pensum_id,"person_id" => $person_id];
				return $this->response($data);
			}
			case 4:{
				return $this->response($this->Persons->studentsHomologacion());
			}
			case 5:{
				$this->Persons->changeStatus($this->input->post("pensum_id"),$this->input->post("student_id"));
				return $this->response($this->Persons->update("change_request",["status"=>1],["change_request_id"=>$this->input->post("change_request_id")]));
			}
			case 6:{
				$this->Persons->changeStatus($this->input->post("pensum_id"),$this->input->post("student_id"));
				return $this->response($this->Persons->delete("change_request",["change_request_id"=>$this->input->post("change_request_id")]));
			}
		}
	}



	public function apiMatters(){
		if($this->session->roles_id == 5){
			$data = $this->client->get("http://academusoft.com:8000/apiMaterias")->getBody()->getContents();
			$data = json_decode($data,true);

			$dataMateria = [];

			foreach ($data as $row){
				array_push($dataMateria,[
					"matter_id" =>$row["idMateria"],
					"code" => $row["codigo"],
					"name" => $row["nombre"],
					"credit_numbers" => $row["creditos"],
					"requirements_credit" => $row["creditosRequisitos"],
					"semester" => $row["semestre"],
					"pensum_id" => $row["idPensum"]
				]);
			}
			$this->db->query("SET FOREIGN_KEY_CHECKS = 0");
			$this->db->empty_table("matters");
			$this->db->insert_batch('matters', $dataMateria);
			$this->db->query("SET FOREIGN_KEY_CHECKS = 1");
			return $this->response(count($dataMateria));
		}
	}

	public function apiUsers(){
		if($this->session->roles_id == 5){
			$data = $this->client->get("http://academusoft.com:8000/apiUsuarios")->getBody()->getContents();
			$data = json_decode($data,true);
			$dataUsers = [];
			$dataPersons = [];
			$dataStudents = [];
			$dataNotes = [];
			foreach ($data as $json){
				foreach ($json as $row){
					$users = [
						"user_id" => $row["0"]["idUsuario"],
						"username" => $row["0"]["cedula"],
						"password" => $this->Users->encrypt($row["0"]["cedula"]),
						"email" => "",
						"roles_id" => 1
					];
					$persons = [
						"person_id" => $row["0"]["idUsuario"],
						"document" => $row["0"]["cedula"],
						"first_name" => $row["0"]["primerNombre"],
						"second_name" => $row["0"]["segundoNombre"],
						"first_surname" => $row["0"]["primerApellido"],
						"second_surname" => $row["0"]["segundoApellido"],
						"user_id" => $row["0"]["idUsuario"]
					];

					$students = [
						"student_id" => $row["0"]["idUsuario"],
						"semester" => $row["0"]["semestre"],
						"pondered" => $row["0"]["ponderado"],
						"pensum_id" => $row["0"]["idPensum"],
						"person_id" => $row["0"]["idUsuario"]
					];

					array_push($dataUsers,$users);
					array_push($dataPersons,$persons);
					array_push($dataStudents,$students);
					array_push($dataNotes,$row["notas"]);
				}
			}
			$this->db->empty_table("notes");
			$this->db->empty_table("students");
			$this->db->empty_table("teachers");
			$this->db->empty_table("persons");
			$this->db->empty_table("users");
			$this->db->query("ALTER TABLE users AUTO_INCREMENT = 1");
			$this->db->query("ALTER TABLE persons AUTO_INCREMENT = 1");
			$this->db->query("ALTER TABLE students AUTO_INCREMENT = 1");
			$this->db->query("ALTER TABLE notes AUTO_INCREMENT = 1");

			$this->db->insert("users",[
				"user_id" => 1,
				"username" => "1234567890",
				"password" => $this->Users->encrypt("4015594wae"),
				"email" => "wowzeros2@gmail.com",
				"roles_id" => 5
			]);
			$this->db->insert("persons",[
				"document" => "1234567890",
				"user_id" => $this->db->insert_id()
			]);
			$this->db->insert_batch('users', $dataUsers);
			$this->db->insert_batch('persons', $dataPersons);
			$this->db->insert_batch('students',$dataStudents);
			$count = 1;
			foreach ($dataNotes as $row){
				$this->db->insert_batch('notes',$row);
				$count += count($row);
			}
			$this->db->query("SET FOREIGN_KEY_CHECKS = 1");
			return $this->response(["users"=>count($dataUsers),"notes"=>$count]);
		}
	}
}
