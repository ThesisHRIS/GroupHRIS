<div id="main-content">
	<div class="wrapper">
		<div class="col-lg-8">
			<!-- <form name="edit" class="form-horizontal edit" action="" method="post"> -->
				<section class="panel">
					<header class="panel-heading">
						<h4>Personal Information</h4>
					</header>
					<div class="panel-body">
					
							<?php $attributes = array('class'=>'form-horizontal userEdit','name'=>'userEdit'  ); echo form_open_multipart('', $attributes); ?>
							
                                         
						<div class="form-group">
							<table class="table table-advance" style="border-top:;">
								
								<tbody>
								<tr>
									<td></td>
									<td colspan="2">Old Password :</td>
									<td colspan="4"><input type="password" required name="oldpassword" class="form-control oldpassword"></td>
									<td>
									<td>
								</tr>
								<tr>
									<td></td>
									<td colspan="2">New Password :</td> 
									<td colspan="4"><input type="password" required name="password" class="form-control password"></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="2">Confirm Password :</td>
									<td colspan="4"><input type="password" required name="repassword" class="form-control re"></td>
									<td></td>
									<td></td>
								</tr>

								</tbody>
								
							</table>
								<p align="right">
									<button class="btn btn-success userEditButton" type="button" value="Submit" />Update</button>
								</p>	
				</fieldset>
							
					 <?php echo form_close(); ?> 
							</form>
						</div>
					</div>
				</section>
			</form>
		</div>
	</div>
</div>