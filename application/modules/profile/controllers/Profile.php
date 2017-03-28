<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* NAME : Profile Controller
* TYPE : Controller
* DEVELOPER : 
* DATE DEVELOPED: 
* DESCRIPTION: 
*/

class Profile extends CI_Controller {

	var $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->template->check_if_not_logged_in();

		$this->template->set_breadcrumb_title('Profile');
		// $this->template->set_navigation_active('Profile');

		//style
		$this->template->set_styles(base_url()."assets/plugins/bootstrap-sweetalert/lib/sweet-alert.css");
		$this->template->set_styles(base_url()."assets/css/profile.css");
		$this->template->set_styles(base_url()."assets/plugins/bootstrap-sweetalert/lib/sweet-alert.css");
		

		//scripts
		$this->template->set_scripts(base_url()."assets/js/map.js");
		$this->template->set_scripts(base_url()."assets/js/charts.js");
		$this->template->set_scripts(base_url()."assets/js/demo.js");
		$this->template->set_scripts(base_url()."assets/js/employment_data.js");

	}

	public function index()
	{
		$this->data['educ_background'] = $this->template->load("common","profile","educ_background",$this->data,TRUE,TRUE);
		$this->data['employment_data'] = $this->template->load("common","profile","employment_data",$this->data,TRUE,TRUE);
		$this->data['gen_info'] = $this->template->load("common","profile","gen_info",$this->data,TRUE,TRUE);
		$this->data['trainings'] = $this->template->load("common","profile","trainings",$this->data,TRUE,TRUE);

		$this->template->load("Common","profile","index",$this->data);
	}
}
