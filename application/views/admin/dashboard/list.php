<style media="screen">
  .morris-hover.morris-default-style {
    border-radius: 10px;
    padding: 6px;
    color: #666;
    background: rgba(218, 214, 214, 0.59) !important;
    border: solid 2px rgba(230, 230, 230, 0.8);
    font-family: sans-serif;
    font-size: 11px !important;
    /* text-align: left!important; */
    height: 150px;
    overflow-y: scroll;
  }

  .morris-hover {
    position: absolute;
    z-index: 1;
  }

  .open-transaksi {
    color: #209e91;
    cursor: pointer;
    font-size: 16px;
  }

  .open-transaksi:hover {
    background-color: #d0d0d0;
    cursor: pointer;
  }

  /* #pnpTunai {
  background: #FB4671 0% 0% no-repeat padding-box;
  box-shadow: 0px 0px 10px #00000026;
  border-radius: 8px;
  opacity: 1;
  width: 150px;
  height: 150px;
  padding: 20px;
}
#pnpNonTunai {
  background: #00ADE4 0% 0% no-repeat padding-box;
  box-shadow: 0px 0px 10px #00000026;
  border-radius: 8px;
  opacity: 1;
  width: 150px;
  height: 150px;
}
#bayarTunai {
  background: #F1C534 0% 0% no-repeat padding-box;
  box-shadow: 0px 0px 10px #00000026;
  border-radius: 8px;
  opacity: 1;
  width: 150px;
  height: 150px;
}
#bayarNonTunai {
  background: #23E449 0% 0% no-repeat padding-box;
  box-shadow: 0px 0px 10px #00000026;
  border-radius: 8px;
  opacity: 1;
  width: 150px;
  height: 150px;
} */
  #idTes {
    /* background: #23E449 0% 0% no-repeat padding-box; */
    /* box-shadow: 0px 0px 10px #00000026;
  border-radius: 8px;
  opacity: 1;
  width: 150px;
  height: 150px; */
    padding: 20px;
    width: 100%;
    height: 100%;
    overflow-x: auto;
    display: grid;
    grid-gap: 50px;
    grid-auto-flow: column;
    grid-auto-columns: calc(calc(100% - calc(var(--gap) * 2)) / 1.5);
    /* box-shadow: 0px 0px 10px #00000026; */
    border-radius: 8px;
    opacity: 1;
    /* border: solid red 1px; */
  }

  #idTes::before {
    content: '';
    width: var(--gap);
  }

  #idTes::after {
    content: '';
    width: 1px;
    /* works out to about 25px or var(--gap) */
  }

  .tes {
    /* padding: 50px; */
    width: 180px;
    height: 180px;
  }
