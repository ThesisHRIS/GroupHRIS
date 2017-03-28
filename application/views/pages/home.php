<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Sample</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Clinico Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="assets/js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="assets/js/move-top.js"></script>
<script type="text/javascript" src="assets/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!-- <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<lin --><!-- k href='//fonts.googleapis.com/css?family=Cinzel:400,700,900' rel='stylesheet' type='text/css'> -->
</head>
	
<body>
<!-- header -->
	<div class="header">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
					<div class="logo">
						<a class="navbar-brand" href="index.html"></a>
					</div>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="cl-effect-5" id="cl-effect-5">
						<ul class="nav navbar-nav">
							<li><a href="<?php echo base_url(); ?>" class="active">Home</a></li>
							<li><a href="about.html"><span data-hover="About Us">About Us</span></a></li>
							<li><a href="short-codes.html"><span data-hover="Short Codes">Short Codes</span></a></li>
							<li><a href="mail.html"><span data-hover="Mail Us">Mail Us</span></a></li>
						</ul>
					</nav>
				</div>
				<!-- /.navbar-collapse -->
			</nav>
		</div>
	</div>
<!-- header -->
<!-- banner -->	
	<div class="banner">
		<div class="container">
			<div class="wmuSlider example1">
				<div class="wmuSliderWrapper">
					<article style="position: absolute; width: 100%; opacity: 0;"> 
						<div class="banner-wrap">
							<div class="banner1">
								
							</div>
						</div>
					</article>
					<article style="position: absolute; width: 100%; opacity: 0;"> 
						<div class="banner-wrap">
							<div class="banner2">
								
							</div>
						</div>
					</article>
					<article style="position: absolute; width: 100%; opacity: 0;"> 
						<div class="banner-wrap">
							<div class="banner3">
								
							</div>
						</div>
					</article>
				</div>
			</div>
							<script src="assets/js/jquery.wmuSlider.js"></script> 
							<script>
								$('.example1').wmuSlider();         
							</script> 
		</div>
	</div>
<!-- //banner -->
<!-- banner-bottom -->
	
<!-- //banner-bottom -->
<!-- events -->
	<div class="events">
		<div class="container">
			sds
		</div>
	</div>
<!-- //events -->
<!-- companies -->
	<div class="companies">
		<div class="container">
			<div class="companies-grids">
				ss
					<script type="text/javascript">
						$(window).load(function() {
						$("#flexiselDemo1").flexisel({
							visibleItems: 4,
							animationSpeed: 1000,
							autoPlay: false,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
							responsiveBreakpoints: { 
								portrait: { 
									changePoint:480,
									visibleItems: 1
								}, 
								landscape: { 
									changePoint:640,
									visibleItems: 2
								},
								tablet: { 
									changePoint:768,
									visibleItems: 3
								}
							}
						});
						
					 });
					</script>
					<script type="text/javascript" src="assets/js/jquery.flexisel.js"></script>
			</div>
		</div>
	</div>
<!-- //companies -->
<!-- footer -->
	<div class="footer">
		<div class="container">
			<h3>Sign up for our newsletter</h3>
			<p class="para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vitae eros eget tellus 
				tristique bibendum. Donec rutrum sed sem quis venenatis.</p>
			<div class="footer-contact">
				<form>
					<input type="text" placeholder="Enter your email to update" required=" ">
					<input type="submit" value="">
				</form>
			</div>
			<div class="footer-grids">
				<div class="col-md-3 footer-grid">
					<p>HALOVIETNAM LTD
						66, Dang Van ngu, Dong Da
						Hanoi, Vietnam.
					<a href="mailto:info@example.com">contact@example.com</a>
					<p>Phone : +844 35149182</p>
				</div>
				<div class="col-md-3 footer-grid">
					<ul>
						<li><a href="mail.html">Contact</a></li>
						<li><a href="about.html">About</a></li>
						<li><a href="short-codes.html">Short Codes</a></li>
						<li><a href="index.html">Home</a></li>
					</ul>
				</div>
				<div class="col-md-3 footer-grid">
					<ul>
						<li><a href="privacy.html">Privacy Policy</a></li>
						<li><a href="privacy.html">Terms & Conditions</a></li>
						<li><a href="support.html">Support</a></li>
					</ul>
				</div>
				<div class="col-md-3 footer-grid">
					<div class="footer-grid-left">
						<a href="single.html"><img src="images/4.jpg" alt=" " class="img-responsve" /></a>
					</div>
					<div class="footer-grid-left">
						<a href="single.html"><img src="images/5.jpg" alt=" " class="img-responsve" /></a>
					</div>
					<div class="footer-grid-left">
						<a href="single.html"><img src="images/6.jpg" alt=" " class="img-responsve" /></a>
					</div>
					<div class="footer-grid-left">
						<a href="single.html"><img src="images/7.jpg" alt=" " class="img-responsve" /></a>
					</div>
					<div class="footer-grid-left">
						<a href="single.html"><img src="images/8.jpg" alt=" " class="img-responsve" /></a>
					</div>
					<div class="footer-grid-left">
						<a href="single.html"><img src="images/9.jpg" alt=" " class="img-responsve" /></a>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="footer-copy">
				<p>&copy 2016 Clinico. All rights reserved | Design by W3layouts.</a></p>
				<ul>
					<li><a href="#" class="twitter"><span type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Follow Us On Twitter"></span></a></li>
					<li><a href="#" class="p"><span type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Follow Us On Pinterest"></span></a></li>
					<li><a href="#" class="facebook" id="facebook"><span type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Follow Us On Facebook"></span></a></li>
					<li><a href="#" class="dribble"><span type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Follow Us On Dribbble"></span></a></li>
					<li><a href="#" class="rss"><span type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Follow Us On RSS"></span></a></li>
					<div class="clearfix"> </div>
				</ul>
				<script>
					$(function () {
					  $('[data-toggle="tooltip"]').tooltip()
					})
				</script>
			</div>
		</div>
	</div>
<!-- //footer -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
									$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										*/
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
	</script>
<!-- //here ends scrolling icon -->
<!-- for bootstrap working -->
	<script src="assets/js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>