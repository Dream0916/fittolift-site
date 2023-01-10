  <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                            <th>ID</th>    
                            <th>Username</th>
                            <th>Image</th>        
<!--                            <th>Email</th>-->
<!--                            <th>Type</th>-->
                            <th>Clinic Name</th>
                            <th>Active / Block</th>
                            <th>Employers</th>
                            <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        
                        <?php
                          
                        foreach($users as $res){
                            
                            $assigned_emps = $this->Admin_model->get_assigned_emp_by_clicnic_id($res['id']);
                            //echo '<pre>';print_r($assigned_emps);
                            
                            if(!empty($assigned_emps)){
                                $emp = "<a style='padding: 1px 4px;' href='#' class='btn btn-success btn-xs' data-toggle='modal' data-target='.bs-list-modal-lg-".$res['id']."'>View List</a>";
                            }else{
                                $emp = '<span style="color: red;">No Employer</span>';
                            }
                            
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
                                    
<!--
                                    <?php //if(!empty($assigned_emps)){ ?>
                                        <h4 class="modal-title" id="myModalLabel">To : <?php echo $assigned_emps[0]['email'];?> (Employer)</h4>
                                    <?php //}else{ ?>
-->
                                        <h4 class="modal-title" id="myModalLabel">To : <?php echo $res['email'];?> (Clinic)</h4>
                                    <?php //} ?>
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
                          
                          
                          <div class="modal fade assign-example-modal-lg-<?php echo $res['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">

                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                  </button>
                                    <h4 class="modal-title" id="myModalLabel">Assign Employer to this clicnic</ h4>
                                </div>
                                  
                                <?php
                                    $attributes = array('class' => 'form-horizontal', 'method' => 'post');
                                    echo form_open('admin/assign_to_clinic', $attributes);
                                ?>  
                                <div class="modal-body">
                                    <input type="hidden" name="clinic_id" value="<?php echo $res['id'];?>">

                                    <select name="assigned_employers" class="form-control">
                                        <option value="">Select Desired Employer</option>
                                        <?php 
                                            $all_employers = $this->Admin_model->get_all_employers_not_assigned($res['id']);    
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
                          
                          <div class="modal fade bs-list-modal-lg-<?php echo $res['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">

                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                  </button>
                                    <h4 class="modal-title" id="myModalLabel" style="font-size: 22px;float: left;">Assigned Employers to this Clinic:</h4>
                                    <img src="<?php echo base_url().'assets/images/clinic_logo.png';?>" style="width: 130px; float: right; margin-right: 50px;">
                                </div>
                                 
                                <div class="modal-body" id="content" style="text-align:center;  font-size: 14px;">
                                    <?php $i=1; foreach($assigned_emps as $assigned){?>
                                    <div> 
                                        <span class="span_lable"><?php echo $i++; ?>.</span> 
                                        <span id="emp_id" class="span_lable_2"><?php echo $assigned['username'];?> </span>
                                        <span>
                                            <a style="padding: 1px 4px;" onclick="javascript:unassingConfirm('<?php echo base_url("admin/emp_unassign/".$assigned['id']);?>');" href="#" class="btn btn-warning btn-xs">Un-Assign </a>
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
                            <td><?php echo $res['id'];?></td>
                            <td><?php echo $res['username'];?></td>
                            <td><img alt="No Image" src="<?php echo $res['image'];?>" width="50" height="50" style="text-align: center;"></td>
<!--                            <td><?php echo $res['email'];?></td>-->
<!--                            <td><?php echo $res['type'];?></td>-->
                          
                            <td><?php echo $res['clinic_name'];if($res['status'] == 1){echo $active;}else{echo $inactive;}?></td>
                            
                            <td>
                                <?php if($res['status'] == 1 ){ ?>
                                <a style="padding: 1px 4px;" onclick="javascript:inactiveConfirm('<?php echo base_url("admin/clinic_inactive/".$res['id']);?>');" href="#" class="btn btn-default btn-xs">Make In-Active </a>
                                <?php } ?>
                                
                                <?php if($res['status'] == 0 ){ ?>
                                <a style="padding: 1px 4px;" onclick="javascript:activeConfirm('<?php echo base_url("admin/clinic_active/".$res['id']);?>');" href="#" class="btn btn-warning btn-xs">Make Active </a>
                                <?php } ?>
                            </td>
                            
                            <td><?php echo $emp;?></td>
                            
                            
                            <td>
<!--
                                <a href="<?php echo base_url("admin/profile/".$res['id']); ?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                <a href="<?php echo base_url("admin/editUser/".$res['id']); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
-->     
                                <?php if($this->session->userdata('user_type') == 'admin' ){ ?>
                                <a style="padding: 1px 4px;" onclick="javascript:deleteConfirm('<?php echo base_url("admin/delUser/".$res['id']);?>');" deleteConfirm href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                <?php } ?>
                                
                                <?php //if(empty($assigned_emps)){ ?>
                                <a style="padding: 1px 4px;" href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".assign-example-modal-lg-<?php echo $res['id'];?>"><i class="fa fa-compress"></i> Assign Employer </a>
<!--
                                <?php //}else{?>
                                <a  href="#" style="cursor: no-drop;padding: 1px 4px;" class="btn btn-primary btn-xs" data-toggle="modal"><i class="fa fa-compress"></i> Assigned </a>
                                <?php //}?>
-->
                                
                                <a style="padding: 1px 4px;" href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg-<?php echo $res['id'];?>"><i class="fa fa-envelope"></i> Send Email </a>
                            </td>

                        </tr>
                        <?php }?>
                          
                      </tbody>
                    </table>
                        <div id="ajax_links" class="text-center">
                            <?php echo $links; ?>
                        </div>
                        