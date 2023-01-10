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
                    <h2>Broadcast Message to all Users </h2>

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
                      
                            
                            //$assigned_emps = $this->Admin_model->get_assigned_emp_by_clicnic_id($users[0]['id']);
                      ?>
                     
                      <div class="" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <?php
                                    $attributes = array('class' => 'form-horizontal', 'method' => 'post');
                                    echo form_open('admin/email_to_all', $attributes);
                                ?>  
                                <div class="modal-header">
                                 
                                    <h4 class="modal-title" id="myModalLabel">From : admin@fittolift.com</h4>
                                    

                                        <h4 class="modal-title login-right" id="myModalLabel">To : <select id="email_select" name="email_select"><option id="all_clinics">To All Clinics</option><option id="all_employers">To All Employers</option><option id="all_users">To All Users</option><option id="specific_users">To Specific User(s)</option></select></h4>
                                        <h4 class="hiddens" id="specific_rec">Recipients : (Enter email address by comma seperated!)<input style="width:100%" name="to_users" type="text"></h4>
                                    <?php //} ?>
                                </div>
                                  
                                  
                                <div class="modal-body">
<!--
                                    <input type="hidden" name="id" value="<?php echo $users[0]['id'];?>">
                                    <input type="hidden" name="to_email" value="<?php echo $users[0]['email'];?>">
                                    <input type="hidden" name="name" value="<?php echo $users[0]['username'];?>">
-->
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
                      
                      
                      <div class="ln_solid"></div>
           
                      
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

<?php include('includes/footer.php'); ?>

<script type="text/javascript">
$(document).ready(function() { 

    $(function() {
      $("#specific_rec").hide();    
      $("#email_select").change(function() {
        if ($("#specific_users").is(":selected")) {
          $("#specific_rec").show();
        } else {
          $("#specific_rec").hide();
        }
      }).trigger('change');
    });
});
</script>
<script>tinymce.init({ selector:'textarea', menubar: false,height: 250, statusbar : false, force_p_newlines: false });</script>