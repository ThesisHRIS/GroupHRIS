<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed!');

class Activity extends CI_Controller
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
			if($this->session->userdata('type')==='1'){
		$data['title'] = "Add 201 Files";
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
			$data['holidayList']= "";
			$data['activity']= "active";
			$data['activityList']= "";
			$data['item']= "";
			$data['itemList']= "";
			$data['supervisor']= "";
			$data['department']= "";
			$data['sess_email'] = $this->session->userdata('email');
			$data['email'] = $this->session->userdata('email');
			$data['sess_email'] = $this->session->userdata('email');
			$data['email'] = $this->session->userdata('email');
			$this->load->view("common/head",$data);
			$this->load->view("common/header");
			$this->load->view("common/nav");
			$data['activity']=$this->MdActivity->getActivity();
			$data['playerlist']= $this->MdActivity->getPlayers($this->input->get('game_id'));
			$this->load->view('pages/gamification/activity',$data);
			$this->load->view('common/foot');
			$this->load->view('common/footer');
			}else{
			redirect('userDashboard');
		}

	}else{
			redirect('/');
		}
	}
	public function create(){

			$arrNew = array();
			$contactName = parse_str($_GET['data'], $arrNew);


			$array = array(
					'activity_name'=>$arrNew['name'],
					'status'=>'Preparing Game',
					'activity_date'=>$arrNew['date'],
					'game_points' => '1000'
					
				);

			if(in_array(null, $array)!=1){
				$query = $this->MdActivity->create($array);
				echo '1';
			}else{
				echo '0';
			}
	}
	public function getPlayerList(){
		$attr_id = $this->input->get('game_id');
		$resultClientList = $this->MdActivity->getPlayers($attr_id);
		header('Content-Type: application/json');
		echo $success = json_encode($resultClientList);	
	}

	public function approvePlayer(){
		$query = $this->MdActivity->approvePlayer($this->input->get('emp_id'), $this->input->get('game_id'), $this->input->get('game_points'));

		if($query){
			echo '1';
		} else {
			echo '0';
		}

		$query = $this->MdActivity->addToOverAllPoints($this->input->get('emp_id'),$this->input->get('game_points'));
	}

	public function rejectPlayer(){
		$query = $this->MdActivity->rejectPlayer($this->input->get('emp_id'), $this->input->get('game_id'));

		if($query){
			echo '1';
		} else {
			echo '0';
		}
	}
	
	
}
?>
