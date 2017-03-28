<div id="main-content">
	<div class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						<h4>Leave History</h4>
					</header>
					<table class="table table-striped table-advance table-hover">
						<thead>
							<tr>
								<th>Leave ID</th>
								<th>Employee ID</th>
								<th>Supervisor ID</th>
								<th>Date Filed</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>No of days</th>
								<th>Leave Type</th>
								<th>Reason</th>
								<th>status</th>
								<th>remarks</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach($leavelist as $data){ ?>
							<tr>
								<td><?php echo $data['leave_id']?></td>
								<td><?php echo $data['emp_id']?></td>
								<td><?php echo $data['supervisor_id']?></td>
								<td><?php echo $data['date_filed']?></td>
								<td><?php echo $data['start_date']?></td>
								<td><?php echo $data['end_date']?></td>
								<td><?php echo $data['days']?></td>
								<td><?php echo $data['type']?></td>
								<td><?php echo $data['comments']?></td>
								<td>
									<?php 
										if (strtoupper($data['status'])!="APPROVED") {
											echo "<span class='label label-danger label-mini'>". $data['status'] . "</span>";
										} else {
											echo "<span class='label label-success label-mini'>". $data['status']. "</span>";
										}
									?>
								</td>
								<td><?php echo $data['remarks']?></td>
							</tr>
						<?php }?>
						</tbody>
					</table>
				</section>
			</div>
		</div>
	</div>
</div>