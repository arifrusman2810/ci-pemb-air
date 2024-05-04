<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

  function __construct(){
    parent::__construct();
    check_not_login();
    $this->load->model(['pelanggan_model', 'layanan_model']);
  }

  public function index(){
    $data['pelanggan'] = $this->pelanggan_model->get()->result();
    $this->load->view('templates/header');
    $this->load->view('pelanggan/index', $data);
    $this->load->view('templates/footer');
  }

  public function set_nonAktif($id){
    $result = $this->pelanggan_model->set_nonAktif($id);

    if($result = TRUE){
      echo
      "<script>
        alert('Status berhasil diubah');
        window.location = '" .site_url('pelanggan'). "'
      </script>";
    }
  }
  
  public function set_Aktif($id){
    $result = $this->pelanggan_model->set_Aktif($id);

    if($result = TRUE){
      echo
      "<script>
        alert('Status berhasil diubah');
        window.location = '" .site_url('pelanggan'). "'
      </script>";
    }
  }

  public function add(){
    $data['layanan'] = $this->layanan_model->get()->result();
    $this->load->view('templates/header');
    $this->load->view('pelanggan/add', $data);
    $this->load->view('templates/footer');
  }

  public function addProcess(){
    $post = $this->input->post(null, TRUE);
    $this->pelanggan_model->add($post);

    if($this->db->affected_rows()){
      echo
        "<script>
          alert('Data berhasil ditambahkan');
          window.location = '".site_url('pelanggan')."'
        </script>";
    }
    else{
      echo
        "<script>
          alert('Gagal tambah data!');
          window.location = '".site_url('pelanggan/add')."'
        </script>";
    }
  }

  public function edit($id){
    $data['pelanggan'] = $this->pelanggan_model->get($id)->row();
    $data['layanan'] = $this->layanan_model->get()->result();
    $this->load->view('templates/header');
    $this->load->view('pelanggan/edit', $data);
    $this->load->view('templates/footer');
  }

  public function editProcess(){
    $post = $this->input->post(null, TRUE);
    $id = $post['id'];
    // print_r($post);
    // die;
    $this->pelanggan_model->edit($post);

    if($this->db->affected_rows()){
      echo
        "<script>
          alert('Data berhasil diubah');
          window.location = '".site_url('pelanggan')."'
        </script>";
    }
    else{
      echo
        "<script>
          alert('Gagal ubah data!');
          window.location = '".site_url('pelanggan/edit/$id')."'
        </script>";
    }
  }

  public function delete($id){
    $this->pelanggan_model->delete($id);

    if($this->db->affected_rows()){
      echo
        "<script>
          alert('Data berhasil dihapus');
          window.location = '".site_url('pelanggan')."'
        </script>";
    }
    else{
      echo
        "<script>
          alert('Gagal hapus data!');
          window.location = '".site_url('pelanggan')."'
        </script>";
    }
  }




}