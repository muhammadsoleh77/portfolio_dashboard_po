<style media="screen">
    .main-menu {
        text-align: center;
        padding: 10px;
    }

    .menu {
        /* font-size: 16px; */
        background-color: #e0af1b;
        border: 2px solid #e0af1b;
        border-radius: 6px;
        padding: 10px;
        color: #fff;
    }

    .menu:hover {
        background-color: #fff;
        color: #e0af1b;
        cursor: pointer;
        border: 2px solid #e0af1b;
    }

    .disabled {
        border: 2px solid #ddd;
        background-color: #ddd;
        cursor: pointer;
    }
</style>

<div class="widgets" style="margin-top: 50px;">
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard') ?>"><b>Home</b></a></li>
        <li><a href="<?php echo base_url('admin/laporan') ?>"><b>Laporan</b></a></li>
        <li class="active"><b>Laporan Setoran</b></li>
    </ul>
    <!-- END BREADCRUMB -->

    <!-- START LAPORAN -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="<?php echo base_url('admin/laporan/laporanSetoran') ?>">
                        <div class="col-md-6 main-menu">
                            <div class="menu">
                                Laporan Setoran
                            </div>
                        </div>
                    </a>
                    <a href="<?php echo base_url('admin/laporan/laporanTransaksi') ?>">
                        <div class="col-md-6 main-menu">
                            <div class="menu disabled">
                                Laporan Transaksi
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- <div class="content-top clearfix">
            <h2>&nbsp;</h2>
        </div> -->
    </div>
    <!-- END LAPORAN -->

    <div class="widgets">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default bootstrap-panel">
                    <div>
                        <div class="panel-body">

                            <?php echo form_open(base_url('admin/laporan/tampilLaporanSetoran'), 'class="form-horizontal"'); ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-horizontal">
                                        <div class="form-group">

                                            <div class="col-lg-3">
                                                <input class="form-control form_date" type="text" name="tanggal" value="" placeholder="Tanggal" autocomplete="off">
                                                <span style="color:red;"><?php echo form_error('tanggal'); ?></span>
                                            </div>

                                            <div class="col-lg-1">
                                                <button class="btn btn-warning" type="submit" name="submit" value="tampilSetoran">
                                                    <i class="glyphicon glyphicon-search"></i>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- <hr> -->
                                </div>
                            </div>
                            <?php echo form_close(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // $(document).ready(function() {
    //     // Pertama hide dulu semua select option yang mau ditampilkan salah satunya
    //     $('#pilihHari').hide();
    //     $("#pilihBulan").hide();
    //     // End

    //     // Panggil Salah satu select optionnya
    //     $("#pilihPeriode").change(function() {
    //         var val = $(this).val();
    //         if (val == "hari") {
    //             $("#pilihHari").show();
    //             $('#pilihBulan').hide();
    //         } else if (val == "bulan") {
    //             $("#pilihBulan").show();
    //             $('#pilihHari').hide();
    //         }
    //     });
    //     // End
    // });
</script>