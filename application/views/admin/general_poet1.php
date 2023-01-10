<style>
/*    .ui-datepicker-calendar {
        display: none;
    }
    .ui-datepicker-month {
       display: none;
    }
    .ui-datepicker-prev{
       display: none;
    }
    .ui-datepicker-next{
       display: none;
    }*/
</style>
<div class="right_col" role="main">

    <div class="">

        <div class="page-title">

            <div class="title_left">

                <h3>General POET</h3>

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

                            <?php } ?>

                                <!--form strat-->

                                <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/insert_general_poet">

                                    <span class="section">General POET / Fit for Duty - Clinic Reporting Form</span>
                                    
                                    <input type="hidden" name="employer_id" value="<?php echo $this->uri->segment(3);?>">
                                    <input type="hidden" name="clinic_id" value="<?php echo $this->session->userdata('user_id')?>">
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Employer (email directed) <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select name="employer_email_directed" class="form-control col-md-7 col-xs-12" required>
                                                <option value="">Choose</option>
                                                <option value="City of Rapid City">City of Rapid City</option>
                                                <option value="Pate Lien & Sons">Pate Lien & Sons</option>
                                                <option value="Servall">Servall</option>
                                                <option value="Croell Redi-Mix">Croell Redi-Mix</option>
                                                <option value="Option 5">Option 5</option>
                                                <option value="Option 6">Option 6</option>
                                            </select>
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Date reported to your office <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="datepicker2" class="form-control col-md-7 col-xs-12" name="date_reported" placeholder="Date reported to your office" required="required" type="text">
                                        </div>

                                    </div>
                                    
<!--
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Employee # <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" name="employee_no" placeholder="Enter Employee #" required="required" type="text">
                                        </div>

                                    </div>
-->
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Initials of Employee<span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" name="employee_initials" placeholder="Initials of Employee" required="required" type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Year of Birth <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="datepicker1" class="form-control col-md-7 col-xs-12" name="dob" placeholder="Year of Birth" required="required" type="text">
                                        </div>

                                    </div>

                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Limitations - Lift from the waist<span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="lift_waist" value="0-10#"> 0-10# <br>
                                            <input type="radio" name="lift_waist" value="11-20#"> 11-20#<br>
                                            <input type="radio" name="lift_waist" value="21-30#"> 21-30#<br>
                                            <input type="radio" name="lift_waist" value="31-40#"> 31-40#<br>
                                            <input type="radio" name="lift_waist" value="41-50#"> 41-50#<br>
                                            <input type="radio" name="lift_waist" value="50+#"> 50+#
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Limitations - Lift at shoulder level <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="lift_at_shoulder" value="0-10#"> 0-10# <br>
                                            <input type="radio" name="lift_at_shoulder" value="11-20#"> 11-20#<br>
                                            <input type="radio" name="lift_at_shoulder" value="21-30#"> 21-30#<br>
                                            <input type="radio" name="lift_at_shoulder" value="31-40#"> 31-40#<br>
                                            <input type="radio" name="lift_at_shoulder" value="41-50#"> 41-50#<br>
                                            <input type="radio" name="lift_at_shoulder" value="50+#"> 50+#
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Limitations - Lift above shoulder level  <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="lift_above_shoulder" value="0-10#"> 0-10# <br>
                                            <input type="radio" name="lift_above_shoulder" value="11-20#"> 11-20#<br>
                                            <input type="radio" name="lift_above_shoulder" value="21-30#"> 21-30#<br>
                                            <input type="radio" name="lift_above_shoulder" value="31-40#"> 31-40#<br>
                                            <input type="radio" name="lift_above_shoulder" value="41-50#"> 41-50#<br>
                                            <input type="radio" name="lift_above_shoulder" value="50+#"> 50+#
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Limitations - Lift from the knee level <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="lift_knee" value="0-10#"> 0-10# <br>
                                            <input type="radio" name="lift_knee" value="11-20#"> 11-20#<br>
                                            <input type="radio" name="lift_knee" value="21-30#"> 21-30#<br>
                                            <input type="radio" name="lift_knee" value="31-40#"> 31-40#<br>
                                            <input type="radio" name="lift_knee" value="41-50#"> 41-50#<br>
                                            <input type="radio" name="lift_knee" value="50+#"> 50+#
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Limitations - Lift from the floor level <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="lift_floor" value="0-10#"> 0-10# <br>
                                            <input type="radio" name="lift_floor" value="11-20#"> 11-20#<br>
                                            <input type="radio" name="lift_floor" value="21-30#"> 21-30#<br>
                                            <input type="radio" name="lift_floor" value="31-40#"> 31-40#<br>
                                            <input type="radio" name="lift_floor" value="41-50#"> 41-50#<br>
                                            <input type="radio" name="lift_floor" value="50+#"> 50+#
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Limitations to sitting <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="sitting" value="no limitations"> no limitations <br>
                                            <input type="radio" name="sitting" value="vary sitting"> vary sitting and standing in 20 minute increments
                                        </div>
                                    </div>

