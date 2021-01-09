<style media="screen">
  .main-menu {
    text-align:center;
    padding:10px;
  }
  .menu {
    /* font-size:16px; */
    background-color:#e0af1b;
    border:2px solid #e0af1b;
    border-radius:6px;
    padding:10px;
    color:#fff;
  }
  .menu:hover {
    background-color:#fff;
    color:#e0af1b;
    cursor:pointer;
    border:2px solid #e0af1b;
  }
  .disabled {
    border: 2px solid #ddd;
    background-color: #ddd;
    cursor: pointer;
  }
</style>
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                    <li class="active">Laporan Setoran</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <!-- START LAPORAN -->
                    <div class="row">
                      <div class="col-md-12">
                        <div class="panel panel-default">
                          <div class="panel-body">
                            <a href="<?php echo base_url('admin/laporan/laporanTransaksi') ?>">
                              <div class="col-md-6 main-menu">
                                <div class="menu disabled">
                                  Laporan Transaksi
                                </div>
                              </div>
                            </a>
                            <a href="<?php echo base_url('admin/laporan/laporanSetoran') ?>">
                              <div class="col-md-6 main-menu">
                                <div class="menu">
                                  Laporan Setoran
                                </div>
                              </div>
                            </a>
                          </div>
                        </div>
                      </div>

                      <div class="content-top clearfix">
                        <h2>&nbsp;</h2>
                      </div>
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
                                            <input class="form-control form_date" type="text" name="tanggalAwal" value="" placeholder="Tanggal Awal" readonly>
                                            <span style="color:red;"><?php echo form_error('tanggalAwal'); ?></span>
                                          </div>

                                          <div class="col-lg-3">
                                            <input class="form-control form_date" type="text" name="tanggalAkhir" value="" placeholder="Tanggal Akhir" readonly>
                                            <span style="color:red;"><?php echo form_error('tanggalAkhir'); ?></span>
                                          </div>

                                          <div class="col-lg-3">
                                            <select class="form-control select" name="pilihTypeBus">
                                              <option value="" disabled selected>Pilih Type Produk(Bus)</option>
                                              <option value="0">Semua</option>
                                              <option value="1">JAC</option>
                                              <option value="2">JRC</option>
                                            </select>
                                          </div>

                                          <div class="col-lg-1">
                                            <button class="btn btn-warning" type="submit" name="submit" value="tampil">
                                                <i class="glyphicon glyphicon-search"></i>
                                            </button>
                                          </div>

                                    </div>
                                  </div>
                                  <!-- <hr> -->
                                </div>
                              </div>
                              <?php echo form_close(); ?>

                              <?php if(!$dataLaporanSetoran->data) { ?>
                                <div class="col-md-12">
                                  <br><h3>Tidak Ada Data</h3>
                                </div>
                              <?php } else if($dataLaporanSetoran->data) { ?>
                                <!-- <div  id="dataTable" class="col-md-12"> -->
                                <div  id="dataTable">
                                  <br><h3>Laporan Setoran</h3>
                                  <div class="table-responsive" style="border:none;">
                                  <table class="table table-bordered table-striped">
                                    <col width="10%">
                                    <col width="10%">
                                    <col width="10%">
                                    <col width="10%">
                                    <col width="10%">
                                    <col width="10%">

                                    <thead>
                                      <tr class="th-bg">
                                        <th class="text-center"><b>Waktu Transaksi</b></th>
                                        <th class="text-center"><b>Waktu Setor</b></th>
                                        <th class="text-center"><b>Produk (Bus)</b></th>
                                        <th class="text-center"><b>Jumlah Bayar Tunai</b></th>
                                        <th class="text-center"><b>Jumlah Bayar Non Tunai</b></th>
                                        <th class="text-center"><b>Aksi</b></th>
                                      </tr>
                                    </thead>

                                    <tbody>
                                      <?php foreach ($dataLaporanSetoran->data as $key => $datas) { ?>
                                        <?php foreach ($datas->detail as $key2 => $dataDetail) { ?>
                                            <tr>
                                              <td class="text-center"><?php echo $datas->tglTransaksi ?></td>
                                              <td class="text-center"><?php echo $dataDetail->waktuSetor ?></td>
                                              <td class="text-center"><?php echo $dataDetail->kodeBus ?></td>
                                              <td class="text-right"><?php echo number_format($dataDetail->jmlBayarTunai) ?></td>
                                              <td class="text-right"><?php echo number_format($dataDetail->jmlBayarNonTunai) ?></td>
                                              <td class="text-center">
                                                <a class="btn btn-success btn-sm" href="<?php echo base_url('admin/laporan/detailLaporanSetoran/'.$dataDetail->idBus); ?>">Detail</a>
                                                <!-- <?php foreach ($dataDetail->detail2 as $dataDetail2) { ?>
                                                  <a id="detail_setoran" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-detail"
                                                  data-namaTrayek="<?php echo $dataDetail2->namaTrayek ?>"
                                                  data-pnpTunai=""
                                                  data-totalTunai=""
                                                  data-pnpNonTunai=""
                                                  data-totalNonTunai=""
                                                  >Detail</a>
                                                <?php } ?> -->
                                                <!-- <button class="btn btn-success btn-sm" ng-click="detail(item, $index)">Detail</button> -->
                                              </td>
                                            </tr>
                                        <?php } ?>
                                      <?php } ?>
                                    </tbody>
                                    <!-- <tfoot> -->
                                      <!-- <tr>
                                      <td colspan="6" class="text-center">
                                      <div st-pagination="" st-items-by-page="perPage" st-displayed-pages="pageSize"></div>
                                    </td>
                                  </tr> -->
                                <!-- </tfoot> -->
                              </table><br>
                            </div>

                              <div class="pull-right">
                                <a href="<?php echo base_url('admin/laporan/cetakExcel') ?>" class="btn btn-primary pull-right">
                                    <i class="fa fa-file-excel-o"></i>&nbsp;Simpan xls
                                </a>
                                <!-- <button class="btn btn-primary pull-right" type="submit" name="submit" value="cetakExcel">
                                    <i class="fa fa-file-excel-o"></i>&nbsp;Simpan xls
                                </button> -->
                              </div>

                            </div>
                              <?php } ?>


                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

