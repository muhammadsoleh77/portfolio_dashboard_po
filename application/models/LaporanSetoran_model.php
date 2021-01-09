<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanSetoran_model extends CI_Model
{

    // Load Model
    public function __construct()
    {
        parent::__construct();
    }

    public function dataLaporanSetoran($dataUser)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint') . "/bumel/LaporanSetoran");

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $dataUser->token
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        $dataLaporanSetoran = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        $listDataLapSetoran =  json_decode($dataLaporanSetoran);
        // var_dump(($listDataLapSetoran));

        $this->session->set_userdata('listDataLapSetoran', $listDataLapSetoran);

        curl_close($ch);
    }

    public function rincianLaporanSetoran($dataUser, $idSap)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint') . "/bumel/LaporanSetoran/" . $idSap);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $dataUser->token
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        $dataRincianLaporanSetoran = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        $rincianLapSetoran =  json_decode($dataRincianLaporanSetoran);
        // var_dump(($rincianLapSetoran));

        $this->session->set_userdata('rincianLapSetoran', $rincianLapSetoran);

        curl_close($ch);
    }

    public function tampil($dataUser, $tanggal)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint') . "/bumel/LaporanSetoranByDate?tgl=" . $tanggal);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $dataUser->token
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        $tampilLapSetoran = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        $listTampilLapSetoran =  json_decode($tampilLapSetoran);
        // var_dump(($listDataBusSap));

        $this->session->set_userdata('listTampilLapSetoran', $listTampilLapSetoran);

        curl_close($ch);
    }
}
