<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed!');

class UserActivityList extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('MdActivity');
	}

	public function index(){
		if($this->session->userdata('emp_id')){
			if($this->session->userdata('type')!='1'){
			$data['title'] = "Dashboard";
			$data['proposals'] = "";
			$data['proposalsList'] = "";
			$data['payslip'] = "";
			$data['active201'] = "";
			$data['activeDash'] = "";
			$data['active201View']= ""; 
			$data['salaryConfig']= "active"; 
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
			$data['userActivityList']= "";
			$data['sess_email'] = $this->session->userdata('email');
			$this->load->view("common/head",$data);
			$this->load->view("common/header");
			$this->load->view("common/userNav");
			$data['activity']=$this->MdActivity->getActivity();
			$data['history']=$this->MdActivity->getHistory();
			$this->load->view('pages/gamification/userActivityList',$data);
			$this->load->view('modal/price');
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
		$arrnew= array();
		// $contactName = parse_str($_GET['activity_id'], $arrNew);

		$array = array(
			'emp_id'=> $this->session->userdata('emp_id'),
			'activity_id'=> $_GET['activity_id'],
			'points'=> 0
		);

		$query = $this->MdActivity->join($array);

		if($query){
			echo "1";
		} else {
			echo "0";
		}
	}

}
?>