<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setoran extends CI_Controller {

  public function __construct(){
      parent::__construct();

      $this->user_model->cek_login();
      $this->load->model('setoran_model');

  }

  // Halaman Dashboard
  public function index()
  {
    $data = array(
      'title'   => 'Halaman Administrator',
      'isi'     => 'admin/setoran/setoranTemplate',
      'dataUser' => $this->session->dataUser,
      'dataPo'  => $this->session->dataPo
    );

    $this->load->view('admin/layout/wrapper', $data, FALSE);

    $dataUser = $this->session->dataUser;
  }

  public function tampil()
  {
    // validasi input
    $valid = $this->form_validation;

    $valid->set_rules('tanggal', 'Tanggal', 'required', array('required'=>'%s harus diisi'));
    // $valid->set_rules('tanggalAkhir', 'Tanggal Akhir', 'required', array('required'=>'%s harus diisi'));
    $valid->set_rules('pilihTypeProduk', 'Pilih', 'required', array('required'=>'%s type produk'));

    if($valid->run()===FALSE) {
      // End Validasi

      $data = array(
        'title'   => 'Halaman Administrator',
        'isi'     => 'admin/setoran/setoranTemplate',
        'dataUser' => $this->session->dataUser,
        'dataPo'  => $this->session->dataPo
      );

      $this->load->view('admin/layout/wrapper', $data, FALSE);

      // Masuk service endpoint
    } else {
      $dataUser = $this->session->dataUser;
      $dataPo = $this->session->dataPo;

      $tanggal = $this->input->post('tanggal');
      // $tanggalAkhir = $this->input->post('tanggalAkhir');
      $pilihTypeProduk = $this->input->post('pilihTypeProduk');

      $this->setoran_model->tampil($dataUser, $dataPo, $tanggal, $pilihTypeProduk);

      $data = array(
        'title'             => 'Tampil',
        'isi'               => 'admin/setoran/tableSetoran',
        'dataUser'          => $this->session->dataUser,
        'dataPo'            => $this->session->dataPo,
        'tanggal'           => $tanggal,
        'listDataSetoran'   => $this->session->listDataSetoran
      );
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
  }

  // START RINCIAN SETORAN
  public function rincian($key)
  {
    $dataUser = $this->session->dataUser;
    $dataPo = $this->session->dataPo;
    $listDataSetoran = $this->session->listDataSetoran;

    $this->setoran_model->rincianSetoran($dataUser, $dataPo, $listDataSetoran, $key);
    $this->setoran_model->busSap($dataUser);

    $data = array(
      'title'             => 'Tampil',
      'isi'               => 'admin/setoran/rincianSetoran',
      'dataUser'          => $this->session->dataUser,
      'dataPo'            => $this->session->dataPo,
      'listDataSetoran'   => $this->session->listDataSetoran,
      'paramRincian'      => $this->session->paramRincian,
      'listDataBusSap'    => $this->session->listDataBusSap,
      'listDataCrewSap'   => $this->session->listDataCrewSap,
      'dataOscar'         => $this->session->dataOscar
    );
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }
  // END RINCIAN SETORAN

  // START TERIMA SETORAN
  public function terima($idCrew)
  {
    var_dump($idCrew);
    
    $dataRincian = $this->session->paramRincian;
    $dataUser = $this->session->dataUser;
    $dataPo = $this->session->dataPo;
    $listDataSetoran = $this->session->listDataSetoran;
    $this->setoran_model->terimaSetoran($dataUser, $dataPo, $dataRincian, $listDataSetoran);
  }
  // END TERIMA SETORAN

}
