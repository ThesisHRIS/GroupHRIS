<div id="main-content">
	<div class="wrapper">
		<?php $attributes = array('class' => 'cmxform form-horizontal tasi-form', 'id' => '','validate'=>'validate'); echo form_open_multipart('EmployeeSuspended/save', $attributes); ?>
			<div class="col-lg-12"> 
				<section class="panel">
					<header class="panel-heading">
						<h4>Suspend Employee</h4>
					</header>
					<div class="panel-body">
						<div class="form-group">
							<div class="col-sm-6">
								<div class="col-lg-2 control-label">Employee:</div>
								<div class="col-lg-5">
									<select name="emp_id" class="form-control" style="100%">
										<?php foreach ($empInfo as $key) {?>
											<option value="<?php echo $key['emp_id']?>"><?php echo $key['emp_id']." - ".$key['first_name']." ".$key['last_name']?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="col-lg-3 control-label">Suspension ID:</div>
								<div class="col-lg-3">
									<input type="text" class="form-control" name="suspension_id">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-6">
								<div class="col-lg-3 control-label">Start Date:</div>
								<div class="col-xs-6">
									<input type="date" name="start_date" class="form-control">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="col-lg-3 control-label">End Date:</div>
								<div class="col-xs-6">
									<input type="date" name="end_date" class="form-control">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-6">
								<input   type="submit" class= "pull-left btn btn-success" value="Submit" name="submit">
							</div>
						</div>
					</div>
				</section>
			</div>
		<?php echo form_close(); ?>
	</div>
</div>