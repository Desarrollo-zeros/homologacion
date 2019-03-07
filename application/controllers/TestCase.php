<?php
/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 1/10/2018
 * Time: 9:18 AM
 */

class TestCase extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('unit_test');
	}


	public function index(){
		echo "<br>--------------- LOGIN ---------------<br>";
		$this->login(); //test login
		echo "<br>--------------- Recuperar Contraseña ---------------<br>";
		$this->recoveryPassword();
		echo "<br>--------------- Guardar Datos Personales ---------------<br>";
		$this->savePersons();
		//error tamaño
	}
	public function login(){
		$data["fail_empty"] = ["username"=>"","password"=>""]; //fail not empty
		$data["fail1_username"] = ["username"=>"dsadas","password"=>"123213"]; //username no string (email/document)
		$data["warning_exits1"] = ["username" => "1234567891","password"=>"1234567891"]; //not foud user
		$data["warning_exits2"] = ["username" => "ejemplo@ejmplo.com","password"=>"1234567891"]; //not foud user
		$data["success_email"] = ["username"=>"candrescastilla@unicesar.edu.co","password"=>"1063969856"];
		$data["success_document"] = ["username"=>"1063969856","password"=>"1063969856"];

		$test = $data["fail_empty"];
		echo $this->unit->run((($this->Validate->validateLogin($test)["status"]) == false),'is_bool',$this->Validate->validateLogin($test)["error"],json_encode($test));
		$test = $data["fail1_username"];
		echo $this->unit->run((($this->Validate->validateLogin($test)["status"]) == false),'is_bool',$this->Validate->validateLogin($test)["error"],json_encode($test));
		$test = $data["warning_exits1"];
		echo $this->unit->run((($this->Validate->validateLogin($test)["status"]) == false),'is_bool',$this->Validate->validateLogin($test)["error"],json_encode($test));
		$test = $data["warning_exits2"];
		echo $this->unit->run((($this->Validate->validateLogin($test)["status"]) == false),'is_bool',$this->Validate->validateLogin($test)["error"],json_encode($test));
		$test = $data["success_email"];
		//echo $this->unit->run((($this->Validate->validateLogin($test)["status"]) == true),'is_bool',$this->Validate->validateLogin($test)["success"],json_encode($test));
		//$test = $data["success_document"];
		//echo $this->unit->run((($this->Validate->validateLogin($test)["status"]) == true),'is_bool',$this->Validate->validateLogin($test)["success"],json_encode($test));
	}

	public function recoveryPassword()
	{
		echo $this->unit->run($this->Validate->validateUsername("12345") == true,"is_bool","Tamaño invalido","12345");
		echo $this->unit->run($this->Validate->validateUsername("1234567891") == true,"is_bool","Usuario no existe","1234567891");
		echo $this->unit->run($this->Validate->validateUsername("1063969856") == false,"is_bool","Correcto","1063969856");
		echo $this->unit->run($this->Validate->validateUsername("candrescastilla@unicesar.edu.co") == false,"is_bool","Correcto","candrescastilla@unicesar.edu.co");
		echo $this->unit->run($this->Validate->validateUsername("candrescastilla@unicesar") == true,"is_bool","Usuario no existe","candrescastilla@unicesar");
	}


	public function savePersons(){
		$person = [
			"first_name" => "",
			"second_name" =>  "",
			"first_surname" =>  "",
			"second_surname" =>  "",
			"img" => ""
		];
		$tam = ($this->Validate->validatePersons($person));
		echo $this->unit->run($tam,"is_array","Datos Vacios",json_encode($tam));

		$person = [
			"first_name" => "carlos",
			"second_name" =>  "asd123",
			"first_surname" =>  "andres",
			"second_surname" =>  "1234",
			"img" => $this->config->item("favicon")
		];
		$tam = ($this->Validate->validatePersons($person));
		echo $this->unit->run($tam,"is_array","Datos Erroneos",json_encode($tam));
		$person = [
			"first_name" => "carlos",
			"second_name" =>  "Andres",
			"first_surname" =>  "Castilla",
			"second_surname" =>  "Garcia",
			"img" => $this->config->item("favicon")
		];
		$tam = ($this->Validate->validatePersons($person));
		echo $this->unit->run($tam,"is_array","Datos Correctos",json_encode($tam));
	}
	
	public function test($password){
		echo $this->Users->encrypt($password);
	}


}
