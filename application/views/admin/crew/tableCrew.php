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
  <li class="active"><b>Crew</b></li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

  <!-- START LAPORAN -->
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">

          <h3>DAFTAR CREW</h3><br>
          <!-- <div id="tabel_crew"> -->

            <!-- <form class="form-search" method="post" action="<?php echo base_url('admin/crew') ?>">
              <div class="input-group col-md-3">        
                <input type="text" class="form-control" placeholder="Type your search word" name="keyword" autocomplete="off" autofocus>
                <span class="input-group-btn">
                  <input type="submit" name="submit" class="btn btn-purple btn-sm form-control">
                </span>
              </div><br/>
            </form> -->

            <div class="table-responsive" style="border: none;">
            <table class="table table-bordered table-striped" id="tabel_crew">
              <col width="2%">
              <col width="15%">
              <col width="15%">
              <col width="15%">
              <col width="5%">

              <thead>
                <tr class="th-bg">
                  <th class="text-center"><b>No</b>.</th>
                  <th class="text-center">
                    <!-- <a class="column_sort" id="nik" data-order="desc" href="#"> -->
                      <b>NIK</b>
                    <!-- </a> -->
                  </th>
                  <th class="text-center">
                    <!-- <a class="column_sort" id="name" data-order="desc" href="#"> -->
                      <b>Nama</b>
                    <!-- </a> -->
                  </th>
                  <th class="text-center"><b>Type</b></th>
                  <th class="text-center"><b>Aksi</b></th>
                </tr>
              </thead>

              <tbody>
                <?php if ($listDataCrew) {
                  $no = 1;
                  foreach ($listDataCrew as $dataCrew) { ?>
                    <tr>
                      <td class="text-center"><?php echo $no++ ?></td>
                      <td class="text-center"><?php echo $dataCrew->nik ?></td>
                      <td class="text-center"><?php echo $dataCrew->name ?></td>
                      <td class="text-center"><?php echo $dataCrew->type ?></td>
                      <td class="text-center">
                        <a data-toggle="modal" id="id_trayek" href="#myModal" data-id="<?php echo $dataCrew->id ?>" class="btn btn-primary btn-sm">Detail</a>
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
          <!-- </div> -->

          <div id="outer">
            <div id="inner">
              <?php
                echo $paging;
              ?>
            </div>
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
          <h4>Detail Crew
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
                <th class="text-center">NIK</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Type</th>
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

  <!-- trigger detail crew -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('#myModal').on('show.bs.modal', function(e) {
        var id_crew = $(e.relatedTarget).data('id');
        var id_po = "<?php echo $dataPo->id ?>";
        var token = "<?php echo $dataUser->token ?>";
        var base_url = "<?= $this->config->item('endpoint') ?>";

        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
          type: 'get',
          url: base_url + '/bumel/po/' + id_po + '/crew/' + id_crew,
          beforeSend: function(xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer ' + token);
          },
          success: function(data) {
            var html = '';
            var i;
            // for(i=0; i<data.length; i++){
            html += '<tr>' +
              '<td class="text-center">' + data.nik + '</td>' +
              '<td class="text-center">' + data.name + '</td>' +
              '<td class="text-center">' + data.type + '</td>' +
              '</tr>';
            // }
            $('#show_data').html(html);
          }
        });
      });

    });
  </script>
  <!-- End detail crew -->

  <script>
    // var tabel = null;
    $(document).ready(function() {
      $('#tabel_crew').DataTable({
        "searching": false,
        "lengthChange": false,
        "bPaginate": false,
        "bInfo": false
      });
      // tabel = $('#tabel_crew').DataTable({
      //   "processing": true,
      //   "serverSide": true,
      //   "ordering": true,
      //   "order": [[0, 'asc']],
      //   // "ajax":
      //   // {
      //   //   "url": "<?php echo base_url('admin/crew') ?>",
      //   //   "type": "POST"
      //   // },
      //   "deferRender": true,
      //   "aLengthMenu": [[5, 10, 50], [5, 10, 50]],
      //   "columns": [
      //     {"data": "nik"},
      //     {"data": "name"},
      //     {"data": "type"}
      //   ]
      // })
    })
  </script>