<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TunaiCashless_model extends CI_Model
{

    public function dataListCashless($dataUser, $dataPo, $tanggal)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint') . "/bumel/transaksi/nontunai/laporan?idPo=" . $dataPo->id . "&tanggal=" . $tanggal);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $dataUser->token
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        $tampilData = curl_exec($ch);
        // $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        $dataCashless =  json_decode($tampilData);
        $this->session->set_userdata('dataCashless', $dataCashless);

        curl_close($ch);
    }
}
