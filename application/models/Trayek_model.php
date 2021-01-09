<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trayek_model extends CI_Model {

  // // Load Model
  // public function __construct()
  // {
  //   parent::__construct();
  //
  //   $this->base_url = "http://bumelapi.otobus.co.id:8484";
  // }

  // START GET DATA TRAYEK
  public function data($dataUser, $dataPo)
  {
	$postData = array(
		"idPo" => $dataPo->id,
		"orderBy" => "idTrayek",
		"pageNo" => 0,
		"pageRow" => 10
	);
	$postDataTrayek = json_encode($postData);
	// var_dump($postData);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/bumel/trayek/list");
	
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	  'Content-Type: application/json',
	  'Authorization: Bearer '.$dataUser->token,
      'Content-Length: ' . strlen($postDataTrayek)
    ));
    // curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postDataTrayek);

	$trayek = curl_exec($ch);
    $httpcode2 = curl_getinfo($ch, CURLINFO_HTTP_CODE);

	$dataTrayek = json_decode($trayek);
	$count = $dataTrayek;
	// $this->session->set_userdata('dataTrayek', $dataTrayek);
	$this->session->set_userdata('count', $count);
    // var_dump($dataTrayek);

    curl_close($ch);
  }
  // END GET DATA TRAYEK

  public function tampil($dataUser, $dataPo, $limit, $start)
  {
	$postData = array(
		"idPo" => $dataPo->id,
		"orderBy" => "idTrayek",
		"pageNo" => $start,
		"pageRow" => $limit
	);
	$postDataTrayek = json_encode($postData);
	// var_dump($postData);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/bumel/trayek/list");
	
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	  'Content-Type: application/json',
	  'Authorization: Bearer '.$dataUser->token,
      'Content-Length: ' . strlen($postDataTrayek)
    ));
    // curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postDataTrayek);

	$trayek = curl_exec($ch);
    $httpcode2 = curl_getinfo($ch, CURLINFO_HTTP_CODE);

	$dataTrayek = json_decode($trayek);
	$this->session->set_userdata('dataTrayek', $dataTrayek);
    // var_dump($dataTrayek);

    curl_close($ch);
  }

  public function getTrayek($dataUser, $limit, $offset = NULL)
  {
    $curl = curl_init();

    // if ($offset === NULL || $offset == 0) {
			// Jika offset NULL atau 0
			curl_setopt_array($curl, array(
				CURLOPT_URL => $this->config->item('endpoint')."/bumel/po/".$dataUser->idPo."/trayeks"."?limit=".$limit,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				// CURLOPT_USERPWD => $this->api_auth,
				CURLOPT_HTTPHEADER => array(
					"Content-Type: application/json",
					"Cache-Control: no-cache",
					// "key: ".$this->api_key
				),
			));
		// } else {
		// 	// Jika offset tidak NULL atau 0
		// 	curl_setopt_array($curl, array(
		// 		CURLOPT_URL => $this->config->item('endpoint')."/bumel/po/".$dataUser->idPo."/trayeks"."?limit=".$limit."&offset=".$offset,
		// 		CURLOPT_RETURNTRANSFER => true,
		// 		CURLOPT_ENCODING => "",
		// 		CURLOPT_MAXREDIRS => 10,
		// 		CURLOPT_TIMEOUT => 30,
		// 		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		// 		CURLOPT_CUSTOMREQUEST => "GET",
		// 		// CURLOPT_USERPWD => $this->api_auth,
		// 		CURLOPT_HTTPHEADER => array(
		// 			"Content-Type: application/json",
		// 			"Cache-Control: no-cache",
		// 			// "key: ".$this->api_key
		// 		),
		// 	));
		// }
		$response = curl_exec($curl);
    // var_dump($response);
		curl_close($curl);
		return $response;
  }

	// START DETAIL TRAYEK
	public function dataDetailTrayek($id, $dataUser) 
	{
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/bumel/trayek/".$id);

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Authorization: Bearer '.$dataUser->token
		));
		// curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLOPT_POSTFIELDS, $postDatas);

    	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

		$output = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		$detailTrayek = json_decode($output);
    	$this->session->set_userdata('detailTrayek', $detailTrayek);
		// var_dump($detailTrayek);
	}
	// END DETAIL TRAYEK

	// START TAMPIL TRAYEK S.A.P
	public function tampilTrayekSAP($dataUser, $pilihTypeProduk)
	{
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/id/co/bisku/payload/sap/material?group=".$pilihTypeProduk);

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Authorization: Bearer '.$dataUser->token
		));
		// curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLOPT_POSTFIELDS, $postDatas);

    	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

		$output = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		$dataTrayekSAP = json_decode($output);
    	$this->session->set_userdata('dataTrayekSAP', $dataTrayekSAP);
		// var_dump($dataTrayekSAP);
	}
	// END TAMPIL TRAYEK S.A.P

}
