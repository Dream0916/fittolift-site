<div class="right_col" role="main">

    <div class="">

        <div class="page-title">

            <div class="title_left">

                <h3>General Employer Injury Report</h3>

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

                                    <span class="section">General Employer Injury Report : Clinical Injury Reporting Form</span>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Employer (email directed) <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control col-md-7 col-xs-12" required>
                                                <option value="">Choose</option>
                                                <option value="City of Rapid City">City of Rapid City</option>
                                                <option value="Pate Lien & Sons">Pate Lien & Sons</option>
                                                <option value="Servall">Servall</option>
                                                <option value="Croell Redi-Mix">Croell Redi-Mix</option>
                                                <option value="Option 5">Option 5</option>
                                                <option value="Option 6">Option 6</option>
                                                <option value="Option 7">Option 7</option>
                                            </select>
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Employee # <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" name="title" placeholder="Enter Employee #" required="required" type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Male / Female <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="gender" value="male"> Male
                                            <input type="radio" name="gender" value="female"> Female
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Year of Birth <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="datepicker1" class="form-control col-md-7 col-xs-12" name="title" placeholder="Year of Birth" required="required" type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Date of Alleged Loss/Incident  <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="datepicker" class="form-control col-md-7 col-xs-12" name="title" placeholder="Date of Alleged Loss/Incident" required="required" type="text">
                                        </div>

                                    </div>

                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Type of Office Visit <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="provider" value="yes"> Initial Injury Examination <br>
                                            <input type="radio" name="provider" value="yes"> Progress Examination<br>
                                            <input type="radio" name="provider" value="yes"> Release Examination
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Day of Loss/Incident <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control col-md-7 col-xs-12" required>
                                                <option value="">Choose</option>
                                                <option value="Monday">Monday</option>
                                                <option value="Tuesday">Tuesday</option>
                                                <option value="Wednesday">Wednesday</option>
                                                <option value="Thursday">Thursday</option>
                                                <option value="Friday">Friday</option>
                                                <option value="Saturday">Saturday</option>
                                                <option value="Sunday">Sunday</option>
                                            </select>
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Is the prospect employee fit for duty <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="provider" value="yes"> Yes <br>
                                            <input type="radio" name="provider" value="yes"> Yes with Limitations/Modification<br>
                                            <input type="radio" name="provider" value="yes"> not fit for duty
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Expected return for work date <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="datepicker2" class="form-control col-md-7 col-xs-12" name="title" placeholder="Expected return for work date" required="required" type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Type of Visit <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="provider" value="yes"> Initial Examination <br>
                                            <input type="radio" name="provider" value="yes"> Progress Examination<br>
                                            <input type="radio" name="provider" value="yes"> Release Examination
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Date of next evaluation <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="datepicker3" class="form-control col-md-7 col-xs-12" name="title" placeholder="Date of next evaluation" required="required" type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Department Name (Customize) <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" name="title" placeholder="Department Name" required="required" type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Time reported to office<span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12" name="title" required="required" type="number" style="width: 88px;" autocomplete="off" placeholder="Hours">
                                            <input class="form-control col-md-7 col-xs-12" name="title" required="required" type="number" style="width: 88px;" autocomplete="off" placeholder="Minutes">
                                            <select class="form-control col-md-7 col-xs-12" style="width: 88px;">
                                                <option value="AM">AM</option>
                                                <option value="PM">PM</option>
                                            </select>
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Date reported to your office  <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="datepicker4" class="form-control col-md-7 col-xs-12" name="title" placeholder="Date of next evaluation" required="required" type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Were you the 1st provider seen? <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="gender" value="Yes"> Yes
                                            <input type="radio" name="gender" value="No"> No
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Nature of the Injury <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="provider" value="yes"> Strain / Sprain <br>
                                            <input type="radio" name="provider" value="yes"> Contusion<br>
                                            <input type="radio" name="provider" value="yes"> Fracture<br>
                                            <input type="radio" name="provider" value="yes"> Other : 
                                            <input id="datepicker4" class="form-control col-md-7 col-xs-12" name="title" required="required" type="text" style="width:85%;float:right;">
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Cause of the Injury (slip, collision, lift, push, pull, etc.) <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" name="title" placeholder="Cause of the Injury" required="required" type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Body Part Involved<span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="checkbox" name="provider" value="yes"> neck <br>
                                            <input type="checkbox" name="provider" value="mid back"> mid back<br>
                                            <input type="checkbox" name="provider" value="low back"> low back<br>
                                            <input type="checkbox" name="provider" value="upper extremity"> upper extremity<br>
                                            <input type="checkbox" name="provider" neck="lower extremity"> lower extremity 
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Alleged Incident Description <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" name="title" placeholder="Alleged Incident Description" required="required" type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Limitations - Lift from the waist<span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="provider" value="0-10#"> 0-10# <br>
                                            <input type="radio" name="provider" value="11-20#"> 11-20#<br>
                                            <input type="radio" name="provider" value="21-30#"> 21-30#<br>
                                            <input type="radio" name="provider" value="31-40#"> 31-40#<br>
                                            <input type="radio" name="provider" value="41-50#"> 41-50#<br>
                                            <input type="radio" name="provider" value="50+#"> 50+#
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Limitations - Lift at shoulder level <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="provider" value="0-10#"> 0-10# <br>
                                            <input type="radio" name="provider" value="11-20#"> 11-20#<br>
                                            <input type="radio" name="provider" value="21-30#"> 21-30#<br>
                                            <input type="radio" name="provider" value="31-40#"> 31-40#<br>
                                            <input type="radio" name="provider" value="41-50#"> 41-50#<br>
                                            <input type="radio" name="provider" value="50+#"> 50+#
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Limitations - Lift above shoulder level  <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="provider" value="0-10#"> 0-10# <br>
                                            <input type="radio" name="provider" value="11-20#"> 11-20#<br>
                                            <input type="radio" name="provider" value="21-30#"> 21-30#<br>
                                            <input type="radio" name="provider" value="31-40#"> 31-40#<br>
                                            <input type="radio" name="provider" value="41-50#"> 41-50#<br>
                                            <input type="radio" name="provider" value="50+#"> 50+#
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Limitations - Lift from the knee level <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="provider" value="0-10#"> 0-10# <br>
                                            <input type="radio" name="provider" value="11-20#"> 11-20#<br>
                                            <input type="radio" name="provider" value="21-30#"> 21-30#<br>
                                            <input type="radio" name="provider" value="31-40#"> 31-40#<br>
                                            <input type="radio" name="provider" value="41-50#"> 41-50#<br>
                                            <input type="radio" name="provider" value="50+#"> 50+#
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Limitations - Lift from the floor level <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="provider" value="0-10#"> 0-10# <br>
                                            <input type="radio" name="provider" value="11-20#"> 11-20#<br>
                                            <input type="radio" name="provider" value="21-30#"> 21-30#<br>
                                            <input type="radio" name="provider" value="31-40#"> 31-40#<br>
                                            <input type="radio" name="provider" value="41-50#"> 41-50#<br>
                                            <input type="radio" name="provider" value="50+#"> 50+#
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Limitations to sitting <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="provider" value="no limitations"> no limitations <br>
                                            <input type="radio" name="provider" value="vary sitting"> vary sitting and standing in 20 minute increments
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Written Job description reviewed (Customizable) <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" name="title" placeholder="Written Job description reviewed" required="required" type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Evaluating doctor's name <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" name="title" placeholder="Evaluating doctor's name" required="required" type="text">
                                        </div>

                                    </div>

                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Drug Test <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control col-md-7 col-xs-12" required>
                                                <option value="">Choose</option>
                                                <option value="Pending Lab Results for confirmation of non-negative">Pending Lab Results for confirmation of non-negative</option>
                                                <option value="Pending DOT Lab Results">Pending DOT Lab Results</option>
                                                <option value="Not Tested in our facility">Not Tested in our facility</option>
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

<!--
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
-->

    <script>
        $(function () {
            $("#datepicker").datepicker();
            $('#datepicker1').datepicker({
                changeYear: true,
                showButtonPanel: true,
                dateFormat: 'yy',
                onClose: function(dateText, inst) { 
                    var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                    $(this).datepicker('setDate', new Date(year, 1));
                }
            });
        $(".date-picker-year").focus(function () {
            $(".ui-datepicker-month").hide();
        });
            $("#datepicker2").datepicker();
            $("#datepicker3").datepicker();
            $("#datepicker4").datepicker();
        });
    </script>

    <!-- /validator -->