<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct(){
      parent::__construct();

      $this->user_model->cek_login();
      $this->load->model('dashboard_model');

      $this->base_url = "http://bumelapi.otobus.co.id:8484";

  }

  // Halaman Dashboard
  public function index()
  {
    $dataUser = $this->session->dataUser;
    $dataPo = $this->session->dataPo;
    // $token = $this->session->token;

    $this->dashboard_model->dataHariIni($dataUser, $dataPo);

    $this->dashboard_model->getChart($dataUser, $dataPo);

    $data = array(
      'title'               => 'Halaman Administrator',
      'isi'                 => 'admin/dashboard/list',
      'dataUser'            => $this->session->dataUser,
      'dataPo'              => $this->session->dataPo,
      // 'dataTransaksi'       => $this->session->dataTransaksi,
      // 'dataLogin'           => $this->session->dataLogin,
      'dataPenjualan'       => $this->session->dataPenjualan,
      'dataTrayek'          => $this->session->dataTrayek,

      // 'labelChart'         => $this->session->labelChart,
      'lineLabel' => $this->session->lineLabel,
      'keyChart'            => $this->session->keyChart,
      'dateLine' => $this->session->dateLine,
      'lineLabels' => $this->session->lineLabels,

      'lineChart'               => $this->session->lineChart,
      'total'             => $this->session->total,

      'dataChart'   => $this->session->dataChart,
      'lineData' => $this->session->lineData,

      // // GET DATA TOTAL DARI USER_MODEL
      // 'totalPnpTunai'       => $this->session->totalPnpTunai,
      // 'totalPnpNonTunai'    => $this->session->totalPnpNonTunai,
      // 'totalBayarTunai'     => $this->session->totalBayarTunai,
      // 'totalBayarNonTunai'  => $this->session->totalBayarNonTunai
      // // END DATA TOTAL
    );
    $this->load->view('admin/layout/wrapper', $data, FALSE);

    $dataUser = $this->session->dataUser;
    //
    // // START GET DATA TRANSAKSI SEMINGGU
    // $date_now = date('yy-m-d');
    //
    // $ch3 = curl_init();
    //
    // curl_setopt($ch3, CURLOPT_URL, $this->base_url."/bumel/setoran/po?idPo=".$dataUser->idPo."&typeBus=0&tglAwal=2020-03-15&tglAkhir=2020-03-15");
    // curl_setopt($ch3, CURLOPT_HEADER, 0);
    // // curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 1);
    // // curl_setopt($ch, CURLOPT_POST, 1);
    // // curl_setopt($ch, CURLOPT_POSTFIELDS);
    // curl_setopt($ch3, CURLOPT_RETURNTRANSFER, 1);
    // curl_setopt($ch3, CURLOPT_SSL_VERIFYPEER, 0);
    // // curl_setopt($ch2, CURLOPT_VERBOSE, 1);
    //
    // $listTransaksi = curl_exec($ch3);
    // $httpcode2 = curl_getinfo($ch3, CURLINFO_HTTP_CODE);
    //
    // $dataTransaksi = json_decode($listTransaksi);
    // // $dataNya = json_encode($listTransaksi);
    // $this->session->set_userdata('dataTransaksi', $dataTransaksi);
    //
    //
    // // foreach ($dataTransaksi->data as $doc) {
    // //   $totalPnpTunai = function()
    // //   {
    // //     $total = 0;
    // //     for($i = 0; $i<count($doc->detail); $i++){
    // //       $data = $doc->detail[i];
    // //       $total += ($data->jmlPnpTunai);
    // //     };
    // //     return $total;
    // //     // echo $total;
    // //     var_dump($total);
    // //   };
    // // };
    //
    //   $totalPnpTunai = 0;
    //   foreach ($dataTransaksi->data as $doc) {
    //     foreach ($doc->detail as $data){
    //       $totalPnpTunai += $data->jmlPnpTunai;
    //     };
    //     var_dump($totalPnpTunai);
    //   };
    //
    // // var_dump($dataTransaksi);
    //
    // curl_close($ch3);
    // // END DATA TRANSAKSI SEMINGGU

    // START TRAYEK
      // $ch = curl_init();

      // curl_setopt($ch, CURLOPT_URL, $this->base_url."/bumel/po/".$dataUser->idPo."/trayeks");

      // curl_setopt($ch, CURLOPT_HEADER, 0);
      // // curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 1);
      // // curl_setopt($ch, CURLOPT_POST, 1);
      // // curl_setopt($ch, CURLOPT_POSTFIELDS);
      // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      // // curl_setopt($ch2, CURLOPT_VERBOSE, 1);

      // $trayek = curl_exec($ch);
      // $httpcode2 = curl_getinfo($ch, CURLINFO_HTTP_CODE);

      // $dataTrayek = json_decode($trayek);
      // $this->session->set_userdata('dataTrayek', $dataTrayek);
      // // var_dump($dataTrayek);

      // curl_close($ch);
    // END TRAYEK
  }

}
