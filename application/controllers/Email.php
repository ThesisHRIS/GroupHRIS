<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form','url'));
		$this->load->helper('url');
		$this->load->library('form_validation');
			// $this->load->library('email');
		// $this->load->library('Email');
		// $this->load->model('MdActivity');
	}

	public function index()
	{
			$config =array(
					'useragent' => 'CodeIgniter',
					'mailpath'  => '/usr/bin/sendmail',
					'protocoal' => 'smtp',
					'smtp_host' =>'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user'  =>'nico.cambelisa@gmail.com',
					'smtp_pass' => 'debiemae143'
 				);

			$this->load->library('email',$config);

			$this->email->set_newline("\r\n");
			$this->email->from('nico.cambelisa@gmail.com','nico');
			$this->email->to('nico.cambelisa@gmail.com');
			$this->email->subject('sample');
			$this->email->message('sample message');

			if($this->email->send()){
				echo "success";
			}else{
				show_error($this->email->print_debugger());
			}

	}
	public function get(){

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */