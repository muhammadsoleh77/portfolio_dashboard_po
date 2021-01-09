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
        <li><a href="<?php echo base_url('admin/tunaiCashless') ?>"><b>Tunai / Cashless</b></a></li>
        <li class="active"><b>Cashless</b></li>
    </ul>
    <!-- END BREADCRUMB -->

    <!-- START LAPORAN -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="<?php echo base_url('admin/tunaiCashless/tunai') ?>">
                        <div class="col-md-6 main-menu">
                            <div class="menu disabled">
                                Tunai
                            </div>
                        </div>
                    </a>
                    <a href="<?php echo base_url('admin/tunaiCashless/cashless') ?>">
                        <div class="col-md-6 main-menu">
                            <div class="menu">
                                Non Tunai (Cashless)
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

                            <?php echo form_open(base_url('admin/tunaiCashless/tampilCashless'), 'class="form-horizontal"'); ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-horizontal">
                                        <div class="form-group">

                                            <div class="col-lg-3">
                                                <input class="form-control form_date" type="text" name="tanggal" value="<?= $tanggal; ?>" placeholder="Pilih Tanggal" autocomplete="off">
                                                <span style="color:red;"><?php echo form_error('tanggal'); ?></span>
                                            </div>

                                            <div class="col-lg-1">
                                                <button class="btn btn-warning" type="submit" name="submit" value="tampilTransaksi">
                                                    <i class="glyphicon glyphicon-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>

                            <?php if (!$dataCashless) { ?>
                                <div class="col-md-12">
                                    <br>
                                    <h5><b>Tidak Ada Data</b></h5>
                                </div>
                            <?php } else { ?>
                                <div id="dataTable">
                                    <br><br>
                                    <h3>Data Non Tunai (Cashless)</h3><br>
                                    <div class="table-responsive" style="border:none;">
                                        <table class="table table-bordered table-striped" id="table_cashless">
                                            <col width="2%">
                                            <col width="10%">
                                            <col width="10%">
                                            <col width="10%">
                                            <col width="10%">

                                            <thead>
                                                <tr class="th-bg">
                                                    <th class="text-center">No</th>
                                                    <th class="text-center"><b>Tanggal Proses</b></th>
                                                    <th class="text-center"><b>E-Money</b></th>
                                                    <th class="text-center"><b>QRIS</b></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php $no = 1; ?>
                                                <?php foreach ($dataCashless as $key => $datas) { ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $no++ ?></td>
                                                        <td class="text-center"><?php echo date('d-m-Y H:i:s', strtotime($datas->tanggalProses)) ?></td>
                                                        <td class="text-right"><?php echo number_format($datas->nominalEmoney) ?></td>
                                                        <td class="text-right"><?php echo number_format($datas->nominalQRIS) ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table><br>
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
        $('#table_cashless').DataTable({
            "searching": false,
            "lengthChange": false,
            // "bPaginate": false,
            "bInfo": false
        });
    })
</script>