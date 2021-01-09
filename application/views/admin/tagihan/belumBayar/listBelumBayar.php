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
                    <li><a href="<?php echo base_url('admin/tagihan') ?>">Tagihan</a></li>
                    <li class="active">Belum Bayar</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <!-- START LAPORAN -->
                    <div class="row">
                      <div class="col-md-12">
                        <div class="panel panel-default">
                          <div class="panel-body">
                            <a href="<?php echo base_url('admin/tagihan/belumBayar') ?>">
                              <div class="col-md-6 main-menu">
                                <div class="menu">
                                  Belum Bayar
                                </div>
                              </div>
                            </a>
                            <a href="<?php echo base_url('admin/tagihan/sudahBayar') ?>">
                              <div class="col-md-6 main-menu">
                                <div class="menu disabled">
                                  Sudah Bayar
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

                    <div class="row">
                        <div class="col-md-12">
                          <div class="panel panel-default bootstrap-panel">
                            <?php if(!$dataBelumBayar->tagihans) { ?>
                              <div class="col-md-12">
                                <h5>Tidak Ada Data</h5>
                              </div>
                            <?php } else { ?>
                              <div  id="dataTable" class="col-md-12">
                                <br><h3>Data Tagihan Belum Bayar</h3><br>
                                <div class="table-responsive" style="border:none;">
                                  <table class="table table-bordered table-striped">
                                    <!-- <col width="10%"> -->
                                    <col width="10%">
                                    <col width="10%">
                                    <col width="10%">
                                    <col width="10%">
                                    <col width="10%">

                                    <thead>
                                      <tr class="th-bg">
                                        <!-- <th class="text-center"><b>PO</b></th> -->
                                        <th class="text-center"><b>Tgl Awal</b></th>
                                        <th class="text-center"><b>Tgl Akhir</b></th>
                                        <th class="text-center"><b>Total Transaksi</b></th>
                                        <th class="text-center"><b>Total Tagihan</b></th>
                                        <th class="text-center"><b>Aksi</b></th>
                                      </tr>
                                    </thead>

                                    <tbody>
                                      <?php foreach ($dataBelumBayar->tagihans as $key => $tagihan) { ?>
                                        <tr>
                                          <td class="text-center"><?php echo $tagihan->tglAwal ?></td>
                                          <td class="text-center"><?php echo $tagihan->tglAkhir ?></td>
                                          <td class="text-center"><?php echo number_format($tagihan->jumlahRp) ?></td>
                                          <td class="text-center"><?php echo number_format($tagihan->jumlahMdr) ?></td>

                                          <td class="text-center">
                                            <a href="<?php echo base_url('admin/tagihan/detail/'.$tagihan->id) ?>" class="btn btn-success btn-sm">Detail</a>
                                            <!-- <a href="<?php echo base_url('admin/tagihan/cetakPdf/'.$tagihan->id) ?>" class="btn btn-primary btn-sm"><i class="fa fa-file-pdf-o"> Cetak PDF</i></a> -->
                                          </td>
                                        </tr>
                                      <?php } ?>
                                    </tbody>
                                    <!-- <tfoot>
                                    <tr>
                                    <td colspan="6" class="text-center">
                                    <div st-pagination="" st-items-by-page="perPage" st-displayed-pages="pageSize"></div>
                                  </td>
                                </tr>
                              </tfoot> -->
                            </table><br>
                          </div>

                          <div class="col-md-12">
                            <span class="text-center">
                              <div st-pagination="" st-items-by-page="perPage" st-displayed-pages="pageSize"></div>
                            </span>
                          </div>

                        </div>
                            <?php } ?>
                          </div>
                        </div>
                      </div>
