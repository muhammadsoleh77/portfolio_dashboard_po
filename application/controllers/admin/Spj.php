<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spj extends CI_Controller {

  public function __construct(){
      parent::__construct();

      $this->user_model->cek_login();
      $this->load->model('spj_model');

  }

  // Halaman Dashboard
  public function index()
  {
    $data = array(
      'title'   => 'Halaman Administrator',
      'isi'     => 'admin/spj/spjTemplate',
      'dataUser' => $this->session->dataUser,
    );

    $this->load->view('admin/layout/wrapper', $data, FALSE);

    $dataUser = $this->session->dataUser;
  }

  public function spjJAC()
  {
    $dataUser = $this->session->dataUser;
    $this->spj_model->getDataEien($dataUser);
    $this->spj_model->getDataBus($dataUser);

    $data = array(
      'title'     => 'Halaman Administrator',
      'isi'       => 'admin/spj/jac/spjJACTemplate',
      'dataUser'  => $this->session->dataUser,
      'dataEien'  => $this->session->dataEien,
      'dataBus'   => $this->session->dataBus
    );

    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  public function spjJRC()
  {
    $dataUser = $this->session->dataUser;
    $this->spj_model->getDataEien($dataUser);
    $this->spj_model->getDataBus($dataUser);

    $data = array(
      'title'     => 'Halaman Administrator',
      'isi'       => 'admin/spj/JRC/spjJRCTemplate',
      'dataUser'  => $this->session->dataUser,
      'dataEien'  => $this->session->dataEien,
      'dataBus'   => $this->session->dataBus
    );

    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  // START TAMPIL CETAK SPJ JAC
  public function tampilJAC()
  {
    // Validasi input
    $valid = $this->form_validation;

    $valid->set_rules('tanggal','Tanggal','required', array('required' => '%s harus diisi'));
    // $valid->set_rules('pilihDriver','Driver','required', array('required' => '%s harus dipilih'));
    $valid->set_rules('pilihBusLorena','Bus','required', array('required' => '%s harus diisi'));

    if($valid->run() === FALSE) {
      // End Validasi

      $data = array(
        'title'     => 'Halaman Administrator',
        'isi'       => 'admin/spj/jac/spjJACTemplate',
        'dataUser'  => $this->session->dataUser,
        'dataEien'  => $this->session->dataEien,
        'dataBus'   => $this->session->dataBus
      );

      $this->load->view('admin/layout/wrapper', $data, FALSE);

      // Masuk service endpoint
    } else {
      $dataUser = $this->session->dataUser;
      $dataEien = $this->session->dataEien;
      $dataBus = $this->session->dataBus;

      $tanggal = $this->input->post('tanggal');
      $pilihBus = $this->input->post('pilihBusLorena');
      $driver = $this->input->post('pilihDriver');

      $this->spj_model->cetakSpjJAC($tanggal, $pilihBus, $driver, $dataEien, $dataBus, $dataUser);

      $data = array(
        'title' => 'Tampil',
        'isi'   => 'admin/spj/jac/cetakSpjJAC',
        'dataUser'  => $this->session->dataUser,
        // 'listData'  => $this->session->listData
        'dataSimpanPenugasan' => $this->session->dataSimpanPenugasan,
        'postSimpanPenugasan' => $this->session->postSimpanPenugasan
      );

      $this->load->view('admin/layout/wrapper', $data, FALSE);

    }
  }
  // END TAMPIL CETAK SPJ JAC

  // START TAMPIL CETAK SPJ JRC
  public function tampilJRC()
  {
    // Validasi input
    $valid = $this->form_validation;

    $valid->set_rules('tanggal','Tanggal','required', array('required' => '%s harus diisi'));
    $valid->set_rules('pilihDriver','Driver','required', array('required' => '%s harus dipilih'));
    $valid->set_rules('pilihKondektur','Kondektur','required', array('required' => '%s harus dipilih'));
    $valid->set_rules('pilihBusLorena','Bus','required', array('required' => '%s harus diisi'));

    if($valid->run() === FALSE) {
      // End Validasi

      $data = array(
        'title'     => 'Halaman Administrator',
        'isi'       => 'admin/spj/JRC/spjJRCTemplate',
        'dataUser'  => $this->session->dataUser,
        'dataEien'  => $this->session->dataEien,
        'dataBus'   => $this->session->dataBus
      );

      $this->load->view('admin/layout/wrapper', $data, FALSE);

      // Masuk service endpoint
    } else {
      $dataUser = $this->session->dataUser;
      $dataEien = $this->session->dataEien;
      $dataBus = $this->session->dataBus;

      $tanggal = $this->input->post('tanggal');
      $pilihBus = $this->input->post('pilihBusLorena');
      $driver = $this->input->post('pilihDriver');
      $kondektur = $this->input->post('pilihKondektur');

      $this->spj_model->cetakSpjJRC($tanggal, $pilihBus, $driver, $kondektur, $dataEien, $dataBus, $dataUser);

      $data = array(
        'title' => 'Tampil',
        'isi'   => 'admin/spj/JRC/cetakSpjJRC',
        'dataUser'  => $this->session->dataUser,
        // 'listData'  => $this->session->listData
        'dataSimpanPenugasanJRC' => $this->session->dataSimpanPenugasanJRC,
        'postSimpanPenugasanJRC' => $this->session->postSimpanPenugasanJRC
      );
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
  }
  // END TAMPIL CETAK SPJ JRC

}
