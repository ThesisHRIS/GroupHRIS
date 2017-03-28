<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed!');

class View_201 extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('MdFiles');
		$this->load->library('encrypt');
	}

	public function index(){
			$data['title'] = "Dashboard";
			$data['proposals'] = "";
			$data['proposalsList'] = "";
			$data['active201'] = "";
			$data['activeDash'] = "";
			$data['active201View']= "active"; 
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
			$data['itemList']= "";
			$data['supervisor']= "";
			$data['department']= "";
			$data['sess_email'] = $this->session->userdata('email');
			$data['email'] = $this->session->userdata('email');
			$this->load->view("common/head",$data);
			$this->load->view("common/header");
			$this->load->view("common/nav");
			$data['fetchAll']= $this->getAll();
			$this->load->view('pages/file_201_module/201_view',$data);
			$this->load->view('modal/view_201');
			$this->load->view('common/foot');
			$this->load->view('common/footer');
	

	}

	public function getInfo(){
		$data= $this->MdFiles->getInfo($this->input->get('id'));
		echo $success = json_encode($data);
	}
	public function getAll(){
		$data = $this->MdFiles->getAllFiles();

		return $data;
	}
	public function fetch(){
		$var = $this->input->get('_getAtt');

		$data= $this->MdFiles->getInfo($var);
		echo $success = json_encode($data);
		
	}
}
?>