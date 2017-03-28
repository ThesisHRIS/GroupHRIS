<div id="main-content"> 
	<div class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						<h4>Other Loans/Deductions History</h4>
					</header>
					<table class="table table-striped table-advance table-hover">
						<thead>
							<tr>
								<th>Employee Name</th>
								<th>Deduction Type</th>
								<th>Payment Start</th>
								<th>Payment End</th>
								<th>Total Amount</th>
								<th>Deduction Per Payday</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($getLoans as $list) { ?>
							<tr>
								<td><?php echo $list['last_name'].','.$list['first_name'] ?></td>
								<td><?php echo $list['type'] ?></td>
								<td><?php echo $list['pay_start'] ?></td>
								<td><?php echo $list['pay_end'] ?></td>
								<td><?php echo $list['amount_total'] ?></td>
								<td><?php echo $list['pay_amount'] ?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</section>
			</div>
		</div>
	</div>
</div>
