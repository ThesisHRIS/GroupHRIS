
		
		<div id="main-content"> <!-- Main Content Section with everything -->
			<!-- Page Head 
			<h2>Welcome</h2>
			<!--<p id="page-intro">What would you like to do?</p>-->
			<div class="clear"></div> <!-- End .clear -->
			<div class="content-box"><!-- Start Content Box -->
				<div class="content-box-header">
					<h3 style="cursor: s-resize;">Information Form</h3>
					<div class="clear"></div>	
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					<div class="tab-content default-tab" id="tab2" style="display: block;">
						<form name="201_form" action="" method="post">
						<input type="hidden" value="18" name="emp_id">
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
							<table>
							<?php foreach ($data as $info) {
								
							?>
								<tbody><tr class="alt-row">
									<td colspan="5"><h5>Personal Information</h5></td>
								</tr>
								<tr>
									<td width="10%">Employee Number</td>
									<td width="87%"><?php echo $info['emp_no'] ?></td>
									<td width="3%"></td>
								</tr>								
								<tr class="alt-row">
									<td width="10%">Legal Name</td>
									<td width="87%"><?php echo $info['last_name'].','.$info['first_name'] ?> </td>
									<td width="3%"></td>
								</tr>
								
							</tbody></table>
							<table>
								<tbody><tr>
									<td colspan="5"><h5>Salary Information</h5></td>
								</tr>	
								<tr class="alt-row">
									<td width="10%">New Salary</td>
									<td width="30%"><input type="radio" name="new_sal" value="1" checked="" onclick="document.getElementById('end').disabled = true; document.getElementById('end_month').disabled = true; document.getElementById('end_year').disabled = true; "> Yes <input type="radio" name="new_sal" value="0" onclick="document.getElementById('end').disabled = false; document.getElementById('end_month').disabled = false; document.getElementById('end_year').disabled = false; "> No</td>
									<td width="10%"></td>
									<td width="30%"></td>
									<td width="20%"></td>
								</tr>		
								<tr>
									<td width="10%">Start Date</td>
									<td width="30%"><select name="start">
										<option value="1">1st Half</option>
										<option value="2">2nd Half</option>
									</select>
									<select name="start_month">
																					<option value="01">January</option>
																					<option value="02">February</option>
																					<option value="03">March</option>
																					<option value="04">April</option>
																					<option value="05">May</option>
																					<option value="06">June</option>
																					<option value="07">July</option>
																					<option value="08">August</option>
																					<option value="09">September</option>
																					<option value="10">October</option>
																					<option value="11">November</option>
																					<option value="12">December</option>
																			</select>
									<select name="start_year">
																					<option value="2010">2010</option>
																					<option value="2011">2011</option>
																					<option value="2012">2012</option>
																					<option value="2013">2013</option>
																					<option value="2014">2014</option>
																					<option value="2015">2015</option>
																					<option value="2016">2016</option>
																					<option value="2017">2017</option>
																			</select></td><td width="10%"></td>
									<td width="30%"></td>
									<td width="20%"></td>
								</tr>		
								<!-- <tr class="alt-row">
									<td width="10%">End Date</td>
									<td width="30%"><select name="end" id="end" disabled="">
										<option value="1">1st Half</option>
										<option value="2">2nd Half</option>
									</select>
									<select name="end_month" id="end_month" disabled="">
																					<option value="01">January</option>
																					<option value="02">February</option>
																					<option value="03">March</option>
																					<option value="04">April</option>
																					<option value="05">May</option>
																					<option value="06">June</option>
																					<option value="07">July</option>
																					<option value="08">August</option>
																					<option value="09">September</option>
																					<option value="10">October</option>
																					<option value="11">November</option>
																					<option value="12">December</option>
																			</select>
									<select name="end_year" id="end_year" disabled="">
																					<option value="2010">2010</option>
																					<option value="2011">2011</option>
																					<option value="2012">2012</option>
																					<option value="2013">2013</option>
																					<option value="2014">2014</option>
																					<option value="2015">2015</option>
																					<option value="2016">2016</option>
																					<option value="2017">2017</option>
																			</select></td><td width="10%"></td>
									<td width="30%"></td>
									<td width="20%"></td>
								</tr> -->
								<tr>
									<td width="10%">Daily</td>
									<td width="30%"><input type="radio" name="daily" value="1"> Yes <input type="radio" name="daily" value="0" checked=""> No</td>
									<td width="10%"></td>
									<td width="30%"></td>
									<td width="20%"></td>
								</tr>	
								<tr class="alt-row">
									<td width="10%">Basic</td>
									<td width="30%"><input class="text-input large-input" type="text" id="small-input" name="basic" value="12000"></td>
									<td width="10%">ECOLA</td>
									<td width="30%"><input class="text-input large-input" type="text" id="small-input" name="ecola" value="0"></td>
									<td width="20%"></td>
								</tr>
								<tr>
									<td>Other</td>
									<td><input class="text-input large-input" type="text" id="small-input" name="other" value="3000"></td>
									<td>Flexi-Time</td>
									<td><input type="radio" name="flexi" value="1"> Yes <input type="radio" checked="" name="flexi" value="2"> No</td>
								</tr>	
							</tbody></table>
							
							<table>		
								<tbody><tr class="alt-row">
									<td colspan="4"><h5>Salary History</h5></td>
								</tr>
								<tr>
									<td width="15%">Start</td>
									<td width="15%">End</td>
									<td width="15%">Basic</td>
									<td width="15%">ECOLA</td>
									<td width="15%">Other</td>
									<td width="10%">Flexi-Time</td>
									<td width="10%">Daily</td>
									<td width="5%"></td>
								</tr>
								<!-- 3 -->
								<?php foreach ($salary as $sal) {
									# code...
								} ?>
																<tr class="alt-row">
									<td><?php echo $sal['pay_start']?></td>
									<td><?php echo $sal['pay_end']?></td>
									<td><?php echo $sal['basic']?></td>
									<td><?php echo $sal['ecola']?></td>
									<td><?php echo $sal['other']?></td>
									<td><?php echo $sal['flexi']?></td>
									<td><?php echo $sal['daily']?></td>
									<!-- <td><?php echo $sal['']?></td> -->
								</tr>
								<?php }?>
															</tbody></table>
							
							
							
							
							
							<p>

								<input class="button" name="add_sal" type="submit" value="Submit">
							</p>		
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->   
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			<div class="clear"></div>

		</div> <!-- End #main-content -->
</div>
  

</body></html>