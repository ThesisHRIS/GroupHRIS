<!--sidebar start-->
  <aside>
      <div id="sidebar"  class="nav-collapse " tabindex="0" style="overflow: hidden; outline:none;">
          <!-- sidebar menu start-->
          <ul class="sidebar-menu" id="nav-accordion">
              <li>
                  <a class="<?php echo $activeDash; ?>" href="<?php echo base_url(); ?>UserDashboard">
                      <i class="fa fa-dashboard"></i>
                      <span>Dashboard</span>
                  </a>
              </li>
              <li class="sub-menu dcjq-parent-li">
                  <a href="javascript:;" class="<?php echo $proposalsList; ?>">
                      <i class="fa fa-book"></i>
                      <span>Payroll</span>
                  </a>
                  <ul class="sub">
                      <!-- <li class="<?php echo $proposals; ?>"><a  href="<?php echo base_url(); ?>Proposals">Payroll Content</a>
                      </li> -->
                      <li class="<?php echo $proposalsList; ?>"><a  href="<?php echo base_url(); ?>UserPayslip">Payslip Generation</a></li>
                  </ul>
              </li>
              <li class="sub-menu dcjq-parent-li">
                  <a href="javascript:;" class="<?php echo $calendar; ?><?php echo $leaveHistory; ?> <?php echo $leaveHistoryForm; ?>  <?php echo $OtRequestForm; ?> <?php echo $OtRequestFormHIstory; ?> ">
                      <i class="fa fa-cogs"></i>
                      <span>Leave And OT</span>
                  </a>
                  <ul class="sub">
                      <li class="<?php echo $leaveHistory; ?>"><a  href="<?php echo base_url(); ?>LeaveForm">Leave Request</a></li> 
                      <li class="<?php echo $leaveHistoryForm; ?>"><a  href="<?php echo base_url(); ?>LeaveFormHistory">Leave Request History</a></li> 
                      <li class="<?php echo $OtRequestForm; ?>"><a  href="<?php echo base_url(); ?>OtForm">OT Request Form</a></li>
                      <li class="<?php echo $OtRequestFormHIstory; ?>"><a  href="<?php echo base_url(); ?>OtRequestHistory">OT Request History</a></li> 
                      <li class="<?php echo $calendar; ?>"><a  href="<?php echo base_url(); ?>UserCalendarView">Calendar</a></li>
                     
                  </ul>
              </li>
              <li class="sub-menu dcjq-parent-li">
                  <a href="javascript:;" class="<?php echo $cashAdvance; ?><?php echo $cashAdvanceHistory; ?> <?php echo $otherLoans; ?> <?php echo $otherLoansHistory; ?>">
                      <i class="fa fa-tasks"></i>
                      <span>Loans</span>
                  </a>
                  <ul class="sub">
                      <li class="<?php echo $cashAdvance; ?>"><a  href="<?php echo base_url(); ?>UserCARequest">Cash Advance Form</a></li>
                       <li class="<?php echo $cashAdvanceHistory; ?>"><a  href="<?php echo base_url(); ?>UserCAHistory">Cash Advance History</a></li>
                  </ul>
              </li>
               <li class="sub-menu dcjq-parent-li">
                  <a href="javascript:;" class="<?php echo $setting; ?>">
                      <i class="fa fa-cog"></i>
                      <span>Setting</span>
                  </a>
                  <ul class="sub">
                      <li class="<?php echo $setting; ?>"><a  href="<?php echo base_url(); ?>EditUser">My Account Setting</a></li>
                      
                  </ul>
              </li>
              <li class="sub-menu dcjq-parent-li">
                  <a href="javascript:;" class="<?php echo $proposals; ?><?php echo $salaryConfig; ?>">
                      <i class="fa fa-book"></i>
                      <span>Gamification</span>
                  </a>
                  <ul class="sub">
                       <li class="<?php echo $proposals; ?>"><a  href="<?php echo base_url(); ?>Votation">My Activities</a>
                      </li> 
                      <li class="<?php echo $salaryConfig; ?>"><a  href="<?php echo base_url(); ?>UserActivityList">Activity List</a>
                      </li>
                    <!--   <li class="<?php echo $proposalsList; ?>"><a  href="<?php echo base_url(); ?>UserPayslip">Payslip Generation</a></li> -->
                  </ul>
              </li>
          </ul>
      </div>
  </aside>
<!--sidebar end-->