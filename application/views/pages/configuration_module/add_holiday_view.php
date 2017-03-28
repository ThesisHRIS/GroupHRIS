<div id="main-content"> 			
	<div class="wrapper">
		<div class="col-lg-12">
			<!-- <form class="form-horizontal" action="" method="post"> -->
				  <?php $attributes = array('class' => 'form-horizontal', 'id' => ''); echo form_open_multipart('Holiday/add', $attributes); ?>
				<section class="panel">
					<header class="panel-heading">
						<h4>Add Holiday</h4>
						<a href="<?php echo base_url().'HolidayList'?>"  style="float: right;margin-top:-3%;height: 31px;padding: 6px;" title="Delete" class="btn btn-default btn-xs">
										<i class="fa fa-undo"></i> Back to List
									</a> 
					</header>
					<div class="panel-body">
						<div class="form-group">
							<div class="col-lg-2 control-label"><label style="color:red">*</label>Name of Holiday:</div>
							<div class="col-lg-4">
								<input type="text" name="holiday_name" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-2 control-label"><label style="color:red">*</label>Date of Holiday:</div>
							
							<div class="col-lg-3">
								
          
									<input type="date" name="date" class="form-control" required>
                        
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-lg-2 control-label"><label style="color:red">*</label>Company:</div>
							<div class="col-lg-2">
								<select name="company"  class="form-control" required>
									<?php foreach ($company as $com) {?>
										<option value="<?php echo $com['company_id'] ?>"><?php echo $com['company_name'] ?></option>
									<?php } ?>
									<option value="3">All</option>
								</select>
							</div>
							<div class="col-lg-1 control-label"><label style="color:red">*</label>Type:</div>
							<div class="col-lg-2">
								<select name="holiday_type"  class="form-control" required>
									<option value="0">--None--</option>
									<option value="Legal">Legal</option>
									<option value="Special">Special</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-2">
								<button class="btn btn-success" name="add_holiday" type="submit" value="Add">Add</button>
							</div>
						</div>
					</div>
				</section>
			</form>
		</div>
	</div>
</div>
