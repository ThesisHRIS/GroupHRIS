<div id="main-content">
	<div class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						<h4>Player List</h4>
					</header>
					<table class="table table-striped table-advance table-hover">
						<thead>
							<tr>
								<th>Employee Number</th>
								<th>Employee Name</th>
								<th>Department</th>
								<th>Suspension Date</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($data as $list){ ?>
							<tr>
								<td><?php echo $list['emp_no'] ?></td>
								<td><?php echo $list['first_name'].$list['middle_name'].$list['last_name'] ?></td>
								<td><?php echo $list['department_name'] ?></td>
								<td><?php echo $list['suspension_from']. ' to '. $list['suspension_to'] ?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</section>
			</div>
		</div>
	</div>
</div>