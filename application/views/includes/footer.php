<div class="contact">

	<div class="container">

		<link href="https://www.fittolift.com/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

		<div class="col-md-6 contact-right wow fadeIn animated animated" data-wow-delay="0.1s" data-wow-duration="2s">

			<h3>Contact Us</h3>

			<div class="strip"></div>

			<ul class="con-icons">

				<li><span class="glyphicon glyphicon-phone" aria-hidden="true"></span>1-605-645-2035</li>

				<li><a href="mailto:info@example.com"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>sales@FitToLift.com</a></li>

			</ul>

			<ul class="fb_icons">

				<li class="hvr-rectangle-out"><a class="fb" href="#"></a></li>

				<li class="hvr-rectangle-out"><a class="twit" href="#"></a></li>

				<li class="hvr-rectangle-out"><a class="goog" href="#"></a></li>

				<li class="hvr-rectangle-out"><a class="pin" href="#"></a></li>

				<li class="hvr-rectangle-out"><a class="drib" href="#"></a></li>
                
                <li style="height: auto;overflow: visible;"><img width="158" src="<?php echo base_url();?>assets/images/ssl.png"></li>
                
                <li style="height: auto;overflow: visible;"><img width="158" src="<?php echo base_url();?>assets/images/sitelock.png"></li>

			</ul>

			<h3>Newsletter Sign up</h3>

			<div class="strip"></div>

			<form action="#" method="post">

				<input type="text" name="Name" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">

				<input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">

				<input type="submit" value="Submit">

			</form>

		</div>

		<div class="col-md-6 contact-left wow fadeIn animated animated" data-wow-delay="0.1s" data-wow-duration="2s">

			<h2>Information</h2>

			<div class="strip"></div>

			<p class="para">We are creating and evolving products with our research and development team everyday. We enjoy helping you solve problems and turning them into opportunities. Let us help you make your workplace safer and healthier right now.</p>

			<p class="copy-right">© <?php echo date('Y');?> Fittolift. All rights reserved | Developed by <a href="http://volxom.com/">Volxom Inc.</a></p>

		</div>

		<div class="clearfix"></div>

	</div>

</div>

<!-- //contact -->

<!-- login -->

			<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" >

				<div class="modal-dialog" role="document">

					<div class="modal-content modal-info">

						<div class="modal-header">

							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						

						</div>

						<div class="modal-body modal-spa">

							<div class="login-grids">

									
                                <div id="login_div">
									<div class="login-right">
                                        
										<h3>Sign in with your account</h3>

										<form action="<?php echo base_url(); ?>login" method="post">

											<div class="sign-in">

												<h4>Email :</h4>

												<input type="email" name="email" value="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required>	

											</div>

											<div class="sign-in">

												<h4>Password :</h4>

												<input type="password" name="password" id="password" value="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required>
                                                <a style="margin-left: -25px;cursor: pointer;" id="eyes1"><i class="fa fa-eye " aria-hidden="true"></i></a>

												

											</div>

											

											<div class="sign-up">

												<h4>Type :</h4>

												<select name="sign-type" required>

													<option value="">Select Type</option>

												  <option value="Employer">Employer</option>

												  <option value="Clinic">Clinic</option>

												</select>

											</div>

											<div class="sign-in">									

												<a style="cursor: pointer;" id="forgot_link">Forgot or Reset Password?</a>
												
											</div>

											<div class="single-bottom">

												<!-- <input type="checkbox"  id="brand" value="">

												<label for="brand"><span></span>Remember Me.</label> -->

											</div>

											<div class="sign-in">

												<input type="submit" value="SIGNIN" >

											</div>

										</form>

									</div>

									

								<p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
                                    
                            </div><!--login div end-->


                            <div id="forgot_div">
									<div class="login-right">
                                        
										<h3>Forgot or Reset Password</h3>

										<form action="<?php echo base_url(); ?>login/forgot_pwd" method="post">

											<div class="sign-in">

												<h4>Email :</h4>

												<input type="email" name="email" value="Email Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required>	

											</div>
                                            
                                            <div class="sign-in">									

												<a style="cursor: pointer;" id="login_link">Go to Login?</a>
												
											</div>

											<div class="single-bottom">

												<!-- <input type="checkbox"  id="brand" value="">

												<label for="brand"><span></span>Remember Me.</label> -->

											</div>

											<div class="sign-in">

												<input type="submit" value="Submit" >

											</div>

										</form>

									</div>
                                    
                            </div><!--forgot div end--!> 
                                

							</div>

						</div>

					</div>

				</div>

			</div>

