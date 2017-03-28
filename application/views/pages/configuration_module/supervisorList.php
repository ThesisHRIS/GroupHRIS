<div id="main-content">
	<div class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						<h4>Supervisor List</h4>
						<a href="<?php echo base_url().'AddSupervisor'?>"  style="float: right;margin-top:-3%;height: 31px;padding: 6px;" title="Delete" class="btn btn-info btn-xs">
										<i class="fa fa-plus"></i> Add Supervisor
									</a> 
					</header>
					<table class="table table-striped table-advance table-hover">
						<thead>
							<tr>
								<th>Supervisor No</th>
								<th>Supervisor Last Name</th>
								<th>Supervisor First Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($list as $list) {
								
							?>	
							<tr>	
								<td><?php echo $list['supervisor_no'] ?></td>							
								<td><?php echo $list['supervisor_first_name'] ?></td>							
								<td><?php echo $list['supervisor_first_name'] ?></td>											
								<td>
									<button class="btn btn-success btn-xs " data_attr="<?php echo $this->encrypt->encode($list['supervisor_id']); ?>" data-toggle="modal" data-target="#" title="edit"><i class="fa fa-check"></i></button>
                                 	<button class="btn btn-danger btn-xs delete_client" mAtt="<?php echo $this->encrypt->encode($list['supervisor_id']); ?>" title="trash"><i class="fa fa-trash-o "></i></button>
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
