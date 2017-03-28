<?php
	defined('BASEPATH') OR exit('No direct script access allowed!');

/*
* NAME : Payroll Model
* TYPE : CI_Model
* DEVELOPER : Kher Je	
* DATE DEVELOPED: 0/03/17
* DESCRIPTION: Payslip Navigation
*/

class Payroll_model extends CI_Model{
	public function __construct()
	{
		parent::__construct();
	}

	public function retrieveAttendance(){
		$this->db->select()
		->from('tbl_attendance');

		$query = $this->db->get();

		return $query->result_array();
	}
	public function generatePayroll1(){
		$this->db->select()
		->from('tbl_payroll');

		$query = $this->db->get();

		return $query->result_array();
	}
}


?>