
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                    <li><a href="<?php echo base_url('admin/trayek') ?>">Trayek</a></li>
                    <li class="active">Detail Trayek</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <!-- START LAPORAN -->
                    <div class="row">
                      <div class="col-md-12">
                        <div class="panel panel-default">
                          <div class="panel-body">
                            <h3>DETAIL TRAYEK</h3><br>
                              <table class="table table-bordered table-striped table-responsive">
                                <col width="2%">
                                <col width="15%">
                                <col width="15%">
                                <col width="5%">

                                <thead>
                                  <tr class="th-bg">
                                    <th class="text-center"><b>Nama Trayek</b></th>
                                    <th class="text-center"><b>Kode Trayek</b></th>
                                    <th class="text-center"><b>Telepon</b></th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center"><?php echo $detailTrayek->nama ?></td>
                                        <td class="text-center"><?php echo $detailTrayek->kode ?></td>
                                        <td class="text-center"><?php echo $detailTrayek->kontak ?></td>
                                    </tr>
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
