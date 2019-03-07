<?php
/**
 * Created by PhpStorm.
 * User: zeros
 * Date: 2/03/19
 * Time: 14:52
 */

class Faculties extends  CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}


	//obtener cantidad de facultades

	public function getCount(){
		$this->db->from("faculties");
		return $this->db->count_all_results();
	}


	public function getFaculties(){
		$this->db->from("faculties");
		return $this->db->get()->result();
	}



	public function validate($data = [],$table = "faculties",$where = ["code","name"],$insert = true){
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

	public function update($where = [],$data = [],$table = "faculties"){
		$this->db->where($where);
		return $this->db->update($table,$data);
	}

}
