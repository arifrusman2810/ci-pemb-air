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
    // print_r($data['tagihan']);
    $this->load->view('laporan/cetak_pembayaran', $data);
  }


}