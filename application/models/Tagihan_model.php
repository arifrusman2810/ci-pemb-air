<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan_model extends CI_Model {

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
    $this->db->select('tb_pelanggan.id_pelanggan, tb_pelanggan.nama_pelanggan, tb_tagihan.id_tagihan, tb_tagihan.tagihan, tb_tagihan.status, tb_pakai.tahun, tb_pakai.pakai, tb_bulan.nama_bulan');
    $this->db->from('tb_pelanggan');
    $this->db->join('tb_pakai', 'tb_pakai.id_pelanggan = tb_pelanggan.id_pelanggan');
    $this->db->join('tb_tagihan', 'tb_tagihan.id_pakai = tb_pakai.id_pakai');
    $this->db->join('tb_bulan', 'tb_bulan.id_bulan = tb_pakai.bulan');
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
    $this->db->select('tb_pelanggan.id_pelanggan, tb_pelanggan.nama_pelanggan, tb_tagihan.id_tagihan, tb_tagihan.tagihan, tb_tagihan.status, tb_pakai.tahun, tb_pakai.pakai, tb_bulan.nama_bulan, tb_pembayaran.tgl_bayar');
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





}