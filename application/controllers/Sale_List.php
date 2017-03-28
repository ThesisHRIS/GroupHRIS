<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* NAME : Sales Controller
* TYPE : Controller
* DEVELOPER : Nico Cambelisa
* DATE DEVELOPED: 
* DESCRIPTION: 
*/

class Sale_List extends CI_Controller {

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
			$data['title'] = "Sales|Sales List";
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
			$this->load->view("common/nav");

			$data['fetchSaleList']=$this->MdSales->connectUserToClient($this->session->userdata('user_id'));

			$this->load->view('pages/sales/sale_list',$data);
			// print_r($data);
			$this->load->view("modal/list_sales_modal");
			$this->load->view('common/foot');
			
			$this->load->view('common/footer');
		}else{
			redirect('/');
		}
	}
	public function getSales(){
		
		$attr_id = $this->encrypt->decode($this->input->get('_getAtt'));
		$resultClientList = $this->MdSales->getList($attr_id);
		echo $success = json_encode($resultClientList);
		// echo $success = json_encode($resultClientList);

	}
	public function updSales(){
		$id= $this->input->get('this_id');
		$arrNew = array();
		$contactName = parse_str($_GET['data_upd'], $arrNew);
		$getSales= $this->MdSales->getAll($id);
		
		$query1= $this->MdSales->update1($getSales,$arrNew['company_name']);
		$query2= $this->MdSales->update2($getSales,$arrNew['project_name']);
		$query3 = $this->MdSales->update3($getSales,$arrNew['value']);

		if($query1&&$query2&&$query3){
			echo "successfully updated";
		}else{
			echo "failed to update";
		}
		
	}
	public function deleteSale(){
		$id =$this->encrypt->decode($this->input->get('_getAtt'));
		$query = $this->MdSales->deleteSale($id);
		if($query){
			echo $success=1;

		}else{
			echo $success=0;
		}
	}
}