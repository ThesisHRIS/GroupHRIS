<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed!');

class UserLeaveRequest extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('url');
		$this->load->library('form_validation');
	}

	public function index(){
		//$data['title'] = "Dashboard";
			$data['proposals'] = "";
			$data['proposalsList'] = "";
			$data['active201'] = "";
			$data['payslip'] = "";
			$data['activeDash'] = "";
			$data['active201View']= ""; 
			$data['salaryConfig']= ""; 
			$data['leaveRequest']= "";
			$data['leaveHistory']= "active";
			$data['leaveIncentives']= "";
			$data['leaveSummary']= "";
			$data['OtRequestForm']= "";
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
			$data['sess_email'] = $this->session->userdata('email');
			// $data['email'] = $this->session->userdata('email');
			$this->load->view("common/head",$data);
			$this->load->view("common/header");
			$this->load->view("common/userNav");
			$this->load->view('users/requests');
			$this->load->view('common/foot');
			$this->load->view('common/footer');
	
	}
	public function saveForm(){
		echo $this->input->post('name');
		echo $this->input->post('date');
		echo $this->input->post('position');
		echo $this->input->post('department');
		echo $this->input->post('leave');
		echo $this->input->post('sdate');
		echo $this->input->post('edate');
		echo $this->input->post('daysRequested');
		echo $this->input->post('reasons');

		$data= array(
				

			);
	}
}
?>
