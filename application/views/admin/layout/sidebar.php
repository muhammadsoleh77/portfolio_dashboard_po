<style>
.div-wrapper {
    position: relative;
    /* height: 212px;
    width: 220px; */
}
.div-wrapper-minimize {
    position: relative;
    /* height: 212px;
    width: 220px; */
}
/* .div-wrapper img {
    position:fixed;
    left:0;
    bottom:0;
    margin:0;
    padding:0;
} */
.div-wrapper img {
    position: fixed;
    left: 0;
    bottom: 0;
    margin:0;
    padding:0;
    height: 212px;
    width: 220px;
    pointer-events: none;
}

.div-wrapper-minimize img {
    position: fixed;
    left: 0;
    bottom: 0;
    margin:0;
    padding:0;
    height: 212px;
    width: 50px;
    pointer-events: none;
}

/* .div-wrapper-minimize img {
    position: fixed;
    left: 0;
    bottom: 0;
    margin:0;
    padding:0;
    height: 212px;
    width: 220px;
} */

/* #aktif {
    background-color: #1A62D4 !important;
} */

.x-navigation li.active > a {
    background: <?php echo $dataPo->bgcolor ?>;
}
.x-navigation li > ul li > a:hover {
    background: <?php echo $dataPo->bgcolor ?>;
}
.x-navigation li > a:hover {
    background: <?php echo $dataPo->bgcolor ?> !important;
}

