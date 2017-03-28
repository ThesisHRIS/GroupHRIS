<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*
* NAME 			: My Lib
* TYPE 			: Library
* CREATED BY 	: Elbert James Olivar
* DATE CREATED 	: October 18, 2015
* DESCRIPTION 	: This is a library that will render displays of views, styles, scripts, and others well as other important global functions.
*
*/
class Template {

	private $CI 				= null;
	private $styles 			= null;
	private $scripts 			= null;
	private $title				= "";
	private $error				= 1;
	private $breadcrumb_title   = "";
	private $message 			= "";
	private $response_data      = "";
	private $parent_navigation  = "";
	private $navigation_active  = "home";

	public function __construct()
	{
		$this->CI 				= & get_instance();
		$this->styles 			= array();
		$this->scripts			= array();
		$this->breadcrumb_title = "Home";
		$this->title    		= "AIMS | Welcome to Alumni Information and Management System";
		$this->message 			= "Failed on processing. Try Again.";
		$this->error    		= 1;
		$this->parent_navigation  = "";
		$this->navigation_active  = "home";
		$this->response_data 	= array();
	}
	
	public function check_if_not_logged_in()
	{
		$this->CI->load->library("ion_auth");
		if (!$this->CI->ion_auth->logged_in())
		{
			// redirect to the login page
			$redirect_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			redirect(base_url().'login?redirect_url='.urlencode($redirect_url), 'refresh');
		}

	}

	public function check_if_logged_in()
	{
		$this->CI->load->library("ion_auth");
		//check if logged in already
		if ($this->CI->ion_auth->logged_in())
		{
			// redirect them to the home page
			redirect(base_url().'home', 'refresh');
		}
	}

