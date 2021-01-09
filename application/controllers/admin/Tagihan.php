<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan extends CI_Controller {

  public function __construct(){
      parent::__construct();

      $this->user_model->cek_login();
      $this->load->model('tagihan_model');
      $this->load->library('pdf');

      $this->base_url = "http://bumelapi.otobus.co.id:8484";

  }

  // Halaman Dashboard
  public function index()
  {
    $data = array(
      'title'   => 'Halaman Administrator',
      'isi'     => 'admin/tagihan/tagihanTemplate',
      'dataUser' => $this->session->dataUser,
      'dataPo'  => $this->session->dataPo
    );

    $this->load->view('admin/layout/wrapper', $data, FALSE);

    $dataUser = $this->session->dataUser;
  }

  // START TAGIHAN BELUM BAYAR
  public function belumBayar()
  {
    $dataUser = $this->session->dataUser;

    $this->tagihan_model->belumBayar($dataUser);

    $data = array(
      'title'           => 'Halaman Administrator',
      'isi'             => 'admin/tagihan/belumBayar/listBelumBayar',
      'dataUser'        => $this->session->dataUser,
      'dataBelumBayar'  => $this->session->dataBelumBayar
    );

    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }
  // END TAGIHAN BELUM BAYAR

  // START DETAIL TAGIHAN BELUM BAYAR
  public function detail($id)
  {
    $this->tagihan_model->detailBelumBayar($id);

    $data = array(
      'title'           => 'Halaman Administrator',
      'isi'             => 'admin/tagihan/belumBayar/detail',
      'dataUser'        => $this->session->dataUser,
      'dataBelumBayar'  => $this->session->dataBelumBayar,
      'dataDetail'      => $this->session->dataDetail
    );

    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }
  // END DETAIL TAGIHAN BELUM BAYAR

  // START PDF BELUM BAYAR
  public function cetakPdf($id)
  {
    $this->tagihan_model->detailBelumBayar($id);

    $data = array(
      'dataUser'        => $this->session->dataUser,
      'dataBelumBayar'  => $this->session->dataBelumBayar,
      'dataDetail'      => $this->session->dataDetail
    );

    $this->load->view('admin/tagihan/belumBayar/cetakPdf', $data, FALSE);
  }
  // END PDF BELUM BAYAR

  // START TAGIHAN SUDAH BAYAR
  public function sudahBayar()
  {
    $dataUser = $this->session->dataUser;

    $this->tagihan_model->sudahBayar($dataUser);

    $data = array(
      'title'           => 'Halaman Administrator',
      'isi'             => 'admin/tagihan/sudahBayar/listSudahBayar',
      'dataUser'        => $this->session->dataUser,
      'dataSudahBayar'  => $this->session->dataSudahBayar
    );

    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }
  // END TAGIHAN SUDAH BAYAR

}
