<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agen extends CI_Controller {

  public function __construct(){
      parent::__construct();

      $this->user_model->cek_login();
      $this->load->model('agen_model');

  }

  // Halaman Dashboard
  public function index()
  {
    $dataUser = $this->session->dataUser;
    $dataPo = $this->session->dataPo;

    $this->agen_model->getDataAgen($dataUser,$dataPo);

    $data = array(
      'title'                   => 'Halaman Administrator',
      'isi'                     => 'admin/agen/agenTemplate',
      'dataUser'                => $this->session->dataUser,
      'dataPo'                  => $this->session->dataPo,
      'listDataAgen'            => $this->session->listDataAgen
    );

    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

}
