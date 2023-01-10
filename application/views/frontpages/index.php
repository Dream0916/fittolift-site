<?php $this->load->view("includes/header.php"); ?>

<!-- banner -->

<?php if($this->session->flashdata('success')){ ?>
    <div class="alert alert-success" style="font-size: 14px;padding: 10px;text-align: center; margin: 15px 35px;">
        <strong>Success! </strong><?php echo $this->session->flashdata('success')?> 
    </div>
<?php }if($this->session->flashdata('error')){ ?>
    <div class="alert alert-danger" style="font-size: 13px;padding: 10px; text-shadow: none; text-align: center; margin: 15px 35px;">
      <strong>Error! </strong> <?php echo $this->session->flashdata('error')?>
    </div>
<?php } ?>

<script>$(".alert").show().delay(7000).fadeOut();</script>

<div class="banner">



				<script>

						// You can also use "$(window).load(function() {"

						$(function () {

						 // Slideshow 4

						$("#slider3").responsiveSlides({

							auto: true,

							pager: true,

							nav: false,

							speed: 500,

							namespace: "callbacks",

							before: function () {

						$('.events').append("<li>before event fired.</li>");

						},

						after: function () {

							$('.events').append("<li>after event fired.</li>");

							}

							});

						});

				</script>

		<div  id="top" class="callbacks_container">

			<ul class="rslides" id="slider3">

				<li>

					<div class="banner1">

						<div class="container">

							<div class="banner-info">

								<h3>We help you HIRE safe employees and help <span> employees BACK TO WORK safer and faster. </span> </h3>

								<p>Fit to Lift is changing musculoskeletal healthcare delivery one business at a time. We evaluate, treat, train or triage your employees to prevent pharmaceutical intervention and unnecessary expensive medical testing.</p>

								<a href="#" class="hvr-outline-out button2 scroll">CLICK & JOIN us Today!</a>

							</div>

						</div>

					</div>

				</li> 

				<li>

					<div class="banner2">

						<div class="container">

							<div class="banner-info2 text-center">

								<h3>FitToLift is FORGING <span>EMPLOYER / DOCTOR TEAMS</span></h3>

								<p>Get the hiring and return to work communication tools to know your employees can get back to work safely the same day! </p>

								<!-- <a href="#book" class="hvr-outline-out button2 scroll">Book an appointment</a> -->

							</div>

						</div>

					</div>

				</li>

				<!-- <li>

					<div class="banner1">

						<div class="container">

							<div class="banner-info">

								<h3>Providing<span> Appropriate Health Care </span> For Adult, Seniors and children</h3>

								<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,

								sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. 

								Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, 

								adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et 

								dolore magnam aliquam quaerat voluptatem.</p>

								<a href="#book" class="hvr-outline-out button2 scroll">Book an appointment</a>

							</div>

						</div>

					</div>

				</li>  -->

				<!-- <li>

					<div class="banner2">

						<div class="container">

							<div class="banner-info2 text-center">

								<h3>Providing Eye Care <span>Treatments & Surgeries For All Problems</span></h3>

								<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,

								sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. 

								Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, 

								adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et 

								dolore magnam aliquam quaerat voluptatem.</p>

								<a href="#book" class="hvr-outline-out button2 scroll">Book an appointment</a>

							</div>

						</div>

					</div>

				</li> -->

			</ul>

		</div>

		<div class="clearfix"></div>

</div>

<!-- //banner -->

<!-- content -->

<div class="capacity">

	<div class="container">

		<h3></h3>


			<div class="main_content">
				<h3>Our 2 Types of Customers: </h3>
				<hr style=" border-top: 1px solid #FDA30E;" >
				<p>1)	EMPLOYERS AND EMPLOYEES looking for doctors that understand the workplace and especially want to learn about the unique physiologic load on employees in their workplace. </p> 
				<p>2)	DOCTORS looking for employers that want to make a clear culture of safety and health in the workplace.</p>	

			</div>




		<div class="clearfix"></div>

	</div>

</div>




