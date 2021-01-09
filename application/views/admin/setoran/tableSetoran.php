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
    <li class="active"><b>Setoran</b></li>
  </ul>
  <!-- END BREADCRUMB -->

  <div class="widgets">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default bootstrap-panel">
          <div>
            <div class="panel-body">

              <?php echo form_open(base_url('admin/setoran/tampil'), 'class="form-horizontal"'); ?>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-horizontal">
                    <div class="form-group">

                      <div class="col-lg-3">
                        <input class="form-control form_date" type="text" name="tanggal" value="<?= $tanggal ?>" placeholder="Tanggal">
                        <span style="color:red;"><?php echo form_error('tanggal'); ?></span>
                      </div>

                      <!-- <div class="col-lg-3">
                        <input class="form-control form_date" type="text" name="tanggalAkhir" value="" placeholder="Tanggal Akhir" readonly>
                        <span style="color:red;"><?php echo form_error('tanggalAkhir'); ?></span>
                      </div> -->

                      <div class="col-lg-3">
                        <select id="pilihTypeProduk" class="form-control select" name="pilihTypeProduk">
                          <option value="" disabled selected>Pilih Type Produk(Bus)</option>
                          <!-- <option value="0">Semua</option> -->
                          <option value="1" <?php echo set_select('pilihTypeProduk','1', ( !empty($data) && $data == "1" ? TRUE : FALSE )); ?>>JAC</option>
                          <option value="2" <?php echo set_select('pilihTypeProduk','2', ( !empty($data) && $data == "2" ? TRUE : FALSE )); ?>>JRC</option>
                          <option value="3" <?php echo set_select('pilihTypeProduk','3', ( !empty($data) && $data == "3" ? TRUE : FALSE )); ?>>TJR</option>
                        </select>
                        <span style="color:red;"><?php echo form_error('pilihTypeProduk'); ?></span>
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

              <?php if (!$listDataSetoran->data) { ?>
                <div class="col-md-12">
                  <br>
                  <h5><b>Tidak Ada Data</b></h5>
                </div>
              <?php } else { ?>
                <div id="dataTable">
                  <br><br>
                  <h3>List Data Setoran</h3><br>
                  <div class="table-responsive" style="border:none;">
                    <table class="table table-bordered table-striped">
                      <!-- <col width="15%">
                      <col width="15%">
                      <col width="15%">
                      <col width="15%">
                      <col width="5%"> -->

                      <thead>
                        <tr class="th-bg">
                          <th class="text-center" rowspan="2" style="vertical-align: middle;"><b>Produk(Bus)</b></th>
                          <th class="text-center" colspan="2"><b>Tunai</b></th>
                          <th class="text-center" colspan="2"><b>E-Money</b></th>
                          <th class="text-center" colspan="2"><b>QRIS</b></th>
                          <th class="text-center" rowspan="2" style="vertical-align:middle; width:10%;"><b>Aksi</b></th>
                        </tr>
                        <tr>
                          <th class="text-center"><b>Pnp</b></th>
                          <th class="text-center"><b>Rp</b></th>
                          <th class="text-center"><b>Pnp</b></th>
                          <th class="text-center"><b>Rp</b></th>
                          <th class="text-center"><b>Pnp</b></th>
                          <th class="text-center"><b>Rp</b></th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php foreach ($listDataSetoran->data as $key => $dataSetoran) { ?>
                          <tr>
                            <td class="text-center"><?php echo $dataSetoran->kodeBus ?></td>
                            <td class="text-center"><?php echo $dataSetoran->jmlPnpTunai ?></td>
                            <td class="text-right"><?php echo number_format($dataSetoran->jmlBayarTunai) ?></td>
                            <td class="text-center"><?php echo ($dataSetoran->jmlPnpEmoney) ?></td>
                            <td class="text-right"><?php echo number_format($dataSetoran->jmlBayarEmoney) ?></td>
                            <td class="text-center"><?php echo ($dataSetoran->jmlPnpQris) ?></td>
                            <td class="text-right"><?php echo number_format($dataSetoran->jmlBayarQris) ?></td>
                            <!-- <td class="text-center" data-toggle="modal" data-target="#modal-detail"> -->
                            <td class="text-center">
                              <!-- <a href="#" class="btn btn-success">Rincian</a> -->
                              <a href="<?php echo base_url('admin/setoran/rincian/' . $key) ?>" class="btn btn-success btn-md">Rincian</a>
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