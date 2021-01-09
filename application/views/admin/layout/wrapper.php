<?php

// PROTEKSI HALAMAN ADMIN DENGAN FUNGSI CEK_LOGIN yang ada di simple_login
$this->user_model->cek_login();

// GABUNGAN SEMUA LAYOUT MENJADI SATU
require_once('head.php');
require_once('sidebar.php');
require_once('header.php');
require_once('content.php');
require_once('footer.php');
