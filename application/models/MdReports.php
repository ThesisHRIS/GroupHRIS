<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* NAME : Clients Model
* TYPE : CI_Model
* DEVELOPER : Filjumar Jumamoy	
* DATE DEVELOPED: 01/18/16
* DESCRIPTION: Dashboard
*/

class MdReports extends CI_Model {


	public function __construct()
	{
		parent::__construct();
	}
	public function getData($id){
		$query=$this->db->select('p.date_collected,project_name,p.amount_collected,p.description')
		->from("payment_terms as p")
		->join("sales as s","s.sales_id=p.sales_id","LEFT")
		->join("proposals as pl","pl.proposals_id=s.proposals_id","LEFT")
		->where("pl.sales_user_id",$id);
		$q = $this->db->get();
		return $q->result_array();
	}
	public function getList($year,$from,$to){
		$datefrom= $year."-".$from."-"."00";	
		$dateto=$year."-".$to."-"."00";

		$this->db->select('p.date_collected,project_name,p.amount_collected,p.description')
		->from("payment_terms as p")
		->where('p.date_collected >=',$datefrom)
		->where('p.date_collected <=', $dateto)
		->join("sales as s","s.sales_id=p.sales_id","LEFT")
		->join("proposals as pl","pl.proposals_id=s.proposals_id","LEFT");

		$q=$this->db->get();
		return $q->result_array();			
	}
}


?>