<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 

function get_profil_by_array($id_pengguna, $index)
{
	$CI =& get_instance();

	$CI->load->model('pengguna_m');
	$result =  $CI->pengguna_m->get_pengguna_by_id($id_pengguna);
	return $result[$index];
}