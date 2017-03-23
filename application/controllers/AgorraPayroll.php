<?php 
   if(!defined('BASEPATH')) exit('No direct script access allowed!');
   
   class AgorraPayroll extends CI_Controller
   {
   public function __construct(){
   	parent::__construct();
   	$this->load->helper(array('form','url'));
   	$this->load->helper('url');
      $this->load->library('form_validation');
   	$this->load->library('encrypt');
   	$this->load->model('MdActivity');
   	$this->load->model('MdFiles');
   }
   
   public function index(){
   if($this->session->userdata('emp_id')){
   		if($this->session->userdata('type')==='1'){
   	$data['title'] = "Add 201 Files";
   	$data['proposals'] = "";
   	$data['proposalsList'] = "";
   	$data['active201'] = "";
   	$data['activeDash'] = "";
   	$data['active201View']= ""; 
   	$data['salaryConfig']= ""; 
   	$data['leaveRequest']= "";
   	$data['leaveHistory']= "";
   	$data['leaveIncentives']= "";
   	$data['leaveSummary']= "";
   	$data['OtRequest']= "";
   	$data['OtHistory']= "";
   	$data['viewSuspension']= "";
   	$data['suspendEmployee']= "";
   	$data['cashAdvance']= "";
   	$data['cashAdvanceHistory']= "";
   	$data['otherLoans']= "";
   	$data['otherLoansHistory']= "";
   	$data['calendar']= "";
   	$data['holiday']= "";
   	$data['holidayList']= "";
   	$data['activity']= "";
   	$data['activityList']= "";
   	$data['item']= "";
   	$data['proposalsList']="";
   	$data['proposals']= "active";
   	$data['itemList']= "";
   	$data['supervisor']= "";
   	$data['department']= "";
   	$data['sess_email'] = $this->session->userdata('email');
   	$data['email'] = $this->session->userdata('email');
   	$data['sess_email'] = $this->session->userdata('email');
   	$data['email'] = $this->session->userdata('email');
   	$this->load->view("common/head",$data);
   	$this->load->view("common/header");
   	$this->load->view("common/nav");
   	$data['payroll'] = $this->generatePayroll(); //print_r($data); 
      // print_r($data);
   	// $data['activity'] = $this->MdActivity->getActivity(); 
   	$this->load->view('pages/payroll_module/payroll_view',$data);
   	$this->load->view('common/foot');
   	$this->load->view('common/footer');
   	}else{
   		redirect('userDashboard');
   	}
   
   }else{
   		redirect('/');
   	}
   }
   
    public function generatePayroll(){
		$month = $this->input->Post('month');
		$term = $this->input->Post('term');
		$year = $this->input->Post('years');

		$result = $this->MdFiles->generatePayroll($term, $month, $year);
		return($result);
	
		
	}
   }
   
   

   ?>