<?php
/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 18/10/2018
 * Time: 9:40 PM
 */

class Careers extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function getCareer(){
		return $this->db->query($this->config->item("getCareers"),[$this->session->currentPensum_id])->row();
	}

	public function get(){
		$this->db->from("careers");
		return $this->db->get()->result();
	}

	public function getAll(){
		return $this->db->query("select c.career_id, c.code as codeCareer, c.name as nameCarrer, f.faculty_id as faculty , f.name as nameFaculty from careers c inner join faculties f on c.faculty_id = f.faculty_id")->result();
	}

	public function validate($data = [],$table = "careers",$where = ["code","name"],$insert = true){
		foreach ($data as $key => $value){
			if(in_array($key,$where)){
				$this->db->where([$key=>$value]);
				$this->db->select($key);
				if($this->db->get($table)->num_rows() > 0){
					return ["error"=>"error {$value} ya existe","key"=>$key];
				}
			}
		}
		if($insert){
			$this->db->insert($table,$data);
		}
		return true;
	}

	public function update($where = [],$data = [],$table = "careers"){
		$this->db->where($where);
		return $this->db->update($table,$data);
	}

}
