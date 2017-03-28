<?php 
   if(!defined('BASEPATH')) exit('No direct script access allowed!');
   
   class UploadCsv extends CI_Controller
   {
   public function __construct(){
      parent::__construct();
      $this->load->helper(array('form','url'));
      $this->load->helper('url');
      $this->load->library('form_validation');
      $this->load->library('encrypt');
      $this->load->model('MdActivity');
      $this->load->model('MdFiles');
   }
   
   public function index(){
   if($this->session->userdata('emp_id')){
         if($this->session->userdata('type')==='1'){
      $data['title'] = "Add 201 Files";
      $data['proposals'] = "";
      $data['proposalsList'] = "";
      $data['active201'] = "";
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
      $data['proposalsList']="active";
      $data['proposals']= "";
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
      $data['validate'] = $this->validate();
      // print_r($data);
      $this->load->view('pages/payroll_module/attendance_agorra_view',$data,@$GLOBALS['file_name'],@$GLOBALS['startDate'],@$GLOBALS['endDate']);
      // $this->load->view('modal/approved');
      $this->load->view('common/foot');
      $this->load->view('common/footer');
      }else{
         redirect('userDashboard');
      }
   
   }else{
         redirect('/');
      }
   }
   
    public function save(){
         date_default_timezone_set('Asia/Manila');
         $date=date('Y-m-d');
   
                $file='uploads/'.$date.'/'.$_GET['filename'];
                  // echo $file;
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
               // print_r($array);
               $query = $this->MdFiles->insertAttendance($array); 
               }
               
   
                  }
                  
   
               $query = $this->computePayroll();
               echo $query;
                 }
                
              
   public function computePayroll(){
         $employee = $this->MdFiles->getEmployee();
         // print_r($employee);
         foreach ($employee as $key) {
            $tax_status = $key['tax_status'];
            $attendance = $this->MdFiles->getAttendance($key['emp_id']);
            $otHours=0;
            $otNum=0;
            $absent=0;
            $tardyHours = 0;
            $tardyDeduction=0;
            $tardyNum = 0;
            $absentCount = 0;
            $loanTotal =0;
            $points=0;
            $pointTotal=0;
            $ecola=0;
            $salary = $this->MdFiles->getSalary($key['emp_id']);
            $FinalSalary =0;
            $caDeduction=0;
            $other=0;
            $ca = $this->MdFiles->getCaRequest($key['emp_id']);
            foreach ($ca as $key ) {
               if($key['is_paid']==='0'){
                  $caDeduction = $caDeduction + $key['pay_amount'];
               }
            }
            foreach ($salary as $salary) {
               $FinalSalary = explode(' ',$this->encrypt->decode($salary['basic']));
               $FinalSalary = $FinalSalary[0];
               $FinalSalary = ((double)$FinalSalary/26)/8;
               $ecola = $salary['ecola'];
               $other = $salary['other'];

            }

            $loans = $this->MdFiles->getLoans($key['emp_id']);
            // print_r();
            foreach ($attendance as $attend) {
               if($attend['time_in']!='00:00:00' && $attend['time_in'] <= '09:15:00'){
                  // echo "hello ";
                  $points =$points +100;
               }
                if($attend['time_in']!='00:00:00' && $attend['time_in'] > '09:15:00'){
                  // echo 'hi ';
                  $points =$points -50;
               }
            }
            // echo $points;
            $pointsCount = $this->MdFiles->getPointInfo($key['emp_id']);
            
            if(count($pointsCount) > 0){
               // echo $points;
               $pointsTotal = $pointsCount[0]['points'] + $points;
               // echo $pointsTotal;
               $array = array(
                     'points' => $pointsTotal
               );
               // echo $points
               $this->MdFiles->updatePoint($pointsCount[0]['points_id'],$array);
            }else{
                $array = array(
                     'emp_id' => $key['emp_id'],
                     'points' => $points,
                     'status' => '0'
               );
               $this->MdFiles->insertPoints($array);
            }

           

            foreach ($attendance as $dtr) {
               if($dtr['time_in']==='00:00:00'&&$dtr['time_out']==='00:00:00' && $dtr['day']!='Sa' && $dtr['day']!='Su'){
                  $leaves = $this->MdFiles->getLeaves($key['emp_id'],$dtr['day_date']);
                  // print_r($leaves);
                  if(count($leaves)>0){
                     if($leaves[0]['withPayCount']==='0'){
                        $absent=$absent +1;
                     }
                  }else{
                        $absent=$absent+1;
                  }

               }
            }
            // echo $absent;
            foreach ($attendance as $dtr) {
               if($dtr['time_out'] > '18:00:00'){
                  $ot= $this->MdFiles->getOt($key['emp_id'],$dtr['day_date']);
                  foreach ($ot as $ot) {
                     $otNum++;
                     $otHours = $otHours + $ot['total_hours'];
                     $otHours = $otHours * $FinalSalary;
                  }
               }else{
                  // echo "hi  ";
               }
               if($dtr['time_in'] > '09:15:00'){
                  $explode = explode(" " , $dtr['time_in']);
                  $time_in = date_parse($explode[0]);
                  // print_r($time_in);
                  $in= $time_in['hour']*3600 + $time_in['minute']*60;
                  $tardyHours= ($in - 33300)/3600;
                  $tardyNum=$tardyNum+1;

                  $tardyDeduction=$tardyDeduction+($FinalSalary*$tardyHours);
                  
                  // $tardyHours = $tardyHours + ($dtr['time_in']-'09:15:00');
                  // echo ($dtr['time_in']);

               }
            }

            // echo $tardyDeduction;
            foreach ($loans as $loan) {
               if($loan['is_paid']==='0'){
                  $loanTotal=(double)$loanTotal + (double)$loan['pay_amount'];
                  $initial_amount =$loan['initial_amount'] + $loan['pay_amount'];
                  if($initial_amount >= $loan['amount']){
                     $array = array(
                        'initial_amount'=>$initial_amount,
                        'is_paid' => '1'  
                     );
                  }else{
                     $array = array(
                        'initial_amount'=>$initial_amount,
                     );
                  }
                  $this->MdFiles->updateLoans($loan['ca_id'],$array);
               }
            }
                  $sample = explode('-',$GLOBALS['endDate']);
                  if($sample[2]>'20'){
                     $quarter = '2';
                  }else{
                     $quarter ='1';
                  }
                  $total = $FinalSalary*8*26;
                  $sssDeduction = $this->MdFiles->getdeductionSSS($total);
                  // print_r($sssDeduction);
                  $sss =0;
                  if(@$sssDeduction[0]['equivalent']){
                     $sss =$sssDeduction[0]['equivalent'];
                  }
                  $taxableIncome = (($FinalSalary*8*13)+$ecola+$other)-$tardyDeduction-$sss-($absent*($FinalSalary*8))-50-50;
                  // echo $taxableIncome.' ';
                  $totalTaxAnnually = $taxableIncome*12;
                  // echo $totalTaxAnnually.' ';
                  $getPercentage = $this->MdFiles->getPercentage($totalTaxAnnually,$tax_status);
                  $excess=0;
                  $percentage=0;
                  $exemption=0;
                  foreach ($getPercentage as $tax) {
                     $percentage = $tax['percentage'];
                     $excess = $tax['excess'];
                     $exemption = $tax['exemption'];
                     # code...
                  }
                  // echo $percentage;
                  $finalTax = $taxableIncome-$excess;
                  // echo $finalTax.' ';
                  $finalTax = $exemption+($finalTax*($percentage/100));
                  // echo $finalTax;
                  $payroll = array(
                     'payment_year'=>'2017',
                     'payment_month'=>$sample[1],
                     'payment_quarter'=>$quarter,
                     'emp_id'=>$key['emp_id'],
                     'ot_num'=>$otNum,
                     'ot_hours'=>$otHours,
                     'ot_pay'=>$otHours*$FinalSalary*1.25,
                     'sat_num'=>'',
                     'sun_num'=>'',
                     'legal_num'=>'',
                     'special_num'=>'',
                     'night_diff_pay'=>'',
                     'night_diff_hours'=>'',
                     'tardy_num'=>$tardyNum,
                     'tardy_deduc'=>$tardyDeduction,
                     'absent_num'=>$absent,
                     'absent_deduc'=>$absent*($FinalSalary*8),
                     'meal_count'=>"",
                     'hour_rate'=>$FinalSalary,
                     'day_rate'=>$FinalSalary*8,
                     'gross_pay'=>"",
                     'sss'=> $sss/2,
                     'philhealth'=>50,
                     'pagibig'=>50,
                     'tax' => $finalTax,
                     'sss_loan'=>" ",
                     'ph_loan'=>" ",
                     'other_deduc'=>$caDeduction,
                     'net_pay'=>$taxableIncome-$finalTax,
                     'undertime_num'=>" ",
                     'undertime_deduc'=>" ",
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

            $query =$this->MdFiles->insertPayroll($payroll);
            
            $boolean = '0';
            if($query){
               $boolean ='1';
            }else{
               $boolean = '0';
            }
         }

         // print_r($query);
         return $boolean;
   }
   
   
   
   
   
   
   public function validate(){
      date_default_timezone_set('Asia/Manila');
      $date=date('Y-m-d');
      if(@$_FILES['file']){
      $name_array = array();
           $count = count($_FILES['file']['size']);
           $boolean=0;
           foreach($_FILES as $key=>$value){
              for($s=0; $s<=$count-1; $s++) {
                 $_FILES['file']['name']=$value['name'][$s];
                 $_FILES['file']['type']    = $value['type'][$s];
                 $_FILES['file']['tmp_name'] = $value['tmp_name'][$s];
                 $_FILES['file']['error']       = $value['error'][$s];
                 $_FILES['file']['size']    = $value['size'][$s]; 
   
   
                  $config['upload_path'] = 'uploads/'.$date;
                   if (!file_exists($config['upload_path'])) {
                   mkdir($config['upload_path'], 0777, true);
               }else{
                  
               }
                  $config['allowed_types'] = 'csv|CSV';
                  $config['max_size']    = '9999999';
                  $config['max_width']  = '5000';
                  $config['max_height']  = '5000';
                $this->load->library('upload', $config);
                 $upload=$this->upload->do_upload('file');
                 $data = $this->upload->data();
                 $name_array[] = $data['file_name'];
   
                 // print_r($name_array[0]);
                 $GLOBALS['file_name'] = $name_array[0];
                 if($upload){
                  $boolean=1;
                  $file='uploads/'.$date.'/'.$name_array[0];
                  // echo $file;
               $csv= file_get_contents($file);
               $array = array_map("str_getcsv", explode("\n", $csv));
               $json = json_encode($array);
               // print_r($array[4]);
               $data;
               $GLOBALS['id']=0;
               $GLOBALS['startDate'] = "0000-00-00";
               $GLOBALS['endDate'] = "0000-00-00";
               // $GLOBALS['countTardy'] = 0;
               $arrayAll =  array();
            foreach ($array as $key ) {
               if(@$key[0]==="Start Date"){
                  $split = explode("/",$key[1]);
                  if($split
                  [1]<10){
                  $GLOBALS['startDate'] = $split[2]."-".$split[0]."-0".$split[1]; 
                  }else{
                  $GLOBALS['startDate'] = $split[2]."-".$split[0]."-".$split
                  [1];
                  }
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
               
               if(count($id)>0){
                  $GLOBALS['id'] =@$id[0]['emp_id'];
                  // echo $id;
               }
               $testId = $this->MdFiles->getIdTest($GLOBALS['id']);
               // print_r(count($testId));
               if(count($testId)<=0){
                  $error = "Emp_id Not Found!";
               }else{
                  $error ="";
               }
            
               $date = explode('/',$key[0]);
               $year = @explode(' ',$date[2]);
               
               if(@$date[1]){
                  if($date[1]<10){
                     $dates = $year[0]."-".$date[0]."-0".$date[1];
                  }else{
                     $dates = $year[0]."-".$date[0]."-".$date[1];
                  }
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
               // echo  $GLOBALS['endDate'];
               if( $dates >= $GLOBALS['startDate'] && $dates <= $GLOBALS['endDate']){
                     $error = $error;
               }else{
                  if($error != ' '){
                     $error = $error . ', Date Error';
                  }
               }
               // echo $key[2];
               if(@$year[1]){
                  $array = array(
                           'emp_id'=>$GLOBALS['id'],
                           'day_date'=>$dates,
                           'day'=>$year[1],
                           'time_in'=>$key[1],
                           'time_out'=>$key[2],
                           'error' =>$error 
                        );
                  array_push($arrayAll, $array);
   
                 }
              }
              return $arrayAll;
          }else{
            // return "no Data";
      }
   }
   
   }
   
   }
   }
   
   }
   ?>