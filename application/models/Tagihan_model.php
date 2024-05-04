<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan_model extends CI_Model {

  public function get_belum_bayar(){
    $this->db->select('tb_pelanggan.id_pelanggan, tb_pelanggan.nama_pelanggan, tb_tagihan.id_tagihan, tb_tagihan.tagihan, tb_tagihan.status, tb_pakai.tahun, tb_pakai.pakai, tb_bulan.nama_bulan');
    $this->db->from('tb_pelanggan');
    $this->db->join('tb_pakai', 'tb_pakai.id_pelanggan = tb_pelanggan.id_pelanggan');
    $this->db->join('tb_tagihan', 'tb_tagihan.id_pakai = tb_pakai.id_pakai');
    $this->db->join('tb_bulan', 'tb_bulan.id_bulan = tb_pakai.bulan');
    $this->db->where('tb_tagihan.status', 'Belum Bayar');
    $this->db->order_by('tahun', 'ASC');
    $this->db->order_by('id_bulan', 'ASC');
    return $this->db->get();
  }






}