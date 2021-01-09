<style media="screen">
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }
</style>
<div class="widgets" style="margin-top: 50px;">

    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard') ?>"><b>Home</b></a></li>
        <li class="active"><b>Profil P.O</b></li>
    </ul>
    <!-- END BREADCRUMB -->

    <div class="widgets">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default bootstrap-panel" style="padding:40px;">
                    <div>
                        <img class="center" src="<?php echo $dataProfilPo->logo ?>" style="width:137px; height:26px;">
                    </div>
                    <div class="form-horizontal" style="padding-top:20px;">
                        <div class="form-group">
                            <div class="col-lg-3 control-label">Nama PO</div>
                            <div class="col-lg-6">
                                <input type="text" name="nama" value="<?php echo $dataProfilPo->nama ?>" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-3 control-label">Kode PO</div>
                            <div class="col-lg-6">
                                <input type="text" name="kodepo" value="<?php echo $dataProfilPo->kodepo ?>" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-3 control-label">Nama Perusahaan</div>
                            <div class="col-lg-6">
                                <input type="text" name="namaperusahaan" value="<?php echo $dataProfilPo->namaperusahaan ?>" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-3 control-label">Alamat</div>
                            <div class="col-lg-6">
                                <textarea name="alamat" id="alamat" cols="30" rows="4" class="form-control" disabled><?php echo $dataProfilPo->alamat ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-3 control-label">Telpon</div>
                            <div class="col-lg-6">
                                <input type="text" name="telpon" value="<?php echo $dataProfilPo->telpon ?>" class="form-control" disabled>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="col-lg-3 control-label">Fax</div>
                            <div class="col-lg-6">
                                <input type="text" name="fax" value="<?php echo $dataProfilPo->fax ?>" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3 control-label">Email</div>
                            <div class="col-lg-6">
                                <input type="text" name="email" value="<?php echo $dataProfilPo->email ?>" class="form-control" disabled>
                            </div>
                        </div>

                        <hr>
                        <div class="form-group">
                            <div class="col-lg-3 control-label">Nama Pimpinan</div>
                            <div class="col-lg-6">
                                <input type="text" name="namapimpinan" value="<?php echo $dataProfilPo->namapimpinan ?>" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-3 control-label">Telpon</div>
                            <div class="col-lg-4">
                                Ponsel 1
                                <input type="text" name="ponsel1" value="<?php echo $dataProfilPo->ponsel1 ?>" class="form-control" disabled>
                            </div>
                            <div class="col-lg-4">
                                Ponsel 2
                                <input type="text" name="ponsel2" value="<?php echo $dataProfilPo->ponsel2 ?>" class="form-control" disabled>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="col-lg-3 control-label">PIC E-Ticketing</div>
                            <div class="col-lg-4">
                                Nama
                                <input type="text" name="picnama" value="<?php echo $dataProfilPo->picnama ?>" class="form-control" disabled>
                            </div>
                            <div class="col-lg-4">
                                Jabatan
                                <input type="text" name="picjabatan" value="<?php echo $dataProfilPo->picjabatan ?>" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-3 control-label">Kontak</div>
                            <div class="col-lg-4">
                                Telpon
                                <input type="text" name="pictelpon" value="<?php echo $dataProfilPo->pictelpon ?>" class="form-control" disabled>
                            </div>
                            <div class="col-lg-4">
                                Email
                                <input type="text" name="picemail" value="<?php echo $dataProfilPo->picemail ?>" class="form-control" disabled>
                            </div>
                        </div>
                        <hr>

                        <!-- <div class="form-group">
          <div class="col-lg-3 control-label">Data Rekening</div>
          <div class="col-lg-4">
            Rekening Terima
            <input type="text" name="rekeningterima" ng-model="" class="form-control" disabled>
          </div>
          <div class="col-lg-4">
            Rekening Transfer
            <input type="text" name="rekeningtransfer" ng-model="" class="form-control" disabled>
          </div>
      </div> -->
                        <div class="form-group">
                            <div class="col-lg-3 control-label">Data Rekening</div>
                            <div class="col-lg-4">
                                Kode Bank
                                <input type="text" name="rekeningterima" value="<?php echo $dataProfilPo->kodeBank ?>" class="form-control" disabled>
                            </div>
                            <div class="col-lg-4">
                                Cabang
                                <input type="text" name="rekeningtransfer" value="<?php echo $dataProfilPo->cabangBank ?>" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3 control-label"></div>
                            <div class="col-lg-4">
                                Nomor Rekening
                                <input type="text" name="rekeningterima" value="<?php echo $dataProfilPo->noRekening ?>" class="form-control" disabled>
                            </div>
                            <div class="col-lg-4">
                                Nama Pemilik Rekening
                                <input type="text" name="rekeningtransfer" value="<?php echo $dataProfilPo->namaRekening ?>" class="form-control" disabled>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group">
                            <div class="col-lg-3 control-label">Jenis Pelayanan</div>
                            <div class="col-lg-2">
                                <input type="checkbox" value="<?php echo $dataProfilPo->akap ?>" <?php echo ($dataProfilPo->akap == true ? 'checked' : false); ?> disabled>AKAP
                            </div>
                            <div class="col-lg-2">
                                <input type="checkbox" value="<?php echo $dataProfilPo->akdp ?>" <?php echo ($dataProfilPo->akdp == true ? 'checked' : false); ?> disabled>AKDP
                            </div>
                            <div class="col-lg-2">
                                <input type="checkbox" value="<?php echo $dataProfilPo->pariwisata ?>" <?php echo ($dataProfilPo->pariwisata == true ? 'checked' : false); ?> disabled>Pariwisata
                            </div>
                            <div class="col-lg-2">
                                <input type="checkbox" value="<?php echo $dataProfilPo->paket ?>" <?php echo ($dataProfilPo->paket == true ? 'checked' : false); ?> disabled>Paket
                            </div>
                        </div>
                        <!-- <div class="form-group">
          <div class="col-lg-3 control-label">Pola Hubungan dengan Agen</div>
          <div class="col-lg-3">
              <input type="radio" name="directagen" value="<?php echo $dataProfilPo->directagen ?>" <?php echo set_value('directagen', $dataProfilPo->directagen) == true ? "checked" : ""; ?> disabled>Langsung
          </div>
          <div class="col-lg-3">
              <input type="radio" name="directagen" value="<?php echo $dataProfilPo->directagen ?>" <?php echo set_value('directagen', $dataProfilPo->directagen) == false ? "checked" : ""; ?> disabled>Tidak Langsung
          </div>
      </div> -->
                        <!-- <div class="form-group">
          <div class="col-lg-3 control-label">Kuota Penjualan Agen</div>
          <div class="col-lg-3">
              <input type="radio" name="kuotaagen" value="<?php echo $dataUser->quotaagen ?>" <?php echo set_value('kuotaagen', $dataUser->quotaagen) == true ? "checked" : ""; ?> disabled>Ya
          </div>
          <div class="col-lg-3">
              <input type="radio" name="kuotaagen" value="<?php echo $dataUser->quotaagen ?>" <?php echo set_value('kuotaagen', $dataUser->quotaagen) == false ? "checked" : ""; ?> disabled>Tidak
          </div>
      </div> -->
                        <div class="form-group">
                            <div class="col-lg-3 control-label">Status</div>
                            <div class="col-lg-3">
                                <input type="checkbox" value="<?php echo $dataProfilPo->enabled ?>" <?php echo ($dataProfilPo->enabled == true ? 'checked' : false) ?> disabled>Aktif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- </div> -->