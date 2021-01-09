<style media="screen">
    .main-menu {
        text-align: center;
        padding: 10px;
    }

    .menu {
        font-size: 16px;
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
        <li class="active"><b>Laporan Transaksi</b></li>
    </ul>
    <!-- END BREADCRUMB -->

    <div class="widgets">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default bootstrap-panel">
                    <div>
                        <div class="panel-body">

                            <?php echo form_open(base_url('admin/laporanTransaksi/tampil'), 'class="form-horizontal"'); ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-horizontal">
                                        <div class="form-group">

                                            <div class="col-lg-3">
                                                <input class="form-control form_date" type="text" name="tanggal" value="" placeholder="Tanggal" autocomplete="off">
                                                <span style="color:red;"><?php echo form_error('tanggal'); ?></span>
                                            </div>

                                            <div class="col-lg-3">
                                                <select class="form-control select" name="pilihLoket">
                                                    <option value="" disabled selected>Pilih Loket</option>
                                                    <?php foreach($dataLoket->content as $key => $data) { ?>
                                                        <option value="<?php echo $data->id ?>"><?php echo $data->nama ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span style="color:red;"><?php echo form_error('pilihLoket'); ?></span>
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