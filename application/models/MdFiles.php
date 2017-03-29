<?php

class MdFiles extends CI_Model {

	private $table = "tbl_employees";

	public function __construct()
	{
		parent::__construct();
	}

	public function add201files($data){

		$this->db->insert('tbl_employees', $data);

		return true;
	}
	public function getDepartment(){
		$this->db->select()
		->from('tbl_department_list');

		$query =$this->db->get();

		return $query->result_array();
	

	}
	public  function getCaRequest($id){
		$this->db->select()
		->from('tbl_cash_advance')
		->where('emp_id',$id);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function getLeaves($id,$day_date){
		$this->db->select()
		->from('tbl_leave_forms')
		->where('emp_id',$id)
		->where('start_date <=',$day_date)
		->where('DateLeaveLimit >=',$day_date);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function addReference($data){
		$this->db->insert('tbl_character_reference',$data);
		return true;
	}
	public function getLoans($id){
		$this->db->select()
		->from('tbl_cash_advance')
		->where('emp_id',$id);

		$query =$this->db->get();

		return $query->result_array();
	}
	public function generatePayroll($term, $month, $year){
		$this->db->select()
		->from('tbl_payroll as pay')
		->join('tbl_employees as emp','emp.emp_id = pay.emp_id')
		->where('payment_quarter',$term)
		->where('payment_month',$month)
		->where('payment_year',$year);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function getSupervisor(){
		$this->db->select()
		->from('tbl_supervisor_list');

		$query =$this->db->get();

		return $query->result_array();

	}
	public function getTax(){

		$this->db->select()
		->from('tbl_tax_status');

		$query =$this->db->get();

		return $query->result_array();
	}

	public function addSalary($data){

		$this->db->insert('tbl_salary', $data);

		return true;
	}



	public function getSalary($id){
		$this->db->select()
		->from('tbl_salary')
		->where('emp_id',$id);

		$query= $this->db->get();

		return $query->result_array();
	}
	public function getAllFiles(){
		$this->db->select()
		->from('tbl_employees as emp')
		->join('tbl_department as dep','dep.department_no = emp.department','LEFT');

		$query= $this->db->get();

		return $query->result_array();
	}
	public function getEmp_id(){
		
		$this->db->select('emp_id')
		->from('tbl_employees')
		->order_by('emp_id','desc')
		->limit(1);

		$query= $this->db->get();

		return $query->result_array();
	}
	public function getId($lname,$fname){
		// echo $lname;

		$this->db->select('emp_id')
		->from('tbl_employees')
		->where('last_name',$lname);

		$query = $this->db->get();
		return $query->result_array();


		
	}
	public function getIdTest($id){
		// echo $lname;
		$this->db->select('emp_id')
		->from('tbl_employees')
		->where('emp_id',$id);

		$query = $this->db->get();
		return $query->result_array();
	}
	public function insertVote($data){
		$this->db->insert('tbl_votation',$data);
		return true;
	}

	public function getInfo($id){
		$this->db->select()
		->from('tbl_employees')
		->where('emp_id',$id);

		$query= $this->db->get();

		return $query->result_array();

	}

	public function getAllCompany(){
		$this->db->select()
		->from('tbl_company');

		$query= $this->db->get();

		return $query->result_array();
	}

	public function getAllTaxStatus(){
		$this->db->select()
		->from('tbl_tax_status');

		$query= $this->db->get();

		return $query->result_array();
	}

	public function getAllDepartment(){
		$this->db->select()
		->from('tbl_department_list');

		$query= $this->db->get();

		return $query->result_array();
	}

	public function getAllSupervisor(){
		$this->db->select()
		->from('tbl_supervisor_list');

		$query= $this->db->get();

		return $query->result_array();
	}
	
	public function getView($id){
		// echo $id;
		$this->db->select('*')
		->from('tbl_employees as emp')
		->join('tbl_department as dep','dep.department_no = emp.department','LEFT')
		->join('tbl_salary as sal','sal.emp_id = emp.emp_id','LEFT')
		->join('tbl_character_reference as char','char.emp_id = emp.emp_id','LEFT')
		->where('emp.emp_id',$id);

		$query= $this->db->get();

		return $query->result_array();
	}
	public function insertAttendance($data){
		$this->db->insert('tbl_attendance',$data);
		return true;
	}
	public function getAttendance($emp_id,$start_date,$end_date){
		$this->db->select()
		->from('tbl_attendance')
		->where('emp_id',$emp_id)
		->where('day_date >=',$start_date)
		->where('day_date <=',$end_date);

		$query = $this->db->get();

		return $query->result_array();
	}
	public function getEmployee(){
		$this->db->select()
		->from('tbl_employees');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function getdeductionSSS($salary){
		$this->db->select('equivalent')
		->from('tbl_sss_contribution')
		->where('range_from <=',$salary)
		->where('range_to >=',$salary);

		$query = $this->db->get();
		

		return $query->result_array();
		// return $salary;
	}

	public function getdeductionPhilHealth($salary){
		$this->db->select('equivalent')
		->from('tbl_philhealth_contribution')
		->where('range_from <=',$salary)
		->where('range_to >=',$salary);

		$query = $this->db->get();
		

		return $query->result_array();
	}
	public function getAbsent($id,$sdate,$edate){
		// echo $id;
		$this->db->select();
		$this->db->from('attendance');;
		$this->db->where('emp_id',$id);
		$this->db->where('day_date<=',$edate);
		$this->db->where('day_date>=',$sdate);
		$this->db->where('day !=','Sa');
		$this->db->where('day !=','Su');
		$this->db->where('time_in','00:00');
		$this->db->where('time_out','00:00');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function getOt($id,$date){
		$this->db->select()
		->from('tbl_ot_forms')
		->where('status','approved')
		->where('emp_id',$id)
		->where('ot_date',$date);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function savePayroll($data){
		// echo $data['payment_year'];
		$this->db->select()
		->from('tbl_payroll')
		->where('payment_year',$data['payment_year'])
		->where('payment_month',$data['payment_month'])
		->where('payment_quarter',$data['payment_quarter'])
		->where('emp_id',$data['emp_id']);
		// print_r($data);

		$query = $this->db->get();

		return $query->result_array();
	}
	public function insertPayroll($data){
		$this->db->insert('tbl_payroll',$data);

		return true;
	}
	public function updatePayroll($id,$data){
		$this->db->where('payroll_id',$id)
		->update('tbl_payroll', $data);
		return true;
	}
	public function updateLoans($id,$data){
		$this->db->where('ca_id',$id)
		->update('tbl_cash_advance', $data);
		return true;
	}
	public function getPayroll($id){
		$this->db->select()
		->from('tbl_employees as emp')
		->join('tbl_payroll as pay','emp.emp_id = pay.emp_id')
		->join('tbl_salary as sal','sal.emp_id = emp.emp_id')
		->where('emp.emp_id',$id);

		$query = $this->db->get();

		return $query->result_array();
	}
	public function getPayrollWithId($id){
		$this->db->select()
		->from('tbl_payroll')
		->where('payroll_id',$id);

		$query = $this->db->get();

		return $query->result_array();

	}
	public function getPayrollPaySlip($term,$month,$year,$id){
		$this->db->select()
		->from('tbl_employees as emp')
		->join('tbl_payroll as pay','emp.emp_id = pay.emp_id')
		->join('tbl_salary as sal','sal.emp_id = emp.emp_id')
		->where('emp.emp_id',$id)
		->where('pay.payment_month',$month)
		->where('pay.payment_quarter',$term)
		->where('pay.payment_year',$year);

		$query = $this->db->get();

		return $query->result_array();
	}
	public function getPointInfo($id){
		$this->db->select()
		->from('tbl_points')
		->where('emp_id',$id);

		$query = $this->db->get();

		return $query->result_array();
	}
	public function getPointInfoWithEmployee($id){
		$this->db->select()
		->from('tbl_points as pts')
		->join('tbl_employees as emp','emp.emp_id =pts.emp_id','LEFT')
		->where('pts.emp_id',$id);

		$query = $this->db->get();

		return $query->result_array();
	}
	public function updatePoint($id,$data){
		$this->db->where('points_id',$id)
		->update('tbl_points', $data);
		return true;
	}
	public function insertPoints($data){
		$this->db->insert('tbl_points',$data);

		return true;
	}

	public function deleteUser($id){
		$this->db->where('emp_id', $id)->update('flag', 0);
	}

	public function updateAdd201files($id,$data){
		$this->db->where('emp_id',$id)
		->update('tbl_employees', $data);
		return true;

	}
	public function updateAddSalary($id,$data){
		$this->db->where('emp_id',$id)
		->update('tbl_salary', $data);
		return true;
	}
	public function updateAddReference($id,$data){
		$this->db->where('emp_id',$id)
		->update('tbl_character_reference', $data);
		return true;
	}
	public function getPercentage($salary,$tax_id){
		$this->db->select()
		->from('tbl_percentage')
		->where('range_from < ',$salary)
		->where('range_to >',$salary)
		->where('tax_id',$tax_id);

		$query = $this->db->get();

		return $query->result_array();
	}
	// public function getSalary($id){
	// 	$this->db->select()
	// 	->from('tbl_salary')
	// 	->where('emp_id',$id);

	// 	$query = $this->db->get();

	// 	return $query->result_array();
	// }

	public function getEmployeeStatus($id){
		$this->db->select()
		->from('tbl_suspension')
		->where('emp_id', $id);

		$query = $this->db->get();

		return $query->result_array();
	}
}

?>