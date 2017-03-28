<?php 
	defined('BASEPATH')or exit('NO direct script access allowed');

class Add_loan_model extends CI_Model
{
	public function __construct()
	{
		parent:: __construct();
	}

	public function process(){
		$deducId = $this->input->post('deduct_id');
		$salaryId = $this->input->post('salary_id');
		$empId = $this->input->post('emp_id');
		$type = $this->input->post('type');
		$payAmount = $this->input->post('pay_amount');
		$amountTotal = $this->input->post('amount_total');
		$payStart = $this->input->post('payment_start');
		$payEnd = $this->input->post('payment_end');
		$dateFiled = $this->input->post('date_filed');
		$description = $this->input->post('description');
		$paid = $this->input->post('paid');

		$data = array(
			'deduc_id' => $deducId,
			'salary_id' => $salaryId,
			'emp_id' => $empId,
			'type' => $type,
			'pay_amount' => $payAmount,
			'amount_total' => $amountTotal,
			'pay_start' => $payStart,
			'pay_end' => $payEnd,
			'date_filed' => $dateFiled,
			'description' => $description,
			'is_paid' => $paid

			);

		$this->db->insert('tbl_other_deduc', $data);

	}

	public function getLoan(){
		$this->db->select()
		->from('tbl_other_deduc as ded')
		// ->join('tbl_salary as sal','sal.emp_id = ded.')
		->join('tbl_employees as emp','emp.emp_id = ded.emp_id','LEFT');

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