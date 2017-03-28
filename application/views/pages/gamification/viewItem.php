<div id="main-content"> <!-- Main Content Section with everything -->
	<div class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						<h4>Item List</h4>
					</header>
					<table class="table table-striped table-advance table-hover">
						<thead>
							<tr>
								<th>Item Name</th>
								<th>Points to gain</th>
								<th>Image</th>
								<th>Actions</th>
								<th>Status</th>
							</tr>	
						</thead>
						<tbody>
							<?php 
								if(!empty($items)){
								foreach($items as $data){
							?>
							<tr>
								<td><?php echo $data['item'] ?></td>
								<td><?php echo $data['points'] ?></td>
								<td><img  style = "width: 100px;height: 100px;" src="<?php echo 'uploads/'.$data['folder'].'/'.$data['path'] ?>"></td>
								<td>
									<?php if ($data['status']==1){ ?>
									<a href="" class="btn btn-info btn-xs" data_attr="<?php echo $this->encrypt->encode($data['id']); ?>" data-toggle="modal" data-target="#editItem" title="edit" disabled>
										<i class="fa fa-pencil" aria-hidden="true" ></i>
									</a>
			                  		
			                  		<a href="" class="btn btn-danger btn-xs deleteItem" data_attr="<?php echo $this->encrypt->encode($data['id']); ?>" data-toggle="modal" data-target="#approved" title="edit" disabled>
			                  			<i class="fa fa-times" aria-hidden= ></i>
			                  		</a>
			                  		<?php } else {?>
			                  		<a href="" class="btn btn-info btn-xs" data_attr="<?php echo $this->encrypt->encode($data['id']); ?>" data-toggle="modal" data-target="#editItem" title="edit" >
										<i class="fa fa-pencil" aria-hidden="true" ></i>
									</a>
			                  		
			                  		<a href="" class="btn btn-danger btn-xs deleteItem" data_attr="<?php echo $this->encrypt->encode($data['id']); ?>" data-toggle="modal" data-target="#approved" title="edit" >
			                  			<i class="fa fa-times" aria-hidden= ></i>
			                  		</a>
			                  		<?php } ?>
								</td>
								<td>
									<?php if($data['status']==1){ 
										echo 'Deleted';
									
									} else {}
										?>
								</td>
							</tr>
							<?php }}?>
						</tbody>
					</table>
				</section>
			</div>
		</div>
	</div>
</div>