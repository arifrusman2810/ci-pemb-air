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
    // echo $post['status'];
    // die;
    $params = array(
      'id_tagihan' => $post['id_tagihan'],
      'tgl_bayar'  => date("Y-m-d"),
      'uang_bayar' => $post['tagih'],
      'kembali'    => 0,
    );

    $params2 = array(
      'status'     => $post['status'],
      'keterangan' => $post['keterangan']
    );

    $id = $post['id_tagihan'];


    if($post['status'] == 'Tolak'){
      $this->db->update('tb_tagihan', $params2, ['id_tagihan' => $id]);
    }
    elseif($post['status'] == 'Lunas'){
      $this->db->insert('tb_pembayaran', $params);
      $this->db->update('tb_tagihan', $params2, ['id_tagihan' => $id]);
    }
    
  }


}