<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

class Ot_form_model extends CI_Model{
	public function __construct()
	{
		parent:: __construct();
	}

	public function process(){
		$otId = $this->input->post('ot_id');
		$empId = $this->input->post('emp_id');
		$otDate = $this->input->post('ot_date');
		$totalHours = $this->input->post('hours');
		$supervisorId = $this->input->post('supervisor_id');
		$task = $this->input->post('task');
		$remarks = $this->input->post('remarks');
		$dateFiled = $this->input->post('date_filed');
		// $differential = $this->input->post('differential');
		$timeStart = $this->input->post('time_start');
		$timeEnd = $this->input->post('time_end');
		$status = $this->input->post('status');

		$data = array(
			// 'ot_id' => $otId,
			'emp_id' => $this->session->userdata('emp_id'),
			'ot_date' => $otDate,
			'total_hours' => $totalHours,
			'supervisor_id' => $supervisorId,
			'task' => $task,
			'remarks' => $remarks,
			'date_filed' => $dateFiled,
			'differential' => ' ',
			'time_start' => $timeStart,
			'time_end' => $timeEnd,
			'status' => 'pending'
			);
// print_r($data);
		$this->db->insert('tbl_ot_forms', $data);
	}
	public function saveOT($data){
		$this->db->insert('tbl_ot_forms',$data);
		return true;
	}
	public function getProfile(){
		$this->db->select('profilePath,folder')
		->from('tbl_employees')
		->where('emp_id',$this->session->userdata('emp_id'));

		$query = $this->db->get();

		return $query->result_array();

	}
public function getListOt($id){
		$this->db->select('')
		->from('tbl_ot_forms' )
		->where('ot_id',$id);

		$query= $this->db->get();

		return $query->result_array();
	}
	public function getSupervisor(){
		$this->db->select()
		->from('tbl_supervisor_list');

		return $this->db->get()->result_array();
	}
	public function delete_ot($id,$data){
		$final = array(
				'status'=>'Decline',
				'reason'=>$data
			);
		$this->db->where('ot_id', $id)
		->update('tbl_ot_forms', $final);
		return true;
	}

	public function getOtList(){
		$this->db->select('e.first_name, e.last_name, o.date_filed, o.ot_date, o.total_hours, o.task,
			o.status,o.reason');
		$this->db->from('tbl_ot_forms o');
		$this->db->join('tbl_employees e', 'e.emp_id = o.emp_id', 'left');
		$this->db->order_by('o.ot_date', 'desc');
		$query = $this->db->get();

		return $query->result_array();
	}

	public function getOtRequest(){
		$this->db->select('o.ot_id,e.first_name, e.last_name, o.date_filed, o.ot_date,
			o.total_hours, o.task');
		$this->db->from('tbl_ot_forms o');
		$this->db->join('tbl_employees e', 'e.emp_id = o.emp_id', 'left');
		$this->db->order_by('o.ot_date', 'desc')
		->where("o.status",'Pending');
		$query = $this->db->get();

		return $query->result_array();
	}
	public function getOtRequestwithId($id){
		$this->db->select('o.ot_id,e.first_name, e.last_name, o.date_filed, o.ot_date,
			o.total_hours, o.task,o.status');
		$this->db->from('tbl_ot_forms o');
		$this->db->join('tbl_employees e', 'e.emp_id = o.emp_id', 'left');
		$this->db->order_by('o.ot_date', 'desc')
		->where("e.emp_id",$id);
		$query = $this->db->get();

		return $query->result_array();
	}
	public function getList($id){
		$this->db->select('o.date_filed,o.supervisor_id,o.time_start,o.time_end,o.task,o.ot_date,o.total_hours,o.remarks,o.ot_id')
		->from('tbl_ot_forms as o')
		->join('tbl_employees as e','e.emp_id = o.emp_id')
		->where('o.ot_id',$id);

		$query = $this->db->get();

		return $query->result_array();
	}
	public function update_ot($id){
		$final = array(
				'status'=>'approved'
			);
		$this->db->where('ot_id', $id)
		->update('tbl_ot_forms', $final);
		return true;
	}
	public function updateOt($id,$data){

		$this->db->where('ot_id',$id)
		->update('tbl_ot_forms',$data);

		return true;

	}
	public function getEmpid(){
		$this->db->select()
		->from('tbl_employees');

		$query =  $this->db->get();

		return $query->result_array();
	}
	public function cancel_request($id){
		$final = array(
				'status'=>'Cancelled'
			);
		$this->db->where('ot_id', $id)
		->update('tbl_ot_forms', $final);
		return true;

	}
}


?>