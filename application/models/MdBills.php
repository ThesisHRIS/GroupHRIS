<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* NAME : Sales Model
* TYPE : CI_Model
* DEVELOPER : 
* DATE DEVELOPED: 
* DESCRIPTION: Dashboard
*/

class MdBills extends CI_Model {

	private $table = "payment_terms";

	public function __construct()
	{
		parent::__construct();
	}
	public function nico(){
		echo 'hello';
	}
	public function clientWithProposals(){
		@$storage;
		$query = $this->fetchClientWithProposals();	
		$query1 = $this->fetchAll();
		$count_clients=count($query);
		$count_proposals=count($query1);
		$count = 0;
		$count_cliPro=0;
		for ($i=0; $i < $count_proposals&&$count<$count_clients; $i++) { 
			// print_r($query[$count]['client_id']." ".$query[$count]['client_id']);
			if($query[$count]['client_id']==$query1[$i]['client_id'] && $query1[$i]['delete_status']!='1'  ){
				$storage[$count_cliPro]['contact_name']=$query[$count]['contact_name'];
				// print_r($storage);
				$count_cliPro++;
				$count++;
				$i=0;
				continue;
			}
			if($i==$count_proposals-1 && $count < $count_clients){
				$i=0;
				$count++;
			}
		}
		
		return @$storage;
	}
	public function fetchClientWithProposals(){
		$this->db->select('contact_name,client_id')
		->from("client");
		$query=$this->db->get();
		$result=$query->result_array();
		return $result;
	}
	public function fetchProposals(){
		$this->db->select("client_id,delete_status")
		->from("proposals as p")
		->join("Sales as s","s.proposals_id = p.proposals_id")
		->join("payment_terms as pt","pt.sales_id=s.sales_id");
		$query=$this->db->get();
		return($query->result_array());
	}
	public function fetchAll($id){
		$this->db->select('contact_name,c.client_id,p.delete_status,pt.finance_id')
		->from("proposals as p")
		->join("client as c","p.client_id=c.client_id",'INNER')
		->join("sales as s","s.proposals_id = p.proposals_id",'INNER')
		->join("payment_terms as pt","pt.sales_id = s.sales_id",'INNER')
		->where("pt.finance_id=0");
		$query=$this->db->get();
		return($query->result_array());
	}
	public function fetch($id){
		$query1 = $this->fetchAll($id);
		// print_r($query1);
		$arr1 = array();

		foreach ($query1 as $val) {
				if(!in_array($val,$arr1)){
					//echo "in array";
					array_push($arr1,$val);
				}
		}
		return ($arr1);
	}
	public function autoSelect1($selected){
		$this->db->select('p.proposals_id,pt.description,pt.percentage,pt.ex_deal,pt.qb_ref_no')
		->from("proposals as p")
		->join("client as c","p.client_id=c.client_id",'LEFT')
		->join("sales as s","s.proposals_id = p.proposals_id",'LEFT')
		->join("payment_terms as pt","pt.sales_id=s.sales_id","INNER")
		->where("contact_name", $selected);
		// ->where("qb_ref_no>0");
		$query=$this->db->get();
		return($query->result_array());
	}
	public function autoSelect($selected){
		$query1 = $this->autoSelect1($selected);
		$arr1 = array();

		foreach ($query1 as $val) {
				if(!in_array($val,$arr1)){
					//echo "in array";
					array_push($arr1,$val);
				}
		}
		return ($arr1);
	
	}
	public function autoreg($selected){
		$this->db->select('p.proposals_id')
		->from("proposals as p")
		->join("client as c","p.client_id=c.client_id",'INNER')
		->join("sales as s","s.proposals_id = p.proposals_id",'INNER')
		->join("payment_terms as pt","pt.sales_id = s.sales_id",'INNER')
		->where("contact_name", $selected);
		$query=$this->db->get();
		return($query->result_array());
	}
	public function Bills_List($id){
		$this->db->select()
		->from('payment_terms')
		->where("finance_id",$id);
		$query=$this->db->get();
		return $query->result_array();
	}
	public function fetchPaymentTerms($id){
		$this->db->select()
		->from('payment_terms')
		->where('payment_terms_id',$id);
		$query=$this->db->get();
		return $query->result_array();
	}
	public function save($data,$id){
		
		$this->db->where('payment_terms_id',$id)
		->update($this->table, $data);
		return true;
	}
	public function quatationNo($id){
		$this->db->select('')
		->from("proposals as p")
		->join("sales as s","s.proposals_id = p.proposals_id",'LEFT')
		->join("payment_terms as pt","pt.sales_id=s.sales_id",'LEFT')
		->where("p.proposals_id", $id);
		// ->where("qb_ref_no>0");
		$query=$this->db->get();
		return($query->result_array());
	}
}

?>