<div class="modal fade" id="modal-detail">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" name="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4>Detail Setoran</h4>
      </div>
      <div class="modal-body table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-center" rowspan="2"><b>Jurusan</b></th>
              <th class="text-center" colspan="2"><b>Tunai</b></th>
              <th class="text-center" colspan="2"><b>Non Tunai</b></th>
            </tr>
            <tr>
              <th class="text-center"><b>Pnp</b></th>
              <th class="text-center"><b>Rp</b></th>

              <th class="text-center"><b>Pnp</b></th>
              <th class="text-center"><b>Rp</b></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-center"><span id="jurusan"></span></td>
              <td class="text-center"><span id="pnpTunai"></span></td>
              <td class="text-right"><span id="totalTunai"></span></td>
              <td class="text-center"><span id="pnpNonTunai"></span></td>
              <td class="text-right"><span id="totalNonTunai"></span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click', '#detail_setoran', function() {
      var jurusan = $(this).data('namatrayek');
      console.log(jurusan);
      var pnpTunai = $(this).data('pnptunai');
      var totalTunai = $(this).data('totaltunai');
      var pnpNonTunai = $(this).data('pnpnontunai');
      var totalNonTunai = $(this).data('totalnontunai');

      $('#jurusan').text(jurusan);
      $('#pnpTunai').text(pnpTunai);
      $('#totalTunai').text(totalTunai);
      $('#pnpNonTunai').text(pnpNonTunai);
      $('#totalNonTunai').text(totalNonTunai);
    });
  });
</script>
