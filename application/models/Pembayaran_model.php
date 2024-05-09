<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model {

  public function bayar($post){
    $params = array(
      'id_tagihan' => $post['id_tagihan'],
      'tgl_bayar'  => date("Y-m-d"),
      'uang_bayar' => $post['bayar'],
      'kembali'    => $post['kembali'],
    );
    $this->db->insert('tb_pembayaran', $params);
    $id = $post['id_tagihan'];
    $this->db->update('tb_tagihan', ['status' => 'Lunas'], ['id_tagihan' => $id]);
  }
  
  public function konfirm($post){
    $params = array(
      'id_tagihan' => $post['id_tagihan'],
      'tgl_bayar'  => date("Y-m-d"),
      'uang_bayar' => $post['tagih'],
      'kembali'    => 0,
    );
    $this->db->insert('tb_pembayaran', $params);
    $id = $post['id_tagihan'];
    $this->db->update('tb_tagihan', ['status' => 'Lunas'], ['id_tagihan' => $id]);
  }


}