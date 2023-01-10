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
                    <h2>All Packages <small></small></h2>
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
                            <th>Photo</th>
                            <th>Title</th>  
                            <th>Price</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        
                        <?php foreach($packages as $package){ ?>
                          
                        
                        <tr>
                            <td><?php echo $package['id'];?></td>
                            <td><img src="<?php echo $package['img_file'];?>" style="width: 150px;"></td>
                            <td><?php echo $package['title'];?></td>
                            <td>Rs. <?php echo $package['price'];?></td>
                            <td><?php echo $package['description'];?></td>
                            
                            <td>
<!--
                                <a href="<?php echo base_url("admin/profile/".$package['id']); ?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>-->
                                
                                <a href="<?php echo base_url("admin/editPackage/".$package['id']); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>

                                <a onclick="javascript:deleteConfirm('<?php echo base_url("admin/delpackages/".$package['id']);?>');" deleteConfirm href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                
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
            if(confirm('Do you want to Delete this Package ?'))
            {
                window.location.href=url;
            }
         }
    </script>
 
    <!-- Datatables -->
    <script>
      $(document).ready(function() {
      
        $('#datatable').dataTable({
            'order': [[ 0, 'asc' ]]
           // orderable: false
        });

        //TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->
    <script>tinymce.init({ selector:'textarea', menubar: false,height: 250, statusbar : false, force_p_newlines: false });</script>