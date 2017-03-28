<div id="main-content">
	<div class="wrapper">
		<form name="form1" action="<?php echo site_url("");?>" method="post" class="form-horizontal">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						<h4>Leave Incentive Form</h4>
					</header>
					<div class="panel-body">
						<fieldset>
							<div class="form-group">
								<div class="col-lg-6">
									<div class="col-lg-2 control-label">Name:</div>
                        		<div class="col-md-6">
                           		<select name="emp_id" class="form-control" style="width: 108%;">
                              	<option value="18">12001 - Irish Mahra Sumagang </option>
											<option value="15">12002 - Rhen Rose Dumaran</option>
											<option value="2">12003 - Eldriech Abordonado</option>
											<option value="16">12005 - Meryan Flores</option>
											<option value="20">12007 - Janelle Palang </option>
											<option value="19">12008 - Adrian Tabay</option>
											<option value="13">12012 - Ralph Arco</option>
											<option value="14">12013 - Catherine Calipay</option>
											<option value="3">12014 - Debbie Acebu</option>
											<option value="17">12015 - J. Martino Olvido</option>
											<option value="32">12018 - Kevin Sean Kho</option>
											<option value="33">12019 - Jennifer Gabieta</option>
											<option value="34">12020 - Raimarie Losaria</option>
											<option value="45">12021 - Johanna Abegail Vargas</option>
											<option value="36">20001 - Wendy Ang</option>
											<option value="12">20002 - Tiffany Ang</option>
											<option value="11">20003 - Maribel Nuto</option>
											<option value="10">20006 - Jeric Cantil </option>
											<option value="1">20007 - John Patrick Ang</option>
											<option value="4">20008 - Ronalyn Escalera</option>
											<option value="5">20009 - Maria Kristina Bascon</option>
											<option value="21">20010 - Juan Marco Taaca</option>
											<option value="24">20011 - Michael Dollosa</option>
											<option value="23">20012 - Ruth Ann Kristine Rivera </option>
											<option value="25">20013 - Shaina Morabe</option>
											<option value="9">20014 - Eden Lomio</option>
											<option value="22">20015 - Neil Gersava</option>
											<option value="26">20016 - Bianca Santos</option>
											<option value="8">20017 - Jennevie Corre</option>
											<option value="7">20018 - Tristan Jasper Escoto</option>
											<option value="6">20019 - Keana Chelsea Arieta</option>
											<option value="28">20022 - Henry Mandani</option>
											<option value="27">20024 - Chrisler Medua</option>
											<option value="29">20025 - Jessiry Cubillas</option>
											<option value="31">20026 - Mary Ni�a Cardines</option>
											<option value="37">20027 - Mariano Jr. Nimo</option>
											<option value="30">20028 - Mariano  Nimo</option>
											<option value="38">20028 - Elaine Joy Tirado</option>
											<option value="39">20029 - Ernest John Del Rosario</option>
											<option value="42">20030 - Al John Albuera</option>
											<option value="40">20031 - Dennis Mumar</option>
											<option value="41">20032 - Erika Yambao</option>
											<option value="43">20033 - Dominic Vargas</option>
											<option value="44">20034 - Christian Ross Naluan</option>
											<option value="35">200030 - Ronalyn Escalera 2</option>
                           	   </select>
                        	   </div>
								</div>
								<div class="col-lg-6">
									<label class="col-lg-3 control-label">Date Filed:</label>
									<div class="control-label">November 25, 2016</div>
								</div>
                     		</div>
                     		<div class="form-group">
                     			<div class="col-lg-3 control-label"><strong>Type of Leave Request</strong></div>
                     		</div>
                     		<div class="form-group">
                     			<div class="col-lg-3 control-label">One Month Leave Incentive</div>
                     		</div>
                     		<div class="form-group">
                     			<div class="col-lg-6">
									<div class="col-lg-3 control-label">Start Date:</div>
                        			<div class="col-lg-3">
                           				<select class="form-control" name="month">
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
                        			</div>
                        			<div class="col-lg-2">
                        				<select class="form-control" name="day" style="margin-left: -50%">
                           					<?php for($i=1;$i<32;$i++){ ?>
                           						<option value="$i"><?php echo $i ?></option>
                           					<?php } ?>
                           				</select>
                        			</div>
                        			<div class="col-lg-3">
                        				<select name="year" class="form-control" style="margin-left: -57%">
												<option value="2016">2016</option>
										</select>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="col-lg-3 control-label">End Date:</div>
                        			<div class="col-lg-3">
                           				<select class="form-control" name="month2">
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
                        			</div>
                        			<div class="col-lg-2">
                        				<select class="form-control" name="day2" style="margin-left: -50%">
                           					<?php for($i=1;$i<32;$i++){ ?>
                           						<option value="$i"><?php echo $i ?></option>
                           					<?php } ?>
                           				</select>
                        			</div>
                        			<div class="col-lg-3">
                        				<select name="year2" class="form-control" style="margin-left: -57%">
												<option value="2016">2016</option>
										</select>
									</div>
								</div>
                     		</div>
                     		<div class="form-group">
                     			<div class="col-lg-6">
                     				<div class="col-lg-3 control-label">Total Days:</div>
                     				<div class="col-lg-4">
                     					<input type="text" class="form-control" name="days"></input>
                     				</div>
                     			</div>
                     		</div>
                     		<div class="form-group">
                     			<div class="col-lg-6">
                     				<div class="col-lg-3 control-label">Comments:</div>
                     				<div class="col-lg-4">
                     					<textarea class="form-control" rows="15" cols="79"></textarea>
                     				</div>
                     			</div>
                     		</div>
                     		<button class="pull-left btn btn-success" type="button">Submit</button>
						</fieldset>
					</div>
				</section>
			</div>			
		</form>
	</div>
</div>