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

	public function getPerson($document = null){
		if($document == null){
			return $this->db->query($this->config->item("getPersons"),array($this->session->user_id))->row();
		}else{
			return $this->db->query($this->config->item("getPersonsDocument"),array($document))->row();
		}

	}

	public function getDataStudent(){
		return $this->db->query($this->config->item("getDataStudents"),array($this->session->user_id))->row();
	}

	public function getStudetsCreditNumber(){
		return $this->db->query($this->config->item("getStudetsCreditNumbers"),array($this->session->user_id))->row("studets_credit_numbers");
	}

	public function getNewPensum_id($current_pensum = null){

		if($current_pensum == null){
			return $this->db->query($this->config->item("getNewPensum_ids"),array($this->session->currentPensum_id))->row("newPensum_id");
		}else{
			return $this->db->query($this->config->item("getNewPensum_ids"),array($current_pensum))->row();
		}
	}

	public function update($table,$data = [],$where = []){
		return $this->db->update($table,$data,$where);
	}


	public function getJefes(){
		return $this->db->query("select t.teacher_id,CONCAT(p.first_name,' ',p.first_surname) as namePerson, pe.code as codePensum, f.name as nameFaculty, c.name as nameCareer from teachers t inner join persons p on t.person_id = p.person_id inner join pensums pe on pe.pensum_id = t.pensum_id inner join careers c on c.career_id = pe.career_id inner join faculties f on f.faculty_id = c.faculty_id")->result();
	}

	public function getJefePensum(){
		return $this->db->query("select pe.pensum_id,t.teacher_id,CONCAT(p.first_name,' ',p.first_surname) as namePerson, pe.code as codePensum, f.name as nameFaculty, c.name as nameCareer from teachers t inner join persons p on t.person_id = p.person_id inner join pensums pe on pe.pensum_id = t.pensum_id inner join careers c on c.career_id = pe.career_id inner join faculties f on f.faculty_id = c.faculty_id where p.user_id = {$this->session->user_id}")->result();
	}

	public function removeJefes($teacher_id){
		$this->db->where(compact("teacher_id"));
		return $this->db->delete("teachers");
	}

	public function validate($data = [],$table = "teachers",$where = ["person_id","pensum_id"],$insert = true){
		$d = $this->db->query("select *From teachers where person_id = {$data['person_id']}  and pensum_id = {$data['pensum_id']}");
		if($d->num_rows()>0){
			return ["error"=>"Esta persona ya esta asignada"];
		}else{
			$this->db->insert($table,$data);
		}
		return true;
	}

	public function getidStudent($person_id ,$pensum_id){
		return $this->db->query("select DISTINCT s.student_id from persons p  inner join students s on s.person_id = p.person_id where p.person_id = ? and s.pensum_id =?",array($person_id,$pensum_id))->row("student_id");
	}

	public function getJefe($pensum_id){
		return $this->db->query("select teacher_id from persons p inner join teachers t on p.person_id = t.person_id where t.pensum_id = ?",array($pensum_id))->row("teacher_id");
	}


	public function requestChange($data = [],$table = "change_request"){
		$status = $data["status"];
		unset($data["status"]);
		$this->db->where($data);
		$this->db->from($table);
		$data["status"] = $status;
		$r = $this->db->get()->num_rows();
		if((int)$status == 1){
			$this->changeStatus($data["new_pensum_id"],$data["student_id"]);
		}
		return $r > 0 ? false : $this->db->insert($table,$data);
	}


	public function changeStatus($pensum_id,$student_id){
		$this->db->update("students",array("pensum_id"=>$pensum_id),array("student_id"=>$student_id));
	}

	public function studentsHomologacion(){
		return $this->db->query($this->config->item("viewHomoStatus"))->result();
	}

	public function delete($table,$data = []){
		return $this->db->delete($table,$data);
	}

}
