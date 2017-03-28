<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* NAME : Sales Model
* TYPE : CI_Model
* DEVELOPER : 
* DATE DEVELOPED: 
* DESCRIPTION: Dashboard
*/

class MdSupervisor extends CI_Model {

	private $table = "tbl_employees";

	public function __construct()
	{
		parent::__construct();
	}

	public function getAll(){
		$this->db->select()
		->from('tbl_supervisor_list');

		$query= $this->db->get();

		return $query->result_array();
	}
	public function getDepartment(){
		$this->db->select()
		->from('tbl_department_list');

		$query = $this->db->get();

	return $query->result_array();
	}

	public function insert($data){
		$this->db->insert('tbl_supervisor_list',$data);
		return true;
	}
	
}

?>