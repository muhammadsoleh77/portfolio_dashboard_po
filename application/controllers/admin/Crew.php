<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crew extends CI_Controller {

  public function __construct(){
      parent::__construct();

      $this->user_model->cek_login();
      $this->load->model('crew_model');

  }

  // Halaman Dashboard
  public function index()
  {
    $dataUser = $this->session->dataUser;
    $dataPo = $this->session->dataPo;

    // $this->crew_model->tampil($dataUser, $dataPo);
    // $a = $this->session->listDataCrew;
    // foreach($a->content as $datalist){
    //   $total[] = $datalist;
    // }

    // $this->crew_model->tampilDataPage($dataUser, $dataPo);

    // // start pagination
    // $this->load->library('pagination');
    // // config
    // $config['base_url'] = base_url().'admin/crew/index/';
    // $config['total_rows'] = $this->session->userdata('count');
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

    // $config['first_url'] = base_url().'/admin/crew/';

    // $this->pagination->initialize($config);
    // // Ambil data crew
    // $page = ($this->uri->segment(4)) ? ($this->uri->segment(4)-1) : 0;
    // $crew = $this->crew_model->tampil($dataUser, $dataPo, $config['per_page'], $page);
    // $dataPage = $this->session->listDataCrew->content;
    // // var_dump($dataPage);
    // // End data crew

    // // end pagination

    $data = array(
      'title'                   => 'Halaman Administrator',
      // 'isi'                     => 'admin/crew/tableCrew',
      'isi'                     => 'admin/crew/list_crew_sap',
      'dataUser'                => $this->session->dataUser,
      'dataPo'                  => $this->session->dataPo,
      // 'listDataCrew'            => $dataPage,
      // // 'data'                    => $datatabel,
      // 'paging'                  => $this->pagination->create_links()
    );

    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  public function tampil()
  {
    // // validasi input
    // $valid = $this->form_validation;

    // $valid->set_rules('inputPerPage', 'Input', 'required', array('required'=>'%s harus diisi'));

    // if($valid->run()===FALSE) {
    //   // End Validasi

    //   $data = array(
    //     'title'   => 'Halaman Administrator',
    //     'isi'     => 'admin/crew/crewTemplate',
    //     'dataUser' => $this->session->dataUser,
    //     'dataPo'  => $this->session->dataPo
    //   );

    //   $this->load->view('admin/layout/wrapper', $data, FALSE);

    //   // Masuk service endpoint
    // } else {
      $dataUser = $this->session->dataUser;
      $dataPo = $this->session->dataPo;

      $inputPerPage = $this->input->post('inputPerPage');
      // var_dump($inputPerPage);

      $a = $this->crew_model->tampilDataPage($dataUser, $dataPo, $inputPerPage);
      // var_dump($a);

      $b = $this->session->userdata('count');

      // var_dump($b);

      // start pagination
      $this->load->library('pagination');

      $config['base_url'] = site_url().'admin/crew/tampil/';
      $config['total_rows'] = $inputPerPage;
      var_dump($config['total_rows']);
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

      // $config['first_url'] = base_url().'/admin/crew/tampil/';

      $this->pagination->initialize($config);
      // Ambil data crew
      $page = ($this->uri->segment(4)) ? ($this->uri->segment(4)-1) : 0;
      // var_dump($page);
      $dataCrew = $this->crew_model->tampil($dataUser, $dataPo, $config['per_page'], $page);

      $dataPage = $this->session->listDataCrew->content;

      $totalPage = $this->session->listDataCrew->pageable->pageSize;
      // var_dump($totalPage);
      // End data crew

      // end pagination

      $data = array(
        'title'             => 'Tampil',
        'isi'               => 'admin/crew/tableCrew',
        'dataUser'          => $this->session->dataUser,
        'dataPo'            => $this->session->dataPo,
        'listDataCrew'      => $dataPage,
        'paging'            => $this->pagination->create_links(),
      );
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    // }
  }

  public function tampilCrewSAP()
  {
    // validasi input
    $valid = $this->form_validation;
    $valid->set_rules('pilihTypeProduk', 'Pilih', 'required', array('required'=>'%s type produk'));

    if($valid->run()===FALSE) {
      // End Validasi

      $data = array(
        'title'   => 'Halaman Administrator',
        'isi'     => 'admin/crew/list_crew_sap',
        'dataUser' => $this->session->dataUser,
        'dataPo'  => $this->session->dataPo
      );

      $this->load->view('admin/layout/wrapper', $data, FALSE);

      // Masuk service endpoint
    } else {
      $dataUser = $this->session->dataUser;
      $dataPo = $this->session->dataPo;

      $pilihTypeProduk = $this->input->post('pilihTypeProduk');

      $this->crew_model->tampilCrewSAP($dataUser, $pilihTypeProduk);

      $data = array(
        'title'             => 'Tampil',
        'isi'               => 'admin/crew/tableCrewSAP',
        'dataUser'          => $this->session->dataUser,
        'dataPo'            => $this->session->dataPo,
        'dataCrewSAP'       => $this->session->dataCrewSAP
      );
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
  }

}
