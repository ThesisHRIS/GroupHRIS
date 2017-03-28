<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed!');

class LeaveSummary extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('leave_form_model');
	}

	public function index(){
		$data['title'] = "Dashboard";
		$data['proposals'] = "";
		$data['proposalsList'] = "";
		$data['activeDash'] ="";
		$data['active201'] = "";
		$data['payslip'] = "";
		$data['activeDash'] = "";
		$data['active201View']= ""; 
		$data['salaryConfig']= ""; 
		$data['leaveRequest']= "";
		$data['leaveHistory']= "";
		$data['leaveIncentives']= "";
		$data['leaveSummary']= "active";
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
		$data['itemList']= "";
		$data['supervisor']= "";
		$data['department']= "";
		$data['sess_email'] = $this->session->userdata('email');
		$data['email'] = $this->session->userdata('email');
		$this->load->view("common/head",$data);
		$this->load->view("common/header");
		$this->load->view("common/nav");
		$data['leavesummary'] = $this->leave_form_model->getLeaveRequest();
		$this->load->view('pages/leave_ot_module/leave_summary_view', $data);
		$this->load->view("modal/Approved");
		$this->load->view('common/foot');
		$this->load->view('common/footer');
	}
}
?>
