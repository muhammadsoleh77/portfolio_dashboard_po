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
                    <li class="active">SPJ JRC</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <!-- START LAPORAN -->
                    <div class="row">
                      <div class="col-md-12">
                        <div class="panel panel-default">
                          <div class="panel-body">
                            <a href="<?php echo base_url('admin/spj/spjJAC') ?>">
                              <div class="col-md-6 main-menu">
                                <div class="menu disabled">
                                  SPJ JAC
                                </div>
                              </div>
                            </a>
                            <a href="<?php echo base_url('admin/spj/spjJRC') ?>">
                              <div class="col-md-6 main-menu">
                                <div class="menu">
                                  SPJ JRC
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

                    <div class="widgets">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="panel panel-default bootstrap-panel">
                            <div>
                              <div class="panel-body">

                                <?php echo form_open(base_url('admin/spj/tampilJRC'), 'class="form-horizontal"'); ?>
                                <div class="row">
                                <div class="col-md-12">
                                  <div class="form-horizontal">

                                    <div class="form-group">
                                        <div class="col-lg-3 control-label">Tanggal Berangkat</div>
                                        <div class="col-lg-6">
                                          <input class="form-control form_date" type="text" name="tanggal" value="" placeholder="Pilih Tanggal" readonly>
                                          <span style="color:red;"><?php echo form_error('tanggal'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                      <div class="col-lg-3 control-label" >
                                        Pilih Driver
                                      </div>
                                      <div class="col-lg-6">
                                        <select class="form-control select" id="pilihDriver" name="pilihDriver" data-live-search="true">
                                          <option value="" selected disabled>Pilih Driver</option>
                                          <?php foreach ($dataEien->data as $key => $driver) { ?>
                                            <option value="<?php echo $key ?>"><?php echo $driver->nama.' ('.$driver->nik.') ' ?></option>
                                          <?php } ?>
                                        </select>
                                        <span style="color:red;"><?php echo form_error('pilihDriver'); ?></span>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <div class="col-lg-3 control-label" >
                                        Pilih Kondektur
                                      </div>
                                      <div class="col-lg-6">
                                        <select class="form-control select" id="pilihKondektur" name="pilihKondektur" data-live-search="true">
                                          <option value="" selected disabled>Pilih Kondektur</option>
                                          <?php foreach ($dataEien->data as $key => $driver) { ?>
                                            <option value="<?php echo $key ?>"><?php echo $driver->nama.' ('.$driver->nik.') ' ?></option>
                                          <?php } ?>
                                        </select>
                                        <span style="color:red;"><?php echo form_error('pilihKondektur'); ?></span>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <div class="col-lg-3 control-label" >
                                        Pilih Bus
                                      </div>
                                      <div class="col-lg-6">
                                        <select class="form-control select" id="pilihBusLorena" name="pilihBusLorena">
                                          <option value="" disabled selected>Pilih Bus</option>
                                          <?php foreach ($dataBus->data as $key => $bus) { ?>
                                            <option value="<?php echo $key ?>"><?php echo $bus->kodeBus ?></option>
                                          <?php } ?>
                                        </select>
                                        <span style="color:red;"><?php echo form_error('pilihBusLorena'); ?></span>
                                      </div>
                                    </div>

                                        <div>
                                          <div class="col-lg-12 text-center">
                                            <button class="btn btn-success" type="submit">
                                                <!-- <i class="glyphicon glyphicon-search"></i>  -->
                                                Cetak SPJ
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
