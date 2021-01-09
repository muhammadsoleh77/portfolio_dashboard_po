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
        <li class="active"><b>Laporan Transaksi</b></li>
    </ul>
    <!-- END BREADCRUMB -->

    <!-- START LAPORAN -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="<?php echo base_url('admin/laporan/laporanSetoran') ?>">
                        <div class="col-md-6 main-menu">
                            <div class="menu disabled">
                                Laporan Setoran
                            </div>
                        </div>
                    </a>
                    <a href="<?php echo base_url('admin/laporan/laporanTransaksi') ?>">
                        <div class="col-md-6 main-menu">
                            <div class="menu">
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

                            <?php echo form_open(base_url('admin/laporan/tampilLaporanTransaksi'), 'class="form-horizontal"'); ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-horizontal">
                                        <div class="form-group">

                                            <div class="col-lg-2">
                                                <input class="form-control form_date" type="text" name="tanggalAwal" value="" placeholder="Tanggal Awal" autocomplete="off">
                                                <span style="color:red;"><?php echo form_error('tanggalAwal'); ?></span>
                                            </div>

                                            <div class="col-lg-2">
                                                <input class="form-control form_date" type="text" name="tanggalAkhir" value="" placeholder="Tanggal Akhir" autocomplete="off">
                                                <span style="color:red;"><?php echo form_error('tanggalAkhir'); ?></span>
                                            </div>

                                            <div class="col-lg-2">
                                                <select id="pilihLoketBus" class="form-control select" name="pilihLoketBus">
                                                    <option value="" disabled selected>Pilih Loket / Bus</option>
                                                    <!-- <option value="loket" <?php echo set_select('pilihLoketBus','loket', ( !empty($data) && $data == "loket" ? TRUE : FALSE )); ?>>Loket</option>
                                                    <option value="bus" <?php echo set_select('pilihLoketBus','bus', ( !empty($data) && $data == "bus" ? TRUE : FALSE )); ?>>Bus</option> -->
                                                    <option value="loket">Loket</option>
                                                    <option value="bus">Bus</option>
                                                </select>
                                                <span style="color:red;"><?php echo form_error('pilihLoketBus'); ?></span>
                                            </div>

                                            <div class="col-lg-2" id="pilihLoket">
                                                <select class="form-control select" name="pilihLoket">
                                                    <option value="" disabled selected>Pilih Loket</option>
                                                    <?php foreach ($dataLoket->content as $key => $data) { ?>
                                                        <option value="<?php echo $data->id ?>"><?php echo $data->nama ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span style="color:red;"><?php echo form_error('pilihLoket'); ?></span>
                                            </div>

                                            <div class="col-lg-2" id="pilihBus">
                                                <select class="form-control select" name="pilihBus">
                                                    <option value="" disabled selected>Pilih Type Bus</option>
                                                    <option value="0">ALL</option>
                                                    <option value="1">JAC</option>
                                                    <option value="2">JRC</option>
                                                    <option value="3">TJR</option>
                                                </select>
                                                <span style="color:red;"><?php echo form_error('pilihBus'); ?></span>
                                            </div>

                                            <div class="col-lg-1">
                                                <button class="btn btn-warning" type="submit" name="submit" value="tampilTransaksi">
                                                    <i class="glyphicon glyphicon-search"></i>
                                                </button>
                                            </div>

                                            <!-- <div class="col-lg-1" id="tampilLoket">
                                                <button class="btn btn-warning" type="submit" name="submit" value="tampilLoket">
                                                    <i class="glyphicon glyphicon-search"></i>
                                                </button>
                                            </div>

                                            <div class="col-lg-1" id="tampilBus">
                                                <button class="btn btn-warning" type="submit" name="submit" value="tampilBus">
                                                    <i class="glyphicon glyphicon-search"></i>
                                                </button>
                                            </div> -->

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
    $(document).ready(function() {
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

    // Pertama hide dulu semua select option yang mau ditampilkan salah satunya
    $('#pilihLoket').hide();
    $('#pilihBus').hide();
    $('#tampilLoket').hide();
    $('#tampilBus').hide();
    // End

    // Panggil Salah satu select optionnya
    $("#pilihLoketBus").change(function() {
        var val = $(this).val();
        if (val == "loket") {
            $("#tampilLoket").show();
            $('#tampilBus').hide();

            $("#pilihLoket").show();
            $("#pilihBus").hide();
        } else if (val == "bus") {
            $("#tampilBus").show();
            $('#tampilLoket').hide();

            $("#pilihLoket").hide();
            $("#pilihBus").show();
        }
    });
    // End
});
</script>