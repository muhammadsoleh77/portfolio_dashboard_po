<style media="screen">
  .main-menu {
    text-align: center;
    padding: 10px;
  }

  .menu {
    /* font-size:16px; */
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
  .trayek {
    display: inline-block;
  }

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
    <li class="active"><b>Penugasan</b></li>
  </ul>
  <!-- END BREADCRUMB -->

  <!-- PAGE CONTENT WRAPPER -->
  <div class="page-content-wrap">

    <!-- START LAPORAN -->
    <div class="row">
      <?php if ($dataPo->id == 1) { ?>
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-body">
              <div id="dataTable" class="col-md-12">
                <h3>List Penugasan Default</h3><br>
                <div class="col-md-12">
                  <!-- <button class="btn btn-warning pull-right" ng-click="add()"><i class="glyphicon glyphicon-plus"></i>Tambah</button> -->
                  <a href="<?= base_url('admin/penugasan/addDefault') ?>" class="btn btn-primary pull-right"><i class="fa fa-plus"> Tambah</i></a>
                </div><br /><br /><br />
                <div class="table-responsive" style="border:none;">
                  <table class="table table-bordered table-striped">
                    <col width="8%">
                    <col width="10%">
                    <col width="10%">
                    <col width="5%">
                    <col width="5%">

                    <thead>
                      <tr class="th-bg">
                        <th class="text-center"><b>User</b></th>
                        <th class="text-center"><b>Trayek</b></th>
                        <th class="text-center"><b>Keterangan</b></th>
                        <th class="text-center"><b>Harga</b></th>
                        <th class="text-center"><b>Aksi</b></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($listDataDefault->penugasan as $key => $dataDefault) { ?>
                        <tr id="<?php echo $dataDefault->id ?>" idPo="<?= $dataDefault->idPo ?>" idUser="<?= $dataDefault->idUser ?>" isAktif="<?= $dataDefault->isAktif ?>">
                          <td class="text-center"><?= $dataDefault->namaUser; ?></td>
                          <td class="text-center">
                            <table class="trayek">
                              <?php foreach ($dataDefault->ritase as $ritase) { ?>
                                <tr>
                                  <td class="text-center"><?php echo $ritase->nama ?></td>
                                </tr>
                              <?php } ?>
                            </table>
                          </td>
                          <td class="text-center">
                            <table class="trayek">
                              <?php foreach ($dataDefault->ritase as $ritase) { ?>
                                <tr>
                                  <td class="text-center"><?php echo $ritase->keterangan ?></td>
                                </tr>
                              <?php } ?>
                            </table>
                          </td>
                          <td class="text-center">
                            <table class="trayek">
                              <?php foreach ($dataDefault->ritase as $ritase) { ?>
                                <?php foreach ($ritase->tarifs as $tarif) { ?>
                                  <tr>
                                    <td class="text-center"><?php echo $tarif->tarif ?></td>
                                  </tr>
                                <?php } ?>
                              <?php } ?>
                            </table>
                          </td>
                          <td class="text-center">
                            <!-- <button class="btn btn-info btn-sm" ng-show="!item.isAktif" ng-click="aktifNonAktif($index)">Aktif</button>
                                            <button style="background-color: grey; color:white;" class="btn btn-sm" ng-show="item.isAktif" ng-click="aktifNonAktif($index)">Tidak Aktif</button>
                                            <button class="btn btn-danger btn-sm" ng-click="hapus($index)" type="button" name="button">Hapus</button> -->
                            <!-- <a href="<?php echo base_url('admin/penugasan/editPenugasanDefault/' . $dataDefault->id) ?>" class="btn btn-warning btn-sm">Edit</a> -->
                            <?php if ($dataDefault->isAktif == true) { ?>
                              <button class="btn btn-info btn-sm aktifs">Aktif</button>
                            <?php } else { ?>
                              <button style="background-color:grey; color:white;" class="btn btn-sm aktifs">Tidak Aktif</button>
                            <?php } ?>
                            <a href="#" class="btn btn-danger btn-sm hapus">Hapus</a>
                            <!-- <button type="submit" class="btn btn-danger hapus"> Hapus</button> -->
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
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
          </div>
        </div>
      <?php } else { ?>
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-body">
              <a href="<?php echo base_url('admin/penugasan/default') ?>">
                <div class="col-md-6 main-menu">
                  <div class="menu">
                    Penugasan Default
                  </div>
                </div>
              </a>
              <a href="<?php echo base_url('admin/penugasan/harian') ?>">
                <div class="col-md-6 main-menu">
                  <div class="menu">
                    Penugasan Harian / SPJ
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      <?php } ?>
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

  <!-- START HAPUS PENUGASAN DEFAULT -->
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
            url: base_url + '/bumel/default/delete/' + id,
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
              // Swal.fire("Terhapus!", "Data penugasan telah terhapus.", "success");
              // window.location.reload();

              Swal.fire({
                icon: 'success',
                title: 'Terhapus!',
                text: 'Data penugasan telah terhapus'
              }).then(function() {
                location.href = '<?= base_url('admin/penugasan') ?>';
              })
            }
          });
        }
      })

    });

    $(".aktifs").click(function() {
      var id = $(this).parents("tr").attr("id");
      var idPo = $(this).parents("tr").attr("idPo");
      var idUser = $(this).parents("tr").attr("idUser");
      var penugasanAktif = $(this).parents("tr").attr("isAktif");
      var idPenugasanDefaultRitase = $(this).parents("tr").attr("idPenugasanDefaultRitase");
      var idTrayek = $(this).parents("tr").attr("idTrayek");
      var keterangan = $(this).parents("tr").attr("keterangan");
      var ritase = $(this).parents("tr").attr("ritase");

      var token = "<?= $dataUser->token ?>";
      var base_url = "<?= $this->config->item('endpoint') ?>";

      var paramNonAktif = {
        idPenugasanDefault: id,
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
        idPenugasanDefault: id,
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
          url: base_url + '/bumel/default/edit',
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
            // Swal.fire("Berhasil", "Data penugasan Non Aktif.", "success");
            // window.location.reload();

            Swal.fire({
              icon: 'success',
              title: 'Berhasil',
              text: 'Data penugasan Non Aktif'
            }).then(function() {
              location.href = '<?= base_url('admin/penugasan') ?>';
            })
          }
        });
      } else if (penugasanAktif == false) {
        $.ajax({
          contentType: 'application/json',
          type: 'PUT',
          url: base_url + '/bumel/default/edit',
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
            // Swal.fire("Berhasil!", "Data penugasan Aktif.", "success");
            // window.location.reload();

            Swal.fire({
              icon: 'success',
              title: 'Berhasil',
              text: 'Data penugasan Aktif'
            }).then(function() {
              location.href = '<?= base_url('admin/penugasan') ?>';
            })
          }
        });
      }
    });
  </script>
  <!-- END HAPUS PENUGASAN DEFAULT -->