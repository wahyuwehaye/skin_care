<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsultasi_m extends CI_Model 
{	
  public function get_konsultasi(){
    $this->db->select('*');
    $this->db->from('konsultasi');
    // if($this->session->userdata('grup') == 'konsumen'){
    //   $this->db->where('no_konsultasi', $this->session->userdata('id_pengguna')); 
    // }
    $this->db->order_by('no_konsultasi','DESC');
    $query = $this->db->get();
    $result= $query->result_array();

    return $result;
  }

  public function get_forumkonsultasi(){
    $id=$this->uri->segment(3, 0);
    $this->db->select('*');
    $this->db->from('forum_konsultasi');
    // if($this->session->userdata('grup') == 'konsumen'){
    //   $this->db->where('no_konsultasi', $this->session->userdata('id_pengguna')); 
    // }
    $this->db->where('no_konsultasi',$id);
    $query = $this->db->get();
    $result= $query->result_array();

    return $result;
  }

  public function get_konsultasi_by_id($no_konsultasi){
    $this->db->select('*');
    $this->db->from('konsultasi');
    // if($this->session->userdata('grup') == 'konsumen'){
    //   $this->db->where('no_konsultasi', $this->session->userdata('id_pengguna')); 
    // }
    $this->db->where('no_konsultasi',$no_konsultasi);
    $query = $this->db->get();
    $result= $query->row_array();

    return $result;
  }

  public function get_forum_konsultasi($no_konsultasi){
    $this->db->select('dp.*, p.gambar, jp.nama_jenis_produk');
    $this->db->from('produk p');
    $this->db->join('forum_konsultasi dp','dp.kd_produk = p.kd_produk');
    $this->db->join('jenis_produk jp','jp.id_jenis_produk = p.id_jenis_produk');
    $this->db->where('dp.no_konsultasi', $no_konsultasi);
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }

	public function insert_konsultasi($values)
	{
		return $this->db->insert('konsultasi', $values);
	}

  public function insert_forum_konsultasi($values)
  {
    return $this->db->insert('forum_konsultasi', $values);
  }

  public function insert_notifikasi($values)
  {
    return $this->db->insert('notifikasi', $values);
  }
}