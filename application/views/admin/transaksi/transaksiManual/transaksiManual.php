<style media="screen">
  .main-menu {
    text-align:center;
    padding:10px;
  }
  .menu {
    /* font-size:16px; */
    background-color:#e0af1b;
    border:2px solid #e0af1b;
    border-radius:6px;
    padding:10px;
    color:#fff;
  }
  .menu:hover {
    background-color:#fff;
    color:#e0af1b;
    cursor:pointer;
    border:2px solid #e0af1b;
  }
  .disabled {
    border: 2px solid #ddd;
    background-color: #ddd;
    cursor: pointer;
  }
</style>
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                    <li class="active">Transaksi Manual</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <!-- START LAPORAN -->
                    <div class="row">
                      <div class="col-md-12">
                        <div class="panel panel-default">
                          <div class="panel-body">
                            <a href="<?php echo base_url('admin/transaksi/transaksiManualLorena') ?>">
                              <div class="col-md-6 main-menu">
                                <div class="menu">
                                  Transaksi Manual
                                </div>
                              </div>
                            </a>
                            <a href="<?php echo base_url('admin/transaksi/hapusTransaksiLorena') ?>">
                              <div class="col-md-6 main-menu">
                                <div class="menu disabled">
                                  Hapus Transaksi
                                </div>
                              </div>
                            </a>
                          </div>
                        </div>
                      </div>

                      <div class="content-top clearfix">
                        <h2>&nbsp;</h2>
                      </div>
                    </div>
                    <!-- END LAPORAN -->

                    <?php echo form_open(base_url('admin/transaksi/simpan')); ?>
                    <div class="row">
                    <div class="col-md-12">
                      <div class="panel panel-default">
                        <div class="panel-body">
                          <div class="form-horizontal">
                            <!-- <div class="text-center">
                              <h5 style="color:red" ng-show="errorNext">{{ errorNext }}</h5>
                            </div> -->

                            <?php if($dataUser->idPo == 3) { ?>
                              <div class="form-group">
                                <div class="col-lg-3 control-label">
                                  Pilih Pengguna
                                </div>
                                <div class="col-lg-6">
                                  <select class="form-control" name="" ng-model="pilihUser" ng-options="a.idUser as a.nama for a in user">
                                    <option value="" disabled="">Pilih Pengguna</option>
                                  </select>
                                </div>
                              </div>
                            <?php } ?>

                            <div class="form-group">
                              <!-- <div class="text-center">
                                <h5 style="color:red" ng-show="errorDate">{{ errorDate }}</h5>
                              </div> -->
                                <div class="col-lg-3 control-label">Tanggal Berangkat</div>
                                <div class="col-lg-6">
                                  <!-- <datepicker date-min-limit="{{ limit }}" date-format="yyyy-MM-dd">
                                    <input ng-model="tanggal" id="tanggal" class="form-control" placeholder="Pilih Tanggal" onkeydown="return false" />
                                  </datepicker> -->
                                  <!-- <datepicker date-format="yyyy-MM-dd">
                                    <input ng-model="tanggal" id="tanggal" class="form-control" placeholder="Pilih Tanggal" onkeydown="return false" />
                                  </datepicker> -->
                                  <input class="form-control form_date" type="text" name="tanggal" value="" placeholder="Pilih Tanggal" readonly>
                                  <span style="color:red;"><?php echo form_error('tanggal'); ?></span>
                                </div>
                            </div>

                            <?php if($dataUser->idPo != 3) { ?>
                              <div class="form-group">
                                <div class="col-lg-3 control-label" >
                                  Pilih Bus
                                </div>
                                <div class="col-lg-6">
                                  <select class="form-control select" id="pilihBusLorena" name="pilihBusLorena">
                                    <option value="" disabled selected>Pilih Bus</option>
                                    <?php foreach ($dataBus->data as $key => $value) { ?>
                                      <option value="<?php echo $value->idUser ?>"><?php echo $value->kodeBus ?></option>
                                      <!-- echo '<option value="'.$dataBus.'" idUser="'.$dataBus->idUser.'">'.$dataBus->kodeBus.'</option>'; -->
                                    <?php } ?>
                                  </select>
                                  <span style="color:red;"><?php echo form_error('pilihBusLorena'); ?></span>
                                </div>
                              </div>
                            <?php } ?>

                            <?php if($dataUser->idPo == 3) { ?>
                              <div class="form-group">
                                <div class="col-lg-3 control-label" >
                                  Pilih Bus
                                </div>
                                <div class="col-lg-6">
                                  <select class="form-control" name="" ng-model="pilihBus" ng-options="a as a.id for a in bus" ng-change="changeBus(pilihBus)">
                                    <option value="" disabled="">Pilih Bus</option>
                                  </select>
                                </div>
                              </div>
                            <?php } ?>

                              <!-- <div class="form-group" ng-show="user.idPo == 3">
                                <div class="col-lg-3 control-label">
                                  Pilih Loket
                                </div>
                                <div class="col-lg-6">
                                  <select class="form-control" name="" ng-model="pilihLoket" ng-options="a.id as a.nama for a in listLoket" ng-change="tampilloket()">
                                    <option value="" disabled="">Pilih Loket</option>
                                  </select>
                                </div>
                              </div> -->

                              <!-- <div class="form-group">
                                <div class="text-center">
                                  <h5 style="color:red" ng-show="errorDate">{{ errorDate }}</h5>
                                </div>
                                  <div class="col-lg-3 control-label">Tanggal Berangkat</div>
                                  <div class="col-lg-6">
                                    <datepicker date-min-limit="{{ limit }}" date-format="yyyy-MM-dd">
                                      <input ng-model="$parent.tanggal" id="tanggal" class="form-control" placeholder="Pilih Tanggal" onkeydown="return false" />
                                    </datepicker>
                                  </div>
                              </div> -->

                              <!-- <div class="form-group" ng-show="user.idPo == 3">
                                  <div class="col-lg-3 control-label">Pilih Trayek</div>
                                  <div class="col-lg-6">
                                    <select class="form-control" name="" ng-model="pilihTrayek" ng-options="a as a.trayek for a in listTrayek" ng-change="tampilTrayek(pilihTrayek)">
                                      <option value="" disabled="">Pilih Trayek</option>
                                    </select>
                                  </div>
                              </div> -->

                              <?php if($dataUser->idPo == 3) { ?>
                                <div class="form-group">
                                  <div class="col-lg-3 control-label">Pilih Trayek</div>
                                  <div class="col-lg-6">
                                    <select class="form-control" name="" ng-model="pilihTrayek" ng-options="a as a.trayek for a in listTrayek" ng-change="tampilTrayek(pilihTrayek)">
                                      <option value="" disabled="">Pilih Trayek</option>
                                    </select>
                                  </div>
                                </div>
                              <?php } ?>

                              <?php if($dataUser->idPo != 3) { ?>
                                <div class="form-group">
                                  <div class="col-lg-3 control-label">Pilih Trayek</div>
                                  <div class="col-lg-6">
                                    <select class="form-control select" id="pilihTrayekLorena" name="pilihTrayekLorena" required>
                                      <option disabled selected>Pilih Trayek</option>
                                      <!-- <option value=""></option> -->
                                    </select>
                                    <span style="color:red;"><?php echo form_error('pilihTrayekLorena'); ?></span>
                                  </div>
                                </div>
                              <?php } ?>

                              <div class="form-group">
                                  <div class="col-lg-3 control-label">Pilih Jadwal</div>
                                  <div class="col-lg-6">
                                    <select class="form-control select" name="pilihJadwal" id="pilihJadwal" ng-change="tampilJadwal(pilihJadwal)">
                                      <option value="" disabled selected>Pilih Jadwal</option>
                                    </select>
                                  </div>
                              </div>

                              <!-- <div class="form-group" ng-show="listJadwal.length !== 0">
                                  <div class="col-lg-3 control-label">Pilih Jadwal</div>
                                  <div class="col-lg-6">
                                    <select class="form-control" name="" ng-model="pilihJadwal" ng-options="a.id as a.waktu for a in listJadwal" ng-change="tampilJadwal(pilihJadwal)">
                                      <option value="" disabled="">Pilih Jadwal</option>
                                    </select>
                                  </div>
                              </div> -->

                              <div class="form-group">
                                  <div class="col-lg-3 control-label">Harga per (Asal - Tujuan)</div>
                                  <div class="col-lg-6">
                                    <!-- <input class="form-control" ng-model="hargaTransaksi" type="number" name="" value=""> -->
                                    <select class="form-control select" id="pilihHarga" name="pilihHarga">
                                      <option value="" disabled selected>Pilih Harga</option>
                                    </select>
                                    <span style="color:red;"><?php echo form_error('pilihHarga'); ?></span>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="col-lg-3 control-label">Jumlah Tiket</div>
                                  <div class="col-lg-6">
                                    <select class="form-control select" name="jumlahTiket" id="jumlahTiket">
                                      <option value="" disabled selected>Pilih Tiket</option>
                                      <option value="1">1 Orang</option>
                                      <option value="2">2 Orang</option>
                                      <option value="3">3 Orang</option>
                                      <option value="4">4 Orang</option>
                                    </select>
                                    <span style="color:red;"><?php echo form_error('jumlahTiket'); ?></span>
                                  </div>
                              </div>

                              <!-- <div class="form-group" ng-show="jmlTiket">
                                  <div class="col-lg-3 control-label">Total Harga</div>
                                  <div class="col-lg-6">
                                    <span class="form-control" ng-model="totalHarga"></span>
                                  </div>
                              </div> -->

                                <div>
                                  <div class="col-lg-12 text-center">
                                    <button class="btn btn-warning" type="submit">
                                        <!-- <i class="glyphicon glyphicon-search"></i>  -->
                                        Submit
                                    </button>
                                  </div>
                                </div>
                              </div>
                        </div>
                      </div>
                      <!-- <hr> -->
                    </div>
                    </div>
                    <?php echo form_close(); ?>

