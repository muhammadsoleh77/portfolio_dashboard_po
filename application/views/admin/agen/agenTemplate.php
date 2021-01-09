
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                    <li class="active">Agen</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <!-- START LAPORAN -->
                    <div class="row">
                      <div class="col-md-12">
                        <div class="panel panel-default">
                          <div class="panel-body">
                            <h3>DAFTAR AGEN</h3><br>
                              <table class="table table-bordered table-striped table-responsive">
                                <col width="2%">
                                <col width="10%">
                                <col width="10%">
                                <col width="10%">
                                <col width="5%">

                                <thead>
                                  <tr class="th-bg">
                                    <th class="text-center"><b>No</b>.</th>
                                    <th class="text-center"><b>Nama Agen</b></th>
                                    <th class="text-center"><b>Alamat</b></th>
                                    <th class="text-center"><b>Telepon</b></th>
                                    <th class="text-center"><b>Aksi</b></th>
                                  </tr>
                                </thead>

                                <tbody>
                                  <?php if($listDataAgen) { $no = 1; foreach ($listDataAgen->content as $dataAgen) { ?>
                                    <tr>
                                      <td class="text-center"><?php echo $no++ ?></td>
                                      <td class="text-center"><?php echo $dataAgen->namaAgen ?></td>
                                      <td class="text-center"><?php echo $dataAgen->alamat ?></td>
                                      <td class="text-center"><?php echo $dataAgen->nomorTelpon ?></td>
                                      <td class="text-center">
                                        <a data-toggle="modal" id="id_trayek" href="#myModal" data-id="<?php echo $dataAgen->id ?>" class="btn btn-primary btn-sm">Edit</a>
                                      </td>
                                    </tr>
                                  <?php } } else { ?>
                                    <tr>
                                      <td class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                        <div class="col-md-12">
                          <div class="col-md-4"></div>
                          <div class="col-md-4 text-center">
                              <?php
                                // echo $pagination;
                                // echo $this->pagination->create_links();
                              ?>
                          </div>
                          <div class="col-md-4"></div>
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

<!-- trigger detail loket -->
<script type="text/javascript">
    // $(document).ready(function(){
    //     $('#myModal').on('show.bs.modal', function (e) {          
    //         var id_loket = $(e.relatedTarget).data('id');
    //         var id_po = "<?php echo $dataPo->id ?>";
    //         var token = "<?php echo $dataUser->token ?>";
    //         var base_url = "<?= $this->config->item('endpoint') ?>";

    //         //menggunakan fungsi ajax untuk pengambilan data
    //         $.ajax({
    //             type : 'get',
    //             // header : ('Authorization', 'Bearer ' + token),
    //             url : base_url + '/bumel/po/' + id_po + '/loket/' + id_loket,
    //             beforeSend : function(xhr) {
    //               xhr.setRequestHeader('Authorization', 'Bearer ' + token);
    //             },
    //             success : function(data){
    //               var html = '';
    //               var i;
    //               // for(i=0; i<data.length; i++){
    //                   html += '<tr>'+
    //                           '<td class="text-center">'+data.kontakPerson+'</td>'+
    //                           '<td class="text-center">'+ (data.tempatBerangkat ? "Ya" : "Tidak") +'</td>'+
    //                           '<td class="text-center">'+ (data.isBandara ? "Ya" : "Tidak") +'</td>'+
    //                           '</tr>';
    //               // }
    //               $('#show_data').html(html);
    //             }
    //         });
    //      });
    // });
  </script>
  <!-- End detail loket -->
