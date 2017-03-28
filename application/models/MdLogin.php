<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class MdLogin extends CI_Model {

	private $table = "tbl_employees";

	public function __construct()
	{
		parent::__construct();
	
	}
	public function getUsers($username){
		$this->db->select('')
		->from('tbl_employees')
		->where('email',$username);

		$query=$this->db->get();

		return $query->result_array();
	}
}

?>