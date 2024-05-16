<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemakaian extends CI_Controller {

  function __construct(){
    parent::__construct();
    check_not_login();
    $this->load->model(['pemakaian_model', 'pelanggan_model']);
  }

  public function index(){
    $data['pemakaian'] = $this->pemakaian_model->get()->result();
    // print_r($data['pemakaian']);
    // die;
    $this->load->view('templates/header');
    $this->load->view('pemakaian/index', $data);
    $this->load->view('templates/footer');
  }

  public function add(){
    // $data['id_pemakaian'] = $this->pemakaian_model->no_pemakaian();
    $data['pelanggan'] = $this->pelanggan_model->get()->result();
    $data['bulan'] = $this->pemakaian_model->get_bulan()->result();
    $this->load->view('templates/header');
    $this->load->view('pemakaian/add', $data);
    $this->load->view('templates/footer');
  }

  public function addProcess(){
    $post = $this->input->post(null, TRUE);
    $this->pemakaian_model->add($post);
    // print_r($post);
    // die;
    if($this->db->affected_rows()){
      echo
        "<script>
          alert('Data berhasil ditambahkan');
          window.location = '".site_url('pemakaian')."'
        </script>";
    }
    else{
      echo
        "<script>
          alert('Gagal tambah data!');
          window.location = '".site_url('pemakaian/add')."'
        </script>";
    }
  }

  public function edit($id){
    $data['pemakaian'] = $this->pemakaian_model->get($id)->row();
    $data['pelanggan'] = $this->pelanggan_model->get()->result();
    $data['bulan'] = $this->pemakaian_model->get_bulan()->result();
    // print_r($data['pemakaian']);
    // die;
    $this->load->view('templates/header');
    $this->load->view('pemakaian/edit', $data);
    $this->load->view('templates/footer');
  }

  public function delete($id){
    $this->pemakaian_model->delete($id);
    if($this->db->affected_rows()){
      echo
        "<script>
          alert('Data berhasil dihapus');
          window.location = '".site_url('pemakaian')."'
        </script>";
    }
    else{
      echo
        "<script>
          alert('Gagal hapus data!');
          window.location = '".site_url('pemakaian')."'
        </script>";
    }
  }

  public function getAwal(){
    $id = $this->input->post('id_pelanggan');
    $query = $this->db->query("SELECT MAX(akhir) AS awal FROM tb_pakai WHERE id_pelanggan = '$id'");
    $result = $query->row();
    if(empty($result->awal)){
      echo 0;
    }
    else{
      echo $result->awal;
    }
  }

  public function getTarif(){
    $id = $this->input->post('id_pelanggan');
    $query = $this->db->query("SELECT tarif FROM tb_layanan INNER JOIN tb_pelanggan ON tb_pelanggan.id_layanan = tb_layanan.id_layanan WHERE tb_pelanggan.id_pelanggan = '$id'");
    $result = $query->row();
    echo $result->tarif;
  }




}