<body>
		<div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
			<div id="sidebar">
				<div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
					<h1 id="sidebar-title"><a href="#">Optimind Agorra Logo here</a></h1>
		  
					<!-- Logo (221px wide) -->
					<center>
						<a href="#"><img src="car/optilogo.png" height="150" width="150" alt="Optimind"></a>
					</center>
					<!-- Sidebar Profile links -->
					<div id="profile-links">
						Hello, <a href="<?php echo base_url()?>ProfileAdmin" title="Edit your profile">Admin</a><br>
						<a href="#" title="View the Site">Update Password</a> | <a href="login.php?out=1" title="?out=1">Sign Out</a>
					</div>        
			
					<ul id="main-nav">  <!-- Accordion Menu -->
						<li>
							<a href="<?php echo base_url()?>Dashboard" class="nav-top-item no-submenu" style="padding-right: 15px;"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
								Dashboard
							</a>       
						</li>
					
												<li> 
							<a href="#" class="nav-top-item" style="padding-right: 15px;"> <!-- Add the class "current" to current menu item -->
								201 Files
							</a>
							<ul style="display: none;">
								<li><a href="<?php echo base_url()?>Add201File">New 201 File</a></li>
								<li><a href="<?php echo base_url()?>View_201">View 201 Files</a></li>
								<li><a href="<?php echo base_url()?>AddConsultant">New Consultant</a></li>
								<li><a href="<?php echo base_url()?>ConsultantView">View Consultants</a></li>
								<li><a href="<?php echo base_url()?>EmployeeSalary">Employee Salary Configuration</a></li>
								<li><a href="<?php echo base_url()?>ConsultantSalary">Consultant Salary Configuration</a></li> <!-- Add class "current" to sub menu items also -->
							</ul>
						</li>
												
						
												<li>
							<a href="#" class="nav-top-item" style="padding-right: 15px;">
								Payroll
							</a>
							<ul style="display: none;">
								<li><a href="upload_optimind_attendance.php">Upload Attendance (Optimind)</a></li>
								<li><a href="upload_agorra_attendance.php">Upload Attendance (Agorra)</a></li>
								<li><a href="generatepayroll.php">Generate Payroll</a></li>
								<li><a href="view_payslip.php">View/Print Payslips</a></li>
							</ul>
						</li>
												
						
												<li>
							<a href="#" class="nav-top-item" style="padding-right: 15px;">
								Leave &amp; OT
							</a>
							<ul style="display: none;">
								<li><a href="<?php echo base_url()?>LeaveForm">Leave Form</a></li>
								<li><a href="<?php echo base_url()?>LeaveRequest">Leave Requests</a></li>
								<li><a href="<?php echo base_url()?>LeaveHistory">Leave History</a></li>
								<li><a href="<?php echo base_url()?>Incentive">Leave Incentive</a></li>
								<li><a href="<?php echo base_url()?>LeaveSummary">Leave Summary</a></li>
								<li><a href="<?php echo base_url()?>OtForm">OT Form</a></li>
								<li><a href="<?php echo base_url()?>OtRequest">OT Requests</a></li>
								<li><a href="<?php echo base_url()?>OtHistory">OT History</a></li>
								<!--<li><a href="upload_leave.php">Upload Leave Records</a></li>-->
							</ul>
						</li>
						
						<li>
							<a href="#" class="nav-top-item">
								Suspension
							</a>
							<ul style="display: none;">
								<li><a href="<?php echo base_url()?>ViewSuspension">View Suspension</a></li>
								<li><a href="<?php echo base_url()?>EmployeeSuspended">Suspend Employee</a></li>
								<!--<li><a href="upload_leave.php">Upload Leave Records</a></li>-->
							</ul>
						</li>
												
						
												<li>
							<a href="#" class="nav-top-item">
								Loans
							</a>
							<ul style="display: none;">
								<li><a href="<?php echo base_url()?>CashAdvance">Cash Advance Requests</a></li>
								<li><a href="<?php echo base_url()?>CashAdvanceHistory">Cash Advance History</a></li>
								<li><a href="<?php echo base_url()?>AddLoan">Add Other Loans</a></li>
								<li><a href="<?php echo base_url()?>LoanHistory">Other Loans History</a></li>
								<!--<li><a href="upload_cash_advance.php">Upload Cash Advance Records</a></li>
								<li><a href="upload_other.php">Upload Other Loan Records</a></li>-->
							</ul>
						</li>
												
												
												<li>
							<a href="#" class="nav-top-item">
								Configuration
							</a>
							<ul style="display: none;">
								<li><a href="<?php echo base_url()?>Calendar">Calendar Overview</a></li>
								<li><a href="<?php echo base_url()?>Holiday">Add Holiday</a></li>
								<li><a href="<?php echo base_url()?>HolidayList">Holiday List</a></li>
							</ul>
						</li> 
												
					</ul> <!-- End #main-nav -->
				</div>
			</div> <!-- End #sidebar -->