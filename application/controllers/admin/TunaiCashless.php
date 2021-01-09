<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TunaiCashless extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->user_model->cek_login();
        $this->load->model('tunaiCashless_model');

        // $this->base_url = "http://bumelapi.otobus.co.id:8484";

    }

    // Halaman Dashboard
    public function index()
    {
        $data = array(
            'title'     => 'Halaman Administrator',
            'isi'       => 'admin/tunaiCashless/tunaiCashlessTemplate',
            'dataUser'  => $this->session->dataUser,
            'dataPo'    => $this->session->dataPo
        );

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    // START LAPORAN TUNAI
    public function tunai()
    {
        $dataUser = $this->session->dataUser;
        $dataPo = $this->session->dataPo;
        // $this->laporan_model->dataListLoket($dataUser, $dataPo);

        $data = array(
            'title'     => 'Halaman Administrator',
            'isi'       => 'admin/tunaiCashless/tunai/tunaiTemplate',
            'dataUser'  => $this->session->dataUser,
            'dataPo'    => $this->session->dataPo,
            // 'dataLoket' => $this->session->dataLoket
        );

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
    // END LAPORAN TUNAI

    // START LAPORAN CASHLESS
    public function cashless()
    {
        // $dataUser = $this->session->dataUser;
        // $dataPo = $this->session->dataPo;
        // $this->tunaiCashless_model->dataListCashless($dataUser, $dataPo);

        $data = array(
            'title'     => 'Halaman Administrator',
            'isi'       => 'admin/tunaiCashless/cashless/cashlessTemplate',
            'dataUser'  => $this->session->dataUser,
            'dataPo'    => $this->session->dataPo,
            // 'dataCashless' => $this->session->dataCashless
        );

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
    // END LAPORAN CASHLESS

    // START TAMPIL CASHLESS
    public function tampilCashless()
    {
        // Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('tanggal', 'Tanggal', 'required', array('required' => '%s harus diisi'));

        if ($valid->run() === FALSE) {
            // End Validasi
            $data = array(
                'title'     => 'Tampil',
                'isi'       => 'admin/tunaiCashless/cashless/cashlessTemplate',
                'dataUser'  => $this->session->dataUser,
                'dataPo'    => $this->session->dataPo
            );
            $this->load->view('admin/layout/wrapper', $data, FALSE);

            // Masuk Service Endpoint
        } else {
            $dataUser = $this->session->dataUser;
            $dataPo = $this->session->dataPo;

            $tanggal = $this->input->post('tanggal');

            $this->tunaiCashless_model->dataListCashless($dataUser, $dataPo, $tanggal);

            $data = array(
                'title'                 => 'Tampil',
                'isi'                   => 'admin/tunaiCashless/cashless/tableCashless',
                'dataUser'              => $this->session->dataUser,
                'dataPo'                => $this->session->dataPo,
                'dataCashless'          => $this->session->dataCashless,
                'tanggal'               => $tanggal
            );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        }
    }
    // END TAMPIL CASHLESS
}
