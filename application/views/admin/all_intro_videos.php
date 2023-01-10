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
                    <?php if($this->session->userdata('user_type') == 'admin' ){ ?>  
                        <h2>All Training Videos <small></small></h2>
                    <?php }else{ ?>
                        <h2>My Orientation Videos <small></small></h2>
                    <?php } ?>  

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                            <th>ID</th>   
                            <th>Video By</th>
                            <th>Title</th>
                            <th>Video</th>
                            <?php if($this->session->userdata('user_type') == 'Clinic' ){ ?>
                            <th>Assigned Employers</th>
                            <th>Action</th>
                            <?php } ?>
                        </tr>
                      </thead>


                      <tbody>
                        
                        <?php
                          
                        foreach($video_data as $vid){
                            
                            $user_data = $this->Admin_model->get_assigned_clinic_data($vid['video_by']);
                            
                            $assigned_emps = $this->Admin_model->get_introduction_vid_assigned_emps($vid['id']);
                            //echo '<pre>';print_r($assigned_clinics);
                            
                            if(!empty($assigned_emps)){
                                $emps = "<a style='padding: 1px 4px;' href='#' class='btn btn-success btn-xs' data-toggle='modal' data-target='.bs-emp-list-modal-lg-".$vid['id']."'>View Employers List</a>";
                            }else{
                                $emps = '<span style="color: red;">No Assigned Employer</span>';
                            }
                            
                        ?>
                      
                          
                          <div class="modal fade assign-emp-modal-lg-<?php echo $vid['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">

                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                  </button>
                                    <h4 class="modal-title" id="myModalLabel">Assign Your Video to Employer</ h4>
                                </div>
                                  
                                <?php
                                    $attributes = array('class' => 'form-horizontal', 'method' => 'post');
                                    echo form_open('admin/assign_int_vid_to_emp', $attributes);
                                    $all_employers = $this->Admin_model->get_all_emp_not_assigned_vid_orientation($vid['id']);
                                    
                                    //echo '<pre>';print_r($all_employers);exit;
                                ?>  
                                <div class="modal-body">
                                    <input type="hidden" name="video_id" value="<?php echo $vid['id'];?>">
                                    <input type="hidden" name="assigned_by" value="<?php echo $this->session->userdata('user_id');?>">
                                    <select name="assigned_user" class="form-control">
                                        <option value="">Select Desired Employer</option>
                                        <?php 
                                            foreach($all_employers as $employer){
                                            $empdata = $this->Admin_model->get_assigned_clinic_data($employer['employer_id']);
                                        ?>
                                            <option value="<?php echo $employer['employer_id'];?>"><?php echo $empdata[0]['username'];?></option>
                                        <?php } ?>    
                                    </select>
                                    
                                </div>
                                
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" name="submits" class="btn btn-primary">Assign</button>
                                </div>
                                <?php echo form_close(); ?>  

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
                                            <a style="padding: 1px 4px;" onclick="javascript:unassingConfirm('<?php echo base_url("admin/emp_vid_unassign/".$assigned['id']);?>');" href="#" class="btn btn-warning btn-xs">Un-Assign </a>
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
                          
                          
                        <tr>
                            <td><?php echo $vid['id'];?></td>
                            <td><?php echo $user_data[0]['username'];?></td>
                            <td><?php echo $vid['video_title'];?></td>
                            <td><?php echo $vid['video_link'];?></td>
                            
                            <?php if($this->session->userdata('user_type') == 'Clinic' ){ ?>
                            <td><?php echo $emps;?></td>
                            
                            <td>
                                <a onclick="javascript:deleteConfirm('<?php echo base_url("admin/delintroductionvideo/".$vid['id']);?>');" deleteConfirm href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                
                                <a style="padding: 1px 4px;" href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".assign-emp-modal-lg-<?php echo $vid['id'];?>"><i class="fa fa-compress"></i> Assign to Employer </a>
                                
                                <?php if($all_employers){?>
                                <a style="padding: 1px 4px;" href="<?php echo base_url("admin/assign_int_vid_to_all_emp/".$vid['id']);?>" class="btn btn-primary btn-xs"><i class="fa fa-compress"></i> Assign to all Employers </a>
                                <?php }else{ ?>
                                <a style="padding: 1px 4px;pointer-events: none;background: #5f98ca;" href="#" class="btn btn-primary btn-xs"><i class="fa fa-compress"></i> Assign to all Employers </a>
                                <?php } ?>
                            
                            </td>
                            <?php } ?>

                        </tr>
                        <?php }?>
                          
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
            if(confirm('Do you want to Delete Your Video ?'))
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