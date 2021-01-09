<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanTransaksi_model extends CI_Model
{

    // Load Model
    public function __construct()
    {
        parent::__construct();
    }

    // public function dataLaporanSetoran($dataUser)
    // {
    //     $ch = curl_init();

    //     curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint') . "/bumel/LaporanSetoran");

    //     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //         'Content-Type: application/json',
    //         'Authorization: Bearer ' . $dataUser->token
    //     ));
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    //     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    //     $dataLaporanSetoran = curl_exec($ch);
    //     $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    //     $listDataLapSetoran =  json_decode($dataLaporanSetoran);
    //     // var_dump(($listDataLapSetoran));

    //     $this->session->set_userdata('listDataLapSetoran', $listDataLapSetoran);

    //     curl_close($ch);
    // }

    // public function rincianLaporanSetoran($dataUser, $idSap)
    // {
    //     $ch = curl_init();

    //     curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint') . "/bumel/LaporanSetoran/" . $idSap);

    //     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //         'Content-Type: application/json',
    //         'Authorization: Bearer ' . $dataUser->token
    //     ));
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    //     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    //     $dataRincianLaporanSetoran = curl_exec($ch);
    //     $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    //     $rincianLapSetoran =  json_decode($dataRincianLaporanSetoran);
    //     // var_dump(($rincianLapSetoran));

    //     $this->session->set_userdata('rincianLapSetoran', $rincianLapSetoran);

    //     curl_close($ch);
    // }

    public function dataListLoket($dataUser, $dataPo)
    {
        $postData = array(
            "idPo" => $dataPo->id,
            "orderBy" => "id",
            "pageNo"  => 0,
            "pageRow" => 10
          );
          $postDatas = json_encode($postData);
      
          $ch = curl_init();
      
          curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/bumel/po/loket");
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($postDatas),
            'Authorization: Bearer '.$dataUser->token
          ));
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $postDatas);
          curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      
          $output = curl_exec($ch);
          $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
          $dataLoket =  json_decode($output);
        //   var_dump($dataLoket);

          $this->session->set_userdata('dataLoket', $dataLoket);

          curl_close($ch);
    }

    public function tampil($dataUser, $tanggal, $pilihLoket)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint') . "/bumel/transaksi/ap2?idLoket=" . $pilihLoket . "&tgl=" . $tanggal);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $dataUser->token
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        $tampilLapTransaksi = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        $listTampilLapTransaksi =  json_decode($tampilLapTransaksi);
        // var_dump(($listTampilLapTransaksi));

        $this->session->set_userdata('listTampilLapTransaksi', $listTampilLapTransaksi);

        curl_close($ch);
    }
}
