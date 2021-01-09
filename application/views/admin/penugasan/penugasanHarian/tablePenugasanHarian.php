<style media="screen">
  #nomor {
    text-align: center;
  }
</style>

<style media="screen">
  .main-menu {
    text-align: center;
    padding: 10px;
  }

  .menu {
    /* font-size:16px; */
    /* background-color:#e0af1b; */
    background-color: #1A62D4;
    border: 2px solid #1A62D4;
    border-radius: 6px;
    padding: 10px;
    color: #fff;
  }

  .menu:hover {
    background-color: #fff;
    color: #1A62D4;
    cursor: pointer;
    border: 2px solid #1A62D4;
  }

  .disabled {
    border: 2px solid #ddd;
    background-color: #ddd;
    cursor: pointer;
  }

  .datepicker,
  .table-condensed {
    width: 320px;
    /* height:500px; */
  }

  .tengah {
    display: inline-block;
  }
</style>
<div class="widgets" style="margin-top: 50px;">
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
  <li><a href="<?php echo base_url('admin/dashboard') ?>"><b>Home</b></a></li>
  <li class="active"><b>Penugasan Harian</b></li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

  <!-- START LAPORAN -->
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <a href="<?php echo base_url('admin/penugasan/default') ?>">
            <div class="col-md-6 main-menu">
              <div class="menu disabled">
                Penugasan Default
              </div>
            </div>
          </a>
          <a href="<?php echo base_url('admin/penugasan/harian') ?>">
            <div class="col-md-6 main-menu">
              <div class="menu">
                Penugasan Harian
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

  <?php
  echo form_open(base_url('admin/penugasan/tampilPenugasanHarian'), 'class="form-horizontal"');
  ?>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="col-md-12">
            <div class="form-horizontal">
              <div class="form-group">
                <?php echo validation_errors('<div class="alert alert-warning">', '</div>'); ?>
                <div class="col-md-4">
                  <input class="form-control form_date" size="30" type="text" name="tanggal" value="" placeholder="Pilih Tanggal" readonly>
                </div>

                <div class="col-md-6">
                  <button class="btn btn-warning" type="submit" name="submit">
                    <i class="glyphicon glyphicon-search"></i>
                  </button>
                  <!-- <a href="<?php echo base_url('admin/penugasan/tampilPenugasanHarian'); ?>" class="btn btn-warning">
                    <i class="glyphicon glyphicon-search"></i>
                  </a> -->
                </div>

              </div>
            </div>
            <!-- <hr> -->
          </div>

          <div class="">
            <div class="col-md-12">
              <!-- <button class="btn btn-warning pull-right" ng-click="addHarian()"><i class="glyphicon glyphicon-plus"></i>
                                    Tambah</button> -->
              <a href="<?php echo base_url('admin/penugasan/addHarian') ?>" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i>
                Tambah</a>
            </div>

            <!-- <div class="data-loader" ng-show="loadData"></div> -->
            <?php if ($listDataHarian->status === 400) { ?>
              <div class="col-md-12">
                <br>
                <h5><b><?= $listDataHarian->message ?></b></h5>
              </div>
            <?php } else { ?>
              <div id="dataTable" class="col-md-12">
                <br>
                <h3>Data Penugasan Harian</h3>
                <div class="col-md-12 table-responsive" style="border:none;">
                  <table class="table table-bordered table-striped">
                    <col width="10%">
                    <col width="10%">
                    <col width="10%">
                    <col width="10%">
                    <col width="5%">
                    <col width="10%">

                    <thead>
                      <tr class="th-bg">
                        <th class="text-center"><b>User</b></th>
                        <th class="text-center"><b>Keterangan</b></th>
                        <th class="text-center"><b>Asal</b></th>
                        <th class="text-center"><b>Tujuan</b></th>
                        <th class="text-center"><b>Harga</b></th>
                        <th class="text-center"><b>Aksi</b></th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php foreach ($listDataHarian->data as $dataHarian) { ?>
                        <tr id="<?= $dataHarian->idPenugasan ?>" idPo="<?= $dataHarian->idPo ?>" idUser="<?= $dataHarian->idUser ?>" isAktif="<?= $dataHarian->isAktif ?>">
                          <td class="text-center"><?= $dataHarian->busNama ?></td>
                          <td class="text-center">
                            <?php foreach ($dataHarian->ritases as $ritase) { ?>
                            <table class="tengah">
                                <tr>
                                  <td style="display:block; margin-top:-30px;"><?= $ritase->keterangan ?></td><br/>
                                </tr>
                              </table>
                              <?php } ?>
                          </td>
                          <td class="text-center">
                            <table class="tengah">
                            <?php foreach ($dataHarian->ritases as $ritase) { ?>
                              <?php foreach ($ritase->tarifs as $tarif) { ?>
                                <tr>
                                  <td><?= $tarif->lokasiAwalNama ?></td>
                                </tr>
                              <?php } ?>
                              <?php } ?>
                            </table>
                          </td>
                          <td class="text-center">
                            <table class="tengah">
                            <?php foreach ($dataHarian->ritases as $ritase) { ?>
                              <?php foreach ($ritase->tarifs as $tarif) { ?>
                                <tr>
                                  <td><?= $tarif->lokasiAkhirNama ?></td>
                                </tr>
                              <?php } ?>
                              <?php } ?>
                            </table>
                          </td>
                          <td class="text-center">
                            <table class="tengah">
                            <?php foreach ($dataHarian->ritases as $ritase) { ?>
                              <?php foreach ($ritase->tarifs as $tarif) { ?>
                                <tr>
                                  <td><?= $tarif->tarif ?></td>
                                </tr>
                              <?php } ?>
                              <?php } ?>
                            </table>
                          </td>
                          <td class="text-center">
                            <?php if ($dataHarian->isAktif == true) { ?>
                              <button class="btn btn-info btn-sm aktif">Aktif</button>
                            <?php } else { ?>
                              <button style="background-color:grey; color:white;" class="btn btn-sm aktif">Tidak Aktif</button>
                            <?php } ?>
                            <a href="#" class="btn btn-danger btn-sm hapus">Hapus</a>
                          </td>
                        </tr>
                      
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            <?php } ?>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
  <?php echo form_close(); ?>

  <!-- START HAPUS PENUGASAN HARIAN -->
  <script>
    $(".hapus").click(function(index) {
      var id = $(this).parents("tr").attr("id");
      var token = "<?= $dataUser->token ?>";
      var base_url = "<?= $this->config->item('endpoint') ?>";
      // console.log(id);

      Swal.fire({
        title: 'Yakin hapus data?',
        text: "Data terhapus tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal',
      }).then((result) => {
        if (result.value) {
          $.ajax({
            contentType: 'application/json',
            type: 'DELETE',
            url: base_url + '/bumel/penugasan/delete/' + id,
            beforeSend: function(xhr) {
              xhr.setRequestHeader('Authorization', 'Bearer ' + token);
            },
            error: function(data) {
              Swal.fire({
                icon: 'error',
                title: data.responseJSON.status,
                text: data.responseJSON.error,
              })
            },
            success: function(data) {
              console.log(data);
              // $("#"+id).remove();
              Swal.fire("Terhapus!", "Data Penugasan Harian telah terhapus.", "success");
              window.location.reload();
            }
          });
        }
      })

    });

    $(".aktif").click(function() {
      var id = $(this).parents("tr").attr("id");
      var idPo = $(this).parents("tr").attr("idPo");
      var idUser = $(this).parents("tr").attr("idUser");
      var penugasanAktif = $(this).parents("tr").attr("isAktif");
      // var idPenugasanDefaultRitase = $(this).parents("tr").attr("idPenugasanDefaultRitase");
      // var idTrayek = $(this).parents("tr").attr("idTrayek");
      // var keterangan = $(this).parents("tr").attr("keterangan");
      // var ritase = $(this).parents("tr").attr("ritase");

      var token = "<?= $dataUser->token ?>";
      var base_url = "<?= $this->config->item('endpoint') ?>";

      var paramNonAktif = {
        idPenugasan: id,
        idPo: idPo,
        idUser: idUser,
        isAktif: false,
        // ritases: [
        //   {
        //     idPenugasanDefaultRitase: idPenugasanDefaultRitase,
        //     idTrayek: idTrayek,
        //     keterangan: keterangan,
        //     ritase: ritase
        //   }
        // ]
      }

      var paramAktif = {
        idPenugasan: id,
        idPo: idPo,
        idUser: idUser,
        isAktif: true,
        // ritases: [
        //   {
        //     idPenugasanDefaultRitase: idPenugasanDefaultRitase,
        //     idTrayek: idTrayek,
        //     keterangan: keterangan,
        //     ritase: ritase
        //   }
        // ]
      }

      if (penugasanAktif == true) {
        $.ajax({
          contentType: 'application/json',
          type: 'PUT',
          url: base_url + '/bumel/penugasan/edit',
          data: JSON.stringify(paramNonAktif),
          beforeSend: function(xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer ' + token);
          },
          error: function(response) {
            Swal.fire({
              icon: 'error',
              title: response.responseJSON.status,
              text: response.responseJSON.error,
            })
          },
          success: function(response) {
            // console.log(data);
            // $("#"+id).remove();
            Swal.fire("Berhasil", "Data penugasan Non Aktif.", "success");
            window.location.reload();
          }
        });
      } else if (penugasanAktif == false) {
        $.ajax({
          contentType: 'application/json',
          type: 'PUT',
          url: base_url + '/bumel/penugasan/edit',
          data: JSON.stringify(paramAktif),
          beforeSend: function(xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer ' + token);
          },
          error: function(response) {
            Swal.fire({
              icon: 'error',
              title: response.responseJSON.status,
              text: response.responseJSON.error,
            })
          },
          success: function(response) {
            // console.log(data);
            // $("#"+id).remove();
            Swal.fire("Berhasil!", "Data penugasan Aktif.", "success");
            window.location.reload();
          }
        });
      }
    });
  </script>
  <!-- END HAPUS PENUGASAN HARIAN -->