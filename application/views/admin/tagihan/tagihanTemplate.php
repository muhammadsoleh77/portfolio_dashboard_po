<style media="screen">
  .main-menu {
    text-align:center;
    padding:10px;
  }
  .menu {
    /* font-size:16px; */
    background-color:#1A62D4;
    border:2px solid #1A62D4;
    border-radius:6px;
    padding:10px;
    color:#fff;
  }
  .menu:hover {
    background-color:#fff;
    color:#1A62D4;
    cursor:pointer;
    border:2px solid #1A62D4;
  }
</style>

<div class="widgets" style="margin-top: 50px;">

  <!-- START BREADCRUMB -->
  <ul class="breadcrumb">
      <li><a href="<?php echo base_url('admin/dashboard') ?>"><b>Home</b></a></li>
      <li class="active"><b>Invoice</b></li>
  </ul>
  <!-- END BREADCRUMB -->

  <div class="row">
    <div class="col-md-12">

        <!-- START LAPORAN -->
        <div class="row">
          <div class="">
            <div class="panel panel-default">
              <div class="panel-body">
                <!-- <a href="<?php echo base_url('admin/tagihan/belumBayar') ?>"> -->
                <a href="#">
                  <div class="col-md-6 main-menu">
                    <div class="menu">
                      Belum Dibayar
                    </div>
                  </div>
                </a>
                <!-- <a href="<?php echo base_url('admin/tagihan/sudahBayar') ?>"> -->
                <a href="#">
                  <div class="col-md-6 main-menu">
                    <div class="menu">
                      Sudah Dibayar
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

    </div>
  </div>
</div>
