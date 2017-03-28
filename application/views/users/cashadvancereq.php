<div id="main-content">
	<div class="wrapper">
		<div class="col-lg-12">
			<?php echo form_open('', array('name'=>'form1', 'class'=>'form-horizontal form1'))?> 
			<section class="panel">
				<header class="panel-heading">
					<h4>Cash Advance Form</h4>
				</header>
				<div class="panel-body">
					<div class="form-group">
						<?php
							date_default_timezone_set('Asia/Manila');
							$date=date('Y-m-d');
						?>
						<div class="col-lg-2 control-label">Date Filed:</div>
						<div class="col-lg-3" style="margin-left:-7%;">
							<input class="form-control col" readonly= "readonly" value="<?php echo $date?>" type="date" name="date_filed" required />
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-2 control-label">Emp ID:</div>
						<div class="col-lg-2" style="margin-left:-7%;">
							<?php foreach ($emp as $list) {
							?>

							<input type="text" readonly=""  class="form-control" name="" value="<?php echo $list['emp_no']?>">
							
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-2 control-label">Employee Name:</div>
						<div class="col-lg-3" style="margin-left:-7%;">
							<input class="form-control"  readonly="readonly" value="<?php echo $list['first_name']." ".$list['last_name'] ?>" name="small-input" />
						</div>
						<div class="col-lg-2 control-label">Department</div>
						<div class="col-lg-3" style="margin-left:-5%;">
							<input class="form-control"  readonly="readonly" value ="<?php echo $list['department_name']?>" name="small-input" />
						</div>
					</div>
					<?php }  ?>
					
					<div class="form-group">
						<div class="col-lg-2 control-label"><label style="color:red">*</label> Amount:</div>
						<div class="col-lg-3" style="margin-left:-7%;">
							<input class="form-control amount" type="text" oninput="compute()" id="small-input" name="amount" required />
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-2 control-label"><label style="color:red">*</label>Start of Payment:</div>
						<div class="col-lg-3" style="margin-left:-6%;">
							<input class="form-control" type="date" name="payment_start" required />
						</div>	
					</div>
					<div class="form-group">
						<div class="col-lg-2 control-label"><label style="color:red">*</label>Payment Terms:</div>
						<div class="col-lg-2" style="margin-left:-6%;">
							<select name="payment_terms" class="form-control" id="payment_terms" required> 
								<option></option>
								<option value="1">One Month</option>
								<option value="2">Two Months</option>
								<option value="3">Three Months</option>
								<option value="4">Four Months</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-3 control-label"><label style="color:red">*</label>Amount to be deducted per payday:</div>
						<div class="col-lg-3">
							<input class="form-control " name="pay_amount" id="pay_amount" required readonly="readonly" /></td>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-2 control-label"><label style="color:red">*</label>Description/Particulars:</div>
						<div class="col-lg-6">
							<textarea class="form-control" id="textarea" name="description" cols="79" rows="15" required></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-6">
							<button type="submit" class="btn btn-success pull-left cancel_cashAdvance" style="background-color:#b0b5b9;border-color:#b0b5b9;" name="submit">Cancel</button>						
						</div>
						<div class="col-lg-6">
							<button type="button" class="btn btn-success pull-right " onclick="cashAdvance();" name="submit">Submit</button>						
						</div>
					</div>
				</div>
			</section>
			<?php echo form_close(); ?>
		</div>
	</div>		
</div>
