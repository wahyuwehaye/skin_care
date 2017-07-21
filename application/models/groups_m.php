<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Groups_m extends CI_Model {

	public function get_groups() 
	{
		$this->db->order_by('id','ASC');
		$result = $this->db->get('groups');
		return $result->result_array();
	}

	function get_name_by_id($id){
		$this->db->select('*');
		$this->db->where('id',$id);
		$query = $this->db->get('groups');
		$result = $query->row_array();
		
    return $result['description'];
  }
}