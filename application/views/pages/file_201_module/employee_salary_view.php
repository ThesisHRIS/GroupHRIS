<div id="main-content"> <!-- Main Content Section with everything -->
	<div class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						<h4>Player List</h4>
						<form></form>
						<div class="col-lg-3">
						<!-- <?php echo form_open('timeIn_timeOut/import') ?>
							<input type="file" name="csv_file_import" class="form-control">
							<div class="col-lg-2 control-label">Import CSV</div>
							<input type="submit" name="submit" class="form-control" value="IMPORT">
						<?php form_close(); ?> -->
						</div>
					</header>
					<table class="table table-striped table-advance table-hover">
						<thead>
							<tr>
								<th><i class="fa fa-book"></i>Employee Number</th>
								<th><i class="fa fa-user"></i>Employee Name</th>
								<th><i class="fa fa-sitemap"></i>Department</th>
								<th><i class="fa fa-gears"></i>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($data as $list) { ?>
							<tr>
								<td><?php echo $list['emp_no'] ?></td>
								<td>
									<a href="<?php echo base_url('userprofile'); ?>?emp_id=<?php echo $list['emp_no'] ?>" title="title"><?php echo $list['first_name'].' '.$list['last_name'] ?></a>
								</td>
								<td><?php echo $list['department_name'] ?></td>
								<td>
									<a href="<?php echo base_url('SalaryConfig');?>?emp_id=<?php echo $list['emp_id'] ?>" title="Salary Configuration">Salary Configuration</a>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</section>
			</div>
		</div>
	</div>	
</div>