<!--                                     <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Category of physical capacity <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="provider" value="yes"> Category I <br>
                                            <input type="radio" name="provider" value="yes"> Category II<br>
                                            <input type="radio" name="provider" value="yes"> Category III<br>
                                            <input type="radio" name="provider" value="yes"> Category IV<br>
                                            <input type="radio" name="provider" value="yes"> Category V<br>
                                            <input type="radio" name="provider" value="yes"> Category VI
                                        </div>
                                    </div> -->
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Is the prospect employee fit for duty <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="fit_for_duty" value="yes"> Yes, Fit for Duty <br>
                                            <input type="radio" name="fit_for_duty" value="yes"> Medical Hold (24 hour)<br>
                                            <input type="radio" name="fit_for_duty" value="yes"> Physical capacity not met
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Time<span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input min="1" max="12" class="form-control col-md-7 col-xs-12" name="timing1" required="required" type="number" style="width: 88px;" autocomplete="off" placeholder="Hours">
                                            <input min="0" max="60" class="form-control col-md-7 col-xs-12" name="timing2" required="required" type="number" style="width: 88px;" autocomplete="off" placeholder="Minutes">
                                            <select name="timing3" class="form-control col-md-7 col-xs-12" style="width: 88px;">
                                                <option value="AM">AM</option>
                                                <option value="PM">PM</option>
                                            </select>
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Drug Test <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select name="drug_test" class="form-control col-md-7 col-xs-12" required>
                                                <option value="">Choose</option>
                                                <option value="Non-positive">Non-positive</option>
                                                <option value="Positive Drug Screen">Positive Drug Screen</option>
                                                <option value="Not Tested at our facility">Not Tested at our facility</option>
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

    <script type="text/javascript">
        $(document).ready(function () {

            var maxField = 6; //Input fields increment limitation

            var addButton = $('.add_button'); //Add button selector

            var wrapper = $('.field_wrapper'); //Input field wrapper

            var fieldHTML = '<div><input type="text" name="extra_field[]" placeholder="Enter extra package" class="extra_field" /><a href="javascript:void(0);" class="remove_button" title="Remove field"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></div>'; //New input field html 

            var x = 1; //Initial field counter is 1

            $(addButton).click(function () { //Once add button is clicked

                if (x < maxField) { //Check maximum number of input fields

                    x++; //Increment field counter

                    $(wrapper).append(fieldHTML); // Add field html

                }

            });

            $(wrapper).on('click', '.remove_button', function (e) { //Once remove button is clicked

                e.preventDefault();

                $(this).parent('div').remove(); //Remove field html

                x--; //Decrement field counter

            });

        });
    </script>

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

    <!-- validator -->

    <script>
        // initialize the validator function

        validator.message.date = 'not a real date';
        // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':

        $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);
        $('.multi.required').on('keyup blur', 'input', function () {
            validator.checkField.apply($(this).siblings().last()[0]);
        });

        $('form').submit(function (e) {

            e.preventDefault();
            var submit = true;
            // evaluate the form using generic validaing

            if (!validator.checkAll($(this))) {
                submit = false;
            }
            
            if (submit)
                this.submit();
                return false;
        });
    </script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $(function () {
            $("#datepicker").datepicker();
            $('#datepicker1').datepicker({
                changeYear: true,
                showButtonPanel: true,
                dateFormat: 'yy-mm-dd',
                onClose: function(dateText, inst) { 
                    var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                    $(this).datepicker('setDate', new Date(year, 1));
                }
            });
        $(".date-picker-year").focus(function () {
            $(".ui-datepicker-month").hide();
        });
            
            $("#datepicker2").datepicker({
                 dateFormat: 'yy-mm-dd',
            });
            $("#datepicker3").datepicker({
                 dateFormat: 'yy-mm-dd',
            });
            $("#datepicker4").datepicker({
                 dateFormat: 'yy-mm-dd',
            });
        });
    </script>

    <!-- /validator -->