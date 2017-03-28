<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed!');

class Votation extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('Leave_form_model');
		$this->load->model('MdFiles');
		$this->load->library('encrypt');
	}

	public function index(){
		if($this->session->userdata('emp_id')){
			if($this->session->userdata('type')!='1'){
			$data['title'] = "Dashboard";
			$data['proposals'] = "active";
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
			$data['sess_email'] = $this->session->userdata('email');
			// $data['email'] = $this->session->userdata('email');
			$this->load->view("common/head",$data);
			$this->load->view("common/header");
			$this->load->view("common/userNav");
			$data['emp_id']= $this->Leave_form_model->getEmp_idList($this->session->userdata('emp_id'));
			$data['activity']= $this->Leave_form_model->getGameJoined();
			$data['supervisor']= $this->Leave_form_model->getSupervisor();
			$data['myActivity']= $this->Leave_form_model->getGameJoined();
			// print_r($data);
			$this->load->view('pages/gamification/votation',$data);
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
	public function createVote(){
		$arrNew = array();
		$contactName = parse_str($_GET['data'], $arrNew);
		$array = array(
			// 'emp_id'=>$this->session->userdata('emp_id'),
			'emp_id'=>$this->session->userdata('emp_id'),
			'points'=>'1',
			'activity_id'=>$arrNew['activity'],
			'vote_emp_id'=>$arrNew['first']
		);
		$array1 = array(
			// 'emp_id'=>$this->session->userdata('emp_id'),
			'emp_id'=>$this->session->userdata('emp_id'),
			'points'=>'1',
			'activity_id'=>$arrNew['activity'],
			'vote_emp_id'=>$arrNew['second']
		);
		$array2 = array(
			// 'emp_id'=>$this->session->userdata('emp_id'),
			'emp_id'=>$this->session->userdata('emp_id'),
			'points'=>'1',
			'activity_id'=>$arrNew['activity'],
			'vote_emp_id'=>$arrNew['third']
		);
		// print_r($array);
		// for($i=0;$i<3;$i++){
			$query = $this->MdFiles->insertVote($array);
			$query1 = $this->MdFiles->insertVote($array1);
			$query2 = $this->MdFiles->insertVote($array2);

			if($query && $query1 && $query2){
				echo '1';
			}else{
				echo '0';
			}

		// }
	}
	
}
?>