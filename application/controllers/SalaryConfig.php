<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed!');

class SalaryConfig extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->model('MdFiles');
	}

	public function index(){

		$data['title'] = "Add 201 Files";
			$data['proposals'] = "";
			$data['proposalsList'] = "";
			$data['active201'] = "active";
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
			$data['sess_email'] = $this->session->userdata('email');
			$data['email'] = $this->session->userdata('email');
			$data['sess_email'] = $this->session->userdata('email');
			$data['email'] = $this->session->userdata('email');
			$this->load->view("common/head",$data);
			$this->load->view("common/header");
			$this->load->view("common/nav");
			// echo $this->input->get('emp_id');

			$data['data'] =  $this->MdFiles->getInfo($this->input->get('emp_id'));
			$data['salary'] =  $this->MdFiles->getSalary($this->input->get('emp_id'));
			// echo "<script>alert(print_r($data));</script>";
			// print_r($data);
			$this->load->view('pages/file_201_module/view_salary_config',$data);
			$this->load->view('common/foot');
			$this->load->view('common/footer');
	}
	public function getAllCompany(){

		return $this->MdFiles->getAllCompany();
	}
}
?>

