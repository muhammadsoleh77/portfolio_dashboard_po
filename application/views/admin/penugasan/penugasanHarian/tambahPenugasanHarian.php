<div class="widgets" style="margin-top: 50px;">
  <!-- START BREADCRUMB -->
  <ul class="breadcrumb">
    <li><a href="<?php echo base_url('admin/dashboard') ?>"><b>Home</b></a></li>
    <li><a href="<?php echo base_url('admin/penugasan/harian') ?>"><b>Penugasan Harian</b></a></li>
    <li class="active"><b>Tambah Penugasan Harian</b></li>
  </ul>
  <!-- END BREADCRUMB -->

  <!-- PAGE CONTENT WRAPPER -->
  <div class="page-content-wrap">

    <div class="widgets">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default bootstrap-panel">
            <div>
              <div class="panel-body">

                <!-- <?php echo form_open(base_url('admin/spj/tampilJAC'), 'class="form-horizontal"'); ?> -->
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-horizontal">
                      <div class="form-group">
                        <div class="col-lg-3 control-label">
                          Tanggal
                        </div>
                        <div class="col-lg-6">
                          <input class="form-control form_date" size="30" type="text" name="tanggal" value="" placeholder="Pilih Tanggal">
                          <span style="color:red;"><?php echo form_error('tanggal'); ?></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-lg-3 control-label">
                          Pilih User
                        </div>
                        <div class="col-lg-6">
                          <select class="form-control select" id="pilihUser" name="pilihUser" data-live-search="true">
                            <option value="" selected disabled>Pilih User</option>
                            <?php foreach ($dataListUser->data as $key => $user) { ?>
                              <option value="<?php echo $user->idUser ?>"><?php echo $user->name ?></option>
                            <?php } ?>
                          </select>
                          <span style="color:red;"><?php echo form_error('pilihDriver'); ?></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-lg-3 control-label">
                          Pilih Driver
                        </div>
                        <div class="col-lg-6">
                          <select class="form-control select" id="pilihDriver" name="pilihDriver" data-live-search="true">
                            <!-- <option value="" selected disabled>Pilih Driver</option>
                                          <?php foreach ($dataListUser->data as $key => $user) { ?>
                                            <option value="<?php echo $user->idUser ?>"><?php echo $user->name ?></option>
                                          <?php } ?> -->
                            <option selected disabled>Pilih Driver</option>
                            <option value="001">Driver 1</option>
                            <option value="002">Driver 2</option>
                            <option value="003">Driver 3</option>
                          </select>
                          <span style="color:red;"><?php echo form_error('pilihDriver'); ?></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-lg-3 control-label">
                          Pilih Crew
                        </div>
                        <div class="col-lg-6">
                          <select class="form-control select" id="pilihCrew" name="pilihCrew" data-live-search="true">
                            <!-- <option value="" selected disabled>Pilih Crew</option>
                                          <?php foreach ($dataListUser->data as $key => $user) { ?>
                                            <option value="<?php echo $user->idUser ?>"><?php echo $user->name ?></option>
                                          <?php } ?> -->
                            <option selected disabled>Pilih Crew</option>
                            <option value="001">Crew 1</option>
                            <option value="002">Crew 2</option>
                            <option value="003">Crew 3</option>
                          </select>
                          <span style="color:red;"><?php echo form_error('pilihDriver'); ?></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-lg-3 control-label">
                          Pilih Trayek
                        </div>
                        <div class="col-lg-6">
                          <select class="form-control select" id="pilihTrayek" name="pilihTrayek" data-live-search="true">
                            <option value="" selected disabled>Pilih Trayek</option>
                            <?php foreach ($dataTrayekDefault as $key => $data) { ?>
                              <option value="<?php echo $data->idTrayek ?>" data-nama="<?= $data->nama ?>"><?php echo $data->nama ?></option>
                            <?php } ?>
                          </select>
                          <span style="color:red;"><?php echo form_error('pilihDriver'); ?></span>
                        </div>
                        <div class="col-md-2">
                          <button class="btn btn-success" id="addPenugasanDefault"><i class="fa fa-plus"></i></button>
                        </div>
                      </div>

                      <div><br /><br />
                        <div class="form-group">
                          <span class="dynamic_field"></span>
                        </div>
                      </div>

                      <div>
                        <div class="col-lg-12 text-center">
                          <button class="btn btn-primary simpan" type="submit">
                            <i class="fa fa-floppy-o"></i> Simpan
                          </button>
                          <button class="btn btn-warning reset" type="reset">
                            <i class="fa fa-refresh"></i> Reset
                          </button>
                        </div>
                      </div>
                    </div>
                    <!-- <hr> -->
                  </div>
                </div>
                <!-- <?php echo form_close(); ?> -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      var i = 0;

      const add = $('#addPenugasanDefault').click(function() {
        var button = $(this);
        button.attr('disabled', 'disabled');
        setTimeout(function() {
          button.removeAttr('disabled');
        }, 1000);
        i++;
        var namaTrayek = $("#pilihTrayek option:selected").text();
        var idTray = $("#pilihTrayek").val();

        var token = "<?= $dataUser->token ?>";
        var base_url = "<?= $this->config->item('endpoint') ?>";
        var html = '';

        $.ajax({
          contentType: 'application/json',
          type: 'GET',
          url: base_url + '/bumel/trayek/' + idTray,
          beforeSend: function(xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer ' + token);
          },
          error: function(response) {
            Swal.fire({
              icon: 'error',
              title: 'ERROR',
              text: response.responseJSON.message,
            })
          },
          success: function(response) {
            var tarif = response.tarifs;
            // console.log(tarif);

            // console.log($('.count'));
            var count = $('.count').length;

            $.each(tarif, function(index, value) {
              html += '<tr class="count">' +
                '<input type="hidden" class="idAwal" id="idAwal' + (index + count) + '" value="' + value.lokasiAwalId + '">' +
                '<input type="hidden" id="idAkhir' + (index + count) + '" value="' + value.lokasiAkhirId + '">' +
                '<input type="hidden" id="fare' + (index + count) + '" value="' + value.idFare + '">' +
                '<td class="text-center lokAwal" id="lokAwal' + (index + count) + '">' + value.lokasiAwalNama + '</td>' +
                '<td class="text-center lokAkhir" id="lokAkhir' + (index + count) + '">' + value.lokasiAkhirNama + '</td>' +
                '<td class="text-center">' +
                '<input class="form-control inputTarif" id="inputTarif' + (index + count) + '" type="number" value="' + value.tarif + '">'
              '</td>' +
              '</tr>';
            })

            var tabelArah = '';
            tabelArah += '<table id="row' + i + '" class="table table-bordered table-responsive">' +
              '<col width="5%">' +
              '<col width="5%">' +
              '<col width="10%">' +
              '<thead>' +
              '<tr>' +
              '<th class="text-center">Dari</th>' +
              '<th class="text-center">Ke</th>' +
              '<th class="text-center">Harga</th>' +
              '</tr>' +
              '</thead>' +
              '<tbody id="dataHtml">' + html +
              '</tbody>' +
              '</table>';
            $('.dynamic_field').append(tabelArah);
          }
        });

        var html2 = '';
        html2 += '<table id="row' + i + '" class="table table-bordered table-responsive">' +
          '<col width="2%">' +
          '<col width="5%">' +
          '<col width="5%">' +
          '<col width="10%">' +
          '<thead>' +
          '<tr>' +
          '<th class="text-center">#ID</th>' +
          '<th class="text-center">Trayek</th>' +
          '<th class="text-center">Ritase</th>' +
          '<th class="text-center">Keterangan</th>' +
          '</tr>' +
          '</thead>' +
          '<tbody>' +
          '<tr id="add_namefield">' +
          '<td class="text-center" id="idTray' + i + '">' + idTray + '</td>' +
          '<td class="text-center tray" id="trayek' + i + '">' + namaTrayek + '</td>' +
          '<td>' +
          '<select class="form-control rit" id="pilihRitase' + i + '">' +
          '<option value="1">1</option>' +
          '<option value="2">2</option>' +
          '<option value="3">3</option>' +
          '</select>' +
          '</td>' +
          '<td>' +
          '<input type="text" class="form-control keterangan" id="keterangan' + i + '">' +
          '</td>' +
          // '<td class="text-center"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove"><i class="fa fa-trash-o"></i></button></td>' +
          '</tr>' +
          '</tbody>' +
          '</table>';
        $('.dynamic_field').append(html2);
        // $(".rit").selectpicker();
      });

      // $(document).on('click', '.btn_remove', function(){  
      //      var button_id = $(this).attr("id");   
      //      $('#row'+button_id+'').remove();  
      // });

      $(document).on('click', '.simpan', function() {

        var buttonSimpan = $(this);
        buttonSimpan.attr('disabled', 'disabled');
        setTimeout(function() {
          buttonSimpan.removeAttr('disabled');
        }, 1000);

        var idPo = "<?= $dataPo->id ?>";
        var idUser = $("#pilihUser").val();
        var namaSupir = $("#pilihDriver option:selected").text();
        var namaCrew = $("#pilihCrew option:selected").text();
        var tanggal = $(".form_date").val();
        var paramSimpan = {
          supir: namaSupir,
          crew: namaCrew,
          date: tanggal,
          idPo: idPo,
          idUser: idUser,
          isAktif: true,
          ritases: [],
          tarifs: []
        };

        var pilihLok = document.querySelectorAll('.idAwal');
        // console.log(pilihLok);

        if (paramSimpan.tarifs.length > 0) {
          paramSimpan.tarifs.clear();
          paramSimpan.tarifs = [];
        } else {
          for (var t = 0; t < pilihLok.length; t++) {
            var idAwal = $("#idAwal" + t).val();
            var idAkhir = $("#idAkhir" + t).val();
            var namaAwal = $("#lokAwal" + t).text();
            var namaAkhir = $("#lokAkhir" + t).text();
            var dataTarif = $("#inputTarif" + t).val();
            var fare = $("#fare" + t).val();

            paramSimpan.tarifs.push({
              lokasiAwalId: idAwal,
              lokasiAwalNama: namaAwal,
              lokasiAkhirId: idAkhir,
              lokasiAkhirNama: namaAkhir,
              tarif: dataTarif,
              idFare: fare
            });
            // console.log(paramSimpan.tarifs);
          }
        }

        var pilihRit = document.querySelectorAll('.rit');

        var token = "<?= $dataUser->token ?>";
        var base_url = "<?= $this->config->item('endpoint') ?>";

        if (paramSimpan.ritases.length > 0) {
          paramSimpan.ritases.clear();
          paramSimpan.ritases = [];
        }
        for (var x = 0; x < pilihRit.length; x++) {
          var ii = x + 1;
          var idTrayek = $("#idTray" + ii).text();
          var ritase = $("#pilihRitase" + ii).val();
          var keterangan = $("#keterangan" + ii).val();

          paramSimpan.ritases.push({
            idTrayek: idTrayek,
            keterangan: keterangan,
            ritase: ritase
          });
        }
        // console.log(paramSimpan);

        $.ajax({
          contentType: 'application/json',
          type: 'POST',
          url: base_url + '/bumel/penugasan/add',
          data: JSON.stringify(paramSimpan),
          beforeSend: function(xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer ' + token);
          },
          error: function(response) {
            // console.log(response);
            Swal.fire({
              icon: 'error',
              title: 'ERROR',
              text: response.responseJSON.message,
            })
            // window.location.reload();
          },
          success: function(response) {
            // console.log(response);
            Swal.fire("Berhasil", "Data penugasan Harian Ditambah", "success");
            // window.location.reload();
          }
        });
      });

      $(".reset").click(function() {
        window.location.reload();
      });

    });
  </script>