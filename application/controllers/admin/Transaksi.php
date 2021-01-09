<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

  public function __construct(){
      parent::__construct();

      $this->user_model->cek_login();
      $this->load->model('transaksi_model');

      $this->base_url = "http://bumelapi.otobus.co.id:8484";

  }

  // Halaman Dashboard
  public function index()
  {
    $data = array(
      'title'   => 'Halaman Administrator',
      'isi'     => 'admin/transaksi/transaksi_template',
      'dataUser' => $this->session->dataUser,
    );

    $this->load->view('admin/layout/wrapper', $data, FALSE);

    $dataUser = $this->session->dataUser;
  }

  // START TRANSAKSI MANUAL
  public function transaksiManualLorena()
  {
    $dataUser = $this->session->dataUser;
    $dataBus = $this->session->dataBus;

    $this->transaksi_model->getDataBus($dataUser);

    // $pilihTrayekLorena = $this->input->post('pilihTrayekLorena');
    // var_dump($pilihTrayekLorena);

    $data = array(
      'title'   => 'Halaman Administrator',
      'isi'     => 'admin/transaksi/transaksiManual/transaksiManual',
      'dataUser' => $this->session->dataUser,

      'dataBus' => $this->session->dataBus,
      // 'simpanTransaksiManual' => $this->session->simpanTransaksiManual
      // 'dataPenugasan' => $this->session->dataPenugasan
    );

    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }
  // END TRANSAKSI MANUAL

  // START SIMPAN TRANSAKSI MANUAL
  public function simpan()
  {
    // Validasi input
    $valid = $this->form_validation;

    $valid->set_rules(
      'tanggal','Tanggal','required',
      array(
        'required'   => '%s harus diisi'
      ));
    // $valid->set_rules(
    //   'pilihBusLorena','Pilih Bus','required', array('required' => '%s harus diisi')
    // );
    $valid->set_rules(
      'pilihTrayekLorena','Pilih Trayek','required', array('required' => '%s harus diisi')
    );
    $valid->set_rules(
      'pilihHarga','Pilih Harga','required', array('required' => '%s harus diisi')
    );
    $valid->set_rules(
      'jumlahTiket','Pilih Tiket','required', array('required' => '%s harus diisi')
    );

    if($valid->run()===FALSE) {
      // End Validasi
      $data = array(
        // 'title' => 'Tampil',
        'isi'   => 'admin/transaksi/transaksiManual/transaksiManual',
        'dataUser'  => $this->session->dataUser,
        'dataBus'   => $this->session->dataBus
      );
      $this->load->view('admin/layout/wrapper', $data, FALSE);

      // Masuk Service Endpoint
    } else {

      $simpanTransaksiManual = $this->session->simpanTransaksiManual;
      $dataUser = $this->session->dataUser;
      $token = $this->session->token;
      $dataBus = $this->session->dataBus;

      $tanggal = $this->input->post('tanggal');
      $pilihBusLorena = $this->input->post('pilihBusLorena');
      $idUser = $this->input->post('idUser');
      $pilihTrayekLorena = $this->input->post('pilihTrayekLorena');
      $pilihJadwal = $this->input->post('pilihJadwal');
      $pilihHarga = $this->input->post('pilihHarga');
      $jumlahTiket = $this->input->post('jumlahTiket');

      $this->transaksi_model->simpan($dataUser, $token, $dataBus, $tanggal, $idUser, $pilihBusLorena, $pilihTrayekLorena, $pilihJadwal, $pilihHarga, $jumlahTiket);

      $data = array(
        'title' => 'Tampil',
        'isi'   => 'admin/transaksi/transaksiManual/transaksiManual',
        'dataUser'  => $this->session->dataUser,
        'dataBus'   => $this->session->dataBus,
        'simpanTransaksiManual' => $this->session->simpanTransaksiManual
      );

      $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
  }
  // END SIMPAN TRANSAKSI MANUAL

  // START HAPUS TRANSAKSI
  public function hapusTransaksiLorena()
  {
    $dataUser = $this->session->dataUser;
    $dataBus = $this->session->dataBus;

    $this->transaksi_model->getDataLoket($dataUser);
    $this->transaksi_model->getDataBus($dataUser);

    $data = array(
      'title'   => 'Halaman Administrator',
      'isi'     => 'admin/transaksi/hapusTransaksi/hapusTransaksiTemplate',
      'dataUser' => $this->session->dataUser,
      'dataLoket' => $this->session->dataLoket,
      'dataBus' => $this->session->dataBus,
    );

    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }
  // END HAPUS TRANSAKSI

  // START LIST DATA HAPUS TRANSAKSI
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
        'isi'   => 'admin/transaksi/hapusTransaksi/hapusTransaksiTemplate',
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

        $this->transaksi_model->tampil_loket($pilihLoket, $tanggal);

        $data = array(
          'title' => 'Tampil',
          'isi'   => 'admin/transaksi/hapusTransaksi/tableLoket',
          'dataUser'  => $this->session->dataUser,
          'dataLoket' => $this->session->dataLoket,
          'dataBus'   => $this->session->dataBus,

          'listDataLoket'  => $this->session->listDataLoket
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);

      } else if($submit == 'tampilBus') {

        $tanggal = $this->input->post('tanggal');
        $pilihBus = $this->input->post('pilihBus');

        $this->transaksi_model->tampil_bus($pilihBus, $tanggal);

        $data = array(
          'title' => 'Tampil',
          'isi'   => 'admin/transaksi/hapusTransaksi/tableBus',
          'dataUser'  => $this->session->dataUser,
          'dataLoket' => $this->session->dataLoket,
          'dataBus'   => $this->session->dataBus,

          'listDataBus'  => $this->session->listDataBus
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
      }
    }
  }
  // END LIST DATA HAPUS TRANSAKSI

  public function hapusTransaksiItem($key)
  {
    $listDataBus = $this->session->listDataBus;
    $token = $this->session->token;
    
    $this->transaksi_model->hapusDataTransaksi($key, $listDataBus, $token);

    $data = array(
      'title' => 'Tampil',
      'isi'   => 'admin/transaksi/hapusTransaksi/tableBus',
      'dataUser'  => $this->session->dataUser,
      'dataLoket' => $this->session->dataLoket,
      'dataBus'   => $this->session->dataBus,

      'listDataBus'  => $this->session->listDataBus
    );
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

}
