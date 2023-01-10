<div class="right_col" role="main">

    <div class="">

        <div class="page-title">

            <div class="title_left">

                <h3>Category - POET / FfD</h3>

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
                        
                                $emp_data=$this->Admin_model->employer_by_id($this->uri->segment(3));
                                $clinic_data=$this->Admin_model->get_assigned_clinic_data($this->session->userdata('user_id'));
                            ?>

                                <!--form strat-->
                            
                                <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/insert_warf_form">
                                    
                                    <?php if($this->uri->segment(3)){?>
                                        <input type="hidden" name="employer_id" value="<?php echo $this->uri->segment(3);?>">
                                    <?php }else{ ?>
                                        <input type="hidden" name="employer_id" value="0">
                                    <?php } ?>
                                    
                                    <input type="hidden" name="clinic_id" value="<?php echo $this->session->userdata('user_id')?>">
                                    <input type="hidden" name="emp_email" value="<?php echo $emp_data[0]['email'];;?>">
                                    
                                    <span class="section">Category - POET / Fit for Duty - Clinic Reporting Form</span>
                                    
                                    
                                    <div class="item form-group">
                                        
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Employer Name <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input value="<?php echo $emp_data[0]['username'];?>" class="form-control col-md-7 col-xs-12" readonly type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group"> 
                                        
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Employer (email directed) <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12"> 
                                            <input  value="<?php echo $emp_data[0]['email'];?>" class="form-control col-md-7 col-xs-12" readonly type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group"> 
                                        
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Clinic Name <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12"> 
                                            <input  value="<?php echo $clinic_data[0]['clinic_name'];?>" class="form-control col-md-7 col-xs-12" readonly type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">
                                        
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Employer Location <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input name="emp_location" id="emp_location" type="text" class="form-control col-md-7 col-xs-12" placeholder="Choose Location" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Location'" autocomplete="on" runat="server" />

                                            <input type="hidden" id="emp_city" name="emp_city" />
                                            <input type="hidden" id="emp_country" name="emp_country" />
                                            
                                            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2aU4Xg-2W3ILRyqPplUtpvRpIzp3YIwU&libraries=places"></script>
                                            <script>
                                                function initialize1() {
                                                    var input = document.getElementById('emp_location');

                                                    var options = {
                                                        //types: ['(cities)'],
                                                        //componentRestrictions: {country: "pk"}
                                                    };

                                                    var autocomplete = new google.maps.places.Autocomplete(input, options);

                                                    google.maps.event.addListener(autocomplete, 'place_changed', function () {
                                                        var place = autocomplete.getPlace();

                                                        //document.getElementById('lat').value =  place.geometry.location.lat();
                                                        //document.getElementById('long').value = place.geometry.location.lng();

                                                        if (place.address_components[3]) {
                                                            document.getElementById('emp_country').value = place.address_components[3].long_name;
                                                        } else {
                                                            document.getElementById('emp_country').removeAttribute("value");
                                                        }

                                                        if (place.vicinity) {
                                                            document.getElementById('emp_city').value = place.vicinity;
                                                        } else {
                                                            document.getElementById('emp_city').value = place.address_components[0].long_name;
                                                        }
                                                        //console.log(place);

                                                    });
                                                }
                                                google.maps.event.addDomListener(window, 'load', initialize1);
                                            </script>
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Date reported to your office <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="datepicker" class="form-control col-md-7 col-xs-12" name="date_reported" placeholder="Date reported to your office" type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Employee # <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="employee_no" class="form-control col-md-7 col-xs-12" name="employee_no" placeholder="Enter Employee #" required="required" type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_name">First Name <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="first_name" class="form-control col-md-7 col-xs-12" name="first_name" placeholder="Enter First Name" required="required" type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_name">Last Name <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="last_name" class="form-control col-md-7 col-xs-12" name="last_name" placeholder="Enter Last Name" required="required" type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Initials of Employee<span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" name="initials" placeholder="Initials of Employee" required="required" type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" > Date of Birth <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="datepicker2" class="form-control col-md-7 col-xs-12" name="dob" placeholder="Date of Birth" required="required" type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" > Male / Female <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="gender" value="Male"> Male
                                            <input type="radio" name="gender" value="Female"> Female
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" > Type of Office Visit <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="office_visit" value="Post Offer Employment Test"> Post Offer Employment Test <br>
                                            <input type="radio" name="office_visit" value="Fit for Duty Evaluation"> Fit for Duty Evaluation
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Job description <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" name="job_desc" placeholder="Written Job description reviewed" required="required" type="text">
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
                                            <input type="radio" class="duty" name="duty" value="Yes, Fit for Duty"> Yes, Fit for Duty <br>
                                            <input type="radio" class="duty" name="duty" value="Medical Hold (24 hour)"> Medical Hold (24 hour)<br>
                                            <input type="radio" class="duty" name="duty" value="Physical capacity not met"> Physical capacity not met<br>
                                            <input type="radio" class="duty" name="duty" value="Modified Duty (Text Box Required)"> Modified Duty (Text Box Required)<br>
                                            <input type="radio" name="duty" id="other_climbing" value="Other"> Other : 
                                            <input  class="form-control col-md-7 col-xs-12" id="other_climbing_field" name="other_duty_field" type="text" style="width:85%;float:right;">
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
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Evaluator's name <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="doctor_name" class="form-control col-md-7 col-xs-12" name="doctor_name" placeholder="Evaluator's name" required="required" type="text">
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
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script type="text/javascript">
        $(function () {
            $("#datepicker").datepicker({ changeYear: true,dateFormat: "yy-mm-dd" });
            $('#datepicker1').datepicker({
                changeYear: true,
                showButtonPanel: true,
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
            
            $("#datepicker2").datepicker({ changeYear: true,dateFormat: "yy-mm-dd" });
        
        });
         
    </script>

    <script type="text/javascript">
        $(document).ready(function () {

            $("#other_climbing_field").hide();
            
            $("#other_climbing").click(function () {
                $("#other_climbing_field").show();
            });
            $(".duty").click(function () {
                $("#other_climbing_field").hide();
            });
            
        });    
    </script>

    <!-- /validator -->