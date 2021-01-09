<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

  public function __construct(){
      parent::__construct();

      $this->user_model->cek_login();
      $this->load->model('pengguna_model');

  }

  // Halaman Dashboard
  public function index()
  {
    $dataUser = $this->session->dataUser;

    $this->pengguna_model->getDataPengguna($dataUser);

    $data = array(
      'title'                   => 'Halaman Administrator',
      'isi'                     => 'admin/pengguna/penggunaTerdaftar',
      'dataUser'                => $this->session->dataUser,
      'dataPenggunaTerdaftar'   => $this->session->dataPenggunaTerdaftar
    );

    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

}
