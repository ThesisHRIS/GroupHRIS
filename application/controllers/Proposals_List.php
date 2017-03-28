<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* NAME : Proposals List Controller
* TYPE : Controller
* DEVELOPER : Filjumar Jumamoy
* DATE DEVELOPED: 
* DESCRIPTION: 
*/

class Proposals_List extends CI_Controller {

	var $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MdProposals');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
	} 
	//index mail
	public function index()
	{
		if($this->session->userdata('user_id')!=false){
			$data['title'] = "Proposals List";
			$data['sess_email'] = $this->session->userdata('email');
			$data['activeClients'] = "";
			$data['activeDash'] = "";
			$data['activeClientsList']= ""; 
			$data['proposals']= ""; 
			$data['proposalsList']= "active"; 
			$data['sales'] = ""; 
			$data['salesList']= "";
			$data['salesVsquota']= "";
			$data['commissionable']= "";
			$this->load->view("common/head",$data);
			$this->load->view("common/header");
			$this->load->view("common/nav");
			//get list of proposals
            $data['list_proposals'] = $this->MdProposals->getProposal($this->session->userdata('user_id'));
            // @$client_id = $data['list_proposals'][0]['client_id'];
            // $data['getClient'] = $this->MdProposals->getClientName();

            $data['categories'] = $this->MdProposals->getSalesCategories();
            // $data['categories'] = $this->MdProposals->getSalesCategories();
            $this->load->view("pages/proposals/proposals_list", $data);
            
            $this->load->view("modal/list_proposals_modal_view");
            $this->load->view("modal/list_proposals_modal");
             

		$this->load->view("common/foot");
		$this->load->view("common/footer");
	    }else{
    		redirect('/');
        }
	}
	public function getProposals(){
		
		$attr_id = $this->encrypt->decode($this->input->get('_getAtt'));
		$resultClientList = $this->MdProposals->getList($attr_id);
		echo $success = json_encode($resultClientList);
		// echo $success = json_encode($resultClientList);

	}
	public function viewProposals(){
		$attr_id = $this->encrypt->decode($this->input->get('_getAtt'));
		$resultClientList = $this->MdProposals->getList($attr_id);
		echo $success = json_encode($resultClientList);
	}
	public function update_proposals(){

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

		            $file_names= implode('', $name_array);
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
					
				}
				$data = array(
							'sales_user_id' => $this->session->userdata('user_id'),//sender session
							'client_id' => $this->encrypt->decode($this->input->post('client_name')),//sender session name
							'sales_category'=>$seralizedTO,
							'amount'=> $str,
							'date_sent'=> $this->input->post('proposal_date'),
							'project_name' => $this->input->post('project_name'),
							'folder_name'=>$date,
							'filename' => $file_names,
							'date_lastModified' =>$date
							);
				// print_r($this->input->post('unq'));
				$query=$this->MdProposals->update_proposals($data,$this->input->post('prime'));
				if($query=="1"){
						$this->session->set_flashdata('msg', 'Proposal successfully saved.');
						// echo"<script>$('.message').html('Proposal successfully saved.');</script>";
					}else{
						$this->session->set_flashdata('msg', 'Somethings wrong in saving proposal.');
					}
					
					$this->session->flashdata('msg');
				 	redirect(base_url().'Proposals_List');

	}
	public function delete_proposals(){
		$id =$this->encrypt->decode($this->input->get('_getAtt'));
		$query = $this->MdProposals->delete_proposals($id);
		if($query){
			echo $success=1;

		}else{
			echo $success=0;
		}
	}
}



?>