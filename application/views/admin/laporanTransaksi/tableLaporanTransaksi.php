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
                                                <input class="form-control form_date" type="text" name="tanggal" value="" placeholder="Tanggal">
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

                            <?php if ($listTampilLapTransaksi->data->jumlah_pnp_qr == 0 && $listTampilLapTransaksi->data->jumlah_pnp_non_qr == 0) { ?>
                                <div class="col-md-12">
                                    <br>
                                    <h5><b>Tidak Ada Data</b></h5>
                                </div>
                            <?php } else { ?>
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
                                                    <th class="text-center"><b>Asal</b></th>
                                                    <th class="text-center"><b>Tujuan</b></th>
                                                    <th class="text-center"><b>Jumlah Pnp QR</b></th>
                                                    <th class="text-center"><b>Jumlah Pnp Non QR</b></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php $no = 1; ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $no++ ?></td>
                                                        <td class="text-center"><?php echo $listTampilLapTransaksi->data->asal_nama ?></td>
                                                        <td class="text-center"><?php echo $listTampilLapTransaksi->data->tujuan_nama ?></td>
                                                        <td class="text-center"><?php echo $listTampilLapTransaksi->data->jumlah_pnp_qr ?></td>
                                                        <td class="text-center"><?php echo $listTampilLapTransaksi->data->jumlah_pnp_non_qr ?></td>
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