<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanTransaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->user_model->cek_login();
        $this->load->model('laporanTransaksi_model');
    }

    public function index()
    {
        $dataUser = $this->session->dataUser;
        $dataPo = $this->session->dataPo;
        $this->laporanTransaksi_model->dataListLoket($dataUser, $dataPo);

        $data = array(
            'title'         => 'Halaman Administrator',
            'isi'           => 'admin/laporanTransaksi/laporanTransaksiTemplate',
            // 'isi'        => 'admin/laporanSetoran/tableLaporanSetoran',
            'dataUser'      => $this->session->dataUser,
            'dataPo'        => $this->session->dataPo,
            'dataLoket'     => $this->session->dataLoket
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    // public function rincian($idSap)
    // {
    //     $dataUser = $this->session->dataUser;
    //     $this->laporanSetoran_model->rincianLaporanSetoran($dataUser, $idSap);

    //     $data = array(
    //         'title'                 => 'Halaman Administrator',
    //         // 'isi'                => 'admin/laporanSetoran/laporanSetoranTemplate',
    //         'isi'                   => 'admin/laporanSetoran/rincianLaporanSetoran',
    //         'dataUser'              => $this->session->dataUser,
    //         'dataPo'                => $this->session->dataPo,
    //         'rincianLapSetoran'    => $this->session->rincianLapSetoran
    //     );
    //     $this->load->view('admin/layout/wrapper', $data, FALSE);
    // }

    public function tampil()
    {
        // validasi input
        $valid = $this->form_validation;
        $valid->set_rules('tanggal', 'Tanggal', 'required', array('required' => '%s harus diisi'));
        $valid->set_rules('pilihLoket', 'Loket', 'required', array('required' => '%s harus diisi'));

        if ($valid->run() === FALSE) {
            // End Validasi


            $data = array(
                'title'   => 'Halaman Administrator',
                'isi'     => 'admin/laporanTransaksi/laporanTransaksiTemplate',
                'dataUser' => $this->session->dataUser,
                'dataPo'  => $this->session->dataPo,
                'dataLoket'     => $this->session->dataLoket
            );

            $this->load->view('admin/layout/wrapper', $data, FALSE);

            // Masuk service endpoint
        } else {
            $dataUser = $this->session->dataUser;
            // $dataPo = $this->session->dataPo;

            $tanggal = $this->input->post('tanggal');
            $pilihLoket = $this->input->post('pilihLoket');

            // if($this->input->post('pilihHari')) {
            //     $hari = $this->input->post('pilihHari');
            //     $pilihTypeProduk = $this->input->post('pilihTypeProduk');
            // }

            // if($this->input->post('pilihBulan')) {
            //     $bulan = $this->input->post('pilihBulan');
            //     $pilihTypeProduk = $this->input->post('pilihTypeProduk');
            // }

            $this->laporanTransaksi_model->tampil($dataUser, $tanggal, $pilihLoket);

            $data = array(
                'title'                     => 'Tampil',
                'isi'                       => 'admin/laporanTransaksi/tableLaporanTransaksi',
                'dataUser'                  => $this->session->dataUser,
                'dataPo'                    => $this->session->dataPo,
                'dataLoket'                 => $this->session->dataLoket,
                'listTampilLapTransaksi'    => $this->session->listTampilLapTransaksi
            );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        }
    }
}
