<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

  // Load Model
  public function __construct()
  {
    parent::__construct();

    // $this->base_url = "http://bumelapi.otobus.co.id:8484";
  }

  // START GET LAPORAN TRANSAKSI
  public function dataHariIni($dataUser, $dataPo)
  {
    $date_now = date('yy-m-d');

    $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint') . "/bumel/chartTransaksiSingle/".$dataPo->id);

      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Content-Type: application/json',
          'Authorization: Bearer ' . $dataUser->token
      ));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

      $tampil = curl_exec($ch);
      $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

      $dataPenjualan =  json_decode($tampil);
      // var_dump($dataPenjualan);

      $this->session->set_userdata('dataPenjualan', $dataPenjualan);

      curl_close($ch);
  }
  // END GET LAPORAN TRANSAKSI

  // START CHART
  public function getChart($dataUser, $dataPo)
  {
    // START TRAYEK
      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint') . "/bumel/trayek/listAll/".$dataPo->id);

      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Content-Type: application/json',
          'Authorization: Bearer ' . $dataUser->token
      ));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

      $trayek = curl_exec($ch);
      $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

      $dataTrayek =  json_decode($trayek);
      // var_dump($dataTrayek);

      $this->session->set_userdata('dataTrayek', $dataTrayek);

      // START GET DATA LABEL MORRIS BAR
      // $data = [];
      // $arrayTrayek = [];
      // $index = [];
      // $lineLabel = [];
      foreach ($dataTrayek as $key => $value) {
        $arrayTrayek[] = array(
          'namaTrayek' => $value->nama,
          'idTrayek' => $value->idTrayek,
          'jmlTransaksi' => 0
        );
        $lineLabel = json_encode($arrayTrayek);
        // var_dump($lineLabel);
        $this->session->set_userdata('lineLabel', $lineLabel);

        $lineLabelTrayek[] = $value->nama;
        $lineLabels = json_encode($lineLabelTrayek);
        $this->session->set_userdata('lineLabels', $lineLabels);
        // var_dump($lineLabels);

        $index[] = array($key);
        $dataIndex = json_encode($index);
        $this->session->set_userdata('keyChart', $dataIndex);

      }
      // END GET DATA LABEL MORRIS BAR

      curl_close($ch);

    $ch2 = curl_init();

    curl_setopt($ch2, CURLOPT_URL, $this->config->item('endpoint')."/bumel/chartTransaksi/".$dataPo->id);
    curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch2, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer '.$dataUser->token)
    );
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, 0);

    $chart = curl_exec($ch2);
    $httpcode2 = curl_getinfo($ch2, CURLINFO_HTTP_CODE);

    $dataChart = json_decode($chart);
    $this->session->set_userdata('dataChart', $dataChart);
    // var_dump($dataChart);

    // START GET DATA LABEL MORRIS BAR
    $data = [];
    $tanggal = [];
    // $total = [];
    // $lineData = [];
    foreach ($dataChart->data as $key => $value) {
      $todayTransaction = [];

      $lineData[] = array(
        'date' => $value->tanggal_transaksi
      );
      $dateLine = json_encode($lineData);
      // var_dump($dateLine);
      $this->session->set_userdata('dateLine', $dateLine);

      foreach ($arrayTrayek as $key2 => $trayek) {
        // $idTrayek = $trayek['idTrayek'];
        // var_dump($trayek);
        $todayTransaction[] = $trayek;
        // var_dump($todayTransaction);
        $todayTransaksi = json_encode($todayTransaction);
        // var_dump($todayTransaksi);

        // untuk mengisi jika tidak ada totalbayar, maka 0
        $lineData[$key][$key2] = $trayek['jmlTransaksi'];
        // var_dump($trayek);
        // end
      }

      foreach ($value->detail as $key3 => $detail) {
        for($k=0; $k < count($todayTransaction); $k++) {
          if ($value->tanggal_transaksi) {
            if($detail->idTrayek === $todayTransaction[$k]['idTrayek']) {
              $lineData[$key][$k] = $detail->totalBayar;
            }
          }
        }
      }
    }

    $dataChart = json_encode($lineData);
    $this->session->set_userdata('lineData', $dataChart);
    // END GET DATA LABEL MORRIS BAR

    curl_close($ch2);


  // END TRAYEK
  }
  // END CHART


}
