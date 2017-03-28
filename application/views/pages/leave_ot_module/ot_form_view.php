<div id="main-content">
	<div class="wrapper">
		<div class="col-lg-12">
			<?php echo form_open('', array('name'=>'update_ot', 'class'=>'form-horizontal update_ot')) ?>
			<section class="panel">
				<header class="panel-heading">
					<h4>OT Form</h4>
				</header>
				<div class="panel-body">
					<div class="form-group">
						<div class="col-lg-12">
							<div class="col-lg-2 control-label">Emp ID:</div>
							<div class="col-lg-3" style="margin-left:-8%;">
								<?php foreach ($emp_id as $list) { 
									if($list['emp_id']===$this->session->userdata('emp_id')){?>
										<input class="form-control" readonly="readonly" name="emp_id" type="text" value="<?php echo $list['emp_no'].' - '. $list['last_name']?>"> 
								<?php } }?>
							</div>
							<?php 
								date_default_timezone_set('Asia/Manila');
								$date=date('Y-m-d');
							?>
							<div class="col-lg-2 control-label"><label style="color:red">*</label>Date Filed:</div>
							<div class="col-lg-3" style="margin-left:-9%;">
							<?php date_default_timezone_set('Asia/Manila');
										$date=date('Y-m-d');?>
								<input type="date" class="form-control date_filed" readonly="readonly" name="date_filed" value="<?php echo $date ?>" required>
							</div>
							<div class="col-lg-2 control-label"><label style="color:red">*</label>OT Date:</div>
							<div class="col-lg-3" style="margin-left:-9%;">
								<input type="date" name="ot_date" id="otDate" oninput="validateDate();" class="form-control" required>
								<p class="error_date"></p>
							</div>

						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-12">
							
							<div class="col-lg-2 control-label"><label style="color:red">*</label>Time Start:</div>
							<div class="col-lg-2" style="margin-left:-9%;">
								<input type="time" name="time_start" oninput="getTime()" class="form-control time_start" required>
							</div>
							<div class="col-lg-2 control-label"><label style="color:red">*</label>Time End:</div>
							<div class="col-lg-2" style="margin-left:-9%;">
								<input type="time" name="time_end" oninput="getTime()" class="form-control time_end" required>
							</div>		
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-12">
							<div class="col-lg-3 control-label"><label style="color:red">*</label>Total Hours:</div>
							<div class="col-lg-4" style="margin-left:-7%;">
								<input class="form-control hours" id="totalHours" readonly="readonly" type="text" name="hours" required>
							</div>
							<p class="error_time"></p>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-12">
							<div class="col-lg-2 control-label">Supervisor ID:</div>
							<div class="col-lg-2" style="margin-left:-8%;">
								<select name="supervisor_id" class="form-control">
									<?php foreach ($supervisor as $list) {?>
											<option value="<?php echo $list['supervisor_id'] ?>"><?php echo $list['supervisor_no'].'-'.$list['supervisor_last_name'] ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-12">
							<div class="col-lg-2 control-label"><label style="color:red">*</label>Task:</div>
							<div class="col-lg-6" style="margin-left:-8%;">
								<textarea class="form-control" name="task" required></textarea>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-lg-12">
							<div class="col-lg-12">
								
								<button onclick="resetFieldsOtForm()" style="margin-left:.5%" class="btn btn-default">Cancel</button>
								<button class="btn btn-success editOtRequestForm" style="float:right;margin-right: 1%" type = "button" name="submit" value="Submit">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>