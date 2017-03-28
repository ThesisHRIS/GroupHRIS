<?php 
	defined('BASEPATH')or exit('NO direct script access allowed');

class MdHolidays extends CI_Model
{
	public function __construct()
	{
		parent:: __construct();
	}

	public function getCompany(){
		$this->db->select()
		->from('tbl_company');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function insert($data){
		$this->db->insert('tbl_holiday', $data);
		return true;
	}

	public function getAll(){

		$this->db->select()
		->from('tbl_holiday as hol')
		->join('tbl_company as com','com.company_id = hol.company','LEFT');

		$query =  $this->db->get();

		return $query->result_array();
	}

	public function deleteHoliday($id){
		$array = array(
			'holiday_id'=> $id
		);
		$this->db->delete('tbl_holiday', $array);
	}

	public function updateHoliday($id, $data){
		$this->db->where('leave_id', $id)
		->update('tbl_leave_forms', $final);

		return true;
	}
}
?>