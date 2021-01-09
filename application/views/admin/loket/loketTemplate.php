<style>
  #inner {
    display: table;
    margin: 0 auto;
    /* border: 1px solid black; */
  }

  #outer {
    /* border: 1px solid red; */
    width: 100%
  }
</style>
<div class="widgets" style="margin-top: 50px;">
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
  <li><a href="<?php echo base_url('admin/dashboard') ?>"><b>Home</b></a></li>
  <li class="active"><b>Loket</b></li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

  <!-- START LAPORAN -->
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <h3>DAFTAR LOKET</h3><br>
          <div class="table-responsive" style="border: none;">
          <table class="table table-bordered table-striped" id="tabel_loket">
            <col width="2%">
            <col width="10%">
            <col width="10%">
            <col width="10%">
            <col width="5%">

            <thead>
              <tr class="th-bg">
                <th class="text-center"><b>No</b>.</th>
                <th class="text-center"><b>Nama Loket</b></th>
                <th class="text-center"><b>Alamat</b></th>
                <th class="text-center"><b>Telepon</b></th>
                <th class="text-center"><b>Aksi</b></th>
              </tr>
            </thead>

            <tbody>
              <?php if ($listDataLoket) {
                $no = 1;
                foreach ($listDataLoket as $dataLoket) { ?>
                  <tr>
                    <td class="text-center"><?php echo $no++ ?></td>
                    <td class="text-center"><?php echo $dataLoket->nama ?></td>
                    <td class="text-center"><?php echo $dataLoket->alamat ?></td>
                    <td class="text-center"><?php echo $dataLoket->nomorTelepon ?></td>
                    <td class="text-center">
                      <a data-toggle="modal" id="id_trayek" href="#myModal" data-id="<?php echo $dataLoket->id ?>" class="btn btn-primary btn-sm">Detail</a>
                    </td>
                  </tr>
                <?php }
              } else { ?>
                <tr>
                  <td class="text-center">Data tidak ditemukan</td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
          </div>
        </div>
        <div id="outer">
          <div id="inner">
            <?php
            echo $paging;
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="content-top clearfix">
      <h2>&nbsp;</h2>
    </div>
  </div>
  <!-- END LAPORAN -->

  <!-- modal tampil detail -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4>Detail Loket
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </h4>
        </div>
        <div class="modal-body">
          <!-- <div class="fetched-data"></div> -->
          <table class="table table-striped table-bordered table-responsive" id="mydata">
            <thead>
              <tr>
                <th class="text-center">Kontak Person</th>
                <th class="text-center">Tempat Berangkat</th>
                <th class="text-center">Bandara</th>
              </tr>
            </thead>
            <tbody id="show_data">

            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- akhir modal tampil detail -->
</div>

  <!-- trigger detail loket -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('#myModal').on('show.bs.modal', function(e) {
        var id_loket = $(e.relatedTarget).data('id');
        var id_po = "<?php echo $dataPo->id ?>";
        var token = "<?php echo $dataUser->token ?>";
        var base_url = "<?= $this->config->item('endpoint') ?>";

        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
          type: 'get',
          // header : ('Authorization', 'Bearer ' + token),
          url: base_url + '/bumel/po/' + id_po + '/loket/' + id_loket,
          beforeSend: function(xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer ' + token);
          },
          success: function(data) {
            var html = '';
            var i;
            // for(i=0; i<data.length; i++){
            html += '<tr>' +
              '<td class="text-center">' + data.kontakPerson + '</td>' +
              '<td class="text-center">' + (data.tempatBerangkat ? "Ya" : "Tidak") + '</td>' +
              '<td class="text-center">' + (data.isBandara ? "Ya" : "Tidak") + '</td>' +
              '</tr>';
            // }
            $('#show_data').html(html);
          }
        });
      });
    });
  </script>
  <!-- End detail loket -->

  <script>
    $(document).ready(function() {
      $('#tabel_loket').DataTable({
        "searching": false,
        "lengthChange": false,
        "bPaginate": false,
        "bInfo": false
      });
    })
  </script>