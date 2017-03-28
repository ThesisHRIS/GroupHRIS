<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* NAME : Sales Controller
* TYPE : Controller
* DEVELOPER : Nico Cambelisa
* DATE DEVELOPED: 
* DESCRIPTION: 
*/

class Sales extends CI_Controller {

	var $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MdSales');
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
			$data['sales']= "active";
			$data['salesList']= ""; 
			$data['salesVsquota']= "";
			$data['commissionable']= "";
			$this->load->view("common/head",$data);
			$this->load->view("common/header");
			$this->load->view("common/nav");
			$data['fetchClient'] = $this->MdSales->clientWithProposals($this->session->userdata('user_id'));
			// $data['fetchQuatation']= $this->MdSales->fetchQuatation();
			// print_r($data);
			$this->load->view('pages/sales/new_sale',$data);

			$this->load->view('common/foot');
			$this->load->view('common/footer');
		}else{
			redirect('/');
		}
	}
	public function create(){
		$sess_id= $this->session->userdata('user_id');

		$client= $this->input->post('client');
		$quatationNo= $this->input->post('quatationNo');
		$signed= $this->input->post('signed');
		$amount= $this->input->post('amount');
		$quatation= $this->input->post('quatation');
		$vat= $this->input->post('vat');
		$contactName=$this->input->post('contactName');
		$contactNumber= $this->input->post('contactNumber');
		$deal=$this->input->post('vat');
		$percentage=$this->input->post('mypercent');
		$exdeal=$this->input->post('exdeal');
		$description=$this->input->post('mydescription');
		// $percentage=$this->input->post('des');
		print_r($deal);
		$data['result'] = $this->MdSales->fetchClientbyId($client);
		


		// $break = explode(",",$data['result'][0]['contact_no']);
		// $count_brk = count($break);
		// for($i=0;$i<$count_brk;$i++){

		// }
		$client_id=$data['result'][0]['client_id'];
		$client_number=$data['result'][0]['contact_no'];
		date_default_timezone_set('Asia/Manila');
		$date = date('Y-m-d');
		$name_array = array();
	        $count = count($_FILES['file']['size']);
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
		         $file_names= implode(',', $name_array);
		         // // echo "<script> alert(".$file_names."hahahah".")</script>";
		         // print_r($file_names);
		         $money=explode(",",$amount);

				$val=count($money);

				$str="";
				$str1="";
				for ($i=0; $i <$val; $i++) { 
					$str=$str.$money[$i];
				}
		$array = array(
			'proposals_id' => $quatationNo,
			'date_signed' => $signed,
			'amount' => $str,
			'vatable' => $vat,
			'signed_copy_filename' =>$file_names,
			'prod_specs_filename' => $file_names,
			'commissionable' => "false",
			'client_id'=>$client_id,
			'contact_name_for_collection' => $client,
			'contact_no_for_collection' =>$client_number,
			'client_project_coordinator_name' => $contactName,
			'client_project_coordinator_no' => $contactNumber,
			'client_project_coordinator_email' => $email,
			'status' => "active"
			);
		$query=$this->MdSales->saveNew($array);
		$query=$this->MdSales->getId();
		print_r(count($description));
		for ($i=0; $i < count($description); $i++) { 
			
		
		$array1 = array(
			'sales_id'=>$query[0]['sales_id'],
			'finance_id'=>"",
			'description'=>$description[$i],
			'percentage'=>$percentage[$i],
			'ex_deal'=>$exdeal[$i],
			'date_collected'=>"",
			'amount_collected'=>"",
			'filename'=>""
			);
		$query1= $this->MdSales->savePaymentTerms($array1);
		}
		


		

		if($query&&$query1){
			$this->session->set_flashdata('msg',"Successfully ");
		}else{
			$this->session->set_flashdata('msg', 'Error in adding new sale.');
		}
		$this->session->flashdata('msg');
	 	redirect(base_url().'Sales');
	}

	public function autoSe(){
	 	//$selected = $this->input->get('name');
		$data = $this->MdSales->autoSelect( $this->input->get('name'));
		echo json_encode($data);
	}
}