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
                    <h2>All Employers <small></small></h2>
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
                      
                      <div class="row">
                        <div class="col-md-8 col-md-offset-2 well">
                        <?php 
                        $attr = array("class" => "form-horizontal", "role" => "form", "id" => "form1", "name" => "form1");
                        echo form_open("admin/searchEmployers", $attr);?>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <input class="form-control" id="username" name="username" placeholder="Search for Name..." type="text" value="<?php echo set_value('username'); ?>" />
                                </div>
                                <div class="col-md-6">
                                    <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Search" />
                                    <a href="<?php echo base_url(). "admin/employers"; ?>" class="btn btn-primary">Show All</a>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                        </div>
                    </div>
                      
                    <div class="row">
                    <div class="col-sm-12">
                    <div class="card-box table-responsive">
                      
                    <table id="mytable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                            <th>ID</th> 
                            <th>Image</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Type</th>
                            <th>Active / Block</th>
                            <th>Action</th>
                        </tr>
                      </thead> 


                      <tbody>
                        
                        <?php
                        if($users){
                        foreach($users as $res){
                            
                        $active = '<span style="color: green;"> (Active)</span>';
                        $inactive = '<span style="color: red;"> (In-Active)</span>';    
                            
                        ?>
                          
                        <div class="modal fade bs-example-modal-lg-<?php echo $res['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">

                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                  </button>
                                    <h4 class="modal-title" id="myModalLabel">From : admin@fittolift.com</h4>
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
                                    <input type="hidden" name="from_email" value="admin@fittolift.com">

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
                          
                          
                        <tr>
                            <td><?php echo $res['id'];?></td>
                            <td><img alt="No Image" src="<?php echo $res['image'];?>" width="60" height="60" style="text-align: center;"></td>
                            <td><?php echo $res['email'];?></td>
                            
                            <td><?php echo $res['username'];if($res['status'] == 1){echo $active;}else{echo $inactive;}?></td>
                            <td><?php echo $res['type'];?></td> 
                            
                            <td>
                                <?php if($res['status'] == 1 ){ ?>
                                <a style="padding: 1px 4px;" onclick="javascript:inactiveConfirm('<?php echo base_url("admin/emp_inactive/".$res['id']);?>');" href="#" class="btn btn-default btn-xs">Make In-Active </a>
                                <?php } ?>
                                
                                <?php if($res['status'] == 0 ){ ?>
                                <a style="padding: 1px 4px;" onclick="javascript:activeConfirm('<?php echo base_url("admin/emp_active/".$res['id']);?>');" href="#" class="btn btn-warning btn-xs">Make Active </a>
                                <?php } ?>
                            </td>
                            
                            <td>
<!--
                                <a href="<?php echo base_url("admin/profile/".$res['id']); ?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                <a href="<?php echo base_url("admin/editUser/".$res['id']); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
-->     
                                <?php if($this->session->userdata('user_type') == 'admin' ){ ?>
                                <a onclick="javascript:deleteConfirm('<?php echo base_url("admin/delUser/".$res['id']);?>');" deleteConfirm href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                <?php } ?>
                                <a href="<?php echo base_url("admin/adminProfile/".$res['id']);?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit Profile </a>
                                <a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg-<?php echo $res['id'];?>"><i class="fa fa-envelope"></i> Send Email </a>
                                
                            </td>

                        </tr>
                        <?php }}?>
<!--                        <tr><td colspan="7"><?php echo $links; ?></td></tr>  -->
                      </tbody>
                    </table>
                        <div style="float:right;"><?php echo $pagination; ?></div>
                        <div style="float:left;"><ul class="pagination"><li>Total records <tt style="color: #337ab7;font-weight: bold;"><?php echo $total;?></tt></li></ul></div>
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
 <!-- footer content -->
        <footer>
          <div class="pull-right">
            Powerd by <a href="<?php echo base_url(); ?>">Fit to Lift</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
   
<script type="text/javascript"> 
        $(".alert").show().delay(3000).fadeOut();
        function deleteConfirm(url)
        {
            if(confirm('Do you want to Delete this user ?'))
            {
                window.location.href=url;
            }
        }
        function inactiveConfirm(url)
        {
            if(confirm('Do you want to In-Active this employer ?'))
            {
                window.location.href=url;
            }
        }
        function activeConfirm(url)
         {
            if(confirm('Do you want to Active this employer ?'))
            {
                window.location.href=url;
            }
         }
    </script>
 
    <!-- Datatables -->

    <script type="text/javascript"> 
        $(document).ready(function() { 
            $("#mytable").dataTable(); 
        }); 
    </script>

    <script>
//      $(document).ready(function() {
//      
//        $('#datatable').DataTable({
//            'order': [[ 0, 'asc' ]]
//           // orderable: false
//        });
//
//        TableManageButtons.init();
//      });
    </script>
    <!-- /Datatables -->
    <script>tinymce.init({ selector:'textarea', menubar: false,height: 250, statusbar : false, force_p_newlines: false });</script>
    <style>.pagination {margin: 0; border-radius: 4px;}</style>
</body>
</html>