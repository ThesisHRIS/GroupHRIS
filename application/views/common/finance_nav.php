<!--sidebar start-->
  <aside>
      <div id="sidebar"  class="nav-collapse ">
          <!-- sidebar menu start-->
          <ul class="sidebar-menu" id="nav-accordion">
              <li>
                  <a class="<?php echo $activeDash; ?>" href="<?php echo base_url(); ?>Finance">
                      <i class="fa fa-dashboard"></i>
                      <span>Dashboard</span>
                  </a>
              </li>

              <li class="sub-menu">
                  <a href="javascript:;" class="<?php echo $activeClients; ?> <?php echo $activeClientsList; ?>">
                      <i class="fa fa-laptop"></i>
                      <span>Billings</span>
                  </a>
                  <ul class="sub">
                      <li class="<?php echo $activeClients; ?>"><a  href="<?php echo base_url(); ?>Bills">New Billing</a></li>
                      <li class="<?php echo $activeClientsList; ?>"><a  href="<?php echo base_url(); ?>List_billing">List Billings</a></li>
                  </ul>
              </li>

              <li class="sub-menu">
                  <a href="javascript:;" class="<?php echo $proposals; ?><?php echo $proposalsList; ?>">
                      <i class="fa fa-book"></i>
                      <span>Collections</span>
                  </a>
                  <ul class="sub">
                      <li class="<?php echo $proposals; ?>"><a  href="<?php echo base_url(); ?>Collection">New Collection</a></li>
                      <li class="<?php echo $proposalsList; ?>"><a  href="<?php echo base_url(); ?>Collection_list">List Collection</a></li>
                      
                  </ul>
              </li>

              <li class="sub-menu">
                  <a href="javascript:;" class="<?php echo $sales; ?><?php echo $salesList; ?><?php echo $commissionable; ?>">
                      <i class="fa fa-cogs"></i>
                      <span>Reports</span>
                  </a>
                  <ul class="sub">
                      <li class="<?php echo $sales; ?>"><a  href="<?php echo base_url(); ?>SalesCommission">Sales Commission</a></li>
                      <li class="<?php echo $salesList; ?>"><a  href="<?php echo base_url(); ?>ARList">List A/R</a></li>
                      <li class="<?php echo $commissionable; ?>"><a  href="<?php echo base_url(); ?>ListofCollectionReports">List of Collection</a></li>
                     
                  </ul>
              </li>
          </ul>
      </div>
  </aside>
<!--sidebar end-->