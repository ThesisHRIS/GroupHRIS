<div id="main-content"> 			
	<div class="wrapper">
		<div class="col-lg-12">
			<!-- <form class="form-horizontal" action="" method="post"> -->
				  <?php $attributes = array('class' => 'form-horizontal', 'id' => ''); echo form_open_multipart('Department/add', $attributes); ?>
				<section class="panel">
					<header class="panel-heading">
						<h4>Add Holiday</h4>
						<a href="<?php echo base_url().'Department'?>"  style="float: right;margin-top:-3%;height: 31px;padding: 6px;" title="Delete" class="btn btn-default btn-xs">
										<i class="fa fa-undo"></i> Back to List
									</a> 
					</header>
					<div class="panel-body">
						<div class="form-group">
							<div class="col-lg-2 control-label"><label style="color:red">*</label>Name of Department:</div>
							<div class="col-lg-4">
								<input type="text" name="department_name" class="form-control" required>
							</div>
						</div>
						
						
						
						<div class="form-group">
							<div class="col-lg-2">
								<button class="btn btn-success" name="add_department" type="submit" value="Add">Add</button>
							</div>
						</div>
					</div>
				</section>
			</form>
		</div>
	</div>
</div>
