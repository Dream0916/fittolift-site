<div class="right_col" role="main">

    <div class="">

        <div class="page-title">

            <div class="title_left">

                <h3>General POET / Fit for Duty</h3>

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

                                <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/insert_general_poet">

                                    <span class="section">General POET / Fit4D - Clinic Reporting Form</span>
                                    
                                    <input type="hidden" name="clinic_id" value="<?php echo $this->session->userdata('user_id')?>">
                                    <input type="hidden" name="employer_id" value="<?php echo $this->uri->segment(3);?>">
                                    <input type="hidden" name="emp_email" value="<?php echo $emp_data[0]['email'];;?>">
                                    
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

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_no">Employee Number <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="employee_no" class="form-control col-md-7 col-xs-12" name="employee_no" placeholder="Enter Employee #" required="required" type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" > Date reported to your office  <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="datepicker4" class="form-control col-md-7 col-xs-12" name="date_reported" placeholder="Date reported to your office" required="required" type="text">
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

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Physical Demand Level: (cardiovascular) <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" class="demand" name="physical_demand" value="1-1.5 Sedentary">1-1.5 Sedentary <br>
                                            <input type="radio" class="demand" name="physical_demand" value="2-3 Light">2-3 Light <br>
                                            <input type="radio" class="demand" name="physical_demand" value="3.5-5.5 Medium">3.5-5.5 Medium <br>
                                            <input type="radio" class="demand" name="physical_demand" value="6-7.5 Medium-Heavy">6-7.5 Medium-Heavy <br>
                                            <input type="radio" class="demand" name="physical_demand" value="8-9 Heavy">8-9 Heavy <br>
                                            <input type="radio" class="demand" name="physical_demand" value="9+ Very Heavy">9+ Very Heavy<br>
                                            <input type="radio" name="physical_demand" id="other_physical_demand" value="Other"> Other : 
                                            <input  class="form-control col-md-7 col-xs-12" id="other_physical_demand_field" name="other_physical_demand_field" type="text" style="width:85%;float:right;">
                                        </div>
                                    </div>
                                    
                                                                        <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Lift from the waist up to:<span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" class="waist_up_to" name="waist_lift" value="0-10#"> 0-10# <br>
                                            <input type="radio" class="waist_up_to" name="waist_lift" value="11-20#"> 11-20#<br>
                                            <input type="radio" class="waist_up_to" name="waist_lift" value="21-30#"> 21-30#<br>
                                            <input type="radio" class="waist_up_to" name="waist_lift" value="31-40#"> 31-40#<br>
                                            <input type="radio" class="waist_up_to" name="waist_lift" value="41-50#"> 41-50#<br>
                                            <input type="radio" class="waist_up_to" name="waist_lift" value="50-60#"> 50-60#<br>
                                            <input type="radio" class="waist_up_to" name="waist_lift" value="60-70#"> 60-70#<br>
                                            <input type="radio" class="waist_up_to" name="waist_lift" value="70-80#"> 70-80#<br>
                                            <input type="radio" class="waist_up_to" name="waist_lift" value="80-90#"> 80-90#<br>
                                            <input type="radio" class="waist_up_to" name="waist_lift" value="100+#"> 100+#<br>
                                            <input type="radio" name="waist_lift" id="other_waist_up_to" value="Other"> Other : 
                                            <input  class="form-control col-md-7 col-xs-12" id="other_waist_up_field" name="other_waist_up_field" type="text" style="width:85%;float:right;">
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Lift at shoulder level up to:<span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" class="shoulder_level" name="shoulder_lift" value="0-10#"> 0-10# <br>
                                            <input type="radio" class="shoulder_level" name="shoulder_lift" value="11-20#"> 11-20#<br>
                                            <input type="radio" class="shoulder_level" name="shoulder_lift" value="21-30#"> 21-30#<br>
                                            <input type="radio" class="shoulder_level" name="shoulder_lift" value="31-40#"> 31-40#<br>
                                            <input type="radio" class="shoulder_level" name="shoulder_lift" value="41-50#"> 41-50#<br>
                                            <input type="radio" class="shoulder_level" name="shoulder_lift" value="50-60#"> 50-60#<br>
                                            <input type="radio" class="shoulder_level" name="shoulder_lift" value="60-70#"> 60-70#<br>
                                            <input type="radio" class="shoulder_level" name="shoulder_lift" value="70-80#"> 70-80#<br>
                                            <input type="radio" class="shoulder_level" name="shoulder_lift" value="80-90#"> 80-90#<br>
                                            <input type="radio" class="shoulder_level" name="shoulder_lift" value="100+#"> 100+#<br>
                                            <input type="radio" name="shoulder_lift" id="other_shoulder_lift" value="Other"> Other : 
                                            <input  class="form-control col-md-7 col-xs-12" id="other_shoulder_lift_field" name="other_shoulder_lift_field" type="text" style="width:85%;float:right;">
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Lift above shoulder level up to:<span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" class="above_shoulder" name="shoulder_level" value="0-10#"> 0-10# <br>
                                            <input type="radio" class="above_shoulder" name="shoulder_level" value="11-20#"> 11-20#<br>
                                            <input type="radio" class="above_shoulder" name="shoulder_level" value="21-30#"> 21-30#<br>
                                            <input type="radio" class="above_shoulder" name="shoulder_level" value="31-40#"> 31-40#<br>
                                            <input type="radio" class="above_shoulder" name="shoulder_level" value="41-50#"> 41-50#<br>
                                            <input type="radio" class="above_shoulder" name="shoulder_level" value="50-60#"> 50-60#<br>
                                            <input type="radio" class="above_shoulder" name="shoulder_level" value="60-70#"> 60-70#<br>
                                            <input type="radio" class="above_shoulder" name="shoulder_level" value="70-80#"> 70-80#<br>
                                             <input type="radio" class="above_shoulder" name="shoulder_level" value="100+#"> 100+#<br>
                                            <input type="radio" name="shoulder_level" id="other_shoulder_level" value="Other"> Other : 
                                            <input  class="form-control col-md-7 col-xs-12" id="other_shoulder_level_field" name="other_shoulder_level_field" type="text" style="width:85%;float:right;">
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Lift from the knee level up to:<span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" class="knee_lift" name="knee_lift" value="0-10#"> 0-10# <br>
                                            <input type="radio" class="knee_lift" name="knee_lift" value="11-20#"> 11-20#<br>
                                            <input type="radio" class="knee_lift" name="knee_lift" value="21-30#"> 21-30#<br>
                                            <input type="radio" class="knee_lift" name="knee_lift" value="31-40#"> 31-40#<br>
                                            <input type="radio" class="knee_lift" name="knee_lift" value="41-50#"> 41-50#<br>
                                            <input type="radio" class="knee_lift" name="knee_lift" value="50-60#"> 50-60#<br>
                                            <input type="radio" class="knee_lift" name="knee_lift" value="60-70#"> 60-70#<br>
                                            <input type="radio" class="knee_lift" name="knee_lift" value="70-80#"> 70-80#<br>
                                             <input type="radio" class="knee_lift" name="knee_lift" value="100+#"> 100+#<br>
                                            <input type="radio" name="knee_lift" id="other_knee_lift" value="Other"> Other : 
                                            <input  class="form-control col-md-7 col-xs-12" id="other_knee_lift_field" name="other_knee_lift_field" type="text" style="width:85%;float:right;">
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Lift from the floor level up to:<span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" class="floor_lift" name="floor_lift" value="0-10#"> 0-10# <br>
                                            <input type="radio" class="floor_lift" name="floor_lift" value="11-20#"> 11-20#<br>
                                            <input type="radio" class="floor_lift" name="floor_lift" value="21-30#"> 21-30#<br>
                                            <input type="radio" class="floor_lift" name="floor_lift" value="31-40#"> 31-40#<br>
                                            <input type="radio" class="floor_lift" name="floor_lift" value="41-50#"> 41-50#<br>
                                            <input type="radio" class="floor_lift" name="floor_lift" value="50-60#"> 50-60#<br>
                                            <input type="radio" class="floor_lift" name="floor_lift" value="60-70#"> 60-70#<br>
                                            <input type="radio" class="floor_lift" name="floor_lift" value="70-80#"> 70-80#<br>
                                            <input type="radio" class="floor_lift" name="floor_lift" value="100+#"> 100+#<br>
                                            <input type="radio" name="floor_lift" id="other_floor_lift" value="Other"> Other : 
                                            <input  class="form-control col-md-7 col-xs-12" id="other_floor_lift_field" name="other_floor_lift_field" type="text" style="width:85%;float:right;">
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" > Sitting and Standing <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" class="sitting" name="sitting" value="No climbing"> No Sitting Limits<br>
                                            <input type="radio" class="sitting" name="sitting" value="vary sitting and standing in 30 minute increments"> Vary sitting and standing in 30 minute increments<br>
                                            <input type="radio" class="sitting" name="sitting" value="vary sitting and standing in 1 hour inrements"> Vary sitting and standing in 1 hour inrements<br>
                                            <input type="radio" name="sitting" id="other_sitting" value="Other"> Other : 
                                            <input  class="form-control col-md-7 col-xs-12" id="other_sitting_field" name="other_sitting_field" type="text" style="width:85%;float:right;">
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" > Climbing <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" class="climbing" name="climbing" value="No climbing"> No climbing<br>
                                            <input type="radio" class="climbing" name="climbing" value="Occasional 1-3 hrs a day"> Occasional 1-3 hrs a day<br>
                                            <input type="radio" class="climbing" name="climbing" value="Frequent 3-5 hrs a day"> Frequent 3-5 hrs a day<br>
                                            <input type="radio" class="climbing" name="climbing" value="Constant 6-8 hrs a day"> Constant 6-8 hrs a day<br>
                                            <input type="radio" name="climbing" id="other_climbing" value="Other"> Other : 
                                            <input  class="form-control col-md-7 col-xs-12" id="other_climbing_field" name="other_climbing_field" type="text" style="width:85%;float:right;">
                                                                                                                   
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" > Is the individual physcially fit for duty? <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" class="duty" name="duty" value="Yes, Fit for Duty"> Yes, Fit for Duty <br>
                                            <input type="radio" class="duty" name="duty" value="Medical Hold (24 hour)"> Medical Hold (24 hour)<br>
                                            <input type="radio" class="duty" name="duty" value="Not Fit for Duty"> Not Fit for Duty<br>
                                            <input type="radio" class="duty" name="duty" value="Modified Duty (NEEDS A TEXT BOX)"> Modified Duty (NEEDS A TEXT BOX)<br>
                                            <input type="radio" name="duty" id="other_duty" value="Other"> Other : 
                                            <input  class="form-control col-md-7 col-xs-12" id="other_duty_field" name="other_duty_field" type="text" style="width:85%;float:right;">
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Medical DOT with expiration<span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="dot" id="if_yes_dot" value="Yes"> Yes<br>
                                            <span id="exp" style="vertical-align: -webkit-baseline-middle;">Expiration date:</span><input  class="form-control col-md-7 col-xs-12" id="yes_dot" placeholder="dd/mm/yyyy" maxlength="8" name="yes_dot" type="text" style="width:80%;float:right;">
                                            
                                            <input type="radio" class="dot" name="dot" value="Not"> No
                                            <div id="else" style="margin-left: 25px;">
                                                <label style="padding-top: 0;" class="control-label" >Was it perform somewhere else</label><br>
                                            
                                                <input type="radio" name="dot" id="yes_other_dot" value="Yes1"> Yes, not performed at our office<br id="br1">
                                                <span id="other_span" style="vertical-align: -webkit-baseline-middle;margin-left: 15px;">OTHER DATE:</span><input  class="form-control col-md-7 col-xs-12" id="other_dot_date" placeholder="dd/mm/yyyy" maxlength="8" name="other_dot_date" type="text" style="width:76%;float:right;"><br id="br2"><br id="br3">
                                            
                                                <input type="radio" name="dot" id="no_other_dot" value="No"> No, may not be required<br>
                                                <span id="other_span2" style="vertical-align: -webkit-baseline-middle;margin-left: 15px;">OTHER:</span><input  class="form-control col-md-7 col-xs-12" id="other_dot_field" name="other_dot_field" type="text" style="width:76%;float:right;">
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Evaluating doctor's name <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="doctor_name" class="form-control col-md-7 col-xs-12" name="doctor_name" placeholder="Evaluating doctor's name" required="required" type="text">
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
            $("#datepicker2").datepicker({ changeMonth: true, changeYear: true,dateFormat: "yy-mm-dd" });
            $("#datepicker3").datepicker({ changeMonth: true, changeYear: true,dateFormat: "yy-mm-dd" });
            $("#datepicker4").datepicker({ changeMonth: true, changeYear: true,dateFormat: "yy-mm-dd" });
            $("#yes_dot").datepicker({ changeMonth: true, changeYear: true,dateFormat: "yy-mm-dd" });
            $("#other_dot_date").datepicker({ changeMonth: true, changeYear: true,dateFormat: "yy-mm-dd" });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {

            $("#other_nature_field").hide();
            $("#other_waist_up_field").hide();
            $("#other_physical_demand_field").hide();
            $("#other_shoulder_level_field").hide();
            $("#other_shoulder_lift_field").hide();
            $("#other_knee_lift_field").hide();
            $("#other_floor_lift_field").hide();
            $("#other_grip_restrictions_field").hide();
            $("#other_sitting_field").hide();
            $("#other_climbing_field").hide();
            $("#other_duty_field").hide();
            $("#yes_dot").hide();
            $("#exp").hide();
            $("#else").hide();
            $("#other_dot_date").hide();
            $("#other_dot_field").hide();
            $("#other_span").hide();
            $("#other_span2").hide();
            $("#br1").hide();
            $("#br2").hide();
            $("#br3").hide();
            
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
            
            $("#other_physical_demand").click(function () {
                $("#other_physical_demand_field").show();
            });
            $(".demand").click(function () {
                $("#other_physical_demand_field").hide();
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
            
            $("#other_sitting").click(function () {
                $("#other_sitting_field").show();
            });
            $(".sitting").click(function () {
                $("#other_sitting_field").hide();
            });
            
            $("#other_climbing").click(function () {
                $("#other_climbing_field").show();
            });
            $(".climbing").click(function () {
                $("#other_climbing_field").hide();
            });
            
            $("#other_duty").click(function () {
                $("#other_duty_field").show();
            });
            $(".duty").click(function () {
                $("#other_duty_field").hide();
            });
            
            $("#if_yes_dot").click(function () {
                $("#yes_dot").show();
                $("#exp").show();
                $("#else").hide();
                $("#other_dot_date").val('');
                $("#other_dot_field").val('');
            });
            $(".dot").click(function () {
                $("#yes_dot").hide();
                $("#exp").hide();
                $("#else").show();
                $("#br1").show();
                $("#yes_dot").val('');
            });
            
            $("#yes_other_dot").click(function () {
                $("#other_dot_date").show();
                $("#other_span").show();
                $("#other_dot_field").hide();
                $("#other_span2").hide();
                $("#br1").show();
                $("#br2").show();
                $("#br3").show();
                $("#other_dot_field").val('');
            });
            $("#no_other_dot").click(function () {
                $("#other_dot_field").show();
                $("#other_span2").show();
                $("#other_dot_date").hide();
                $("#other_span").hide();
                $("#br1").show();
                $("#br2").hide();
                $("#br3").hide();
                $("#other_dot_date").val('');
            });
            
            
            
//            var format = "mm/dd/yyyy";
//            var match = new RegExp(format
//                .replace(/(\w+)\W(\w+)\W(\w+)/, "^\\s*($1)\\W*($2)?\\W*($3)?([0-9]*).*")
//                .replace(/m|d|y/g, "\\d"));
//            var replace = "$1/$2/$3$4"
//                .replace(/\//g, format.match(/\W/));
//
//            function doFormat(target)
//            {
//                target.value = target.value
//                    .replace(/(^|\W)(?=\d\W)/g, "$10")   // padding
//                    .replace(match, replace)             // fields
//                    .replace(/(\W)+/g, "$1");            // remove repeats
//            }
//
//            $("input[name='yes_dot']:first").keyup(function(e) {
//               if(!e.ctrlKey && !e.metaKey && (e.keyCode == 32 || e.keyCode > 46))
//                  doFormat(e.target)
//            });
            
            
        });    
    </script>
                                    