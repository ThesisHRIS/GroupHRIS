<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* NAME : Clients Controller
* TYPE : Controller
* DEVELOPER : Filjumar Jumamoy
* DATE DEVELOPED: 
* DESCRIPTION: 
*/

class Clients extends CI_Controller {

	var $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MdClients');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
	} 
	//index Clients
	public function index()
	{
		if($this->session->userdata('user_id')!=false){
			$data['title'] = "New Client";
			$data['sess_email'] = $this->session->userdata('email');
			$data['activeClients'] = "active";
			$data['activeDash'] = "";
			$data['activeClientsList']= ""; 
			$data['proposals']= ""; 
			$data['proposalsList']= ""; 
			$data['sales'] = "";
			$data['salesList']= "";
			$data['salesVsquota']= "";
			$data['commissionable']= "";
			$this->load->view("common/head",$data);
			$this->load->view("common/header");
			$this->load->view("common/nav");
			
	            $this->load->view("pages/clients/new_clients");
	       
			$this->load->view("common/foot");
			$this->load->view("common/footer");
		}else{
        	redirect('/');
        }
	}
	//get clients form
	public function saveClient()
	{
		ini_set('max_execution_time', 0); 
        date_default_timezone_set('Asia/Manila');
        $date = date('d.M.Y');
        $date_str = date('h:i a').', '.date("jS F, Y", strtotime($date));
        //validation
        $this->form_validation->set_rules('com_name', 'Company Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('position', 'Position', 'trim|required|xss_clean');

		$sess_id= $this->session->userdata('user_id');
		$com_name = $this->input->post('com_name');
		$cont_name = $this->input->post('fname').' '.$this->input->post('lname');
		$address = $this->input->post('fname');
		$position = $this->input->post('position');
		$contact_nos = $this->input->post('mobile').",".$this->input->post('phone');
		$emails = $this->input->post('personal_email').",".$this->input->post('work_email').",".$this->input->post('com_email');
		$bdate = $this->input->post('date');
		$value = $this->input->post('value');

		$array = array(
			'sales_user_id' => $sess_id,
			'company_name' => $com_name,
			'contact_name' => $cont_name,
			'address' => $address,
			'position' => $position,
			'contact_no' => $contact_nos,
			'email' => $emails,
			'bdate' => $bdate,
			'value' => $value,
			'date_inquired' => $date_str
			);
		// submit
		$s_client = $this->MdClients->saveNew($array);
		if($s_client)
		{
			$this->session->set_flashdata('msg', 'Client '.$cont_name.' successfully added as new client.');
		}else{
			$this->session->set_flashdata('msg', 'Error in adding new client.');
		}
		
		$this->session->flashdata('msg');
	 	redirect(base_url().'Clients');
	}

}

;?>