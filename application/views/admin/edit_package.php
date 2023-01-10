<div class="right_col" role="main">

    <div class="">

        <div class="page-title">

            <div class="title_left">

                <h3>Update Package</h3>

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
                         <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/edit_package">

                            <input type="hidden" name="package_id" value="<?php echo $package[0]->id;?>">
                            <span class="section">Package Info</span>

                            <div class="item form-group">

                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title<span class="required">*</span></label>

                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <input id="name" class="form-control col-md-7 col-xs-12" name="title" placeholder="Enter Title" required="required" type="text" value="<?php echo $package[0]->title;?>">

                                </div>

                            </div>

                            <div class="item form-group">

                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Price<span class="required">*</span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <input id="price" class="form-control col-md-7 col-xs-12" name="price" placeholder="Enter Price" required="required" type="text" min="0" value="<?php echo $package[0]->price;?>">

                                </div>

                            </div>

                            <div class="item form-group">

                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="callus">Call Us<span class="required">*</span></label>

                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <input type="text" id="callus" name="call_us" placeholder="Enter Call Us" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $package[0]->call_us;?>">

                                </div>

                            </div>

                            <div class="item form-group">

                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span></label>

                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <input type="email" id="email" name="email" placeholder="Enter Your Email" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $package[0]->email;?>">

                                </div>

                            </div>

                            <div class="item form-group">

                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Website URL <span class="required">*</span></label>

                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <input type="url" id="website" name="website" required="required" placeholder="www.website.com" class="form-control col-md-7 col-xs-12" value="<?php echo $package[0]->website;?>">

                                </div>

                            </div>

                            
                            <div class="item form-group">

                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Facebook<span class="required">*</span></label>

                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <input type="url" id="facebook" name="facebook" required="required" placeholder="Enter Facebook Url" class="form-control col-md-7 col-xs-12" value="<?php echo $package[0]->facebook;?>">

                                </div>

                            </div>

                            <div class="item form-group">

                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Twitter<span class="required">*</span>

                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <input type="url" id="twitter" name="twitter" required="required" placeholder="Enter Twitter Url" class="form-control col-md-7 col-xs-12" value="<?php echo $package[0]->twitter;?>">

                                </div>

                            </div>
                             
                            <div class="item form-group">

                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Packagencludes">Package Includes:<span class="required">*</span></label>

                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <div class="row">

                                        <div class="col-md-5">

                                            <div class="checkbox">

                                                <label>

                                                    <input type="checkbox" <?php if($package[0]->free_drinks==1)echo 'checked';?> name="free_drinks" value="1" />Free Welcome Drinks

                                                </label>

                                            </div>

                                            <div class="checkbox">

                                                <label>

                                                    <input type="checkbox" <?php if($package[0]->fuel==1)echo 'checked';?> name="fuel" value="1">Fuel

                                                </label>

                                            </div>

                                            <div class="checkbox">

                                                <label>

                                                    <input type="checkbox" id="waiting" <?php if($package[0]->waiting_hour==1)echo 'checked';?> name="waiting_hour" value="1">Waiting / hour
                                                    
                                                </label>

                                            </div>

                                        </div>

                                        <div class="col-md-5">

                                            <div class="checkbox">

                                                <label>

                                                    <input type="checkbox" <?php if($package[0]->security_drivers==1)echo 'checked';?> name="security_drivers" value="1">Security Cleared Drivers

                                                </label>

                                            </div>

                                            <div class="checkbox">

                                                <label>

                                                    <input type="checkbox" <?php if($package[0]->toll_tax==1)echo 'checked';?> name="toll_tax" value="1">Toll Tax (if any)

                                                </label>

                                            </div>

                                            <div class="checkbox">

                                                <label>

                                                    <input type="checkbox" <?php if($package[0]->picku_benefit==1)echo 'checked';?> name="picku_benefit" value="1">PickU Benefits

                                                </label>

                                            </div>

                                        </div>
                                        
                                    </div>

                                </div>

                            </div>
                             
                             <div class="item form-group">

                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="waiting">&nbsp;</label>

                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <input type="number" min="0" id="waiting_price" name="waiting_price" placeholder="Enter waiting price per hour" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $package[0]->waiting_price;?>">

                                </div>
                               
                            </div>
                             
                             <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="waiting">Extra Package</label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="field_wrapper">
                                        
                                        <div style="display: inline-block;width: 100%;">
                                            <input style="width: 93%;" type="text" value="<?php if($package[0]->extra_pkg_1) echo $package[0]->extra_pkg_1;?>" name="extra_field[]" placeholder="Enter extra package" class="form-control col-md-7 col-xs-12"/>

                                            <a href="javascript:void(0);" class="add_button" title="Add field"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                        </div>
                                        <?php if($package[0]->extra_pkg_2){ ?>
                                        <div style="display: inline-block;width: 100%;">
                                            <input style="width: 93%;" type="text" value="<?php echo $package[0]->extra_pkg_2;?>" name="extra_field[]" placeholder="Enter extra package" class="form-control col-md-7 col-xs-12"/>

                                            <a href="javascript:void(0);" class="remove_button" title="Remove field"><i style="margin: 4px 10px;" class="fa fa-minus-circle" aria-hidden="true"></i></a>
                                        </div>
                                        <?php }if($package[0]->extra_pkg_3){ ?>
                                        <div style="display: inline-block;width: 100%;">
                                            <input style="width: 93%;" type="text" value="<?php echo $package[0]->extra_pkg_3;?>" name="extra_field[]" placeholder="Enter extra package" class="form-control col-md-7 col-xs-12"/>

                                            <a href="javascript:void(0);" class="remove_button" title="Remove field"><i style="margin: 4px 10px;" class="fa fa-minus-circle" aria-hidden="true"></i></a>
                                        </div>
                                        <?php }if($package[0]->extra_pkg_4){ ?>
                                        <div style="display: inline-block;width: 100%;">
                                            <input style="width: 93%;" type="text" value="<?php echo $package[0]->extra_pkg_4;?>" name="extra_field[]" placeholder="Enter extra package" class="form-control col-md-7 col-xs-12"/>

                                            <a href="javascript:void(0);" class="remove_button" title="Remove field"><i style="margin: 4px 10px;" class="fa fa-minus-circle" aria-hidden="true"></i></a>
                                        </div>
                                        <?php }if($package[0]->extra_pkg_5){ ?>
                                        <div style="display: inline-block;width: 100%;">
                                            <input style="width: 93%;" type="text" value="<?php echo $package[0]->extra_pkg_5;?>" name="extra_field[]" placeholder="Enter extra package" class="form-control col-md-7 col-xs-12"/>

                                            <a href="javascript:void(0);" class="remove_button" title="Remove field"><i style="margin: 4px 10px;" class="fa fa-minus-circle" aria-hidden="true"></i></a>
                                        </div>
                                        <?php }if($package[0]->extra_pkg_6){ ?>
                                        <div style="display: inline-block;width: 100%;">
                                            <input style="width: 93%;" type="text" value="<?php echo $package[0]->extra_pkg_6;?>" name="extra_field[]" placeholder="Enter extra package" class="form-control col-md-7 col-xs-12"/>

                                            <a href="javascript:void(0);" class="remove_button" title="Remove field"><i style="margin: 4px 10px;" class="fa fa-minus-circle" aria-hidden="true"></i></a>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div> 
                               
                            </div>

                            <div class="item form-group">

                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Description<span class="required">*</span></label>

                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <textarea id="textarea" required="required" name="description" class="form-control col-md-7 col-xs-12"><?php echo $package[0]->description;?></textarea>

                                </div>

                            </div>

                            <div class="item form-group">
                                
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">&nbsp;</label>

                                <div class="col-md-6 col-sm-6 col-xs-12" style="text-align: center;">

                                    <img src="<?php echo $package[0]->img_file;?>" width="130">

                                </div>

                            </div>
                             
                             <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Upload Image<span class="required">*</span></label>

                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <input type="file" id="upload_img" name="upload_img" class="form-control col-md-7 col-xs-12">

                                </div>

                            </div>

                            <div class="ln_solid"></div>

                            <div class="form-group">

                                <div class="col-md-6 col-md-offset-3">

                                    <button type="submit" class="btn btn-primary">Cancel</button>

                                    <button id="send" type="submit" class="btn btn-success">Update</button>

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

    <!-- /validator -->