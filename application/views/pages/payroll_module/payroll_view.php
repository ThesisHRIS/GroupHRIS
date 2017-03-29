<div id="main-content">
	<div class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						<h4>Payroll Generation</h4>
						<div>
							<!-- <form  name="pay" class ="pay" > -->
							 <?php $attributes = array('class' => '', 'id' => ''); echo form_open_multipart('AgorraPayroll/', $attributes); ?>
						<div class="col-sm-3">
							<select class="form-control" name="term" id="term">
							<option value = "1">1st</option>
							<option value = "2">2nd</option>
							</select>
						</div>
							<!-- <select name="month"> -->

							<div class="col-sm-3" >
							<select class="form-control" style="height:40px;" size="1" name="month" id="month">
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

							</div>
							
								
							<!-- </select> -->
							<div class="col-sm-3">
							<select class="form-control"  name="years" id="year">
								<?php 
									for($x = date("Y"); $x>=2000;$x--){
										echo '<option value="'.$x.'">'.$x.'</option>';
									}
								?>
								<!-- <option value=""></option> -->
							</select>
						</div>
							<input type="submit"  name="submit" value="Generate" id = "submit" class="btn btn-success submit">
							</form>
						
						</div>

						
					</header>
					<table class="table table-striped table-advance table-hover">
								<tr>
									<th>Payment Year</th>
									<th>Payment Month</th>
									<th>Payment Quarter</th>
									<th>Employee Name</th>
								
								</tr>
									<?php if(@$payroll){foreach ($payroll as $key) {?>
									<tr>
										<td><?php echo $key['payment_year'] ?></td>
										<td><?php echo $key['payment_month'] ?></td>
										<td><?php echo $key['payment_quarter'] ?></td>
										<td><?php echo $key['last_name'].','.$key['first_name'] ?></td>
										<td>
											<button class="btn btn-success btn-xs viewPayroll" data_attr="<?php echo $key['payroll_id'] ?>" data-toggle="modal" data-target="#viewPayroll" title="View">
												<i class="fa fa-eye"></i> View
											</button>
										</td>
								
									</tr>
									<?php } } ?>
							</table>
				</section>
			</div>
		</div>

	</div>
</div>
