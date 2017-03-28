
<section class="wrapper">
    <!-- page start-->
    <!-- <form class="form-signin form-validation" name="form" action="<?php echo base_url();?>login/sign_in" method="post"> -->
    <form class="form-signin form-validation" id="_slg">   
        <div class="alert alert-danger login_alert wrapper text-center" style="display:none;font-weight:bold; margin-top:20px;"></div>
        <h2 class="form-signin-heading">sign in</h2>
        <div class="login-wrap">
            <small id="p_msg" class="text-warning"></small>
            <input type="email" class="form-control" id="uname" placeholder="Email Address" required="">
            <input type="password" class="form-control" id="pass" placeholder="Password" required="">
            <!-- <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
                </span>
            </label> -->
            <input class="btn btn-lg btn-login btn-block login" type="button" value="Login">
        </div>
    
    </form>
    <!-- page end-->
</section>
