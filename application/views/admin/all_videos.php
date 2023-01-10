<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
<!--                <h3>Reservations</h3>-->
                  
              </div>
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
                    <?php if($this->session->userdata('user_type') == 'admin' ){ ?>  
                        <h2>All Training Videos <small></small></h2>
                    <?php }else{ ?>
                        <h2>Assigned Videos by Admin <small></small></h2>
                    <?php } ?>  

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                            <th>ID</th>   
                            <th>Video Order</th>
                            <th>Video By</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Video</th>
                            <?php if($this->session->userdata('user_type') == 'admin' ){ ?>
                            <th>Assigned Clinics</th>
                            <th>Assigned Employers</th>
                            <th>Action</th>
                            <?php } ?>
                        </tr>
                      </thead>


                      <tbody>
                        
                        <?php
                          
                        //if($this->session->userdata('user_type') == 'admin' || $this->session->userdata('user_type') == 'Clinic' ){  
                        foreach($video_data as $vid){
                            
                            $user_data = $this->Admin_model->get_assigned_clinic_data($vid['video_by']);
                            
                            $assigned_clinics = $this->Admin_model->get_vid_assigned_clinics($vid['id']);
                            $assigned_emps = $this->Admin_model->get_vid_assigned_emps($vid['id']);
                            //echo '<pre>';print_r($assigned_clinics);
                            
                            if(!empty($assigned_clinics)){
                                $clinic = "<a style='padding: 1px 4px;' href='#' class='btn btn-success btn-xs' data-toggle='modal' data-target='.bs-clinci-list-modal-lg-".$vid['id']."'>View Clinics List</a>";
                            }else{
                                $clinic = '<span style="color: red;">No Assigned Clinic</span>';
                            }
                            
                            if(!empty($assigned_emps)){
                                $emps = "<a style='padding: 1px 4px;' href='#' class='btn btn-success btn-xs' data-toggle='modal' data-target='.bs-emp-list-modal-lg-".$vid['id']."'>View Employers List</a>";
                            }else{
                                $emps = '<span style="color: red;">No Assigned Employer</span>';
                            }
                            
                        ?>
                          
                          <div class="modal fade assign-clinic-modal-lg-<?php echo $vid['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">

                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                  </button>
                                    <h4 class="modal-title" id="myModalLabel">Assign Clinic to this Videos</ h4>
                                </div>
                                  
                                <?php
                                    $attributes = array('class' => 'form-horizontal', 'method' => 'post');
                                    echo form_open('admin/assign_vid_to_user', $attributes);
                                ?>  
                                <div class="modal-body">
                                    <?php 
                                        $all_clinic = $this->Admin_model->get_all_clinic_not_assigned_vid($vid['id']);
                                        if($all_clinic){
                                    ?> 
                                    <input type="hidden" name="video_id" value="<?php echo $vid['id'];?>">
                                    <input type="hidden" name="assigned_by" value="<?php echo $this->session->userdata('user_id');?>">
                                    <select name="assigned_user" class="form-control">
                                        <option value="">Select Desired Clinic</option>
                                        <?php foreach($all_clinic as $employer){?>
                                            <option value="<?php echo $employer['id'];?>"><?php echo $employer['username'];?></option>
                                        <?php } ?>    
                                    </select>
                                    <?php }else{?>
                                    <span style="color:red;">All Clinics has been assigned to this video!</span>
                                    <?php } ?>
                                    
                                </div>
                                
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <?php if($all_clinic){ ?>
                                  <button type="submit" name="submits" class="btn btn-primary">Assign</button>
                                  <?php } ?>
                                </div>
                                <?php echo form_close(); ?>  

                              </div>
                            </div>
                          </div>
                          
                          <div class="modal fade assign-emp-modal-lg-<?php echo $vid['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">

                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                  </button>
                                    <h4 class="modal-title" id="myModalLabel">Assign Employer to this Videos</ h4>
                                </div>
                                  
                                <?php
                                    $attributes = array('class' => 'form-horizontal', 'method' => 'post');
                                    echo form_open('admin/assign_vid_to_user', $attributes);
                                ?>  
                                <div class="modal-body">
                                    <?php 
                                        $all_employers = $this->Admin_model->get_all_emp_not_assigned_vid($vid['id']);
                                        if($all_employers){
                                    ?>        
                                  
                                    <input type="hidden" name="video_id" value="<?php echo $vid['id'];?>">
                                    <input type="hidden" name="assigned_by" value="<?php echo $this->session->userdata('user_id');?>">
                                    <select name="assigned_user" class="form-control">
                                        <option value="">Select Desired Employer</option>
                                        <?php foreach($all_employers as $employer){?>
                                            <option value="<?php echo $employer['id'];?>"><?php echo $employer['username'];?></option>
                                        <?php } ?>    
                                    </select>
                                    <?php }else{?>
                                    <span style="color:red;">All Employers has been assigned to this video!</span>
                                    <?php } ?>
                                    
                                </div>
                                
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <?php if($all_employers){ ?>
                                  <button type="submit" name="submits" class="btn btn-primary">Assign</button>
                                <?php } ?>   
                                </div>
                                <?php echo form_close(); ?>  

                              </div>
                            </div>
                          </div>
                          
                          <div class="modal fade bs-clinci-list-modal-lg-<?php echo $vid['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">

                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                  </button>
                                    <h4 class="modal-title" id="myModalLabel" style="font-size: 22px;float: left;">Assigned Clinics of this Video:</h4>
                                    <img src="<?php echo base_url().'assets/images/clinic_logo.png';?>" style="width: 130px; float: right; margin-right: 50px;">
                                </div>
                                 
                                <div class="modal-body" id="content" style="text-align:center;  font-size: 14px;">
                                    <?php $i=1; foreach($assigned_clinics as $assigned){?>
                                    <div> 
                                        <span class="span_lable"><?php echo $i++; ?>.</span> 
                                        <span id="emp_id" class="span_lable_2"><?php echo $assigned['username'];?> </span>
                                        <span>
                                            <a style="padding: 1px 4px;" onclick="javascript:unassingConfirm('<?php echo base_url("admin/user_unassign/".$assigned['id']);?>');" href="#" class="btn btn-warning btn-xs">Un-Assign </a>
                                        </span>
                                    </div>
                                    <?php } ?>
                                
                                </div>
                                
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                        

                              </div>
                            </div>
                        </div>
                          
                        <div class="modal fade bs-emp-list-modal-lg-<?php echo $vid['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">

                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                  </button>
                                    <h4 class="modal-title" id="myModalLabel" style="font-size: 22px;float: left;">Assigned Employers of this Video:</h4>
                                    <img src="<?php echo base_url().'assets/images/clinic_logo.png';?>" style="width: 130px; float: right; margin-right: 50px;">
                                </div>
                                 
                                <div class="modal-body" id="content" style="text-align:center;  font-size: 14px;">
                                    <?php $i=1; foreach($assigned_emps as $assigned){?>
                                    <div> 
                                        <span class="span_lable"><?php echo $i++; ?>.</span> 
                                        <span id="emp_id" class="span_lable_2"><?php echo $assigned['username'];?> </span>
                                        <span>
                                            <a style="padding: 1px 4px;" onclick="javascript:unassingConfirm('<?php echo base_url("admin/user_unassign/".$assigned['id']);?>');" href="#" class="btn btn-warning btn-xs">Un-Assign </a>
                                        </span>
                                    </div>
                                    <?php } ?>
                                
                                </div>
                                
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                        

                              </div>
                            </div>
                        </div>  
                          
                          
                        <tr id="sortable">
                            <td><?php echo $vid['id'];?></td>
                            <td><?php echo $vid['order'];?></td>
                            <td><?php echo $user_data[0]['username'];?></td>
                            <td><?php echo $vid['video_title'];?></td>
                            <td><?php echo $vid['video_description'];?></td>
                            <td><?php echo $vid['video_link'];?></td>
                            
                            <?php if($this->session->userdata('user_type') == 'admin' ){ ?>
                            <td><?php echo $clinic;?></td>
                            <td><?php echo $emps;?></td>
                            
                            <td>
                                <a href="<?php echo base_url("admin/editVideo/".$vid['id']);?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                
                                <a onclick="javascript:deleteConfirm('<?php echo base_url("admin/delvideo/".$vid['id']);?>');" deleteConfirm href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>

                                <a style="padding: 1px 4px;" href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".assign-clinic-modal-lg-<?php echo $vid['id'];?>"><i class="fa fa-compress"></i> Assign to Clinic </a>

                                <a style="padding: 1px 4px;" href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".assign-emp-modal-lg-<?php echo $vid['id'];?>"><i class="fa fa-compress"></i> Assign to Employer </a>
                                
                                <?php if($all_employers){?>
                                <a style="padding: 1px 4px;" href="<?php echo base_url("admin/assign_vid_toall_emp/".$vid['id']);?>" class="btn btn-primary btn-xs"><i class="fa fa-compress"></i> Assign to all Employer </a>
                                <?php }else{ ?>
                                <a style="padding: 1px 4px;pointer-events: none;background: #5f98ca;" href="#" class="btn btn-primary btn-xs"><i class="fa fa-compress"></i> Assign to all Employer </a>
                                <?php } ?>
                                
                                <?php if($all_clinic){?>
                                <a style="padding: 1px 4px;" href="<?php echo base_url("admin/assign_vid_toall_clinics/".$vid['id']);?>" class="btn btn-primary btn-xs"><i class="fa fa-compress"></i> Assign to all Clinics </a>
                                <?php }else{ ?>
                                <a style="padding: 1px 4px;pointer-events: none;background: #5f98ca;" href="#" class="btn btn-primary btn-xs"><i class="fa fa-compress"></i> Assign to all Clinics </a>
                                <?php } ?>
                            
                            <?php } ?>

                        </tr>
                        <?php } //} ?>
                           
                      </tbody>
                    </table>
                      <?php if($this->session->userdata('user_type') == 'admin' ){ ?>
                       <div style="float:right;"><?php echo $pagination; ?></div>
                       <div style="float:left;"><ul class="pagination"><li>Total records <tt style="color: #337ab7;font-weight: bold;"><?php echo $total;?></tt></li></ul></div>
                      <?php }?>
                  </div>
                </div>
              </div>

              </div>
          </div>
        </div>
        <!-- /page content -->

    <?php //include('includes/footer.php');?>

    <script src="<?php echo base_url("assets/vendors/jquery/dist/jquery.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/bootstrap/dist/js/bootstrap.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/tinymce/tinymce.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/build/js/custom.min.js"); ?>"></script>

    <script type="text/javascript"> 
        $(".alert").show().delay(3000).fadeOut();
        function deleteConfirm(url)
        {
            if(confirm('Do you want to Delete this Video ?'))
            {
                window.location.href=url;
            }
        }
        function unassingConfirm(url)
        {
            if(confirm('Do you want to Un-Assign this Video ?'))
            {
                window.location.href=url;
            }
        }
    </script>

    <style>
        iframe{
            width: 95px;
            height: 85px;
        }
        .span_lable{width: 30px; display: inline-block;font-weight: bold; text-align: left;}
        .span_lable_2{width:320px; display: inline-block;font-weight: bold; text-align: left; color: cornflowerblue;} 
    </style>