<!-- //login -->

<!-- login -->

			<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" >

				<div class="modal-dialog" role="document">

					<div class="modal-content modal-info">

						<div class="modal-header">

							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						

						</div>

						<div class="modal-body modal-spa">

							<div class="login-grids">

									<div class="login-bottom">

										<h3>Sign up</h3>

										<form  method="post" action="<?php echo base_url(); ?>register">

										  <div class="sign-up">
												<h4>UserName :</h4>
												<input type="text" name="username" value="username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here username';}" required>
											</div>

											<div class="sign-up">

												<h4>Email :</h4>

												<input type="email" name="email" value="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here email address';}" required>	

											</div>

											<div class="sign-up">

												<h4>Password :</h4>

												<input type="password" name="password"  id="password2" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required>
                                                <a style="margin-left: -25px;cursor: pointer;" id="eyes"><i class="fa fa-eye " aria-hidden="true"></i></a>

											</div>

											<div class="sign-up">
												<h4>Type :</h4>
												<select name="type" id="sign-type" required>
													<option value="">Select Type</option>
												  <option value="Employer">Employer</option>
												  <option value="Clinic">Clinic</option>
												</select>
											</div>

											<div class="sign-up" id="sign_clinic" style="display: none;">
												<h4>Clinic Name</h4>
												<input type="text" name="clinic_name" value="clinic_name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required>	
											</div>
                                            
                                            <div class="sign-up">
												<h4>City :</h4>
												<input type="text" name="city" value="city" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here City';}" required>
											</div>
                                            
                                            <div class="sign-up">
												<h4>State :</h4>
												<input type="text" name="state" value="state" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here State';}" required>
											</div>
                                            
                                            <div class="sign-up">
												<h4>Zip Code :</h4>
												<input type="text" name="zip_code" value="zip code" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here zip code';}" required>
											</div>

											<div class="sign-up">
												<input type="submit" value="REGISTER NOW" >
											</div>

											

										</form>

									</div>

								<p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>

							</div>

						</div>

					</div>

				</div>

			</div>

<!-- //login -->



<script type="text/javascript" src="assets/js/bootstrap-3.1.1.min.js"></script>
<script>
	$('#sign-type').on('change',function(){
    if( $(this).val()==="Clinic"){
    $("#sign_clinic").fadeIn()
    }
    else{
    $("#sign_clinic").fadeOut()
    }
});
    
$('#forgot_div').hide();
$(document).ready(function() {
    $('#forgot_link').click(function() {
        $('#login_div').hide();
        $('#forgot_div').slideToggle("fast");
    });
    
    $('#login_link').click(function() {
        $('#forgot_div').hide();
        $('#login_div').slideToggle("fast");
    });
});    
    
</script>
                                
<script type="text/javascript">
$(document).ready(function() {    
    document.getElementById("eyes").addEventListener("click", function(e){
        var pwd = document.getElementById("password2");
        if(pwd.getAttribute("type")=="password"){
            pwd.setAttribute("type","text");
        } else {
            pwd.setAttribute("type","password");
        }
       
});
    
    document.getElementById("eyes1").addEventListener("click", function(e){
        var pwd = document.getElementById("password");
        if(pwd.getAttribute("type")=="password"){
            pwd.setAttribute("type","text");
        } else {
            pwd.setAttribute("type","password");
        }
       
});
});    
</script>    


</body>

</html>