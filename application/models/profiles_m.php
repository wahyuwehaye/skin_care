<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Profiles_m extends CI_Model 
{
  public function cek_no_telp($no_telp)
  {
    $this->db->where('no_telp',$no_telp);
    $query = $this->db->get('profiles');

    if($query->num_rows() > 0){
      return false;
    }else{
      return true;
    }
  }
	
	public function insert_profile($values)
	{
		//$values['password'] = md5($this->input->post('password'));
		return $this->db->insert('profiles', $values);
	}

	public function update_profile($values, $row_user_id)
	{
		$array = array('user_id' => $row_user_id);
		$this->db->where($array);
    return $this->db->update('profiles', $values);
	}

	public function delete_profile($user_id)
	{
		$this->db->where('user_id', $user_id);
    $this->db->delete('profiles');
	}
	
}