<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* NAME : Dashboard Model
* TYPE : CI_Model
* DEVELOPER : Filjumar Jumamoy	
* DATE DEVELOPED: 01/18/16
* DESCRIPTION: Dashboard
*/

class MdDash extends CI_Model {

	private $table = "dashboard";
	private $client = "client";
	private $sales = "sales";
	public function __construct()
	{
		parent::__construct();
	}
	public function getProfile(){
		$this->db->select('profilePath,folder')
		->from('tbl_employees')
		->where('emp_id',$this->session->userdata('emp_id'));

		$query = $this->db->get();

		return $query->result_array();

	}
	public function getPoint(){
		$this->db->select()
		->from('tbl_points as pts')
		->join('tbl_employees as emp' , 'pts.emp_id = emp.emp_id','LEFT')
		->order_by('pts.points','DESC')
		->LIMIT('10');
		// ->where('emp.isAdmin <= 0');

		$query= $this->db->get();

		return $query->result_array();
	}
	public function updatePoints($id,$final){
		$this->db->where('emp_id', $id)
		->update('tbl_points', $final);
		return true;
	}
	public function updatePoints2($id, $final){
		$this->db->where('emp_id', $id)
		->update('tbl_points_history', $final);
		return true;
	}

	public function insertHistory($array){
		$this->db->insert('tbl_claim_history',$array);
		return true;
	}
	public function getPointOwner($id){
		$this->db->select()
		->from('tbl_points as pts')
		->join('tbl_employees as emp' , 'pts.emp_id = emp.emp_id','LEFT')
		->where('emp.emp_id',$id);

		$query= $this->db->get();

		return $query->result_array();
	}
	public function getItem(){
		$this->db->select()
		->from('tbl_item');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function getTopTen(){
		$this->db->select('e.first_name, e.last_name, ph.points')
		->from('tbl_points as ph')
		->join('tbl_employees as e', 'ph.emp_id = e.emp_id')
		->order_by('ph.points', 'desc')
		->limit(10);

		$query = $this->db->get();
		return $query->result_array	();
	}

	public function countPreparedGames(){
		$this->db->select()
		->from('tbl_activity')
		->where('status', 'Preparing Game');

		$query = $this->db->get();

		return $query->num_rows();
	}

	public function countOngoingGames(){
		$this->db->select()
		->from('tbl_activity')
		->where('status', 'Ongoing');

		$query = $this->db->get();

		return $query->num_rows();
	}

	public function countItems(){
		$this->db->select()
		->from('tbl_item');


		$query = $this->db->get();

		return $query->num_rows();
	}

	public function getPoints($id){
		$this->db->select('points')
		->from('tbl_points')
		->where('emp_id', $id);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function getClaimInfo(){
		$this->db->select('e.first_name, e.last_name, i.item, ch.date, ch.status, ch.claim_history_id')
		->from('tbl_employees e')
		->join('tbl_claim_history ch', 'e.emp_id = ch.emp_id')
		->join('tbl_item i', 'ch.item_id = i.id');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function confirmItemClaim($id){

		$array = array(
			'status'=> '1'
		);
		$this->db->where('claim_history_id', $id)
		->update('tbl_claim_history', $array);

		return true;
	}

	public function countActivities(){
		$this->db->select()
		->from('tbl_activity');

		$query = $this->db->get();

		return $query->num_rows(); 
	}

	public function countEmployee(){
		$this->db->select()
		->from('tbl_employees');

		$query = $this->db->get();

		return $query->num_rows();
	}

	public function countLeave(){
		$this->db->select()
		->from('tbl_leave_forms')
		->where('status', 'Pending');

		$query = $this->db->get();

		return $query->num_rows();
	}

	public function getLeaveRequests(){
		$this->db->select()
		->from('tbl_leave_forms')
		->join('tbl_employees', 'tbl_leave_forms.emp_id = tbl_employees.emp_id')
		->where('tbl_leave_forms.status', 'Pending');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function getOtRequests(){
		$this->db->select()
		->from('tbl_ot_forms')
		->join('tbl_employees', 'tbl_ot_forms.emp_id = tbl_employees.emp_id')
		->where('tbl_ot_forms.status', 'pending');

		$query = $this->db->get();

		return $query->result_array();
	}
}

;?>