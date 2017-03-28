<?php 
		if(!defined('BASEPATH')) exit('No direct script access allowed!');

/**
* 
*/
class timeIn_timeOut extends CI_Controller
{
	
	function __construct(argument)
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('dtr_model');
	}

	public function import(){
		
	}
}

 ?>