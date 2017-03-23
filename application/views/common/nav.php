<!--sidebar start-->
  <aside>
      <div id="sidebar"  class="nav-collapse" tabindex="0" style="overflow: hidden; outline:none;width:15%;">
          <!-- sidebar menu start-->
          <ul class="sidebar-menu" id="nav-accordion">
              <li>
                  <a class="<?php echo $activeDash; ?>" href="<?php echo base_url(); ?>Dashboard">
                      <i class="fa fa-home"></i>
                      <span>Dashboard</span>
                  </a>
              </li>

              <li class="sub-menu">
                  <a href="javascript:;" class="<?php echo $active201; ?> <?php echo $active201View; ?> <?php echo $salaryConfig; ?>">
                      <i class="fa fa-files-o"></i>
                      <span>  201 Files</span>
                  </a>
                  <ul class="sub">
                      <li class="<?php echo $active201; ?>"><a  href="<?php echo base_url(); ?>Add201File"> New 201 Files</a></li>
                      <li class="<?php echo $active201View; ?>"><a  href="<?php echo base_url(); ?>View_201">View 201 Files</a></li>
                  </ul>
              </li>

              <li class="sub-menu">
                  <a href="javascript:;" class="<?php echo $proposals; ?><?php echo $proposalsList;?>">
                      <i class="fa fa-book"></i>
                      <span>Payroll</span>
                  </a>
                  <ul class="sub">
                      <li class="<?php echo $proposals; ?>"><a  href="<?php echo base_url(); ?>AgorraPayroll">Payslip Generation</a></li>
                      <li class="<?php echo $proposalsList; ?>"><a  href="<?php echo base_url(); ?>UploadCsv">Upload Attendance(CSV)</a></li>
                      
                  </ul>
              </li>

              <li class="sub-menu">
                  <a href="javascript:;" class="<?php echo $leaveRequest;?><?php echo $leaveHistory;?><?php echo $leaveIncentives;?><?php echo $leaveSummary ?><?php echo $OtRequest; ?><?php echo $OtHistory; ?>">
                      <i class="fa fa-calendar"></i>
                      <span>Leave And OT</span>
                  </a>
                  <ul class="sub">
                      <li class="<?php echo $leaveRequest; ?>">
                        <a  href="<?php echo base_url(); ?>LeaveRequest">Leave Request</a>
                      </li>
                      <li class="<?php echo $leaveHistory; ?>">
                        <a  href="<?php echo base_url(); ?>LeaveHistory">Leave History</a>
                      </li> 
                      <li class="<?php echo $leaveIncentives; ?>">
                        <a  href="<?php echo base_url(); ?>Incentive">Leave Incentive</a>
                      </li>
                      <li class="<?php echo $leaveSummary; ?>">
                        <a  href="<?php echo base_url();?>LeaveSummary">Leave Summary</a>
                      </li> 
                      <li class="<?php echo $OtRequest; ?>"><a  href="<?php echo base_url(); ?>OtRequest">OT Request</a></li>
                      <li class="<?php echo $OtHistory; ?>"><a  href="<?php echo base_url(); ?>OtHistory">OT History</a></li>
                     
                  </ul>
              </li>
              <li class="sub-menu">
                  <a href="javascript:;" class="<?php echo $viewSuspension; ?><?php echo $suspendEmployee; ?>">
                      <i class="fa fa-tasks"></i>
                      <span>Suspension</span>
                  </a>
                  <ul class="sub">
                      <li class="<?php echo $viewSuspension; ?>"><a  href="<?php echo base_url(); ?>ViewSuspension">View Suspension</a></li>
                     
                      <li class="<?php echo $suspendEmployee; ?>"><a  href="<?php echo base_url(); ?>EmployeeSuspended">Suspend Employee</a></li>
                     
                  </ul>
              </li>
               <li class="sub-menu">
                  <a href="javascript:;" class="<?php echo $cashAdvance; ?><?php echo $cashAdvanceHistory; ?> <?php echo $otherLoans; ?> <?php echo $otherLoansHistory; ?>">
                      <i class="fa fa-bar-chart-o"></i>
                      <span>Loans</span>
                  </a>
                  <ul class="sub">
                      <li class="<?php echo $cashAdvance; ?>"><a  href="<?php echo base_url(); ?>CashAdvance">Cash Advance Request</a></li>
                      <li class="<?php echo $cashAdvanceHistory; ?>"><a  href="<?php echo base_url(); ?>CashAdvanceHistory">Cash Advance History</a></li>
                      <li class="<?php echo $otherLoans; ?>"><a  href="<?php echo base_url(); ?>AddLoan">Add Other Loans</a></li>
                      <li class="<?php echo $otherLoansHistory; ?>"><a  href="<?php echo base_url(); ?>LoanHistory">Other Loans History</a></li>
                     
                  </ul>
              </li>
               <li class="sub-menu">
                  <a href="javascript:;" class="<?php echo $activity; ?><?php echo $activityList; ?> <?php echo $item; ?> <?php echo $itemList; ?>">
                      <i class="fa fa-trophy"></i>
                      <span>Gamification</span>
                  </a>
                  <ul class="sub">
                      <li class="<?php echo $activity; ?>"><a  href="<?php echo base_url(); ?>Activity">Create Activity</a></li>
                      <li class="<?php echo $activityList; ?>"><a  href="<?php echo base_url(); ?>ActivityList">List Of Activity</a></li>
                      <li class="<?php echo $item; ?>"><a  href="<?php echo base_url(); ?>AddItem">Add Item</a></li>
                      <li class="<?php echo $itemList; ?>"><a  href="<?php echo base_url(); ?>ViewItem">List Of Item</a></li>
                      
                  </ul>
              </li>
               <li class="sub-menu">
                  <a href="javascript:;" class="<?php echo $calendar; ?><?php echo $holidayList; ?> <?php echo $supervisor; ?><?php echo $holiday; ?> <?php echo $department; ?>">
                      <i class="fa fa-gears"></i>
                      <span>Configuration</span>
                  </a>
                  <ul class="sub">
                      <li class="<?php echo $holidayList; ?>"><a  href="<?php echo base_url(); ?>HolidayList">Holiday List</a></li>
                      <li class="<?php echo $supervisor; ?>"><a  href="<?php echo base_url(); ?>SupervisorList">Supervisor List</a></li>
                      <li class="<?php echo $department; ?>"><a  href="<?php echo base_url(); ?>Department">Department List</a></li>
                      <li class="<?php echo $calendar; ?>"><a  href="<?php echo base_url(); ?>Reports">Calendar Overview</a></li>
                      
                     
                     
                  </ul>
              </li>
              
          </ul>
      </div>
  </aside>
<!--sidebar end-->