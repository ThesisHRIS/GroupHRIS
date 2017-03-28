<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* NAME : Login Model
* TYPE : CI_Model
* DEVELOPER : 
* DATE DEVELOPED: 
* DESCRIPTION: 
*/

class MdLog extends CI_Model {

	private $users_tbl = "users";

	public function __construct()
	{
		parent::__construct();
	}

	public function get_user($username)
	{
		$this->db->select();
		$this->db->from($this->users_tbl);
		$this->db->where('email',$username);
		$info = $this->db->get()->first_row('array');
		return $info;
	}
	// update last log
	public function updateLastLog($arrLog, $session_id)
	{
		$this->db->where('user_id', $session_id);
		$this->db->update($this->users_tbl, $arrLog);
		return true;
	}

}