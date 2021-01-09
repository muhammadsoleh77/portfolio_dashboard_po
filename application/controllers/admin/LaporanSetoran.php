<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanSetoran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->user_model->cek_login();
        $this->load->model('laporanSetoran_model');
    }

    public function index()
    {
        $dataUser = $this->session->dataUser;
        // $dataPo = $this->session->dataPo;
        $this->laporanSetoran_model->dataLaporanSetoran($dataUser);

        $data = array(
            'title'                 => 'Halaman Administrator',
            'isi'                   => 'admin/laporanSetoran/laporanSetoranTemplate',
            // 'isi'                   => 'admin/laporanSetoran/tableLaporanSetoran',
            'dataUser'              => $this->session->dataUser,
            'dataPo'                => $this->session->dataPo,
            'listDataLapSetoran'    => $this->session->listDataLapSetoran
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function rincian($idSap)
    {
        $dataUser = $this->session->dataUser;
        $this->laporanSetoran_model->rincianLaporanSetoran($dataUser, $idSap);

        $data = array(
            'title'                 => 'Halaman Administrator',
            // 'isi'                => 'admin/laporanSetoran/laporanSetoranTemplate',
            'isi'                   => 'admin/laporanSetoran/rincianLaporanSetoran',
            'dataUser'              => $this->session->dataUser,
            'dataPo'                => $this->session->dataPo,
            'rincianLapSetoran'    => $this->session->rincianLapSetoran
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function tampil()
    {
        // validasi input
        $valid = $this->form_validation;
        $valid->set_rules('tanggal', 'Tanggal', 'required', array('required' => '%s harus diisi'));

        if ($valid->run() === FALSE) {
            // End Validasi


            $data = array(
                'title'   => 'Halaman Administrator',
                'isi'     => 'admin/laporanSetoran/laporanSetoranTemplate',
                'dataUser' => $this->session->dataUser,
                'dataPo'  => $this->session->dataPo
            );

            $this->load->view('admin/layout/wrapper', $data, FALSE);

            // Masuk service endpoint
        } else {
            $dataUser = $this->session->dataUser;
            // $dataPo = $this->session->dataPo;

            $tanggal = $this->input->post('tanggal');

            // if($this->input->post('pilihHari')) {
            //     $hari = $this->input->post('pilihHari');
            //     $pilihTypeProduk = $this->input->post('pilihTypeProduk');
            // }

            // if($this->input->post('pilihBulan')) {
            //     $bulan = $this->input->post('pilihBulan');
            //     $pilihTypeProduk = $this->input->post('pilihTypeProduk');
            // }

            $this->laporanSetoran_model->tampil($dataUser, $tanggal);

            $data = array(
                'title'             => 'Tampil',
                'isi'               => 'admin/laporanSetoran/tableLaporanSetoran',
                'dataUser'          => $this->session->dataUser,
                'dataPo'            => $this->session->dataPo,
                'listTampilLapSetoran'   => $this->session->listTampilLapSetoran
            );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        }
    }
}
