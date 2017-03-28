<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed!');

class HolidayList extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
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
			$data['activity']= "";
			$data['activityList']= "";
			$data['item']= "";
			$data['itemList']= "";
			$data['holidayList']= "active";
			$data['supervisor']= "";
			$data['department']= "";
			$data['sess_email'] = $this->session->userdata('email');
			$data['email'] = $this->session->userdata('email');
			$this->load->view("common/head",$data);
			$this->load->view("common/header");
			$this->load->view("common/nav");
			$data['list']= $this->MdHolidays->getAll();
			$data['company'] = $this->MdHolidays->getCompany();
			$this->load->view('pages/configuration_module/holiday_list_view',$data);
			$this->load->view('modal/editHoliday');
			$this->load->view('common/foot');
			$this->load->view('common/footer');
			}else{
			redirect('userDashboard');
		}

	}else{
			redirect('/');
		}
	}

	public function getInfo(){

		$attr_id = $this->input->get('id');
		$resultClientList = $this->MdHolidays->getAll($attr_id);
		echo $success = json_encode($resultClientList);
	}

	public function deleteHoliday(){
		$query = $this->MdHolidays->deleteHoliday($this->input->get('id'));

		echo $success = json_encode($query);
	}

	public function updateHoliday(){
		$arrNew = array();
		$contactName = parse_str($_GET['data_upd'], $arrNew);

		$array = array(
			'holiday_name'=>$arrNew['holiday_name'],
			'holiday_date'=>$arrNew['holiday_date'],
			'holiday_type'=>$arrNew['holiday_type'],
			'company'=>$arrNew['company']
		);

		print_r($array);

		$query = $this->MdHolidays->updateHoliday($arrNew['holidayId'], $array);
	}

}
?>
