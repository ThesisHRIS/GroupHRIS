<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed!');

class UserPayslip extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->model('Payroll_model');
		$this->load->model('MdFiles');
	}

	public function index(){
		// $this->load->view('common/head');
			$data['title'] = "Dashboard";
			$data['proposals'] = "";
			$data['payslip'] = "";
			$data['proposalsList'] ="active";
			$data['active201'] = "";
			$data['activeDash'] = "";
			$data['active201View']= ""; 
			$data['salaryConfig']= ""; 
			$data['leaveRequest']= "";
			$data['leaveHistory']= "";
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
			$data['leaveHistoryForm']= "";
			$data['OtRequestFormHIstory']= "";
			$data['setting']= "";
			$data['sess_email'] = $this->session->userdata('email');
			// $data['email'] = $this->session->userdata('email');
			$this->load->view("common/head",$data);
			$this->load->view("common/header");
			$this->load->view("common/userNav");
			$data['payroll'] = $this->getInfo();
			// $data['payroll'] = $this->MdFiles->getPayroll($this->session->userdata('emp_id'));
			$this->load->view('users/print',$data);
			$this->load->view('common/foot');
			$this->load->view('common/footer');
	
	}
	public function getInfo()
	{
		 $month = $this->input->Post('month');
		 $term = $this->input->Post('term');
		 $year = $this->input->Post('years');
		$query = $this->MdFiles->getPayrollPaySlip($term,$month,$year,$this->session->userdata['emp_id']);
		return $query;
	}
}
?>
