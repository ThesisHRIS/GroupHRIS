<div id="main-content">
	<div class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						<h4>OT History</h4>
					</header>
					<table class="table table-striped table-advance table-hover">
						<thead>
							<tr>
								<th>Employee Name</th>
								<th>Date Requested</th>
								<th>OT Date</th>
								<th>Total Hours</th>
								<th>Task</th>
								<th>Status</th>
								<th>Why Decline?</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							if(!empty($otlist)){
								foreach($otlist as $data){
						?>
							<tr>
								<td><?php echo $data['first_name'].' '.$data['last_name'] ?></td>
								<td><?php echo $data['date_filed'] ?></td>
								<td><?php echo $data['ot_date'] ?></td>
								<td><?php echo $data['total_hours'] ?></td>
								<td><?php echo $data['task'] ?></td>
								<td>
									<?php 
										if ($data['status']!="approved") {
											echo "<span class='label label-danger label-mini'>".$data['status']."</span>";
										} else {
											echo "<span class='label label-success label-mini'>".$data['status']."</span>";
										}
									?>
								</td>
								<td><?php echo $data['reason'] ?></td>
							</tr>
						<?php }} ?>
						</tbody>
					</table>
				</section>
			</div>
		</div>
	</div> 
</div>