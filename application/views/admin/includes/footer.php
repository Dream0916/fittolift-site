 <!-- footer content -->
        <footer>
          <div class="pull-right">
            Powerd by <a href="<?php echo base_url(); ?>">Fit to Lift</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url("assets/vendors/jquery/dist/jquery.min.js"); ?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url("assets/vendors/bootstrap/dist/js/bootstrap.min.js"); ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url("assets/vendors/fastclick/lib/fastclick.js"); ?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url("assets/vendors/nprogress/nprogress.js"); ?>"></script>
     <script src="<?php echo base_url("assets/vendors/iCheck/icheck.min.js"); ?>"></script>

    <script src="<?php echo base_url("assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"); ?>"></script>
   
    <script src="<?php echo base_url("assets/tinymce/tinymce.min.js"); ?>"></script>    

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url("assets/build/js/custom.min.js"); ?>"></script>


    <script>$(".alert").show().delay(3000).fadeOut();</script>
    
<!--
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
-->
    <script>
       $(document).ready(function() {
            $(document).on('focus', ':input', function() {
                $(this).attr('autocomplete', 'off');
            });
       });
//        $(document).ready(function() {
//      
//        $('#datatable').DataTable({
//            'order': [[ 0, 'asc' ]]
//           // orderable: false
//        });
//
//        TableManageButtons.init();
//      });    
    </script>

  </body>
</html>