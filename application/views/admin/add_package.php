<div class="right_col" role="main">



    <div class="">



        <div class="page-title">



            <div class="title_left">



                <h3>Add Clinic Platform</h3>



            </div>



        </div>



        <div class="clearfix"></div>



        <div class="row">



            <div class="col-md-12 col-sm-12 col-xs-12">



                <div class="x_panel">

               

                     <div class="x_content">

                     

                      <?php if($this->session->flashdata('success')){ ?>

                        <div class="alert alert-success">

                            <strong>Success! </strong><?php echo $this->session->flashdata('success')?> 

                        </div>

                    <?php }if($this->session->flashdata('error')){ ?>

                        <div class="alert alert-danger">

                          <strong>Error! </strong> <?php echo $this->session->flashdata('error')?>

                        </div>

                    <?php } ?>

                        

                         <!--form strat-->    

                         <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/insert_package">





                            <span class="section">Clinic Platform Info</span>



                            <div class="item form-group">



                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Employee # <span class="required"></span>



                                </label>



                                <div class="col-md-6 col-sm-6 col-xs-12">



                                    <input id="name" class="form-control col-md-7 col-xs-12" name="title" placeholder="Enter Employee #" required="required" type="text">



                                </div>



                            </div>

                            <div class="item form-group">



                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Date of Injury <span class="required"></span>



                                </label>



                                <div class="col-md-6 col-sm-6 col-xs-12">



                                    <input id="datepicker" class="form-control col-md-7 col-xs-12" name="title" placeholder="Enter Date" required="required" type="text">



                                </div>



                            </div>

                            <div class="item form-group">



                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Date Reported toYour (DC) Office <span class="required"></span>



                                </label>



                                <div class="col-md-6 col-sm-6 col-xs-12">



                                    <input id="datepicker1" class="form-control col-md-7 col-xs-12" name="title" placeholder="Enter Date" required="required" type="text">



                                </div>



                            </div>


                            <div class="item form-group">


                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Were you the 1st provider seen <span class="required"></span>

                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 4px 0px;">

                                    <input type="radio" name="provider" value="yes"> Yes 
                                    <input type="radio" name="provider" value="no"> No 

                                </div>



                            </div>

                            <div class="item form-group">


                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Area of body Injured <span class="required"></span>

                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select class="form-control col-md-7 col-xs-12">
                                      <option value="volvo">Arm/Elbow/Wrist</option>
                                      <option value="saab">Neck</option>
                                      <option value="vw">Mid Back / Ribs</option>
                                      <option value="audi" selected>Low Back</option>
                                      <option value="audi" selected>Knee/Leg/Ankle</option>
                                    </select>

                                </div>



                            </div>


                            <div class="item form-group">


                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Cause of Injury? <span class="required"></span>

                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select class="form-control col-md-7 col-xs-12">
                                      <option value="volvo">Crushing</option>
                                      <option value="saab">Sprain/Strain</option>
                                      <option value="vw">Slip/Fall</option>
                                    </select>

                                </div>



                            </div>

                            <div class="item form-group">



                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Return to Work Date? <span class="required"></span>



                                </label>



                                <div class="col-md-6 col-sm-6 col-xs-12">



                                    <input id="datepicker2" class="form-control col-md-7 col-xs-12" name="title" placeholder="Enter Date" required="required" type="text">



                                </div>



                            </div>


                            <div class="item form-group">


                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Limitations arm lift <span class="required"></span>

                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select class="form-control col-md-7 col-xs-12">
                                      <option value="volvo">0-10</option>
                                      <option value="saab">11-20</option>
                                      <option value="vw">21-30</option>
                                      <option value="vw">31-40</option>
                                      <option value="vw">41-50</option>
                                      <option value="vw">50+</option>
                                    </select>

                                </div>



                            </div>


                            <div class="item form-group">


                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Limitationshigh near lift <span class="required"></span>

                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select class="form-control col-md-7 col-xs-12">
                                      <option value="volvo">0-10</option>
                                      <option value="saab">11-20</option>
                                      <option value="vw">21-30</option>
                                      <option value="vw">31-40</option>
                                      <option value="vw">41-50</option>
                                      <option value="vw">50+</option>
                                    </select>

                                </div>



                            </div>

                            <div class="item form-group">


                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Limatations high far lift <span class="required"></span>

                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select class="form-control col-md-7 col-xs-12">
                                      <option value="volvo">0-10</option>
                                      <option value="saab">11-20</option>
                                      <option value="vw">21-30</option>
                                      <option value="vw">31-40</option>
                                      <option value="vw">41-50</option>
                                      <option value="vw">50+</option>
                                    </select>

                                </div>

                            </div>

                            <div class="item form-group">


                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Limitations leg lift <span class="required"></span>

                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select class="form-control col-md-7 col-xs-12">
                                      <option value="volvo">0-10</option>
                                      <option value="saab">11-20</option>
                                      <option value="vw">21-30</option>
                                      <option value="vw">31-40</option>
                                      <option value="vw">41-50</option>
                                      <option value="vw">50+</option>
                                    </select>

                                </div>

                            </div>

                            <div class="item form-group">


                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Limitations floor lift <span class="required"></span>

                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select class="form-control col-md-7 col-xs-12">
                                      <option value="volvo">0-10</option>
                                      <option value="saab">11-20</option>
                                      <option value="vw">21-30</option>
                                      <option value="vw">31-40</option>
                                      <option value="vw">41-50</option>
                                      <option value="vw">50+</option>
                                    </select>

                                </div>

                            </div>

                            <div class="item form-group">

                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Limitations sitting <span class="required"></span>

                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <input id="name" class="form-control col-md-7 col-xs-12" name="title" placeholder="Microbreaks every 20 minutes" required="required" type="text">

                                </div>

                            </div>

                            <div class="item form-group">


                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Employee may return to work <span class="required"></span>

                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select class="form-control col-md-7 col-xs-12">
                                      <option value="volvo">No</option>
                                      <option value="saab">With Limitations</option>
                                      <option value="vw">No Limitations And Is Fit For Duty</option>
                                    </select>

                                </div>

                            </div>

                            <div class="item form-group">

                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Expected Return to work date <span class="required"></span>

                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <input id="datepicker3" class="form-control col-md-7 col-xs-12" name="title" placeholder="Enter date" required="required" type="text">

                                </div>

                            </div>

                            <div class="item form-group">

                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Date of next evaluation <span class="required"></span>

                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <input id="datepicker4" class="form-control col-md-7 col-xs-12" name="title" placeholder="Enter date" required="required" type="text">

                                </div>

                            </div>

                            <div class="item form-group">

                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Department # <span class="required"></span>

                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <input id="name" class="form-control col-md-7 col-xs-12" name="title" placeholder="Enter Department #" required="required" type="text">

                                </div>

                            </div>

                            <div class="item form-group">

                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Department Name <span class="required"></span>

                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <input id="name" class="form-control col-md-7 col-xs-12" name="title" placeholder="Enter Department Name" required="required" type="text">

                                </div>

                            </div>

                            <div class="item form-group">

                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Department Manager <span class="required"></span>

                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <input id="name" class="form-control col-md-7 col-xs-12" name="title" placeholder="Enter Department Manager" required="required" type="text">

                                </div>

                            </div>


                            <div class="item form-group">

                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Written JD reviewed <span class="required"></span>

                                </label>


                                <div class="col-md-6 col-sm-6 col-xs-12">


                                    <input type="url" id="link" name="link" required="required" placeholder="link" class="form-control col-md-7 col-xs-12">

                                </div>



                            </div>                         

                            <div class="ln_solid"></div>



                            <div class="form-group">



                                <div class="col-md-6 col-md-offset-3">



                                    <button type="submit" class="btn btn-primary">Cancel</button>



                                    <button id="send" type="submit" class="btn btn-success">Submit</button>



                                </div>



                            </div>

                        

                         </form>



                    </div>



                </div>



            </div>



        </div>



    </div>



