<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loket extends CI_Controller {

  public function __construct(){
      parent::__construct();

      $this->user_model->cek_login();
      $this->load->model('loket_model');

  }

  // Halaman Dashboard
  public function index()
  {
    $dataUser = $this->session->dataUser;
    $dataPo = $this->session->dataPo;

    $this->loket_model->getDataLoket($dataUser, $dataPo);

    // $this->crew_model->tampilDataPage($dataUser, $dataPo);

    // start pagination
    $this->load->library('pagination');
    // config
    $config['base_url'] = base_url().'admin/loket/index/';
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

    $config['first_url'] = base_url().'/admin/loket/';

    $this->pagination->initialize($config);
    // Ambil data crew
    $page = ($this->uri->segment(4)) ? ($this->uri->segment(4)-1) : 0;
    $this->loket_model->tampil($dataUser, $dataPo, $config['per_page'], $page);
    $dataPage = $this->session->listDataLoket->content;
    // var_dump($dataPage);
    // End data crew

    // end pagination

    $data = array(
      'title'                   => 'Halaman Administrator',
      'isi'                     => 'admin/loket/loketTemplate',
      'dataUser'                => $this->session->dataUser,
      'dataPo'                  => $this->session->dataPo,
      'listDataLoket'           => $dataPage,
      'paging'                  => $this->pagination->create_links()
    );

    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

}
