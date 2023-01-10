<!DOCTYPE html>

<html>

<head>

<title>Fittolift</title>

<!-- for-mobile-apps -->

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="keywords" content="Infirmary Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 

Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);

		function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- //for-mobile-apps -->

<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

<link rel="stylesheet" href="assets/css/jquery-ui.css" />

<link href="assets/css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>

<link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all" />

<!-- js -->

<script type="text/javascript" src="assets/js/jquery-2.1.4.min.js"></script>

<script type="text/javascript" src="assets/js/numscroller-1.0.js"></script>



<!-- //js -->





<!-- fonts -->

<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

<link href='//fonts.googleapis.com/css?family=Viga' rel='stylesheet' type='text/css'>



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



<!--start-date-piker-->

	<script src="assets/js/jquery-ui.js"></script>

		<script>

			$(function() {

				$( "#datepicker,#datepicker1" ).datepicker();

			});

		</script>

<!--/End-date-piker-->

	<script src="assets/js/responsiveslides.min.js"></script>

			<!--animate-->

<link href="assets/css/animate.css" rel="stylesheet" type="text/css" media="all">

<script src="assets/js/wow.min.js"></script>

	<script>

		 new WOW().init();

	</script>

<!--//end-animate-->

</head>

<body>

<!-- header -->

<div class="header wow zoomIn">

	<div class="container">

		<div class="header_left" data-wow-duration="2s" data-wow-delay="0.5s">

			<ul>

				<li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>1-605-645-2035</li>

				<li><a href="mailto:info@example.com"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>sales@FitToLift.com</a></li>

			</ul>

		</div>

		<div class="header_right">

			<div class="login">

				<ul>

				<?php
   					if(!$this->session->userdata('logged_in') ==1 ){ 
   				?>

                    <li style="border: 1px solid #7fccea;"><a href="https://www.FitToLiftdoctor.myKajabi.com" target="_blank" class="first"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>Purchase - Fit to Lift Training</a></li>
                    
					<li><a href="#" data-toggle="modal" data-target="#myModal4"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Login</a></li>

					<li><a href="#" data-toggle="modal" data-target="#myModal5"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Signup</a></li>

					<!-- <li>

						<div class="search-bar">

							<div class="search">		

								<a class="play-icon popup-with-zoom-anim" href="#small-dialog"><i class="glyphicon glyphicon-search"> </i> </a>

							</div>

							<script src="assets/js/jquery.magnific-popup.js" type="text/javascript"></script>

								<div id="small-dialog" class="mfp-hide">

									<div class="search-top">

										<div class="login_pop">

											<form action="#" method="post">

												<input type="submit" value="">

												<input type="text" name="Type something..." value="Type something..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">

											</form>

										</div>				

									</div>

									<script>

												$(document).ready(function() {

												$('.popup-with-zoom-anim').magnificPopup({

													type: 'inline',

													fixedContentPos: false,

													fixedBgPos: true,

													overflowY: 'auto',

													closeBtnInside: true,

													preloader: false,

													midClick: true,

													removalDelay: 300,

													mainClass: 'my-mfp-zoom-in'

												});

																												

												});

									</script>				

								</div>

						</div>

					</li> -->

				</ul>

				<?php
   					}else{
				?>

				<ul>
					<li><a href="<?php echo base_url(); ?>logout"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>LOGOUT</a></li>
				</ul>

				<?php
  					}
  				?>

			</div>

			<div class="clearfix"></div>

		</div>

		<div class="clearfix"></div>

	</div>

</div>

<!-- //header -->

<div class="header-bottom ">

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

					<div class="logo grid">

						<div class="grid__item color-3">

							<h1><a class="link link--nukun" href="<?php echo base_url(); ?>"><img src="assets/images/clinic_logo.png"></a></h1>

						</div>

					</div>

				</div>



				<!-- Collect the nav links, forms, and other content for toggling -->

				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">

					<nav class="menu menu--horatio">

						<ul class="nav navbar-nav menu__list">

							<li class="menu__item menu__item--current"><a href="<?php echo base_url(); ?>" class="menu__link">Home</a></li>

							<li class="menu__item"><a href="<?php echo base_url(); ?>about" class="menu__link">About</a></li> 

							<!-- <li class="menu__item"><a href="codes.html" class="menu__link">Short Codes</a></li>  -->

							<!-- <li class="menu__item"><a href="gallery.html" class="menu__link">Gallery</a></li> -->

							<!-- <li class="menu__item"><a href="#" class="menu__link">Clinics</a></li> --> 

							<li class="menu__item"><a href="<?php echo base_url(); ?>contact" class="menu__link">Contact</a></li>

						</ul>

					</nav>

				</div>

			</nav>

		</div>

	</div>
    <style>.first{font-weight: bold;}.first:hover{color: chartreuse;}</style>