</div>



<!-- /page content -->





<?php include('includes/footer.php');?>



<script type="text/javascript">

$(document).ready(function(){ 

    var maxField = 6; //Input fields increment limitation

    var addButton = $('.add_button'); //Add button selector

    var wrapper = $('.field_wrapper'); //Input field wrapper

    var fieldHTML = '<div><input type="text" name="extra_field[]" placeholder="Enter extra package" class="extra_field" /><a href="javascript:void(0);" class="remove_button" title="Remove field"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></div>'; //New input field html 

    var x = 1; //Initial field counter is 1

    $(addButton).click(function(){ //Once add button is clicked

        if(x < maxField){ //Check maximum number of input fields

            x++; //Increment field counter

            $(wrapper).append(fieldHTML); // Add field html

        }

    });

    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked

        e.preventDefault();

        $(this).parent('div').remove(); //Remove field html

        x--; //Decrement field counter

    });

});

</script>



<style>

    .fa-minus-circle{

        color: red;

        font-size: 25px;

        margin: 12px 10px;

        float: right;

        position: absolute;

    }

    .fa-plus-circle{

        color: green;

        font-size: 25px;

        margin: 5px 10px;

        float: right;

        position: absolute;

    }

    .extra_field{

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



      $('.multi.required').on('keyup blur', 'input', function() {



        validator.checkField.apply($(this).siblings().last()[0]);



      });



      $('form').submit(function(e) {



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
  $( function() {
    $( "#datepicker" ).datepicker();
    $( "#datepicker1" ).datepicker();
    $( "#datepicker2" ).datepicker();
    $( "#datepicker3" ).datepicker();
    $( "#datepicker4" ).datepicker();
  } );
  </script>

    <!-- /validator -->