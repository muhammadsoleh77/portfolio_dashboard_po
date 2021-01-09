<style>
  /* .skrol{
    overflow-x: scroll;
  } */

  /* #tes {
    overflow-y: visible !important;
  } */
</style>
<div class="widgets" style="margin-top: 50px;">
  <!-- START BREADCRUMB -->
  <ul class="breadcrumb">
    <li><a href="<?php echo base_url('admin/dashboard') ?>"><b>Home</b></a></li>
    <li><a href="<?php echo base_url('admin/setoran') ?>"><b>Setoran</b></a></li>
    <li class="active"><b>Rincian Setoran</b></li>
  </ul>
  <!-- END BREADCRUMB -->

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default bootstrap-panel">
        <div class="">
          <div class="col-md-12">
            <br>
            <h4 class="text-center"><b>RINCIAN SETORAN BUS (<?php echo $paramRincian->kodeBus ?>)</b></h4><br>

            <!-- <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="col-md-6">
                  <label>Pilih Crew</label>
                    <select class="form-control select" id="kru" name="pilihCrew" data-live-search="true">
                      <option value="" selected disabled>Pilih Crew</option>
                      <?php foreach ($listDataCrewSap->data as $keyCrew => $dataCrew) { ?>
                        <option value="<?php echo $dataCrew->CUSTOMER ?>"><?php echo $dataCrew->NAME ?></option>
                      <?php } ?>
                    </select><br><br>
                  </div>
                </div>
              </div>
            </div> -->

            <div class="table-responsive" style="border: none;">
              <!-- <div class=""> -->
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th rowspan="2" class="text-center" style="vertical-align: middle;">Pilih (Cek)</th>
                    <th rowspan="2" class="text-center" style="vertical-align: middle;"><b>Jurusan</b></th>
                    <th rowspan="2" class="text-center" style="vertical-align: middle;"><b>Asal</b></th>
                    <th rowspan="2" class="text-center" style="vertical-align: middle;"><b>Tujuan</b></th>
                    <th rowspan="2" class="text-center" style="vertical-align: middle;"><b>Rit</b></th>
                    <th rowspan="2" class="text-center" style="vertical-align: middle;"><b>Unit Price</b></th>
                    <th colspan="2" class="text-center"><b>Tunai</b></th>
                    <th colspan="2" class="text-center"><b>E-Money</b></th>
                    <th colspan="2" class="text-center"><b>QRIS</b></th>
                  </tr>
                  <tr>

                    <th class="text-center"><b>Pnp</b></th>
                    <th class="text-center"><b>Rp</b></th>
                    <th class="text-center"><b>Pnp</b></th>
                    <th class="text-center"><b>Rp</b></th>
                    <th class="text-center"><b>Pnp</b></th>
                    <th class="text-center"><b>Rp</b></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($paramRincian->detail2 as $key => $rincian) { ?>

                    <!-- AMBIL GET DATA TRAYEK -->
                    <input id="rincian1" type="hidden" value="<?= $paramRincian->idUser ?>" />
                    <input id="rincian2" type="hidden" value="<?= $rincian->unitPrice ?>" />
                    <input id="rincian3" type="hidden" value="<?= $paramRincian->idBus ?>" />
                    <input id="rincian4" type="hidden" value="<?= $paramRincian->jmlBayarEmoney ?>" />
                    <input id="rincian5" type="hidden" value="<?= $paramRincian->jmlBayarTunai ?>" />
                    <input id="rincian6" type="hidden" value="<?= $paramRincian->jmlBayarQris ?>" />
                    <input id="rincian7" type="hidden" value="<?= $paramRincian->jmlPnpEmoney ?>" />
                    <input id="rincian8" type="hidden" value="<?= $paramRincian->jmlPnpTunai ?>" />
                    <input id="rincian9" type="hidden" value="<?= $paramRincian->jmlPnpQris ?>" />
                    <input id="rincian10" type="hidden" value="<?= $paramRincian->kodeBus ?>" />
                    <input id="rincian11" type="hidden" value="<?= $paramRincian->TypeBusSAP ?>" />
                    <input id="rincian12" type="hidden" value="<?= $paramRincian->tanggal ?>" />
                    <!-- END GET DATA TRAYEK -->

                    <!-- AMBIL DATA DETAIL TRAYEK -->
                    <input name="pname1[]" type="hidden" value="<?= $rincian->idTrayek ?>" />
                    <input name="pname2[]" type="hidden" value="<?= $rincian->ritase ?>" />
                    <input name="pname3[]" type="hidden" value="<?= $rincian->namaTrayek ?>" />
                    <input name="pname4[]" type="hidden" value="<?= $rincian->unitPrice ?>" />
                    <input name="pname5[]" type="hidden" value="<?= $rincian->jmlPnpTunai ?>" />
                    <input name="pname6[]" type="hidden" value="<?= $rincian->jmlBayarTunai ?>" />
                    <input name="pname7[]" type="hidden" value="<?= $rincian->jmlPnpEmoney ?>" />
                    <input name="pname8[]" type="hidden" value="<?= $rincian->jmlBayarEmoney ?>" />
                    <input name="pname9[]" type="hidden" value="<?= $rincian->jmlPnpQris ?>" />
                    <input name="pname10[]" type="hidden" value="<?= $rincian->jmlBayarQris ?>" />
                    <input name="pname11[]" type="hidden" value="<?= $rincian->jmlPnpTunai + $rincian->jmlPnpEmoney + $rincian->jmlPnpQris ?>" />
                    <input name="pname12[]" type="hidden" value="<?= $rincian->idTrayekTarif ?>" />
                    <!-- <input name="pname13[]" type="hidden" value="<?= $rincian->lokasiAwal ?>" />
                    <input name="pname14[]" type="hidden" value="<?= $rincian->lokasiAkhir ?>" /> -->
                    <!-- END DATA DETAIL TRAYEK -->


                    <tr>
                      <td class="text-center">
                        <?php
                        if ($rincian->is_checked == true) { ?>
                          <input type="checkbox" name="pname13[]" checked disabled />
                        <?php } else { ?>
                          <input type="checkbox" name="pname13[]" />
                        <?php }
                        ?>
                        <!-- <input type="checkbox" name="pname13[]" /> -->
                      </td>
                      <td class="text-center"><?= $rincian->namaTrayek ?></td>
                      <td class="text-center"><?= $rincian->lokasiAwal ?></td>
                      <td class="text-center"><?= $rincian->lokasiAkhir ?></td>
                      <td class="text-center"><?= $rincian->ritase ?></td>
                      <td class="text-center"><?= $rincian->unitPrice ?></td>
                      <td class="text-center"><?= $rincian->jmlPnpTunai ?></td>
                      <td class="text-right"><?= $rincian->jmlBayarTunai ?></td>
                      <td class="text-center"><?= $rincian->jmlPnpEmoney ?></td>
                      <td class="text-right"><?= $rincian->jmlBayarEmoney ?></td>
                      <td class="text-center"><?= $rincian->jmlPnpQris ?></td>
                      <td class="text-right"><?= $rincian->jmlBayarQris ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td class="text-center" colspan="6"><b>Total</b></td>
                    <td class="text-center">
                      <b>
                        <?php
                        $totalPnp = 0;
                        foreach ($paramRincian->detail2 as $value) {
                          $totalPnp += ($value->jmlPnpTunai);
                        };
                        echo $totalPnp;
                        ?>
                      </b>
                    </td>
                    <td class="text-right">
                      <b>
                        <?php
                        $totalBayar = 0;
                        foreach ($paramRincian->detail2 as $value) {
                          $totalBayar += ($value->jmlBayarTunai);
                        };
                        echo number_format($totalBayar);
                        ?>
                      </b>
                    </td>
                    <td class="text-center">
                      <b>
                        <?php
                        $totalPnp = 0;
                        foreach ($paramRincian->detail2 as $value) {
                          $totalPnp += ($value->jmlPnpEmoney);
                        };
                        echo $totalPnp;
                        ?>
                      </b>
                    </td>
                    <td class="text-right">
                      <b>
                        <?php
                        $totalBayar = 0;
                        foreach ($paramRincian->detail2 as $value) {
                          $totalBayar += ($value->jmlBayarEmoney);
                        };
                        echo number_format($totalBayar);
                        ?>
                      </b>
                    </td>
                    <td class="text-center">
                      <b>
                        <?php
                        $totalPnp = 0;
                        foreach ($paramRincian->detail2 as $value) {
                          $totalPnp += ($value->jmlPnpQris);
                        };
                        echo $totalPnp;
                        ?>
                      </b>
                    </td>
                    <td class="text-right">
                      <b>
                        <?php
                        $totalBayar = 0;
                        foreach ($paramRincian->detail2 as $value) {
                          $totalBayar += ($value->jmlBayarQris);
                        };
                        echo number_format($totalBayar);
                        ?>
                      </b>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center" colspan="6" style="vertical-align: middle;"><b>Pilih Crew</b></td>
                    <td colspan="6">
                      <select class="form-control select" id="kru" name="pilihCrew" data-live-search="true">
                        <option value="" selected disabled>Pilih Crew</option>
                        <?php foreach ($listDataCrewSap->data as $keyCrew => $dataCrew) { ?>
                          <option value="<?php echo $dataCrew->CUSTOMER ?>"><?php echo $dataCrew->NAME ?> (<?php echo $dataCrew->CUSTOMER ?>)</option>
                        <?php } ?>
                      </select>
                    </td>
                  </tr>
                </tfoot>
              </table>
              <!-- </div> -->
            </div>

            <div class="col-md-12">
              <!-- <a href="<?php echo base_url('admin/setoran/terima') ?>" class="btn btn-primary pull-right">
              <i class="glyphicon glyphicon-floppy-disk"></i> Terima
            </a><br><br><br> -->
              <button class="btn btn-primary pull-right simpan" data-loading-text="Processing..." type="button">
                <i class="glyphicon glyphicon-floppy-disk"></i> Simpan
              </button><br><br><br>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {

      $('.table-responsive').on('show.bs.dropdown', function() {
        $('.table-responsive').css("overflow", "inherit");
      });

      $('.table-responsive').on('hide.bs.dropdown', function() {
        $('.table-responsive').css("overflow", "auto");
      })

      var zz = '<?= json_encode($paramRincian); ?>'
      // console.log(zz);

      $("#kru").change(function() {

        var crew = $("#kru").val();

        // DATA RINCIAN
        var a = $("#rincian1").val();
        var b = $("#rincian2").val();
        var c = $("#rincian3").val();
        var d = $("#rincian4").val();
        var e = $("#rincian5").val();
        var f = $("#rincian6").val();
        var g = $("#rincian7").val();
        var h = $("#rincian8").val();
        var i = $("#rincian9").val();
        var j = $("#rincian10").val();
        var k = $("#rincian11").val();
        var l = $("#rincian12").val();
        // END DATA RINCIAN

        // DATA DETAIL RINCIAN
        var values1 = $("input[name='pname1[]']").map(function() {
          return $(this).val();
        }).get();
        var values2 = $("input[name='pname2[]']").map(function() {
          return $(this).val();
        }).get();
        var values3 = $("input[name='pname3[]']").map(function() {
          return $(this).val();
        }).get();
        var values4 = $("input[name='pname4[]']").map(function() {
          return $(this).val();
        }).get();
        var values5 = $("input[name='pname5[]']").map(function() {
          return $(this).val();
        }).get();
        var values6 = $("input[name='pname6[]']").map(function() {
          return $(this).val();
        }).get();
        var values7 = $("input[name='pname7[]']").map(function() {
          return $(this).val();
        }).get();
        var values8 = $("input[name='pname8[]']").map(function() {
          return $(this).val();
        }).get();
        var values9 = $("input[name='pname9[]']").map(function() {
          return $(this).val();
        }).get();
        var values10 = $("input[name='pname10[]']").map(function() {
          return $(this).val();
        }).get();
        var values11 = $("input[name='pname11[]']").map(function() {
          return $(this).val();
        }).get();
        var values12 = $("input[name='pname12[]']").map(function() {
          return $(this).val();
        }).get();
        var values13 = $("input[name='pname13[]']").map(function() {
          return $(this)[0].checked;
        });
        // var values14 = $("input[name='pname14[]']").map(function() {
        //   return $(this).val();
        // }).get();

        var x = []

        values1.forEach(function(idTrayek, index) {
          x.push({
            idTrayek,
            idTrayekTarif: values12[index],
            ritase: values2[index],
            jmlBayarEmoney: values8[index],
            jmlBayarQris: values10[index],
            jmlBayarTunai: values6[index],
            jmlPnp: values11[index],
            checked: values13[index],
            // lokasiAkhir: values14[index],
          });
        })
        // console.log(x);

        // const tesData = x.map((item, index) => {
        //   return {
        //     ...item,
        //     idPP : x.find(item2 => {
        //       if (item.lokasiAwal === item2.lokasiAkhir && item.lokasiAkhir === item2.lokasiAwal) {
        //         // return true
        //         if(item2.jmlPnp > 0) {
        //           return true
        //         }
        //       }
        //     })
        //   }
        // })
        // console.log(tesData)
        // END DATA DETAIL RINCIAN

        const paramSetoran = {
          biayas: [{
            bsetoranBus: {
              // id: 0,
              idBus: c,
              // idInvoice: 0,
              // idLoket: 0,
              idPo: "<?= $dataPo->id ?>",
              // idSetoranPO: 0,
              idUser: a,
              jmlBayarEmoney: d,
              jmlBayarQris: f,
              jmlBayarTunai: e,
              jmlPnpEmoney: g,
              jmlPnpQris: i,
              jmlPnpTunai: h,
              // jumlahBiaya: 0,
              // jumlahPenumpang: 0,
              // jumlahSetoran: 0,
              // keterangan: "string",
              valid: true
            },
            // "id": 0,
            // "jumlah": 0,
            // "keteranganBiaya": "string",
            // "kodeBiaya": "string"
          }],

          details: x.filter((item) => item.checked),
          idBus: c,
          idCrew: crew,
          idPo: "<?= $dataPo->id ?>",
          jmlBayarEmoney: d,
          jmlBayarQris: f,
          jmlBayarTunai: e,
          jmlPnpEmoney: g,
          jmlPnpQris: i,
          jmlPnpTunai: h,
          // "jumlahBiaya": 0,
          // "jumlahSetoran": 0,
          tglTransaksi: l,
          valid: true
        }
        // console.log(paramSetoran);

        var token = "<?= $dataUser->token ?>";
        var base_url = "<?= $this->config->item('endpoint') ?>";

        $(document).on('click', '.simpan', function() {
          // alert('tes')
          // var buttonSimpan = $(this);
          // buttonSimpan.attr("disabled", true);

          // // Loader Processing
          // var loader = $(this);
          // loader.button('loading');
          // // End Loader

          // console.log(paramSetoran)

          if (!paramSetoran.details.length) {
            // alert("CEKLIST DATA TERLEBIH DAHULU!");
            // location.reload();
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'CEKLIST Data Terlebih Dahulu!'
            }).then(function() {
              location.reload();
            });
          } else {

            Swal.fire({
              title: 'Yakin Setoran?',
              text: "Data yang sudah disetor tidak dapat dikembalikan!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, Terima Setoran !'
            }).then((result) => {
              if (result.isConfirmed) {
                // Swal.fire(
                //   'Deleted!',
                //   'Your file has been deleted.',
                //   'success'
                // )
                // }

                var buttonSimpan = $(this);
                buttonSimpan.attr("disabled", true);

                // Loader Processing
                var loader = $(this);
                loader.button('loading');
                // End Loader

                $.ajax({
                  contentType: 'application/json',
                  type: 'POST',
                  url: base_url + '/bumel/setoran',
                  data: JSON.stringify(paramSetoran),
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
                    // window.location.reload();
                  },
                  success: function(response) {
                    // console.log(JSON.parse(response));
                    var res = JSON.parse(response)
                    buttonSimpan.attr("disabled", false);
                    // Swal.fire("Berhasil", "Setoran Dengan No. Document "+res.nodoc+" Berhasil", "success");
                    // alert("Setoran Dengan No. Document "+res.nodoc+" Berhasil");
                    // window.location.href = '<?php echo base_url('admin/setoran') ?>';

                    Swal.fire({
                      icon: 'success',
                      title: 'Berhasil',
                      text: 'Setoran Dengan No. Document ' + res.nodoc,
                      // timer: 9000,
                      // confirmButtonText: "OK"
                      // showConfirmButton: false,
                    }).then(function() {
                      location.href = '<?= base_url('admin/setoran') ?>';
                    });
                  }
                })
              }
            })

            // $.ajax({
            //   contentType: 'application/json',
            //   type: 'POST',
            //   url: base_url + '/bumel/setoran',
            //   data: JSON.stringify(paramSetoran),
            //   beforeSend: function(xhr) {
            //     xhr.setRequestHeader('Authorization', 'Bearer ' + token);
            //   },
            //   error: function(response) {
            //     console.log(response);
            //     Swal.fire({
            //       icon: 'error',
            //       title: 'ERROR',
            //       text: response.responseJSON.message,
            //     })
            //     // window.location.reload();
            //   },
            //   success: function(response) {
            //     // console.log(JSON.parse(response));
            //     var res = JSON.parse(response)
            //     buttonSimpan.attr("disabled", false);
            //     // Swal.fire("Berhasil", "Setoran Dengan No. Document "+res.nodoc+" Berhasil", "success");
            //     // alert("Setoran Dengan No. Document "+res.nodoc+" Berhasil");
            //     // window.location.href = '<?php echo base_url('admin/setoran') ?>';

            //     Swal.fire({
            //       icon: 'success',
            //       title: 'Berhasil',
            //       text: 'Setoran Dengan No. Document ' + res.nodoc,
            //       // timer: 9000,
            //       // confirmButtonText: "OK"
            //       // showConfirmButton: false,
            //     }).then(function() {
            //       location.href = '<?= base_url('admin/setoran') ?>';
            //     });
            //   }
            // })
          }
        })

      })
    });
  </script>