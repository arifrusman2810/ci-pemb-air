<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function login(){
    $this->load->view('customer/login');
    check_user_already_login();
  }

  public function process(){
    $post = $this->input->post(null, TRUE);
    $this->load->model('pelanggan_model');
    $query = $this->pelanggan_model->login($post);
    if($query->num_rows() > 0){
      $row = $query->row();
      $params = array(
        'user_id'  => $row->id_pelanggan,
        'nama'     => $row->nama_pelanggan,
        'username' => $row->username,
        'status'   => $row->status,
      );
      $this->session->set_userdata($params);
      echo
      "<script>
        alert('Selamat, login berhasil');
        window.location = '" .site_url('customer/dashboard'). "'
      </script>";
    }
    else{
      echo
      "<script>
        alert('Login gagal, username atau password salah!');
        window.location = '" .site_url('customer/auth/login'). "'
      </script>";
    }
  }

  public function logout(){
    $params = array(
      'user_id',
      'nama',
      'username',
      'status'
    );

    $this->session->unset_userdata($params);
    redirect('customer/auth/login');
  }




}