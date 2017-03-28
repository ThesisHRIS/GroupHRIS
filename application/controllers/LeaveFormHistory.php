<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed!');

class LeaveFormHistory extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->model('leave_form_model');
		$this->load->model('Leave_form_model');
	}

	public function index(){
		if($this->session->userdata('emp_id')){
			if($this->session->userdata('type')!='1'){
			$data['title'] = "Dashboard";
			$data['proposals'] = "";
			$data['payslip'] = "";
			$data['proposalsList'] = "";
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
			$data['leaveHistoryForm']= "active";
			$data['OtRequestFormHIstory']= "";
			$data['setting']= "";
			$data['sess_email'] = $this->session->userdata('email');
			$data['email'] = $this->session->userdata('email');
			$data['emp_id']= $this->leave_form_model->getEmp_idList($this->session->userdata('emp_id'));
			$data['leavelist'] = $this->leave_form_model->getLeaveListWithId($this->session->userdata('emp_id'));
			$data['supervisor']= $this->Leave_form_model->getSupervisor();
			$this->load->view("common/head",$data);
			$this->load->view("common/header");
			$this->load->view("common/userNav");
			$this->load->view('users/leaveFormHistory',$data);
			$this->load->view('modal/editModal',$data);
			$this->load->view('common/foot');
			$this->load->view('common/footer');
			}else{
			redirect('Dashboard');
		}

	}else{
			redirect('/');
		}
	
	}

	
}
?>