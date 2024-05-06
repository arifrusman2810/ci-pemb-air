<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

  function __construct(){
    parent::__construct();
    check_not_login();
    $this->load->model('tagihan_model');
  }

  public function cetak($id){
    $data['data'] = $this->tagihan_model->get_pembayaran($id)->row();
    // print_r($data['data']);
    $this->load->view('laporan/cetak_pembayaran', $data);
  }

  public function laporanMasuk(){
    $this->load->view('templates/header');
    $this->load->view('laporan/laporan_masuk');
    $this->load->view('templates/footer');
  }

  public function cetakLapMasuk(){
    $post = $this->input->post(null, TRUE);
    $data['lap_masuk'] = $this->tagihan_model->get_lap_masuk($post)->result();
    $data['dt1'] = $post['tgl1'];
    $data['dt2'] = $post['tgl2'];
    // print_r($data['data']);
    // die;
    $this->load->view('laporan/cetak_lap_masuk', $data);
  }


}