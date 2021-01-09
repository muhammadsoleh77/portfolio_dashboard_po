<?php
  // header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
  header("Content-Type: application/octet-stream");
  header("Content-Disposition: attachment; filename=ReportDetail.xls");
  header("Pragma: no-cache");
  header("Expires: 0");
?>
<table border="1">
  <col width="10%">
  <col width="10%">
  <col width="10%">
  <col width="10%">
  <col width="10%">

  <p style="text-align:center;"><?php echo $dataUser->namaperusahaan; ?></p>
  <p style="text-align:center;"><?php echo $dataUser->alamat; ?></p>
  <thead>
    <tr class="th-bg">
      <th class="text-center" rowspan="2"><b>Tgl Setor</b></th>
      <th class="text-center" rowspan="2"><b>Trayek</b></th>
      <th class="text-center" rowspan="2"><b>Unit Price</b></th>
      <th class="text-center" colspan="2"><b>Tunai</b></th>
      <th class="text-center" colspan="2"><b>Non Tunai</b></th>
    </tr>
    <tr>
      <th>pnp</th>
      <th>rp</th>
      <th>pnp</th>
      <th>rp</th>
    </tr>
  </thead>

  <tbody>
        <?php foreach ($detailSetoran->detail2 as $detail2) { ?>
          <tr>
            <td class="text-center"><?php echo $detailSetoran->waktuSetor ?></td>
            <td class="text-center"><?php echo $detail2->namaTrayek ?></td>
            <td class="text-center"><?php echo $detail2->unitPrice ?></td>
            <td class="text-right"><?php echo $detail2->jmlPnpTunai ?></td>
            <td class="text-right"><?php echo number_format($detail2->jmlBayarTunai) ?></td>
            <td><?php echo $detail2->jmlPnpNonTunai ?></td>
            <td><?php echo number_format($detail2->jmlBayarNonTunai) ?></td>
          </tr>
        <?php } ?>
  </tbody>
</table><br><br>

<p>OSCAR</p>
  <table border="1">
    <col width="10%">
    <col width="10%">
    <col width="10%">
    <col width="10%">
    <col width="10%">
    <thead>
      <tr class="th-bg">
        <th class="text-center"><b>Jurusan</b></th>
        <th class="text-center"><b>Oscar</b></th>
        <th class="text-center"><b>Keterangan</b></th>
        <th class="text-center"><b>Waktu Pencatatan</b></th>
        <th class="text-center"><b>Jml Penumpang</b></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($dataOscar as $data) { ?>
        <tr>
          <td class="text-center"></td>
          <td class="text-center"></td>
          <td class="text-center"></td>
          <td class="text-center"></td>
          <td class="text-right"></td>
        </tr>
      <?php } ?>
    </tbody>
  </table><br><br>
