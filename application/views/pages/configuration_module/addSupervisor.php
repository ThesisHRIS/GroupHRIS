<div id="main-content"> 			
	<div class="wrapper">
		<div class="col-lg-12">
			<!-- <form class="form-horizontal" action="" method="post"> -->
				  <?php $attributes = array('class' => 'form-horizontal', 'id' => ''); echo form_open_multipart('AddSupervisor/add', $attributes); ?>
				<section class="panel">
					<header class="panel-heading">
						<h4>Add Supervisor</h4>
						<a href="<?php echo base_url().'SupervisorList'?>"  style="float: right;margin-top:-3%;height: 31px;padding: 6px;" title="Delete" class="btn btn-default btn-xs">
										<i class="fa fa-undo"></i> Back to List
									</a> 
					</header>
					<div class="panel-body">
					<div class="form-group">
							<div class="col-lg-2 control-label"><label style="color:red">*</label>Supervisor No:</div>
							
							<div class="col-lg-3">
							
									<input type="text" name="supervisor_no" class="form-control" required>
                        
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-2 control-label"><label style="color:red">*</label>Name of Supervisor:</div>
							<div class="col-lg-3">
								<input type="text" name="first_name" class="form-control" required placeholder="First Name">
							</div>
							<div class="col-lg-3">
								<input type="text" name="last_name" class="form-control" required placeholder="Last Name">
							</div>
						</div>
						
						
						<div class="form-group">
							<div class="col-lg-2 control-label"><label style="color:red">*</label>Department:</div>
							<div class="col-lg-2">
								<select name="department"  class="form-control" required>
									<?php foreach ($department as $com) {?>
										<option value="<?php echo $com['department_id'] ?>"><?php echo $com['department_name'] ?></option>
									<?php } ?>
								
								</select>
							</div>
							
						</div>
						<div class="form-group">
							<div class="col-lg-2">
								<button class="btn btn-success" name="add_supervisor" type="submit" value="Add">Add</button>
							</div>
						</div>
					</div>
				</section>
			</form>
		</div>
	</div>
</div>
