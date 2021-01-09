<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan_model extends CI_Model {

  // Load Model
  public function __construct()
  {
    parent::__construct();

    // $this->base_url = "http://bumelapi.otobus.co.id:8484";
  }

  // START GET TAGIHAN BELUM BAYAR
  public function belumBayar($dataUser)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/admin/tagihan/po/status?idPo=".$dataUser->idPo."&status=0");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $output = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $dataBelumBayar = json_decode($output);
    $this->session->set_userdata('dataBelumBayar', $dataBelumBayar);
    // var_dump($dataBelumBayar);

    curl_close($ch);
  }
  // END GET TAGIHAN BELUM BAYAR

  // START DETAIL TAGIHAN BELUM BAYAR
  public function detailBelumBayar($id)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/admin/tagihan/id?id=".$id);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $output = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $dataDetail = json_decode($output);
    $this->session->set_userdata('dataDetail', $dataDetail);
    // var_dump($dataDetail);

    curl_close($ch);
  }
  // END DETAIL TAGIHAN BELUM BAYAR

  // START GET TAGIHAN SUDAH BAYAR
  public function sudahBayar($dataUser)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/admin/tagihan/po/status?idPo=".$dataUser->idPo."&status=1");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $output = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $dataSudahBayar = json_decode($output);
    $this->session->set_userdata('dataSudahBayar', $dataSudahBayar);

    curl_close($ch);
  }
  // END GET TAGIHAN SUDAH BAYAR

}
