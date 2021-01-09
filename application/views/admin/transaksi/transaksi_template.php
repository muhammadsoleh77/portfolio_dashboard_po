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
</style>
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                    <li class="active">Transaksi</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <!-- START LAPORAN -->
                    <?php if($dataUser->idPo == 3) { ?>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="panel panel-default">
                            <div class="panel-body">
                              <a href="<?php echo base_url('admin/transaksi/transaksiManualAgra') ?>">
                                <div class="col-md-4 main-menu">
                                  <div class="menu">
                                    Transaksi Manual
                                  </div>
                                </div>
                              </a>
                              <a href="<?php echo base_url('admin/transaksi/transaksiBiayaLainAgra') ?>">
                                <div class="col-md-4 main-menu">
                                  <div class="menu">
                                    Transaksi Biaya Lain
                                  </div>
                                </div>
                              </a>
                              <a href="<?php echo base_url('admin/transaksi/hapusTransaksiAgra') ?>">
                                <div class="col-md-4 main-menu">
                                  <div class="menu">
                                    Hapus Transaksi
                                  </div>
                                </div>
                              </a>
                            </div>
                          </div>
                        </div>
                        <!-- <div class="content-top clearfix" ng-show="updateAgen.length > 0">
                        <h2>&nbsp;</h2>
                      </div> -->

                      <!-- <update-agen ng-show="updateAgen.length > 0"></update-agen> -->

                      <div class="content-top clearfix">
                        <h2>&nbsp;</h2>
                      </div>
                    </div>
                    <?php } ?>
                    <!-- END LAPORAN -->

                    <!-- START LAPORAN -->
                    <?php if($dataUser->idPo == 4) { ?>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="panel panel-default">
                            <div class="panel-body">
                              <a href="<?php echo base_url('admin/transaksi/transaksiManualLorena') ?>">
                                <div class="col-md-6 main-menu">
                                  <div class="menu">
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
                        <!-- <div class="content-top clearfix" ng-show="updateAgen.length > 0">
                        <h2>&nbsp;</h2>
                      </div> -->

                      <!-- <update-agen ng-show="updateAgen.length > 0"></update-agen> -->

                      <div class="content-top clearfix">
                        <h2>&nbsp;</h2>
                      </div>
                    </div>
                    <?php } ?>
                    <!-- END LAPORAN -->
