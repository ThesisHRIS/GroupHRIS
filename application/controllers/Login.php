<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed!');


class Login extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->model('MdLogin');
	}

	public function index(){
		// $this->load->view('common/head');
		if($this->session->userdata('emp_id')){
			if($this->session->userdata('type')==='1'){
				redirect('dashboard');
			}else{
				redirect('userDashboard');
			}
		}else{
			$this->load->view('pages/login_module/login_view');
			$this->load->view('common/foot');
		}
	}
	public function login(){
		$arrNew = array();
		$contactName = parse_str($_GET['data_upd'], $arrNew);
		
		$boolean=0;
		$username=$arrNew['username'];
		$password=$arrNew['pass'].SALT;
		$password=$this->encrypt->encode($password);
		// echo $arrNew['username'];	
		$data=$this->MdLogin->getUsers($username);

		// print_r($data);
		// echo $password.'\n';
		// echo $data[0]['password'];
		if($data){
			if($password===$data[0]['password']){
			   $this->session->set_userdata('email',$data[0]['email']);
			   $this->session->set_userdata('sess_email',$data[0]['email']);
               $this->session->set_userdata('emp_id',$data[0]['emp_id']);
               $this->session->set_userdata('emp_no',$data[0]['emp_no']);
               $this->session->set_userdata('type',$data[0]['isAdmin']);
               $this->session->sess_expiration = '14400';
               // $this->session->set_userdata('user_type',$data[0]['password']);
               // $this->session->set_userdata('folder',$data[0]['folder']);
               // $this->session->set_userdata('profilePath',$data[0]['profilePath']);
               if($data[0]['isAdmin']==='1'){
               		// redirect('/dashboard');
               	echo '2';
               }else{
               		// $data['message_display'] = 'Wrong Email or Password';
               		// redirect('/userdashboard', $data);
               	echo '1';

               }

			}else{
			   // redirect('/');
			   echo '0';
			}
		}else{
			echo '0';
		}

		// 
		// echo $boolean;
	}
	public function logout(){
		$this->session->sess_destroy();

		redirect('/');
	}
}
?>