<script type="text/javascript">
  $(document).ready(function(){
    $('#pilihBusLorena').change(function(){
      var id=$(this).val();
      // var id = $('option:selected', this).attr('idUser');
      console.log(id);
      $.ajax({
        url : "http://bumelapi.otobus.co.id:8484/bumel/penugasan/user/" + id,
        method : "GET",
        // data : {id : id},
        async : true,
        dataType : 'json',
        success: function(data){
          console.log(data);
          // $("#pilihTrayekLorena").html(data).select('refresh');
          // $('#pilihTrayekLorena').select('refresh');
          // var html = '';
          // for(var i=0; i<data.ritase.length; i++){
          //   html += '<option value='+data.ritase[i].idTrayek+'>'+data.ritase[i].trayek+'</option>';
          // }
          // $("#pilihTrayekLorena").html(html);

          var $el = $("#pilihTrayekLorena");
          $el.empty(); // remove old options
          $.each(data.ritase, function(key,value) {
            // console.log(value);
            $el.append($("<option></option>")
               .attr("value", value.idTrayek).text(value.trayek)).selectpicker('refresh');
          });
          $el.change('refresh');
        }
      });
      return false;
    });

    $('#pilihTrayekLorena').change(function() {
      var id=$(this).val();
      $.ajax({
        url : "http://bumelapi.otobus.co.id:8484/bumel/po/" + id + "/jadwal",
        method : "GET",
        // data : {id : id},
        async : true,
        dataType : 'json',
        success: function(data){
          // console.log(data);
          var $el2 = $("#pilihJadwal");
          $el2.empty(); // remove old options
          $.each(data, function(key,value) {
            // console.log(value);
            $el2.append($("<option></option>")
               .attr("value", value.id).text(value.waktu)).selectpicker('refresh');
          });
          $el2.change();
        }
      });
      return false;
    });

    $('#pilihTrayekLorena').change(function() {
      var id=$(this).val();
      $.ajax({
        url : "http://bumelapi.otobus.co.id:8484/bumel/tariftrayek/" + id,
        method : "GET",
        // data : {id : id},
        async : true,
        dataType : 'json',
        success: function(data){
          // console.log(data);
          var $el3 = $("#pilihHarga");
          $el3.empty(); // remove old options
          $.each(data, function(key,value) {
            // console.log(value);
            $el3.append($("<option></option>")
               .attr("value", value.tarif).text(value.tarif + " (" + value.namaAwal + "-" + value.namaAkhir + ")")).selectpicker('refresh');
          });
          $el3.change();
        }
      });
      return false;
    });
  });
</script>
