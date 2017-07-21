<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_pengiriman_m extends CI_Model 
{
	public function get_paket_pengiriman()
	{
		$this->db->select('*');
		$this->db->from('paket_pengiriman p');
		$this->db->join('jasa_pengiriman j','j.id_jasa_pengiriman = p.id_jasa_pengiriman');
		$this->db->order_by('id_paket_pengiriman', 'desc');
		return $this->db->get()->result_array();
	}
	public function get_paket_pengiriman_by_id($id_paket_pengiriman)
	{
		$this->db->where('id_paket_pengiriman', $id_paket_pengiriman);
		return $this->db->get('paket_pengiriman')->row_array();
	}
	
	public function insert_paket_pengiriman($values)
	{
		return $this->db->insert('paket_pengiriman', $values);
	}

	public function update_paket_pengiriman($values, $row_id)
	{
		$this->db->where('id_paket_pengiriman', $row_id);
    return $this->db->update('paket_pengiriman', $values);
	}

	public function delete_paket_pengiriman($id_paket_pengiriman)
	{
		$this->db->where('id_paket_pengiriman', $id_paket_pengiriman);
    $this->db->delete('paket_pengiriman');
	}
	
}