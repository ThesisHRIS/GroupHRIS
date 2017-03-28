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
  
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			
			<h1 id="sidebar-title"><a href="#">Optimind Agorra Logo here</a></h1>
		  
			<!-- Logo (221px wide) -->
			<center/><a href="#"><img src="car/optilogo.png" height="150" width="150" alt="Optimind"/></a>
		  
			<!-- Sidebar Profile links -->
			<div id="profile-links">
				Hello, <a href="#" title="Edit your profile">Front End</a><br/>
				<a href="user1profile.html" title="View the Site">Update Password</a> | <a href="login.html" title="Sign Out">Sign Out</a>
			</div>        
			
			<ul id="main-nav">  <!-- Accordion Menu -->
				
				<li>
					<a href="index.html" class="nav-top-item no-submenu current"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
						Dashboard
					</a>       
				</li>
				
				
				
				<li>
					<a href="#" class="nav-top-item">
						Payroll
					</a>
					<ul>
						<li><a href="print.html">View Payslip</a></li>

					</ul>
				</li>
				
				<li>
					<a href="notification.html" class="nav-top-item">
						Leave & OT
					</a>
					<ul>
						<li><a href="calendar.html">Calendar Overview</a></li>
						<li><a href="requests.html">Leave Request Form</a></li>
						<li><a href="OT.html">OT Request Form</a></li>
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Loans
					</a>
					<ul>
						<li><a href="cashadvancereq.html">CA Request Form</a></li>
					</ul>
				</li>      
				
			</ul> <!-- End #main-nav -->
			
			
			
		</div></div> <!-- End #sidebar -->
		
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Update Password</h3>
					
				
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
						
						
						<form action="" method="post">
						<fieldset>
						<table>
							
							<tr>
								<td colspan="2">Old password <input class="text-input small-input" type="text" id="small-input" name="small-input" /></td>
							</tr>
							<tr>
								<td colspan="2">New password <input class="text-input small-input" type="text" id="small-input" name="small-input" /></td>
							</tr>
							

						</table><br/>
						
									<input class="button" type="submit" value="Submit" />
						</fieldset>
						</form>
					
					    
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			
			
			
			<div class="clear"></div>
			
			
			
			
			
		</div> <!-- End #main-content -->
		
	</div></body>
  
</html>
