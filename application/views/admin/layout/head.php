<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- META SECTION -->
        <title>Admin P.O</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="<?php echo base_url() ?>assets/joli/adminPO_icon.png" type="image/x-icon" />
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url() ?>assets/joli/css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->

        <link rel="stylesheet" href="<?php echo base_url() ?>assets/joli/js/sweetalert2/package/dist/sweetalert2.min.css">

        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css">

        <!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/sweetalert2/package/dist/sweetalert2.all.min.js"></script> -->

        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/plugins/jquery/jquery.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/plugins/morris/morris.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/jquery.table2excel.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.62/pdfmake.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.62/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.62/vfs_fonts.js"></script>
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
          <script type="text/javascript">

            // START DATEPICKER
            $(document).ready(function() {
              $(".form_date").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
              });
            });
            // END DATEPICKER

            // START VALIDASI SELECT OPTION MANIFEST PENUMPANG
            // $(document).ready(function() {
            //   // Pertama hide dulu semua select option yang mau ditampilkan salah satunya
            //   $('#pilihLoket').hide();
            //   $('#pilihBus').hide();
            //   $('#tampilLoket').hide();
            //   $('#tampilBus').hide();
            //   // End

            //   // Panggil Salah satu select optionnya
            //   $("#pilihLoketBus").change(function() {
            //     var val = $(this).val();
            //     if(val == "loket") {
            //       $("#tampilLoket").show();
            //       $('#tampilBus').hide();

            //       $("#pilihLoket").show();
            //       $("#pilihBus").hide();
            //     } else if(val == "bus") {
            //       $("#tampilBus").show();
            //       $('#tampilLoket').hide();

            //       $("#pilihLoket").hide();
            //       $("#pilihBus").show();
            //     }
            //   });
            //   // End
            // });
            // END VALIDASI SELECT OPTION MANIFEST PENUMPANG

            // START ONCHANGE TRAYEK
            // $('#pilihBusLorena').change(function() {
            //     window.location = ".php?update=tv_taken&update_id=" + $(this).val();
            // });
            // END ONCHANGE TRAYEK
          </script>
