<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manifest_model extends CI_Model {

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

  // START GET DATA BUS AGRAMAS
  public function getDataBusAgra($dataUser)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/bumel/po/".$dataUser->idPo."/bus");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $busAgra = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $dataBusAgra = json_decode($busAgra);
    $this->session->set_userdata('dataBusAgra', $dataBusAgra);
    // var_dump($dataBus);

    curl_close($ch);
  }
  // END GET DATA BUS AGRAMAS

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

}
