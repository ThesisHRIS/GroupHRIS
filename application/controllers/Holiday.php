<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed!');

class Holiday extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('MdHolidays');
	}

	public function index(){
		if($this->session->userdata('emp_id')){
			if($this->session->userdata('type')==='1'){
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
		$data['holidayList']= "active";
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
		$data['company'] = $this->MdHolidays->getCompany();
		$this->load->view('pages/configuration_module/add_holiday_view',$data);
		$this->load->view('common/foot');
		$this->load->view('common/footer');
		}else{
			redirect('userDashboard');
		}

	}else{
			redirect('/');
		}
	}
	public function add(){
		$array = array(
				'holiday_name'=>$this->input->post('holiday_name'),
				'holiday_date'=>$this->input->post('date'),
				'holiday_type'=>$this->input->post('holiday_type'),
				'company'=>$this->input->post('company')
			);

		$query = $this->MdHolidays->insert($array);

		if($query){
			echo "<script>alert('Successfully Added')</script>";
			// echo "<script>window.location = '/Holiday'</script>";
			redirect('Holiday');
		}else{

		}
	}
}
?>
