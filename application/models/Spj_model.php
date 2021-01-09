<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spj_model extends CI_Model {

  // Load Model
  public function __construct()
  {
    parent::__construct();

    // $this->base_url = "http://bumelapi.otobus.co.id:8484";
  }

  // START GET DATA EIEN
  public function getDataEien($dataUser)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/eien/driver?idPo=".$dataUser->idPo);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $eien = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $dataEien = json_decode($eien);
    $this->session->set_userdata('dataEien', $dataEien);
    // var_dump($dataEien);

    curl_close($ch);
  }
  // END GET DATA EIEN

  // START GET DATA BUS
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
    // var_dump($dataEien);

    curl_close($ch);
  }
  // END GET DATA BUS

  // START CETAK SPJ JAC
  public function cetakSpjJAC($tanggal, $pilihBus, $driver, $dataEien, $dataBus, $dataUser)
  {
    // GET PARAM DRIVER BY INDEX
    foreach ($dataEien->data as $key => $value) {
      if($key == $driver){
        $paramNikDriver = $value->nik;
        $paramNamaDriver = $value->nama;
        // var_dump($paramDriver);
      }
    }
    // END GET PARAM DRIVER BY INDEX

    // GET PARAM BUS BY INDEX
    foreach ($dataBus->data as $key => $value) {
      if($key == $pilihBus){
        $paramIdUser = $value->idUser;
        $paramIdBus = $value->idBus;
        $paramKodeBus = $value->kodeBus;
        // var_dump($paramKodeBus);
      }
    }
    // END PARAM BUS BY INDEX

    $postData = array(
      "idPo" => $dataUser->idPo,
      "namaPo" => $dataUser->nama,
      "idUser" => null,
      "idBus" => $paramIdBus,
      "kodeBus" => $paramKodeBus,
      "tanggal" => $tanggal,
      "isChosable" => TRUE,
      "isAktif" => TRUE,
      "isDefault" => TRUE,
      "nik" => $paramNikDriver,
      "namaSupir" => $paramNamaDriver,
      "bRitases" => []
    );
    $a = json_encode($postData);
    // var_dump($a);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/bumel/simpanpenugasan");
    // curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($a))
    );
    // curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $a);
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $simpan = curl_exec($ch);
    // var_dump($simpan);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    // var_dump($httpcode);

      $dataSimpanPenugasan = json_decode($simpan);
      $this->session->set_userdata('dataSimpanPenugasan', $dataSimpanPenugasan);
      $this->session->set_userdata('postSimpanPenugasan', json_decode($a));

    // var_dump($dataSimpan);

    curl_close($ch);
  }
  // END CETAK SPJ JAC

  // START CETAK SPJ JRC
  public function cetakSpjJRC($tanggal, $pilihBus, $driver, $kondektur, $dataEien, $dataBus, $dataUser)
  {
    // GET PARAM DRIVER BY INDEX
    foreach ($dataEien->data as $key => $value) {
      if($key == $driver){
        $paramNikDriver = $value->nik;
        $paramNamaDriver = $value->nama;
        // var_dump($paramDriver);
      }
    }
    // END GET PARAM DRIVER BY INDEX

    // GET PARAM KONDEKTUR BY INDEX
    foreach ($dataEien->data as $key => $value) {
      if($key == $kondektur){
        $paramNikKondektur = $value->nik;
        $paramNamaKondektur = $value->nama;
        // var_dump($paramDriver);
      }
    }
    // END GET PARAM KONDEKTUR BY INDEX

    // GET PARAM BUS BY INDEX
    foreach ($dataBus->data as $key => $value) {
      if($key == $pilihBus){
        $paramIdUser = $value->idUser;
        $paramIdBus = $value->idBus;
        $paramKodeBus = $value->kodeBus;
        // var_dump($paramKodeBus);
      }
    }
    // END PARAM BUS BY INDEX

    $postData = array(
      "idPo" => $dataUser->idPo,
      "namaPo" => $dataUser->nama,
      "idUser" => null,
      "idBus" => $paramIdBus,
      "kodeBus" => $paramKodeBus,
      "tanggal" => $tanggal,
      "isChosable" => TRUE,
      "isAktif" => TRUE,
      "isDefault" => TRUE,
      "nik" => $paramNikDriver,
      "namaSupir" => $paramNamaDriver,
      "nikCrew" => $paramNikKondektur,
      "namaCrew" => $paramNamaKondektur,
      "bRitases" => []
    );
    $a = json_encode($postData);
    // var_dump($a);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/bumel/simpanpenugasan");
    // curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($a))
    );
    // curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $a);
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $simpan = curl_exec($ch);
    // var_dump($simpan);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    // var_dump($httpcode);


      $dataSimpanPenugasanJRC = json_decode($simpan);
      $this->session->set_userdata('dataSimpanPenugasanJRC', $dataSimpanPenugasanJRC);
      $this->session->set_userdata('postSimpanPenugasanJRC', json_decode($a));

    // var_dump($dataSimpan);

    curl_close($ch);
  }
  // END CETAK SPJ JRC

}
