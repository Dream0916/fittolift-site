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
                    <h2> POET / F4Duty Report Data<small></small></h2>
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
                            <th>Employer</th>
                            <th>Clinic</th>       
                            <th>Date to Reported</th>
                            <th>Submission Date</th>
                            <th>Fit for Duty?</th>
                            <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        
                        <?php
                        foreach($injury_data as $res){
                            //echo '<pre>';print_r($res);
                            $emp_data = $this->Admin_model->get_assigned_clinic_data($res['employer_id']);
                            
                        ?>
                          
                          
                        <div class="modal-content" id="pdf_data_<?php echo $res['id'];?>" style="display:none; width:100%;font-size:15px;color:black;">

        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" style="margin:bottom:15px;margin-left:15px;font-size: 24px;float: left;color:black;"> General POET / Fit For Duty (F4D) Report </h4>
            <hr>
            <img src="<?php echo base_url().'assets/images/clinic_logo.png';?>" style="width: 130px; float: right; margin-right: 70px;">
    

        <div style="margin-top:35px;">  Employer Name  ...........................  <?php echo $emp_data[0]['username'];?></div>
        <div>  Employee Number                  ...........................  <?php echo $res['employee_no'];?></div>    
        <div>  Clinic Name                      ...........................  <?php echo $res['clinic_name'];?> </div>
        <div>  First Name                       ...........................  <?php echo $res['first_name'];?></div>
        <div>  Last Name                        ...........................  <?php echo $res['last_name'];?></div>    
        <div>  Location                         ...........................  <?php echo wordwrap($res['emp_location'], 70, "<br />\n");?></div>
        <div>  Date of Birth                    ...........................  <?php echo date("d M, Y", strtotime($res['dob']));?> </div>
        <div>  Gender                           ...........................  <?php echo $res['gender'];?></div>
        <div>  Type of Office Visit             ...........................  <?php echo $res['office_visit'];?></div>    
        <div>  Date reported to Office          ...........................  <?php echo date("d M, Y", strtotime($res['date_reported']));?> </div>
        <div>  Job description                  ...........................  <?php echo wordwrap($res['job_desc'], 65, "<br />\n");?> </div>   
        <div>  Drug Test                        ...........................  <?php echo $res['drug_test'];?> </div>
        <div>  Physical Demand Level:           ...........................  <?php echo $res['physical_demand'];?></div>
        <div>  Lift from the waist up to        ...........................  <?php echo $res['waist_lift'];?></div>    
        <div>  Lift at shoulder level up to     ...........................  <?php echo $res['shoulder_lift'];?> </div>
        <div>  Lift above shoulder level up to  ...........................  <?php echo $res['shoulder_level'];?> </div>
        <div>  Lift from the knee level up to   ...........................  <?php echo $res['knee_lift'];?> </div>
        <div>  Lift from the floor level up to  ...........................  <?php echo $res['floor_lift'];?> </div>
        <div>  Sitting and standing             ...........................  <?php echo $res['sitting'];?> </div>
        <div>  Climbing                         ...........................  <?php echo $res['climbing'];?> </div>
        <div>  Is physcially Fit for Duty       ...........................  <?php echo wordwrap($res['duty'], 50, "<br />\n").'<br>';?></div>
        <div>  Medical DOT with expiration      ...........................  <?php echo $res['dot'];?></div>
        <div>  Evaluating Doctor's name         ...........................  <?php echo $res['doctor_name'];?></div>    
        <div>  Form Submission Date             ...........................  <?php echo date("d M, Y", strtotime($res['submission']));?> </div>   

        </div>

      </div>  
                          
                          
                        <div class="modal fade bs-example-modal-lg-<?php echo $res['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">

                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                  </button>
                                    <h4 class="modal-title" id="myModalLabel" style="font-size: 24px;float: left;">General  POET / F4Duty Report :</h4>
                                    <img src="<?php echo base_url().'assets/images/clinic_logo.png';?>" style="width: 130px; float: right; margin-right: 40px;">
                                </div>
                                 
                                <div class="modal-body" id="content" style="text-align:center;  font-size: 14px;">
                                
                                <div> <span class="span_lable">Employer Name</span> <span id="emp_id" class="span_lable_2"><?php echo $emp_data[0]['username'];?> </span> </div>    
                                <div> <span class="span_lable">Clinic Name</span> <span id="emp_no" class="span_lable_2"><?php echo $res['clinic_name'];?> </span> </div>
                                <div> <span class="span_lable">First Name</span> <span id="is_fit" class="span_lable_2"><?php echo $res['first_name'];?> </span> </div>
                                <div> <span class="span_lable">Last Name</span> <span id="is_fit" class="span_lable_2"><?php echo $res['last_name'];?> </span> </div>    
                                <div> <span class="span_lable">Locaion</span> <span id="is_fit" class="span_lable_2"><?php echo $res['emp_location'];?> </span> </div>    
                                <div> <span class="span_lable">Employee Number</span> <span id="is_fit" class="span_lable_2"><?php echo $res['employee_no'];?> </span> </div>
                                <div> <span class="span_lable">Date of Birth</span> <span id="is_fit" class="span_lable_2"><?php echo date("d M, Y", strtotime( $res['dob']));?> </span> </div> 
                                <div> <span class="span_lable">Type of Office Visit</span> <span id="is_fit" class="span_lable_2"><?php echo $res['office_visit'];?> </span> </div>     
                                <div> <span class="span_lable">Gender</span> <span id="written_job_des" class="span_lable_2"><?php echo $res['gender'];?> </span> </div>
                                <div> <span class="span_lable">Date reported to your office</span> <span id="date_reported_off" class="span_lable_2"><?php echo date("d M, Y", strtotime($res['date_reported']));?> </span></div>    
                                <div> <span class="span_lable">Job description</span> <span id="written_job_des" class="span_lable_2"><?php echo $res['job_desc'];?> </span> </div>
                                <div> <span class="span_lable">Drug Test</span> <span id="is_fit" class="span_lable_2"><?php echo $res['drug_test'];?> </span> </div>
                                <div> <span class="span_lable">Physical Demand Level</span> <span id="were_seen" class="span_lable_2"><?php echo $res['physical_demand'];?> </span> </div>
                                <div> <span class="span_lable">Lift from the waist up to</span> <span id="lim_leg" class="span_lable_2"><?php echo $res['waist_lift'];?> </span> </div>    
                                <div> <span class="span_lable">Lift at shoulder level up to</span> <span id="lim_leg" class="span_lable_2"><?php echo $res['shoulder_lift'];?> </span> </div>
                                <div> <span class="span_lable">Lift above shoulder level up to</span> <span id="lim_floor" class="span_lable_2"><?php echo $res['shoulder_level'];?> </span> </div>
                                <div> <span class="span_lable">Lift from the knee level up to</span> <span id="lim_sitting" class="span_lable_2"><?php echo $res['knee_lift'];?> </span> </div>
                                <div> <span class="span_lable">Lift from the floor level up to</span> <span id="lim_sitting" class="span_lable_2"><?php echo $res['floor_lift'];?> </span> </div>
                                <div> <span class="span_lable">Sitting and standing</span> <span id="lim_sitting" class="span_lable_2"><?php echo $res['sitting'];?> </span> </div>
                                <div> <span class="span_lable">Climbing</span> <span id="lim_sitting" class="span_lable_2"><?php echo $res['climbing'];?> </span> </div>      
                                <div> <span class="span_lable">Is physcially Fit for Duty</span> <span id="is_fit" class="span_lable_2"><?php echo $res['duty'];?> </span> </div>
                                <div> <span class="span_lable">Medical DOT with expiration</span> <span id="lim_sitting" class="span_lable_2"><?php echo $res['dot'];?> </span> </div>
                                <div> <span class="span_lable">Evaluating Doctor's name</span> <span id="lim_sitting" class="span_lable_2"><?php echo $res['doctor_name'];?> </span> </div>    
                                
                                <div> <span class="span_lable">form Submission Date</span> <span id="were_seen" class="span_lable_2"><?php echo date("d M, Y", strtotime($res['submission']));?> </span> </div>
                                    
                                </div>
                                
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                   <a href="javascript:demoFromHTML(<?php echo $res['id'];?>)" class="btn btn-primary">Download PDF</a>
                                    
                                </div>
                          
                              </div>
                            </div>
                        </div>  
                          
                        <tr>
                            <td><?php echo $res['id'];?></td>
                            <td><?php echo $emp_data[0]['username'];?></td>
                            <td><?php echo $res['clinic_name'];?></td>
                            <td><?php echo date("d M, Y", strtotime($res['date_reported']));?></td>
                            <td><?php echo date("d M, Y", strtotime($res['submission']));?></td>
                            <td><?php echo $res['duty'];?></td>
                            
                            <td>
<!--
                                <a href="<?php echo base_url("admin/profile/".$res['id']); ?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                <a href="<?php echo base_url("admin/editUser/".$res['id']); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
-->
                                <?php if($this->session->userdata('user_type') == 'admin' ){ ?>
                                <a onclick="javascript:deleteConfirm('<?php echo base_url("admin/delPoetdata/".$res['id']);?>');" deleteConfirm href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                <?php } ?>
                                
                                <a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg-<?php echo $res['id'];?>"><i class="fa fa-user-plus"></i> Poet Report </a>
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
            if(confirm('Do you want to Delete this Poet Data ?'))
            {
                window.location.href=url;
            }
         }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>

    <script>
    function demoFromHTML(id) {
        var imgData = 'data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/4QMraHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjMtYzAxMSA2Ni4xNDU2NjEsIDIwMTIvMDIvMDYtMTQ6NTY6MjcgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzYgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjUyRTcyNDZBNDc2ODExRTdCRjdGODhFQUVCNjFBNTE0IiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjUyRTcyNDZCNDc2ODExRTdCRjdGODhFQUVCNjFBNTE0Ij4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NTJFNzI0Njg0NzY4MTFFN0JGN0Y4OEVBRUI2MUE1MTQiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NTJFNzI0Njk0NzY4MTFFN0JGN0Y4OEVBRUI2MUE1MTQiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYG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'
        
        
        
        var pdf = new jsPDF('p', 'pt', 'letter');
        
        pdf.addImage(imgData, 'JPEG', 240,50,150,40);
        //pdf.text(210, 60, 'General Poet Report');
        //pdf.text(100, 70, '---------------------------------------------------------------------------');
        // source can be HTML-formatted string, or a reference
        // to an actual DOM element from which the text will be scraped.
        source = $('#pdf_data_'+id)[0];

        // we support special element handlers. Register them with jQuery-style 
        // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
        // There is no support for any other type of selectors 
        // (class, of compound) at this time.
        specialElementHandlers = {
            // element with id of "bypass" - jQuery style selector
            '#bypassme': function (element, renderer) {
                // true = "handled elsewhere, bypass text extraction"
                return true
            }
        };
        margins = {
            top: 110,
            bottom: 50,
            left: 110,
            width: 2000
        };
        // all coords and widths are in jsPDF instance's declared units
        // 'inches' in this case
        pdf.fromHTML(
            source, // HTML string or DOM elem ref.
            margins.left, // x coord
            margins.top, { // y coord
                'width': margins.width, // max width of content on PDF
                'elementHandlers': specialElementHandlers
            },

            function (dispose) {
                // dispose: object with X, Y of the last line add to the PDF 
                //          this allow the insertion of new lines after html
                pdf.save('poet-report.pdf');
            }, margins
        );
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
          
          
          
//        var doc = new jsPDF();
//        var specialElementHandlers = {
//            '#editor': function (element, renderer) {
//                return true;
//            }
//        };
//
//        $('#cmd').click(function () {
//            $emp_id = $('#emp_id').html();
//            $clinic_name = $('#clinic_name').html();
//            $employer_email = $('#emp_no').html();
//            $date_reported = $('#dob').html();
//            $initials = $('#exp_return').html();
//            $birth = $('#exp_next_eve').html();
//            $lim1 = $('#dep_name').html();
//            $lim2 = $('#inj_date').html();
//            $lim3 = $('#time_day').html();
//            $lim4 = $('#emp_id1').html();
//            $lim5 = $('#emp_id2').html();
//            $lim6 = $('#emp_id3').html();
//            $lim7 = $('#emp_id4').html();
//            $lim8 = $('#emp_id5').html();
//            $lim9 = $('#emp_id6').html();
//            
//            doc.text(75, 15, 'General Poet Form Report:');
//            
//            doc.text(30, 40, 'Employer Name :                       '+$emp_id);
//            doc.text(30, 50, 'Clinic Name :                             '+$clinic_name);
//            doc.text(30, 60, 'Employer (email directed) :        '+$employer_email);
//            doc.text(30, 70, 'Date reported to your office :     '+$date_reported);
//            doc.text(30, 80, 'Initials of Employee :                  '+$initials);
//            doc.text(30, 90, 'Year of Birth :                             '+$birth);
//            doc.text(30, 100, 'Limitations - Lift from the waist :            '+$lim1);
//            doc.text(30, 110, 'Limitations - Lift at shoulder level :        '+$lim2);
//            doc.text(30, 120, 'Limitations - Lift above shoulder level :  '+$lim3);
//            doc.text(30, 130, 'Limitations - Lift from the knee level :    '+$lim4);
//            doc.text(30, 140, 'Limitations - Lift from the floor level :     '+$lim5);
//            doc.text(30, 150, 'Limitations to sitting :                      '+$lim6);
//            doc.text(30, 160, 'Is the prospect employee fit for duty :    '+$lim7);
//            doc.text(30, 170, 'Time :                                                   '+$lim8);
//            doc.text(30, 180, 'Drug Test :                                            '+$lim9);
//            
////            doc.fromHTML($('#content').html(), 40, 20, {
////                'width': 700,
////                    'elementHandlers': specialElementHandlers
////            });
//            doc.save('general-poet.pdf');
//        });  
          
      });
    </script>
    <!-- /Datatables -->
    <script>tinymce.init({ selector:'textarea', menubar: false,height: 250, statusbar : false, force_p_newlines: false });</script>
    <style>
        .span_lable{width: 275px; display: inline-block;font-weight: bold; text-align: left;float: left;}
        .span_lable_2{width: 265px; display: inline-block;font-weight: bold; text-align: left; color: cornflowerblue;}    
    </style>