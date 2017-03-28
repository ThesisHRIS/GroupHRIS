<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed!');

class AddSupervisor extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->model('MdSupervisor');
	}

	public function index(){
			$data['title'] = "Dashboard";
			$data['proposals'] = "";
			$data['proposalsList'] = "";
			$data['active201'] = "";
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
			$data['activity']= "";
			$data['activityList']= "";
			$data['item']= "";
			$data['itemList']= "";
			$data['holidayList']= "";
			$data['supervisor']= "active";
			$data['department']= "";
			$data['sess_email'] = $this->session->userdata('email');
			$data['email'] = $this->session->userdata('email');
			$this->load->view("common/head",$data);
			$this->load->view("common/header");
			$this->load->view("common/nav");
			$data['department']= $this->MdSupervisor->getDepartment();
			$this->load->view('pages/configuration_module/addSupervisor',$data);
			$this->load->view('common/foot');
			$this->load->view('common/footer');
	}
	public function add(){

			$data = array(
					'supervisor_no'=>$this->input->post('supervisor_no'),
					'supervisor_last_name'=>$this->input->post('last_name'),
					'supervisor_first_name'=>$this->input->post('first_name'),
					'department'=>$this->input->post('department')
				);

			$query = $this->MdSupervisor->insert($data);

			if($query){
				echo "1";
			} else {
				echo "0";
			}

	}
}
?>
