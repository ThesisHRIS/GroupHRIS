<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 
	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
		<title>Front </title>
		
		<!--                       CSS                       -->
	  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
		
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />	
		
		<!-- Colour Schemes
	  
		Default colour scheme is green. Uncomment prefered stylesheet to use it.
		
		<link rel="stylesheet" href="resources/css/blue.css" type="text/css" media="screen" />
		
		<link rel="stylesheet" href="resources/css/red.css" type="text/css" media="screen" />  
	 
		-->
		
		<!-- Internet Explorer Fixes Stylesheet -->
		
		<!--[if lte IE 7]>
			<link rel="stylesheet" href="resources/css/ie.css" type="text/css" media="screen" />
		<![endif]-->
		
		<!--                       Javascripts                       -->
  
		<!-- jQuery -->
		<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
		
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="resources/scripts/facebox.js"></script>
		
		<!-- jQuery WYSIWYG Plugin -->
		<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
		
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="resources/scripts/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
		
	</head>
  
	
		
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			
			
			<!-- Page Head 
			<h2>Welcome</h2>
			<!--<p id="page-intro">What would you like to do?</p>-->
			
			
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Leave Request Form</h3>
					
				
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					<div class="tab-content default-tab" id="tab2">
					
						<?php $attributes = array('class' => '', 'id' => ''); echo form_open_multipart('UserLeaveRequest/saveForm', $attributes); ?>
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								
									<table>
										<tr>
											<td><b>Name</b>
												<input class="text-input medium-input" type="text" id="small-input" name="name" />
											</td>
											<td><b>Date Filed</b>
												<input class="text-input medium-input" type="text" id="small-input" name="date" />
											</td>
										</tr>
										<tr>
											<td><b>Position</b>
												<input class="text-input medium-input" type="text" id="small-input" name="position" />
											</td>
											<td><b>Department</b>
												<input class="text-input medium-input" type="text" id="small-input" name="department" />
											</td>
										</tr>
									</table><br/>
								<p>	
								<b>Type of Leave Requested</b><br/><br/>
								<input type="radio" name="leave" checked value="vlwp"/> Vacation Leave with pay &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="leave" value="sl"/> Sick Leave &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>
								<input type="radio" name="leave" value="loawp"/> Leave of Absence without pay &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="leave" value="ml"/> Maternity Leave &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>
								<input type="radio" name="leave" value="chl"/> Compensatory Holiday/Leave &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="leave" value="others"/> Others &nbsp;&nbsp;<input class="text-input small-input" type="text" id="small-input" name="others" />
								</p>
								<table>
										<tr>
											<td><b>Start Date</b>
												<input class="text-input medium-input" type="text" id="small-input" name="sdate" />
											</td>
											<td><b>End Date</b>
												<input class="text-input medium-input" type="text" id="small-input" name="edate" />
											</td>
										</tr>
										<tr>
											<td><b>Total Day/s Requested</b>
												<input class="text-input medium-input" type="text" id="small-input" name="daysRequested" />
											</td>
										</tr>
								</table><br/>
								<p>
												<b>Reasons</b> <textarea class="text-input textarea wysiwyg" id="textarea" name="reasons" cols="79" rows="15"></textarea>
											
								</p>

								<p>
									<input class="button" type="submit" value="Submit" />
								</p>
							</fieldset>
						</form>
					</div>
				</div> <!-- End #main-content -->
		
	</div></body>
  
</html>
