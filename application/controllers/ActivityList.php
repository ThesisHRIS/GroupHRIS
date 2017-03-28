<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed!');

class ActivityList extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('MdActivity');
		$this->load->library('encrypt');

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
			$data['activity']= "";
			$data['activityList']= "active";
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
			$data['activity'] =  $this->MdActivity->getActivity();
			$this->load->view('pages/gamification/viewActivity',$data);
			$this->load->view('modal/addActivity');
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
					'date'=>$arrNew['date'],
					
				);

			$query = $this->MdActivity->create($array);
	}

	public function getInfo(){
		$attr_id = $this->input->get('_getAtt');
		$resultClientList = $this->MdActivity->getActivity($attr_id);
		echo $success = json_encode($resultClientList);	
	}

	public function start($id){
		$query= $this->MdActivity->update_game_status($this->input->get('_getAtt'));
		if ($query) {
			echo '1';
		}else{
			echo '0';
		}
	}

	public function end($id){
		$query= $this->MdActivity->end_game($this->input->get('_getAtt'));
		if ($query) {
			echo '1';
		}else{
			echo '0';
		}
	}
	
}
?>
