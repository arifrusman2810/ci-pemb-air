<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

  public function get($id = null){
    $this->db->select('tb_pelanggan.*, tb_layanan.layanan');
    $this->db->from('tb_pelanggan');
    $this->db->join('tb_layanan', 'tb_pelanggan.id_layanan = tb_layanan.id_layanan');
    if($id != null){
      $this->db->where('id_pelanggan', $id);
    }
    return $this->db->get();
  }

  public function set_nonAktif($id){
    $this->db->where('id_pelanggan', $id);
    $this->db->update('tb_pelanggan', ['status' => 'Tidak Aktif']);
    return TRUE;
  }
  
  public function set_Aktif($id){
    $this->db->where('id_pelanggan', $id);
    $this->db->update('tb_pelanggan', ['status' => 'Aktif']);
    return TRUE;
  }

  public function add($post){
    $params = array(
      'id_pelanggan'   => $post['id'],
      'nama_pelanggan' => $post['name'],
      'alamat'         => $post['alamat'],
      'no_hp'          => $post['phone'],
      'status'         => 'Aktif',
      'id_layanan'     => $post['layanan']
    );
    $this->db->insert('tb_pelanggan', $params);
  }

  public function edit($post){
    $params = array(
      'id_pelanggan'   => $post['id'],
      'nama_pelanggan' => $post['name'],
      'alamat'         => $post['alamat'],
      'no_hp'          => $post['phone'],
      'status'         => 'Aktif',
      'id_layanan'     => $post['layanan']
    );
    $id = $post['id'];
    $this->db->where('id_pelanggan', $id);
    $this->db->update('tb_pelanggan', $params);
  }

  public function delete($id){
    $this->db->where('id_pelanggan', $id);
    $this->db->delete('tb_pelanggan');
  }





}       