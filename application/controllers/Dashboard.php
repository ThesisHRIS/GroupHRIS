<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed!');

class Dashboard extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('MdDash');
	}

	public function index(){
		if($this->session->userdata('emp_id')){
			if($this->session->userdata('type')==='1'){
			$data['title'] = "Dashboard";
			$data['dashboard'] = "";
			$data['proposals'] = "";
			$data['proposalsList'] = "";
			$data['active201'] = "";
			$data['activeDash'] = "active";
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
			$data['itemList']= "";
			$data['supervisor']= "";
			$data['department']= "";
			$data['sess_email'] = $this->session->userdata('email');
			$data['email'] = $this->session->userdata('email');
			$this->load->view("common/head",$data);
			$this->load->view("common/header");
			$this->load->view("common/nav");
			$data['items'] = $this->MdDash->countItems();
			$data['claimInfo']= $this->MdDash->getClaimInfo();
			$data['activity']=$this->MdDash->countActivities();
			$data['employee']=$this->MdDash->countEmployee();
			$data['leaves']=$this->MdDash->countLeave();
			$data['leave_request'] = $this->MdDash->getLeaveRequests();
			$data['ot_forms'] = $this->MdDash->getOtRequests();
			$this->load->view('pages/dashboard/dashboard',$data);
			$this->load->view('common/foot');
			$this->load->view('common/footer');
		}else{
			redirect('userDashboard');
		}

	}else{
			redirect('/');
		}
		}

		public function confirmItemClaim(){
			$query = $this->MdDash->confirmItemClaim($this->input->get('id'));

			if($query){
				echo '1';
			} else {
				echo '0';
			}
		}
}
?>