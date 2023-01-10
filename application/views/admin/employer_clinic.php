<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
<!--                <h3>Reservations</h3>-->
                  
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
                  
                <?php if($this->session->flashdata('success')){ ?>
                <div class="alert alert-success" style="font-size: 14px;padding: 10px;">
                    <strong>Success! </strong><?php echo $this->session->flashdata('success')?> 
                </div>
                <?php }if($this->session->flashdata('error')){ ?>
                    <div class="alert alert-danger" style="font-size: 13px;padding: 10px; text-shadow: none;">
                      <strong>Error! </strong> <?php echo $this->session->flashdata('error')?>
                    </div>
                <?php } ?>
                  
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Clinic <small>Assigned Employers</small></h2>
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
                     
                      
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                            <th>ID</th>    
                            <th>Username</th>
                            <th>Image</th>        
                            <th>Email</th>
<!--                            <th>Type</th>-->
                            <th>Clinic Name</th>
                            <th>Employer</th>
                            <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                          
                        <?php 
                          
                            if(!empty($emp_clinic)){
                            foreach($emp_clinic as $res){    
                            $clinic_data = $this->Admin_model->get_assigned_clinic_data($res['clinic_id']);
                                
                           // echo  '<pre>';print_r($clinic_data);    
                        ?>   
                        
                        <div class="modal fade bs-example-modal-emp-lg-<?php echo $clinic_data[0]['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">

                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                  </button>
                                    <h4 class="modal-title" id="myModalLabel">From : employers@fittolift.com</h4>
                                    <h4 class="modal-title" id="myModalLabel">To : <?php if($this->session->userdata('user_type') == 'Employer' ){  echo $clinic_data[0]['email'];} if($this->session->userdata('user_type') == 'Clinic' ){  echo $res['email'];} ?></h4>
                                </div>
                                  
                                <?php
                                    $attributes = array('class' => 'form-horizontal', 'method' => 'post');
                                    echo form_open('admin/email_to_user', $attributes);
                                ?>  
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="<?php echo $clinic_data[0]['id'];?>">
                                    <input type="hidden" name="to_email" value="<?php echo $clinic_data[0]['email'];?>">
                                    <input type="hidden" name="name" value="<?php echo $clinic_data[0]['username'];?>">
                                    <input type="hidden" name="from_email" value="employers@fittolift.com">

                                    <textarea name="text"></textarea>
                                    
                                </div>
                                
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" name="submits" class="btn btn-primary">Send Email</button>
                                </div>
                                <?php echo form_close(); ?>  

                              </div>
                            </div>
                          </div>
                          
                          <div class="modal fade bs-example-modal-lg-<?php echo $res['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">

                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                  </button>
                                    <h4 class="modal-title" id="myModalLabel">From : clinics@fittolift.com</h4>
                                    <h4 class="modal-title" id="myModalLabel">To : <?php if($this->session->userdata('user_type') == 'Employer' ){  echo $clinic_data[0]['email'];} if($this->session->userdata('user_type') == 'Clinic' ){  echo $res['email'];} ?></h4>
                                </div>
                                  
                                <?php
                                    $attributes = array('class' => 'form-horizontal', 'method' => 'post');
                                    echo form_open('admin/email_to_user', $attributes);
                                ?>  
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="<?php echo $res['id'];?>">
                                    <input type="hidden" name="to_email" value="<?php echo $res['email'];?>">
                                    <input type="hidden" name="name" value="<?php echo $res['username'];?>">
                                    <input type="hidden" name="from_email" value="clinics@fittolift.com">

                                    <textarea name="text"></textarea>
                                    
                                </div>
                                
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" name="submits" class="btn btn-primary">Send Email</button>
                                </div>
                                <?php echo form_close(); ?>  

                              </div>
                            </div>
                          </div>
                          
                          
                          <div class="modal fade employer-example-modal-lg-<?php echo $res['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">

                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                  </button>
                                    <h4 class="modal-title" id="myModalLabel">Employer Details</h4>
                                </div>
                                  
                               
                                <div class="modal-body" style="text-align:center;">
                                    <div> <span class="span_lable">Employer ID:</span> <span class="span_lable_2"><?php echo $res['id'];?> </span> </div>
                                    <div> <span class="span_lable">Username:</span> <span class="span_lable_2"><?php echo $res['username'];?> </span> </div>
                                    <div> <span class="span_lable">Email:</span> <span class="span_lable_2"><?php echo $res['email'];?> </span> </div>
                                    <div> <span class="span_lable">Picture:</span> <span class="span_lable_2"><img alt="No Image" src="<?php echo $res['image'];?>" width="60" height="60" style="text-align: center;"></span> </div>
                                    
                                </div>
                                
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                      

                              </div>
                            </div>
                          </div>
                          
                          <div class="modal fade clinic-example-modal-lg-<?php echo $clinic_data[0]['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">

                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                  </button>
                                    <h4 class="modal-title" id="myModalLabel">Clinic Details</h4>
                                </div>
                                  
                               
                                <div class="modal-body" style="text-align:center;">
                                    <div> <span class="span_lable">Clinic ID:</span> <span class="span_lable_2"><?php echo $clinic_data[0]['id'];?> </span> </div>
                                    <div> <span class="span_lable">Username:</span> <span class="span_lable_2"><?php echo $clinic_data[0]['username'];?> </span> </div>
                                    <div> <span class="span_lable">Email:</span> <span class="span_lable_2"><?php echo $clinic_data[0]['email'];?> </span> </div>
                                    <div> <span class="span_lable">Picture:</span> <span class="span_lable_2"><img alt="No Image" src="<?php echo $clinic_data[0]['image'];?>" width="60" height="60" style="text-align: center;"></span> </div>
                                    
                                </div>
                                
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                      

                              </div>
                            </div>
                          </div>
                          
                          
                        <tr>
                            <td><?php echo $clinic_data[0]['id'];?></td>
                            <td><?php echo $clinic_data[0]['username'];?></td>
                            <td><img alt="No Image" src="<?php echo $clinic_data[0]['image'];?>" width="60" style="text-align: center;"></td>
                            <td><?php echo $clinic_data[0]['email'];?></td>
<!--                            <td><?php echo $clinic_data[0]['type'];?></td>-->
                            <td><?php echo $clinic_data[0]['clinic_name'];?></td>
                            <td><?php echo $res['username'];?></td>
                      
                            <td>
                                
                                <?php if($this->session->userdata('user_type') == 'Clinic' ){ ?>
                                <div class="btn-group" style="margin: -6px 5px 0px 0px;">
                                  <button style="padding: 0px 6px" type="button" class="btn btn-danger">Choose Form</button>
                                  <button style="padding: 0px 6px" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                  </button>
                                  <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo base_url('admin/general_poet/'.$res['id']);?>">General POET / FfD</a></li>
                                    <li><a href="<?php echo base_url('admin/general_employer/'.$res['id']);?>">General Injury Form</a></li>
                                    <li><a href="<?php echo base_url('admin/ftd_form/'.$res['id']);?>">Category - POET / FfD</a></li>  
                                  </ul>
                                </div>
                                
                                <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".employer-example-modal-lg-<?php echo $res['id'];?>"><i class="fa fa-compress"></i> View Employer </a>
                                
                                <?php } ?>
                                
                                <?php if($this->session->userdata('user_type') == 'Employer' ){ ?>
                                <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".clinic-example-modal-lg-<?php echo $clinic_data[0]['id'];?>"><i class="fa fa-compress"></i> View Clinic </a>
                                
                                <a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target=".bs-example-modal-emp-lg-<?php echo $clinic_data[0]['id'];?>"><i class="fa fa-envelope"></i> Send Email </a>
                                <?php } ?>
                               
                                <?php if($this->session->userdata('user_type') == 'Clinic' ){ ?>
                                <a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg-<?php echo $res['id'];?>"><i class="fa fa-envelope"></i> Send Email </a>
                                <?php } ?>
                                
                                
                            </td>

                        </tr>
                          
                        <?php }}else{echo '<tr><td colspan="7">No any employer assigned to this clinic by admin.</td></tr>';} ?>
           
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              </div>
          </div>
        </div>
        <!-- /page content -->

    <?php include('includes/footer.php');?>

    <script type="text/javascript"> 
        function deleteConfirm(url)
         {
            if(confirm('Do you want to Delete this user ?'))
            {
                window.location.href=url;
            }
         }
    </script>
 
    <!-- Datatables -->
    <script>
      $(document).ready(function() {
      
//        $('#datatable').dataTable({
//            'order': [[ 0, 'asc' ]]
//           // orderable: false
//        });

        //TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->
    <script>tinymce.init({ selector:'textarea', menubar: false,height: 250, statusbar : false, force_p_newlines: false });</script>
    <style>
        .span_lable{width: 180px; display: inline-block;font-weight: bold; text-align: left;}
        .span_lable_2{width: 250px; display: inline-block;font-weight: bold; text-align: left; color: cornflowerblue;}    
    </style>