	public function set_title($title)
	{
		if($title!="")
		{
			$this->title = $title;
		}
	}
	public function set_parent_navigation($parent_navigation)
	{
		if($parent_navigation!="")
		{
			$this->parent_navigation = $parent_navigation;
		}
	}
	public function set_navigation_active($navigation)
	{
		if($navigation!="")
		{
			$this->navigation_active = $navigation;
		}
	}
	public function set_breadcrumb_title($breadcrumb_title)
	{
		if($breadcrumb_title!="")
		{
			$this->breadcrumb_title = $breadcrumb_title;
		}
	}
	/*
	* set_styles($filepath) ; function that will set stylesheets
	* @param
	* $filepath = contains path of the stylesheets which can be array or not
	*/
	public function set_styles($filepath)
	{
		if(is_array($filepath))
		{
			foreach ($filepath as $key => $value) {
				$this->styles[] = $value;
			}
		}else 
		{
			$this->styles[] = $filepath;
		}
	}
	/*
	* set_scripts($filepath) ; function that will set javascript files
	* @param
	* $filepath = contains path of the javascript files that can be array or not
	*/
	public function set_scripts($filepath)
	{
		if(is_array($filepath))
		{
			foreach ($filepath as $key => $value) {
				$this->scripts[] = $value;
			}
		}else 
		{
			$this->scripts[] = $filepath;
		}
	}
	/*
	* array_to_json($data) ; function that will convert array to json
	* @param
	* $data = an array
	*/
	public function array_to_json($data=array(),$return=FALSE)
	{
		if(is_array($data))
		{
			if($return)
			{
				return json_encode($data);
			}else
			{
				echo json_encode($data);
			}
			
		}
		return false;
	}
	/*
	* json_to_array($string) ; function that will convert json to array
	* @param
	* $string = a json string
	*/
	public function json_to_array($string,$return=FALSE)
	{
		if($this->is_json($string))
		{
			if($return)
			{
				return json_decode($string);
			}else
			{
				echo json_decode($string);
			}
		}
		return false;
	}
	/*
	* is_json($string) ; function that will check is a strig is json type
	* @param
	* $string = a json string
	*/
	public function is_json($string)
	{
 		json_decode($string);
 		return (json_last_error() == JSON_ERROR_NONE);
	}
	/*
	* set_error($error) ; function that will set the error code
	* @param
	* $error = bool or integer
	*/
	public function set_error($error=1)
	{
		if(is_bool($error))
		{
			$this->error = $error==TRUE ? 0 : 1;
		}else if(is_int($error))
		{
			$this->error = $error;
		}
	}
	/*
	* set_message($message) ; function that will set the message
	* @param
	* $message = a string
	*/
	public function set_message($message)
	{
		if(is_string($message))
		{
			$this->message = $message;
		}
	}
	/*
	* set_response_data($data) ; function that will set the response data
	* @param
	* $data = it is an array of data
	*/
	public function set_response_data($data=array())
	{
		if(is_array($data))
		{
			$this->response_data = $data;
		}
	}
	public function evaluate_response($response=FALSE, $type=0){
		$this->CI->lang->load('message');
		$this->error = 1;
		$error_message = array('error_added','error_updated','error_deleted');
		$success_message = array('success_added','success_updated','success_deleted');
		$response = (bool)$response;
		if($response)
		{
			$this->error = 0;
			$this->message = $this->CI->lang->line($success_message[$type]);
		}else{
			$this->message = $this->CI->lang->line($error_message[$type]);
		}
	}
	/*
	* get_response($return) ; function that will return the ajax response
	* @param
	* $return = a boolean variable whether response is returned or echoed
	*/
	public function get_response($return=FALSE)
	{
		$response = array(
			"error" 	=> $this->error,
			"message"	=> $this->message,
			"data"		=> $this->response_data
		);
		$this->array_to_json($response,$return);
	}
	/*
	* load($return) ; function that will return the ajax response
	* @param
	* $return = a boolean variable whether response is returned or displayed
	*/
	public function load($common_file,$page_file="",$file,$data=array(),$return=FALSE,$ajax=FALSE)
	{
		//initialize varaibles
		$temp_data				= array();
		$layout_template_path   = APPPATH."views/".$common_file."/";
		$pages_path  			= APPPATH."views/pages/";
		$main_data				= array();
		$styles 				= "";
		$scripts 				= "";
		$head 					= "";
		$header 				= "";
		$leftsidebar			= "";
		$content				= "";
		$foot 					= "";
		$footer 				= "";
		$main_content 			= "";

		//revalidate pages
		$this->CI->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
		$this->CI->output->set_header("Cache-Control: post-check=0, pre-check=0");
		$this->CI->output->set_header("Pragma: no-cache"); 

		//check if page path exists
		if( ($page_file!="" AND file_exists($pages_path.$page_file) AND file_exists($pages_path.$page_file."/".$file.".php")) OR ($page_file=="" AND file_exists($pages_path) AND file_exists($pages_path."/".$file.".php")) )
		{
			$temp_data = $data;
			$temp_data['title']    		= $this->title;
			if( $this->breadcrumb_title != "Home" && !empty($this->breadcrumb_title))
			{
				$temp_data['title']     = ucfirst($this->breadcrumb_title)." | Alumni Information & Management System ";
			}
			$temp_data['breadcrumb_title'] = $this->breadcrumb_title;
			$temp_data['parent_navigation'] = $this->parent_navigation;
			$temp_data['navigation'] 	= $this->navigation_active;
			$temp_data['base_url'] 		= base_url();
			$temp_data['css_url']  		= css_url();
			$temp_data['asset_url']		= asset_url();
			$temp_data['plugin_url']	= plugin_url();
			$temp_data['js_url']		= js_url();
			$temp_data['img_url']		= img_url();
			$temp_data['upload_url']	= upload_url();
			$temp_data['csrf_token']	= $this->CI->security->get_csrf_token_name();
			$temp_data['csrf_hash']		= $this->CI->security->get_csrf_hash();

			//render content
			if($page_file!="")
			{
				$content 			= $this->CI->parser->parse("pages/".$page_file."/".$file,$temp_data,TRUE);
			}else
			{
				$content 			= $this->CI->parser->parse("pages/".$file,$temp_data,TRUE);
			}

			if($ajax==FALSE)
			{
				//render head
				$head 				= $this->CI->parser->parse($common_file."/head",$temp_data,TRUE);
				
				//render styles
				$style_content 		= array();
				if(!empty($this->styles))
				{
					foreach ($this->styles as $key => $value) {
						$style_content[]   = '<link rel="stylesheet" type="text/css" href="'.$value.'">';
					}
				}
				$styles 			= implode('',$style_content);
				
				//render header
				if( file_exists($layout_template_path."header.php") )
				{
					$header 			= $this->CI->parser->parse($common_file."/header",$temp_data,TRUE);
				}else{
					$header             = "";
				}

				//render leftsidebar
				if( file_exists($layout_template_path."leftsidebar.php") )
				{
					$leftsidebar 		= $this->CI->parser->parse($common_file."/leftsidebar",$temp_data,TRUE);
				}else{
					$leftsidebar 		= "";
				}

				//render footer
				if( file_exists($layout_template_path."footer.php") )
				{
					$footer 			= $this->CI->parser->parse($common_file."/footer",$temp_data,TRUE);
				}else{
					$footer 		    = "";
				}

				//render foot
				$foot 				= $this->CI->parser->parse($common_file."/foot",$temp_data,TRUE);

				//render scripts
				$script_content 	= array();
				if(!empty($this->scripts))
				{
					foreach ($this->scripts as $key => $value) {
						$script_content[]   = '<script type="text/javascript" src="'.$value.'"></script>';
					}
				}
				$scripts 			= implode('',$script_content);

				//render main page
				$temp_data["head"] 			= $head;
				$temp_data["styles"]		= $styles;
				$temp_data["header"] 		= $header;
				$temp_data["leftsidebar"] 	= $leftsidebar;
				$temp_data["content"]		= $content;
				$temp_data["footer"]		= $footer;
				$temp_data["foot"]			= $foot;
				$temp_data["scripts"]		= $scripts;
				
				$main_content       = $this->CI->parser->parse($common_file."/index",$temp_data,true);
				unset($temp_data);
			}else
			{
				if($page_file!="")
				{
					$main_content 			= $this->CI->parser->parse("pages/".$page_file."/".$file,$temp_data,TRUE);
				}else
				{
					$main_content 			= $this->CI->parser->parse("pages/".$file,$temp_data,TRUE);
				}
			}
			
			if($return==FALSE)
			{
				echo $main_content;
			}else 
			{
				return $main_content;
			}
		}else
		{
			return show_404();
		}
	}
}