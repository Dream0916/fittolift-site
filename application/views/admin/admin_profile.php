<?php include('includes/header.php'); ?>

<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3></h3>
              </div>

<!--
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                  </div>
                </div>
              </div>
-->
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Profile</h2>
<!--
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
-->
                    <div class="clearfix"></div> 
                  </div>
                  <div class="x_content">
                      
                    <?php if($this->session->flashdata('success')){ ?>
                        <div class="alert alert-success" style="font-size: 14px;padding: 10px;">
                            <strong>Success! </strong><?php echo $this->session->flashdata('success')?> 
                        </div>
                    <?php }if($this->session->flashdata('error')){ ?>
                        <div class="alert alert-danger" style="font-size: 13px;padding: 10px; text-shadow: none;">
                          <strong>Error! </strong> <?php echo $this->session->flashdata('error')?>
                        </div>
                    <?php } ?>
                      

<!--                    <form class="form-horizontal form-label-left" novalidate>-->
                    <?php
                        //$attributes = array('class' => 'form-horizontal form-label-left', 'method' => 'post', 'enctype'=>'multipart/form-data');
                        //echo form_open('admin/edit_admin', $attributes);
                      
                      $uri = $this->uri->segment(3);
                    ?>
                      <?php //echo form_open_multipart('admin/edit_admin');?>
                      <form method="post" action="<?php echo base_url();?>admin/edit_admin" class="form-horizontal form-label-left" enctype="multipart/form-data" />
                      
                      <input type="hidden" name="user_id" value="<?php echo $uri;?>">
                      
                      <span class="section"><?php if($this->session->userdata('user_type') == 'admin'){echo 'Admin';}?><?php if($this->session->userdata('user_type') == 'Employer'){echo 'Employer';}?><?php if($this->session->userdata('user_type') == 'Clinic'){echo 'Clinic';}?> Details</span>
                      <input type="hidden" name="id" value="<?php echo $admin[0]['id'];?>">
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" autocomplete="off" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $admin[0]['email'];?>">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" autocomplete="off" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="password" placeholder="Password" type="password">
                        </div>
                          <a style="margin-top: 8px;display: inline-block;cursor: pointer;margin-left: -30px;position: absolute;" id="eye"><i class="fa fa-eye " aria-hidden="true"></i></a>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Confirm Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="cpassword" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="c_password" placeholder="Confirm Password" type="password">
                            <div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
                        </div>
                          <a style="margin-top: 8px;display: inline-block;cursor: pointer;margin-left: -30px;position: absolute;" id="eye1"><i class="fa fa-eye " aria-hidden="true"></i></a>
                          
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Your Type <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="type" placeholder="Type" required="required" type="text" readonly value="<?php echo $admin[0]['type'];?>">
                        </div>
                      </div>
                      <?php if($this->session->userdata('user_type') != 'Employer'){?>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Doctor Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="dr_name" name="dr_name" autocomplete="off" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $admin[0]['dr_name'];?>">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Clinic Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="clinic_name" name="clinic_name" autocomplete="off" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $admin[0]['clinic_name'];?>">
                        </div>
                      </div>
                      <?php }?>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="address" name="address" autocomplete="off" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $admin[0]['address'];?>">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">City <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="city" name="city" autocomplete="off" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $admin[0]['city'];?>">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">State <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="state" name="state" autocomplete="off" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $admin[0]['state'];?>">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Zip Code <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="zip_code" name="zip_code" autocomplete="off" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $admin[0]['zip_code'];?>">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-6 col-xs-12" style="text-align:center;">
                          <img src="<?php echo $admin[0]['image'];?>" width="150" height="150" style="border: 1px solid;border-radius: 75px;">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Update Picture <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type='file' class="form-control col-md-7 col-xs-12" name='userfile' size='20' />
                        </div>
                      </div>
                      
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-5">
<!--                          <button type="submit" class="btn btn-primary">Cancel</button>-->
                          <a href="<?php echo base_url('admin');?>" class="btn btn-primary">Cancel</a>   
<!--                          <button id="send" type="submit" name="submit" class="btn btn-success">Submit</button>   -->
                            <input type="submit" name="submits" value="Submit" class="btn btn-success">
                        </div>
                      </div>
                    <?php echo form_close(); ?>
                      
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<?php include('includes/footer.php'); ?>
<script type="text/javascript">
    window.onload = function(){
 document.getElementById("password").value = "";
}
$(document).ready(function() {   

    document.getElementById("eye").addEventListener("click", function(e){
        var pwd = document.getElementById("password");
        if(pwd.getAttribute("type")=="password"){
            pwd.setAttribute("type","text");
        } else {
            pwd.setAttribute("type","password");
        }
       
});
    
    document.getElementById("eye1").addEventListener("click", function(e){
        var pwd = document.getElementById("cpassword");
        if(pwd.getAttribute("type")=="password"){
            pwd.setAttribute("type","text");
        } else {
            pwd.setAttribute("type","password");
        }
       
});
    
$(function() {
//    $("#password").keyup(function() {
//        $('#cpassword').attr('required', 'required');
//    });
    $("#cpassword").keyup(function() {
        var password = $("#password").val();
        $("#divCheckPasswordMatch").html(password == $(this).val() ? "Passwords match." : "Passwords do not match!");
    });

});
    });
</script>