<div class="content">

	<div class="container">

		<div class="col-md-4 content_right wow flipInY" data-wow-duration="1.5s" data-wow-delay="0.1s">

			<img class="img-responsive" src="assets/images/pic1.jpg" alt=" " />

		</div>

		<div class="col-md-4 content_left wow flipInY" data-wow-duration="1.5s" data-wow-delay="0.2s">

			<div class="welcome">

				<h3>Benefits from Fit to Lift Tools Include</h3>

				<ul>

					<li><a href="#">Improved employee retention</a></li>

					<li><a href="#">Culture shift on safety and health</a></li>

					<li><a href="#">Reduced injury rates</a></li>

					<li><a href="#">Improved Productivity</a></li>

					<li><a href="#">Expedited communication for employee <span style="padding-left: 62px;">safety and fast return to work</span></a></li>

                    <li><a href="#">Improved Care Pathway</a></li>
                    
                    <li><a href="#">Quality healthcare and quality <span style="padding-left: 62px;">providers for your quality employees</span></a></li>

					<li><a href="#">ROI, Year after year savings that your <span style="padding-left: 62px;">company can capture</span></a></li>

				</ul>

			</div>

		</div>

		<div id="book" class="col-md-4 content_middle wow flipInY" data-wow-duration="1.5s" data-wow-delay="0.3s" style="margin-top: 40px;">

			<h3>Book An Appointment</h3>

			<form action="#" method="post">

				<input type="text" name="Name" value="Name" onfocus="this.value='';" onblur="if(this.value=='') {this.value='Name';}" required="">

				<input type="text" name="Email" value="Email" onfocus="this.value='';" onblur="if(this.value=='') {this.value='Email';}" required="">

				<input class="date" name="19/10/2016" id="datepicker" type="text" value="19/10/2016" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '19/10/2016';}" required="">

				<select id="country" onchange="change_country(this.value)" class="frm-field required sect">

					<option value="null">Select Department</option>

					<option value="null">Health Care</option> 

					<option value="null">Body Checkup</option>					

					<option value="null">Out Patient</option>

					<option value="null">Surgery</option>											

				</select>

				<input type="submit" value="Book Now">

			</form>

		</div>

		<div class="clearfix"></div>

	</div>

</div>



<div class="capacity">

	<div class="container">

		<h3></h3>


			<div class="main_content">

				<p>Our platform and tools are developed from interviews, successful clinical results, and collaboration from many types of; employers, human resource professionals, providers, benefit coordinators, and risk managers. Some of these relationships are international mining operations, municipalities, trucking and redi-mix companies, manufacturing, and office call centers. This platform is built with you in mind.</p>

			</div>



		<div class="clearfix"></div>

	</div>

		<hr>

</div>

<!-- //content -->

<!-- services -->

<!-- <div class="services">

	<div class="container">

		<div class="col-md-4 services_left wow bounceInDown" data-wow-duration="1.5s" data-wow-delay="0s">

			<h3>Our Best Services</h3>

			<p class="ser-para" >Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,

				sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>

			<a href="about.html" class="hvr-outline-out button2">See More About Us</a>

				<script>

						// You can also use "$(window).load(function() {"

						$(function () {

						 // Slideshow 4

						$("#slider4").responsiveSlides({

							auto: true,

							pager: true,

							nav: false,

							speed: 500,

							namespace: "callbacks",

							before: function () {

						$('.events').append("<li>before event fired.</li>");

						},

						after: function () {

							$('.events').append("<li>after event fired.</li>");

							}

							});

						});

				</script>

			<div  class="callbacks_container">

				<ul class="rslides" id="slider4">

					<li>

						<div class="ser-bottom">

							<h5>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,

							sed quia consequuntur magni dolores eos qui </h5>

							<p>- Alia Smith</p>

						</div>

					</li>

					<li>

						<div class="ser-bottom">

							<h5>Voluptas sit aspernatur aut odit aut fugit,sed quia consequuntur magni dolores 

							eos qui ratione voluptatem sequi nesciunt</h5>

							<p>- Thompson</p>

						</div>

					</li>

					<li>

						<div class="ser-bottom">

							<h5>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,

							sed quia consequuntur magni dolores eos qui </h5>

							<p>- Federic</p>

						</div>

					</li>

				</ul>

			</div>

			<div class="clearfix"></div>

		</div>

		<div class="col-md-8 services_right ">

			<div class="list-left text-center wow bounceInDown" data-wow-duration="1.5s" data-wow-delay="0.1s">

				<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>

				<h4>Voluptatem</h4>

				<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,

					sed quia consequuntur magni dolores eos qui</p>

			</div>

			<div class="list-left text-center wow bounceInDown" data-wow-duration="1.5s" data-wow-delay="0.2s">

				<span class="glyphicon glyphicon-scissors" aria-hidden="true"></span>

				<h4>Voluptatem</h4>

				<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,

					sed quia consequuntur magni dolores eos qui</p>

			</div>

			<div class="list-left text-center no_marg wow bounceInDown" data-wow-duration="1.5s" data-wow-delay="0.3s">

				<span class="glyphicon glyphicon-apple" aria-hidden="true"></span>

				<h4>Voluptatem</h4>

				<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,

					sed quia consequuntur magni dolores eos qui</p>

			</div>

			<div class="list-left text-center no_marg wow bounceInDown" data-wow-duration="1.5s" data-wow-delay="0.4s">

				<span class="glyphicon glyphicon-education" aria-hidden="true"></span>

				<h4>Voluptatem</h4>

				<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,

					sed quia consequuntur magni dolores eos qui</p>

			</div>

			<div class="clearfix"></div>

		</div>

		<div class="clearfix"></div>

	</div>

</div> -->

<!-- //services -->

<!-- team -->

