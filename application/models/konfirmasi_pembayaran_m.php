<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasi_pembayaran_m extends CI_Model 
{	
	public function insert_konfirmasi_pembayaran($values)
	{
		return $this->db->insert('konfirmasi_pembayaran', $values);
	}

	public function get_konfirmasi_by_idp($id_pemesanan){
		$this->db->where('id_pemesanan', $id_pemesanan);
		$query = $this->db->get('konfirmasi_pembayaran');
		$result = $query->row_array();
		return $result;
	}

	public function update_konfirmasi_pembayaran($values, $row_id){
    $this->db->where('id_pemesanan', $row_id);
    return $this->db->update('konfirmasi_pembayaran', $values);
  }
	
}