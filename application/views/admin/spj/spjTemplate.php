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

<div class="widgets">

  <!-- START BREADCRUMB -->
  <ul class="breadcrumb">
      <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
      <li class="active">SPJ</li>
  </ul>
  <!-- END BREADCRUMB -->

  <div class="row">
    <div class="col-md-12">

        <!-- START LAPORAN -->
        <div class="row">
          <div class="">
            <div class="panel panel-default">
              <div class="panel-body">
                <a href="<?php echo base_url('admin/spj/spjJAC') ?>">
                  <div class="col-md-6 main-menu">
                    <div class="menu">
                      SPJ JAC
                    </div>
                  </div>
                </a>
                <a href="<?php echo base_url('admin/spj/spjJRC') ?>">
                  <div class="col-md-6 main-menu">
                    <div class="menu">
                      SPJ JRC
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
