<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {

  function __construct(){
    parent::__construct();
    check_not_login();
    $this->load->model('layanan_model');
  }

  public function index(){
    $data['layanan'] = $this->layanan_model->get()->result();
    $this->load->view('templates/header');
    $this->load->view('layanan/index', $data);
    $this->load->view('templates/footer');
  }

  public function add(){
    $this->load->view('templates/header');
    $this->load->view('layanan/add');
    $this->load->view('templates/footer');
  }

  public function addProcess(){
    $post = $this->input->post(null, TRUE);
    $this->layanan_model->add($post);

    if($this->db->affected_rows()){
      echo
        "<script>
          alert('Data berhasil ditambahkan');
          window.location = '".site_url('layanan')."'
        </script>";
    }
    else{
      echo
        "<script>
          alert('Gagal tambah data!');
          window.location = '".site_url('layanan/add')."'
        </script>";
    }
  }

  public function edit($id){
    $data['layanan'] = $this->layanan_model->get($id)->row();
    $this->load->view('templates/header');
    $this->load->view('layanan/edit', $data);
    $this->load->view('templates/footer');
  }

  public function editProcess(){
    $post = $this->input->post(null, TRUE);
    $id = $post['id'];
    // print_r($post);
    // die;
    $this->layanan_model->edit($post);

    if($this->db->affected_rows()){
      echo
        "<script>
          alert('Data berhasil diubah');
          window.location = '".site_url('layanan')."'
        </script>";
    }
    else{
      echo
        "<script>
          alert('Gagal ubah data!');
          window.location = '".site_url('layanan/edit/$id')."'
        </script>";
    }
  }

  public function delete($id){
    $this->db->delete('tb_layanan', ['id_layanan' => $id]);

    if($this->db->affected_rows()){
      echo
        "<script>
          alert('Data berhasil dihapus');
          window.location = '".site_url('layanan')."'
        </script>";
    }
    else{
      echo
        "<script>
          alert('Gagal hapus data!');
          window.location = '".site_url('layanan')."'
        </script>";
    }
  }




}