<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crew_model extends CI_Model {

// Load Model
public function __construct()
{
    parent::__construct();
}

public function tampilDataPage($dataUser, $dataPo)
{
    $postData = array(
        "idPo"      => $dataPo->id,
        "orderBy"   => "id",
        "pageNo"    => 0,
        "pageRow"   => 10
    );
    $postDatas = json_encode($postData);
    // return $postDatas;
  
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/bumel/po/crew");
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

    $listDataPerPage = json_decode($output);
    $count = $listDataPerPage->totalElements;
    // var_dump($count);
    // return $count;

    $this->session->set_userdata('count', $count);
    // return false;

    curl_close($ch);
}

// START GET DATA CREW
public function tampil($dataUser, $dataPo, $limit, $start)
{
    $postData = array(
        "idPo"      => $dataPo->id,
        "orderBy"   => "id",
        "pageNo"    => $start,
        "pageRow"   => $limit
    );
    $postDatas = json_encode($postData);
  
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/bumel/po/crew");
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

    $listDataCrew =  json_decode($output);
    // echo json_encode($listDataCrew);
    $this->session->set_userdata('listDataCrew', $listDataCrew);
    curl_close($ch);
}
// END GET DATA CREW

// START TAMPIL CREW S.A.P
public function tampilCrewSAP($dataUser, $pilihTypeProduk)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/id/co/bisku/payload/sap/customer?group=".$pilihTypeProduk);

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

    $dataCrewSAP = json_decode($output);
    $this->session->set_userdata('dataCrewSAP', $dataCrewSAP);
    // var_dump($dataTrayekSAP);
}
// END TAMPIL CREW S.A.P

// public function count_filter($search)
// {    
//     $this->db->like('nis', $search); // Untuk menambahkan query where LIKE    
//     $this->db->or_like('nama', $search); // Untuk menambahkan query where OR LIKE    
//     $this->db->or_like('telp', $search); // Untuk menambahkan query where OR LIKE    
//     $this->db->or_like('alamat', $search); // Untuk menambahkan query where OR LIKE    
//     return $this->db->get('siswa')->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian  
// }



}
