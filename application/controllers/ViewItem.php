<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed!');

class ViewItem extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
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
			$data['activity']= "";
			$data['activityList']= "";
			$data['item']= "";
			$data['itemList']= "active";
			$data['supervisor']= "";
			$data['department']= "";
			$data['sess_email'] = $this->session->userdata('email');
			$data['email'] = $this->session->userdata('email');
			$data['sess_email'] = $this->session->userdata('email');
			$data['email'] = $this->session->userdata('email');
			$this->load->view("common/head",$data);
			$this->load->view("common/header");
			$this->load->view("common/nav");
			$data['items'] =  $this->MdActivity->getItems();
			$this->load->view('pages/gamification/viewItem',$data);
			$this->load->view('modal/editItem');
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

		$attr_id = $this->encrypt->decode($this->input->get('_getAtt'));
		// echo $attr_id;
		$resultClientList = $this->MdActivity->getItem($attr_id);
		echo $success = json_encode($resultClientList);
	}
	public function deleteItem(){
		$query = $this->MdActivity->deleteItem($this->input->get('this_id'));


			if($query){
				echo '1';
			}else{
				echo '0';
			}
	}
	// public function create(){


	// 		$array = array(
	// 				'activity_name'=>$this->input->post('name'),
	// 				'point_gain'=>$this->input->post('champion').",".$this->input->post('first').",".$this->input->post('second'),
	// 				'consolation_point'=>$this->input->post('consolation')
	// 			);

	// 		$query = $this->MdActivity->create($array);
	// }
	
}
?>
