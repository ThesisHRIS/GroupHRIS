<div id="main-content">
	<div class="wrapper">
		<section class="panel">
			<header class="panel-heading"><h4>Leave Summary</h4></header>
			<table class="table table-striped table-advance">
				<thead>
					<tr>
						<th>Employee Name</th>
						<th>Vacation Leaves Used</th>
						<th>Sick Leaves Used</th>
						<th>Vacation Leave Balance</th>
						<th>Sick Leave Balance</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($leavesummary as $data) { ?>
					<tr>
						<td> <?php echo $data['first_name']." ".$data['last_name']?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</section>
	</div>
</div>
		