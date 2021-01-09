<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_model extends CI_Model {

// Load Model
public function __construct()
{
    parent::__construct();
}

// START GET DATA TRAYEK
public function getDataProfil($dataUser, $dataPo)
{
    // var_dump($dataUser);
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/bumel/po/".$dataPo->id);

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

    $dataProfilPo = json_decode($output);
    $this->session->set_userdata('dataProfilPo', $dataProfilPo);
}
// END GET DATA TRAYEK

}
