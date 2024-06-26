<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan extends CI_Controller {

  function __construct(){
    parent::__construct();
    check_not_login();
    $this->load->model(['tagihan_model', 'pembayaran_model']);
  }

  public function belumBayar(){
    $data['tagihan'] = $this->tagihan_model->get_belum_bayar()->result();
    // print_r($data['tagihan']);
    // die;
    $this->load->view('templates/header');
    $this->load->view('tagihan/belum_bayar', $data);
    $this->load->view('templates/footer');
  }
  
  public function bayar($id){
    $data['tagihan'] = $this->tagihan_model->get_belum_bayar($id)->row();
    $id_pelanggan = $data['tagihan']->id_pelanggan;
    $data['total_refund'] = $this->tagihan_model->get_refund($id_pelanggan);
    $this->load->view('templates/header');
    $this->load->view('tagihan/bayar', $data);
    $this->load->view('templates/footer');
  }

  public function bayarProcess(){
    $post = $this->input->post(null, TRUE);
    // print_r($post);
    // die;
    $this->pembayaran_model->bayar($post);

    if($this->db->affected_rows()){
      echo
        "<script>
          alert('Pembayaran berhasil');
          window.location = '".site_url('tagihan/lunas')."'
        </script>";
    }
    else{
      echo
        "<script>
          alert('Pembayaran gagal!');
          window.location = '".site_url('tagihan/belumBayar')."'
        </script>";
    }
  }

  public function lunas(){
    $data['tagihan'] = $this->tagihan_model->get_lunas()->result();
    $this->load->view('templates/header');
    $this->load->view('tagihan/lunas', $data);
    $this->load->view('templates/footer');
  }
  
  public function tungguKonfirm(){
    $data['tagihan'] = $this->tagihan_model->get_tunggu_konfirm()->result();
    $this->load->view('templates/header');
    $this->load->view('tagihan/tunggu_konfirm', $data);
    $this->load->view('templates/footer');
  }

  public function konfirm($id){
    $id_pelanggan = $this->input->get('id_pelanggan');
    // echo $id_pelanggan;
    // die;
    $data['tagihan'] = $this->tagihan_model->get_tunggu_konfirm($id)->row();
    $data['total_refund'] = $this->tagihan_model->get_refund($id_pelanggan);

    $this->load->view('templates/header');
    $this->load->view('tagihan/konfirm', $data);
    $this->load->view('templates/footer');
  }

  public function konfirmProcess(){
    $post = $this->input->post(null, TRUE);
    $id_pelanggan = $post['id_pelanggan'];
    // echo $id_pelanggan;
    // die;

    // Mereset refund menjadi 0
    $this->tagihan_model->reset_refund($id_pelanggan);

    $this->pembayaran_model->konfirm($post);

    if($this->db->affected_rows() && $post['status'] == 'Lunas'){
      echo
        "<script>
          alert('Konfirmasi pembayaran berhasil');
          window.location = '".site_url('tagihan/lunas')."'
        </script>";
    }
    elseif($this->db->affected_rows() && $post['status'] == 'Tolak'){
      echo
        "<script>
          alert('Konfirmasi pembayaran ditolak');
          window.location = '".site_url('tagihan/tolak')."'
        </script>";
    }
    else{
      echo
        "<script>
          alert('Konfirmasi gagal!');
          window.location = '".site_url('tagihan/tungguKonfirm')."'
        </script>";
    }
  }

  public function tolak(){
    $data['tagihan'] = $this->tagihan_model->get_ditolak()->result();
    $this->load->view('templates/header');
    $this->load->view('tagihan/ditolak', $data);
    $this->load->view('templates/footer');
  }

  public function detailTolak($id){
    $data['tagihan'] = $this->tagihan_model->get_ditolak($id)->row();
    $this->load->view('templates/header');
    $this->load->view('tagihan/detail_tolak', $data);
    $this->load->view('templates/footer');
  }


}