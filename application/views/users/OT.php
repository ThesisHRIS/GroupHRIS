<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 
	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
		<title>Front End</title>
		
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
					
					<h3>Over Time Request</h3>
					
				
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					<?php echo form_open('UserOT'); ?>
					
							
							<fieldset>
					
					<p>
							Employee Name: <input class="text-input small-input" type="text" id="small-input" name="small-input" />
					</p>
					<p>
							Manager Name: <input class="text-input small-input" type="text" id="small-input" name="small-input" />
					</p>
			<table class="tableizer-table">
							<tbody>
								<tr>
            <td>
                <p align="center">
                    Date
                </p>
            </td>
            <td>
                <p align="center">
                    Task
                </p>
            </td>
            <td>
                <p align="center">
                    Time
                </p>
            </td>
            <td>
                <p align="center">
                    Total in hours
                </p>
            </td>
        </tr>
		<tr>
            <td><p align="center">
			<input class="text-input mediumlarge-input" type="text" id="small-input" name="small-input" />
          </p> </td>
            <td><p align="center">
			<input class="text-input mediumlarge-input" type="text" id="small-input" name="small-input" />
          </p> </td>
            <td><p align="center">
			<input class="text-input mediumlarge-input" type="text" id="small-input" name="small-input" />
          </p> </td>
            <td><p align="center">
			<input class="text-input mediumlarge-input" type="text" id="small-input" name="small-input" />
          </p> </td>
        </tr>
			<tr>
            <td><p align="center">
			<input class="text-input mediumlarge-input" type="text" id="small-input" name="small-input" />
          </p> </td>
            <td><p align="center">
			<input class="text-input mediumlarge-input" type="text" id="small-input" name="small-input" />
          </p> </td>
            <td><p align="center">
			<input class="text-input mediumlarge-input" type="text" id="small-input" name="small-input" />
          </p> </td>
            <td><p align="center">
			<input class="text-input mediumlarge-input" type="text" id="small-input" name="small-input" />
          </p> </td>
        </tr>
		
						</tbody>	
				</table><br/>
					<p>
						Remarks: <textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea>
					</p>
					<p>
						Approved by: <input class="text-input xsmall-input" type="text" id="small-input" name="small-input" />
					</p>
					<p align="center">
									<input class="button" type="submit" value="Submit" />
								</p>	
				</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
					
					    
					
				</div> <!-- End .content-box-content -->
				
			</div> 
		
	</div></body>
  
</html>
