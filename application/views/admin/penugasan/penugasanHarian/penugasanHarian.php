<style media="screen">
  .main-menu {
    text-align: center;
    padding: 10px;
  }

  .menu {
    /* font-size:16px; */
    background-color: #1A62D4;
    border: 2px solid #1A62D4;
    border-radius: 6px;
    padding: 10px;
    color: #fff;
  }

  .menu:hover {
    background-color: #fff;
    color: #1A62D4;
    cursor: pointer;
    border: 2px solid #1A62D4;
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
  <li class="active"><b>Penugasan Harian</b></li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

  <!-- START LAPORAN -->
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <a href="<?php echo base_url('admin/penugasan/default') ?>">
            <div class="col-md-6 main-menu">
              <div class="menu disabled">
                Penugasan Default
              </div>
            </div>
          </a>
          <a href="<?php echo base_url('admin/penugasan/harian') ?>">
            <div class="col-md-6 main-menu">
              <div class="menu">
                Penugasan Harian / SPJ
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
  <!-- END LAPORAN -->

  <?php
  // Notifikasi error
  // echo validation_errors('<div class="alert alert-warning">','</div>');

  echo form_open(base_url('admin/penugasan/tampilPenugasanHarian'), 'class="form-horizontal"');
  ?>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="col-md-12">
            <div class="form-horizontal">
              <div class="form-group">
                <!--   <div class="col-md-12">
                                        <h5>Pilih PO</h5>
                                      </div> -->
                <!-- <div class="col-lg-3">
                                          <select class="form-control" id="po" ng-model="po" ng-options="k.idPo as k.nama for k in pos" ng-change="tampil()">
                                            <option value="" disabled="" selected="">Pilih PO</option>
                                          </select>
                                      </div> -->
                <!-- <?php echo validation_errors('<div class="alert alert-warning">', '</div>'); ?> -->
                <div class="col-md-4">
                  <!-- <datepicker date-format="yyyy-MM-dd">
                                            <input ng-model="tgl" name="tanggal" id="tanggal" class="form-control" placeholder="Pilih Tanggal" onkeydown="return false"/>
                                          </datepicker> -->
                  <input class="form-control form_date" type="text" name="tanggal" value="" placeholder="Pilih Tanggal">
                  <span style="color:red;"><?php echo form_error('tanggal'); ?></span>
                </div>

                <div class="col-md-6">
                  <button class="btn btn-warning" type="submit" name="submit">
                    <i class="glyphicon glyphicon-search"></i>
                  </button>
                </div>

                <!-- <div class="col-md-4">
                                        <button class="btn btn-warning pull-right" ng-click="addHarian()"><i class="glyphicon glyphicon-plus"></i>
                                          Tambah</button>
                                      </div> -->

              </div>
            </div>
            <!-- <hr> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <?php echo form_close(); ?>