<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* NAME : Sales Controller
* TYPE : Controller
* DEVELOPER : Nico Cambelisa
* DATE DEVELOPED: 
* DESCRIPTION: 
*/

class SalesCommission extends CI_Controller {

	var $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MdCollections');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
	} 

	public function index(){
		if($this->session->userdata('user_id')!=false){
			$data['title'] = "Sales|New Sales";
			$data['sess_email'] = $this->session->userdata('email');
			$data['activeClients'] = "";
			$data['activeDash'] = "";
			$data['activeClientsList']= ""; 
			$data['proposals']= ""; 
			$data['proposalsList']= "";
			$data['sales']= "active";
			$data['salesList']= ""; 
			$data['salesVsquota']= "";
			$data['commissionable']= "";
			$this->load->view("common/head",$data);
			$this->load->view("common/header");
			$this->load->view("common/finance_nav");
			$data['fetchCollection'] = $this->MdCollections->Collection_List($this->session->userdata('user_id'));
			$data['fetchAll']= $this->MdCollections->fetchAll();
			// print_r($data);
			$this->load->view('pages/reports/salesCommission',$data);

			$this->load->view('common/foot');
			$this->load->view('common/footer');
		}else{
			redirect('/');
		}
	}
	public function autoSe(){
	 	//$selected = $this->input->get('name');
		$data = $this->MdBills->autoSelect( $this->input->get('name'));
		echo json_encode($data);
		// print_r($data);
	}
	public function reg(){
	 	//$selected = $this->input->get('name');
		$data = $this->MdBills->autoreg( $this->input->get('val'));
		echo $success = json_encode($data);
	}
}