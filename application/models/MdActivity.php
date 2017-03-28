<?php 
	defined('BASEPATH')or exit('NO direct script access allowed');

class MdActivity extends CI_Model
{
	public function __construct()
	{
		parent:: __construct();
	}

	public function create($array){
		$this->db->insert('tbl_activity', $array);
		return true;
	}
	public function createItem($array){
		$this->db->insert('tbl_item',$array);
		return true;
	}
	public function getItems(){
		$this->db->select()
		->from('tbl_item');

		$query = $this->db->get();

		return $query->result_array();
	}
public function getActivity(){
		$this->db->select()
		->from('tbl_activity');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function getEmp($lastname,$firstname){
		// return $firstname;
		$this->db->select('emp_id')
		->from('tbl_employees');
		$this->db->where('last_name',$lastname);
		// $this->db->where('first_name',$firstname);

		$query = $this->db->get();

		return $query->result_array();
	}
	public function insertTime($array){
		$this->db->insert('tbl_attendance', $array);
		return true;
	}
	public function deleteItem($id){
		$data = array(
				'status'=>'1'
			);
		$this->db->where('id', $id)
		->update('tbl_item', $data);
		return true;
	}
	public function update_game_status($id){
		$final = array(
				'status'=>'Ongoing'
			);
		$this->db->where('id', $id)
		->update('tbl_activity', $final);
		return true;
	}
	public function end_game($id){
		$final = array(
				'status'=>'Finished'
			);
		$this->db->where('id', $id)
		->update('tbl_activity', $final);
		return true;
	}
	public function get_game_joined(){

	}

	public function getId($email){
		$this->db->select('emp_id')
		->from('tbl_employees')
		->where('email', $email);

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_info(){
		$this->get->select()
		->from('tbl_votation');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function join($array){
		$this->db->insert('tbl_points_history', $array);
		return true;
	}
	public function getHistory(){
		$this->db->select()
		->from('tbl_points_history')
		->where('emp_id',$this->session->userdata('emp_id'));

		$query = $this->db->get();

		return $query->result_array();
	}

	public function getPlayers($game_id){
		
		$this->db->select('e.emp_id, e.first_name ,e.last_name, p.points, p.status, a.game_points')
		->from('tbl_points_history p')
		->join('tbl_employees e', 'p.emp_id = e.emp_id')
		->join('tbl_activity a', 'p.activity_id = a.id ')
		->where('activity_id', $game_id);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function approvePlayer($id, $game_id, $game_points){

		$this->db->set('points', 'points + ' . (int) $game_points, FALSE);
		$this->db->set('status', '1');
		$this->db->where('emp_id', $id);
		$this->db->where('activity_id',$game_id);
		$this->db->update('tbl_points_history');
		return true;
	}

	public function rejectPlayer($id, $game_id){
		$final = array(
				'status'=>'2'
			);
		$this->db->where('emp_id', $id)
		->where('activity_id',$game_id)
		->update('tbl_points_history', $final);
		return true;
	}

	public function addToOverAllPoints($id, $points){
		$this->db->set('points', 'points + ' . (int) $points, FALSE);
		$this->db->where('emp_id', $id);
		$this->db->update('tbl_points');
		return true;
	}



}

?>