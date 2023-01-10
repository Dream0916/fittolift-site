<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>&nbsp;</h3>
        <ul class="nav side-menu">
            
            <li><a href="<?php echo base_url('admin');?>"><i class="fa fa-home"></i> Dashboard </a></li>
            <li><a href="<?php echo base_url('admin/adminProfile');?>"><i class="fa fa-male"></i> Profile </a></li>
            
<!--            <li><a href="<?php echo base_url('admin/users');?>"><i class="fa fa-user"></i> Users </a></li>-->
            
            <?php if($this->session->userdata('user_type') != 'admin'){?>
            <li><a href="<?php echo base_url('admin/clinic');?>"><i class="fa fa-ambulance"></i> Clinic </a></li>
            <?php }?>
            
            <?php if($this->session->userdata('user_type') == 'admin'){?>
            <li><a href="<?php echo base_url('admin/sendEmail');?>"><i class="fa fa-envelope"></i> Broadcast Message </a></li>
            <li><a href="<?php echo base_url('admin/clinics');?>"><i class="fa fa-ambulance"></i> Clinics </a></li>
            <li><a href="<?php echo base_url('admin/employers');?>"><i class="fa fa-user"></i> Employers </a></li>
            <?php }?>
            
            <li><a href="<?php echo base_url('admin/ftd_data');?>"><i class="fa fa-user"></i> Category-POET/F4D Report </a></li>
           
            <li><a href="<?php echo base_url('admin/poet_data');?>"><i class="fa fa-user-plus" aria-hidden="true"></i> POET / F4D Report </a></li>
            
            <li><a href="<?php echo base_url('admin/injury_data');?>"><i class="fa fa-user-plus" aria-hidden="true"></i> General Injury Report </a></li>
            
            
            
            <li><a><i class="fa fa-file-video-o"></i> FitToLift Training Videos <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    
                    <?php if($this->session->userdata('user_type') == 'admin'){?>
                    <li><a href="<?php echo base_url('admin/allvideos');?>">Training Videos</a></li>
                    <li><a href="<?php echo base_url('admin/addVideo');?>">Add Video</a></li>
                    <?php }?>
                    <?php if($this->session->userdata('user_type') == 'Clinic'){?>
                    <li><a href="<?php echo base_url('admin/allvideos');?>">Video Training</a></li>
                    <li><a href="<?php echo base_url('admin/orientationVideos');?>">My Orientation Videos</a></li>
                    <li><a href="<?php echo base_url('admin/addYourVideo');?>">Add Orientation Video</a></li>
                    <?php }?>
                    <?php if($this->session->userdata('user_type') == 'Employer'){?>
                    <li><a href="<?php echo base_url('admin/employerVideos');?>">Local Clinic Orientation Video</a></li>
                    <li><a href="<?php echo base_url('admin/allvideos');?>">FitToLift Training</a></li>
                    <?php }?>
                </ul>
            </li>
<!--
            <?php if($this->session->userdata('user_type') == 'admin' ){ ?>
            <li><a><i class="fa fa-cubes"></i> Forms <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
-->
                    <!-- <li><a href="<?php echo base_url('admin/packages');?>">View Packages</a></li> -->
<!--
                    <li><a href="<?php echo base_url('admin/clinic');?>">Clinic Platform</a></li>
                    <li><a href="<?php echo base_url('admin/employer');?>">Employer Platform</a></li>
                    <li><a href="<?php echo base_url('admin/WS');?>">WS Platform</a></li>
-->
<!--
                    <li><a href="<?php echo base_url('admin/ftd_form');?>">Category - POET / FfD</a></li>
                    
                </ul>
            </li>
            <?php } ?>
-->
            
            <li><a href="<?php echo base_url('admin/logout');?>"><i class="fa fa-sign-out"></i> Log Out </a></li>
            
        </ul>
    </div>
    
</div>

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