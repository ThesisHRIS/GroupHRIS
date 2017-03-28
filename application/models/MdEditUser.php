<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* NAME : Sales Model
* TYPE : CI_Model
* DEVELOPER : 
* DATE DEVELOPED: 
* DESCRIPTION: Dashboard
*/

class MdEditUser extends CI_Model {

	private $table = "";

	public function __construct()
	{
		parent::__construct();
	}

	public function edit(){
		$this->db->select()
		->from('tbl_employees')
		->where('emp_id',$this->session->userdata('emp_id'));

		$query= $this->db->get();

		return $query->result_array();
	}
	public function update($data){
		$this->db->where('emp_id', $this->session->userdata('emp_id'))
		->update('tbl_employees', $data);
		return true;
	}
	public function getProfile(){
		$this->db->select('profilePath,folder')
		->from('tbl_employees')
		->where('emp_id',$this->session->userdata('emp_id'));

		$query = $this->db->get();

		return $query->result_array();

	}
}
?>