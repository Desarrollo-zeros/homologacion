<?php
/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 28/09/2018
 * Time: 1:23 PM
 */

class Validate extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function emptyArray($array = []){
		foreach ($array as $key => $value){
			if($value == null || $value == "" || !isset($value)){
				return $key;
			}
		}
	}


	public function validateLogin($data = []){
		$status = $this->emptyArray($data);
		if(isset($status)){
			return  array("error"=> ($status == 'username') ?
					$this->lang->line('username_empty'):
					$this->lang->line('password_empty'),"status"=>false);
		}
		if(!$this->validateUsername($data["username"])){
			return array("error"=> $this->lang->line('error_mail_username'),"status"=>false);
		}

		if($this->Users->getUser($data["username"],$data["password"])){
			return array(
				"user" =>  [
					"user_id"=>$this->session->user_id,
					"url" => $this->config->item('dashboard')
				],
				"success"=>$this->lang->line('success_login'),"status"=>true);
		}else{
			return array("error" => $this->lang->line('error_users_invalido'),"status"=>false);
		}
	}

	public function validateUsername($username){
		if(!$this->Users->isMail($username,1) || !is_numeric($username) && strlen($username) != 8 || strlen($username) != 10){
			return true;
		}
	}

	public function validateRecovery($username){
		if(!$this->validateUsername($username)){
			 return array("error"=> $this->lang->line('error_mail_username'),"status"=>false);
		}
		if(!$this->Users->recoveryPassword($username)){
			return array("error" => $this->lang->line('error_mail_username_send'),"status"=>false);
		}else{
			return array("success" => $this->lang->line('menssage_recovery_true'),"status"=>true);
		}
	}

	public function sendMail($mail,$subject,$data){
		$this->load->library('email');
		$dataEmail = $this->config->item("email");
		$this->email->initialize($dataEmail);
		$mail = strtolower($mail);
		$this->email->from($dataEmail["smtp_user"]);
		$this->email->to($mail);
		$this->email->subject($subject);
		$this->email->message($data);
		return $this->email->send() ? true : false;
	}

	public function unique_multidim_array_obj($array, $key) {
		$temp_array = array();
		$i = 0;
		$key_array = array();

		foreach($array as $val) {
			if (!in_array($val->{$key}, $key_array)) {
				$key_array[$i] = $val->{$key};
				$temp_array[$i] = $val;
			}
			$i++;
		}
		return $temp_array;
	}

	public function is_in_array($array = array(),$key,$value,$tipo){
		$within_array = false;

		if($tipo == 1){
			foreach($array as $row){
				if($row->{$key} == $value){
					return true;
				}
			}
		}
		else{
			foreach($array as $row){
				if($row[$key] == $value){
					return true;
				}
			}
		}
		return $within_array;
	}

	public function getDataMatters($wonMatters = [], $lostMaters = [],$homolo = [],$case = 1){
		$data = [];
		if($case == 1){
			foreach ($lostMaters as $row){
				if(!$this->is_in_array($wonMatters,"code",$row->code,1)){
					array_push($data,array("code"=>$row->code,"note"=>$row->note));
				}
			}
			return $data;
		}else{
			$data["lost"] = [];
			$data["winner"] = [];
			$data["homolo"] = $homolo;
			foreach ($lostMaters as $row){
				if(!$this->is_in_array($wonMatters,"code",$row->code,1)){
					array_push($data["lost"],array("code"=>$row->code,"note"=>$row->note,"name"=>$row->name));
				}
			}
			foreach ($wonMatters as $row){
				array_push($data["winner"],array("code"=>$row->code,"note"=>$row->note,"name"=>$row->name));
			}


			return $data;
		}
	}

	public function validatePersons($data = [])
	{
		$v = [];
		if( strlen($data["first_name"]) < 4){
			array_push($v,["first_name"=>"length no valido","data"=>$data["first_name"]]);
		}
		if(is_numeric($data["first_name"])){
			array_push($v,["first_name"=>"is_numeric","data"=>$data["first_name"]]);
		}
		if(ctype_alnum($data["first_name"])){
			array_push($v,["first_name"=>"is_aphaNumeric","data"=>$data["first_name"]]);
		}

		if( strlen($data["second_surname"]) < 4){
			array_push($v,["second_surname"=>"length no valido","data"=>$data["second_surname"]]);
		}
		if(is_numeric($data["second_surname"])){
			array_push($v,["second_surname"=>"is_numeric","data"=>$data["second_surname"]]);
		}
		if(ctype_alnum($data["second_surname"])){
			array_push($v,["second_surname"=>"is_aphaNumeric","data"=>$data["second_surname"]]);
		}

		if( strlen($data["second_surname"]) < 4){
			array_push($v,["second_surname"=>"length no valido","data"=>$data["second_surname"]]);
		}
		if(is_numeric($data["second_surname"])){
			array_push($v,["second_surname"=>"is_numeric","data"=>$data["second_surname"]]);
		}
		if(ctype_alnum($data["second_surname"])){
			array_push($v,["second_surname"=>"is_aphaNumeric","data"=>$data["second_surname"]]);
		}

		if(ctype_alnum($data["second_name"])){
			array_push($v,["first_name3"=>"is_aphaNumeric","data"=>$data["second_name"]]);
		}
		if(is_numeric($data["second_name"])){
			array_push($v,["second_name"=>"is_numeric","data"=>$data["second_name"]]);
		}

		if(strlen($data["img"]) < 4){
			array_push($v,["img"=>"is_NoImg","data"=>$data["img"]]);
		}
		return $v;
	}

}
