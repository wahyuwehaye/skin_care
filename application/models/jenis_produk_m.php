<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_produk_m extends CI_Model 
{
	public function get_jenis_produk()
	{
		$this->db->select('*');
		$this->db->from('jenis_produk');
		$this->db->order_by('id_jenis_produk', 'desc');
		return $this->db->get()->result_array();
	}
	public function get_jenis_produk_by_id($id_jenis_produk)
	{
		$this->db->where('id_jenis_produk', $id_jenis_produk);
		return $this->db->get('jenis_produk')->row_array();
	}
  public function cek_nama($nama_jenis_produk)
  {
    $this->db->where('nama_jenis_produk',$nama_jenis_produk);
    $query = $this->db->get('jenis_produk');

    if($query->num_rows() > 0){
      return false;
    }else{
      return true;
    }
  }
	
	public function insert_jenis_produk($values)
	{
		return $this->db->insert('jenis_produk', $values);
	}

	public function update_jenis_produk($values, $row_id)
	{
		$this->db->where('id_jenis_produk', $row_id);
    return $this->db->update('jenis_produk', $values);
	}

	public function delete_jenis_produk($id_jenis_produk)
	{
		$this->db->where('id_jenis_produk', $id_jenis_produk);
    $this->db->delete('jenis_produk');
	}
	
}