<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* NAME : Mdprofile Model
* TYPE : Model
* DEVELOPER : Ronilo Cadenas
* DATE DEVELOPED: Start 12/14/15
* DESCRIPTION: 
*/

class Mdprofile extends CI_Model {

	var $response = false;

	// add user
	public function add_user($data)
	{
		if(!empty($data))
		{
			$this->db->insert(USERS,$data);
			$this->response = $this->db->insert_id();
		}
		return $this->response;
	}
	// add user group reference
	public function add_user_group_reference($data)
	{
		if(!empty($data))
		{
			$this->db->insert(USER_GROUP_REFERENCE,$data);
			$this->response = $this->db->insert_id();
		}
		return $this->response;
	}
	// listing user
	public function listing_user($where=false,$order=false,$select='*',$row=false)
	{
		if($where!=false)
		{
			$this->db->where($where);
		}
		if($order!=false)
		{
			$this->db->order_by($order);
		}

		$user = USERS;
		$user_group = USER_GROUPS;
		$user_ref = USER_GROUP_REFERENCE;

		$this->db->select($select,FALSE)->from($user.' us');
		$this->db->join($user_ref.' ur','ur.user_id=us.id');
		$this->db->join($user_group.' ug','ug.id=ur.group_id');
		if($row)
		{
			$this->response = $this->db->get()->row_array();
		}else
		{
			$this->response = $this->db->get()->result_array();
		}
		return $this->response;
	}
	// check if user exists already
	public function check_user_exists($data=array())
	{
		if(!empty($data))
		{
			$this->response = $this->db->select('id')->where($data)->get(USERS)->num_rows;
		}
		return $this->response >= 1 ? true : false;
	}
}