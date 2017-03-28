<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* NAME : Sales Model
* TYPE : CI_Model
* DEVELOPER : 
* DATE DEVELOPED: 
* DESCRIPTION: Dashboard
*/

class MdSales extends CI_Model {

	

	public function __construct()
	{
		parent::__construct();
	}
	//fetch clients
	public function fetchClient()
	{
		$this->db->select('contact_name')
		->from("client");
		$q = $this->db->get();
		return $q->result_array();
	}
	public function clientWithProposals($id){
		
		// $query = $this->fetchClientWithProposals();
		$query1 = $this->fetchAll($id);
		$arr1 = array();

		foreach ($query1 as $val) {
				if(!in_array($val,$arr1)){
					//echo "in array";
					array_push($arr1,$val);
				}
		}
		return ($arr1);
	}
	public function fetch($id){
		$this->db->select("c.contact_name")
		->from('client as c')
		->join ('proposals as p ', 'p.client_id = c.client_id','INNER')
		->where('c.sales_user_id',$id);
		$query=$this->db->get();
		return $query->result_array();
	}
	public function fetchAll($id){
		$this->db->select("c.contact_name,p.delete_status")
		->from("proposals as p")
		->join("client as c","c.client_id=p.client_id")
		->where("p.sales_user_id",$id);
		$query=$this->db->get();
		return($query->result_array());
	}
	public function fetchClientWithProposals(){
		$this->db->select('contact_name,client_id')
		->from("client");
		$query=$this->db->get();
		$result=$query->result_array();
		return $result;
	}
	public function fetchProposals($id){
		$this->db->select("client_id,delete_status")
		->from("proposals")
		->where("sales_user_id",$id);
		$query=$this->db->get();
		return($query->result_array());
	}
	public function fetchClientbyId($data)
	{
		$this->db->select('*')
		->from("client")->where("contact_name",$data);
		$q = $this->db->get();
		return $q->result_array();
	}
	// fetch cate
	public function fetchQuatation()
	{
		$this->db->select('*')
		->from("proposals");
		$q = $this->db->get();
		return $q->result_array();
	}
	 // save a new sale
	public function saveNew($array)
	{
		$this->db->insert("sales", $array);
    	return true;
    
	}
	public function getId(){
		$this->db->select('sales_id')
		->from("sales")
		->order_by('sales_id','DESC')
		->limit(1);

     	$res = $this->db->get();
     	return $res->result_array();
	}

	public function connectUserToClient($id)
	{
		$this->db->select('sales_id,c.company_name,p.project_name,s.amount,s.status')
		->from('sales as s')
		->where('s.delete_status','0')
		->join('client as c', 'c.client_id=s.client_id','LEFT')
		->join('proposals as p','s.proposals_id=p.proposals_id')
		->where('p.sales_user_id',$id);

		$query=$this->db->get();
		return $query->result_array();
	}
	public function getAll($data)
	{
		$this->db->select('sales_id,c.company_name,p.project_name,s.amount,s.status,s.client_id,s.proposals_id')
		->from('sales as s')->where('sales_id',$data)
		->join('client as c', 'c.client_id=s.client_id','LEFT')
		->join('proposals as p','s.proposals_id=p.proposals_id');

		$query=$this->db->get();
		return $query->result_array();
	}
	public function getList($attr_id){

		$this->db->select('sales_id,c.company_name,p.project_name,s.amount,s.status,s.amount')
		->from('sales as s')
		->where('sales_id',$attr_id)
		->join('client as c', 'c.client_id=s.client_id','LEFT')
		->join('proposals as p','s.proposals_id=p.proposals_id');
		$query = $this->db->get();
		return $query->first_row('array'); 
	}
	public function getSales($data){
		$this->db->select()
		->from('sales')->where('sales_id',$data);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function update1($data,$company_name){

		$this->db->select()
		->from("client")
		->where('client_id',$data[0]['client_id']);
		$query = $this->db->get();
		$result =$query->result_array();

		$array = array(
			'sales_user_id' => $result[0]['sales_user_id'],
			'company_name' => $company_name,
			'contact_name' => $result[0]['contact_name'],
			'address' => $result[0]['address'],
			'position' => $result[0]['position'],
			'contact_no' => $result[0]['contact_no'],
			'email' => $result[0]['email'],
			'bdate' => $result[0]['bdate'],
			'value' => $result[0]['value'],
			'date_inquired' => $result[0]['date_inquired'],
			'delete_status'=>$result[0]['delete_status']
			);

		$final=$this->db->where('client_id',$data[0]['client_id'])
		->update("client", $array);
		
		return $final;
		

	}
	public function update2($data,$project_name){
		$this->db->select()
		->from("proposals")
		->where('proposals_id',$data[0]['proposals_id']);
		$query = $this->db->get();
		$result =$query->result_array();
		$array = array(
			'sales_user_id'=>$result[0]['sales_user_id'],
			'client_id'=>$result[0]['client_id'],
			'service_category'=>$result[0]['service_category'],
			'amount'=>$result[0]['amount'],
			'date_sent'=>$result[0]['date_sent'],
			'project_name'=>$project_name,
			'filename'=>$result[0]['filename'],
			'status'=>$result[0]['status']
		);

		$final=$this->db->where('proposals_id',$data[0]['proposals_id'])
		->update("proposals", $array);
		
		return $final;

	}
	public function update3($data,$amount){
		$this->db->select()
		->from("sales")
		->where('sales_id',$data[0]['sales_id']);
		$query = $this->db->get();
		$result =$query->result_array();
		$money=explode(",",$amount);

		$val=count($money);

		$str="";
		$str1="";
		for ($i=0; $i <$val; $i++) { 
			$str=$str.$money[$i];
		}
		$array = array(
			'proposals_id'=>$result[0]['proposals_id'],
			'date_signed'=>$result[0]['date_signed'],
			'amount'=>$str,
			'vatable'=>$result[0]['vatable'],
			'signed_copy_filename'=>$result[0]['signed_copy_filename'],
			'prod_specs_filename'=>$result[0]['prod_specs_filename'],
			'commissionable'=>$result[0]['commissionable'],
			'contact_no_for_collection'=>$result[0]['contact_no_for_collection'],
			'contact_name_for_collection'=>$result[0]['contact_name_for_collection'],
			'client_id'=>$result[0]['client_id'],
			'client_project_coordinator_no'=>$result[0]['client_project_coordinator_no'],
			'status'=>$result[0]['status']
		);

		$final=$this->db->where('sales_id',$result[0]['sales_id'])
		->update("sales", $array);

		return $final;

	}
	public function deleteSale($id){
		$arr_up = array('delete_status'=>'1');
		$this->db->where('sales_id', $id)
		->update('sales', $arr_up);
		return true;
	}
	public function savePaymentTerms($array){
		$this->db->insert('payment_terms',$array);
		return true;
	}
	public function autoSelect($selected){
		$this->db->select("p.proposals_id")
		->from("proposals as p")
		->join("client as c","p.client_id=c.client_id",'LEFT')
			->where("contact_name", $selected);
		$query=$this->db->get();
		return $query->result_array();
	
	}
	
}

?>