<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed!');

class Sample1 extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('MdFiles');
	}
	
	public function index(){
		$file="uploads/2017-02-16/hello.csv";
		$csv= file_get_contents($file);
		$array = array_map("str_getcsv", explode("\n", $csv));
		$json = json_encode($array);
		// print_r($array[4]);
		$data;
		$GLOBALS['id']=0;
		$GLOBALS['startDate'] = "0000-00-00";
		$GLOBALS['endDate'] = "0000-00-00";
		// $GLOBALS['countTardy'] = 0;
	foreach ($array as $key ) {
		if(@$key[0]==="Start Date"){
			$split = explode("/",$key[1]);
			$GLOBALS['startDate'] = $split[2]."-".$split[0]."-".$split
			[1];
		}else{
			// $GLOBALS['startDate'] = "0000-00-00";
		}
	
		if(@$key[0]==="End Date"){
			$split1 = explode("/",$key[1]);
			$GLOBALS['endDate'] = $split1[2]."-".$split1[0]."-".$split1
			[1];
		}else{
			// $GLOBALS['endDate']  = "0000-00-00";
		}
			// echo $GLOBALS['endDate'];
		// echo $startDate." ".$endDate;
		$emp = explode(',',$key[0]);
		$info = array();
		if(@$emp[1]){
			$info[0]= $emp[1];
			$info[1]= $emp[0];
		}else{
			// echo "hello";
		}
	
		$id = $this->MdFiles->getId(@$info[1],@$info[0]);
		// print_r($id);
		if(count($id)>0){
			$GLOBALS['id'] =@$id[0]['emp_id'];
			// echo $id;
		}
		// echo $GLOBALS['id'];
		$date = explode('/',$key[0]);
		$year = @explode(' ',$date[2]);
		
		if(@$date[1]){
			$dates = $year[0]."-".$date[0]."-".$date[1];
		}else{
			$dates ='0000-00-00';
		}
		// print_r($dates);
		$time_in = explode(' ', @$key[1]);
		$time_in_hour = explode(':', $time_in[0]);
		$time_out = explode(' ', @$key[2]);
		$time_out_hour = explode(':', $time_out[0]);
		if(@$time_in[1]){
			// echo $key[1];
			
				if($time_in[1]==="PM"){
					$hour = $time_in_hour[0]+12;
					$key[1] = $hour.':'.$time_in_hour[1];
				}
			if(@$time_out[1]){
				if($time_out[1]==="PM"){
					$hour = $time_out_hour[0]+12;
					$key[2] = $hour.':'.$time_out_hour[1];
				}
			}else{
					$key[2] = "18:00";
			}
		}else{
			$key[1]='00:00';
			$key[2]='00:00';
			
		}
		// echo $key[2];
	if(@$year[1]){
		$array = array(
						'emp_id'=>$GLOBALS['id'],
						'day_date'=>$dates,
						'day'=>$year[1],
						'time_in'=>$key[1],
						'time_out'=>$key[2]

					);

			 $query = $this->MdFiles->insert($array);
		}
		if($key[1]!='00:00'&&$key[2]!='00:00'){
			if($dates!="0000-00-00"){
				
				$this->computePayroll($array);
				// $query = $this->MdFiles->insert($array);
				}
			}

			
			// $absent = array();
			// if($GLOBALS['id']>0&&$key[1]=="00:00"&&$key[2]=="00:00"&&$dates = "0000-00-00"){
			// 	// $absent[$GLOBALS['id']]['absents'] += $count++;
			// 	echo "hello";
			// }else{
			// 	// $absent[$GLOBALS['id']]['absents'] +=0;
			// }

			// print_r($absent);
	}
		

	}
	public function computePayroll($data){
		if($GLOBALS['startDate']!="0000-00-00"&&$GLOBALS['endDate']!="0000-00-00"){
			$absentCount = $this->MdFiles->getAbsent($data['emp_id'],$GLOBALS['startDate'] ,$GLOBALS['endDate'] );

			// print_r(count($absentCount));
		}
		$salary = $this->MdFiles->getSalary($data['emp_id']);
		// print_r($salary[0]['basic']);
		$salaryRate = $salary[0]['basic'];
		$hourlyRate= $salary[0]['basic']/26/8;
		$absentDeduction = count($absentCount)*($hourlyRate*8);
		$sss =  $this->MdFiles->getdeductionSSS($salary[0]['basic']);
		$philHealth =  $this->MdFiles->getdeductionPhilHealth($salary[0]['basic']);
		// echo $hourlyRate;
		// print_r();
		
		if(count($sss)>0){
			$sssDeduction = @$sss[0]['equivalent'];
		}else{
			// @$sssDeduction[0]['equivalent']=0;
			$sssDeduction = 0;
		}

		if(count($philHealth)>0){
			$philhealthDeduction = @$philHealth[0]['equivalent'];
		}else{
			// @$sssDeduction[0]['equivalent']=0;
			$philhealthDeduction = 0;
		}

		// echo $philhealthDeduction;
		$explode = explode(" " , $data['time_in']);
		$explode1 = explode(" " , $data['time_out']);
		$time_in = date_parse($explode[0]);
		$time_out = date_parse($explode1[0]);

		$in= $time_in['hour']*3600 + $time_in['minute']*60;
		$out= $time_out['hour']*3600 + $time_out['minute']*60;

		$totalHours = ($out - $in)/3600;

		if($out<64800){
			if($out<43200){
				$undertime_deduc_hours = ((65700-$out)/3600)-1;
				$countUnderTime=1;
			}else{
				$undertime_deduc_hours = (65700-$out)/3600;
				$countUnderTime=1;
			}
			
		}else{
			$undertime_deduc_hours=0;
			$countUnderTime=0;
		}

		if($totalHours>8){
			$totalHours = 8;
			// $countUnderTime=0;
		}
		if($in>33300){
			$late= ($in - 33300)/3600;
			$countLate=1;
		}else{
			$late = 0;
			$countLate=0;
		}

		$latededuction = $late;

		$hourlySalary = ($totalHours - $late) * $hourlyRate;	 	
		$payment = explode('-',$GLOBALS['endDate']);
		// echo $payment[2];
		if($payment[2]>20){
			$payment_quarter = '2';
		}else{
			$payment_quarter = '1';
		}
		$otNum = $this->MdFiles->getOt($data['emp_id']);
		$oThours=0;
		foreach ($otNum as $key) {
			$oThours += $key['total_hours'];
			// echo $key['total_hours'];

		}

		// print_r($otNum);
		$payroll = array(
				'payment_year'=>$payment[0],
				'payment_month'=>$payment[1],
				'payment_quarter'=>$payment_quarter,
				'emp_id'=>$data['emp_id'],
				'ot_num'=>count($otNum),
				'ot_hours'=>$oThours,
				'ot_pay'=>$oThours*$hourlyRate*1.25,
				'sat_num'=>'',
				'sun_num'=>'',
				'legal_num'=>'',
				'special_num'=>'',
				'night_diff_pay'=>'',
				'night_diff_hours'=>'',
				'tardy_num'=>$countLate,
				'tardy_deduc'=>$latededuction,
				'absent_num'=>count($absentCount),
				'absent_deduc'=>$absentDeduction,
				'meal_count'=>"",
				'hour_rate'=>$hourlyRate,
				'gross_pay'=>"",
				'sss'=> $sssDeduction ,
				'philhealth'=>100,
				'pagibig'=>100,
				'sss_loan'=>" ",
				'ph_loan'=>" ",
				'other_deduc'=>" ",
				'net_pay'=>$salaryRate-$latededuction-$absentDeduction-$sssDeduction-100-100,
				'undertime_num'=>$countUnderTime,
				'undertime_deduc'=>$undertime_deduc_hours,
				'sat_num_over'=>" ",
				'sun_num_over'=>" ",
				'legal_num_over'=>" ",
				'special_num_over'=>" ",
				'sat_amount'=>" ",
				'sat_amount_over'=>" ",
				'sun_amount'=>" ",
				'sun_amount_over'=>" ",
				'leg_amount'=>" ",
				'leg_amount_over'=>" ",
				'spc_amount'=>" ",
				'spc_amount_over'=>" "
			);
		// print_r($array);

		$sumUp = $this->MdFiles->savePayroll($payroll);

		// echo(count($sumUp));
		if(count($sumUp)>0){
			$payroll = array(
				'payment_year'=>$payment[0],
				'payment_month'=>$payment[1],
				'payment_quarter'=>$payment_quarter,
				'emp_id'=>$data['emp_id'],
				'ot_num'=>count($otNum),
				'ot_hours'=>$oThours,
				'ot_pay'=>$oThours*$hourlyRate*1.25,
				'sat_num'=>'',
				'sun_num'=>'',
				'legal_num'=>'',
				'special_num'=>'',
				'night_diff_pay'=>'',
				'night_diff_hours'=>'',
				'tardy_num'=>$countLate,
				'tardy_deduc'=>$latededuction,
				'absent_num'=>count($absentCount),
				'absent_deduc'=>$absentDeduction,
				'meal_count'=>"",
				'hour_rate'=>$hourlyRate,
				'gross_pay'=>"",
				'sss'=> $sssDeduction ,
				'philhealth'=>100,
				'pagibig'=>100,
				'sss_loan'=>" ",
				'ph_loan'=>" ",
				'other_deduc'=>" ",
				'net_pay'=>$salaryRate-$latededuction-$absentDeduction-$sssDeduction-100-100,
				'undertime_num'=>$countUnderTime,
				'undertime_deduc'=>$undertime_deduc_hours,
				'sat_num_over'=>" ",
				'sun_num_over'=>" ",
				'legal_num_over'=>" ",
				'special_num_over'=>" ",
				'sat_amount'=>" ",
				'sat_amount_over'=>" ",
				'sun_amount'=>" ",
				'sun_amount_over'=>" ",
				'leg_amount'=>" ",
				'leg_amount_over'=>" ",
				'spc_amount'=>" ",
				'spc_amount_over'=>" "
			);

			$query = $this->MdFiles->updatePayroll($sumUp[0]['payroll_id'],$payroll);
		}else{
			$query = $this->MdFiles->insertPayroll($payroll);
		}	


	}


}

?>
