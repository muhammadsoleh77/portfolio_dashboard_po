<div class="widgets" style="margin-top: 50px;">
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard') ?>"><b>Home</b></a></li>
        <li><a href="<?php echo base_url('admin/laporanSetoran') ?>"><b>Laporan Setoran</b></a></li>
        <li class="active"><b>Rincian Laporan Setoran</b></li>
    </ul>
    <!-- END BREADCRUMB -->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default bootstrap-panel">
                <div class="">
                    <div class="col-md-12">
                        <br>
                        <h4 class="text-center"><b>RINCIAN LAPORAN SETORAN BUS (<?php echo $rincianLapSetoran->kodeBus ?>)</b></h4><br>
                        <div class="table-responsive" style="border: none;">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle;"><b>Jurusan</b></th>
                                        <th class="text-center"><b>Tunai (Rp)</b></th>
                                        <th class="text-center"><b>E-Money (Rp)</b></th>
                                        <th class="text-center"><b>QRIS (Rp)</b></th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle;">Total Penumpang</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center"><b>Rp</b></th>
                                        <th class="text-center"><b>Rp</b></th>
                                        <th class="text-center"><b>Rp</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($rincianLapSetoran->detail as $key => $rincian) { ?>
                                        <tr>
                                            <td class="text-center"><?= $rincian->trayek ?></td>
                                            <td class="text-center"><?= $rincian->jmlBayarTunai ?></td>
                                            <td class="text-center"><?= $rincian->jmlBayarEmoney ?></td>
                                            <td class="text-center"><?= $rincian->jmlBayarQris ?></td>
                                            <td class="text-center"><?= $rincian->jmlPnp ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="text-center" style="vertical-align: middle;"><b>Total</b></td>
                                        <td class="text-center">
                                            <b>
                                                <?php
                                                $totalBayarTunai = 0;
                                                foreach ($rincianLapSetoran->detail as $totalTunai) {
                                                $totalBayarTunai += ($totalTunai->jmlBayarTunai);
                                                };
                                                echo number_format($totalBayarTunai);
                                                ?>
                                            </b>
                                        </td>
                                        <td class="text-center">
                                            <b>
                                                <?php
                                                $totalBayarEmoney = 0;
                                                foreach ($rincianLapSetoran->detail as $totalEmoney) {
                                                $totalBayarEmoney += ($totalEmoney->jmlBayarEmoney);
                                                };
                                                echo number_format($totalBayarEmoney);
                                                ?>
                                            </b>
                                        </td>
                                        <td class="text-center">
                                            <b>
                                                <?php
                                                $totalBayarQris = 0;
                                                foreach ($rincianLapSetoran->detail as $totalQris) {
                                                $totalBayarQris += ($totalQris->jmlBayarQris);
                                                };
                                                echo number_format($totalBayarQris);
                                                ?>
                                            </b>
                                        </td>
                                        <td class="text-center">
                                            <b>
                                                <?php
                                                $totalSeluruhPnp = 0;
                                                foreach ($rincianLapSetoran->detail as $totalPnp) {
                                                $totalSeluruhPnp += ($totalPnp->jmlPnp);
                                                };
                                                echo number_format($totalSeluruhPnp);
                                                ?>
                                            </b>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- </div> -->
                        </div>

                        <div class="col-md-12">
                            <a href="<?= base_url('admin/laporanSetoran') ?>" class="btn btn-info" type="button">
                                <i class="fa fa-arrow-left"></i> Kembali
                            </a><br><br><br>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>