@media only screen and (max-width: 1024px) {
    .x-navigation {
        background: <?php echo $dataPo->bgcolor ?>;
    }
}
</style>
<!-- START PAGE SIDEBAR -->
            <div class="page-sidebar" style="background:<?php echo $dataPo->bgcolor ?>">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="<?php echo base_url('admin/dashboard') ?>">
                            <img src="<?php echo base_url() ?>assets/joli/img/bisku_logo.png" style="width:108px; height:32px; margin-top:-10px;">
                        </a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="<?php echo base_url() ?>assets/joli/img/bisku_logo2.png" alt="" style="width:30px; height:30px;"/>
                        </a>
                        <!-- <div class="profile">
                            <div class="profile-image">
                                <img src="<?php echo $dataUser->logo; ?>" alt="John Doe"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">Selamat Datang</div>
                                <div class="profile-data-title">P.O <?php echo $dataUser->nama ?></div>
                            </div>
                        </div> -->
                    </li>
                    <!-- <li class="xn-title">Navigation</li> -->
                    <li <?= $this->uri->segment(2) == 'dashboard' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?>>
                        <a href="<?php echo base_url('admin/dashboard') ?>"><img src="<?php echo base_url() ?>assets/joli/img/Icon-material-today.svg" alt="" style="margin-right:10px;"> <span class="xn-text">Home</span></a>
                    </li>
                    <li class="xn-openable <?= $this->uri->segment(2) == 'profil_po' || $this->uri->segment(2) == 'crew' || $this->uri->segment(2) == 'loket' ? 'active' : '' ?>">
                        <a href="#" class="aktif"><img src="<?php echo base_url() ?>assets/joli/img/Icon-material-user.svg" alt="" style="margin-right:10px;"> <span class="xn-text">PO</span></a>
                            <ul>
                                <li <?= $this->uri->segment(2) == 'profil_po' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?>><a href="<?php echo base_url('admin/profil_po') ?>">Profil</a></li>
                                <li <?= $this->uri->segment(2) == 'crew' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?>><a href="<?php echo base_url('admin/crew') ?>">Crew</a></li>
                                <li <?= $this->uri->segment(2) == 'loket' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?>><a href="<?php echo base_url('admin/loket') ?>">Loket</a></li>
                            </ul>
                    </li>
                    <li class="xn-openable <?= $this->uri->segment(2) == 'trayek' || $this->uri->segment(2) == 'penugasan' || $this->uri->segment(2) == 'setoran' || $this->uri->segment(2) == 'laporan' || $this->uri->segment(2) == 'laporanSetoran' || $this->uri->segment(2) == 'laporanTransaksi' || $this->uri->segment(2) == 'settlement' || $this->uri->segment(2) == 'tagihan' ? 'active' : '' ?>">
                        <a href="#" class="aktif"><img src="<?php echo base_url() ?>assets/joli/img/Icon-material-bus.svg" alt="" style="margin-right:10px;"> <span class="xn-text">AKDP / BUMEL</span></a>
                        <ul>
                            <li <?= $this->uri->segment(2) == 'trayek' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?>><a href="<?php echo base_url('admin/trayek') ?>">Trayek</a></li>
                            <li <?= $this->uri->segment(2) == 'penugasan' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?>><a href="<?php echo base_url('admin/penugasan') ?>">Penugasan</a></li>
                            <li <?= $this->uri->segment(2) == 'setoran' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?>><a href="<?php echo base_url('admin/setoran') ?>">Setoran</a></li>
                            <li <?= $this->uri->segment(2) == 'laporan' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?>><a href="<?php echo base_url('admin/laporan') ?>">Laporan</a></li>
                            <!-- <li <?= $this->uri->segment(2) == 'laporanSetoran' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?>><a href="<?php echo base_url('admin/laporanSetoran') ?>">Laporan Setoran</a></li> -->
                            <!-- <li <?= $this->uri->segment(2) == 'laporanTransaksi' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?>><a href="<?php echo base_url('admin/laporanTransaksi') ?>">Laporan Transaksi</a></li> -->
                            <!-- <li <?= $this->uri->segment(2) == 'settlement' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?>><a href="<?php echo base_url('admin/settlement') ?>">Settlement</a></li> -->
                            <!-- <li <?= $this->uri->segment(2) == 'tagihan' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?>><a href="<?php echo base_url('admin/tagihan') ?>">Invoice</a></li> -->
                            <!-- <li><a href="<?php echo base_url('admin/manifest_penumpang') ?>">Manifest Penumpang</a></li>
                            <li><a href="<?php echo base_url('admin/transaksi') ?>">Transaksi</a></li>
                            <li><a href="<?php echo base_url('admin/spj') ?>">SPJ</a></li>
                            <li><a href="<?php echo base_url('admin/tagihan') ?>">Tagihan</a></li> -->
                        </ul>
                    </li>
                    <!-- <li class="xn-openable">
                        <a href="#"><img src="<?php echo base_url() ?>assets/joli/img/Icon-material-user.svg" alt="" style="margin-right:10px;"> <span class="xn-text">Pengguna</span></a>
                        <ul>
                            <li><a href="<?php echo base_url('admin/pengguna') ?>">Pengguna Terdaftar</a></li>
                        </ul>
                    </li> -->
                    <!-- <li class="xn-title">Components</li> -->

                </ul>
                <!-- END X-NAVIGATION -->

                <!-- START IMG SIDEBAR MAXIMIZE -->
                <div class="div-wrapper">
                    <span>
                        <img id="img_bawah" class="img_bottom gambarBesar" src="<?php echo base_url() ?>assets/joli/img/sidebar_bus.png" style="opacity: 0.3" />
                    </span>
                </div>
                <!-- END IMG SIDEBAR MAXIMIZE -->

                <!-- START IMG SIDEBAR MINIMIZE -->
                <div class="div-wrapper-minimize">
                    <span>
                        <img class="gambarKecil" src="<?php echo base_url() ?>assets/joli/img/sidebar_bus2.png" style="opacity: 0.3">
                    </span>
                </div>
                <!-- END IMG SIDEBAR MINIMIZE -->
            </div>
            <!-- END PAGE SIDEBAR -->

<script>
    $('.aktif').click(function(){
        $('.aktif').css('background-color','transparent');
    })
        

    $('.aktif')
        .on( "mouseenter", function() {
            $(this).css({
                "background-color": "#1A62D4"
            });
        })
        .on( "mouseleave", function() {
            $(this).css({
                "background-color": "transparent"
            });
        });
</script>
