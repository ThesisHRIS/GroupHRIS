	<script type="text/javascript">
		function confirm_action(id, action){
			if(action == 1){
				if(confirm("Are you sure you want to approve this Cash Advance request?")){
					window.location="ca_list.php?approve="+id;
				}
			}else{
				if(confirm("Are you sure you want to reject this Cash Advance request?")){
					window.location="ca_list.php?reject="+id;
				}
			}
		}
	</script>
<div id="main-content"> 
	<div class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						<h4>Cash Advance Requests</h4>
					</header>
					<table class="table table-striped table-advance table-hover">
						<thead>
							<tr>
								<th>Employee Name</th>
								<th>Date Requested</th>
								<th>Amount</th>
								<th>Payment Term</th>
								<th>Payment Start</th>
								<th>Comments</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($data as $data){ if(strtoupper($data['status'])==="PENDING"){?>
							<tr>
								<td><?php echo $data['first_name']." ".$data['last_name'] ?></td>
								<td><?php echo $data['date_filed'] ?></td>
								<td><?php echo $data['amount'] ?></td>
								<td><?php echo $data['payment_terms'] ?></td>
								<td><?php echo $data['payment_start'] ?></td>
								<td><?php echo $data['description'] ?></td>
								<td>
                           <button class="btn btn-success btn-xs approvedCA" data_attr="<?php echo $data['ca_id']; ?>" data-toggle="modal" data-target="#approved" title="edit">
                              <i class="fa fa-check"></i>
                           </button>
                           <button class="btn btn-danger btn-xs ACDecline" data_attr="<?php echo $data['ca_id'] ?>" data-toggle="modal" data-target="#ACDecline" title="edit">
                              <i class="fa fa-times"></i>
                           </button>
                        </td>
							</tr>
							<?php } } ?>
						</tbody>
					</table>
				</section>
			</div>
		</div>
	</div>
</div>
