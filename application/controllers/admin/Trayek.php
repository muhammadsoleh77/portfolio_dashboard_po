<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trayek extends CI_Controller {

  public function __construct(){
      parent::__construct();

      $this->user_model->cek_login();

      $this->load->model('trayek_model');

      // $this->base_url = "http://bumelapi.otobus.co.id:8484";

  }

  // Halaman Dashboard
  public function index()
  {
    $dataUser = $this->session->dataUser;
    $dataPo = $this->session->dataPo;

    // $this->trayek_model->data($dataUser, $dataPo);

    // // start pagination
    // $this->load->library('pagination');
    // // config
    // $config['base_url'] = base_url().'admin/trayek/index/';
    // $config['total_rows'] = 10;
    // $config['use_page_numbers'] = TRUE;
    // $config['per_page'] = 10;
    // $config['uri_segment'] = 4;
    // $config['num_links'] = 2;

    // $config['next_link'] = 'Next';
    // $config['prev_link'] = 'Prev';
    // $config['first_link'] = 'First';
    // $config['last_link'] = 'Last';
    // $config['full_tag_open'] = '<ul class="pagination">';
    // $config['full_tag_close'] = '</ul>';
    // $config['num_tag_open'] = '<li>';
    // $config['num_tag_close'] = '</li>';
    // $config['cur_tag_open'] = '<li class="active"><a href="#">';
    // $config['cur_tag_close'] = '</a></li>';
    // $config['prev_tag_open'] = '<li>';
    // $config['prev_tag_close'] = '</li>';
    // $config['next_tag_open'] = '<li>';
    // $config['next_tag_close'] = '</li>';
    // $config['last_tag_open'] = '<li>';
    // $config['last_tag_open'] = '<li>';
    // $config['first_tag_open'] = '<li>';
    // $config['first_tag_open'] = '<li>';

    // $config['first_url'] = base_url().'/admin/trayek/';

    // $this->pagination->initialize($config);
    // // Ambil data crew
    // $page = ($this->uri->segment(4)) ? ($this->uri->segment(4)-1) : 0;
    // $this->trayek_model->tampil($dataUser, $dataPo, $config['per_page'], $page);
    // $dataPage = $this->session->dataTrayek;
    // // var_dump($dataPage);
    // // End data crew

    // // end pagination

    

    $data = array(
      'title'      => 'Halaman Administrator',
      // 'isi'        => 'admin/trayek/list',
      'isi'        => 'admin/trayek/list_trayek_sap',
      'dataUser'   => $this->session->dataUser,
      'dataPo'     => $this->session->dataPo,
      // 'dataTrayek' => $dataPage,
      // 'paging'     => $this->pagination->create_links()
    );

    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  public function tampilTrayekSAP()
  {
    // validasi input
    $valid = $this->form_validation;
    $valid->set_rules('pilihTypeProduk', 'Pilih', 'required', array('required'=>'%s type produk'));

    if($valid->run()===FALSE) {
      // End Validasi

      $data = array(
        'title'   => 'Halaman Administrator',
        'isi'     => 'admin/trayek/list_trayek_sap',
        'dataUser' => $this->session->dataUser,
        'dataPo'  => $this->session->dataPo
      );

      $this->load->view('admin/layout/wrapper', $data, FALSE);

      // Masuk service endpoint
    } else {
      $dataUser = $this->session->dataUser;
      $dataPo = $this->session->dataPo;

      $pilihTypeProduk = $this->input->post('pilihTypeProduk');

      $this->trayek_model->tampilTrayekSAP($dataUser, $pilihTypeProduk);

      $data = array(
        'title'             => 'Tampil',
        'isi'               => 'admin/trayek/tableTrayekSAP',
        'dataUser'          => $this->session->dataUser,
        'dataPo'            => $this->session->dataPo,
        'dataTrayekSAP'     => $this->session->dataTrayekSAP
      );
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
  }

  public function detailTrayek($id)
  {
    $dataUser = $this->session->dataUser;
    $this->trayek_model->dataDetailTrayek($id, $dataUser);

    $data = array(
      'title'   => 'Halaman Administrator',
      'isi'     => 'admin/trayek/detail/listDetail',
      'dataUser' => $this->session->dataUser,
      'dataPo'  => $this->session->dataPo,
      'detailTrayek' => $this->session->detailTrayek,
    );
    $this->load->view('admin/layout/wrapper', $data, FALSE);

  }

}
