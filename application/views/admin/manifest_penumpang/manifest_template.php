<style media="screen">
  .main-menu {
    text-align:center;
    padding:10px;
  }
  .menu {
    font-size:16px;
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
    <li class="active">Manifest Penumpang</li>
</ul>
<!-- END BREADCRUMB -->

<div class="widgets">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default bootstrap-panel">
        <div>
          <div class="panel-body">

            <?php echo form_open(base_url('admin/manifest_penumpang/tampil'), 'class="form-horizontal"'); ?>
            <div class="row">
            <div class="col-md-12">
              <div class="form-horizontal">
                <div class="form-group">

                    <?php echo validation_errors('<div class="alert alert-warning">','</div>'); ?>
                      <div class="col-lg-3">
                        <input class="form-control form_date" type="text" name="tanggal" value="" placeholder="Pilih Tanggal" readonly>
                      </div>

                      <div class="col-lg-3">
                        <select id="pilihLoketBus" class="form-control select" name="pilihLoketBus">
                          <option value="" disabled selected>Pilih Loket / Bus</option>
                          <option value="loket">Loket</option>
                          <option value="bus">Bus</option>
                        </select>
                      </div>

                      <div class="col-lg-3" id="pilihLoket">
                        <select class="form-control select" name="pilihLoket">
                          <option value="" disabled selected>Pilih Loket</option>
                          <?php foreach ($dataLoket as $dataLoket) { ?>
                            <option value="<?php echo $dataLoket->id ?>"><?php echo $dataLoket->nama ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <?php if($dataUser->idPo == 3) { ?>
                        <div class="col-lg-3" id="pilihBus">
                          <select class="form-control select" name="pilihBus">
                            <option value="" disabled selected>Pilih Bus</option>
                            <?php foreach ($dataBusAgra as $dataBusAgra) { ?>
                              <option value="<?php echo $dataBusAgra->idBus ?>"><?php echo $dataBusAgra->id ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      <?php } else if($dataUser->idPo == 4) { ?>
                        <div class="col-lg-3" id="pilihBus">
                          <select class="form-control select" name="pilihBus">
                            <option value="" disabled selected>Pilih Bus</option>
                            <?php foreach ($dataBus->data as $dataBus) { ?>
                              <option value="<?php echo $dataBus->idBus ?>"><?php echo $dataBus->kodeBus ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      <?php } ?>

                      <div class="col-lg-1" id="tampilLoket">
                        <button class="btn btn-warning" type="submit" name="submit" value="tampilLoket">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                      </div>

                      <div class="col-lg-1" id="tampilBus">
                        <button class="btn btn-warning" type="submit" name="submit" value="tampilBus">
                            <i class="glyphicon glyphicon-search"></i>
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
