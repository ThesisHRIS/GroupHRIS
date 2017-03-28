<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* NAME : Clients Controller
* TYPE : Controller
* DEVELOPER : Filjumar Jumamoy
* DATE DEVELOPED: 
* DESCRIPTION: 
*/

class Commissionable extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MdReports');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
	} 
	public function index(){
		if($this->session->userdata('user_id')!=false){
			$data['activeClients'] = "";
			$data['activeClientsList']= ""; 
			$data['proposals']= ""; 
			$data['proposalsList']= "";
			$data['sales']= "";
			$data['salesList']= ""; 
			$data['commSales']= "";
			$data['salesVsquota']= "";
			$data['commSales']= "";
			$data['activeDash'] = "";
			$data['commissionable'] = "active";
			$data['title'] = "commissionableSale";
			$data['sess_email'] = $this->session->userdata('email');
			$this->load->view("common/head",$data);
			$this->load->view("common/header");
			$this->load->view("common/nav");
			$data['fetchpayment']= $this->MdReports->getData($this->session->userdata('user_id'));
		
	        $this->load->view("pages/reports/commissionableSale",$data);
	       
			$this->load->view("common/foot");
			$this->load->view("common/footer");
		}else{
        	redirect('/');
        }
	}
	public function listByFrom(){
		$year=$this->input->get('val3');
		$from= $this->input->get('val1');
		$to = $this->input->get('val2');
		$val=$to+1;
		$data = $this->MdReports->getList($year,$from,$val);

		
		echo $result = json_encode($data);
	}
	
}

?>