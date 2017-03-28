<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	/*
	* NAME : Tracking Reports Controller
	* TYPE : Controller
	* DEVELOPER : 
	* DATE DEVELOPED: 11/22/2015
	* DESCRIPTION: 
	*/

	class Trackingreports extends CI_Controller {
		var $data = array();

		public function __construct()
		{
			parent::__construct();
			$this->template->check_if_not_logged_in();

			$this->template->set_breadcrumb_title('Tracking Reports');
			$this->template->set_parent_navigation('agenda');
			$this->template->set_navigation_active('tracking');

			//scripts
			$this->template->set_scripts(base_url()."assets/js/angular/tracking_reports/ReportsController.js");
		}
		
		public function index()
		{
			$this->template->load("common","trackingreports","index",$this->data);
		}
	}
?>