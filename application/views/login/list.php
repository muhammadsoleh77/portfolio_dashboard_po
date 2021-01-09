<style>
#tombol {
    width: 221px;
    height: 40px;
    background: #236BDD 0% 0% no-repeat padding-box;
    border-radius: 27px;
    opacity: 1;
}

#input-container-user {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  height: 40px;
  /* margin-bottom: 15px; */

    /* background: #FFFFFF 0% 0% no-repeat padding-box;
    border: 1px solid #B5B5B5;
    border-radius: 8px;
    opacity: 1; */
}

#input-container-pass {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  height: 40px;
  margin-bottom: 15px;

    /* background: #FFFFFF 0% 0% no-repeat padding-box;
    border: 1px solid #B5B5B5;
    border-radius: 8px;
    opacity: 1; */
}

.icon {
  padding: 10px;
  /* background: dodgerblue;
  color: white; */
  min-width: 15px;
  text-align: center;
  border-top: 1px solid #B5B5B5;
  border-bottom: 1px solid #B5B5B5;
  border-left: 1px solid #B5B5B5;
  border-top-left-radius: 8px;
  border-bottom-left-radius: 8px;
}

/* .input-field {
  width: 100%;
  padding: 10px;
  outline: none;
} */

/* .input-field:focus {
  border: 2px solid dodgerblue;
} */

.tengah {
    position: fixed;
    display: flex;
    justify-content: center;
    align-items: center;
}

.show-password {
    height: 25px;
    width: 50px;
    top: 12px;
    right: 30px;
    display: inline-block;
    position: absolute;
    z-index: 9;
    color: #bdc3c7;
    text-decoration: none;
}

.hide-password {
    height: 25px;
    width: 50px;
    top: 10px;
    right: 10px;
    display: inline-block;
    position: absolute;
    z-index: 9;
    color: #bdc3c7;
}

@media only screen and (max-width: 1024px) {
    #footerLogin {
        width: 100%;
        float: left;
        padding: 10px;
        color: #FFF;
        position: relative;
        left: 0;
        bottom: 0;
    }
}
</style>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>
        <!-- META SECTION -->
        <title>Admin P.O</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="<?php echo base_url() ?>assets/joli/adminPO_icon.png" type="image/x-icon" />
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url() ?>assets/joli/css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->

        <link rel="stylesheet" href="<?php echo base_url() ?>assets/joli/js/sweetalert2/package/dist/sweetalert2.min.css">
    </head>
    <body>

        <div class="login-container">

          <!-- <font color="orange">
            <?php echo $this->session->flashdata('hasil'); ?>
          </font> -->

            <div class="login-box animated">
                <!-- <div class="login-logo"></div> -->
                <div class="login-body">
                    <div class="login-logo"></div>
                    <div class="login-title text-center"><strong><?php echo $title ?></strong></div>
                    <!-- <form action="index.html" class="form-horizontal" method="post"> -->
                    <span class="form-horizontal">

                    <!-- Notifikasi GAGAL LOGIN -->
                    <div class="notif-gagalLogin" data-flashdata="<?= $this->session->flashdata('warning'); ?>"></div>
                    <?php
                      if($this->session->flashdata('warning')) {
                        $this->session->flashdata('warning');
                      }
                    ?>
                    <!-- END Notifikasi GAGAL LOGIN -->

                    <!-- Notifikasi LOGOUT -->
                    <div class="notif-logout" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>
                    <?php
                      if($this->session->flashdata('sukses')) {
                        $this->session->flashdata('sukses');
                      }
                    ?>
                    <!-- END Notifikasi LOGOUT -->

                   

                    <?php

                    // // Notifikasi gagal login
                    // if($this->session->flashdata('warning')){
                    //   // echo '<div class="alert alert-warning">';
                    // //   echo '<p class="text-center" style="color:red;">';
                    //   $this->session->flashdata('warning');
                    // //   echo '</p>';
                    //   // echo '</div>';
                    // }

                    // // Notifikasi logout
                    // if($this->session->flashdata('sukses')){
                    //   echo '<div class="alert alert-success">';
                    // //   echo '<p class="text-center" style="color:red;">';
                    //   echo $this->session->flashdata('sukses');
                    // //   echo '</p>';
                    //   echo '</div>';
                    // }

                    // Form open login
                    echo form_open(base_url('login'))

                    ?>

                    <div class="form-group">
                        <div class="col-md-12" id="input-container-user">
                            <span style="color:red;"><?php echo form_error('username'); ?></span>
                            <!-- <i class="fa fa-user-circle-o icon"></i> -->
                            <img class="icon" src="<?php echo base_url() ?>assets/joli/img/awesome-user-circle.svg">
                            <input type="text" class="form-control" name="username" placeholder="Username" style="border-radius:0; border-top-right-radius: 8px; border-bottom-right-radius: 8px;" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12" id="input-container-pass">
                            <span style="color:red;"><?php echo form_error('password'); ?></span>
                            <!-- <i class="fa fa-key icon"></i> -->
                            <img class="icon" src="<?php echo base_url() ?>assets/joli/img/ionic-ios-lock.svg" style="padding-right:15px;">
                            <input id="password_id" type="password" class="form-control" name="password" placeholder="Password" style="border-radius:0; border-top-right-radius: 8px; border-bottom-right-radius: 8px;" />
                            <a href="#" toggle="#password-field" class="fa fa-fw fa-eye-slash field_icon toggle-password show-password" style="text-decoration:none;"></a>
                        </div>
                    </div>

                    <!-- <div class="input-container">
                        <i class="fa fa-user icon"></i>
                        <input class="input-field" type="text" placeholder="Username" name="usrnm">
                    </div>

                    <div class="input-container">
                        <i class="fa fa-envelope icon"></i>
                        <input class="input-field" type="text" placeholder="Email" name="email">
                    </div> -->

                    <div class="form-group">
                        <!-- <div class="col-md-6">
                            <a href="#" class="btn btn-link btn-block">Forgot your password?</a>
                        </div> -->
                        <div class="col-md-12 tengah">
                            <button type="submit" class="btn btn-primary btn-block" id="tombol">Login</button>
                        </div>
                    </div>
                    <!-- </form> -->
                    <?php echo form_close(); ?>
                    </span>
                </div>
                <div class="login-footer" id="footerLogin">
                    <p class="text-center" style="color:#236BDD; opacity:1;">
                        <b>PT. APLIKASI BIS INDONESIA<br/>
                        &copy; 2020</b>
                    </p>
                </div>
                <!-- <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2020 AdminPO
                    </div>
                    <div class="pull-right">
                        <a href="#">About</a> |
                        <a href="#">Privacy</a> |
                        <a href="#">Contact Us</a>
                    </div>
                </div> -->
            </div>

        </div>

        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/sweetalert2/package/dist/sweetalert2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/joli/js/sweetalert2/package/dist/scriptTambahan.js"></script>

        <script>
            $(document).on('click', '.toggle-password', function() {

                $(this).toggleClass("fa-eye-slash fa-eye");

                var input = $("#password_id");
                input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
            });
        </script>

    </body>
</html>
