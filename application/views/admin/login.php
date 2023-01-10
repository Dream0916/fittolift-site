<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fittolift | Dashboard Login</title>

    <!-- Animate.css -->
    <link href="<?php echo base_url("assets/vendors/animate.css/animate.min.css"); ?>" rel="stylesheet">
      
    <link href="<?php echo base_url("assets/vendors/bootstrap/dist/css/bootstrap.min.css"); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url("assets/vendors/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url("assets/vendors/nprogress/nprogress.css"); ?>" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url("assets/vendors/iCheck/skins/flat/green.css"); ?>" rel="stylesheet">  

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url("assets/build/css/custom.min.css"); ?>" rel="stylesheet">
      
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png">
      
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="login"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?php
                $attribute = array('method' => 'post');
                //echo form_open( '/admin/admin_login', $attribute);
                echo form_open( '/admin_login', $attribute);
             ?>
              <h1>Login Here</h1>
              
              <?php if($this->session->flashdata('success')){ ?>
                    <div class="alert alert-success" style="font-size: 15px;padding: 10px;font-family: ‘Times New Roman’, Times, serif;">
                        <strong>Success! </strong><?php echo $this->session->flashdata('success')?> 
                    </div>
                <?php }if($this->session->flashdata('error')){ ?>
                    <div class="alert alert-danger" style="font-size: 15px;padding: 10px; text-shadow: none; font-family: ‘Times New Roman’, Times, serif;">
                      <strong>Error! </strong> <?php echo $this->session->flashdata('error')?>
                    </div>
                <?php } ?>
              
              <div>
                <input type="email" id="mail1" class="form-control" placeholder="Email" name="email" required />
              </div>
              <div>
                <input type="password" id="pwd" class="form-control" placeholder="Password" name="password" required />
              </div>
              
              <!-- <div>
                <select name="sign-type" class="form-control" required>
                    <option value="">Select Type</option>
                    <option value="Employer">Employer</option>
                    <option value="Clinic">Clinic</option>
                </select>
              </div> -->
              <br>
              <div>
                <input type="submit" class="btn btn-default submit" id="submit1" name="submit" value="Log in">
                <a class="reset_pass to_register" href="#signup">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
<!--
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>
-->

                <div class="clearfix"></div>
                <br />

                <div>
<!--                  <h1><img src="<?php echo base_url('assets/img/logo.png');?>" height="60"></h1>-->
                    
                  <p>©<?php echo date('Y');?> All Rights Reserved. <a style="color: #2196F3;" href="<?php echo base_url();?>">Fittolift</a></p>
                </div>
              </div>
            <?php echo form_close(); ?>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content" style="padding: 0;">
            <?php
                $attribute = array('method' => 'post');
                echo form_open( 'admin/admin_forgot_pwd', $attribute);
             ?>
              <h1>Forgot Password</h1>
              
              <div>
                    <input type="email" class="form-control" id="mail2" placeholder="Email" name="email" required />
              </div>
              
              <div>
                    <input type="submit" class="btn btn-default submit" name="submit" id="submit2" value="Log in" style="float:none;margin:0;">
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <p class="change_link">Not Now ?
                  <a href="#login" class="to_register"> Log in </a>
                </p>


                <div class="clearfix"></div>
                <br />

                <div>
<!--                  <h1><img src="<?php echo base_url('assets/img/logo.png');?>" height="60"></h1>-->
                  <p>©<?php echo date('Y');?> All Rights Reserved. <a style="color: #2196F3;" href="<?php echo base_url();?>">Fittolift</a></p>
                </div>
              </div>
            <?php echo form_close(); ?>
          </section>
             
        </div>
      </div>
    </div>
  </body>
</html>

<!--<script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>-->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
  
    //$("#forgot_email").removeAttr("required", "required");
    $("#submit1").click(function(){
            $("#mail2").removeAttr("required", "required");
    //$("#div2").show();
    })
    
    $("#submit2").click(function(){
            $("#mail1").removeAttr("required", "required");
            $("#pwd").removeAttr("required", "required");
    //$("#div2").show();
    })

   $(document).ready(function() {
        $(document).on('focus', ':input', function() {
            $(this).attr('autocomplete', 'off');
        });
   });
</script>
