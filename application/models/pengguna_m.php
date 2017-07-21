<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_m extends CI_Model {

	public function validate_login() 
	{
		$this->db->select('*');
   	$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$this->db->where('status',1);
		$query = $this->db->get('pengguna');

		if($query->num_rows() == 1)
		{
			return $query->row_array();
		} 
		else 
		{
			return "";
		}
  }

  public function get_pengguna($grup = NULL) 
  {
   	$this->db->select('*');
   	$this->db->select("TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) AS umur");
		$this->db->from('pengguna');
		if($grup != NULL){
			$this->db->where('grup', $grup);
		}
		$this->db->order_by('id_pengguna', 'desc');
    $query = $this->db->get();
    $result = $query->result_array();

    return $result;
  }

	public function get_pengguna_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('pengguna');
    $this->db->where('id_pengguna', $id);
    $query = $this->db->get();
    $result = $query->row_array();


    return $result;
	}

	public function cek_username($username)
  {
    $this->db->where('username',$username);
    $query = $this->db->get('pengguna');

    if($query->num_rows() > 0){
      return false;
    }else{
      return true;
    }
  }

  public function cek_email($email)
  {
    $this->db->where('email',$email);
    $query = $this->db->get('pengguna');

    if($query->num_rows() > 0){
      return false;
    }else{
      return true;
    }
  }
  public function cek_no_hp($no_hp)
  {
    $this->db->where('no_hp',$no_hp);
    $query = $this->db->get('pengguna');

    if($query->num_rows() > 0){
      return false;
    }else{
      return true;
    }
  }
	
	public function count_all_pengguna()
	{
		return $this->db->count_all('pengguna');
	}
	
	public function insert_pengguna($values)
	{
		return $this->db->insert('pengguna', $values);
	}

	public function update_pengguna($values, $row_id)
	{
		$array = array('id_pengguna
			' => $row_id);
		$this->db->where($array);
    return $this->db->update('pengguna', $values);
	}

	public function delete_pengguna($id)
	{
		$this->db->where('id_pengguna
			', $id);
    $this->db->delete('pengguna');
	}
	
}