<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* NAME : Dashboard Controller
* TYPE : Controller
* DEVELOPER : Filjumar Jumamoy
* DATE DEVELOPED: 
* DESCRIPTION: Home / Dashboard
*/

class Finance extends CI_Controller {

	var $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MdDash');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
	} 
	//index mail
	public function index()
	{
		if($this->session->userdata('user_id')!=false){
			$data['title'] = "finance_dashboard";
			$data['sess_email'] = $this->session->userdata('email');
			$data['activeDash']= "active";
			$data['activeClients']= "";
			$data['activeClientsList']= "";
			$data['proposals']= ""; 
			$data['proposalsList']= ""; 
			$data['sales']= "";
			$data['salesList']= "";
			$data['salesVsquota']= "";
			$data['commissionable']= "";
			$this->load->view("common/head",$data);
			$this->load->view("common/header");
			$this->load->view("common/finance_nav");
			
				// $data['tot_clients'] = $this->MdDash->getTotalClients();
				$data['fetchAll'] = $this->MdDash->fetchAll();
				// print_r($data);
	            $this->load->view("pages/dashboard/finance_dashboard", $data);
	       
			$this->load->view("common/foot");
			$this->load->view("common/footer");
		 }else{
        	redirect('/');
        }
	}
}

;?>