<!-- <div class="ind-team">

	<div class="container">

		<h3>Meet Our Team</h3>

		<div class="col-md-4 ind-gds text-center wow zoomIn" data-wow-duration="1.5s" data-wow-delay="0.1s">

			<div class="team-img">

				<img class="img-responsive" src="assets/images/pic4.jpg" alt=" "/>

				<div class="team-info">

					<ul>

						<li class="hvr-rectangle-out"><a class="eco1" href="#"></a></li>

						<li class="hvr-rectangle-out"><a class="eco2" href="#"></a></li>

						<li class="hvr-rectangle-out"><a class="eco3" href="#"></a></li>

						<li class="hvr-rectangle-out"><a class="eco4" href="#"></a></li>

						<li class="hvr-rectangle-out"><a class="eco5" href="#"></a></li>

					</ul>

				</div>

			</div>

			<h4>Dr. Federica</h4>

			<p>Dental Surgeon</p>

		</div>

		<div class="col-md-4 ind-gds text-center wow zoomIn" data-wow-duration="1.5s" data-wow-delay="0.1s">

			<div class="team-img">

				<img class="img-responsive" src="assets/images/pic5.jpg" alt=" "/>

				<div class="team-info">

					<ul>

						<li class="hvr-rectangle-out"><a class="eco1" href="#"></a></li>

						<li class="hvr-rectangle-out"><a class="eco2" href="#"></a></li>

						<li class="hvr-rectangle-out"><a class="eco3" href="#"></a></li>

						<li class="hvr-rectangle-out"><a class="eco4" href="#"></a></li>

						<li class="hvr-rectangle-out"><a class="eco5" href="#"></a></li>

					</ul>

				</div>

			</div>

			<h4>Dr. Thompson</h4>

			<p>Cardiology</p>

			

		</div>

		<div class="col-md-4 ind-gds text-center wow zoomIn" data-wow-duration="1.5s" data-wow-delay="0.1s">

			<div class="team-img">

				<img class="img-responsive" src="assets/images/pic6.jpg" alt=" "/>

				<div class="team-info">

					<ul>

						<li class="hvr-rectangle-out"><a class="eco1" href="#"></a></li>

						<li class="hvr-rectangle-out"><a class="eco2" href="#"></a></li>

						<li class="hvr-rectangle-out"><a class="eco3" href="#"></a></li>

						<li class="hvr-rectangle-out"><a class="eco4" href="#"></a></li>

						<li class="hvr-rectangle-out"><a class="eco5" href="#"></a></li>

					</ul>

				</div>

			</div>

			<h4>Dr. Victoria</h4>

			<p>Neurology</p>

		</div>

		

		<div class="clearfix"></div>

	</div>

</div> -->

<!-- team -->

<!-- capabilities -->
<div class="capacity">

	<div class="container">

		<h3>How</h3>

		<div class="main_content">

		<p>EMPLOYERS SIGNUP and bring a doctor or clinic that you want to work with.<br>DOCTORS SIGNUP and bring an employer that you want to work with. </p>
        <p>FitToLift is your clear choice for a communication system to follow STEP by STEP. The software allows you to scale the system across your workplace and train by video, webinar, one-on-one, or conference, YOU will learn the process to become a great team and serve employees.</p>    

		</div>
		<div class="clearfix"></div>

	</div>

</div>


<div class="capacity">

	<div class="container">

		<h3>Why</h3>

		<div class="main_content">

		<p>This platform and tools are developed solving real world problems of hiring and injury management through interviews, successful clinical results, and collaboration from many types of employers, human resource professionals, providers, benefit coordinators, and risk managers. Some of these employer relationships are international mining operations, municipalities, trucking and redi-mix companies, manufacturing, and office call centers</p>
		<br>

		<h4 style="text-align: center;">This platform is built with you the EMPLOYER and THE EMPLOYEE in mind.</h4>

		</div>
		<div class="clearfix"></div>

	</div>

</div>








<div class="capacity">

	<div class="container">

		<h3>The Success</h3>

		<div class="col-md-3 capabil_grid1 wow fadeInDownBig animated animated text-center" data-wow-delay="0.4s">

			<div class="capil_text">

				<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='5700' data-delay='.5' data-increment="100">5700</div>

				<p>Happy Employees</p>	

			</div>

		</div>

		<div class="col-md-3 capabil_grid2 wow fadeInUpBig animated animated text-center" data-wow-delay="0.4s">

			<div class="capil_text">

				<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='1700' data-delay='.5' data-increment="5">1700</div>

				<p>Progressive Employers</p>	

			</div>

		</div>

		<div class="col-md-3 capabil_grid3 wow fadeInDownBig animated animated text-center" data-wow-delay="0.4s">

			<div class="capil_text">

				<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='0021' data-delay='.5' data-increment="100">0021</div>				

				<p>Signed Up This Month</p>

			</div>

		</div>

		<div class="col-md-3 capabil_grid4 wow fadeInUpBig animated animated text-center" data-wow-delay="0.4s">

			<div class="capil_text">

				<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='2500' data-delay='.5' data-increment="1">2500</div>

				<p>Dedicated Doctors</p>

			</div>

		</div>

		<div class="clearfix"></div>

	</div>

</div>

<!-- //capabilities -->

<!-- contact -->



<?php $this->load->view("includes/footer.php"); ?>

