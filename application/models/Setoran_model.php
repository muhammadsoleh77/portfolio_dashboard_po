<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setoran_model extends CI_Model {

  // Load Model
  public function __construct()
  {
    parent::__construct();

    // $this->base_url = "http://bumelapi.otobus.co.id:8484";
  }

  public function tampil($dataUser, $dataPo, $tanggal, $pilihTypeProduk)
  {
    $ch = curl_init();

    // curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/bumel/setoran/po?idPo=".$dataUser->idPo."&typeBus=".$pilihTypeProduk."&tglAwal=".$tanggalAwal."&tglAkhir=".$tanggalAkhir);
    // curl_setopt($ch, CURLOPT_HEADER, 0);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    // $dataSetoran = curl_exec($ch);
    // $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/bumel/setoran/po?idPo=".$dataPo->id."&tgl=".$tanggal."&typeBus=".$pilihTypeProduk);

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Authorization: Bearer '.$dataUser->token
		));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $dataSetoran = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    $listDataSetoran =  json_decode($dataSetoran);
    // var_dump($listDataSetoran);

    if ($httpcode == 200) {
      $this->session->set_userdata('listDataSetoran', $listDataSetoran);

      // var_dump($listDataSetoran);
    } else {
      $status = $listDataSetoran->status;
      $pesan = $listDataSetoran->message;
      var_dump($status);
      ?>
      <script>
        alert("<?= $pesan; ?>")
      </script>
      <?php
    }

    curl_close($ch);
  }

  // START RINCIAN SETORAN
  public function rincianSetoran($dataUser, $dataPo, $listDataSetoran, $key)
  {
    foreach ($listDataSetoran->data as $key2 => $value) {
      if($key == $key2){
        $paramRincian = $value;
      }
    }

    $sap_type = $paramRincian->TypeBusSAP;

    $ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/id/co/bisku/payload/sap/customer?group=".$sap_type);

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Authorization: Bearer '.$dataUser->token
		));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $dataCrewSap = curl_exec($ch);
    // var_dump($dataCrewSap);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    $listDataCrewSap =  json_decode($dataCrewSap);
    // var_dump(($listDataCrewSap));

    $this->session->set_userdata('listDataCrewSap', $listDataCrewSap);

    curl_close($ch);

    $this->session->set_userdata('paramRincian', $paramRincian);
  }
  // END RINCIAN SETORAN

  // START BUS S.A.P
  public function busSap($dataUser)
  {
    $ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/id/co/bisku/payload/sap/bus?group=JA");

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Authorization: Bearer '.$dataUser->token
		));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $dataBusSap = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    $listDataBusSap =  json_decode($dataBusSap);
    // var_dump(($listDataBusSap));

    $this->session->set_userdata('listDataBusSap', $listDataBusSap);

    curl_close($ch);
  }
  // END BUS S.A.P

  // START TERIMA SETORAN
  public function terimaSetoran($dataUser, $dataPo, $dataRincian, $listDataSetoran)
  {
    foreach ($listDataSetoran->data as $key => $value) {
      if($dataRincian == $value){
        $a = $value;
        foreach($value->detail2 as $detail) {
          $b = $detail;
          $detailTrayek[] = array(
            "idTrayek" => $b->idTrayek,
            "jmlBayarEmoney" => $b->jmlBayarEmoney,
            "jmlBayarQris" => $b->jmlBayarQris,
            "jmlBayarTunai" => $b->jmlBayarTunai,
            // "jmlPnp" => 0,
            "ritase" => $b->ritase
          );
        }
      }
    }

    $postData = array(
      "biayas" => [ array(
        "bSetoranBus" => array(
          "idBus" => $a->idBus,
          // "idInvoice" => 0,
          // "idLoket" => 0,
          "idPo" => $dataPo->id,
          // "idSetoranPO" => 0,
          "idUser" => $a->idUser,
          "jmlBayarEmoney" => $a->jmlBayarEmoney,
          "jmlBayarQris" => $a->jmlBayarQris,
          "jmlBayarTunai" => $a->jmlBayarTunai,
          "jmlPnpEmoney" => $a->jmlPnpEmoney,
          "jmlPnpQris" => $a->jmlPnpQris,
          "jmlPnpTunai" => $a->jmlPnpTunai,
          // "jumlahBiaya" => 0,
          // "jumlahPenumpang" => 0,
          // "jumlahSetoran" => 0,
          // "keterangan" => "string",
          "valid" => true
        )
        // "id" => 0,
        // "jumlah" => 0,
        // "keteranganBiaya" => "string",
        // "kodeBiaya" => "string"
      )],

      "details" => $detailTrayek,

      "idBus" => $a->idBus,
      "idPo" => $dataPo->id,
      "valid" => true,
      "idCrew" => "0000423485",
      "jmlBayarEmoney" => $a->jmlBayarEmoney,
      "jmlBayarQris" => $a->jmlBayarQris,
      "jmlBayarTunai" => $a->jmlBayarTunai,
      "jmlPnpEmoney" => $a->jmlPnpEmoney,
      "jmlPnpQris" => $a->jmlPnpQris,
      "jmlPnpTunai" => $a->jmlPnpTunai,
      // "jumlahBiaya" => 0,
      // "jumlahSetoran" => 0
    );
    $postTerima = json_encode($postData);
    echo $postTerima;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/bumel/setoran");
    // curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer '.$dataUser->token,
    'Content-Length: ' . strlen($postTerima)
  )
    );
    // curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postTerima);
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $output = curl_exec($ch);
    var_dump($output);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);
  }
  // END TERIMA SETORAN


  

  //   // POST DATA OSCAR
  //   foreach ($dataOscar as $valueOscar) {
  //     // var_dump($valueOscar);
  //     $postOscar[] = array(
  //       "id" => $valueOscar->idReport,
  //       "idBus" => $a->idBus,
  //       "idOscar" => $valueOscar->idOscar,
  //       "idTrayek" => $valueOscar->idTrayek,
  //       "jmlPnpAdmin" => 0,
  //       "jmlPnpOscar" => $valueOscar->jmlPnpOscar,
  //       "isEdited" => true,
  //       "valid" => true,
  //       "jmlTiketTrayek" => 0,
  //       "keteranganOscar" => $valueOscar->keteranganOscar,
  //       "waktuInput" => $valueOscar->waktuInput,
  //     );
  //   }
  //   $dataPostOscar = json_encode($postOscar);
  //   // var_dump($dataPostOscar);
  //
  //   $ch2 = curl_init();
  //   curl_setopt($ch2, CURLOPT_URL, $this->base_url."/bumel/oscarreport");
  //   // curl_setopt($ch, CURLOPT_HEADER, 0);
  //   curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, "POST");
  //   curl_setopt($ch2, CURLOPT_HTTPHEADER, array(
  //   'Content-Type: application/json',
  //   // 'X-Auth-Token: '.$token,
  //   'Content-Length: ' . strlen($dataPostOscar)
  // )
  //   );
  //   // curl_setopt($ch, CURLOPT_POST, 1);
  //   curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
  //   curl_setopt($ch2, CURLOPT_POSTFIELDS, $dataPostOscar);
  //   // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  //
  //   $output = curl_exec($ch2);
  //   // var_dump($output);
  //   $httpcode = curl_getinfo($ch2, CURLINFO_HTTP_CODE);
  //
  //
  //   curl_close($ch2);
  //   // END POST DATA OSCAR

}
