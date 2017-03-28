<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* NAME : Reports Controller
* TYPE : Controller
* DEVELOPER : Filjumar Jumamoy
* DATE DEVELOPED: 
* DESCRIPTION: 
*/

class Reports extends CI_Controller {

	var $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MdReports');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
	} 
	//index proposal
	public function index()
	{
		if($this->session->userdata('user_id')!=false){
			redirect('Reports/mSalevsQouta');
		}else{
			redirect('/');
		}
	}
	// monthlySaleVsQouta
	public function mSalevsQouta()
	{
		if($this->session->userdata('user_id')!=false){
			$data['title'] = "Reports|Monthly Sale vs Qouta";
			$data['sess_email'] = $this->session->userdata('email');
			$data['activeClients'] = "";
			$data['activeDash'] = "";
			$data['activeClientsList']= ""; 
			$data['proposals']= ""; 
			$data['proposalsList']= "";
			$data['sales']= "";
			$data['salesList']= ""; 
			$data['commSales']= "";
			$data['salesVsquota']= "active";
			$data['commissionable']= "";
			$this->load->view("common/head",$data);
			$this->load->view("common/header");
			$this->load->view("common/nav");
	            $this->load->view("pages/reports/mSale_vs_qouta",$data);
			$this->load->view("common/foot");
			$this->load->view("common/footer");
		}else{
			redirect('/');
		}
	}
	// Commissionable Sales
	public function commissionableSale()
	{
		if($this->session->userdata('user_id')!=false){
			$data['title'] = "Reports|Commissionable Sales";
			$data['sess_email'] = $this->session->userdata('email');
			$data['activeClients'] = "";
			$data['activeClientsList']= ""; 
			$data['proposals']= ""; 
			$data['proposalsList']= "";
			$data['sales']= "";
			$data['salesList']= ""; 
			$data['commSales']= "";
			$data['salesVsquota']= "";
			$data['commissionable']= "active";
			$data['activeDash'] = "";
			$this->load->view("common/head",$data);
			$this->load->view("common/header");
			$this->load->view("common/nav");
	            $this->load->view("pages/reports/commissionableSale",$data);
			$this->load->view("common/foot");
			$this->load->view("common/footer");
		}else{
			redirect('/');
		}
	}
}

?>