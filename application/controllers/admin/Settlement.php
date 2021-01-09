<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settlement extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->user_model->cek_login();
        // $this->load->model('settlement_model');
    }

    public function index()
    {
        $data = array(
            'title'   => 'Halaman Administrator',
            'isi'     => 'admin/settlement/settlementTemplate',
            'dataUser' => $this->session->dataUser,
            'dataPo'  => $this->session->dataPo
        );

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
}
