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
    <li class="active"><b>Trayek</b></li>
  </ul>
  <!-- END BREADCRUMB -->

  <!-- PAGE CONTENT WRAPPER -->
  <div class="page-content-wrap">

    <!-- START LAPORAN -->
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <h3>DAFTAR TRAYEK</h3><br>
            <table class="table table-bordered table-striped table-responsive" id="tabel_trayek">
              <col width="2%">
              <col width="15%">
              <col width="15%">
              <col width="5%">

              <thead>
                <tr class="th-bg">
                  <th class="text-center"><b>No</b>.</th>
                  <th class="text-center"><b>Kode Trayek</b></th>
                  <th class="text-center"><b>Nama Trayek</b></th>
                  <th class="text-center"><b>Aksi</b></th>
                </tr>
              </thead>

              <tbody>
                <?php if ($dataTrayek) {
                  $no = 1;
                  foreach ($dataTrayek->trayeks as $dataTrayek) { ?>
                    <tr>
                      <td class="text-center"><?php echo $no++ ?></td>
                      <td class="text-center"><?php echo $dataTrayek->kodeTrayek ?></td>
                      <td class="text-center"><?php echo $dataTrayek->trayek ?></td>
                      <td class="text-center">
                        <a data-toggle="modal" id="id_trayek" href="#myModal" data-id="<?php echo $dataTrayek->idTrayek ?>" class="btn btn-primary btn-sm">Detail</a>
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
  </div>
  <!-- END LAPORAN -->

  <!-- modal tampil detail -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4>Detail Trayek
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
                <th class="text-center">Asal</th>
                <th class="text-center">Tujuan</th>
                <th class="text-center">Harga</th>
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

  <!-- trigger detail trayek -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('#myModal').on('show.bs.modal', function(e) {
        var id_trayek = $(e.relatedTarget).data('id');
        var token = "<?php echo $dataUser->token ?>";
        var base_url = "<?= $this->config->item('endpoint') ?>";

        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
          type: 'get',
          // header : ('Authorization', 'Bearer ' + token),
          url: base_url + '/bumel/trayek/' + id_trayek,
          beforeSend: function(xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer ' + token);
          },
          success: function(data) {
            var tarif = data.tarifs;
            var html = '';
            $.each(tarif, function(key, value) {
              html += '<tr>' +
                '<td class="text-center">' + value.lokasiAwalNama + '</td>' +
                '<td class="text-center">' + value.lokasiAkhirNama + '</td>' +
                '<td class="text-center">' + value.tarif + '</td>' +
                '</tr>';
            })
            $('#show_data').html(html);
          }
        });
      });
    });
  </script>
  <!-- End detail trayek -->

  <script>
    $(document).ready(function() {
      $('#tabel_trayek').DataTable({
        "searching": false,
        "lengthChange": false,
        "bPaginate": false,
        "bInfo": false
      });
    })
  </script>