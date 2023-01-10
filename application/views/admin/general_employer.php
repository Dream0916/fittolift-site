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

                            <?php } 
                        
                                $emp_data=$this->Admin_model->employer_by_id($this->uri->segment(3));
                                $clinic_data=$this->Admin_model->get_assigned_clinic_data($this->session->userdata('user_id'));
                            ?>

                                <!--form strat-->

                                <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/insert_general_employer">

                                    <span class="section">General Employer Injury Report : Clinical Injury Reporting Form</span>
                                    
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

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" > Male / Female <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="gender" value="Male"> Male
                                            <input type="radio" name="gender" value="Female"> Female
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" > Date of Birth <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="datepicker6" class="form-control col-md-7 col-xs-12" name="dob" placeholder="Date of Birth" required="required" type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" > Type of Office Visit <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="office_visit" value="Initial Injury Examination"> Initial Injury Examination <br>
                                            <input type="radio" name="office_visit" value="Progress Examination"> Progress Examination<br>
                                            <input type="radio" name="office_visit" value="Release Examination"> Release Examination
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Written Job description reviewed<span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" name="job_desc" placeholder="Written Job description reviewed" required="required" type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" > Date of Inujury Loss/Incident  <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="datepicker" class="form-control col-md-7 col-xs-12" name="injury_date" placeholder="Date of Inujury Loss/Incident" required="required" type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >DOI : Time of Day<span class="required"></span></label>

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

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" > DOI : Day of the Week <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control col-md-7 col-xs-12" name="loss_day" required>
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

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" > Expected return for work date <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="datepicker2" class="form-control col-md-7 col-xs-12" name="return_date" placeholder="Expected return for work date" required="required" type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" > Date of next evaluation <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="datepicker3" class="form-control col-md-7 col-xs-12" name="next_eval" placeholder="Date of next evaluation" required="required" type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" > Were you the 1st provider seen? <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="provider_seen" value="Yes"> Yes
                                            <input type="radio" name="provider_seen" value="No"> No
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" > Was Treatment Required?<span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="treatment" value="Yes"> Yes
                                            <input type="radio" name="treatment" value="No"> No
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" > Was First Aid Required?<span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="first_aid" value="Yes"> Yes
                                            <input type="radio" name="first_aid" value="No"> No
                                        </div>
                                    </div>
                                        
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Refered out of your office, to whom and for what:<span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input class="form-control col-md-7 col-xs-12" name="refered_out" placeholder="Refered out of your office" required="required" type="text">
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

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Time reported to office<span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input min="1" max="12" class="form-control col-md-7 col-xs-12" name="time_reported1" required="required" type="number" style="width: 88px;" autocomplete="off" placeholder="Hours">
                                            <input min="0" max="60" class="form-control col-md-7 col-xs-12" name="time_reported2" required="required" type="number" style="width: 88px;" autocomplete="off" placeholder="Minutes">
                                            <select class="form-control col-md-7 col-xs-12" name="time_reported3" style="width: 88px;">
                                                <option value="AM">AM</option>
                                                <option value="PM">PM</option>
                                            </select>
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" > 
Date reported to your office (current examination date) <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="datepicker4" class="form-control col-md-7 col-xs-12" name="date_dc" placeholder="Date reported to your office" required="required" type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" > Nature of the Injury <span class="required"></span></label>
                                        
                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" class="nature1" name="injury_nature" value="Sprain"> Sprain<br>
                                            <input type="radio" class="nature1" name="injury_nature" value="Strain"> Strain <br>
                                            <input type="radio" class="nature1" name="injury_nature" value="Contusion"> Contusion<br>
                                            <input type="radio" class="nature1" name="injury_nature" value="Fracture"> Fracture<br>
                                            <input type="radio" class="nature1" name="injury_nature" value="Dislocation"> Dislocation<br>
                                            <input type="radio" class="nature1" name="injury_nature" value="Crushing"> Crushing<br>
                                            <input type="radio" name="injury_nature" id="other_nature" value="Other"> Other : 
                                            <input  class="form-control col-md-7 col-xs-12" id="other_nature_field" name="other_nature" type="text" style="width:85%;float:right;">
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" > Cause of the Injury <span class="required"></span></label>
                                        
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control col-md-7 col-xs-12" name="injury_cause" required>
                                                <option value="">Choose</option>
                                                <option value="slip">slip</option>
                                                <option value="Fall">Fall</option>
                                                <option value="Lift">Lift</option>
                                                <option value="Push">Push</option>
                                                <option value="Pull">Pull</option>
                                            </select>
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Area of body Injured<span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="checkbox" name="area_injured[]" value="arm/albow/wrist"> arm/albow/wrist <br>
                                            <input type="checkbox" name="area_injured[]" value="neck"> neck <br>
                                            <input type="checkbox" name="area_injured[]" value="mid back / ribs"> mid back / ribs<br>
                                            <input type="checkbox" name="area_injured[]" value="low back"> low back<br>
                                            <input type="checkbox" name="area_injured[]" value="knee/leg/ankle"> knee/leg/ankle<br>
                                            <input type="checkbox" name="area_injured[]" value="upper extremity"> upper extremity<br>
                                            <input type="checkbox" name="area_injured[]" value="lower extremity"> lower extremity 
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Alleged Incident Description <span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
<!--                                            <input id="name" class="form-control col-md-7 col-xs-12" name="inc_desc" placeholder="Alleged Incident Description" required="required" type="text">-->
                                            <textarea class="form-control col-md-7 col-xs-12" name="inc_desc" ></textarea>
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
                                            <input type="radio" class="sitting" name="sitting" value="Vary sitting and standing in 30 minute increments"> Vary sitting and standing in 30 minute increments<br>
                                            <input type="radio" class="sitting" name="sitting" value="Vary sitting and standing in 1 hour inrements"> Vary sitting and standing in 1 hour inrements<br>
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
                                            <input type="radio" class="duty" name="duty" value="Modified Duty"> Modified Duty<br>
                                            <input type="radio" name="duty" id="other_duty" value="Other"> Other : 
                                            <input  class="form-control col-md-7 col-xs-12" id="other_duty_field" name="other_duty_field" type="text" style="width:85%;float:right;">
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Grip Restrictions<span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" class="grip_restrictions" name="grip_restrictions" value="0-10#"> 0-10# <br>
                                            <input type="radio" class="grip_restrictions" name="grip_restrictions" value="11-20#"> 11-20#<br>
                                            <input type="radio" class="grip_restrictions" name="grip_restrictions" value="21-30#"> 21-30#<br>
                                            <input type="radio" class="grip_restrictions" name="grip_restrictions" value="31-40#"> 31-40#<br>
                                            <input type="radio" class="grip_restrictions" name="grip_restrictions" value="41-50#"> 41-50#<br>
                                            <input type="radio" class="grip_restrictions" name="grip_restrictions" value="50-60#"> 50-60#<br>
                                            <input type="radio" class="grip_restrictions" name="grip_restrictions" value="60-70#"> 60-70#<br>
                                            <input type="radio" class="grip_restrictions" name="grip_restrictions" value="70-80#"> 70-80#<br>
                                             <input type="radio" class="grip_restrictions" name="grip_restrictions" value="100+#"> 100+#<br>
                                            <input type="radio" name="grip_restrictions" id="other_grip_restrictions" value="Other"> Other : 
                                            <input  class="form-control col-md-7 col-xs-12" id="other_grip_restrictions_field" name="other_grip_restrictions_field" type="text" style="width:85%;float:right;">
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Hand and Wrist use up to:<span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">
                                            <input type="radio" name="hand_wrist" value="Occasional 1-3 hrs a day"> Occasional (up to 1-3 hours)<br>
                                            <input type="radio" name="hand_wrist" value="Frequent (up to 4-5 hours)"> Frequent (up to 4-5 hours)<br>
                                            <input type="radio" name="hand_wrist" value=" No Restrictions">  No Restrictions
                                                                                                                   
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Department Number:<span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="dept_no" class="form-control col-md-7 col-xs-12" name="dept_no" placeholder="Department #" type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Department Manager:<span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="dept_manager" class="form-control col-md-7 col-xs-12" name="dept_manager" placeholder="Department Manager" type="text">
                                        </div>

                                    </div>
                                    
                                    <div class="item form-group">

                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Department Name:<span class="required"></span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="dept_name" class="form-control col-md-7 col-xs-12" name="dept_name" placeholder="Department Name" type="text">
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
        input[type="checkbox"] {
            vertical-align: middle;
            margin: 2px 0 0;
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
            $("#datepicker2").datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd" });
            $("#datepicker3").datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd" });
            $("#datepicker4").datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd" });
            $("#datepicker6").datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd" });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {

            $("#other_nature_field").hide();
            $("#other_waist_up_field").hide();
            $("#other_shoulder_level_field").hide();
            $("#other_shoulder_lift_field").hide();
            $("#other_knee_lift_field").hide();
            $("#other_floor_lift_field").hide();
            $("#other_grip_restrictions_field").hide();
            
            $("#other_sitting_field").hide();
            $("#other_climbing_field").hide();
            $("#other_duty_field").hide();
            
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
            
        });    
    </script>
                                                                        