<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* NAME : Alumni Controller
* TYPE : Controller
* DEVELOPER : 
* DATE DEVELOPED: 
* DESCRIPTION: 
*/

class Alumni extends CI_Controller {

	var $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->template->check_if_not_logged_in();
		$this->load->library(array('form_validation'));
		$this->load->model(array('mdalumni'));

		//styles
		$this->template->set_styles(base_url().'assets/css/alumni.css');

		//scripts
		$this->template->set_scripts(base_url().'assets/js/angular/alumni/AlumniController.js');
	}

	public function index()
	{
		
	}

	public function lists()
	{
		if(is_alumni())
		{
			redirect(base_url('alumni/search'),'refresh');
		}
		$this->template->set_breadcrumb_title('Alumni Lists');
		$this->template->set_navigation_active('alumni_list');

		$this->data['alumni_content'] = $this->template->load("common","alumni","alumni-list",$this->data,TRUE,TRUE);
		$this->data['batch_content'] = $this->template->load("common","alumni","batch-list",$this->data,TRUE,TRUE);
		$this->data['family_saint_content'] = $this->template->load("common","alumni","family-saint-list",$this->data,TRUE,TRUE);

		$this->template->load("common","alumni","index",$this->data);
	}

	public function search()
	{
		if(is_admin())
		{
			redirect(base_url('alumni/lists'),'refresh');
		}
		$this->template->set_breadcrumb_title('Alumni Search');
		$this->template->set_navigation_active('alumni_search');

		$this->data['alumni_content'] = $this->template->load("common","alumni","alumni-list",$this->data,TRUE,TRUE);
		$this->data['batch_content'] = $this->template->load("common","alumni","batch-list",$this->data,TRUE,TRUE);
		$this->data['family_saint_content'] = $this->template->load("common","alumni","family-saint-list",$this->data,TRUE,TRUE);

		$this->template->load("common","alumni","index",$this->data);
	}


	public function listing()
	{
		if($this->input->is_ajax_request())
		{
			$filters = array();
			if(!empty($this->input->post('filters')))
			{
				$temp = array();
				$temp = json_decode($this->input->post('filters'));
				foreach ($temp as $key => $value) {
					$filters[$key] = $value;
				}
			}
			$orders = array();
			if(!empty($this->input->post('orders')))
			{
				$temp = array();
				$temp = json_decode($this->input->post('orders'));
				foreach ($temp as $key => $value) {
					$orders[$key] = $value;
				}
			}
			$select = 'us.id,us.first_name,us.middle_name,us.last_name,CONCAT(us.first_name," ",us.last_name) AS full_name,us.batch,us.permanent_address,us.email_address,ug.name as usertype';
			$response = $this->mdalumni->listing_user($filters,$orders,$select);
			$data = array();
			if(!empty($response))
			{
				foreach ($response as $key => $value) {
					$value['description'] 				= 'Batch '.$value['batch'];
					$value['job']         				= 'None';
					if($value['email_address'] == NULL)
					{
						$value['email_address'] 		= 'None';
					}
					$value['complete_address'] 			= $value['permanent_address'];
					$data[] = $value;
				}
			}
			$this->template->set_response_data($data);
			$this->template->set_message('Alumni Listing');
			$this->template->set_error(0);
		}
		$this->template->get_response(false);
	}

	public function add_alumni()
	{
		if($this->input->is_ajax_request())
		{
			$this->form_validation->set_rules('first_name','Firstname','trim|required');
			$this->form_validation->set_rules('batch','Batch','trim|required');
			$this->form_validation->set_rules('last_name','Lastname','trim|required');
			$this->form_validation->set_rules('birthdate','Birthdate','trim|required');
			$this->form_validation->set_rules('gender','Gender','trim|required');
			$this->form_validation->set_rules('family_saint','Family Saint','trim|required');
			$this->form_validation->set_rules('campus','Campus','trim|required');
			$this->form_validation->set_rules('permanent_address','Address','trim|required');
			if($this->form_validation->run())
			{
				$birthdate = date('m/d/Y',strtotime($this->input->post('birthdate')));
				$data = array(
					'first_name' => $this->input->post('first_name'),
					'middle_name' => $this->input->post('middle_name'),
					'last_name' => $this->input->post('last_name'),
					'batch' => $this->input->post('batch'),
					'gender' => $this->input->post('gender'),
					'family_saint' => $this->input->post('family_saint'),
					'campus' => $this->input->post('campus'),
					'permanent_address' => $this->input->post('permanent_address'),
					'birthdate' => date('Y-m-d',strtotime($birthdate)),
				);
				if($this->mdalumni->check_user_exists($data)==false)
				{
					$data['date_added'] = date('Y-m-d H:i:s');
					$response = $this->mdalumni->add_user($data);
					if($response){
						$data = array(
							'user_id' 	=> $response,
							'group_id'  => 2
						);
						$response = $this->mdalumni->add_user_group_reference($data);
						$this->template->evaluate_response($response,0);
					}
				}else
				{
					$this->template->set_message('Adding failed! Duplicate entries.');
				}
			}else{
				$this->template->set_message(validation_error('<p>','</p>'));
			}
			$this->template->get_response(false);
		}
	}
}