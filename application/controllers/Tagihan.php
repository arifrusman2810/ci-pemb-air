<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan extends CI_Controller {

  function __construct(){
    parent::__construct();
    check_not_login();
    $this->load->model('tagihan_model');
  }

  public function belumBayar(){
    $data['tagihan'] = $this->tagihan_model->get_belum_bayar()->result();
    print_r($data['tagihan']);
    die;
    $this->load->view('templates/header');
    $this->load->view('tagihan/index', $data);
    $this->load->view('templates/footer');
  }







}