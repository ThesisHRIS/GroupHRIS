<div id="main-content">
	<div class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						<h4>Holiday List</h4>
						<a href="<?php echo base_url().'Holiday'?>"  style="float: right;margin-top:-3%;height: 31px;padding: 6px;" title="Delete" class="btn btn-info btn-xs">
										<i class="fa fa-plus"></i> Add Hoiday
									</a> 
					</header>
					<table class="table table-striped table-advance table-hover">
						<thead>
							<tr>
								<th>Holiday Name</th>
								<th>Date</th>
								<th>Type</th>
								<th>Company</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($list as $list) {
								if($list['company'] === "3"){
									$company =  "All";
								}else{
									$company = $list['company_name'] ;
								}
							?>	
							<tr>	
								<td><?php echo $list['holiday_name'] ?></td>							
								<td><?php echo $list['holiday_date'] ?></td>							
								<td><?php echo $list['holiday_type'] ?></td>							
								<td><?php echo $company ?></td>							
								<td>
									<button class="btn btn-success btn-xs editholidaybutton" data_attr="<?php echo $list['holiday_id']; ?>" data-toggle="modal" data-target="#editHoliday" title="edit">
                              			<i class="fa fa-pencil"></i>
                           			</button>									
                                 	<button class="btn btn-danger btn-xs delete_holiday" data_attr="<?php echo $list['holiday_id']; ?>" title="trash"><i class="fa fa-trash-o "></i></button>
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
