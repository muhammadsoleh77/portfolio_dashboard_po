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

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
