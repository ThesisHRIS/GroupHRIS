<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed!');

class EditUser extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->model('MdEditUser');
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
			$data['setting']= "active";
			$data['sess_email'] = $this->session->userdata('email');
			$data['profile'] = $this->MdEditUser->getProfile();
			$this->load->view("common/head",$data);	
			$this->load->view("common/header");
			$this->load->view("common/userNav");
			$this->load->view('users/editUser',$data);
			// $this->load->view('modal/approved');
			$this->load->view('common/foot');
			$this->load->view('common/footer');
			}else{
			redirect('Dashboard');
		}

	}else{
			redirect('/');
		}
	
	}
	public function edit(){

		// print_r($_GET['data']);

		$arrNew = array();
		$contactName = parse_str($_GET['data'], $arrNew);
	
		$oldpass = $arrNew['oldpassword'].SALT;
		$oldpass = $this->encrypt->encode($oldpass);

		$newpass = $arrNew['password'].SALT;
		$newpass = $this->encrypt->encode($newpass);
		$repass = $arrNew['repassword'].SALT;
		$repass = $this->encrypt->encode($repass);

		$data = $this->MdEditUser->edit();

	
		if($arrNew['password']!=null|| $arrNew['repassword']!=null){
			if($data[0]['password'] === $oldpass){
				if($newpass === $repass){
					$data = array(
						'password'=> $newpass
						);
				$query = $this->MdEditUser->update($data);

					echo "1";
				}else{
					echo "2";
				}
			}else{
				echo "0";
			}
		}else{
			echo "3";
		}

		

	

		// redirect('EditUser');

			
	}
}
?>
