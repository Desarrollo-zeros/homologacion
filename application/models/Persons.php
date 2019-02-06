<?php
/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 29/09/2018
 * Time: 2:30 PM
 */

class Persons extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getPerson(){
		return $this->db->query($this->config->item("getPersons"),array($this->session->user_id))->row();
	}

	public function getDataStudent(){
		return $this->db->query($this->config->item("getDataStudents"),array($this->session->user_id))->row();
	}

	public function getStudetsCreditNumber(){
		return $this->db->query($this->config->item("getStudetsCreditNumbers"),array($this->session->user_id))->row("studets_credit_numbers");
	}

	public function getNewPensum_id(){
		return $this->db->query($this->config->item("getNewPensum_ids"),array($this->session->currentPensum_id))->row("newPensum_id");
	}

	public function update($table,$data = [],$where = []){
		return $this->db->update($table,$data,$where);
	}
}
