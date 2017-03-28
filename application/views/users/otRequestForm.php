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
								<th>Status</th>
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
								<?php if(strtoupper($data['status'])==="PENDING"){?>
								<td>
									<button class="btn btn-success btn-xs EditotRequest" data_attr="<?php echo $this->encrypt->encode($data['ot_id']); ?>" data-toggle="modal" data-target="#EditotRequest" title="edit">
                              <i class="fa fa-pencil"></i>
                           </button>
									</a>
			                  		
			                  		<button class="btn btn-danger btn-xs  cancelOtRequest" data_attr="<?php echo $this->encrypt->encode($data['ot_id']); ?>"  mAtt="" title="Cancel">
                              <i class="fa fa-ban "></i>
                           </button>
								</td>
								<?php } else {?>
									<td>
									<button class="btn btn-success btn-xs EditotRequest" disabled data_attr="<?php echo $this->encrypt->encode($data['ot_id']); ?>" data-toggle="modal" data-target="#EditotRequest" title="edit">
                              <i class="fa fa-pencil"></i>
                           </button>
			                  		
			                  		<button class="btn btn-danger btn-xs  cancelOtRequest" disabled data_attr="<?php echo $this->encrypt->encode($data['ot_id']); ?>"  mAtt="" title="Cancel">
                              <i class="fa fa-ban "></i>
                           </button>
								</td>

								<?php } ?>
								<td><?php echo $data['status'] ?></td>
							</tr>
							<?php }} ?>
						</tbody>
					</table>
				</section>
			</div>
		</div>
	</div>
</div>