<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model(['pelanggan_model', 'tagihan_model']);
  }

  public function index(){
    check_not_login();
    $data['jml_pelanggan'] = $this->pelanggan_model->get()->num_rows();
    $data['jml_tagihan'] = $this->tagihan_model->get_tagihan()->num_rows();
    $data['jml_lunas'] = $this->tagihan_model->get_lunas()->num_rows();
    $data['jml_belumBayar'] = $this->tagihan_model->get_belum_bayar()->num_rows();
    $this->load->view('templates/header');
    $this->load->view('dashboard', $data);
    $this->load->view('templates/footer');
  }





}