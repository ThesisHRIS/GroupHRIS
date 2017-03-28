<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* NAME : Proposals Model
* TYPE : CI_Model
* DEVELOPER : Filjumar Jumamoy	
* DATE DEVELOPED: 01/18/16
* DESCRIPTION: Dashboard
*/

class MdProposals extends CI_Model {

	private $table = "proposals";
	private $client_tbl = "client";
	private $category_tbl = "service_category";
	private $proposals_tbl = "proposals";
	public function __construct()
	{
		parent::__construct();
	}
	// fetch clients
	public function getClient()
	{
		$sess_id = $this->session->userdata('user_id');
		$this->db->select('*')
		->from($this->client_tbl)
		->where('sales_user_id', $sess_id)
		->where('proposals_status=','0')
		->where('delete_status=','0');
		$q = $this->db->get();
		return $q->result_array();
	}
	// get categories
	public function getCategories()
	{
		$this->db->select('*')->from($this->category_tbl);
		$q = $this->db->get();
		return $q->result_array();
	}
	// / save proposal
	public function saveProposal($proposal_save)
	{
		$this->db->insert($this->proposals_tbl, $proposal_save);
		return true;
	}
	// get proposals
	public function getProposal($id)
	{
		$q=$this->db->select("p.proposals_id,c.contact_name,p.amount,p.delete_status,p.date_sent,p.project_name,p.filename,
			p.folder_name,p.date_created,p.date_lastModified,p.status")->from('proposals as p')
		->join('client as c','c.client_id=p.client_id','LEFT')
		->where('p.sales_user_id',$id);
		$q = $this->db->get();
		return $q->result_array();
	}
	//get client name
	public function getClientName($client_id)
	{
		$this->db->select('contact_name')->from('client')
		->where('client_id', $client_id);
		$q = $this->db->get();
		return $q->first_row('array');
	}
	// save data to prosals table
	// public function saveNew($array)
	// {
	// 	$this->db->insert($this->table, $array);
	// 	return true;
	// }
	public function getList($attr_id){

		$this->db->select('')
		->from('proposals as p')
		->where('proposals_id',$attr_id)
		->join('client as c', 'c.client_id=p.client_id','LEFT');
		$query = $this->db->get();
		return($query->first_row('array')); 
	}

	public function delete_proposals($id){
		$arr_up = array('delete_status'=>'1');
		$this->db->where('proposals_id', $id)
		->update('proposals', $arr_up);
		return true;
	}
	public function update_proposals($data,$id){
		date_default_timezone_set('Asia/Manila');
		$date = date('Y-m-d H:i:sP');
		$this->db->select(" ")
		->from('proposals as p')
		->join('client as c','c.client_id=p.client_id','LEFT')
		->where('p.proposals_id',$id);
		$query = $this->db->get();
		$result =$query->result_array();
		// print_r($data);
		$final = array(
			'sales_user_id' =>$result[0]['sales_user_id'],
			'client_id'=>$result[0]['client_id'],
			'service_category'=>$data['sales_category'],
			'amount'=>$data['amount'],
			'date_sent'=>$data['date_sent'],
			'project_name'=>$data['project_name'],
			'folder_name'=>$data['folder_name'],
			'filename'=>$data['filename'],
			'status'=>$result[0]['status'],
			'delete_status'=>$result[0]['delete_status'],
			'date_created'=>$result[0]['date_created'],
			'date_lastModified'=>$date,

			 );
		$this->db->where('proposals_id', $id)
		->update('proposals', $final);
		return true;

	}

	public function getSalesCategories()
	{
		$this->db->select('*')
		->from('service_category');
		$query = $this->db->get();
		return($query->result_array());
	}
	public function updateClientTBL($data,$id_cli)
	{
		$this->db->where('client_id',$id_cli)
		->update("client", $data);
		return true;
	}
}

?>