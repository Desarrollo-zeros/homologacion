<?php
/**
 * Created by PhpStorm.
 * User: zeros
 * Date: 2/03/19
 * Time: 15:07
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Pensums extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}



	public function getCount()
	{
		$this->db->from("pensums");
		return $this->db->count_all_results();
	}

	public function getAll()
	{
		return $this->db->query("select p.pensum_id, p.code as codePensum, p.create_date, p.credit_numbers, p.detail, p.status as statusPensum, c.name as careerName from pensums p inner join careers c on p.career_id = c.career_id")->result();
	}

	public function getCode($code = [])
	{
		$this->db->from("pensums");
		$this->db->where(compact("code"));
		return $this->db->get()->num_rows();
	}

	public function validate($data = [], $table = "pensums", $where = ["code"], $insert = true)
	{
		foreach ($data as $key => $value) {
			if (in_array($key, $where)) {
				$this->db->where([$key => $value]);
				$this->db->select($key);
				if ($this->db->get($table)->num_rows() > 0) {
					return ["error" => "error {$value} ya existe", "key" => $key];
				}
			}
		}
		if ($insert) {
			$this->db->insert($table, $data);
		}
		return true;
	}

	public function update($where = [], $data = [], $table = "pensums")
	{
		$this->db->where($where);
		return $this->db->update($table, $data);
	}
}

/* End of file .php */
