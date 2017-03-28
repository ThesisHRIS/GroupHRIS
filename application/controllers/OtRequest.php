<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed!');

class OtRequest extends CI_Controller
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
			$data['OtRequest']= "active";
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
			$data['otrequest'] = $this->ot_form_model->getOtRequest();
			$this->load->view('pages/leave_ot_module/ot_request_view', $data);
			$this->load->view('modal/declineOt');
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
		$resultClientList = $this->ot_form_model->getList($attr_id);
		echo $success = json_encode($resultClientList);	
	}
	public function update_ot(){
		$query= $this->ot_form_model->update_ot($this->encrypt->decode($this->input->get('_getAtt')));
		if ($query) {
			echo '1';
		}else{
			echo '0';
		}
	}
	public function deleteRequest(){
		$query= $this->ot_form_model->delete_ot($this->input->get('this_id'),$this->input->get('reason'));
		if ($query) {
			echo '1';
		}else{
			echo '0';
		}
	}
	public function cancel_request(){
		// $this->leave_form_model->
		$query= $this->ot_form_model->cancel_request($this->input->get('this_id'));
		if ($query) {
			echo '1';
		}else{
			echo '0';
		}
	}
	// 	public function getInfo(){

	// 	$attr_id = $this->encrypt->decode($this->input->get('_getAtt'));
	// 	// echo $attr_id;
	// 	$resultClientList = $this->ot_form_model->getListOt($attr_id);
	// 	echo $success = json_encode($resultClientList);
	// }
}
?>
