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
    <li class="active"><b>Laporan Setoran</b></li>
  </ul>
  <!-- END BREADCRUMB -->

  <div class="widgets">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default bootstrap-panel">
          <div>
            <div class="panel-body">

              <?php echo form_open(base_url('admin/laporanSetoran/tampil'), 'class="form-horizontal"'); ?>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-horizontal">
                    <div class="form-group">

                      <div class="col-lg-3">
                        <input class="form-control form_date" type="text" name="tanggal" value="" placeholder="Tanggal">
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

              <?php if (!$listTampilLapSetoran) { ?>
                <div class="col-md-12">
                  <br>
                  <h5><b>Tidak Ada Data</b></h5>
                </div>
              <?php } else { ?>
                <div id="dataTable">
                  <br><br>
                  <h3>List Laporan Setoran</h3><br>
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
                          <th class="text-center"><b>Produk (BUS)</b></th>
                          <th class="text-center"><b>No. Document</b></th>
                          <th class="text-center"><b>Tanggal Proses</b></th>
                          <th class="text-center"><b>Aksi</b></th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($listTampilLapSetoran as $key => $dataLapSetoran) { ?>
                          <tr>
                            <td class="text-center"><?php echo $no++ ?></td>
                            <td class="text-center"><?php echo $dataLapSetoran->kodeBus ? $dataLapSetoran->kodeBus : '--' ?></td>
                            <td class="text-center"><?php echo $dataLapSetoran->noDocument ?></td>
                            <!-- <td class="text-center"><?php echo date('d F Y'.' -- '.'H:m:s', strtotime($dataLapSetoran->tglProses)) ?></td> -->
                            <td class="text-center"><?php echo date('d-m-Y H:i:s', strtotime ($dataLapSetoran->tglProses)) ?></td>
                            <!-- <td class="text-center" data-toggle="modal" data-target="#modal-detail"> -->
                            <td class="text-center">
                              <!-- <a href="#" class="btn btn-success">Rincian</a> -->
                              <a href="<?php echo base_url('admin/laporanSetoran/rincian/' . $dataLapSetoran->idSAPReport) ?>" class="btn btn-success btn-md">Rincian</a>
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


<div class="modal fade" id="modal-detail">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" name="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4>Detail Setoran Bus</h4>
      </div>
      <div class="modal-body table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-center" rowspan="2" style="vertical-align:middle; text-align:center;"><b>Jurusan</b></th>
              <th class="text-center" rowspan="2" style="vertical-align:middle; text-align:center;"><b>Harga</b></th>
              <th class="text-center" colspan="2"><b>Tunai</b></th>
              <th class="text-center" colspan="2"><b>Non Tunai</b></th>
              <th class="text-center" colspan="2"><b>Total</b></th>
            </tr>
            <tr>
              <th class="text-center">Pnp</th>
              <th class="text-center">Rp</th>
              <th class="text-center">Pnp</th>
              <th class="text-center">Rp</th>
              <th class="text-center">Pnp</th>
              <th class="text-center">Rp</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($listDataSetoran->data as $data) { ?>
              <?php $no = 1;
              foreach ($data->detail2 as $dataDetail) { ?>
                <tr>
                  <td class="text-center"><span id="tglTransaksi"><?php echo $dataDetail->namaTrayek ?></span></td>
                  <td class="text-center"><span id="produk"><?php echo number_format($data->unitPrice) ?></span></td>
                  <td class="text-center"><span id="jmlPnpTunai"><?php echo $dataDetail->jmlPnpTunai ?></span></td>
                  <td class="text-right"><span id="jmlBayarTunai"><?php echo number_format($dataDetail->jmlBayarTunai) ?></span></td>
                  <td class="text-center"><span id="jmlPnpNonTunai"><?php echo $dataDetail->jmlPnpNonTunai ?></span></td>
                  <td class="text-right"><span id="jmlBayarNonTunai"><?php echo number_format($dataDetail->jmlBayarNonTunai) ?></span></td>
                  <td class="text-center"><?= ($dataDetail->jmlPnpTunai + $dataDetail->jmlPnpNonTunai) ?></td>
                  <td class="text-right"><?= number_format($dataDetail->jmlBayarTunai + $dataDetail->jmlBayarNonTunai) ?></td>
                </tr>
              <?php } ?>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>