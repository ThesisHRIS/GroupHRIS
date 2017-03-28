<?php

defined('BASEPATH') OR exit('No direct script access allowed');

    class MyOptimind_gamhris extends CI_Controller{
    	public function __construct()
    	{
        	parent::__construct();
        	//ibutang ang constructor code mga ka team Optimind
        	$this->load->model('');

    	}	

    	//para login page ni 
        public function index()
        {
            $this->load->view('payroll');
        }
        //login function here
        public function login(){
        	
        }
    }
?>