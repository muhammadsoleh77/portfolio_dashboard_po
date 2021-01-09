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
                                                <input class="form-control form_date" type="text" name="tanggalAwal" value="<?= $tanggalAwal ?>" placeholder="Tanggal Awal" autocomplete="off">
                                                <span style="color:red;"><?php echo form_error('tanggalAwal'); ?></span>
                                            </div>

                                            <div class="col-lg-2">
                                                <input class="form-control form_date" type="text" name="tanggalAkhir" value="<?= $tanggalAkhir ?>" placeholder="Tanggal Akhir" autocomplete="off">
                                                <span style="color:red;"><?php echo form_error('tanggalAkhir'); ?></span>
                                            </div>

                                            <div class="col-lg-2">
                                                <select id="pilihLoketBus" class="form-control select" name="pilihLoketBus">
                                                    <option value="" disabled selected>Pilih Loket / Bus</option>
                                                    <option value="loket" <?php echo set_select('pilihLoketBus','loket', ( !empty($data) && $data == "loket" ? TRUE : FALSE )); ?>>Loket</option>
                                                    <option value="bus" <?php echo set_select('pilihLoketBus','bus', ( !empty($data) && $data == "bus" ? TRUE : FALSE )); ?>>Bus</option>
                                                </select>
                                                <span style="color:red;"><?php echo form_error('pilihLoketBus'); ?></span>
                                            </div>

                                            <div class="col-lg-2" id="pilihLoket">
                                                <select class="form-control select" name="pilihLoket">
                                                    <option value="" disabled selected>Pilih Loket</option>
                                                    <?php foreach ($dataLoket->content as $key => $data) { ?>
                                                        <option value="<?php echo $data->id ?>" <?php echo set_select('pilihLoket',"$data->id", ( !empty($datanya) && $datanya == "$data->id" ? TRUE : FALSE )); ?>><?php echo $data->nama ?></option>
                                                    <?php } ?>
                                                </select>
                                                <!-- <span style="color:red;"><?php echo form_error('pilihLoket'); ?></span> -->
                                            </div>

                                            <div class="col-lg-2" id="pilihBus">
                                                <select class="form-control select" name="pilihBus">
                                                    <option value="" disabled selected>Pilih Type Bus</option>
                                                    <option value="0">ALL</option>
                                                    <option value="1">JAC</option>
                                                    <option value="2">JRC</option>
                                                    <option value="3">TJR</option>
                                                </select>
                                                <!-- <span style="color:red;"><?php echo form_error('pilihBus'); ?></span> -->
                                            </div>

                                            <div class="col-lg-1">
                                                <button class="btn btn-warning" type="submit" name="submit" value="tampilTransaksi">
                                                    <i class="glyphicon glyphicon-search"></i>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- <hr> -->
                                </div>
                            </div>
                            <?php echo form_close(); ?>

                            <?php 
                            // $a = json_encode($listTampilLapTransaksiLoket->data);
                            // var_dump($a);
                            // var_dump($listTampilLapTransaksiLoket)
                             ?>

                            <?php if ($listTampilLapTransaksiLoket->jumlah_pnp_non_ap_qr === 0 && $listTampilLapTransaksiLoket->jumlah_pnp === 0 && $listTampilLapTransaksiLoket->jumlah_pnp_ap_qr === 0 ) { ?>
                                <div class="col-md-12">
                                    <br>
                                    <h5><b>Tidak Ada Data</b></h5>
                                </div>
                            <?php } else if ($listTampilLapTransaksiLoket) { ?>
                                <div id="dataTable">
                                    <br><br>
                                    <h3>List Laporan Transaksi (Loket)</h3><br>
                                    <div class="table-responsive" style="border:none;">
                                        <table class="table table-bordered table-striped">
                                            <col width="2%">
                                            <col width="10%">
                                            <col width="10%">
                                            <col width="10%">
                                            <col width="10%">

                                            <thead>
                                                <tr class="th-bg">
                                                    <th class="text-center"><b>No.</b></th>
                                                    <th class="text-center"><b>Jmulah Penumpang</b></th>
                                                    <th class="text-center"><b>Jumlah Pnp QR</b></th>
                                                    <th class="text-center"><b>Jumlah Pnp Non QR</b></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php $no = 1; ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $no++ ?></td>
                                                    <td class="text-center"><?php echo $listTampilLapTransaksiLoket->jumlah_pnp ?></td>
                                                    <td class="text-center"><?php echo $listTampilLapTransaksiLoket->jumlah_pnp_ap_qr ?></td>
                                                    <td class="text-center"><?php echo $listTampilLapTransaksiLoket->jumlah_pnp_non_ap_qr ?></td>
                                                </tr>
                                            </tbody>
                                            <!-- <tfoot>
                <tr>
                <td colspan="6" class="text-center">
                <div st-pagination="" st-items-by-page="perPage" st-displayed-pages="pageSize"></div>
              </td>
            </tr>
          </tfoot> -->
                                        </table><br>
                                    </div>

                                    <div class="col-md-12">
                                        <span class="text-center">
                                            <div st-pagination="" st-items-by-page="perPage" st-displayed-pages="pageSize"></div>
                                        </span>
                                    </div>

                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Pertama hide dulu semua select option yang mau ditampilkan salah satunya
        $('#pilihLoket').hide();
        $('#pilihBus').hide();
        $('#tampilLoket').hide();
        $('#tampilBus').hide();
        // End

        // Panggil Salah satu select optionnya
        // $("#pilihLoketBus").change(function() {
        // var val = $(this).val();
        var val2 = $("#pilihLoketBus option:selected").val();
        // console.log(val2);
        if (val2) {
            console.log(val2);
            if (val2 == "loket") {
                $("#tampilLoket").show();
                $('#tampilBus').hide();

                $("#pilihLoket").show();
                $("#pilihBus").hide();
            } else if (val2 == "bus") {
                $("#tampilBus").show();
                $('#tampilLoket').hide();

                $("#pilihLoket").hide();
                $("#pilihBus").show();
            }
        }

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
        })
        // });
        // End
    });
</script>