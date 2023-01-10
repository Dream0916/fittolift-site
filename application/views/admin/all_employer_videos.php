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
                   
                    <h2>Assigned Orientation Videos by Clinic <small></small></h2> 
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
                            <th>Video By</th>
                            <th>Title</th>
                            <th>Video</th>
                        </tr>
                      </thead>


                      <tbody>
                        
                        <?php
                          
                        //if($this->session->userdata('user_type') == 'admin' || $this->session->userdata('user_type') == 'Clinic' ){  
                        foreach($video_data_intr as $vid){
                            
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
                                    <input type="hidden" name="video_id" value="<?php echo $vid['id'];?>">
                                    <input type="hidden" name="assigned_by" value="<?php echo $this->session->userdata('user_id');?>">
                                    <select name="assigned_user" class="form-control">
                                        <option value="">Select Desired Clinic</option>
                                        <?php 
                                            $all_employers = $this->Admin_model->get_all_clinic_not_assigned_vid($vid['id']);    
                                            foreach($all_employers as $employer){?>
                                            <option value="<?php echo $employer['id'];?>"><?php echo $employer['username'];?></option>
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
                          
                        <tr>
                            <td><?php echo $vid['id'];?></td>
                            <td><?php echo $user_data[0]['username'];?></td>
                            <td><?php echo $vid['video_title'];?></td>
                            <td><?php echo $vid['video_link'];?></td>
                        </tr>
                        <?php } //} ?>
            
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