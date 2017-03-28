<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* NAME : Sales Model
* TYPE : CI_Model
* DEVELOPER : 
* DATE DEVELOPED: 
* DESCRIPTION: Dashboard
*/

class MdUsers extends CI_Model {

	private $table = "payment_terms";

	public function __construct()
	{
		parent::__construct();
	}
	public function getEmployee(){
		$this->db->select()
		->from('tbl_employees as emp')
		->join('tbl_department as dep','dep.department_no=emp.department');

		$query= $this->db->get();

		return $query->result_array();

	}
	public function getInfo($id){
		$this->db->select()
		->from('tbl_employees as emp')
		->join('tbl_department as dep','dep.department_no=emp.department','LEFT')
		->join('tbl_company as com','com.company_id=emp.company_id','LEFT')
		->where('emp.emp_id',$id);

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
	
	}
?>