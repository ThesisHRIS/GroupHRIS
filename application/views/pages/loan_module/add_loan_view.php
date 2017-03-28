	<script type="text/javascript">
		function other_check(){
			var pay = document.form1.pay_amount.value;
			var total = document.form1.amount_total.value;
			var type = document.form1.type.value;
			
			if(pay == 0 || pay == "" || total == 0 || total == ""){
				alert("Amount fields must not be empty or 0.");
				return false;
			}
			
			if(type == 3){
				if(document.form1.description.value == ""){
					alert("Description must not be empty.");
					return false;
				}
			}	
			
			return true;
		}
		
		function toggle_desc() {
			var type = document.form1.type.value;
			
			if(type == 3)
				document.getElementById('desc_area').innerHTML = "Description: <br> <input type='text' name='description'> <br> <br>";
			else
				document.getElementById('desc_area').innerHTML = "";
		}
		
		function numbers_only(e, decimal) {
			var key;
			var keychar;

			if (window.event) {
				key = window.event.keyCode;
			}else if (e) {
				key = e.which;
			}else{
				return true;
			}
			
			keychar = String.fromCharCode(key);

			if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==13) || (key==27) ) {
				return true;
			}else if ((("0123456789").indexOf(keychar) > -1)) {
				return true;
			}else if (decimal && (keychar == ".")) { 
				return true;
			}else
				return false;
		}
	</script>
<div id="main-content"> 
	<div class="wrapper">
		<div class="col-lg-12">
			<?php echo form_open('addloan/save', array('name'=>'form1', 'class'=>'form-horizontal')) ?>
				<section class="panel">
					<header class="panel-heading">
						<h4>New Load/Other Deduction Entry</h4>
					</header>
					<div class="panel-body">
						<div class="form-group">
							<div class="col-lg-2 control-label">Date Filed:</div>
                        	<div class="col-lg-2">
                           		<input type="date" class="form-control" name="date_filed"></input>
                        	</div>
						</div>
						<div class="form-group">
							<div class="col-lg-2 control-label">Deduct ID:</div>
							<div class="col-lg-2">
								<input class="form-control" type="text" name="deduct_id">
							</div>
							<div class="col-lg-2 control-label">Deduct Type:</div>
							<div class="col-lg-2">
								<select class="form-control" name="type">
									<option value="SSS">SSS Loan</option>
									<option value="Pag ibig">Pag Ibig Loan</option>
									<option value="Others">Others</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-2 control-label">Salary ID:</div>
							<div class="col-lg-2">
								<select class="form-control" name="salary_id"  style="width:35%;">
									<option></option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
								</select>
							</div>
							<div class="col-lg-2 control-label">Employee:</div>
							<div class="col-lg-3">
								<select class="form-control" name="emp_id">
									<option value="Nico Cambelisa">Nico Cambelisa</option>
									<option value="Kherr Jee Viacrusis">Kherr Jee Viacrusis</option>
									<option value="Angelica Frejoles">Angelica Frejoles</option>
									<option value="Emmanuel Christian Magalona">Emmanuel Christian Magalona</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-2 control-label">Amount to be paid per Payday:</div>
							<div class="col-lg-2">
								<input type="text" class="form-control" name="pay_amount" placeholder="0" onkeypress="return numbers_only(event, true)">
							</div>
							<div class="col-lg-2 control-label">Total Amount</div>
							<div class="col-lg-2">
								<input type="text" class="form-control" name="amount_total" placeholder="0" onkeypress="return numbers_onlye(event,)">
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-2 control-label">Payment Start:</div>
							<div class="col-lg-2">
								<input type="date" class="form-control" name="payment_start">
							</div>
							<div class="col-lg-2 control-label">Payment End:</div>
							<div class="col-lg-2">
								<input type="date" class="form-control" name="payment_end">
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-2 control-label">Is Paid?</div>
							<div class="col-lg-2">
								<select name="paid" class="form-control">
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-2 control-label">Description/Particulars</div>
							<div class="col-lg-6">
								<textarea class="form-control" id="textarea" name="description" cols="79" rows="15"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-3">
								<button href="<?php echo base_url('addloan') ?>" class="btn btn-success" name="cancel" value="Cancel">Cancel</button>
								<button class="btn btn-success" name="submit" value="Submit">Submit</button>
							</div>
							
						</div>
					</div>
				</section>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>