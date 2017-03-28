<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed!');

class OtRequestHistory extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('ot_form_model');
		$this->load->library('encrypt');
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
			$data['leaveHistoryForm']= "";
			$data['setting']= "";
			$data['OtRequestFormHIstory']= "active";
			$data['sess_email'] = $this->session->userdata('email');
			$data['email'] = $this->session->userdata('email');
			$this->load->view("common/head",$data);
			$this->load->view("common/header");
			$this->load->view("common/userNav");
			$data['emp_id'] = $this->ot_form_model->getEmpid();
			$data['otrequest'] = $this->ot_form_model->getOtRequestwithId($this->session->userdata('emp_id'));
			$data['supervisor']= $this->ot_form_model->getSupervisor();
			// print_r($data);
			$this->load->view('users/otRequestForm', $data);
			$this->load->view('modal/EditOtRequest', $data);
			$this->load->view('common/foot');
			$this->load->view('common/footer');
			}else{
			redirect('Dashboard');
		}

	}else{
			redirect('/');
		}
	}
	public function getInfo(){
		$attr_id = $this->encrypt->decode($this->input->get('_getAtt'));
		$resultClientList = $this->ot_form_model->getList($attr_id);
		echo $success = json_encode($resultClientList);	
	}
	public function update_ot(){
		$query= $this->ot_form_model->update_ot($this->input->get('this_id'));
		if ($query) {
			echo '1';
		}else{
			echo '0';
		}
	}
	public function update(){
		$arrNew = array();
		$data = parse_str($_GET['data'], $arrNew);


		$array = array(
				// 'leave_id' => $_GET['id'],
				'date_filed'=>$arrNew['date_filed'],
				'ot_date'=>$arrNew['ot_date'],
				'time_start'=>$arrNew['time_start'],
				'time_end'=>$arrNew['time_end'],
				'total_hours'=>$arrNew['hours'],
				'supervisor_id'=>$arrNew['supervisor_id'],
				'task'=>$arrNew['task'],
			);

		// print_r($array);
		// echo in_array(null, $array);
	if($arrNew['supervisor_id']!='1'){
			// echo 'nico';
		if(in_array(null, $array)!='1'){
			// echo 'nico';
			if($this->ot_form_model->updateOt($_GET['id'],$array)){
				echo '1';
			}else{
				echo '0';
			}
		}else{
		echo '0';
		}
	}else{
		echo '0';
	}
	}
	public function save(){
		$arrNew = array();
		$data = parse_str($_GET['data'], $arrNew);


		$array = array(
				'emp_id' => $this->session->userdata('emp_id'),
				'date_filed'=>$arrNew['date_filed'],
				'ot_date'=>$arrNew['ot_date'],
				'time_start'=>$arrNew['time_start'],
				'time_end'=>$arrNew['time_end'],
				'total_hours'=>$arrNew['hours'],
				'supervisor_id'=>$arrNew['supervisor_id'],
				'task'=>$arrNew['task'],
				'status'=>'Pending'
			);

		// print_r($array);
		// echo in_array(null, $array);
	
			// echo 'nico';
			if($this->ot_form_model->saveOT($array)){
				echo '1';
			}else{
				echo '0';
			}
		
	}
}
?>
