<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan_model extends CI_Model {

  public function get_tagihan(){
    $this->db->select('*');
    $this->db->from('tb_tagihan');
    return $this->db->get();
  }

  public function get_pembayaran($id){
    $this->db->select('tb_pelanggan.id_pelanggan, tb_pelanggan.nama_pelanggan, tb_tagihan.id_tagihan, tb_tagihan.tagihan, tb_tagihan.status, tb_pakai.bulan, tb_pakai.tahun, tb_pakai.pakai, tb_bulan.nama_bulan, tb_pembayaran.tgl_bayar, tb_pembayaran.uang_bayar, tb_pembayaran.kembali');
    $this->db->from('tb_pelanggan');
    $this->db->join('tb_pakai', 'tb_pakai.id_pelanggan = tb_pelanggan.id_pelanggan');
    $this->db->join('tb_tagihan', 'tb_tagihan.id_pakai = tb_pakai.id_pakai');
    $this->db->join('tb_bulan', 'tb_bulan.id_bulan = tb_pakai.bulan');
    $this->db->join('tb_pembayaran', 'tb_pembayaran.id_tagihan = tb_tagihan.id_tagihan');
    $this->db->where('tb_tagihan.id_tagihan', $id);
    return $this->db->get();
  }
  
  public function get_belum_bayar($id = null){
    $this->db->select('tb_pelanggan.id_pelanggan, tb_pelanggan.nama_pelanggan, tb_tagihan.id_tagihan, tb_tagihan.tagihan, tb_tagihan.status, tb_pakai.id_pakai, tb_pakai.tahun, tb_pakai.pakai, tb_bulan.nama_bulan, tb_layanan.layanan');
    $this->db->from('tb_pelanggan');
    $this->db->join('tb_pakai', 'tb_pakai.id_pelanggan = tb_pelanggan.id_pelanggan');
    $this->db->join('tb_tagihan', 'tb_tagihan.id_pakai = tb_pakai.id_pakai');
    $this->db->join('tb_bulan', 'tb_bulan.id_bulan = tb_pakai.bulan');
    $this->db->join('tb_layanan', 'tb_layanan.id_layanan = tb_pelanggan.id_layanan');
    if($id != null){
      $this->db->where('tb_tagihan.id_tagihan', $id);
    }
    else{
      $this->db->where('tb_tagihan.status', 'Belum Bayar');
      $this->db->order_by('tahun', 'ASC');
      $this->db->order_by('id_bulan', 'ASC');
    }
    return $this->db->get();
  }

  public function get_lunas(){
    $this->db->select('tb_pelanggan.id_pelanggan, tb_pelanggan.nama_pelanggan, tb_tagihan.id_tagihan, tb_tagihan.tagihan, tb_tagihan.status, tb_tagihan.refund, tb_pakai.tahun, tb_pakai.pakai, tb_bulan.nama_bulan, tb_pembayaran.tgl_bayar');
    $this->db->from('tb_pelanggan');
    $this->db->join('tb_pakai', 'tb_pakai.id_pelanggan = tb_pelanggan.id_pelanggan');
    $this->db->join('tb_tagihan', 'tb_tagihan.id_pakai = tb_pakai.id_pakai');
    $this->db->join('tb_bulan', 'tb_bulan.id_bulan = tb_pakai.bulan');
    $this->db->join('tb_pembayaran', 'tb_pembayaran.id_tagihan = tb_tagihan.id_tagihan');
    $this->db->where('tb_tagihan.status', 'Lunas');
    $this->db->order_by('tahun', 'DESC');
    $this->db->order_by('id_bulan', 'ASC');
    return $this->db->get();
  }

  public function get_tunggu_konfirm($id = null){
    $this->db->select('tb_pelanggan.id_pelanggan, tb_pelanggan.nama_pelanggan, tb_tagihan.id_tagihan, tb_tagihan.tagihan, tb_tagihan.status, tb_pakai.tahun, tb_pakai.pakai, tb_bulan.nama_bulan');
    $this->db->from('tb_pelanggan');
    $this->db->join('tb_pakai', 'tb_pakai.id_pelanggan = tb_pelanggan.id_pelanggan');
    $this->db->join('tb_tagihan', 'tb_tagihan.id_pakai = tb_pakai.id_pakai');
    $this->db->join('tb_bulan', 'tb_bulan.id_bulan = tb_pakai.bulan');
    if($id != null){
      $this->db->where('tb_tagihan.id_tagihan', $id);
    }
    else{
      $this->db->where('tb_tagihan.status', 'Menunggu Konfirmasi');
      $this->db->order_by('tahun', 'ASC');
      $this->db->order_by('id_bulan', 'ASC');
    }
    return $this->db->get();
  }

  public function get_ditolak($id = null){
    $this->db->select('tb_pelanggan.id_pelanggan, tb_pelanggan.nama_pelanggan, tb_tagihan.id_tagihan, tb_tagihan.tagihan, tb_tagihan.status, tb_tagihan.keterangan, tb_pakai.id_pakai, tb_pakai.tahun, tb_pakai.pakai, tb_bulan.nama_bulan');
    $this->db->from('tb_pelanggan');
    $this->db->join('tb_pakai', 'tb_pakai.id_pelanggan = tb_pelanggan.id_pelanggan');
    $this->db->join('tb_tagihan', 'tb_tagihan.id_pakai = tb_pakai.id_pakai');
    $this->db->join('tb_bulan', 'tb_bulan.id_bulan = tb_pakai.bulan');
    if($id != null){
      $this->db->where('tb_tagihan.id_tagihan', $id);
    }
    else{
      $this->db->where('tb_tagihan.status', 'Tolak');
      $this->db->order_by('tahun', 'ASC');
      $this->db->order_by('id_bulan', 'ASC');
    }
    return $this->db->get();
  }

  public function get_lap_masuk($post){
    $tgl_awal  = $post['tgl1'];
    $tgl_akhir = $post['tgl2'];

    $this->db->select('tb_pelanggan.id_pelanggan, tb_pelanggan.nama_pelanggan, tb_tagihan.id_tagihan, tb_tagihan.tagihan, tb_tagihan.status, tb_pakai.tahun, tb_bulan.nama_bulan, tb_pembayaran.tgl_bayar');
    $this->db->from('tb_pelanggan');
    $this->db->join('tb_pakai', 'tb_pakai.id_pelanggan = tb_pelanggan.id_pelanggan');
    $this->db->join('tb_tagihan', 'tb_tagihan.id_pakai = tb_pakai.id_pakai');
    $this->db->join('tb_bulan', 'tb_bulan.id_bulan = tb_pakai.bulan');
    $this->db->join('tb_pembayaran', 'tb_pembayaran.id_tagihan = tb_tagihan.id_tagihan');
    $this->db->where('tb_tagihan.status', 'Lunas');
    $this->db->where("tb_pembayaran.tgl_bayar BETWEEN '$tgl_awal' AND '$tgl_akhir'");
    $this->db->order_by('tahun', 'DESC');
    $this->db->order_by('id_bulan', 'ASC');
    return $this->db->get();
  }


  // ================================================================================
  // Model untuk customer
  public function get_user_belum_bayar($id){
    $this->db->select('tb_pelanggan.id_pelanggan, tb_tagihan.id_tagihan, tb_tagihan.tagihan, tb_tagihan.status, tb_pakai.id_pakai, tb_pakai.tahun, tb_pakai.awal, tb_pakai.akhir, tb_pakai.pakai, tb_bulan.nama_bulan');
    $this->db->from('tb_pelanggan');
    $this->db->join('tb_pakai', 'tb_pakai.id_pelanggan = tb_pelanggan.id_pelanggan');
    $this->db->join('tb_tagihan', 'tb_tagihan.id_pakai = tb_pakai.id_pakai');
    $this->db->join('tb_bulan', 'tb_bulan.id_bulan = tb_pakai.bulan');
    $this->db->where('tb_tagihan.status', 'Belum Bayar');
    $this->db->where('tb_pelanggan.id_pelanggan', $id);
    $this->db->order_by('tahun', 'DESC');
    $this->db->order_by('id_bulan', 'DESC');
    return $this->db->get();
  }

  public function get_user_lunas($id){
    $this->db->select('tb_pelanggan.id_pelanggan, tb_pelanggan.nama_pelanggan, tb_tagihan.id_tagihan, tb_tagihan.tagihan, tb_tagihan.status, tb_tagihan.refund, tb_pakai.tahun, tb_pakai.awal, tb_pakai.akhir, tb_pakai.pakai, tb_bulan.nama_bulan, tb_pembayaran.tgl_bayar');
    $this->db->from('tb_pelanggan');
    $this->db->join('tb_pakai', 'tb_pakai.id_pelanggan = tb_pelanggan.id_pelanggan');
    $this->db->join('tb_tagihan', 'tb_tagihan.id_pakai = tb_pakai.id_pakai');
    $this->db->join('tb_bulan', 'tb_bulan.id_bulan = tb_pakai.bulan');
    $this->db->join('tb_pembayaran', 'tb_pembayaran.id_tagihan = tb_tagihan.id_tagihan');
    $this->db->where('tb_tagihan.status', 'Lunas');
    $this->db->where('tb_pelanggan.id_pelanggan', $id);
    $this->db->order_by('tahun', 'DESC');
    $this->db->order_by('id_bulan', 'DESC');
    return $this->db->get();
  }
  
  public function get_user_tungguKonfirm($id){
    $this->db->select('tb_pelanggan.id_pelanggan, tb_tagihan.id_tagihan, tb_tagihan.tagihan, tb_tagihan.status, tb_pakai.id_pakai, tb_pakai.tahun, tb_pakai.awal, tb_pakai.akhir, tb_pakai.pakai, tb_bulan.nama_bulan');
    $this->db->from('tb_pelanggan');
    $this->db->join('tb_pakai', 'tb_pakai.id_pelanggan = tb_pelanggan.id_pelanggan');
    $this->db->join('tb_tagihan', 'tb_tagihan.id_pakai = tb_pakai.id_pakai');
    $this->db->join('tb_bulan', 'tb_bulan.id_bulan = tb_pakai.bulan');
    $this->db->where('tb_tagihan.status', 'Menunggu Konfirmasi');
    $this->db->where('tb_pelanggan.id_pelanggan', $id);
    $this->db->order_by('tahun', 'DESC');
    $this->db->order_by('id_bulan', 'DESC');
    return $this->db->get();
  }

  public function get_user_ditolak($id){
    $this->db->select('tb_pelanggan.id_pelanggan, tb_tagihan.id_tagihan, tb_tagihan.tagihan, tb_tagihan.status, tb_tagihan.keterangan, tb_pakai.id_pakai, tb_pakai.tahun, tb_pakai.awal, tb_pakai.akhir, tb_pakai.pakai, tb_bulan.nama_bulan');
    $this->db->from('tb_pelanggan');
    $this->db->join('tb_pakai', 'tb_pakai.id_pelanggan = tb_pelanggan.id_pelanggan');
    $this->db->join('tb_tagihan', 'tb_tagihan.id_pakai = tb_pakai.id_pakai');
    $this->db->join('tb_bulan', 'tb_bulan.id_bulan = tb_pakai.bulan');
    $this->db->where('tb_tagihan.status', 'tolak');
    $this->db->where('tb_pelanggan.id_pelanggan', $id);
    $this->db->order_by('tahun', 'DESC');
    $this->db->order_by('id_bulan', 'DESC');
    return $this->db->get();
  }

  public function transfer($post){
    $id = $post['id_tagihan'];
    $params = array(
      'id_tagihan' => $id,
      'foto' => $post['image']
    );
    $this->db->update('tb_tagihan', ['status' => 'Menunggu Konfirmasi'], ['id_tagihan' => $id]);

    // Insert ke tb_foto
    $this->db->insert('tb_foto', $params);
  }





}