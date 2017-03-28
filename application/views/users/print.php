<div id="main-content">
	<div class="wrapper">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					<h4>PaySlip</h4>
				</header>
				<div class="panel-body">
					<table class="table table-advance">
						<tr>
						<?php $attributes = array('class' => '', 'id' => ''); echo form_open_multipart('UserPayslip/', $attributes); ?>
							<td><select name="term" class="form-control">
							<option value = "1">1st</option>
							<option value = "2">2nd</option>
							</select>
							</td>
							<td>
							<select  name="month" class="form-control">
							<option value = "1">January</option>
							<option value = "2">February</option>
							<option value = "3">March</option>
							<option value = "4">April</option>
							<option value = "5">May</option>
							<option value = "6">June</option>
							<option value = "7">July</option>
							<option value = "8">August</option>
							<option value = "9">September</option>
							<option value = "10">October</option>
							<option value = "11">November</option>
							<option value = "12">December</option>
							</select>
							</td>	
							<td>
							<select name="years" class="form-control">
								<?php 
									for($x = date("Y"); $x>=2000;$x--){
										echo '<option value="'.$x.'">'.$x.'</option>';
									}
								?>
								<!-- <option value=""></option> -->
							</select>
							</td>
							<td>
							<input type="submit" name="submit" value="Generate" id = "submit" class="btn btn-success">
							</td>
							</tr>	
					
						<?php foreach ($payroll as $key) {?>
							
					
							<tr>
								<td>Employee Number: <?php echo $key['emp_no'] ?></td>
							</tr>
						
						<tbody>
							<tr>
								<td>Employee Name: <?php echo $key['last_name'].','. $key['first_name']?> </td>
								<td></td>
								<td>Position:<?php echo $key['position'] ?></td>
								<td></td>
							</tr>
								
							<tr>
								<td>EARNINGS</td>
								<td>AMOUNT</td>
								<td>DEDUCTIONS</td>
								<td>AMOUNT</td>
							</tr>
							
							<tr>
								<td>Basic Pay:</td>
								<?php 
									$basic=$this->encrypt->decode($key['basic']); 
									$basic = explode(' ',$basic);
								?>
								<td><?php echo $basic[0]?></td>
								<td>Absences</td>
								<td><?php echo $key['absent_deduc']?></td>
							</tr>
							<tr>
								<td>Legal Holiday</td>
								<td>0</td>
								<td>Lates</td>
								<td><?php echo $key['tardy_deduc']?></td>
							</tr>
							<tr>
								<td>Special Holiday</td>
								<td>0</td>
								<td>SSS Premium</td>
								<td><?php echo $key['sss']?></td>
							</tr>
							<tr>
								<td>Regular Overtime:</td>
								<td><?php echo $key['ot_pay']?></td>
								<td>PhilHealth Premium</td>
								<td><?php echo $key['philhealth']?></td>
							</tr>
							<tr>
								<td>Night Differential</td>
								<td>0</td>
								<td>Pag-Ibig Premium</td>
								<td><?php echo $key['pagibig']?></td>
							</tr>
							<tr>
								<td>ECOLA</td>
								<td><?php echo $key['ecola']?></td>
								<td>Withholding Tax</td>
								<td>0</td>
							</tr>
							<tr>
								<td>Other Earnings</td>
								<td>0</td>
								<td>Pag-ibig Loans/SSS Loan</td>
								<td>0</td>
							</tr>
							<tr>
								<td>Meal Allowance</td>
								<td>0</td>
								<td>Co. Loans/Others</td>
								<td>0</td>
							</tr>
							<tr>
							<?php $totalEarn = $key['ecola']+$basic[0]+$key['ot_pay']?>
							<?php $totalDeduc =  $key['absent_deduc']+$key['tardy_deduc']+$key['sss']+$key['philhealth']+$key['pagibig']?>
								<td>Total Earnings</td>
								<td><?php echo $totalEarn?></td>
								<td>Total Deductions</td>
								<td><?php echo $totalDeduc?></td>
							</tr>
							<tr>
								<td>YTD Earnings</td>
								<td>0</td>
								<td>Net Pay</td>
								<td><?php echo $totalEarn - $totalDeduc?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</section>
		</div>
	</div>
</div>