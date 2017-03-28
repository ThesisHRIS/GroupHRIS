<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* NAME : Clients Model
* TYPE : CI_Model
* DEVELOPER : Filjumar Jumamoy	
* DATE DEVELOPED: 01/18/16
* DESCRIPTION: Dashboard
*/

class MdClients extends CI_Model {

	private $table = "client";

	public function __construct()
	{
		parent::__construct();
	}
	// save data to client table
	public function saveNew($array)
	{
		$this->db->insert($this->table, $array);
		return true;
	}
	// get clients
	public function getLists()
	{
		$this->db->select('*')
		->from($this->table)
		->where('sales_user_id', $this->session->userdata('user_id'))
		->where('delete_status', '0')
		->order_by('client_id', 'DESC');
		$query_list = $this->db->get();
		return $query_list->result_array();
	}
	// update clients list
	public function getList($attr_id)
	{
		$this->db->select('*')->from($this->table)->where('client_id',$attr_id);
		$query = $this->db->get();
		return $query->first_row('array'); 
	}
	public function updateClientTBL($data,$id_cli)
	{
		$this->db->where('client_id',$id_cli)
		->update($this->table, $data);
		return true;
	}
	// delete client
	public function deleteClient($del_id)
	{
		$arr_up = array('delete_status'=>'1');
		$this->db->where('client_id', $del_id)
		->update($this->table, $arr_up);
		return true;
	}	
}

;?>