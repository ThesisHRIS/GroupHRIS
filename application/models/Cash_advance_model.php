<?php 
	defined('BASEPATH')or exit('NO direct script access allowed');

class Cash_advance_model extends CI_Model
{
	public function __construct()
	{
		parent:: __construct();
	}

	public function process($data){
		

	$this->db->insert('tbl_cash_advance', $data);
	return true;
	}

	public function getRequest(){
		$this->db->select('c.ca_id,e.first_name, e.last_name, c.date_filed, c.amount, c.payment_terms, c.payment_start, c.description, c.status,c.reasons')
		->from('tbl_cash_advance as c')
		->join('tbl_employees as e','e.emp_id=c.emp_id','LEFT');
		// ->where('c.emp_id' , $this->session->userdata('emp_id'));

		$query= $this->db->get();

		return $query->result_array();
	}
	public function getEmployee(){
		$this->db->select()
		->from('tbl_employees as emp')
		->join('tbl_department_list as dept','emp.department = dept.department_id')
		->where('emp_id',$this->session->userdata('emp_id'));
			$query = $this->db->get();
		return $query->result_array();
	}
	public function getProfile(){
		$this->db->select('profilePath,folder')
		->from('tbl_employees')
		->where('emp_id',$this->session->userdata('emp_id'));

		$query = $this->db->get();

		return $query->result_array();

	}
	public function approve($id){
		$final = array(
				'status'=>'Approved'
			);
		$this->db->where('ca_id', $id)
		->update('tbl_cash_advance', $final);
		return true;
	}
	public function getList($id){
		$this->db->select()
		->from('tbl_cash_advance')
		->where('ca_id',$id);

		$query = $this->db->get();

		return $query->result_array();
	}
	public function decline($id,$reason){
		$final = array(
				'status'=>'Decline',
				'reasons'=>$reason
			);
		$this->db->where('ca_id', $id)
		->update('tbl_cash_advance', $final);
		return true;
	}

	
}

?>