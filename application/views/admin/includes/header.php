<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fittolift | Admin Panel</title>
<!--      <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">-->
    <!-- Bootstrap -->
      <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="<?php echo base_url("assets/vendors/bootstrap/dist/css/bootstrap.min.css"); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url("assets/vendors/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url("assets/vendors/nprogress/nprogress.css"); ?>" rel="stylesheet">

    
    
    <link href="<?php echo base_url("assets/vendors/nprogress/nprogress.css"); ?>" rel="stylesheet">  
      
    <!-- Datatables -->
<!--    <link href="<?php echo base_url("assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css"); ?>" rel="stylesheet">  -->
      <link href="<?php echo base_url('assets');?>/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets');?>/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets');?>/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets');?>/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets');?>/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="<?php echo base_url("assets/vendors/google-code-prettify/bin/prettify.min.css"); ?>" rel="stylesheet">  
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png"> 
      
      <!-- Custom Theme Style -->
    <link href="<?php echo base_url("assets/build/css/custom.min.css"); ?>" rel="stylesheet">
      
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">

         
            <div class="navbar nav_title" style="border: 0;">
<!--                <img src="<?php echo base_url();?>assets/img/logo.png" alt="PicU" style="width: 140px;">-->
              <a href="<?php echo base_url();?>" class="site_title"><img src="<?php echo base_url().'assets/images/clinic_logo.png';?>"></a>
            </div>

         
            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="<?php echo  $this->session->userdata('image'); //echo base_url('assets/admin-images/img.jpg');?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome <?php if($this->session->userdata('user_type') == 'Clinic'){echo 'Clinic';}?><?php if($this->session->userdata('user_type') == 'Employer'){echo 'Employer';}?>,</span>
                <h2><?php echo  $this->session->userdata('username'); ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            
              <?php include('sidebar.php');?>
              
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
<!--
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
-->
            <!-- /menu footer buttons -->
          </div>
        </div>
          
          
          
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                 
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo $this->session->userdata('image'); //echo base_url('assets/admin-images/img.jpg');?>" alt="">
                      <?php echo  $this->session->userdata('username'); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo base_url('admin/adminProfile');?>"> Profile</a></li>  
<!--
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
-->
                    <li><a href="<?php echo base_url('admin/logout');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

<!--
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
-->
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation --> 
        <style>
            @media (min-width: 992px)
                .modal-lg {
                    width: 600px !important;
                }  
        </style>  