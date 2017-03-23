<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed!');

class Add201File extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->model('MdFiles');
	}

	public function index(){
		if($this->session->userdata('emp_id')){
			if($this->session->userdata('type')==='1'){
			$data['title'] = "Dashboard";
			$data['dashboard'] = "";
			$data['proposals'] = "";
			$data['proposalsList'] = "";
			$data['active201'] = "active";
			$data['activeDash'] = "";
			$data['active201View']= ""; 
			$data['salaryConfig']= ""; 
			$data['leaveRequest']= "";
			$data['leaveHistory']= "";
			$data['leaveIncentives']= "";
			$data['leaveSummary']= "";
			$data['OtRequest']= "";
			$data['OtHistory']= "";
			$data['viewSuspension']= "";
			$data['suspendEmployee']= "";
			$data['cashAdvance']= "";
			$data['cashAdvanceHistory']= "";
			$data['otherLoans']= "";
			$data['otherLoansHistory']= "";
			$data['calendar']= "";
			$data['holiday']= "";
			$data['holidayList']= "";
			$data['activity']= "";
			$data['activityList']= "";
			$data['item']= "";
			$data['itemList']= "";
			$data['supervisor']= "";
			$data['department']= "";
			$data['sess_email'] = $this->session->userdata('email');
			$data['email'] = $this->session->userdata('email');
			$data['sess_email'] = $this->session->userdata('email');
			$data['email'] = $this->session->userdata('email');
			$this->load->view("common/head",$data);
			$this->load->view("common/header");
			$this->load->view("common/nav");
			$data['company']= $this->getAllCompany();
			$data['tax_status'] = $this->MdFiles->getTax();
			$data['department'] = $this->MdFiles->getDepartment();
			$data['supervisor_id'] = $this->MdFiles->getSupervisor();
			$this->load->view('pages/file_201_module/add_201_view',$data);
			$this->load->view('common/foot');
			$this->load->view('common/footer');
			}else{
			redirect('userDashboard');
		}
	}else{
		redirect('/');
	}
}
	public function getAllCompany(){

		return $this->MdFiles->getAllCompany();
	}

	public function view(){
		$data['sess_email'] = $this->session->userdata('email');
		$this->load->view("common/head",$data);
		$this->load->view("common/header");
		$data['company']= $this->getAllCompany();
		$emp_id =$this->input->get('emp_id');
		$data['data'] = $this->MdFiles->getView($emp_id);
		$data['emp_id'] = $emp_id;
		$data['tax_status'] = $this->MdFiles->getTax();
		$data['department'] = $this->MdFiles->getAllDepartment();
		$data['supervisor'] = $this->MdFiles->getSupervisor();
		// print_r($data);
		$this->load->view('pages/file_201_module/update_201',$data);
		$this->load->view('common/foot');
		$this->load->view('common/footer');
	}
	public function saveForm(){
		$arrNew = array();
		$contactName = parse_str($_GET['data_upd'], $arrNew);
		$array = array(
			'emp_no'=>$arrNew['emp_no'],
			'company_id'=>$arrNew['company'],
			'last_name'=>ucfirst($arrNew['last_name']),
			'middle_name'=>ucfirst($arrNew['middle_name']),
			'birth_date'=>$arrNew['birth_date'],
			'first_name'=>ucfirst($arrNew['first_name']),
			'civil_status'=>$arrNew['civil_status'],
			'gender'=>$arrNew['gender'],
			'birth_place'=>$arrNew['birth_place'],
			'nationality'=>$arrNew['nationality'],
			'religion'=>$arrNew['religion'],
			'email'=>$arrNew['email'],
			'password'=>'2Io2zVMZTA9dFUtpwKKVSn7SYQ7ZgpbOcACl8nGRiEk',
			'address'=>$arrNew['address'],
			'mobile'=>$arrNew['mobile'],
			'phone'=>$arrNew['phone'],
			'elementary'=>$arrNew['elementary'],
			'highschool'=>$arrNew['highschool'],
			'hs_address'=>$arrNew['hs_address'],
			'hs_graduated'=>$arrNew['hs_graduated'],
			'vocational'=>$arrNew['vocational'],
			'voc_address'=>$arrNew['voc_address'],
			'voc_graduated'=>$arrNew['voc_graduated'],
			'voc_course'=>$arrNew['voc_course'],
			'college'=>$arrNew['college'],
			'col_address'=>$arrNew['col_address'],
			'col_graduated'=>$arrNew['col_graduated'],
			'col_course'=>$arrNew['col_course'],
			'post_graduate'=>$arrNew['post_graduate'],
			'postgrad_address'=>$arrNew['postgrad_address'],
			'postgrad_graduated'=>$arrNew['postgrad_graduated'],
			'postgrad_degree'=>$arrNew['postgrad_degree'],
			'children'=>$arrNew['children'],
			'sss'=>$arrNew['sss'],
			'tin'=>$arrNew['tin'],
			'philhealth'=>$arrNew['philhealth'],
			'pag_ibig'=>$arrNew['pag_ibig'],
			'tax_status'=>$arrNew['tax_status'],
			'spouse_name'=>$arrNew['spouse_name'],
			'spouse_job'=>$arrNew['spouse_job'],
			'spouse_company'=>$arrNew['spouse_company'],
			'contact_emergency'=>$arrNew['contact_emergency'],
			'contact_relation'=>$arrNew['contact_relation'],
			'contact_number'=>$arrNew['contact_number'],
			'hire_date'=>$arrNew['hire_date'],
			'position'=>$arrNew['position'],
			'department'=>$arrNew['department'],
			'company'=>$arrNew['company'],
			'supervisor_id'=>$arrNew['supervisor_id'],
			'status'=>'Active'
		);
		
		// print_r($array);
		ini_set('max_execution_time', 0); 
        date_default_timezone_set('Asia/Manila');
        $date = date('Y.M.d');
			$query=$this->MdFiles->add201files($array);
			$id=  $this->MdFiles->getEmp_id();
			// print_r($query1[0]['emp_id']);
		$array1 = array(
			'emp_id'=>$id[0]['emp_id'],
			'basic'=>$this->encrypt->encode($arrNew['basic'].SALT),
			'ecola'=>$arrNew['ecola'],
			'other'=>$arrNew['other'],
			'pay_start'=>$date,
			'pay_end'=>'N/A'
		);
		// print_r($array1);
		$query1=$this->MdFiles->addSalary($array1);
		
		$data = array(
				'emp_id'=>$id[0]['emp_id'],
				'ref_name'=>$arrNew['ref_name1'].','.$arrNew['ref_name2'].','.$arrNew['ref_name3'],
				'ref_company'=>$arrNew['ref_company1'].','.$arrNew['ref_company2'].','.$arrNew['ref_company3'],
				'ref_position'=>$arrNew['ref_position1'].','.$arrNew['ref_position2'].','.$arrNew['ref_position3'],
				'ref_number'=>$arrNew['ref_number1'].','.$arrNew['ref_number2'].','.$arrNew['ref_number3']

			);
			$query2 = $this->MdFiles->addReference($data);	
			if ($query&&$query1&&$query2) {
				echo '1';
			}else{
				echo '0';
			}	
	
	}
	public function update_201(){
		$arrNew = array();
		$contactName = parse_str($_GET['data_upd'], $arrNew);
		$array = array(
			'emp_no'=>$arrNew['emp_no'],
			'company_id'=>$arrNew['company'],
			'last_name'=>ucfirst($arrNew['last_name']),
			'middle_name'=>ucfirst($arrNew['middle_name']),
			'birth_date'=>$arrNew['birth_date'],
			'first_name'=>ucfirst($arrNew['first_name']),
			'civil_status'=>$arrNew['civil_status'],
			'gender'=>$arrNew['gender'],
			'birth_place'=>$arrNew['birth_place'],
			'nationality'=>$arrNew['nationality'],
			'religion'=>$arrNew['religion'],
			'email'=>$arrNew['email'],
			'password'=>'2Io2zVMZTA9dFUtpwKKVSn7SYQ7ZgpbOcACl8nGRiEk',
			'address'=>$arrNew['address'],
			'mobile'=>$arrNew['mobile'],
			'phone'=>$arrNew['phone'],
			'elementary'=>$arrNew['elementary'],
			'highschool'=>$arrNew['highschool'],
			'hs_address'=>$arrNew['hs_address'],
			'hs_graduated'=>$arrNew['hs_graduated'],
			'vocational'=>$arrNew['vocational'],
			'voc_address'=>$arrNew['voc_address'],
			'voc_graduated'=>$arrNew['voc_graduated'],
			'voc_course'=>$arrNew['voc_course'],
			'college'=>$arrNew['college'],
			'col_address'=>$arrNew['col_address'],
			'col_graduated'=>$arrNew['col_graduated'],
			'col_course'=>$arrNew['col_course'],
			'post_graduate'=>$arrNew['post_graduate'],
			'postgrad_address'=>$arrNew['postgrad_address'],
			'postgrad_graduated'=>$arrNew['postgrad_graduated'],
			'postgrad_degree'=>$arrNew['postgrad_degree'],
			'children'=>$arrNew['children'],
			'sss'=>$arrNew['sss'],
			'tin'=>$arrNew['tin'],
			'philhealth'=>$arrNew['philhealth'],
			'pag_ibig'=>$arrNew['pag_ibig'],
			'tax_status'=>$arrNew['tax_status'],
			'spouse_name'=>$arrNew['spouse_name'],
			'spouse_job'=>$arrNew['spouse_job'],
			'spouse_company'=>$arrNew['spouse_company'],
			'contact_emergency'=>$arrNew['contact_emergency'],
			'contact_relation'=>$arrNew['contact_relation'],
			'contact_number'=>$arrNew['contact_number'],
			'hire_date'=>$arrNew['hire_date'],
			'position'=>$arrNew['position'],
			'department'=>$arrNew['department'],
			'company'=>$arrNew['company'],
			'supervisor_id'=>$arrNew['supervisor_id'],
			'status'=>$arrNew['status']
		);
		$query=$this->MdFiles->updateAdd201files($arrNew['emp_id'],$array);
		$id=  $this->MdFiles->getEmp_id();
		$array1 = array(
			'emp_id'=>$id[0]['emp_id'],
			'basic'=>$this->encrypt->encode($arrNew['basic'].SALT),
			'ecola'=>$arrNew['ecola'],
			'other'=>$arrNew['other'],
			'pay_end'=>'N/A'
		);
		$query1=$this->MdFiles->updateAddSalary($arrNew['emp_id'],$array1);
		
		if ($query&&$query1) {
			echo '1';
		}else{
			echo '0';
		}	
	
	}
}
?>
