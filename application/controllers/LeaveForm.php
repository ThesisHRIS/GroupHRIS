<?php
	if(!defined('BASEPATH')) exit ('No direct script access allowed!');

class LeaveForm extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('Leave_form_model');
	}

	public function index(){
		if($this->session->userdata('emp_id')){
			if($this->session->userdata('type')!='1'){
			$data['title'] = "Dashboard";
			$data['proposals'] = "";
			$data['proposalsList'] = "";
			$data['payslip'] = "";
			$data['active201'] = "";
			$data['activeDash'] = "";
			$data['active201View']= ""; 
			$data['salaryConfig']= ""; 
			$data['leaveRequest']= "";
			$data['leaveHistory']= "active";
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
			$data['supervisor']= $this->Leave_form_model->getSupervisor();
			// print_r($data);
			$this->load->view('pages/leave_ot_module/leave_form_view',$data);
			$this->load->view('common/foot');
			$this->load->view('common/footer');
			}else{
			redirect('Dashboard');
		}

	}else{
			redirect('/');
		}
	}

	public function save(){
		
		if($this->input->post('submit')){
			if($this->input->post('type')!="0"|| $this->input->post('supervisor_id')!="0" ){

			$this->Leave_form_model->process();

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
			$this->email->message($this->session->userdata('last_name').' is requesting for a form leave because '.$this->input->post('comment').'starting from '. $this->input->post('start_date').'until '.$this->input->post('end_date'));

			$this->email->send();

			redirect('leaveForm');
			}else{
				echo "<script>alert('hello');</script>";
				echo "<script>history.go(-1);</script>";
			}
		}

		
	}

	
}



?>