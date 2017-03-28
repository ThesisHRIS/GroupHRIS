<div id="main-content">
	<div class="wrapper">
		<div class="col-lg-12">
			<form name="201_form" class="form-horizontal" action="" method="post">
				<section class="panel">
					<header class="panel-heading">
						<h4>Personal Information</h4>
					</header>
					<div class="panel-body">
						<div class="form-group">
							<?php foreach ($data as $list) { ?>
							<div class="col-lg-2" >
    							<img style="height:100px;width: 100px;" src="<?php echo "uploads/".$list['folder']."/".$list['profilePath']?>" />
							</div>
						</div>
						<div class="form-group">
							<table class="table table-advance" style="border-top:;">
							
								<tbody>
									<tr>
										<td>Employee No:</td>
										<td><?php echo $list['emp_no']?></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>Company:</td>
										<td><?php echo $list['company_name']?></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>Legal Name</td>
										<td><?php echo $list['last_name'].' , '.$list['first_name'].' '.$list['middle_name']?></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>Date of Birth</td>
										<td><?php echo $list['birth_date']?></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>Marital Status</td>
										<td><?php echo $list['civil_status']?></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>Gender</td>
										<td>
											<?php 
												if($list['gender']==1) {
													echo "Male";
												} else {
													echo "Female";
												}
											?>
										</td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>Place of Birth:</td>
										<td><?php echo $list['birth_place']?></td>
										<td>Nationality:</td>
										<td><?php echo $list['nationality'] ?></td>
										<td>Religion:</td>
										<td><?php echo $list['religion'] ?></td>
									</tr>
									<tr>
										<td>Email Address:</td>
										<td><?php echo $list['email']?></td>
										<td>Mobile number:</td>
										<td><?php echo $list['mobile'] ?></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>Home Address:</td>
										<td><?php echo $list['address']?></td>
										<td>Home number:</td>
										<td><?php echo $list['phone'] ?></td>
										<td></td>
										<td></td>
									</tr>
								</tbody>
								<?php } ?>
							</table>
						</div>
					</div>
				</section>
			</form>
		</div>
	</div>
</div>