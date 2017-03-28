<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* NAME : Proposals Controller
* TYPE : Controller
* DEVELOPER : Filjumar Jumamoy
* DATE DEVELOPED: 
* DESCRIPTION: 
*/

class Proposals extends CI_Controller {

	var $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MdProposals');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
	} 
	//index proposal
	public function index()
	{
	$data['title'] = "Dashboard";
			$data['proposals'] = "active";
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
			$data['sess_email'] = $this->session->userdata('email');
			// $data['email'] = $this->session->userdata('email');
			$this->load->view("common/head",$data);
			$this->load->view("common/header");
			$this->load->view("common/userNav");
			$this->load->view('users/payrollcontent');
			$this->load->view('common/foot');
			$this->load->view('common/footer');
	}
	
	// create proposal
	public function proposalCreate()
	{
		date_default_timezone_set('Asia/Manila');
		$date1=date('Y-m-d');
		$date = date('Y-m-d H:i:sP');
		$name_array = array();
	        $count = count($_FILES['file']['size']);
	        foreach($_FILES as $key=>$value){
		        for($s=0; $s<=$count-1; $s++) {
			        $_FILES['file']['name']=$value['name'][$s];
			        $_FILES['file']['type']    = $value['type'][$s];
			        $_FILES['file']['tmp_name'] = $value['tmp_name'][$s];
			        $_FILES['file']['error']       = $value['error'][$s];
			        $_FILES['file']['size']    = $value['size'][$s]; 


		            $config['upload_path'] = 'uploads/'.$date1;
		             if (!file_exists($config['upload_path'])) {
					    mkdir($config['upload_path'], 0777, true);
					}else{
						
					}
		            $config['allowed_types'] = 'docx|DOCX|doc|DOC|pdf|PDF|txt|TXT|zip|ZIP|xlsx|XLSX';
		            $config['max_size']    = '9999999';
		            $config['max_width']  = '5000';
		            $config['max_height']  = '5000';
			        $this->load->library('upload', $config);
			        $this->upload->do_upload('file');
			        $data = $this->upload->data();
			        $name_array[] = $data['file_name'];
		        }

		            $file_names= implode(',', $name_array);
					$foreach_this = $this->input->post('sales_category');
					$seralizedTO = implode(",",$foreach_this);
					$wala=$this->input->post('amount');
					$money=explode(",",$wala);
					
					$val=count($money);
					$str="";
					$str1="";
					for ($i=0; $i <$val; $i++) { 
						$str=$str.$money[$i];
					}
						
					
						$proposal_save = array(
							'sales_user_id' => $this->session->userdata('user_id'),//sender session
							'client_id' => $this->encrypt->decode($this->input->post('client_name')),//sender session name
							'service_category'=> $seralizedTO,
							'amount'=> $str,
							'date_sent'=> $this->input->post('proposal_date'),
							'project_name' => $this->input->post('project_name'),
							'folder_name'=>$date,
							'filename' => $file_names,
							'date_created' =>$date,
							'date_lastModified' =>$date,
							);
						
						$proposal_insert = $this->MdProposals->saveProposal($proposal_save);

				
					if($proposal_insert){
						$this->session->set_flashdata('msg', 'Proposal successfully saved.');
						// echo"<script>$('.message').html('Proposal successfully saved.');</script>";
					}else{
						$this->session->set_flashdata('msg', 'Somethings wrong in saving proposal.');
					}
					
					$this->session->flashdata('msg');
				 	redirect(base_url().'Proposals');
						
			}
	}

}

?>