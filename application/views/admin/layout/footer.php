</div>
                <!-- END PAGE CONTENT WRAPPER -->
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="text-center"><h1 style="color:#fff;"><span class="fa fa-sign-out text-center"></span> Log <strong>Out</strong> ?</h1></div>
                    <div class="mb-content text-center">
                        <p>Apakah anda yakin ingin Keluar?</p>
                        <p>Tekan Cancel untuk membatalkan. Tekan Logout untuk keluar.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="text-center">
                            <a href="<?php echo base_url('login/logout') ?>" class="btn btn-warning btn-lg">Logout</a>
                            <button class="btn btn-success btn-lg mb-control-close">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="<?php echo base_url() ?>assets/joli/audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="<?php echo base_url() ?>assets/joli/audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->

        <!-- START SWEETALERT -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/sweetalert2/package/dist/sweetalert2.all.min.js"></script>
        <!-- END SWEETALERT -->

        <!-- START PLUGINS -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/plugins/jquery/jquery.min.js"></script>
        <!-- START SWEETALERT -->
        <!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/sweetalert2/package/dist/sweetalert2.min.js"></script> -->
        <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
        <!-- END SWEETALERT -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/plugins/bootstrap/bootstrap.min.js"></script>
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->
        <script type='text/javascript' src='<?php echo base_url() ?>assets/joli/js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/plugins/scrolltotop/scrolltopcontrol.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/plugins/morris/morris.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='<?php echo base_url() ?>assets/joli/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='<?php echo base_url() ?>assets/joli/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>
        <script type='text/javascript' src='<?php echo base_url() ?>assets/joli/js/plugins/bootstrap/bootstrap-datepicker.js'></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/plugins/owl/owl.carousel.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- END THIS PAGE PLUGINS-->

        <!-- THIS PAGE PLUGINS -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/plugins/bootstrap/bootstrap-colorpicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
        <!-- END THIS PAGE PLUGINS -->

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/settings.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/plugins.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/actions.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/demo_dashboard.js"></script>

        <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>

        <!-- ONLINE / OFFLINE ALERT -->
        <script src="<?php echo base_url('assets/joli/js/onlineOffline.js'); ?>"></script>
        <!-- END ONLINE / OFFLINE ALERT -->

        <!-- <script type="text/javascript">
          $(document).ready(function() {
            $(".form_date").datetimepicker({
              format: 'yyyy-mm-dd',
              autoclose: true
            });
          });
        </script> -->
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->
    </body>
</html>
