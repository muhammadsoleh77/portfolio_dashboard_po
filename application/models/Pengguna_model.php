<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model {

  // Load Model
  public function __construct()
  {
    parent::__construct();

    // $this->base_url = "http://bumelapi.otobus.co.id:8484";
  }

  // START GET DATA PENGGUNA TERDAFTAR
  public function getDataPengguna($dataUser)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/bumel/po/".$dataUser->idPo."/users");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $output = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $dataPenggunaTerdaftar = json_decode($output);
    $this->session->set_userdata('dataPenggunaTerdaftar', $dataPenggunaTerdaftar);
    // var_dump($dataPenggunaTerdaftar);

    curl_close($ch);
  }
  // END GET DATA PENGGUNA TERDAFTAR

}
