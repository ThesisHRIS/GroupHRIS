<div id="main-content"> <!-- Main Content Section with everything -->
	<div class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						<h4>OT Request</h4>
					</header>
					<table class="table table-striped table-advance table-hover">
						<thead>
							<tr>
								<th>Employee Name</th>
								<th>Date Requested</th>
								<th>OT Date</th>
								<th>Total Hours</th>
								<th>Tasks</th>
								<th>Action</th>
							</tr>	
						</thead>
						<tbody>
							<?php 
								if(!empty($otrequest)){
								foreach($otrequest as $data){
							?>
							<tr>
								<td><?php echo $data['first_name'].' '.$data['last_name'] ?></td>
								<td><?php echo $data['date_filed'] ?></td>
								<td><?php echo $data['ot_date'] ?></td>
								<td><?php echo $data['total_hours'] ?></td>
								<td><?php echo $data['task'] ?></td>
								<td>
									<a href="" class="btn btn-success btn-xs otRequest" data_attr="<?php echo $this->encrypt->encode($data['ot_id']); ?>" data-toggle="modal" data-target="#otRequest" title="edit">
										<i class="fa fa-check" aria-hidden="true"></i>
									</a>
			                  		
			                  		<a href="" class="btn btn-danger btn-xs declineOT" data_attr="<?php echo $this->encrypt->encode($data['ot_id']); ?>" data-toggle="modal" data-target="#declinedOt" title="edit">
										<i class="fa fa-times" aria-hidden="true"></i>
									</a>
								</td>
							</tr>
							<?php }} ?>
						</tbody>
					</table>
				</section>
			</div>
		</div>
	</div>
</div>