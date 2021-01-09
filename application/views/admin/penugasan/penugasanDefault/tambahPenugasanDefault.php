<div class="widgets" style="margin-top: 50px;">
  <!-- START BREADCRUMB -->
  <ul class="breadcrumb">
    <li><a href="<?php echo base_url('admin/dashboard') ?>"><b>Home</b></a></li>
    <li><a href="<?php echo base_url('admin/penugasan') ?>"><b>Penugasan Default</b></a></li>
    <li class="active"><b>Tambah Penugasan Default</b></li>
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
      var token = "<?= $dataUser->token ?>";
      var base_url = "<?= $this->config->item('endpoint') ?>";

      // MEMBUAT SHOW / HIDE BUTTON ADD JIKA BELUM PILIH TRAYEK, TOMBOL TIDAK MUNCUL
      $('#addPenugasanDefault').hide();
      $('.simpan').hide();

      $('#pilihUser').on('change', function() {
        $('#pilihTrayek').on('change', function() {
          $('#addPenugasanDefault').show();
        })
      })

      $('#pilihTrayek').on('change', function() {
        $('#pilihUser').on('change', function() {
          $('#addPenugasanDefault').show();
        })
      })
      // END

      $('#addPenugasanDefault').click(function() {

        $('.simpan').show();

        var button = $(this);
        button.attr('disabled', 'disabled');
        setTimeout(function() {
          button.removeAttr('disabled');
        }, 1000);
        i++;
        var namaTrayek = $("#pilihTrayek option:selected").text();
        var idTray = $("#pilihTrayek").val();
        console.log(idTray);

        // var token = "<?= $dataUser->token ?>";
        // var base_url = "<?= $this->config->item('endpoint') ?>";

          $.ajax({
            contentType: 'application/json',
            type: 'GET',
            url: base_url + '/bumel/trayek/' + idTray,
            beforeSend: function(xhr) {
              xhr.setRequestHeader('Authorization', 'Bearer ' + token);
            },
            error: function(response) {
              console.log(response);
              Swal.fire({
                icon: 'error',
                title: 'ERROR',
                text: response.responseJSON.message,
              })
            },
            success: function(response) {
              var tarif = response.tarifs;
              var html = '';
  
              $.each(tarif, function(index, value) {
                html += '<tr id="add_namefield">' +
                  '<td class="text-center">' + value.lokasiAwalNama + '</td>' +
                  '<td class="text-center">' + value.lokasiAkhirNama + '</td>' +
                  '<td class="text-center">' + value.tarif + '</td>' +
                  '</tr>';
              })
  
              var tabelArah = '';
              tabelArah += '<table class="table table-bordered table-responsive">' +
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
                '<tbody>' + html +
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
        var paramSimpan = {
          idPo: idPo,
          idUser: idUser,
          isAktif: true,
          ritases: []
        };

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

        console.log(paramSimpan);

        $.ajax({
          contentType: 'application/json',
          type: 'POST',
          url: base_url + '/bumel/default/add',
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
            // Swal.fire("Berhasil", "Data penugasan Ditambah", "success");
            // window.location.reload();

            Swal.fire({
              icon: 'success',
              title: 'Berhasil',
              text: 'Data penugasan Ditambah'
            }).then(function() {
              location.href = '<?= base_url('admin/penugasan') ?>';
            })
          }
        });
      });

      $(".reset").click(function() {
        window.location.reload();
      });

    });
  </script>