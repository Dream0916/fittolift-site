<div class="right_col" role="main">

    <div class="">

        <div class="page-title">

            <div class="title_left">

                <h3>Category: Fit for Duty Form</h3>

            </div>

        </div>

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

                    <div class="x_content">

                        <?php if($this->session->flashdata('success')){ ?>

                            <div class="alert alert-success">

                                <strong>Success! </strong>
                                <?php echo $this->session->flashdata('success')?>

                            </div>

                            <?php }if($this->session->flashdata('error')){ ?>

                            <div class="alert alert-danger">

                                <strong>Error! </strong>
                                <?php echo $this->session->flashdata('error')?>

                            </div>

                            <?php } 
                        
                                //$emp_data=$this->Admin_model->employer_by_id($this->uri->segment(3));
                            ?>

                                <!--form strat-->

                                <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/insert_general_employer">

                                    <span class="section">Category: Fit for Duty Form : Warf Form</span>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_no">Employee Number <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="employee_no" class="form-control col-md-7 col-xs-12" name="employee_no" placeholder="Enter Employee #" required="required" type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_name">Employee Full Name <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="employee_name" class="form-control col-md-7 col-xs-12" name="employee_name" placeholder="Enter Full Name" required="required" type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" > Year of Birth <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="datepicker1" class="form-control col-md-7 col-xs-12" name="birth_year" placeholder="Year of Birth" required="required" type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" > Category of physical capacity <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="category_physical" value="Category I"> Category I <br>
                                            <input type="radio" name="category_physical" value="Category II"> Category II <br>
                                            <input type="radio" name="category_physical" value="Category III"> Category III <br>
                                            <input type="radio" name="category_physical" value="Category IV"> Category IV <br>
                                            <input type="radio" name="category_physical" value="Category V"> Category V <br>
                                            <input type="radio" name="category_physical" value="Category VI"> Category VI <br>
                                            <input type="radio" name="category_physical" value="Category VII"> Category VII <br>
                                            <input type="radio" name="category_physical" value="Category VIII"> Category VIII 
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" > Is the prospect employee fit for duty? Choose One? <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="duty" value="Yes, Fit for Duty"> Yes, Fit for Duty <br>
                                            <input type="radio" name="duty" value="Medical Hold (24 hour)"> Medical Hold (24 hour)<br>
                                            <input type="radio" name="duty" value="Physical capacity not met"> Physical capacity not met<br>
                                            <input type="radio" name="duty" value="Modified Duty (Text Box Required)"> Modified Duty (Text Box Required)
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Time<span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input min="1" max="12" class="form-control col-md-7 col-xs-12" name="time_day1" required="required" type="number" style="width: 88px;" autocomplete="off" placeholder="Hours">
                                            <input min="0" max="60" class="form-control col-md-7 col-xs-12" name="time_day2" required="required" type="number" style="width: 88px;" autocomplete="off" placeholder="Minutes">
                                            <select class="form-control col-md-7 col-xs-12" name="time_day3" style="width: 88px;">
                                                <option value="AM">AM</option>
                                                <option value="PM">PM</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Drug Test <span class="required"></span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control col-md-7 col-xs-12" name="drug_test" required>
                                                <option value="">Choose</option>
                                                <option value="Negative">Negative</option>
                                                <option value="Non-negative">Non-negative</option>
                                                <option value="Non-negative and sent to MRO waiting review">Non-negative and sent to MRO waiting review</option>
                                                <option value="Not tested at our facility">Not tested at our facility</option>
                                                <option value="Not performed">Not performed</option>
                                            </select>
                                        </div>

                                    </div>
                                    
                                   
                                    <div class="ln_solid"></div>

                                    <div class="form-group">

                                        <div class="col-md-6 col-md-offset-3">
                                            <button type="submit" class="btn btn-primary">Cancel</button>
                                            <button id="send" type="submit" class="btn btn-success">Submit</button>
                                        </div>

                                    </div>

                            </form><!--End of Form-->

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- /page content -->


<?php include('includes/footer.php');?>

    <style>
        input[type="radio"] {
            vertical-align: middle;
            margin: 0px 0 0;
        }
        
        .fa-minus-circle {
            color: red;
            font-size: 25px;
            margin: 12px 10px;
            float: right;
            position: absolute;
        }
        
        .fa-plus-circle {
            color: green;
            font-size: 25px;
            margin: 5px 10px;
            float: right;
            position: absolute;
        }
        
        .extra_field {
            height: 32px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            width: 93%;
            margin-top: 9px;
        }
    </style>


    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $(function () {
            $("#datepicker").datepicker({ dateFormat: "yy-mm-dd",changeMonth: true, changeYear: true });
            
            $('#datepicker1').datepicker({
                changeMonth: true, 
                changeYear: true,
                //showButtonPanel: true,
                dateFormat: 'yy',
                yearRange: '1950:2020',
                onClose: function(dateText, inst) { 
                    var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                    $(this).datepicker('setDate', new Date(year, 1));
                }
            });
        $("#datepicker1").focus(function () {
            $(".ui-datepicker-month").hide();
        });
        $("#datepicker1").focus(function () {
            $(".ui-datepicker-calendar").hide();
        });
            $("#datepicker2").datepicker({ dateFormat: "yy-mm-dd",changeMonth: true, changeYear: true });
            $("#datepicker3").datepicker({ dateFormat: "yy-mm-dd",changeMonth: true, changeYear: true });
            $("#datepicker4").datepicker({ dateFormat: "yy-mm-dd",changeMonth: true, changeYear: true });
        });
    </script>

<!--
    <script type="text/javascript">
        $(document).ready(function () {

            $("#other_nature_field").hide();
            $("#other_waist_up_field").hide();
            $("#other_shoulder_level_field").hide();
            $("#other_shoulder_lift_field").hide();
            $("#other_knee_lift_field").hide();
            $("#other_floor_lift_field").hide();
            $("#other_grip_restrictions_field").hide();
            
            $("#other_nature").click(function () {
                $("#other_nature_field").show();
            });
            $(".nature1").click(function () {
                $("#other_nature_field").hide();
            });
            
            $("#other_waist_up_to").click(function () {
                $("#other_waist_up_field").show();
            });
            $(".waist_up_to").click(function () {
                $("#other_waist_up_field").hide();
            });
            
            $("#other_shoulder_lift").click(function () {
                $("#other_shoulder_lift_field").show();
            });
            $(".shoulder_level").click(function () {
                $("#other_shoulder_lift_field").hide();
            });
            
            $("#other_shoulder_level").click(function () {
                $("#other_shoulder_level_field").show();
            });
            $(".above_shoulder").click(function () {
                $("#other_shoulder_level_field").hide();
            });
            
            $("#other_knee_lift").click(function () {
                $("#other_knee_lift_field").show();
            });
            $(".knee_lift").click(function () {
                $("#other_knee_lift_field").hide();
            });
            
            $("#other_floor_lift").click(function () {
                $("#other_floor_lift_field").show();
            });
            $(".floor_lift").click(function () {
                $("#other_floor_lift_field").hide();
            });
            
            $("#other_grip_restrictions").click(function () {
                $("#other_grip_restrictions_field").show();
            });
            $(".grip_restrictions").click(function () {
                $("#other_grip_restrictions_field").hide();
            });
            
        });    
    </script>
-->
                                    