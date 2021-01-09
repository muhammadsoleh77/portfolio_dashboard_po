<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manifest_penumpang extends CI_Controller {

  public function __construct(){
      parent::__construct();

      $this->user_model->cek_login();
      $this->load->model('manifest_model');

      $this->base_url = "http://bumelapi.otobus.co.id:8484";

  }

  // Halaman Dashboard
  public function index()
  {
    $dataUser = $this->session->dataUser;

    $this->manifest_model->getDataLoket($dataUser);
    $this->manifest_model->getDataBus($dataUser);
    $this->manifest_model->getDataBusAgra($dataUser);

    $data = array(
      'title'       => 'Halaman Administrator',
      'isi'         => 'admin/manifest_penumpang/manifest_template',
      'dataUser'    => $this->session->dataUser,

      'dataLoket'   => $this->session->dataLoket,
      'dataBus'     => $this->session->dataBus,
      'dataBusAgra' => $this->session->dataBusAgra
    );

    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  public function tampil()
  {
    // Validasi input
    $valid = $this->form_validation;

    $valid->set_rules(
      'tanggal','Tanggal','required',
      array(
        'required'   => '%s harus diisi'
      )
    );

    if($valid->run()===FALSE) {
      // End Validasi
      $data = array(
        // 'title' => 'Tampil',
        'isi'   => 'admin/manifest_penumpang/manifest_template',
        'dataUser'  => $this->session->dataUser,

        'dataLoket' => $this->session->dataLoket,
        'dataBus'   => $this->session->dataBus,
        'dataBusAgra' => $this->session->dataBusAgra
      );
      $this->load->view('admin/layout/wrapper', $data, FALSE);

    // Masuk Service Endpoint
    } else {
      $submit = $this->input->post('submit');

      if($submit == 'tampilLoket') {

        $tanggal = $this->input->post('tanggal');
        $pilihLoket = $this->input->post('pilihLoket');
        // var_dump($pilihLoket);

        $this->manifest_model->tampil_loket($pilihLoket, $tanggal);

        $data = array(
          'title' => 'Tampil',
          'isi'   => 'admin/manifest_penumpang/tableLoket',
          'dataUser'  => $this->session->dataUser,
          'dataLoket' => $this->session->dataLoket,
          'dataBus'   => $this->session->dataBus,

          'listDataLoket'  => $this->session->listDataLoket
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);

      } else if($submit == 'tampilBus') {

        $tanggal = $this->input->post('tanggal');
        $pilihBus = $this->input->post('pilihBus');

        $this->manifest_model->tampil_bus($pilihBus, $tanggal);

        $data = array(
          'title' => 'Tampil',
          'isi'   => 'admin/manifest_penumpang/tableBus',
          'dataUser'  => $this->session->dataUser,
          'dataLoket' => $this->session->dataLoket,
          'dataBus'   => $this->session->dataBus,

          'listDataBus'  => $this->session->listDataBus
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
      }
    }
  }

}
