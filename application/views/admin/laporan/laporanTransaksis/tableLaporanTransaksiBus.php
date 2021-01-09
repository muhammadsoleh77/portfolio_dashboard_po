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
                                                <!-- <span style="color:red;"><?php echo form_error('pilihLoketBus'); ?></span> -->
                                            </div>

                                            <div class="col-lg-2" id="pilihLoket">
                                                <select class="form-control select" name="pilihLoket">
                                                    <option value="" disabled selected>Pilih Loket</option>
                                                    <?php foreach ($dataLoket->content as $key => $data) { ?>
                                                        <option value="<?php echo $data->id ?>"><?php echo $data->nama ?></option>
                                                    <?php } ?>
                                                </select>
                                                <!-- <span style="color:red;"><?php echo form_error('pilihLoket'); ?></span> -->
                                            </div>

                                            <div class="col-lg-2" id="pilihBus">
                                                <select class="form-control select" name="pilihBus">
                                                    <option value="" disabled selected>Pilih Type Bus</option>
                                                    <option value="0" <?php echo set_select('pilihBus','0', ( !empty($data) && $data == "0" ? TRUE : FALSE )); ?>>ALL</option>
                                                    <option value="1" <?php echo set_select('pilihBus','1', ( !empty($data) && $data == "1" ? TRUE : FALSE )); ?>>JAC</option>
                                                    <option value="2" <?php echo set_select('pilihBus','2', ( !empty($data) && $data == "2" ? TRUE : FALSE )); ?>>JRC</option>
                                                    <option value="3" <?php echo set_select('pilihBus','3', ( !empty($data) && $data == "3" ? TRUE : FALSE )); ?>>TJR</option>
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

                            <?php if (!$listTampilLapTransaksiBus->data) { ?>
                                <div class="col-md-12">
                                    <br>
                                    <h5><b>Tidak Ada Data</b></h5>
                                </div>
                            <?php } else { ?>
                                <div id="dataTable">
                                    <br><br>
                                    <h3>List Laporan Transaksi (Bus)</h3><br>
                                    <div class="table-responsive" style="border:none;">
                                        <table class="table table-bordered table-striped">
                                            <col width="10%">
                                            <col width="10%">
                                            <col width="10%">
                                            <col width="10%">
                                            <col width="10%">

                                            <thead>
                                                <tr class="th-bg">
                                                    <!-- <th class="text-center" rowspan="2" style="vertical-align:middle;"><b>Tanggal Transaksi</b></th> -->
                                                    <th class="text-center" rowspan="2" style="vertical-align:middle;"><b>Produk (Bus)</b></th>
                                                    <th class="text-center" colspan="3"><b>Tunai</b></th>
                                                    <th class="text-center" colspan="3"><b>E-Money</b></th>
                                                    <th class="text-center" colspan="3"><b>QRIS</b></th>
                                                    <th class="text-center" rowspan="2"><b>Aksi</b></th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center">Pnp</th>
                                                    <th class="text-center">Bayar</th>
                                                    <th class="text-center">MDR</th>
                                                    <th class="text-center">Pnp</th>
                                                    <th class="text-center">Bayar</th>
                                                    <th class="text-center">MDR</th>
                                                    <th class="text-center">Pnp</th>
                                                    <th class="text-center">Bayar</th>
                                                    <th class="text-center">MDR</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php $no = 1; ?>
                                                <?php foreach ($listTampilLapTransaksiBus->data as $key => $datas) { ?>
                                                    <tr>
                                                        <!-- <td class="text-center"><?php echo $no++ ?></td> -->
                                                        <!-- <td class="text-center"><?php echo $datas->tanggal ?></td> -->
                                                        <td class="text-center"><?php echo $datas->kodeBus ?></td>
                                                        <td class="text-center"><?php echo $datas->jmlPnp ?></td>
                                                        <td class="text-right"><?php echo number_format($datas->jmlBayarTunai) ?></td>
                                                        <td class="text-right"><?php echo number_format($datas->mdrTunai) ?></td>
                                                        <td class="text-center"><?php echo $datas->jmlPnpEmoney ?></td>
                                                        <td class="text-right"><?php echo number_format($datas->jmlBayarEmoney) ?></td>
                                                        <td class="text-right"><?php echo number_format($datas->mdrTap) ?></td>
                                                        <td class="text-center"><?php echo $datas->jmlPnpQris ?></td>
                                                        <td class="text-right"><?php echo number_format($datas->jmlBayarQris) ?></td>
                                                        <td class="text-right"><?php echo number_format($datas->mdrQRIS) ?></td>
                                                        <td class="text-center">
                                                            <a data-toggle="modal" id="id_trayek" href="#myModal" data-id="<?php echo $datas->idBus ?>" class="btn btn-success btn-sm">Detail</a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
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

<!-- modal tampil detail -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Detail Transaksi Bus
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h4>
            </div>
            <div class="modal-body">
                <!-- <div class="fetched-data"></div> -->
                <table class="table table-striped table-bordered table-responsive" id="mydata">
                    <thead>
                        <tr>
                            <th class="text-center" rowspan="2" style="vertical-align: middle;">Unit Price</th>
                            <th class="text-center" rowspan="2" style="vertical-align: middle;">Nama Trayek</th>
                            <th class="text-center" rowspan="2" style="vertical-align: middle;">Asal</th>
                            <th class="text-center" rowspan="2" style="vertical-align: middle;">Tujuan</th>
                            <th class="text-center" colspan="2">Tunai</th>
                            <th class="text-center" colspan="2">E-Money</th>
                            <th class="text-center" colspan="2">QRIS</th>
                        </tr>
                        <tr>
                            <th class="text-center">Pnp</th>
                            <th class="text-center">Bayar</th>
                            <th class="text-center">Pnp</th>
                            <th class="text-center">Bayar</th>
                            <th class="text-center">Pnp</th>
                            <th class="text-center">Bayar</th>
                        </tr>
                    </thead>
                    <tbody id="show_data">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>
<!-- akhir modal tampil detail -->

<?php
// $tes = json_encode($listTampilLapTransaksiBus);
// echo "
//     <script>
//         var tes = " . $tes . ";
//     </script>
//     ";
?>

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
        console.log(val2);
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

<!-- trigger detail crew -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#myModal').on('show.bs.modal', function(e) {

            var tester = '<?= json_encode($listTampilLapTransaksiBus->data) ?>';
            var id_crew = $(e.relatedTarget).data('id');

            var dataDetail = JSON.parse(tester)

            var detail = '';
            dataDetail.forEach(function(el) {
                if (id_crew == el.idBus) {
                    detail = el.detail2
                }
            })

            var html = '';
            detail.forEach(function(el2) {
                var i;

                var bayarTunai = el2.jmlBayarTunai;
                var outputBayarTunai = parseInt(bayarTunai).toLocaleString();

                var bayarEmoney = el2.jmlBayarEmoney;
                var outputBayarEmoney = parseInt(bayarEmoney).toLocaleString();

                var bayarQris = el2.jmlBayarQris;
                var outputBayarQris = parseInt(bayarQris).toLocaleString();
                // for(i=0; i<data.length; i++){
                html += '<tr>' +
                    '<td class="text-center">' + el2.unitPrice + '</td>' +
                    '<td class="text-center">' + el2.namaTrayek + '</td>' +
                    '<td class="text-center">' + el2.lokasiAwal + '</td>' +
                    '<td class="text-center">' + el2.lokasiAkhir + '</td>' +
                    '<td class="text-center">' + el2.jmlPnpTunai + '</td>' +
                    '<td class="text-center">' + outputBayarTunai + '</td>' +
                    '<td class="text-center">' + el2.jmlPnpEmoney + '</td>' +
                    '<td class="text-center">' + outputBayarEmoney + '</td>' +
                    '<td class="text-center">' + el2.jmlPnpQris + '</td>' +
                    '<td class="text-center">' + outputBayarQris + '</td>' +
                    '</tr>';
                // }
            })
            $('#show_data').html(html);
        });

    });
</script>
<!-- End detail crew -->