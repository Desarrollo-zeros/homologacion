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

}