</style>
<div class="widgets" style="margin-top: 50px;">
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
  <li><a href="<?php echo base_url('admin/dashboard') ?>"><b>Home</b></a></li>
  <li class="active"><b>Dashboard</b></li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

  <!-- START WIDGETS -->
  <div class="row">
    <div class="col-md-12">

      <!-- START WIDGET CLOCK -->
      <!-- <div class="widget widget-info widget-padding-sm">
                                <div class="widget-big-int plugin-clock">00:00</div>
                                <div class="widget-subtitle plugin-date">Loading...</div>
                                <div class="widget-buttons widget-c3">
                                    <div class="col">
                                        <a href="<?php echo base_url('admin/dashboard') ?>"><img src="<?php echo base_url() ?>assets/joli/refresh.gif" alt="refresh" width="30" height="30"></a>
                                    </div>
                                    <div class="col">
                                        <a href="#"><span class="fa fa-bell"></span></a>
                                    </div>
                                    <div class="col">
                                        <a href="#"><span class="fa fa-calendar"></span></a>
                                    </div>
                                </div>
                            </div> -->
      <!-- END WIDGET CLOCK -->
      <div id="idTes">
        <div class="col-md-3 tes" id="pnpTunai" style="background-color:#FB4671; box-shadow: 0px 0px 10px #00000026; border-radius: 8px; opacity:1;">
          <?php
          $totalPnpTunai = 0;
          foreach ($dataPenjualan->data as $doc) {
            $totalPnpTunai += $doc->pnpCash;
          };
          ?>
          <h1 style="font-size:32px; color:white; text-align:center;">
            <?php echo $totalPnpTunai ?>
          </h1>
          <p style="color:white; text-align:center;">Total Penumpang Tunai</p>
        </div>

        <div class="col-md-3 tes" id="pnpNonTunai" style="background-color:#00ADE4; box-shadow: 0px 0px 10px #00000026; border-radius: 8px; opacity:1;">
          <?php
          $totalPnpNonTunai = 0;
          foreach ($dataPenjualan->data as $doc) {
            $totalPnpNonTunai += $doc->pnpCashless;
          };
          ?>
          <h1 style="font-size:32px; color:white; text-align:center;">
            <?php echo $totalPnpNonTunai ?>
          </h1>
          <p style="color:white; text-align:center;">Total Penumpang Non Tunai</p>
        </div>

        <div class="col-md-3 tes" id="bayarTunai" style="background-color:#F1C534; box-shadow: 0px 0px 10px #00000026; border-radius: 8px; opacity:1;">
          <?php
          $totalBayarTunai = 0;
          foreach ($dataPenjualan->data as $doc) {
            $totalBayarTunai += $doc->cash;
          };
          ?>
          <h1 style="font-size:32px; color:white; text-align:center;">
            <?php echo number_format($totalBayarTunai) ?>
          </h1>
          <p style="color:white; text-align:center;">Total Pembayaran Tunai</p>
        </div>

        <div class="col-md-3 tes" id="bayarNonTunai" style="background-color:#23E449; box-shadow: 0px 0px 10px #00000026; border-radius: 8px; opacity:1;">
          <?php
          $totalBayarNonTunai = 0;
          foreach ($dataPenjualan->data as $doc) {
            $totalBayarNonTunai += $doc->cashless;
          };
          ?>
          <h1 style="font-size:32px; color:white; text-align:center;">
            <?php echo number_format($totalBayarNonTunai) ?>
          </h1>
          <p style="color:white; text-align:center;">Total Pembayaran Non Tunai</p>
        </div>
      </div>

    </div>
  </div>
  <!-- END WIDGETS -->

  <!-- START LAPORAN -->
  <div class="row">
    <!-- <div class="col-md-12">
                        <div class="panel panel-default">
                          <div class="panel-body">
                            <table class="table table-bordered" style="margin-bottom:20px;">
                              <thead>
                                <col width="50%">
                                <col width="50%">
                                <tr class="">
                                  <th class="text-center transaksi-title" colspan="2"><b>Penjualan AKDP/Bumel Hari Ini</b></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td class="transaksi-item">Total Penumpang Tunai</td>
                                  <?php
                                  $totalPnpTunai = 0;
                                  foreach ($dataPenjualan->data as $doc) {
                                    foreach ($doc->detail as $data) {
                                      $totalPnpTunai += $data->jmlPnpTunai;
                                    };
                                  };
                                  ?>
                                  <td class="transaksi-value text-right"><b><?php echo $totalPnpTunai ?></b></td>
                                </tr>
                                <tr>
                                  <td class="transaksi-item">Total Penumpang Non Tunai</td>
                                  <?php
                                  $totalPnpNonTunai = 0;
                                  foreach ($dataPenjualan->data as $doc) {
                                    foreach ($doc->detail as $data) {
                                      $totalPnpNonTunai += $data->jmlPnpNonTunai;
                                    };
                                  };
                                  ?>
                                  <td class="transaksi-value text-right"><b><?php echo $totalPnpNonTunai ?></b></td>
                                </tr>
                                <tr>
                                  <td class="transaksi-item">Total Pembayaran Tunai</td>
                                  <?php
                                  $totalBayarTunai = 0;
                                  foreach ($dataPenjualan->data as $doc) {
                                    foreach ($doc->detail as $data) {
                                      $totalBayarTunai += $data->jmlBayarTunai;
                                    };
                                  };
                                  ?>
                                  <td class="transaksi-value text-right"><b><?php echo number_format($totalBayarTunai) ?></b></td>
                                </tr>
                                <tr>
                                  <td class="transaksi-item">Total Pembayaran Non Tunai</td>
                                  <?php
                                  $totalBayarNonTunai = 0;
                                  foreach ($dataPenjualan->data as $doc) {
                                    foreach ($doc->detail as $data) {
                                      $totalBayarNonTunai += $data->jmlBayarNonTunai;
                                    };
                                  };
                                  ?>
                                  <td class="transaksi-value text-right"><b><?php echo number_format($totalBayarNonTunai) ?></b></td>
                                </tr>
                                <tr>
                                  <td id="detail_setoran" data-toggle="modal" data-target="#modal-detail" colspan="2" class="open-transaksi" style="text-align: center;">Lihat Detail <span class="fa fa-arrow-circle-up"></span></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div> -->
    <div class="row">
      <div class="col-md-12">
        <!-- START USERS ACTIVITY BLOCK -->
        <!-- <div class="panel panel-default"> -->
        <div>
          <!-- <div class="panel-heading"> -->
          <div>
            <br />
            <div class="panel-title-box">
              <h3>Data Transaksi 7 Hari Terakhir</h3>
            </div>
          </div>
          <!-- <div class="panel-body padding-0"> -->
          <div>
            <!-- <div class="chart-holder" id="dashboard-bar-1" style="height: 200px;"></div> -->
            <div class="chart-holder" id="graph" style="height:300px; border-radius: 10px; opacity: 1; box-shadow: 0px 0px 10px #00000026;">
            </div>

          </div>
        </div>
        <!-- END USERS ACTIVITY BLOCK -->
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

  <div class="modal fade" id="modal-detail">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" name="button" class="close" data-dismiss="modal" aria-label="close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4>Data Penjualan Hari Ini</h4>
        </div>
        <?php if (!$dataPenjualan->data) { ?>
          <br>
          <h5 class="text-center"><b>Tidak Ada Data</b></h5>
        <?php } else { ?>
          <div class="modal-body table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="text-center"><b>No</b></th>
                  <th class="text-center"><b>Tgl Transaksi</b></th>
                  <th class="text-center"><b>Produk(Bus)</b></th>
                  <th class="text-center"><b>Jml Pnp Tunai</b></th>
                  <th class="text-center"><b>Jml Pnp Non Tunai</b></th>
                  <th class="text-center"><b>Jml Bayar Tunai</b></th>
                  <th class="text-center"><b>Jml Bayar Non Tunai</b></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($dataPenjualan->data as $data) { ?>
                  <?php $no = 1;
                  foreach ($data->detail as $dataDetail) { ?>
                    <tr>
                      <td class="text-center"><span id="no"><?php echo $no++; ?></span></td>
                      <td class="text-center"><span id="tglTransaksi"><?php echo $data->tglTransaksi ?></span></td>
                      <td class="text-center"><span id="produk"><?php echo $dataDetail->kodeBus ?></span></td>
                      <td class="text-center"><span id="jmlPnpTunai"><?php echo $dataDetail->jmlPnpTunai ?></span></td>
                      <td class="text-right"><span id="jmlPnpNonTunai"><?php echo $dataDetail->jmlPnpNonTunai ?></span></td>
                      <td class="text-center"><span id="jmlBayarTunai"><?php echo $dataDetail->jmlBayarTunai ?></span></td>
                      <td class="text-right"><span id="jmlBayarNonTunai"><?php echo $dataDetail->jmlBayarNonTunai ?></span></td>
                    </tr>
                  <?php } ?>
                <?php } ?>
              </tbody>
            </table>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  </div>

  <!-- START CHART SCRIPT -->
  <script>
    // Morris.Bar({
    //   element: 'graph',
    //   data: [{
    //       y: '09-07-2020',
    //       a: 300000,
    //       b: 100000
    //     },
    //     {
    //       y: '10-07-2020',
    //       a: 100000,
    //       b: 150000
    //     },
    //     {
    //       y: '11-07-2020',
    //       a: 200000,
    //       b: 50000
    //     },
    //     {
    //       y: '12-07-2020',
    //       a: 200000,
    //       b: 200000
    //     },
    //     {
    //       y: '13-07-2020',
    //       a: 100000,
    //       b: 100000
    //     },
    //     {
    //       y: '14-07-2020',
    //       a: 75000,
    //       b: 80000
    //     },
    //     {
    //       y: '15-07-2020',
    //       a: 250000,
    //       b: 30000
    //     }
    //   ],
    //   xkey: 'y',
    //   ykeys: ['a', 'b'],
    //   labels: ['New Users', 'Returned'],
    //   barColors: ['#33414E', '#1caf9a'],
    //   gridTextSize: '10px',
    //   hideHover: true,
    //   resize: true,
    //   stacked: true,
    //   gridLineColor: '#E5E5E5'
    // });

    // $( document ).ready(function() {
    //   $(function() {
    //       var jsonData = $.getJSON("<?php echo base_url('admin/dashboard/chart'); ?>", function (jsonData) {
    //           console.log(jsonData);
    //
    //           Morris.Bar({
    //               element: 'graph',
    //               data: jsonData,
    //               xkey: 'y',
    //               ykeys: ['a'],
    //               labels: ['Wins'],
    //               hideHover: 'auto',
    //               resize: true
    //           });
    //       });
    //   });
    // });
  </script>
  <!-- END CHART SCRIPT -->

  <script>
    var label = JSON.parse(JSON.stringify(<?php echo $lineLabels ?>));
    var date = JSON.parse(JSON.stringify(<?php echo $dateLine ?>));
    var index = JSON.parse(JSON.stringify(<?php echo $keyChart ?>));
    console.log(date);

    Morris.Bar({
      element: 'graph',
      data: <?php echo $lineData ?>,
      xkey: 'date',
      ykeys: <?php echo $keyChart ?>,
      labels: <?php echo $lineLabels ?>,
      // barColors: ['#33414E', '#1caf9a'],
      gridTextSize: '10px',
      hideHover: true,
      resize: true,
      stacked: true,
      gridLineColor: '#E5E5E5'
    });
  </script>