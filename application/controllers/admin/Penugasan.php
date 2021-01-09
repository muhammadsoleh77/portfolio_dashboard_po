<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penugasan extends CI_Controller {

  public function __construct(){
      parent::__construct();

      $this->load->model('penugasan_model');

      $this->user_model->cek_login();

      $this->base_url = "http://bumelapi.otobus.co.id:8484";

  }

  // START HALAMAN PENUGASAN
  public function index()
  {
    $dataUser = $this->session->dataUser;
    $dataPo = $this->session->dataPo;

    if($dataPo->id == 1) {
      $this->penugasan_model->default($dataUser, $dataPo);
  
      // start pagination
      $this->load->library('pagination');
  
      $config['base_url'] = base_url().'admin/penugasan/index/';
      $config['total_rows'] = $this->session->userdata('count');
      $config['use_page_numbers'] = TRUE;
      $config['per_page'] = 10;
      $config['uri_segment'] = 4;
      $config['num_links'] = 2;
  
      $config['next_link'] = 'Next';
      $config['prev_link'] = 'Prev';
      $config['first_link'] = 'First';
      $config['last_link'] = 'Last';
      $config['full_tag_open'] = '<ul class="pagination">';
      $config['full_tag_close'] = '</ul>';
      $config['num_tag_open'] = '<li>';
      $config['num_tag_close'] = '</li>';
      $config['cur_tag_open'] = '<li class="active"><a href="#">';
      $config['cur_tag_close'] = '</a></li>';
      $config['prev_tag_open'] = '<li>';
      $config['prev_tag_close'] = '</li>';
      $config['next_tag_open'] = '<li>';
      $config['next_tag_close'] = '</li>';
      $config['last_tag_open'] = '<li>';
      $config['last_tag_open'] = '<li>';
      $config['first_tag_open'] = '<li>';
      $config['first_tag_open'] = '<li>';
  
      $config['first_url'] = base_url().'/admin/penugasan/' ;
  
      $this->pagination->initialize($config);
      // Ambil data crew
      $page = ($this->uri->segment(4)) ? ($this->uri->segment(4)-1) : 0;
      $crew = $this->penugasan_model->pageDefault($dataUser, $dataPo, $config['per_page'], $page);
  
      $dataPage = $this->session->listPagingDefault;
      // var_dump($dataPage);
      // End data crew
  
      // end pagination

      $data = array(
        'title'   => 'Halaman Administrator',
        'isi'     => 'admin/penugasan/penugasanTemplate',
        'dataUser' => $this->session->dataUser,
        'dataPo'  => $this->session->dataPo,
        // 'dataTrayek' => $this->session->dataTrayek
        'listDataDefault' => $dataPage,
        'paging'                  => $this->pagination->create_links()
      );
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    } else {
      $data = array(
        'title'   => 'Halaman Administrator',
        'isi'     => 'admin/penugasan/penugasanTemplate',
        'dataUser' => $this->session->dataUser,
        'dataPo'  => $this->session->dataPo,
        'dataTrayek' => $this->session->dataTrayek
      );
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    // $dataUser = $this->session->dataUser;

  }
  // END HALAMAN PENUGASAN

  // START PENUGASAN DEFAULT
  public function default()
  {
    $dataUser = $this->session->dataUser;
    $dataPo = $this->session->dataPo;
    $this->penugasan_model->default($dataUser, $dataPo);

    // start pagination
    $this->load->library('pagination');

    $config['base_url'] = base_url().'admin/penugasan/default/';
    $config['total_rows'] = $this->session->userdata('count');
    $config['use_page_numbers'] = TRUE;
    $config['per_page'] = 10;
    $config['uri_segment'] = 4;
    $config['num_links'] = 2;

    $config['next_link'] = 'Next';
    $config['prev_link'] = 'Prev';
    $config['first_link'] = 'First';
    $config['last_link'] = 'Last';
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_open'] = '<li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_open'] = '<li>';

    $config['first_url'] = base_url().'/admin/crew/' ;

    $this->pagination->initialize($config);
    // Ambil data crew
    $page = ($this->uri->segment(4)) ? ($this->uri->segment(4)-1) : 0;
    $crew = $this->penugasan_model->pageDefault($dataUser, $dataPo, $config['per_page'], $page);

    $dataPage = $this->session->listPagingDefault;
    // var_dump($dataPage);
    // End data crew

    // end pagination
    
    $data = array(
      'title'     => 'Halaman Administrator',
      'isi'       => 'admin/penugasan/penugasanDefault/penugasanDefault',
      'dataUser'  => $this->session->dataUser,
      'dataPo'    => $this->session->dataPo,
      'listDataDefault' => $dataPage,
      'paging'                  => $this->pagination->create_links()
    );
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }
  // END PENUGASAN DEFAULT

  // START ADD PENUGASAN DEFAULT
  public function addDefault()
  {
    $dataUser = $this->session->dataUser;
    $dataPo = $this->session->dataPo;
    $this->penugasan_model->getTrayek($dataUser, $dataPo);
    $this->penugasan_model->getDataUser($dataUser, $dataPo);

    $data = array(
      'title'             => 'Tambah Data Penugasan Default',
      'isi'               => 'admin/penugasan/penugasanDefault/tambahPenugasanDefault',
      'dataUser'          => $this->session->dataUser,
      'dataPo'            => $this->session->dataPo,
      'dataTrayekDefault' => $this->session->dataTrayekDefault,
      'dataListUser'      => $this->session->dataListUser
    );
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }
  // END ADD PENUGASAN DEFAULT

  // START EDIT PENUGASAN DEFAULT
  public function editPenugasanDefault($id)
  {
    // Validasi input
    $valid = $this->form_validation;

    $valid->set_rules(
      'aktif','Status Aktif','required', array('required' => '%s harus diisi')
    );

    if($valid->run()===FALSE) {
      // End Validasi
      $data = array(
        'title'     => 'Edit Penugasan Default',
        'isi'       => 'admin/penugasan/penugasanDefault/editPenugasanDefault',
        'dataUser'  => $this->session->dataUser,
        'dataPo'    => $this->session->dataPo
      );
      $this->load->view('admin/layout/wrapper', $data, FALSE);

      // Masuk Service Endpoint
    } else {

      $dataUser = $this->session->dataUser;
      $dataPo = $this->session->dataPo;

      $aktif = $this->input->post('aktif');

      $this->penugasan_model->editDefault($dataUser, $dataPo, $id, $aktif);

      $data = array(
        'title'     => 'Edit Penugasan Default',
        'isi'       => 'admin/penugasan/penugasanDefault/editPenugasanDefault',
        'dataUser'  => $this->session->dataUser,
        'dataPo'    => $this->session->dataPo
        // 'simpanTransaksiManual' => $this->session->simpanTransaksiManual
      );

      $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
  }
  // END EDIT PENUGASAN DEFAULT

  // START PENUGASAN HARIAN
  public function harian()
  {
    $data = array(
      'title'     => 'Halaman Administrator',
      'isi'       => 'admin/penugasan/penugasanHarian/penugasanHarian',
      'dataUser'  => $this->session->dataUser,
      'dataPo'    => $this->session->dataPo
      // 'dataTrayek' => $this->session->dataTrayek
    );
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }
  // END PENUGASAN HARIAN

  // START TAMPIL PENUGASAN HARIAN
  public function tampilPenugasanHarian()
  {
    // // Validasi input
    // $valid = $this->form_validation;

    // $valid->set_rules(
    //   'tanggal','Tanggal','required',
    //   array(
    //     'required'   => '%s harus diisi'
    //   )
    // );

    // if($valid->run()===FALSE) {
    // // End Validasi

    // $data = array(
    //   // 'title' => 'Tampil',
    //   'isi'   => 'admin/penugasan/penugasanHarian/penugasanHarian',
    //   'dataUser'  => $this->session->dataUser,
    //   'dataPo'    => $this->session->dataPo
    // );
    // $this->load->view('admin/layout/wrapper', $data, FALSE);

    // // Masuk Service Endpoint
    // } else {
      $dataUser = $this->session->dataUser;
      $dataPo   = $this->session->dataPo;
      $tanggal = $this->input->post('tanggal');

      $this->penugasan_model->tampilHarian($dataUser, $dataPo, $tanggal);
      // $this->session->set_flashdata('sukses', 'Data Telah Ditambah');
      // redirect(base_url('admin/kategori'), 'refresh');

      $data = array(
        'title' => 'Tampil',
        'isi'   => 'admin/penugasan/penugasanHarian/tablePenugasanHarian',
        'dataUser'  => $this->session->dataUser,
        'dataPo'    => $this->session->dataPo,
        'listDataHarian'  => $this->session->listHarian
      );
      $this->load->view('admin/layout/wrapper', $data, FALSE);

      // $this->load->view('admin/penugasan/tablePenugasanHarian');

    // }
    // End Masuk Service Endpoint
  }
  // END TAMPIL PENUGASAN HARIAN

  // START ADD PENUGASAN HARIAN
  public function addHarian()
  {
    $dataUser = $this->session->dataUser;
    $dataPo   = $this->session->dataPo;

    $this->penugasan_model->getTrayek($dataUser, $dataPo);
    $this->penugasan_model->getDataUser($dataUser, $dataPo);
    // $this->penugasan_model->getDataDriver($dataUser, $dataPo);

    $data = array(
      'title'     => 'Halaman Administrator',
      'isi'       => 'admin/penugasan/penugasanHarian/tambahPenugasanHarian',
      'dataUser'  => $this->session->dataUser,
      'dataPo'    => $this->session->dataPo,
      'dataTrayekDefault' => $this->session->dataTrayekDefault,
      'dataListUser'      => $this->session->dataListUser
      // 'dataTrayek' => $this->session->dataTrayek
    );
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }
  // END ADD PENUGASAN HARIAN

}
