<?php
require_once APPPATH . 'core/Endpoint.php';

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

  // // Load Model
  // public function __construct()
  // {
  //   parent::__construct();
  //   $this->load->database();
  //   $this->base_url = "http://bumelapi.otobus.co.id:8484";
  //
  // }

  protected $CI;

  public function __construct()
  {
    $this->CI = &get_instance();
    ob_start();

    // Load data model user
    // $this->CI->load->model('user_model');
    // $this->base_url = "http://bumelapi.otobus.co.id:8484";
  }

  // Fungsi Login
  public function login($username, $password)
  {
    // $postData = "username=" . $username . "&password=" . $password;
    $postData = array(
      "username" => $username,
      "password" => $password
    );
    $postDatas = json_encode($postData);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint') . "/bumel/user/login");

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
      'Content-Length: ' . strlen($postDatas)
    ));
    // curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postDatas);

    $output = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    // var_dump($output);

    if ($httpcode >= 200 && $httpcode < 300) {
      $data = json_decode($output);
      // var_dump($data);
      // $this->CI->session->set_userdata('token', $data->user->token);
      // $this->CI->session->set_userdata('dataLogin', $data);
      // echo $output;

      // $userRole = array();
      // $userRole = json_encode($data->user->roles);


        // OPSI 1 CARI "ROLE_PO"
        $cari = in_array("ROLE_PO", $data->user->roles); // CARA INI WORK UNTUK CODEIGNITER

        // // OPSI 2 CARI "ROLE_PO"
        // $cari = array_search("ROLE_PO", $data->user->roles); // CARA INI TIDAK BEKERJA, ADA BEBERAPA USER TIDAK TERBACA KETIKA SEARCH

        if($cari) {
          $this->CI->session->set_userdata('token', $data->user->token);
          $this->CI->session->set_userdata('dataLogin', $data);

          $dataUser = json_decode($output);
          // var_dump(json_encode($dataUser));
          $this->CI->session->set_userdata('dataUser', $dataUser->user);
          $this->CI->session->set_userdata('dataPo', $dataUser->po);

          redirect(base_url('admin/dashboard'), 'refresh');
        } else {
          $this->CI->session->set_flashdata('warning', 'Maaf, Anda tidak bisa akses!');
          // http_response_code(404);
          // echo $output;
          // $dataUser = json_decode($output);
          // var_dump(json_encode($dataUser));
          // var_dump($akses);
          redirect(base_url('login'), 'refresh');
        }


      // redirect(base_url('admin/dashboard'), 'refresh');

      // $ch2 = curl_init();

      // curl_setopt($ch2, CURLOPT_URL, $this->config->item('endpoint')."/auth/profil");
      // curl_setopt($ch2, CURLOPT_HEADER, 0);
      // curl_setopt($ch2, CURLOPT_HTTPHEADER, array(
      //   'Content-Type: application/json',
      //   'Authorization: Bearer '.$data->token
      // ));
      // // curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 1);
      // // curl_setopt($ch, CURLOPT_POST, 1);
      // // curl_setopt($ch, CURLOPT_POSTFIELDS);
      // curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
      // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      // // curl_setopt($ch2, CURLOPT_VERBOSE, 1);

      // $output2 = curl_exec($ch2);
      // $httpcode2 = curl_getinfo($ch2, CURLINFO_HTTP_CODE);
      // var_dump($data);

      // $dataUser = json_decode($output2);
      $dataUser = json_decode($output);
      // var_dump(json_encode($dataUser));
      $this->CI->session->set_userdata('dataUser', $dataUser->user);
      $this->CI->session->set_userdata('dataPo', $dataUser->po);
      // echo $output2;
      // var_dump($dataUser);
      // redirect(base_url('admin/dashboard'), 'refresh');
      // $this->load->view('admin/dashboard/list', $dataUser);

      // curl_close($ch2);

      // // START GET DATA TRANSAKSI SEMINGGU
      // $date_now = date('yy-m-d');
      //
      // $ch3 = curl_init();
      //
      // curl_setopt($ch3, CURLOPT_URL, $this->base_url."/bumel/setoran/po?idPo=".$dataUser->idPo."&typeBus=0&tglAwal=".$date_now."&tglAkhir=".$date_now);
      // curl_setopt($ch3, CURLOPT_HEADER, 0);
      // curl_setopt($ch3, CURLOPT_RETURNTRANSFER, 1);
      // curl_setopt($ch3, CURLOPT_SSL_VERIFYPEER, 0);
      //
      // $listTransaksi = curl_exec($ch3);
      // $httpcode2 = curl_getinfo($ch3, CURLINFO_HTTP_CODE);
      //
      // // if($httpcode >= 200 && $httpcode < 300){
      //   $dataTransaksi = json_decode($listTransaksi);
      //   $this->session->set_userdata('dataTransaksi', $dataTransaksi);
      //   // var_dump($dataTransaksi);
      //
      //   redirect(base_url('admin/dashboard'), 'refresh');
      // // }
      //
      // curl_close($ch3);
      // // END DATA TRANSAKSI SEMINGGU
    } else {
      $this->CI->session->set_flashdata('warning', 'Terjadi Kesalahan, Harap login kembali');
      // http_response_code(404);
      // echo $output;
      redirect(base_url('login'), 'refresh');
    }

    curl_close($ch);
  }

  // Fungsi cek login
  public function cek_login()
  {
    // Memeriksa apakah session sudah ada atau belum, jika belum alihkan ke halaman login
    if (!$this->CI->session->userdata('token')) {
      $this->CI->session->set_flashdata('warning', 'Login Kembali');
      redirect(base_url('login'), 'refresh');
    }
  }

  // Fungsi Is Login
  public function is_login()
  {
    if ($this->CI->session->token) {
      redirect('admin/dashboard', 'refresh');
    }
  }

  // Ubah Password
  public function simpanUbahPassword($dataUser, $passwordLama, $passwordBaru, $konfirmasiPasswordBaru)
  {
    $postUbahPassword = array(
      "idUser" => $dataUser->idUser,
      "oldPassword" => $passwordLama,
      "password" => $passwordBaru
    );
    $postDataPassword = json_encode($postUbahPassword);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint') . "/bumel/user/changePassword");

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
      'Authorization: Bearer ' . $dataUser->token,
      'Content-Length: ' . strlen($postDataPassword)
    ));
    // curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postDataPassword);

    $trayek = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $dataTrayek = json_decode($trayek);
    $count = $dataTrayek;
    // var_dump($count);
    // $this->session->set_userdata('dataTrayek', $dataTrayek);
    $this->session->set_userdata('count', $count);
    // var_dump($dataTrayek);

    if($passwordBaru !== $konfirmasiPasswordBaru) {
      $this->CI->session->set_flashdata('warning', 'Password baru & Konfirmasi Password harus sama!');
      redirect('login/changePassword');
    }

    if($httpcode == 200) {
      // Setelah session dibuang, maka redirect ke login
      $this->CI->session->unset_userdata('token');
      $this->CI->session->set_flashdata('sukses', 'Berhasil Ubah Password, Silahkan login kembali');
      redirect('login');
    } else if ($httpcode == 400) {
      foreach($dataTrayek->errors as $errorData) {
        if($errorData) {
          $this->CI->session->set_flashdata('warning', $errorData->defaultMessage);
          redirect('login/changePassword');
        }
      }
      $this->CI->session->set_flashdata('warning', $dataTrayek->message);
      redirect('login/changePassword');
    } else if ($httpcode == 500) {
      $this->CI->session->set_flashdata('danger', 'Error 500');
      redirect('login/changePassword');
    }

    curl_close($ch);
  }

  // Fungsi Logout
  public function logout()
  {
    // Membuang semua session yang telah diset pada saat login
    // if(!$this->CI->session->unset_userdata('token')) return FALSE;

    $this->CI->session->unset_userdata('token');
    $this->CI->session->unset_userdata('dataUser');
    $this->CI->session->unset_userdata('dataTransaksi');

    // Setelah session dibuang, maka redirect ke login
    $this->CI->session->set_flashdata('sukses', 'Anda berhasil logout');
    redirect('login');
  }


  // // Listing all user
  // public function listing()
  // {
  //   $this->db->select('');
  //   $this->db->from('users');
  //   $this->db->order_by('id_user', 'desc');
  //   $query = $this->db->get();
  //   return $query->result();
  // }

  // // Detail user
  // public function detail($id_user)
  // {
  //   $this->db->select('');
  //   $this->db->from('users');
  //   $this->db->where('id_user', $id_user);
  //   $this->db->order_by('id_user', 'desc');
  //   $query = $this->db->get();
  //   return $query->row();
  // }

  // // Tambah
  // public function tambah($data)
  // {
  //   $this->db->insert('users', $data);
  // }

  // // Edit Data
  // public function edit($data)
  // {
  //   $this->db->update('users', $data);
  // }

  // // Hapus Data
  // public function delete($data)
  // {
  //   $this->db->delete('users', $data);
  // }

}
