<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

class Suspension_form_model extends CI_Model{
	public function __construct()
	{
		parent:: __construct();
	}

	public function process(){
		$suspensionId = $this->input->post('suspension_id');
		$suspensionFrom = $this->input->post('start_date');
		$suspensionTo = $this->input->post('end_date');
		$empId = $this->input->post('emp_id');

		$data = array(
			'suspension_id' => $suspensionId,
			'suspension_from' => $suspensionFrom,
			'suspension_to' => $suspensionTo,
			'emp_id' => $empId
			);

		$this->db->insert('tbl_suspension', $data);

		$array = array(
			'status'=>'Inactive'
		);

		$this->db->where('emp_id', $empId)
		->update('tbl_employees', $array);

		return true;
	}
	public function getAll(){
		$this->db->select()
		->from('tbl_suspension as sus')
		->join('tbl_employees as emp','emp.emp_id=sus.emp_id','LEFT')
		->join('tbl_department as dept','dept.department_no=emp.department','LEFT');

		$query= $this->db->get();

		return $query->result_array();
	}
	public function getProfile(){
		$this->db->select('profilePath,folder')
		->from('tbl_employees')
		->where('emp_id',$this->session->userdata('emp_id'));

		$query = $this->db->get();

		return $query->result_array();

	}
	public function getEmpInfo(){
		$this->db->select()
		->from('tbl_employees');

		$query = $this->db->get();

		return $query->result_array();
	}
}


?>