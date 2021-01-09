<?php

defined('BASEPATH') OR exit ('No direct script access allowed');

class Simple_login
{
  protected $CI;

  public function __construct()
  {
    $this->CI =& get_instance();
    ob_start();

    // Load data model user
    // $this->CI->load->model('user_model');
    $this->base_url = "http://bumelapi.otobus.co.id:8484";
  }

  // Fungsi Login
  public function login($username, $password)
  {
    $postData = "username=" . $username . "&password=" . $password;

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->base_url."/user/authenticate");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $output = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($httpcode >= 200 && $httpcode < 300){
        $data = json_decode($output);
        $this->CI->session->set_userdata('token', $data->token);
        redirect(base_url('admin/dashboard'), 'refresh');
        echo $output;
    }else{
        $this->CI->session->set_flashdata('warning', 'Username atau Password Salah');
        redirect(base_url('login'), 'refresh');
        http_response_code(404);
        echo $output;
    }

    curl_close($ch);

  }

  // // Fungsi cek login
  // public function cek_login()
  // {
  //   // Memeriksa apakah session sudah ada atau belum, jika belum alihkan ke halaman login
  //   if($this->CI->session->userdata('username') == ""){
  //     $this->CI->session->set_flashdata('warning', 'Anda belum login');
  //     redirect(base_url('login'), 'refresh');
  //   }
  // }

  // Fungsi Logout
  public function logout()
  {
    // Membuang semua session yang telah diset pada saat login
    $this->CI->session->unset_userdata('id_user');
    $this->CI->session->unset_userdata('nama');
    $this->CI->session->unset_userdata('username');
    $this->CI->session->unset_userdata('akses_level');

    // Setelah session dibuang, maka redirect ke login
    $this->CI->session->set_flashdata('sukses', 'Anda berhasil logout');
    redirect(base_url('login'), 'refresh');
  }

}
