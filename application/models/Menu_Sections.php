<?php
/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 19/10/2018
 * Time: 3:59 PM
 */

class Menu_Sections extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function getMenu(){
		$rol = isset($this->session->roles_id) ? $this->session->roles_id : 0;
		return $this->db->query($this->config->item("getMenus"),array($rol))->result();
	}

	public function getSection(){
		return $this->db->query($this->config->item("getSections"),array($this->session->roles_id))->result();
	}
}
