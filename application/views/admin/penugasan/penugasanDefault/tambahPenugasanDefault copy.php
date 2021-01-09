
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                    <li class="active">Tambah Penugasan Default</li>
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
                                      <div class="col-lg-3 control-label" >
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
                                      <div class="col-lg-3 control-label" >
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
                                    <div><br/><br/>
                                      <div class="form-group">

                                          <table id="tabel" class="table table-bordered table-responsive">
                                            <col width="10%">
                                            <col width="5%">
                                            <col width="10%">
                                            <thead>
                                              <tr>
                                                <th class="text-center">Dari</th>
                                                <th class="text-center">Ke</th>
                                                <th class="text-center">Harga</th>
                                              </tr>
                                            </thead>
                                            <tbody class="dynamic_detail">
                                            </tbody>
                                          </table>

                                          <!-- <span id="dynamic_detail"></span> -->
                                          <span id="dynamic_field"></span>
                                      </div>
                                    </div>

                                        <div>
                                          <div class="col-lg-12 text-center">
                                            <button class="btn btn-primary simpan" type="submit">
                                                <i class="fa fa-floppy-o"></i> Simpan
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

<script>  
 $(document).ready(function(){
      var i=0;
      var j =0;
      $("#tabel").hide();

      const add = $('#addPenugasanDefault').click(function(){
          i++;
          var namaTrayek = $("#pilihTrayek option:selected").text();
          var idTray = $("#pilihTrayek").val();

          var token = "<?= $dataUser->token ?>";
          var base_url = "<?= $this->config->item('endpoint') ?>";

            $.ajax({
              contentType: 'application/json',
              type: 'GET',
              url : base_url + '/bumel/trayek/'+idTray,
              // data: JSON.stringify(paramSimpan),
              beforeSend : function(xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer ' + token);
              },
              error: function(response) {
                // console.log(response);
                Swal.fire({
                  icon: 'error',
                  title: 'ERROR',
                  text: response.responseJSON.message,
                })
              },
              success: function(response) {
                // var lintasan = response.lintasans;
                var tarif = response.tarifs;

                $.each(tarif, function(index, value) {
                  j++;

                  var namaAwal = value.lokasiAwalNama;
                  console.log(namaAwal);
                  // console.log(value.tarif);
                  var html = '';
             html += '<tr id="row'+j+'">' +
                        '<td class="text-center" id="idTray">'+ value.lokasiAwalNama +'</td>' +
                        '<td class="text-center tray" id="trayek">'+ value.lokasiAkhirNama +'</td>' +
                        '<td class="text-center">' + value.tarif + '</td>' +
                      '</tr>';
                      $("#tabel").show();
                      $('.dynamic_detail').append(html);
                })
              }
            });
           
          var html2 = '';
          html2 += '<table id="row'+i+'" class="table table-bordered table-responsive">' +
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
                          '<td class="text-center" id="idTray'+i+'">'+ idTray +'</td>' +
                            '<td class="text-center tray" id="trayek'+i+'">'+ namaTrayek +'</td>' +
                            '<td>' +
                              '<select class="form-control rit" id="pilihRitase'+i+'">' +
                                '<option value="1">1</option>' +
                                '<option value="2">2</option>' +
                                '<option value="3">3</option>' +
                              '</select>' +
                            '</td>' +
                            '<td>' +
                            '<input type="text" class="form-control keterangan" id="keterangan'+i+'">' +
                            '</td>' +
                            // '<td class="text-center"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove"><i class="fa fa-trash-o"></i></button></td>' +
                          '</tr>' +
                        '</tbody>' +
                      '</table>';
                      // $('#dynamic_detail').append(html);
                      $('#dynamic_field').append(html2);
                      // $(".rit").selectpicker();

                      
                      // var pilihRit = i;
                      // console.log(trayekksss);

                      // var idPo = "<?= $dataPo->id ?>";      
                      // var idUser = $("#pilihUser").val();
                      // var paramSimpan = {
                      //   idPo: idPo,
                      //   idUser: idUser,
                      //   isAktif: true,
                      //   ritases: []
                      // };
                      // console.log(paramSimpan);

                      

      });         
      
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });

$(document).on('click', '.simpan', function(){

var idPo = "<?= $dataPo->id ?>";      
var idUser = $("#pilihUser").val();
var paramSimpan = {
idPo: idPo,
idUser: idUser,
isAktif: true,
ritases: []
};
console.log(paramSimpan);

var pilihRit = document.querySelectorAll('.rit');

var token = "<?= $dataUser->token ?>";
var base_url = "<?= $this->config->item('endpoint') ?>";

console.log("kkkkkkkkk"+paramSimpan.ritases);
if(paramSimpan.ritases.length > 0){
  console.log("hehheh");
  paramSimpan.ritases.clear();
  paramSimpan.ritases = [];
}
console.log(paramSimpan.ritases.length);
console.log("length"+pilihRit.length);
for(var x=0; x<pilihRit.length; x++){
  var ii = x+1;
  var idTrayek = $("#idTray"+ii).text();
  // console.log(idTrayek);
var ritase = $("#pilihRitase"+ii).val();
var keterangan = $("#keterangan"+ii).val();

paramSimpan.ritases.push({
    idTrayek: idTrayek,
    keterangan: keterangan,
    ritase: ritase
  });
 console.log(paramSimpan.ritase);
  console.log("q jjjjjjjjj");
  console.log(paramSimpan);
}

$.ajax({
  contentType: 'application/json',
  type: 'POST',
  url : base_url + '/bumel/default/add',
  data: JSON.stringify(paramSimpan),
  beforeSend : function(xhr) {
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
    console.log(response);
    Swal.fire("Berhasil", "Data penugasan Ditambah", "success");
    // window.location.reload();
  }
});
});
      
 });  
 </script>