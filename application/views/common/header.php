<body>
  <section id="container" >
    <header class="header white-bg">
      <div class="sidebar-toggle-box">
          <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <a href="dashboard.php" class="logo">
        <img src="./img/optilogo.png" width="45px" height="45px">
        MY<span>OPTIMInd</span>
      </a>
      <div class="top-nav">
        <ul class="nav pull-right top-menu top-right-info">
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
        
                  <span class="username"><?php echo $sess_email; ?></span>
                  <b class="caret"></b>
                
            </a>
            <ul class="dropdown-menu extended logout">
                <div class="log-arrow-up"></div>
                <li>
                  <a href="<?php echo base_url('userprofile'); ?>" title="title">
                    <i class=" fa fa-suitcase"></i>Profile
                  </a>
                </li>

                <li><a href="<?php echo base_url('Login/logout'); ?>"><i class="fa fa-sign-out"></i> LOGOUT </a></li>
                 <li></li>
                
            </ul>
          </li>
        </ul>
      </div>
    </header>
  </section>