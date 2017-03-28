<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed!');

class EmployeeSalary extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('MdUsers');
	}

	public function index(){
			$data['title'] = "Dashboard";
			$data['proposals'] = "";
			$data['proposalsList'] = "";
			$data['active201'] = "";
			$data['activeDash'] = "";
			$data['active201View']= ""; 
			$data['salaryConfig']= "active"; 
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
			$data['itemList']= "";
			$data['supervisor']= "";
			$data['department']= "";
			$data['sess_email'] = $this->session->userdata('email');
			$data['email'] = $this->session->userdata('email');
			$this->load->view("common/head",$data);
			$this->load->view("common/header");
			$this->load->view("common/nav");
			$data['data'] = $this->getEmployee();
		
			$this->load->view('pages/file_201_module/employee_salary_view',$data);
			$this->load->view('common/foot');
			$this->load->view('common/footer');
	}
	public function getEmployee(){
		return $this->MdUsers->getEmployee();
	}
}
?>