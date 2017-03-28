<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* NAME : Clients List Controller
* TYPE : Controller
* DEVELOPER : Filjumar Jumamoy
* DATE DEVELOPED: 
* DESCRIPTION: 
*/

class Clients_List extends CI_Controller {

	var $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MdClients');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
	} 
	//index mail
	public function index()
	{
		if($this->session->userdata('user_id')!=false){
		$data['title'] = "New Client";
			$data['activeClients'] = "";
			$data['activeDash'] = "";
			$data['activeClientsList']= "active"; 
			$data['proposals']= ""; 
			$data['proposalsList']= "";
			$data['sales'] = "";
			$data['salesList']= "";
			$data['salesVsquota']= "";
			$data['commSales']= "";
			$data['commissionable']= "";
			$data['sess_email'] = $this->session->userdata('email');

			$this->load->view("common/head",$data);
			$this->load->view("common/header");
			$this->load->view("common/nav");
			
				 //get list of clients
	            $data['list_clients'] = $this->MdClients->getLists();
	            $this->load->view("pages/clients/clients_list", $data);
			$this->load->view("common/foot");
			$this->load->view("modal/list_clients_modal");
			$this->load->view("common/footer");
        }else{
			redirect('/');
	    }

	}
	// get client
	public function getClient()
	{
		$attr_id = $this->encrypt->decode($this->input->get('_getAtt'));
		$resultClientList = $this->MdClients->getList($attr_id);
		echo $success = json_encode($resultClientList);
	}
	// update client
	public function updClient()
	{
		$id_cli = $this->input->get('this_id');
		$arrNew = array();
		$contactName = parse_str($_GET['data_upd'], $arrNew);
		$data = array(
			"contact_name" => $arrNew['contact_name'],
			"contact_no" => $arrNew['cel_number'].",".$arrNew['phone_number'],
			"email" => $arrNew['personal_email'].",".$arrNew['work_email'],
			"value" => $arrNew['value']
			);

		$upd = $this->MdClients->updateClientTBL($data,$id_cli);
		// echo("<script>alert($upd.'hai');</script>");
		if($upd)
		{
			echo $success = 1;
		}else{
			echo $success = 0;
		}

	}
	// delete client
	public function delItem()
	{
		$del_id = $this->encrypt->decode($this->input->get('_d'));
		$q_del = $this->MdClients->deleteClient($del_id);
		if($q_del)
		{
			echo $success = 1;
		}else{
			echo $success = 0;
		}
	}
}

?>