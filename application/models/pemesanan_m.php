<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan_m extends CI_Model 
{	
  public function get_pemesanan(){
    $this->db->select('p.*, pp.*, count(dp.id_pemesanan) as jml_barang, jp.nama_jasa_pengiriman');
    $this->db->from('pemesanan p');
    $this->db->join('detail_pemesanan dp','dp.id_pemesanan = p.id_pemesanan');
    $this->db->join('paket_pengiriman pp','pp.id_paket_pengiriman = p.paket_pengiriman');
    $this->db->join('jasa_pengiriman jp','pp.id_jasa_pengiriman = jp.id_jasa_pengiriman');
    if($this->session->userdata('grup') == 'konsumen'){
      $this->db->where('id_konsumen', $this->session->userdata('id_pengguna')); 
    }
    $this->db->group_by('dp.id_pemesanan');
    $this->db->order_by('p.id_pemesanan','desc');
    $query = $this->db->get();
    $result= $query->result_array();

    return $result;
  }
  public function get_pembayaran(){
    $this->db->select('p.*, pp.*, count(dp.id_pemesanan) as jml_barang, jp.nama_jasa_pengiriman, kp.status_konfirmasi');
    $this->db->from('pemesanan p');
    $this->db->join('detail_pemesanan dp','dp.id_pemesanan = p.id_pemesanan');
    $this->db->join('paket_pengiriman pp','pp.id_paket_pengiriman = p.paket_pengiriman');
    $this->db->join('jasa_pengiriman jp','pp.id_jasa_pengiriman = jp.id_jasa_pengiriman');
    $this->db->join('konfirmasi_pembayaran kp','kp.id_pemesanan = p.id_pemesanan','left');
    if($this->session->userdata('grup') == 'konsumen'){
      $this->db->where('id_konsumen', $this->session->userdata('id_pengguna')); 
    }
    if($this->input->get('f-id_pemesanan')){
      $this->db->where('p.id_pemesanan',$this->input->get('f-id_pemesanan'));
    }
    $this->db->group_by('dp.id_pemesanan');
    $this->db->order_by('p.id_pemesanan','desc');
    $query = $this->db->get();
    $result= $query->result_array();

    return $result;
  }

  public function get_pengiriman(){
    $this->db->select('p.*, pp.*, count(dp.id_pemesanan) as jml_barang, jp.nama_jasa_pengiriman, kp.status_konfirmasi');
    $this->db->from('pemesanan p');
    $this->db->join('detail_pemesanan dp','dp.id_pemesanan = p.id_pemesanan');
    $this->db->join('paket_pengiriman pp','pp.id_paket_pengiriman = p.paket_pengiriman');
    $this->db->join('jasa_pengiriman jp','pp.id_jasa_pengiriman = jp.id_jasa_pengiriman');
    $this->db->join('konfirmasi_pembayaran kp','kp.id_pemesanan = p.id_pemesanan','left');
    if($this->session->userdata('grup') == 'konsumen'){
      $this->db->where('id_konsumen', $this->session->userdata('id_pengguna')); 
    }
    if($this->input->get('f-id_pemesanan')){
      $this->db->where('p.id_pemesanan',$this->input->get('f-id_pemesanan'));
    }
    $this->db->where('p.status_pembayaran', 'Diterima');
    $this->db->group_by('dp.id_pemesanan');
    $this->db->order_by('p.id_pemesanan','desc');
    $query = $this->db->get();
    $result= $query->result_array();

    return $result;
  }

  public function get_pemesanan_by_id($id_pemesanan){
    $this->db->select('p.*, pp.*, count(dp.id_pemesanan) as jml_barang, sum(dp.harga) as total, jp.nama_jasa_pengiriman');
    $this->db->from('pemesanan p');
    $this->db->join('detail_pemesanan dp','dp.id_pemesanan = p.id_pemesanan');
    $this->db->join('paket_pengiriman pp','pp.id_paket_pengiriman = p.paket_pengiriman');
    $this->db->join('jasa_pengiriman jp','pp.id_jasa_pengiriman = jp.id_jasa_pengiriman');
    if($this->session->userdata('grup') == 'konsumen'){
      $this->db->where('id_konsumen', $this->session->userdata('id_pengguna')); 
    }
    $this->db->where('p.id_pemesanan',$id_pemesanan);
    $this->db->group_by('dp.id_pemesanan');
    $this->db->order_by('p.id_pemesanan','desc');
    $query = $this->db->get();
    $result= $query->row_array();

    return $result;
  }

  public function get_detail_pemesanan($id_pemesanan){
    $this->db->select('dp.*, p.gambar, jp.nama_jenis_produk');
    $this->db->from('produk p');
    $this->db->join('detail_pemesanan dp','dp.kd_produk = p.kd_produk');
    $this->db->join('jenis_produk jp','jp.id_jenis_produk = p.id_jenis_produk');
    $this->db->where('dp.id_pemesanan', $id_pemesanan);
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }

	public function insert_pemesanan($values)
	{
		return $this->db->insert('pemesanan', $values);
	}

  public function insert_detail_pemesanan($values)
  {
    return $this->db->insert_batch('detail_pemesanan', $values);
  }
	
  public function update_pemesanan($values, $row_id){
    $this->db->where('id_pemesanan', $row_id);
    return $this->db->update('pemesanan', $values);
  }
}