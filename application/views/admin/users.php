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
                    <h2>All Users <small></small></h2>
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
                            <th>Type</th>
                            <th>Clinic Name</th>
                            <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        
                        <?php
                          
                        foreach($users as $res){
                            if($res['clinic_name'] != 'clinic_name'){
                                $clinic = $res['clinic_name'];
                            }else{
                                $clinic = '<span style="color: red;">-</span>';
                            }
                        ?>
                          
                        <div class="modal fade bs-example-modal-lg-<?php echo $res['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">

                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                  </button>
                                    <h4 class="modal-title" id="myModalLabel">From : sales@volxom.com</h4>
                                    <h4 class="modal-title" id="myModalLabel">To : <?php echo $res['email'];?></h4>
                                </div>
                                  
                                <?php
                                    $attributes = array('class' => 'form-horizontal', 'method' => 'post');
                                    echo form_open('admin/email_to_user', $attributes);
                                ?>  
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="<?php echo $res['id'];?>">
                                    <input type="hidden" name="to_email" value="<?php echo $res['email'];?>">
                                    <input type="hidden" name="name" value="<?php echo $res['username'];?>">

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
                          
                          
                          <div class="modal fade assign-example-modal-lg-<?php echo $res['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">

                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                  </button>
                                    <h4 class="modal-title" id="myModalLabel">Assign Employer to this clicnic</h4>
                                </div>
                                  
                                <?php
                                    $attributes = array('class' => 'form-horizontal', 'method' => 'post');
                                    echo form_open('admin/email_to_user', $attributes);
                                ?>  
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="<?php echo $res['id'];?>">
                                    <input type="hidden" name="to_email" value="<?php echo $res['email'];?>">
                                    <input type="hidden" name="name" value="<?php echo $res['username'];?>">

                                    <select name="assigned_employers" class="form-control">
                                        <option value="">Select Desired Employer</option>
                                        <?php foreach($all_employers as $employer){?>
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
                            <td><?php echo $res['id'];?></td>
                            <td><?php echo $res['username'];?></td>
                            <td><img alt="No Image" src="<?php echo $res['image'];?>" width="60" height="60" style="text-align: center;"></td>
                            <td><?php echo $res['email'];?></td>
                            <td><?php echo $res['type'];?></td>
                            <td><?php echo $clinic;?></td>
                            
                            
                            
                            <td>
<!--
                                <a href="<?php echo base_url("admin/profile/".$res['id']); ?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                <a href="<?php echo base_url("admin/editUser/".$res['id']); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
-->     
                                <?php if($this->session->userdata('user_type') == 'admin' ){ ?>
                                <a onclick="javascript:deleteConfirm('<?php echo base_url("admin/delUser/".$res['id']);?>');" deleteConfirm href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                <?php } ?>
                                
                                <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".assign-example-modal-lg-<?php echo $res['id'];?>"><i class="fa fa-compress"></i> Assign Employer </a>
                                
                                <a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg-<?php echo $res['id'];?>"><i class="fa fa-envelope"></i> Send Email </a>
                            </td>

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