
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

                                <?php echo form_open(base_url('admin/spj/tampilJAC'), 'class="form-horizontal"'); ?>
                                <div class="row">
                                <div class="col-md-12">
                                  <div class="form-horizontal">

                                    <div class="form-group">
                                      <div class="col-lg-3 control-label" >
                                        Aktif
                                      </div>
                                      <div class="col-lg-6">
                                        <div class="col-md-12">
                                            <div class="col-md-3"><input name="aktif" type="radio" value="true"> Ya</div>
                                            <div class="col-md-3"><input name="aktif" type="radio" value="false"> Tidak</div>
                                        </div>
                                        <span style="color:red;"><?php echo form_error('aktif'); ?></span>
                                      </div>
                                    </div>

                                        <div>
                                          <div class="col-lg-12 text-center">
                                            <button class="btn btn-success" type="submit">
                                                <!-- <i class="glyphicon glyphicon-search"></i>  -->
                                                Edit
                                            </button>
                                          </div>
                                        </div>
                                  </div>
                                  <!-- <hr> -->
                                </div>
                              </div>
                              <?php echo form_close(); ?>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
