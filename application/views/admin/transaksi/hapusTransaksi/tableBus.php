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
                    <li class="active">Hapus Transaksi</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <!-- START LAPORAN -->
                    <div class="row">
                      <div class="col-md-12">
                        <div class="panel panel-default">
                          <div class="panel-body">
                            <a href="<?php echo base_url('admin/transaksi/transaksiManualLorena') ?>">
                              <div class="col-md-6 main-menu">
                                <div class="menu disabled">
                                  Transaksi Manual
                                </div>
                              </div>
                            </a>
                            <a href="<?php echo base_url('admin/transaksi/hapusTransaksiLorena') ?>">
                              <div class="col-md-6 main-menu">
                                <div class="menu">
                                  Hapus Transaksi
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

                                <?php echo form_open(base_url('admin/transaksi/tampil'), 'class="form-horizontal"'); ?>
                                <div class="row">
                                <div class="col-md-12">
                                  <div class="form-horizontal">
                                    <div class="form-group">

                                        <?php echo validation_errors('<div class="alert alert-warning">','</div>'); ?>
                                          <div class="col-lg-3">
                                            <input class="form-control form_date" type="text" name="tanggal" value="" placeholder="Pilih Tanggal" readonly>
                                          </div>

                                          <div class="col-lg-3">
                                            <select id="pilihLoketBus" class="form-control select" name="pilihLoketBus">
                                              <option value="" disabled selected>Pilih Loket / Bus</option>
                                              <option value="loket">Loket</option>
                                              <option value="bus">Bus</option>
                                            </select>
                                          </div>

                                          <div class="col-lg-3" id="pilihLoket">
                                            <select class="form-control select" name="pilihLoket">
                                              <option value="" disabled selected>Pilih Loket</option>
                                              <?php foreach ($dataLoket as $dataLoket) { ?>
                                                <option value="<?php echo $dataLoket->id ?>"><?php echo $dataLoket->nama ?></option>
                                              <?php } ?>
                                            </select>
                                          </div>

                                          <?php if($dataUser->idPo == 3) { ?>
                                            <div class="col-lg-3" id="pilihBus">
                                              <select class="form-control select" name="pilihBus">
                                                <option value="" disabled selected>Pilih Bus</option>
                                                <?php foreach ($dataBusAgra as $dataBusAgra) { ?>
                                                  <option value="<?php echo $dataBusAgra->idBus ?>"><?php echo $dataBusAgra->id ?></option>
                                                <?php } ?>
                                              </select>
                                            </div>
                                          <?php } else if($dataUser->idPo == 4) { ?>
                                            <div class="col-lg-3" id="pilihBus">
                                              <select class="form-control select" name="pilihBus">
                                                <option value="" disabled selected>Pilih Bus</option>
                                                <?php foreach ($dataBus->data as $dataBus) { ?>
                                                  <option value="<?php echo $dataBus->idBus ?>"><?php echo $dataBus->kodeBus ?></option>
                                                <?php } ?>
                                              </select>
                                            </div>
                                          <?php } ?>

                                          <div class="col-lg-1" id="tampilLoket">
                                            <button class="btn btn-warning" type="submit" name="submit" value="tampilLoket">
                                                <i class="glyphicon glyphicon-search"></i>
                                            </button>
                                          </div>

                                          <div class="col-lg-1" id="tampilBus">
                                            <button class="btn btn-warning" type="submit" name="submit" value="tampilBus">
                                                <i class="glyphicon glyphicon-search"></i>
                                            </button>
                                          </div>

                                    </div>
                                  </div>
                                  <!-- <hr> -->
                                </div>
                              </div>
                              <?php echo form_close(); ?>

                              <?php if(!$listDataBus) { ?>
                                <div class="col-md-12">
                                  <br><h5>Tidak Ada Data</h5>
                                </div>
                              <?php } else if($listDataBus) { ?>
                                <div  id="dataTable">
                                  <br><h3>Daftar Transaksi (Bus)</h3>
                                  <div class="table-responsive" style="border:none;">
                                  <table class="table table-bordered table-striped">
                                    <col width="2%">
                                    <col width="8%">
                                    <col width="10%">
                                    <col width="10%">
                                    <col width="10%">
                                    <col width="10%">
                                    <col width="10%">
                                    <col width="5%">

                                    <thead>
                                      <tr class="th-bg">
                                        <th class="text-center"><b>ID Transaksi</b></th>
                                        <th class="text-center"><b>Nama Penumpang</b></th>
                                        <th class="text-center"><b>No Telepon</b></th>
                                        <th class="text-center"><b>Waktu Berangkat</b></th>
                                        <th class="text-center"><b>Waktu Transaksi</b></th>
                                        <th class="text-center"><b>No. Tiket</b></th>
                                        <th class="text-center"><b>Keterangan</b></th>
                                        <th class="text-center"><b>Aksi</b></th>
                                      </tr>
                                    </thead>

                                    <tbody>
                                      <?php foreach ($listDataBus as $key => $listDataBus) { ?>
                                        <tr>
                                          <td class="text-center"><?php echo $listDataBus->idTransaksi ?></td>
                                          <td class="text-center"><?php echo $listDataBus->namaPenumpang ?></td>
                                          <td class="text-center"><?php echo $listDataBus->noTelpon ? $listDataBus->noTelpon : "-" ?></td>
                                          <td class="text-center"><?php echo $listDataBus->waktu ?></td>
                                          <td class="text-center"><?php echo $listDataBus->waktuTransaksi ?></td>
                                          <td class="text-center"><?php echo $listDataBus->noTiket ?></td>
                                          <td class="text-center"><?php echo $listDataBus->isTransaksiManual ? "Transaksi Dashboard" : "Transaksi Device" ?></td>
                                          <td class="text-center">
                                            <a href="<?php echo base_url('admin/transaksi/hapusTransaksiItem/'.$key) ?>" class="btn btn-danger btn-md"><i class="fa fa-trash-o"></i></a>
                                            <!-- <button class="btn btn-danger btn-md" ng-click="hapus($index)"><i class="fa fa-trash-o"></i></button> -->
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
                            </table>
                          </div>
                          </div>
                              <?php } ?>

                              </div>
                            </div>
                          </div>
                        </div>


                      </div>
                    </div>
