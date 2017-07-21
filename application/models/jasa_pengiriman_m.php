<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Jasa_pengiriman_m extends CI_Model 
{
	public function get_jasa_pengiriman()
	{
		$this->db->select('*');
		$this->db->from('jasa_pengiriman');
		$this->db->order_by('id_jasa_pengiriman', 'desc');
		return $this->db->get()->result_array();
	}
	public function get_jasa_pengiriman_by_id($id_jasa_pengiriman)
	{
		$this->db->where('id_jasa_pengiriman', $id_jasa_pengiriman);
		return $this->db->get('jasa_pengiriman')->row_array();
	}
  public function cek_nama($nama_jasa_pengiriman)
  {
    $this->db->where('nama_jasa_pengiriman',$nama_jasa_pengiriman);
    $query = $this->db->get('jasa_pengiriman');

    if($query->num_rows() > 0){
      return false;
    }else{
      return true;
    }
  }
	
	public function insert_jasa_pengiriman($values)
	{
		return $this->db->insert('jasa_pengiriman', $values);
	}

	public function update_jasa_pengiriman($values, $row_id)
	{
		$this->db->where('id_jasa_pengiriman', $row_id);
    return $this->db->update('jasa_pengiriman', $values);
	}

	public function delete_jasa_pengiriman($id_jasa_pengiriman)
	{
		$this->db->where('id_jasa_pengiriman', $id_jasa_pengiriman);
    $this->db->delete('jasa_pengiriman');
	}
	
}