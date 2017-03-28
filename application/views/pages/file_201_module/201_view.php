<div id="main-content"> <!-- Main Content Section with everything -->
	<div class="wrapper"><!-- Start Content Box -->
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						<h4>Employee List</h4>
					</header>
					<table class="table table-striped table-advance table-hover">
						<thead>
							<tr>
								<th>
									<i class="fa fa-book"></i>
									Employee Number
								</th>
								<th class="hidden-phone">
									<i class="fa fa-user"></i>
									Employee Name	
								</th>
								<th>
									<i class="fa fa-sitemap"></i>
									Department
								</th>
								<th>
									<i class="fa fa-gears"></i>
									Action
								</th>
								<th>
									<i class="fa fa-gears"></i>
									status
								</th>
							</tr>
						</thead>
						<tbody >
							<?php foreach ($fetchAll as $data) {?>
							<tr>
								<td> <?php echo $data['emp_no']?></td>
								<td> <?php echo $data['first_name'].' '.$data['last_name']?></td>
								<td> <?php echo $data['department_name']?></td>
								<td>
								    <a href="<?php echo base_url('Add201File/view'); ?>?emp_id=<?php echo $data['emp_id'] ?>" class="btn btn-success btn-xs">
										<i class="fa fa-pencil"></i>
									</a>
									
								<button class="btn btn-info btn-xs" onclick="view201(<?php echo $data['emp_id'] ?>);"  data-toggle="modal" data-target="#view201" title="edit">
                              			<i class="fa fa-eye"></i>
                           			</button>
								</td>
								<td> <?php echo $data['status']?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</section>
		</div> <!-- End .content-box -->
	</div> <!-- End #main-content -->
</div>
  

