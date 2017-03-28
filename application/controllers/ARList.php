<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* NAME : Sales Controller
* TYPE : Controller
* DEVELOPER : Nico Cambelisa
* DATE DEVELOPED: 
* DESCRIPTION: 
*/

class ARList extends CI_Controller {

	var $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MdCollections');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
	} 

	public function index(){
		if($this->session->userdata('user_id')!=false){
			$data['title'] = "Sales|New Sales";
			$data['sess_email'] = $this->session->userdata('email');
			$data['activeClients'] = "";
			$data['activeDash'] = "";
			$data['activeClientsList']= ""; 
			$data['proposals']= ""; 
			$data['proposalsList']= "";
			$data['sales']= "";
			$data['salesList']= "active"; 
			$data['salesVsquota']= "";
			$data['commissionable']= "";
			$this->load->view("common/head",$data);
			$this->load->view("common/header");
			$this->load->view("common/finance_nav");
			$data['fetchAll'] = $this->MdCollections->fetchAll();
			$data['fetchCollection']= $this->MdCollections->fetchPaymentTerms($this->session->userdata('user_id'));
			// print_r($data);
			$this->load->view('pages/reports/ARList',$data);

			$this->load->view('common/foot');
			$this->load->view('common/footer');
		}else{
			redirect('/');
		}
	}
	public function autoSe(){
	 	//$selected = $this->input->get('name');
		$data = $this->MdBills->autoSelect( $this->input->get('name'));
		echo json_encode($data);
		// print_r($data);
	}
	public function reg(){
	 	//$selected = $this->input->get('name');
		$data = $this->MdBills->autoreg( $this->input->get('val'));
		echo $success = json_encode($data);
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
		            $config['allowed_types'] = 'docx|DOCX|doc|DOC|pdf|PDF|txt|TXT|zip|ZIP|xlsx|XLSX';
		            $config['max_size']    = '9999999';
		            $config['max_width']  = '5000';
		            $config['max_height']  = '5000';
			       	$this->load->library('upload', $config);
			        $this->upload->do_upload('file');
			        $data = $this->upload->data();
			        $name_array[] = $data['file_name'];
		        }
		}
		 foreach($_FILES as $key=>$value){
		        for($s=0; $s<=$count-1; $s++) {
			        $_FILES['file1']['name']=$value['name'][$s];
			        $_FILES['file1']['type']    = $value['type'][$s];
			        $_FILES['file1']['tmp_name'] = $value['tmp_name'][$s];
			        $_FILES['file1']['error']       = $value['error'][$s];
			        $_FILES['file1']['size']    = $value['size'][$s]; 


		            $config['upload_path'] = 'uploads/'.$date;
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
			        $name_array1[] = $data['file_name'];
		        }
		}
		// echo $name_array[0];
		// echo $name_array1[0];
		$id=$this->input->post('qb_ref_no');
		echo $id;
		$query=$this->MdCollections->fetchPaymentTermsWithId($id);
		echo $query[0]['filename'];
		$array = array(
			'sales_id'=> $query[0]['sales_id'],
			'finance_id'=>$query[0]['finance_id'],
			'description' =>$query[0]['description'],
			'percentage' =>$query[0]['percentage'],
			'ex_deal' =>$query[0]['ex_deal'],
			'date_collected' =>$this->input->post('date_collected'),
			'amount_collected'=>$this->input->post('amount'),
			'folder_name'=>$date,
			'filename' =>$query[0]['filename'].",".$name_array[0].",".$name_array1[0],
			'date_billed'=>$query[0]['date_billed'],
			'qb_ref_no' =>$this->input->post('qb_ref_no') 
		);	
		$result = $this ->MdCollections -> update($array,$id);
		if($result){
			echo "success";
		}
	}
}