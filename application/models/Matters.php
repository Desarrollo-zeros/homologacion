<?php
/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 29/09/2018
 * Time: 3:26 PM
 */

class Matters extends  CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getPensum(){

	}

	public function getMattersArray($case = 1){
		$lostMatter = [];
		$wonMatters = [];
		if($case == 1){
			$lostMatter =$this->db->query($this->config->item("getMatterLosts"),array($this->session->user_id))->result();
			$lostMatter = $this->Validate->unique_multidim_array_obj($lostMatter,"code");
		}else{
			$wonMatters = $this->db->query($this->config->item("getMattersWons"),array($this->session->user_id))->result();
			$wonMatters = $this->Validate->unique_multidim_array_obj($wonMatters,"code");
		}
		return ($case == 1)? $lostMatter : $wonMatters;
	}

	public function getMatterCount($case = 1){
		return $case == 1 ?
			$this->db->query($this->config->item("getMatterWonCounts"),array($this->session->user_id))->row("countWon") :
			count($this->Validate->getDataMatters($this->getMattersArray(2),$this->getMattersArray(1),[],1));
	}

	public function getMatter(){
		$id = $this->Persons->getNewPensum_id();
		$homolo = $this->db->query($this->config->item("getMattersHomolo"),array($this->session->user_id,$id))->result();
		return $this->Validate->getDataMatters($this->getMattersArray(2),$this->getMattersArray(1),$homolo,2);
	}

	public function getMissingMatterCount(){
		return $this->db->query($this->config->item("getMissingMatterCounts"),array($this->session->user_id))->row("missingMatter");
	}

	public function getPondered($i,$data = []){
		$credit = null;
		$pon = null;
		$semester = [];
		foreach ($data as $row){
			if($row->semester == $i){
				$credit = $credit + $row->credit_numbers;
				$pon =$pon+ $row->credit_numbers*$row->note;
			}
		}
		if(isset($pon)){
			$pon = $pon/$credit;
			array_push($semester,$pon);
			return $semester;
		}
	}

	public function getDatachartPondered(){
		$data = $this->db->query($this->config->item("getMatters"),array($this->session->user_id))->result();
		$pondered = [];
		for ($i=1; $i<11;$i++){
			array_push($pondered,$this->getPondered($i,$data));
		}
		return $pondered;
	}

	public function getCesh($case = 1)
	{
		$semester = [];
		if($case == 1){
			for($i = 1; $i<11; $i++){
				$semester["semester{$i}"] = $this->db->query($this->config->item("getmattersPensum"),array($this->session->currentPensum_id,$i))->result();
			}
		}else{
			$idPensum = $this->Persons->getNewPensum_id();
			for($i = 1; $i<11; $i++){
				$semester["semester{$i}"] = $this->db->query($this->config->item("getmattersPensum"),array($idPensum,$i))->result();
			}
		}
		return $semester;
	}

	public function getFullMetter()
	{
		$idPensum = $this->Persons->getNewPensum_id();
		return $this->db->query($this->config->item("getFullMetters"),array($this->session->user_id,$idPensum))->result();
	}
}
