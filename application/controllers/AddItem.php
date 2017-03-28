<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed!');

class AddItem extends CI_Controller
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
			$data['activity']= "";
			$data['activityList']= "";
			$data['item']= "active";
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
			$this->load->view('pages/gamification/addItem',$data);
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
			date_default_timezone_set('Asia/Manila');
		$date=date('Y-m-d');

		$name_array = array();
	        $count = count($_FILES['file']['size']);
	        $boolean=0;
	        foreach($_FILES as $key=>$value){
		        for($s=0; $s<=$count-1; $s++) {
			        $_FILES['file']['name']=$value['name'][$s];
			        $_FILES['file']['type']    = $value['type'][$s];
			        $_FILES['file']['tmp_name'] = $value['tmp_name'][$s];
			        $_FILES['file']['error']       = $value['error'][$s];
			        $_FILES['file']['size']    = $value['size'][$s]; 


		            $config['upload_path'] = 'uploads/'.$date;
		             if (!file_exists($config['upload_path'])) {
					    mkdir($config['upload_path'], 0777, true);
					}else{
						
					}
		            $config['allowed_types'] = 'jpg|JPEG|png|PNG|JPG|jpeg';
		            $config['max_size']    = '9999999';
		            $config['max_width']  = '5000';
		            $config['max_height']  = '5000';
			       $this->load->library('upload', $config);
			        	$upload=$this->upload->do_upload('file');
			        $data = $this->upload->data();
			        $name_array[] = $data['file_name'];
			        if($upload){
			        	$boolean='1';
			        }else{
			        	$boolean='0';
			        }
		        }
		}
			if($boolean === '1'){
				$array = array(
						'item'=>$this->input->post('ItemName'),
						'points'=>$this->input->post('points'),
						'path'=>$name_array[0],
						'folder'=>$date
					);

				$query = $this->MdActivity->createItem($array);
			}else{

			}

			
	}
	
}
?>
