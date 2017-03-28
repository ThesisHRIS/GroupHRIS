<?php 
	

class LeaveRequest extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->model('leave_form_model');
	}

	public function index(){
		if($this->session->userdata('emp_id')){
			if($this->session->userdata('type')==='1'){
			$data['title'] = "Dashboard";
			$data['proposals'] = "";
			$data['proposalsList'] = "";
			$data['active201'] = "";
			$data['payslip'] = "";
			$data['activeDash'] = "";
			$data['active201View']= ""; 
			$data['salaryConfig']= ""; 
			$data['leaveRequest']= "active";
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
			$data['itemList']= "";
			$data['supervisor']= "";
			$data['department']= "";
			$data['sess_email'] = $this->session->userdata('email');
			$data['email'] = $this->session->userdata('email');
			$this->load->view("common/head",$data);
			$this->load->view("common/header");
			$this->load->view("common/nav");
			$data['leaverequest'] = $this->leave_form_model->getLeaveRequest();
			$this->load->view('pages/leave_ot_module/leave_request_view', $data);
			
			// $this->load->view("modal/Approved");
			$this->load->view("modal/declineLeaveModal");
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
		$resultClientList = $this->leave_form_model->getList($attr_id);
		echo $success = json_encode($resultClientList);
	}
	public function update_request(){
		$query= $this->leave_form_model->update_request($this->input->get('this_id'));
		if ($query) {
			echo '1';
		}else{
			echo '0';
		}
	}
	public function deleteRequest(){
		$query= $this->leave_form_model->decline_request($this->input->get('this_id'),$this->input->get('reason'));
		if ($query) {
			echo '1';
		}else{
			echo '0';
		}
	}
	public function cancel_request(){
		// $this->leave_form_model->
		$query= $this->leave_form_model->cancel_request($this->input->get('this_id'));
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
				'date_filed'=>$arrNew['datefiled'],
				'start_date'=>$arrNew['start_date'],
				'end_date'=>$arrNew['end_date'],
				'days'=>$arrNew['days'],
				'type'=>$arrNew['type'],
				'supervisor_id'=>$arrNew['supervisor_id'],
				'comments'=>$arrNew['comments'],
			);

		$config =array(
					'useragent' => 'CodeIgniter',
					'mailpath'  => '/usr/bin/sendmail',
					'protocoal' => 'smtp',
					'smtp_host' =>'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user'  =>'nico.cambelisa@gmail.com',
					'smtp_pass' => 'debiemae143'
 				);

			$this->load->library('email',$config);

			$this->email->set_newline("\r\n");
			$this->email->from($this->session->userdata('email'),$this->session->userdata('last_name'));
			$this->email->to('nico.cambelisa@gmail.com');
			$this->email->cc('angelicaintes1209@gmail.com');
			$this->email->subject('Leave Request');
			$this->email->message($this->session->userdata('last_name').' is requesting for a formal leave because '.$arrNew['comments'].'starting from '. $arrNew['start_date'].'until '.$arrNew['end_date']);
			
	if($arrNew['type']!='0'&&$arrNew['supervisor_id']!='1'){
			// echo 'nico';
		if(in_array(null, $array)!='1'){
			// echo 'nico';
			if($this->leave_form_model->updateLeave($_GET['id'],$array)){
				$this->email->send();
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
				'date_filed'=>$arrNew['datefiled'],
				'start_date'=>$arrNew['start_date'],
				'end_date'=>$arrNew['end_date'],
				'days'=>$arrNew['days'],
				'type'=>$arrNew['type'],
				'supervisor_id'=>$arrNew['supervisor_id'],
				'comments'=>$arrNew['comments'],
				'status'=>'Pending',
				'withPayCount' =>'',
				'DateLeaveLimit'=> ''
			);
		// print_r($array);
		$config =array(
					'useragent' => 'CodeIgniter',
					'mailpath'  => '/usr/bin/sendmail',
					'protocoal' => 'smtp',
					'smtp_host' =>'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user'  =>'nico.cambelisa@gmail.com',
					'smtp_pass' => 'debiemae143'
 				);

			$this->load->library('email',$config);

			$this->email->set_newline("\r\n");
			$this->email->from($this->session->userdata('email'),$this->session->userdata('last_name'));
			$this->email->to('nico.cambelisa@gmail.com');
			$this->email->cc('angelicaintes1209@gmail.com');
			$this->email->subject('Leave Request');
			$this->email->message($this->session->userdata('last_name').' is requesting for a formal leave because: '.$arrNew['comments'].' From: '. $arrNew['start_date'].'To: '.$arrNew['end_date']);
			

			if($this->leave_form_model->insertLeave($array)){
				$this->email->send();
				echo '1';
			}else{
				echo '0';
			}
		
	
	}

}
?>
