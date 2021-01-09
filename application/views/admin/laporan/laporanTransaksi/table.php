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
                    <li class="active">Laporan Transaksi</li>
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
                                <div class="menu">
                                  Laporan Transaksi
                                </div>
                              </div>
                            </a>
                            <a href="<?php echo base_url('admin/laporan/laporanSetoran') ?>">
                              <div class="col-md-6 main-menu">
                                <div class="menu disabled">
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

                                <?php echo form_open(base_url('admin/laporan/tampilLaporanTransaksi'), 'class="form-horizontal"'); ?>
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

                              <?php if($dataLaporanTransaksi->pesan == "Data Kosong") { ?>
                                <div class="col-md-12">
                                  <br><h3><?php echo $dataLaporanTransaksi->pesan ?></h3>
                                </div>
                              <?php } else if($dataLaporanTransaksi->pesan == "success") { ?>
                                <div  id="dataTable" class="col-md-12">
                                  <br><h3>Laporan Transaksi</h3>
                                  <div class="table-responsive" style="border:none;">
                                  <table class="table table-bordered table-striped">
                                    <col width="2%">
                                    <col width="8%">
                                    <col width="10%">
                                    <col width="10%">
                                    <col width="10%">
                                    <col width="10%">
                                    <col width="10%">
                                    <col width="10%">

                                    <thead>
                                      <tr class="th-bg">
                                        <th class="text-center" rowspan="2"><b>Produk Bus</b></th>
                                        <th class="text-center" colspan="3"><b>Tunai</b></th>
                                        <th class="text-center" colspan="3"><b>Non Tunai</b></th>
                                        <th class="text-center" rowspan="2"><b>Aksi</b></th>
                                      </tr>
                                      <tr>
                                        <th class="text-center"><b>Pnp</b></th>
                                        <th class="text-center"><b>Rp</b></th>
                                        <th class="text-center"><b>MDR</b></th>

                                        <th class="text-center"><b>Pnp</b></th>
                                        <th class="text-center"><b>Rp</b></th>
                                        <th class="text-center"><b>MDR</b></th>
                                      </tr>
                                    </thead>

                                    <tbody>
                                      <?php foreach ($dataLaporanTransaksi->data as $key => $datas) { ?>
                                          <tr>
                                            <td class="text-center"><?php echo $datas->kodeBus ?></td>
                                            <td class="text-center"><?php echo $datas->pnpTunai ?></td>
                                            <td class="text-right"><?php echo number_format($datas->totalTunai) ?></td>
                                            <td class="text-right"><?php echo number_format($datas->mdrTunai) ?></td>
                                            <td class="text-center"><?php echo $datas->pnpNonTunai ?></td>
                                            <td class="text-right"><?php echo number_format($datas->totalNonTunai) ?></td>
                                            <td class="text-right"><?php echo number_format($datas->mdrNonTunai) ?></td>
                                            <td class="text-center">
                                            <!-- <a id="detail_transaksi" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-detail"
                                              data-namaTrayek=""
                                              data-pnpTunai=""
                                              data-totalTunai=""
                                              data-pnpNonTunai=""
                                              data-totalNonTunai="">Detail</a> -->

                                            <!-- <a href="<?php echo base_url('admin/laporan/detailTransaksi/'.$key) ?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-detail">Detail</a> -->

                                            <a href="<?php echo base_url('admin/laporan/detailTransaksi/'.$key) ?>" class="btn btn-success btn-sm">Detail</a>
                                            </td>
                                          </tr>
                                      <?php } ?>
                                    </tbody>
                                    <tfoot>
                                      <tr>
                                        <td class="text-center"><b>TOTAL</b></td>
                                        <td class="text-center"><?php echo $dataLaporanTransaksi->totalPnpTunai ?></td>
                                        <td class="text-right"><?php echo number_format($dataLaporanTransaksi->totalRpTunai) ?></td>
                                        <td class="text-right"><?php echo number_format($dataLaporanTransaksi->totalMdrTunai) ?></td>
                                        <td class="text-center"><?php echo $dataLaporanTransaksi->totalPnpNonTunai ?></td>
                                        <td class="text-right"><?php echo number_format($dataLaporanTransaksi->totalRpNonTunai) ?></td>
                                        <td class="text-right"><?php echo number_format($dataLaporanTransaksi->totalMdrNonTunai) ?></td>
                                        <td></td>
                                      </tr>
                                      <!-- <tr>
                                      <td colspan="6" class="text-center">
                                      <div st-pagination="" st-items-by-page="perPage" st-displayed-pages="pageSize"></div>
                                    </td>
                                  </tr> -->
                                </tfoot>
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

<!-- <div class="modal fade" id="modal-detail">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" name="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4>Detail Transaksi</h4>
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
                <td><span id="jurusan"></span></td>
                <td><span id="pnpTunai"></span></td>
                <td><span id="totalTunai"></span></td>
                <td><span id="pnpNonTunai"></span></td>
                <td><span id="totalNonTunai"></span></td>
              </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div> -->

<!-- <script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click', '#detail_transaksi', function() {
      var jurusan = $(this).data('namaTrayek');
      var pnpTunai = $(this).data('pnpTunai');
      var totalTunai = $(this).data('totalTunai');
      var pnpNonTunai = $(this).data('pnpNonTunai');
      var totalNonTunai = $(this).data('totalNonTunai');

      $('#jurusan').text(jurusan);
      $('#pnpTunai').text(pnpTunai);
      $('#totalTunai').text(totalTunai);
      $('#pnpNonTunai').text(pnpNonTunai);
      $('#totalNonTunai').text(totalNonTunai);
    });
  });
</script> -->
