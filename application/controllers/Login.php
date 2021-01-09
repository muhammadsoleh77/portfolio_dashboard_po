<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  // function is_login(){
  //   if($this->session->token) return TRUE;
  // }

  public function __construct(){
      parent::__construct();

      // if($this->is_login()){
      //   redirect('/admin/dashboard');
      // }
  }

  // Halaman Login
  public function index()
  {
    // MENAHAN SESSION TOKEN KETIKA SUDAH LOGIN
    $this->user_model->is_login();
    // END

    // Validasi
    $this->form_validation->set_rules('username', 'Harap input', 'required', array(
      'required' => '%s Username'
    ));
    $this->form_validation->set_rules('password', 'Harap input', 'required', array(
      'required' => '%s Password'
    ));

    if($this->form_validation->run()){
      $username   = $this->input->post('username');
      $password   = $this->input->post('password');
      // Proses ke simple login
      $this->user_model->login($username, $password);
    }
    // End Validasi

    $data = array( 'title' => 'Admin P.O' );
    $this->load->view('login/list', $data, FALSE);
  }

  // Ubah Password
  public function changePassword()
  {
    $data = array(
      'title'   => 'Halaman Administrator',
      'isi'     => 'login/ubahPassword',
      'dataUser' => $this->session->dataUser,
      'dataPo'  => $this->session->dataPo
    );

    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  // Simpan Ubah Password()
  public function simpanUbahPassword()
  {
    // validasi input
    $valid = $this->form_validation;
    $valid->set_rules('passwordLama', 'Input', 'required', array('required'=>'%s required!'));
    $valid->set_rules('passwordBaru', 'Input', 'required', array('required'=>'%s required!'));
    $valid->set_rules('konfirmasiPasswordBaru', 'Input', 'required', array('required'=>'%s required!'));

    if($valid->run()===FALSE) {
      // End Validasi

      $data = array(
        'title'   => 'Halaman Administrator',
        'isi'     => 'login/ubahPassword',
        'dataUser' => $this->session->dataUser,
        'dataPo'  => $this->session->dataPo
      );

      $this->load->view('admin/layout/wrapper', $data, FALSE);

      // Masuk service endpoint
    } else {
      $dataUser = $this->session->dataUser;
      // $dataPo = $this->session->dataPo;

      $passwordLama = $this->input->post('passwordLama');
      $passwordBaru = $this->input->post('passwordBaru');
      $konfirmasiPasswordBaru = $this->input->post('konfirmasiPasswordBaru');

      $this->user_model->simpanUbahPassword($dataUser, $passwordLama, $passwordBaru, $konfirmasiPasswordBaru);

      // $data = array(
      //   'title'             => 'Tampil',
      //   'isi'               => 'admin/trayek/tableTrayekSAP',
      //   'dataUser'          => $this->session->dataUser,
      //   'dataPo'            => $this->session->dataPo,
      //   'dataTrayekSAP'     => $this->session->dataTrayekSAP
      // );
      // $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

  }

  // Fungsi Logout
  public function logout()
  {
    // // Ambil fungsi logout dari user_model
    $this->user_model->logout();
  }

}
