<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php 
	$config =& get_config();
?> 
<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>404 Page Not Found</title>

		<!-- Vendor CSS -->
		<link href="<?php echo $config['base_url']; ?>/assets/css/animate-css/animate.min.css" rel="stylesheet">
		<link href="<?php echo $config['base_url']; ?>/assets/css/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo $config['base_url']; ?>/assets/fonts/raleway/css/fonts.css">
		<link rel="stylesheet" href="<?php echo $config['base_url']; ?>/assets/fonts/allura/css/fonts.css">
				        
		<!-- Main CSS -->
		<link href="<?php echo $config['base_url']; ?>/assets/css/app.min.1.css" rel="stylesheet">
		<link href="<?php echo $config['base_url']; ?>/assets/css/app.min.2.css" rel="stylesheet">

		<!-- Error CSS-->
		<link rel="stylesheet" type="text/css" href="<?php echo $config['base_url']; ?>/assets/css/errors.css">
	</head>
	<body>
		<div id="error-404-container">
			<h1 class="error-heading">404</h1>
			<div class="error-description"><?php echo $message; ?></div>
			<div class="form-group text-center" style="margin-top:20px;">
				<a href="<?php echo $config['base_url']; ?>" class="btn btn-success btn-lg"><span class="zmdi zmdi-rotate-left zmdi-hc-fw"></span> Take Me Back</a>
			</div>
		</div>

		<!-- Main Javascript Libraries -->
		<script src="<?php echo $config['base_url']; ?>/assets/js/jquery/dist/jquery.min.js"></script>
		<script src="<?php echo $config['base_url']; ?>/assets/js/bootstrap/dist/js/bootstrap.min.js"></script>

		<!-- Other Libraries/Jquery Plugins -->

		<!-- JQUERY NICESCROLL JS -->
		<script src="<?php echo $config['base_url']; ?>/assets/plugins/jquery-nicescroll/jquery.nicescroll.min.js"></script>
		<!-- WAVES JS -->
		<script src="<?php echo $config['base_url']; ?>/assets/plugins/waves/dist/waves.min.js"></script>

		<!-- Specific JS Files -->
		<script src="<?php echo $config['base_url']; ?>/assets/js/functions.js"></script>
	</body>
</html>