<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan extends CI_Controller {

  function __construct(){
    parent::__construct();
    check_user_not_login();
    $this->load->model(['tagihan_model', 'pembayaran_model']);
  }

  public function belumBayar(){
    $id = $this->session->userdata('user_id');
    $data['tagihan'] = $this->tagihan_model->get_user_belum_bayar($id)->result();
    // print_r($data['tagihan']);
    // die;
    $this->load->view('customer/templates/header');
    $this->load->view('customer/tagihan/belum_bayar', $data);
    $this->load->view('customer/templates/footer');
  }
  
  public function lunas(){
    $id = $this->session->userdata('user_id');
    $data['tagihan'] = $this->tagihan_model->get_user_lunas($id)->result();
    $this->load->view('customer/templates/header');
    $this->load->view('customer/tagihan/lunas', $data);
    $this->load->view('customer/templates/footer');
  }
  
  public function tungguKonfirm(){
    $id = $this->session->userdata('user_id');
    $data['tagihan'] = $this->tagihan_model->get_user_tungguKonfirm($id)->result();
    // print_r($data['tagihan']);
    // die;
    $this->load->view('customer/templates/header');
    $this->load->view('customer/tagihan/tunggu_konfirm', $data);
    $this->load->view('customer/templates/footer');
  }

  public function cetak($id){
    $data['data'] = $this->tagihan_model->get_pembayaran($id)->row();
    $this->load->view('laporan/cetak_pembayaran', $data);
  }

  public function bayar($id){
    $data['tagihan'] = $this->tagihan_model->get_belum_bayar($id)->row();
    $this->load->view('customer/templates/header');
    $this->load->view('customer/tagihan/bayar', $data);
    $this->load->view('customer/templates/footer');
  }

  public function bayarProcess(){
    $config['upload_path']   = './uploads/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size']      = 2048;
		$config['file_name']     = 'trx'.date('ymd'). '-'. substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

    $post = $this->input->post(null, TRUE);

    $this->upload->do_upload('image');
    $post['image'] = $this->upload->data('file_name');
    // print_r($post);
    // die;
    
    $this->tagihan_model->transfer($post);

    if($this->db->affected_rows()){
      echo
        "<script>
          alert('Pembayaran berhasil, menunggu konfirmasi');
          window.location = '".site_url('customer/tagihan/tungguKonfirm')."'
        </script>";
    }
    else{
      echo
        "<script>
          alert('Pembayaran gagal!');
          window.location = '".site_url('customer/tagihan/belumBayar')."'
        </script>";
    }
  }

  public function tolak(){
    $id = $this->session->userdata('user_id');
    $data['tagihan'] = $this->tagihan_model->get_user_ditolak($id)->result();
    // print_r($data['tagihan']);
    // die;
    $this->load->view('customer/templates/header');
    $this->load->view('customer/tagihan/ditolak', $data);
    $this->load->view('customer/templates/footer');
  }

  public function bayar2($id){
    $data['tagihan'] = $this->tagihan_model->get_belum_bayar($id)->row();
    $this->load->view('customer/templates/header');
    $this->load->view('customer/tagihan/bayar2', $data);
    $this->load->view('customer/templates/footer');
  }


}