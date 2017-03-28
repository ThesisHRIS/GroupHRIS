<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

class Leave_form_model extends CI_Model{
	public function __construct()
	{
		parent:: __construct();
	}

	public function process(){
		$leaveId = $this->input->post('leave_id');
		$empId = $this->input->post('emp_id');
		$supervisorId = $this->input->post('supervisor_id');
		$dateFiled = $this->input->post('datefiled');
		$startDate = $this->input->post('start_date');
		$endDate = $this->input->post('end_date');
		$days = $this->input->post('days');
		$type = $this->input->post('type');
		$comments = $this->input->post('comments');
		$status = $this->input->post('status');

		$data = array(
			// 'leave_id' => $leaveId,
			'emp_id' => $this->session->userdata('emp_id'),
			'supervisor_id' => $supervisorId,
			'date_filed' => $dateFiled,
			'start_date' => $startDate,
			'end_date' => $endDate,
			'days' => $days,
			'type' => $type,
			'comments' => $comments,
			'status' => 'Pending'
			);
		$this->db->insert('tbl_leave_forms',$data);
		return true;
	}
	public function leaveCount($id){
		$this->db->select()
		->from('tbl_leave_forms')
		->where('emp_id',$id);

		$query = $this->db->get();

		return $query->result_array();
	}
	public function getActivity(){
		$this->db->select()
		->from('tbl_activity');
		$query = $this->db->get();

		return $query->result_array();
	}
	public function getSupervisor(){
		$this->db->select()
		->from('tbl_supervisor_list');
		$query = $this->db->get();

		return $query->result_array();
	}

	public function getLeaveList(){
		$this->db->select('leave_id, emp_id, supervisor_id, date_filed, start_date, end_date, days, type, comments, status,remarks');
		$this->db->from('tbl_leave_forms');
		$query = $this->db->get();

		return $query->result_array();
	}

	public function getLeaveRequest(){
		$this->db->select('l.leave_id,e.first_name, e.last_name, l.date_filed, l.start_date, l.end_date, l.days, l.type,
			l.comments, l.status');
		$this->db->from('tbl_leave_forms l');
		$this->db->join('tbl_employees e', 'e.emp_id = l.emp_id', 'left');
		//$where = "status='pending' AND status='tbd'";
		//$this->db->where($where);
		$this->db->order_by('l.date_filed','desc');
		$this->db->where('l.status','Pending');
		$query= $this->db->get();

		return $query->result_array();
	}
	public function getLeaveListWithId($id){
		$this->db->select('l.leave_id,e.first_name, e.last_name, l.date_filed, l.start_date, l.end_date, l.days, l.type,
			l.comments, l.status,l.supervisor_id');
		$this->db->from('tbl_leave_forms l');
		$this->db->join('tbl_employees e', 'e.emp_id = l.emp_id', 'left');
		//$where = "status='pending' AND status='tbd'";
		//$this->db->where($where);
		$this->db->order_by('l.date_filed','desc');
		$this->db->where('e.emp_id',$id);
		// $this->db->where('l.status','Pending');
		$query= $this->db->get();

		return $query->result_array();
	}
	public function getList($id){
		$this->db->select('')
		->from('tbl_leave_forms' )
		->where('leave_id',$id);

		$query= $this->db->get();

		return $query->result_array();
	}
	public function update_request($id){
		$final = array(
				'status'=>'Approved'
			);
		$this->db->where('leave_id', $id)
		->update('tbl_leave_forms', $final);
		return true;

	}
	public function cancel_request($id){
		$final = array(
				'status'=>'Cancelled'
			);
		$this->db->where('leave_id', $id)
		->update('tbl_leave_forms', $final);
		return true;

	}
	public function decline_request($id,$data){
		$final = array(
				'status'=>'Decline',
				'remarks'=>$data,
			);
		$this->db->where('leave_id', $id)
		->update('tbl_leave_forms', $final);
		return true;
	}
	public function getEmp_id(){
		$this->db->select()
		->from('tbl_employees');

		$query =  $this->db->get();

		return $query->result_array();
	}
	public function getEmp_idList($id){
		$this->db->select()
		->from('tbl_employees');

		$query =  $this->db->get();

		return $query->result_array();
	}
	public function getProfile(){
		$this->db->select('profilePath,folder')
		->from('tbl_employees')
		->where('emp_id',$this->session->userdata('emp_id'));

		$query = $this->db->get();

		return $query->result_array();

	}
	public function updateLeave($id,$data){
		$this->db->where('leave_id', $id)
		->update('tbl_leave_forms', $data);
		return true;
	}
	public function insertLeave($data){
		$this->db->insert('tbl_leave_forms',$data);
		return true;
	}
	public function getGameJoined(){
		$this->db->select()
		->from('tbl_points_history as history')
		->join('tbl_activity as activity','history.activity_id = activity.id')
		->where('emp_id', $this->session->userdata('emp_id'));

		$query= $this->db->get();

		return $query->result_array();
	}
}



?>