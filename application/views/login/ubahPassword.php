<style>
    #over img {
        margin-left: auto;
        margin-right: auto;
        display: block;
    }
</style>
<div class="widgets" style="margin-top: 50px;">

    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard') ?>"><b>Home</b></a></li>
        <li class="active"><b>Ubah Password</b></li>
    </ul>
    <!-- END BREADCRUMB -->

    <div class="row">
        <div class="col-md-12">

            <!-- START LAPORAN -->
            <div class="row">
                <div class="" id="over">
                     <!-- Notifikasi LOGOUT -->
                     <!-- <div class="notif-logout" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>
                    <?php
                      if($this->session->flashdata('sukses')) {
                        $this->session->flashdata('sukses');
                      }
                    ?> -->
                    <!-- END Notifikasi LOGOUT -->
                    <?php
                    // Notifikasi logout
                    if($this->session->flashdata('warning')){
                      echo '<div class="alert alert-warning">';
                    //   echo '<p class="text-center" style="color:red;">';
                      echo $this->session->flashdata('warning');
                    //   echo '</p>';
                      echo '</div>';
                    }

                    // Notifikasi logout
                    if($this->session->flashdata('danger')){
                      echo '<div class="alert alert-danger">';
                    //   echo '<p class="text-center" style="color:red;">';
                      echo $this->session->flashdata('danger');
                    //   echo '</p>';
                      echo '</div>';
                    }
                    ?>
                <?php echo form_open(base_url('login/simpanUbahPassword'), 'class="form-horizontal"'); ?>
                    <!-- <div class="panel panel-default">
              <div class="panel-body">
                
              </div>
            </div> -->
                    <!-- <img src="<?php echo base_url() ?>assets/joli/img/page_construction.png" style="margin:auto; opacity:0.5; margin-top:150px;" width="200" height="200" alt="construction" /> -->

                    <div class="col-md-4"></div>
                    <div class="col-md-4" style="margin-top: 150px;">
                        <label>Password Lama</label>
                        <input class="form-control" name="passwordLama" type="password" placeholder="Masukkan Password Lama">
                        <span style="color:red;"><?php echo form_error('passwordLama'); ?></span><br/>
                        <label>Password Baru</label>
                        <input class="form-control" name="passwordBaru" type="password" placeholder="Masukkan Password Baru">
                        <span style="color:red;"><?php echo form_error('passwordBaru'); ?></span><br/>
                        <label>Konfirmasi Password Baru</label>
                        <input class="form-control" name="konfirmasiPasswordBaru" type="password" placeholder="Konfirmasi Password Baru">
                        <span style="color:red;"><?php echo form_error('konfirmasiPasswordBaru'); ?></span><br/>
                        <button class="btn btn-primary btn-md" type="submit" name="submit">Change Password</button>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <?php echo form_close(); ?>
                <!-- <div class="content-top clearfix" ng-show="updateAgen.length > 0">
            <h2>&nbsp;</h2>
          </div> -->

                <!-- <update-agen ng-show="updateAgen.length > 0"></update-agen> -->

                <div class="content-top clearfix">
                    <h2>&nbsp;</h2>
                </div>
            </div>
            <!-- END LAPORAN -->

        </div>
    </div>
</div>