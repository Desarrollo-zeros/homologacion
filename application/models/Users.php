<?php
/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 24/09/2018
 * Time: 10:59 PM
 */

class Users extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function getUser($username,$password){
		$result = false;
		$query = $this->db->query($this->isMail($username), array($username, $this->encrypt($password)));
		if($query->num_rows() > 0) {
			$this->session->user_id = $query->row("user_id");
			$this->session->email =  $query->row("email");
			$result = true;
		}
		return $result;
	}

	public function roles(){
		$query= $this->db->query($this->config->item("getRolesUsers"),array($this->session->user_id));
		$this->session->role_name = $query->row("name");
		$this->session->roles_id = $query->row("roles_id");
	}

	public function test(){
		return $this->db->query($this->config->item("getUserEmail"), array("candrescastilla@unicesar.edu.co", $this->encrypt("1063969856")))->result();
	}

	public function register(){
		$fecha = new DateTime();
		$fecha = date('Y-m-d H:i:s',$fecha->getTimestamp());
		$this->db->insert('Users', ["username" => "1063969856",
			"password" => $this->users->encrypt("1063969856","1063969856"),
			"email" => "candrescastilla@unicesar.edu.co",
			"status" => 1,
			"roles_id" => 5,
			"created_at" => $fecha]
		);
	}

	public function requestAccount($data = []){

	}


	public function recoveryPassword($username){
		$query = $this->db->query($this->config->item("getEmail"), array($username,$username));
		if($query->num_rows()>0){
			$token = bin2hex(random_bytes(8));
			$token1 = bin2hex($token);
			$email = $query->row("email");
			$token = base_url("Proyect/getRecoveryMail/$token1/$email");
			$subject = 'Su enlace de restablecimiento de contraseña';
			$message = '<p>Recibimos una solicitud de restablecimiento de contraseña. El enlace para restablecer su contraseña está debajo. ';
			$message .= 'Si no hizo esta solicitud, puede ignorar este correo electrónico</p>';
			$message .= '<p>Aquí está su enlace de restablecimiento de contraseña:</br>';
			$message .= sprintf('<a href="%s">%s</a></p>',$token, "Enlace de recuperacion");
			$message .= '<p>Gracias!</p>';
			if($this->Validate->sendMail($query->row("email"),$subject,$message)){
				if($this->db->update("users",array("remember_token"=>$token1), array("email"=>$query->row("email")))){
					return true; //bien
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function isTokent($email,$token){
		$query = $this->db->query($this->config->item("getToken"),array($email,$token));
		if($query->num_rows()>0){
			$password = $this->encrypt($query->row("username"));
			$subject = 'Contraseña restablecida';
			$message = "<p>Su nueva contraseña es: {$query->row("username")} te recomendamos que la cambien por motivo de seguridad</p>";
			if($this->Validate->sendMail($email,$subject,$message)){
				if($this->db->update("users",array("password"=> $password,"remember_token"=>""),array("email"=>$email))){
					return true; //bien
				}
			}
		}else{
			return false;
		}

	}

	public function encrypt($password)
	{
		return bin2hex(strrev(hex2bin(strtoupper(hash("sha256",strtoupper(hash("sha256", strtoupper($password)).":".strtoupper($password)))))));
	}

	public function isMail($username,$condiction = 0){
		$result = null;
		switch ($condiction){
			case 0:{
				$result = (filter_var($username, FILTER_VALIDATE_EMAIL)) ?
					$this->config->item("getUserEmail") :
					$this->config->item("getUserCedula");
				break;
			}
			default: $result = (filter_var($username, FILTER_VALIDATE_EMAIL)); break;
		}
		return $result;
	}

}
