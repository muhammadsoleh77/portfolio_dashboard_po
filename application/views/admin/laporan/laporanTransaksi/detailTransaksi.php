<style media="screen">
  td {
    text-align : left!important;
  }
</style>

<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
    <li><a href="<?php echo base_url('admin/laporan/laporanTransaksi') ?>">Laporan Transaksi</a></li>
    <li class="active">Detail Transaksi</li>
</ul>
<!-- END BREADCRUMB -->

<div class="row">
    <div class="col-md-12">
      <div class="panel panel-default bootstrap-panel">
        <div class="">
         <div class="col-md-12">
           <br><h4 class="text-center"><b>Detail Transaksi Bus (<?php echo $detailTransaksi->kodeBus; ?>)</b></h4><br>

<div class="table-responsive" style="border:none;">
  <table class="table table-bordered table-striped">
    <thead>
    <tr>
      <th rowspan="2"><b>Jurusan</b></th>
      <th colspan="2"><b> Tunai </b></th>
      <th colspan="2"><b> Non-Tunai </b></th>
      <th colspan="2"><b>Total </b></th>
    </tr>
    <tr>
      <th><b>Pnp </b></th>
      <th><b>Rp </b></th>
      <th><b>Pnp </b></th>
      <th><b>Rp </b></th>
      <th><b>Pnp </b></th>
      <th><b>Rp </b></th>
    </tr>
    </thead>
    <tbody>
      <?php foreach ($detailTransaksi->detail as $value) { ?>
        <tr>
          <td class="text-center"><?php echo $value->namaTrayek ?></td>
          <td class="text-center"><?php echo $value->pnpTunai ?></td>
          <td class="text-right"><?php echo number_format($value->totalTunai) ?></td>
          <td><?php echo $value->pnpNonTunai ?></td>
          <td><?php echo number_format($value->totalNonTunai) ?></td>
          <td><?php echo $value->pnpTunai += $value->pnpNonTunai ?></td>
          <td><?php echo number_format($value->totalTunai += $value->totalNonTunai) ?></td>
        </tr>
      <?php } ?>
    </tbody>
    <tfoot>
      <!-- <tr>
        <td><b>Total</b></td>
        <td></td>
        <td style="text-align:right"><b></b></td>
        <td style="text-align:right"><b></b></td>
        <td style="text-align:right"><b></b></td>
        <td style="text-align:right"><b></b></td>
        <td style="text-align:right"></td>
        <td style="text-align:right"></td>
        <td></td>
      </tr> -->
    <!-- <tr>
      <td colspan="6" class="text-center">
        <div st-pagination="" st-items-by-page="perPage" st-displayed-pages="pageSize"></div>
      </td>
    </tr> -->
    </tfoot>
  </table>
</div>

<div class="col-md-12">
 <!-- <div class="form-group well"> -->
 <a href="<?php echo base_url('admin/laporan/laporanTransaksi') ?>" class="btn btn-danger pull-left">
 <i class="fa fa-arrow-left"></i>Kembali</a><br><br><br>
   <!-- </div> -->
</div>

</div>

</div>
</div>
</div>
</div>
