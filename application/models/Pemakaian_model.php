<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemakaian_model extends CI_Model {

  // public function no_pemakaian(){
  //   $query = $this->db->query("SELECT MAX(MID(id_pakai,9,4)) AS no_pemakaian FROM tb_pakai WHERE MID(id_pakai,3,6) = DATE_FORMAT(CURDATE(), '%y%m%d') ");

  //   if($query->num_rows() > 0){
  //     $row = $query->row();
  //     $n = ((int)$row->no_pemakaian) + 1;
  //     $no = sprintf("%'. 04d", $n);
  //   }
  //   else{
  //     $no = '0001';
  //   }

  //   $pemakaian = "TR".date('ymd').$no;
  //   return $pemakaian;
  // }

  public function get($id = null){
    $this->db->select('tb_pelanggan.id_pelanggan, tb_pelanggan.nama_pelanggan, tb_pakai.id_pakai, tb_pakai.tahun, tb_pakai.awal, tb_pakai.akhir, tb_bulan.id_bulan, tb_bulan.nama_bulan, tb_tagihan.status');
    $this->db->from('tb_pelanggan');
    $this->db->join('tb_pakai', 'tb_pelanggan.id_pelanggan = tb_pakai.id_pelanggan');
    $this->db->join('tb_tagihan', 'tb_pakai.id_pakai = tb_tagihan.id_pakai');
    $this->db->join('tb_bulan', 'tb_pakai.bulan = tb_bulan.id_bulan');
    if($id != null){
      $this->db->where('tb_pakai.id_pakai', $id);
    }
    $this->db->order_by('tb_bulan.id_bulan', 'DESC');
    return $this->db->get();
  }

  public function add($post){
    $params = array(
      'id_pelanggan' => $post['pelanggan'],
      'bulan'        => $post['bulan'],
      'tahun'        => $post['tahun'],
      'awal'         => $post['awal'],
      'akhir'        => $post['akhir'],
      'pakai'        => $post['total'],
    );
    $this->db->insert('tb_pakai', $params);

    // Mengambil id_pakai yang baru saja dimasukkan
    $id_pakai = $this->db->insert_id();
    return $id_pakai;
  }

  public function add_tagihan($id, $harga){
    $params = array(
      'id_pakai' => $id,
      'tagihan'  => $harga
    );
    $this->db->insert('tb_tagihan', $params);
  }

  public function delete($id){
    $this->db->delete('tb_pakai', ['id_pakai' => $id]);
    $this->db->delete('tb_tagihan', ['id_pakai' => $id]);
  }

  public function get_bulan(){
    $this->db->select('*');
    $this->db->from('tb_bulan');
    return $this->db->get();
  }





}