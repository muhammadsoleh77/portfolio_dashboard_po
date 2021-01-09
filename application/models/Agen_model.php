<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agen_model extends CI_Model {

// Load Model
public function __construct()
{
    parent::__construct();
}

// START GET DATA AGEN
public function getDataAgen($dataUser, $dataPo)
{
    $postData = array(
        "idPo"      => $dataPo->id,
        "orderBy"   => "id",
        "pageNo"    => 0,
        "pageRow"   => 10
    );
    $postDatas = json_encode($postData);
  
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/bumel/po/agen");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($postDatas),
    'Authorization: Bearer '.$dataUser->token
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postDatas);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  
    $output = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $listDataAgen =  json_decode($output);
    $this->session->set_userdata('listDataAgen', $listDataAgen);
    // echo $output2;
    // var_dump($listDataDefault);

    curl_close($ch);
}
// END GET DATA AGEN

}
