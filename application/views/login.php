<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
      <title>Optimind Agorra Admin | Sign In</title>
      <link rel="stylesheet" href="./assets/css/reset.css" type="text/css" media="screen" />
      <link rel="stylesheet" href="./assets/css/login_style.css" type="text/css" media="screen">
      <link rel="stylesheet" href="./assets/css/invalid.css" type="text/css" media="screen" />
      <script type="text/javascript" src="./assets/js/jquery.js"></script>
      <script type="text/javascript" src="./assets/js/own1.js"></script>
   </head>
   <body id="login" class="blurred-bg" background="./assets/img/background.png">
      <div class="container">
         <div class="info">
            <h1>MY OPTIMIND</h1>
         </div>
      </div>
      <div class="form" >
         <img id="logo" src="./img/optilogo.png" height="150" width="150" alt="Simpla Admin logo" />
         <p class="message" style="display: none"></p>
         <form id="log">
            <!-- <?php $attributes = array('class' => 'login-form', 'id' => ''); echo form_open_multipart('Login/login', $attributes); ?> -->
            <input type="text" placeholder="username"  class ="uname" name="username"/>
            <input type="password" placeholder="password" class ="pass" name="pass"/>
            <button id="signIn" type="button">Sign In</button>
         </form>
      </div>
   </body>
</html>
<script type="text/javascript">
    $('#signIn').click(function() {
        var data_upd = $('#log').serialize();

        $.ajax({
            type: 'GET',
            url: 'login/login',
            data: {
                data_upd: data_upd
            },
            success: function(success) {
                // alert(success);
                if (success === '2') {
                    window.location = 'dashboard';
                } else if (success === '1') {
                    window.location = 'userDashboard';
                } else if (success === '0') {
                    $('.message').css("display", "block");
                    $('.message').css("font-weight", "bold");
                    $('.message').css("text-align", "center");
                    $('.message').css("color", "red");
                    $('.message').text("*Wrong Username or password ");
                    $('.uname').val('');
                    $('.pass').val('');
                }
            }
        });
    });

    $('.uname').keydown(function(e) {
        var data_upd = $('#log').serialize();
        if (e.keyCode == 13) {

            $.ajax({
                type: 'GET',
                url: 'login/login',
                data: {
                    data_upd: data_upd
                },
                success: function(success) {
                    if (success === '2') {
                        window.location = 'dashboard';
                    } else if (success === '1') {
                        window.location = 'userDashboard';
                    } else if (success === '0') {
                        $('.message').css("display", "block");
                        $('.message').css("font-weight", "bold");
                        $('.message').css("text-align", "center");
                        $('.message').css("color", "red");
                        $('.message').text("*Wrong Username or password ");
                        $('.uname').val('');
                        $('.pass').val('');
                    }
                }
            });

        }
    });
     $('.pass').keydown(function(e) {
        var data_upd = $('#log').serialize();
        if (e.keyCode == 13) {

            $.ajax({
                type: 'GET',
                url: 'login/login',
                data: {
                    data_upd: data_upd
                },
                success: function(success) {
                    // alert(success);
                    if (success === '2') {
                        window.location = 'dashboard';
                    } else if (success === '1') {
                        window.location = 'userDashboard';
                    } else if (success === '0') {
                        $('.message').css("display", "block");
                        $('.message').css("font-weight", "bold");
                        $('.message').css("text-align", "center");
                        $('.message').css("color", "red");
                        $('.message').text("*Wrong Username or password ");
                        $('.uname').val('');
                        $('.pass').val('');
                    }
                }
            });

        }
    });
</script>