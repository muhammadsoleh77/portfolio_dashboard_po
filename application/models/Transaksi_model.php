<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

  // Load Model
  public function __construct()
  {
    parent::__construct();

    // $this->base_url = "http://bumelapi.otobus.co.id:8484";
  }

  // START GET DATA LOKET
  public function getDataLoket($dataUser)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/bumel/po/".$dataUser->idPo."/lokets");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $loket = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $dataLoket = json_decode($loket);
    $this->session->set_userdata('dataLoket', $dataLoket);
    // var_dump($dataLoket);

    curl_close($ch);
  }
  // END GET DATA LOKET

  // START GET DATA BUS LORENA
  public function getDataBus($dataUser)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/bumel/list/bus/".$dataUser->idPo."/0");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $bus = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $dataBus = json_decode($bus);
    $this->session->set_userdata('dataBus', $dataBus);
    // var_dump($dataBus);

    curl_close($ch);
  }
  // END GET DATA BUS LORENA

  // START SIMPAN TRANSAKSI MANUAL
  public function simpan($dataUser, $token, $dataBus, $tanggal, $idUser, $pilihBusLorena, $pilihTrayekLorena, $pilihJadwal, $pilihHarga, $jumlahTiket)
  {
    if($pilihJadwal == null){
      $pilihJadwal = 0;
      // var_dump($pilihJadwal);
    } else {
      $pilihJadwal;
      // var_dump($pilihJadwal);
    }

    foreach ($dataBus->data as $key => $value) {
      if($value->idUser == $pilihBusLorena){
        $paramIdUser = $value->idUser;
        $paramIdBus = $value->idBus;
        // var_dump($value);
      }
    }

    if($token){
      $postData = array(
        "hargaTotal" => ($pilihHarga * $jumlahTiket),
        "idBus" => $paramIdBus,
        "idJadwal" => $pilihJadwal,
        "idLoket" => 0,
        "idPo" => $dataUser->idPo,
        "idTrayek" => (int)$pilihTrayekLorena,
        "idUser" => $paramIdUser,
        "jmlPenumpang" => (int)$jumlahTiket,
        "waktuTransaksi" => $tanggal,
      );
    }
    $a = json_encode($postData);
    // var_dump($a);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/bumel/transaksi/manual");
    // curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'X-Auth-Token: '.$token,
    'Content-Length: ' . strlen($a)
  )
    );
    // curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $a);
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $output = curl_exec($ch);
    // var_dump($output);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($httpcode == 200){
      ?>
        <script type="text/javascript">
          alert('Transaksi Manual Berhasil');
        </script>
      <?php

      $simpanTransaksiManual = json_decode($output);
      $this->session->set_userdata('simpanTransaksiManual', $simpanTransaksiManual);
      // var_dump($simpanTransaksiManual);
      redirect(base_url('admin/transaksi/transaksiManualLorena'), 'refresh');
    } else {
      ?>
        <script type="text/javascript">
          alert('ERROR!');
        </script>
      <?php

      $simpanTransaksiManual = json_decode($output);
      $this->session->set_userdata('simpanTransaksiManual', $simpanTransaksiManual);
      // var_dump($simpanTransaksiManual);
      redirect(base_url('admin/transaksi/transaksiManualLorena'), 'refresh');
    }

    curl_close($ch);
  }
  // END SIMPAN TRANSAKSI MANUAL

  // START Tampil DATA BY LOKET
  public function tampil_loket($pilihLoket, $tanggal)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/bumel/penumpang/loket/".$pilihLoket."/tgl/".$tanggal);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $output = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $listDataLoket =  json_decode($output);
    $this->session->set_userdata('listDataLoket', $listDataLoket);
    // echo $output2;
    // var_dump($listDataLoket);

    curl_close($ch);
  }
  // END Tampil DATA BY LOKET

  // START Tampil DATA BY BUS
  public function tampil_bus($pilihBus, $tanggal)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/bumel/penumpang/bus/".$pilihBus."/tgl/".$tanggal);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $output = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $listDataBus =  json_decode($output);
    $this->session->set_userdata('listDataBus', $listDataBus);
    // echo $output2;
    // var_dump($listDataBus);

    curl_close($ch);
  }
  // END Tampil DATA BY BUS

  // START HAPUS DATA TRANSAKSI
  public function hapusDataTransaksi($listDataBus, $key, $token)
  {
    // var_dump($token);
    // MENDAPATKAN DATA PER INDEX
    foreach ($key as $key2 => $value) {
      if($listDataBus == $key2){
        $paramIdTransaksi = $value->idTransaksi;
        // $a = $value;
        // var_dump($a);
      }
    }
    // END

    $postData = array(
      "idTransaksi" => [
        $paramIdTransaksi
        ]
    );
    $a = json_encode($postData);
    // var_dump($a);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/bumel/transaksi/hapus");
    // curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'X-Auth-Token: '.$token,
    'Content-Length: ' . strlen($a))
    );
    // curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $a);
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $output = curl_exec($ch);
    // var_dump($output);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($httpcode == 200) {
      ?>
        <script type="text/javascript">
          alert('Berhasil Hapus Data');
        </script>
      <?php
      redirect(base_url('admin/transaksi/hapusTransaksiLorena'), 'refresh');
    } else {
      ?>
        <script type="text/javascript">
          alert('ERROR!');
        </script>
      <?php
    }
    curl_close($ch);
  }
  // END HAPUS DATA TRANSAKSI

}
