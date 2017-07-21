<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class produk_m extends CI_Model 
{
	public function get_produk()
	{
		$this->db->select('*, j.nama_jenis_produk as jenis_produk');
    $this->db->from('produk b');
		$this->db->join('jenis_produk j','j.id_jenis_produk = b.id_jenis_produk','left');
		$this->db->order_by('kd_produk', 'desc');
		return $this->db->get()->result_array();
	}
	public function get_produk_by_id($kd_produk)
	{
    $this->db->select('*, j.nama_jenis_produk as jenis_produk');
    $this->db->from('produk b');
    $this->db->join('jenis_produk j','j.id_jenis_produk = b.id_jenis_produk','left');
		$this->db->where('b.kd_produk', $kd_produk);
		return $this->db->get()->row_array();
	}
  public function cek_kode($kd_produk)
  {
    $this->db->where('kd_produk',$kd_produk);
    $query = $this->db->get('produk');

    if($query->num_rows() > 0){
      return false;
    }else{
      return true;
    }
  }
  public function cek_nama($nama_produk)
  {
    $this->db->where('nama_produk',$nama_produk);
    $query = $this->db->get('produk');

    if($query->num_rows() > 0){
      return false;
    }else{
      return true;
    }
  }

  public function get_produk_home(){
  	$this->db->limit('8');
    $this->db->order_by('kd_produk','DESC');
  	$query = $this->db->get('produk');
  	return $query->result_array();
  }
	
	public function insert_produk($values)
	{
		return $this->db->insert('produk', $values);
	}

	public function update_produk($values, $row_id)
	{
		$this->db->where('kd_produk', $row_id);
    return $this->db->update('produk', $values);
	}

	public function delete_produk($kd_produk)
	{
		$this->db->where('kd_produk', $kd_produk);
    $this->db->delete('produk');
	}
	
}