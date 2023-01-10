

<?php $this->load->view("includes/header.php"); ?>





<!-- banner -->

<div class="banner page_head">



</div>

<!-- //banner -->

<div class="map_contact">

	<div class="container">

		

		<h3 class="tittle">Contact</h3>

		<div class="contact-grids">

			

			<div class="col-md-6 contact-grid ">

				<form action="<?php echo base_url(); ?>contactus" method="post">

					<input type="text" name="firstname" value="FirstName" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'FirstName';}" required="">

					<br>

					<input type="text" name="lastname" value="LastName" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'LastName';}" required="">

					<input type="email" name="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">

					<input type="text" name="phone_no" value="Phone number" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone number';}" required="">

					<input type="text" name="address" value="Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Address';}" required="">

					<input type="text" name="state" value="State" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'State';}" required="">

					<input type="text" name="zip_code" value="Zip Code" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Zip Code';}" required="">

					<textarea name="note" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Note regarding...';}" required="">Note regarding...</textarea>

					<input type="submit" value="Send" >

				</form>

			</div>

			<div class="col-md-6 contact-left-map ">

				<p>FitToLift is a South Dakota based tech company. Reach out and contact us through this form and include the required fields. We look forward to hearing from you.</p>

				<hr>

				<h3 class="tittle">View On map</h3>

				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d183286.90609928913!2d-103.33396832812785!3d44.12755291475141!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x877d5d6e55fe0bbb%3A0x61b62f868876b998!2sRapid+City%2C+SD+57701!5e0!3m2!1sen!2s!4v1495799119291" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

<!-- 				<ul class="contact-list">

					<li><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>756 global Place, New York.</li>

					<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:example@mail.com">mail@example.com</a></li>

					<li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>+123 2222 222</li>

				</ul> -->

			</div>						

			<div class="clearfix"> </div>

		</div>

	

	</div>

</div>

<!-- //contact -->

<!-- contact -->



<?php $this->load->view("includes/footer.php"); ?>