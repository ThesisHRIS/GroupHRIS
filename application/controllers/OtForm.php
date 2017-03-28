<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed!');

class OtForm extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('ot_form_model');
		// $this->load->model('');
	}

	public function index(){
		if($this->session->userdata('emp_id')){
			if($this->session->userdata('type')!='1'){
			$data['title'] = "OT Form";
			$data['proposals'] = "";
			$data['proposalsList'] = "";
			$data['active201'] = "";
			$data['payslip'] = "";
			$data['activeDash'] = "";
			$data['active201View']= ""; 
			$data['salaryConfig']= ""; 
			$data['leaveRequest']= "";
			$data['leaveHistory']= "";
			$data['leaveIncentives']= "";
			$data['leaveSummary']= "";
			$data['OtRequestForm']= "active";
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
			$this->load->view("common/head",$data);	
			$this->load->view("common/header");
			$this->load->view("common/userNav");
			$data['emp_id'] =  $this ->ot_form_model->getEmpid();
			$data['supervisor']= $this->ot_form_model->getSupervisor();
			$this->load->view('pages/leave_ot_module/ot_form_view' ,$data);
			$this->load->view('common/foot');
			$this->load->view('common/footer');
			}else{
			redirect('Dashboard');
		}

	}else{
			redirect('/');
		}
	}

	public function save(){
		
		if($this->input->post('submit')){
			if($this->input->post('supervisor_id')!="0"){
				$this->ot_form_model->process();
				redirect('otForm');
			}else{
				echo "<script>alert('hello');</script>";
				echo "<script>history.go(-1);</script>";
			}
		}

		
	}
}

?>