<?php 
	defined('BASEPATH')or exit('NO direct script access allowed');

class MdDepartment extends CI_Model
{
	public function __construct()
	{
		parent:: __construct();
	}

	public function getAll(){

		$this->db->select()
		->from('tbl_department_list');

		$query = $this->db->get();
		return $query->result_array();
	}
	public function create($data){
		$this->db->insert('tbl_department_list',$data);
		return true;
	}
}

?>