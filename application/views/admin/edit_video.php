<div class="right_col" role="main">

    <div class="">

        <div class="page-title">

            <div class="title_left">

                <h3>Edit Training Video</h3>

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
                         <form id="vid_form" class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/update_video">

                            <span class="section">Edit this Video</span>
                             
                            <input type="hidden" name="video_by" value="<?php echo $this->session->userdata('user_id')?>">
                            <input type="hidden" name="video_id" value="<?php echo $video[0]['id'];?>"> 
                             
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Video Title<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="video_title" placeholder="Enter Title" required="required" type="text" value="<?php echo $video[0]['video_title'];?>">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Video Description</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea required name="video_description" class="form-control"><?php echo $video[0]['video_description'];?></textarea>
                                </div>
                            </div>
                             
                             <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Video Order<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="order" placeholder="Enter order" required="required" type="number" min="1" value="<?php echo $video[0]['order'];?>">
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