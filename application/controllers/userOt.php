<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed!');

class UserOt extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('url');
		$this->load->library('form_validation');
	}

	public function index(){
		//$this->load->view('common/head');
		$this->load->view('common/UserSidebar');
		$this->load->view('users/OT');
	}
}
?>
