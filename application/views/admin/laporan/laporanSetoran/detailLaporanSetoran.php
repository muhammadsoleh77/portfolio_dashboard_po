<style media="screen">
  td {
    text-align : left!important;
  }
</style>

<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
    <li><a href="<?php echo base_url('admin/laporan/laporanSetoran') ?>">Laporan Setoran</a></li>
    <li class="active">Detail Laporan Setoran</li>
</ul>
<!-- END BREADCRUMB -->

<div class="row">
    <div class="col-md-12">
      <div class="panel panel-default bootstrap-panel">
        <div class="panel-body">
         <!-- <div class="col-md-12" id="dataTable" > -->

           <h5 class="text-center"><b>DETAIL LAPORAN SETORAN BUS (<?php echo $detailSetoran->kodeBus; ?>)</b></h5>

<div class="table-responsive" style="border:none;">
  <table class="table table-bordered table-striped" st-table="datas">
    <thead>
    <tr class="sortable ">

      <th class="text-center" st-sort="unitPrice" rowspan="2"><b>Tanggal Setor</b></th>
      <th st-sort="trayek" rowspan="2"><b>Jurusan</b></th>

      <th class="text-center" st-sort="unitPrice" rowspan="2"><b>Unit Price</b></th>

      <th class="text-center" st-sort="totalTunai" colspan="2"><b> Tunai</b></th>
      <th class="text-center" st-sort="totalNonTunai" colspan="2"><b> Non-Tunai</b></th>
      <th class="text-center" st-sort="totalPendapatan" colspan="2"><b>Total</b></th>
    </tr>
     <tr class="sortable ">


      <th class="text-center" st-sort="totaPenumpangTunai"><b>Pnp</b></th>
      <th class="text-center" st-sort="totalTunai"><b>Rp</b></th>
      <th class="text-center" st-sort="totalPenumpangNonTunai"><b>Pnp</b></th>
      <th class="text-center" st-sort="totalNonTunai"><b>Rp</b></th>
      <th class="text-center" st-sort="totaPenumpang"><b>Pnp</b></th>
      <th class="text-center" st-sort="totalPendapatan"><b>Rp</b></th>

    </tr>
    </thead>
    <tbody>
      <?php foreach ($detailSetoran->detail2 as $key => $detail2) { ?>
          <tr>
            <td class="text-center"><?php echo $detailSetoran->waktuSetor ?></td>
            <td class="text-center"><?php echo $detail2->namaTrayek ?></td>
            <td class="text-center"><?php echo number_format($detail2->unitPrice) ?></td>
            <td class="text-center"><?php echo $detail2->jmlPnpTunai ?></td>
            <td class="text-center"><?php echo number_format($detail2->jmlBayarTunai) ?></td>
            <td class="text-center"><?php echo $detail2->jmlPnpNonTunai ?></td>
            <td class="text-center"><?php echo number_format($detail2->jmlBayarNonTunai) ?></td>
            <td class="text-center"><?php echo $detail2->jmlPnpTunai += $detail2->jmlPnpNonTunai ?></td>
            <td class="text-center"><?php echo number_format($detail2->jmlBayarTunai += $detail2->jmlBayarNonTunai) ?></td>
          </tr>
      <?php } ?>
    </tbody>
    <tfoot>
      <tr>
      <td><b>Total</b></td>

      <td></td>
     <td style="text-align:right"><b></b></td>
       <td style="text-align:right"><b></b></td>
      <td style="text-align:right"><b></b></td>
      <td style="text-align:right"><b></b></td>
      <td style="text-align:right"><b></b></td>
       <td style="text-align:right">
         <b>
           <?php
             $totalPnp = 0;
             foreach ($detailSetoran->detail2 as $value) {
               $totalPnp += $value->jmlPnpTunai;
             };
             echo $totalPnp;
           ?>
         </b>
       </td>
       <td style="text-align:right">
         <b>
           <?php
             $totalBayar = 0;
             foreach ($detailSetoran->detail2 as $value) {
               $totalBayar += $value->jmlBayarTunai;
             };
             echo number_format($totalBayar);
           ?>
         </b>
       </td>


    </tr>
    <!-- <tr>
      <td colspan="6" class="text-center">
        <div st-pagination="" st-items-by-page="perPage" st-displayed-pages="pageSize"></div>
      </td>
    </tr> -->
    </tfoot>
  </table>
</div>
<hr>
<h5>OSCAR </h5>
<?php if(!$dataOscar) { ?>
  <div class="col-md-12">
    <br><h5 class="text-center"><b>Data Oscar Kosong</b></h5><br>
  </div>
<?php } else { ?>
  <div class="table-responsive" style="border:none;">
    <table class="table table-bordered table-striped" st-table="datas" ng-show="user.idPo == 4">
      <thead>
        <tr class="sortable ">

          <th st-sort="trayek" ><b>Jurusan </b></th>
          <th st-sort="trayek" ><b>Oscar </b></th>
          <th st-sort="unitPrice"><b>Keterangan </b></th>

          <th st-sort="totalTunai"><b> Waktu Pencatatan </b></th>
          <th st-sort="totalNonTunai"><b>Jml Penumpang</b></th>

        </tr>
        <tr class="sortable ">




        </tr>
      </thead>
      <tbody>
        <tr ng-repeat="item in oscars">
          <td>{{item.namaTrayek}}</td>
          <td style="text-align:right">{{item.namaOscar}}</td>

          <td style="text-align:right">{{item.keteranganOscar}}</td>
          <td style="text-align:right">{{item.waktuInput | date: "d/M/yy h:mm a"}}</td>

          <td style="text-align:right">{{item.jmlPnpOscar}}</td>




        </tr>
      </tbody>

    </table><br><br>
  </div>
<?php } ?>

<hr>

<!-- </div> -->

 <div class="col-md-12">
  <!-- <div class="form-group well"> -->

            <a href="<?php echo base_url('admin/laporan/laporanSetoran') ?>" class="btn btn-danger pull-left">
            <i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>
            <a href="<?php echo base_url('admin/laporan/cetakDetailExcel') ?>" class="btn btn-primary pull-right" ng-click="exportXls()">
                <i class="fa fa-file-excel-o"></i>&nbsp;Simpan xls
            </a>
            <!-- <button class="btn btn-primary pull-right" ng-disabled="clicked" ng-click="save()">
                <i class="glyphicon glyphicon-floppy-disk"></i> Simpan
            </button> -->


    <!-- </div> -->
</div>

</div>
</div>
</div>
</div>
