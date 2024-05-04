<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_model extends CI_Model {

  public function get($id = null){
    $this->db->select('*');
    $this->db->from('tb_layanan');
    if($id != null){
      $this->db->where('id_layanan', $id);
    }
    return $this->db->get();
  }

  public function add($post){
    $params = array(
      'layanan' => $post['layanan'],
      'tarif'   => $post['tarif'],
    );
    $this->db->insert('tb_layanan', $params);
  }

  public function edit($post){
    $id = $post['id'];
    $params = array(
      'layanan' => $post['layanan'],
      'tarif'   => $post['tarif'],
    );
    $this->db->where('id_layanan', $id);
    $this->db->update('tb_layanan', $params);
  }





}