<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* NAME : Collection Model
* TYPE : CI_Model
* DEVELOPER : 
* DATE DEVELOPED: 
* DESCRIPTION: Dashboard
*/

class MdCollections extends CI_Model {

	private $table = "payment_terms";

	public function __construct()
	{
		parent::__construct();
	}
	public function fetchPaymentTerms($id){
		$this->db->select()
		->from('payment_terms')
		->where('finance_id',$id);
		$query= $this->db->get();
		return $query->result_array();
	}
	public function fetchPaymentTermsWithId($id){
		$this->db->select()
		->from('payment_terms')
		->where('qb_ref_no',$id);
		$query= $this->db->get();
		return $query->result_array();
	}
	public function update($data,$id){
		$this->db->where('qb_ref_no',$id)
		->update($this->table,$data);
		return true;
	}
	public function Collection_List($id){
		$this->db->select()
		->from('payment_terms')
		->where('finance_id',$id);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function fetchAll(){
		$this->db->select('')
		->from("proposals as p")
		->join("client as c","p.client_id=c.client_id",'INNER')
		->join("sales as s","s.proposals_id = p.proposals_id",'INNER')
		->join("payment_terms as pt","pt.sales_id = s.sales_id",'INNER');
		$query=$this->db->get();
		return($query->result_array());
	}
}

?>