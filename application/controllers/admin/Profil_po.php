<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_po extends CI_Controller {

  public function __construct(){
      parent::__construct();

      $this->user_model->cek_login();
      $this->load->model('profil_model');

  }

  // Halaman Dashboard
  public function index()
  {
    $dataUser = $this->session->dataUser;
    $dataPo = $this->session->dataPo;

    $this->profil_model->getDataProfil($dataUser, $dataPo);

    $data = array(
      'title'                   => 'Halaman Administrator',
      'isi'                     => 'admin/profil/profilPO',
      'dataUser'                => $this->session->dataUser,
      'dataPo'                  => $this->session->dataPo,
      'dataProfilPo'            => $this->session->dataProfilPo
    );

    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

}
