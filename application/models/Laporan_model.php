<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{

  // Load Model
  public function __construct()
  {
    parent::__construct();

    // $this->base_url = "http://bumelapi.otobus.co.id:8484";
  }

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

    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint') . "/bumel/po/loket");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
      'Content-Length: ' . strlen($postDatas),
      'Authorization: Bearer ' . $dataUser->token
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

  // START GET LAPORAN TRANSAKSI LOKET
  public function getLaporanTransaksiLoket($dataUser, $tanggalAwal, $tanggalAkhir, $pilihLoket)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint') . "/bumel/transaksi/loket?idLoket=" . $pilihLoket . "&tglAkhir=" . $tanggalAkhir . "&tglAwal=" . $tanggalAwal);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
      'Authorization: Bearer ' . $dataUser->token
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $tampilLapTransaksiLoket = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $listTampilLapTransaksiLoket =  json_decode($tampilLapTransaksiLoket);
    // var_dump(($listTampilLapTransaksiLoket->data));

    // if($listTampilLapTransaksiLoket->data) {
    //   $b = json_encode($listTampilLapTransaksiLoket->data);
    //   // var_dump($b);

    //   $this->session->set_userdata('listTampilLapTransaksiLoket', $b);
    // }

    $this->session->set_userdata('listTampilLapTransaksiLoket', $listTampilLapTransaksiLoket->data);

    curl_close($ch);
  }
  // END GET LAPORAN TRANSAKSI LOKET

  // START GET LAPORAN TRANSAKSI BUS
  public function getLaporanTransaksiBus($dataUser, $dataPo, $tanggalAwal, $tanggalAkhir, $pilihBus)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint') . "/bumel/transaksi/bus?idPo=" . $dataPo->id . "&tglAkhir=" . $tanggalAkhir . "&tglAwal=" . $tanggalAwal . "&type=" . $pilihBus);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
      'Authorization: Bearer ' . $dataUser->token
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $tampilLapTransaksiBus = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $listTampilLapTransaksiBus =  json_decode($tampilLapTransaksiBus);
    // var_dump(($listTampilLapTransaksiBus));

    $this->session->set_userdata('listTampilLapTransaksiBus', $listTampilLapTransaksiBus);

    curl_close($ch);
  }
  // END GET LAPORAN TRANSAKSI BUS

  // // START DETAIL LAPORAN TRANSAKSI
  // public function detailTransaksi($key, $dataLaporanTransaksi)
  // {
  //   foreach ($dataLaporanTransaksi->data as $key2 => $value2) {
  //     if ($key == $key2) {
  //       $detailTransaksi = $value2;
  //       // var_dump($detailTransaksi);

  //     }
  //   }
  //   $this->session->set_userdata('detailTransaksi', $detailTransaksi);
  // }
  // // END DETAIL LAPORAN TRANSAKSI

  // START GET LAPORAN SETORAN
  public function getLaporanSetoran($dataUser, $tanggal)
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
  // END GET LAPORAN SETORAN

  // START DETAIL LAPORAN SETORAN
  public function detailSetoran($dataUser, $idSap)
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
  // END DETAIL LAPORAN SETORAN

}
