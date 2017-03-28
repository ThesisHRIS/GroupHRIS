<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed!');

class CashAdvance extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('cash_advance_model');
	}

	public function index(){
		if($this->session->userdata('emp_id')){
			if($this->session->userdata('type')==='1'){
			$data['title'] = "Cash Advance";
			$data['proposals'] = "";
			$data['proposalsList'] = "";
			$data['payslip'] = "";
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
			$data['cashAdvance']= "active";
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
			$data['data'] = $this->cash_advance_model->getRequest();
			$this->load->view('pages/loan_module/cash_advance_view', $data);
			$this->load->view('modal/ACDecline');
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
		$arrNew = array();
		$contactName = parse_str($_GET['data'], $arrNew);
		$data = array(
			// 'ca_id' => $caId,
			'emp_id' => $this->session->userdata('emp_id'),
			'date_filed' => $arrNew['date_filed'],
			'payment_start' => $arrNew['payment_start'],
		
			'amount' => $arrNew['amount'],
			'payment_terms' => $arrNew['payment_terms'],
			'pay_amount' => $arrNew['pay_amount'],
			'description' => $arrNew['description'],
			// 'is_paid' => $paid,
			'status' => 'Pending'

			);

		$this->load->model('cash_advance_model');
		if(in_array(null, $data)!='1'){
	
			$this->cash_advance_model->process($data);
			echo '1';
		}else{
			echo '0';
		}
		

	}
	public function getInfo(){

		// echo $attr_id;
		$resultClientList = $this->cash_advance_model->getList($_GET['_getAtt']);
		echo $success = json_encode($resultClientList);
	}
	public function get(){
		$query = $this->cash_advance_model->approve($_GET['this_id']);
		if($query){
			echo '1';
		}else{
			echo '0';
		}
	}
	public function declineCA(){
		$query = $this->cash_advance_model->decline($_GET['this_id'],$_GET['reason']);
		if($query){
			echo '1';
		}else{
			echo '0';
		}
	}
}
?>
