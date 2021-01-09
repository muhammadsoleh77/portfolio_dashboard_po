<?php
  // header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
  header("Content-Type: application/octet-stream");
  header("Content-Disposition: attachment; filename=Report.xls");
  header("Pragma: no-cache");
  header("Expires: 0");
?>
<table class="table2excel" border="1">
  <col width="10%">
  <col width="10%">
  <col width="10%">
  <col width="10%">
  <col width="10%">
  <col width="10%">

  <p style="text-align:center;"><?php echo $dataUser->namaperusahaan; ?></p>
  <p style="text-align:center;"><?php echo $dataUser->alamat; ?></p>
  <thead>
    <tr class="th-bg noExl">
      <th class="text-center" rowspan="2"><b>Waktu Transaksi</b></th>
      <th class="text-center" rowspan="2"><b>Waktu Setor</b></th>
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
    <?php foreach ($dataLaporanSetoran->data as $datas) { ?>
      <?php foreach ($datas->detail as $dataDetail) { ?>
        <?php foreach ($dataDetail->detail2 as $dataDetail2) { ?>
          <tr>
            <td class="text-center"><?php echo $datas->tglTransaksi ?></td>
            <td class="text-center"><?php echo $dataDetail->waktuSetor ?></td>
            <td class="text-center"><?php echo $dataDetail2->namaTrayek ?></td>
            <td class="text-center"><?php echo $dataDetail2->unitPrice ?></td>
            <td class="text-right"><?php echo $dataDetail2->jmlPnpTunai ?></td>
            <td class="text-right"><?php echo number_format($dataDetail2->jmlBayarTunai) ?></td>
            <td><?php echo $dataDetail2->jmlPnpNonTunai ?></td>
            <td><?php echo number_format($dataDetail2->jmlBayarNonTunai) ?></td>
          </tr>
        <?php } ?>
      <?php } ?>
    <?php } ?>
  </tbody>
</table>

<!-- <script>
			$(function() {
				$(".table2excel").table2excel({
					exclude: ".noExl",
					name: "Excel Document Name",
					filename: "myFileName",
					fileext: ".xls",
					exclude_img: true,
					exclude_links: true,
					exclude_inputs: true
				});
			});
		</script> -->
