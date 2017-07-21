<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsumen extends CI_Controller {

	public function __construct()
  {
    parent::__construct();

  	$this->load->model('pengguna_m','',TRUE);
  }

  public function login(){

  	if(isset($_POST['btn-login'])){
			if($this->_cek_login()){
				if(!$this->input->get('redirect')){
					redirect('');
				}else{
					redirect($this->input->get('redirect'));
				}
			}else{
				$data['messages']['error'] = 'Gagal Login';
			}

		}

		if(isset($_POST['btn-register'])){
			if($this->_update_user('new')){
				$msg = '';
				if($this->input->get('redirect')){
					$msg = ' untuk melanjutkan pemesanan';
				}	
				$this->session->set_flashdata('success', 'Anda berhasil mendaftar, silahkan login '.$msg.'.');	
			}else{
				// $data['messages']['error'] = 'Registrasi gagal, silahkan coba kembali.';
			}
		}

    $data['page'] = 'login';
    $this->template->load('frontend', 'login_konsumen', $data);
  }


  public function _cek_login()
	{
		$this->load->helper(array('form', 'url'));

		$this->form_validation->set_rules('username', '<b>Username</b>', 'required');
		$this->form_validation->set_rules('password', '<b>Password</b>', 'required');

		$this->form_validation->set_error_delimiters('<div>', '</div>');

		$result = false;
		if ($this->form_validation->run() === true)
		{
			$query = $this->pengguna_m->validate_login();

			if($query != "")
			{
				$data = array(
					'id_pengguna' => $query['id_pengguna'],
					'username' => $query['username'],
					'grup' => $query['grup'],
					'is_logged_in' => true
				);
				$this->session->set_userdata($data);
				$result = true;
				
			}
		}
		return $result;
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect ('');
	}

	private function _update_user($method, $row_id = null)
	{

		// -------------------------------------
		// Load everything we need
		// -------------------------------------
		$this->load->helper(array('form', 'url'));
		$this->load->helper('security');

		// -------------------------------------
		// Set Values
		// -------------------------------------
		
		$values = $this->input->post();

		// -------------------------------------
		// Validation
		// -------------------------------------
		
		// Set validation rules

		$this->form_validation->set_rules('nama_lengkap', '<b>Nama Lengkap</b>', 'required');
		$this->form_validation->set_rules('tahun', '<b>Tahun</b>', 'required');
		$this->form_validation->set_rules('bulan', '<b>Bulan</b>', 'required');
		$this->form_validation->set_rules('hari', '<b>Hari</b>', 'required');

		if($method == 'edit'){

			$fields = $this->pengguna_m->get_pengguna_by_id($row_id);
			if($values['username'] == $fields['username']){
				$this->form_validation->set_rules('username', '<b>Username</b>', 'required');
			}else{
				$this->form_validation->set_rules('username', '<b>Username</b>', 'required|callback__cek_username');
			}
			$this->form_validation->set_rules('password', '<b>Password</b>', 'required');

			if($values['email'] == $fields['email']){
				$this->form_validation->set_rules('email', '<b>Email</b>', 'required|valid_email|valid_emails');
			}else{
				$this->form_validation->set_rules('email', '<b>Email</b>', 'required|valid_email|valid_emails|callback__cek_email');
			}

			if($values['no_hp'] == $fields['no_hp']){
				$this->form_validation->set_rules('no_hp', '<b>No HP</b>', 'required|is_natural|max_length[12]');
			}else{
				$this->form_validation->set_rules('no_hp', '<b>No HP</b>', 'required|is_natural|max_length[12]|callback__cek_no_hp');
			}
		}else{
			$this->form_validation->set_rules('username', '<b>Username</b>', 'required|callback__cek_username');
			$this->form_validation->set_rules('password', '<b>Password</b>', 'required');
			$this->form_validation->set_rules('email', '<b>Email</b>', 'required|valid_email|valid_emails|callback__cek_email');
			$this->form_validation->set_rules('no_hp', '<b>No HP</b>', 'required|is_natural|max_length[12]|callback__cek_no_hp');

		}

		$this->form_validation->set_rules('alamat', '<b>Alamat</b>', 'required');

		// Set Error Delimns

		$this->form_validation->set_error_delimiters('<div>', '</div>');
		
		$result = false;

		if ($this->form_validation->run() === true)
		{
			$bulan = $values['bulan'];
			$bulan = ($bulan < 10) ? '0'. $bulan : $bulan;
			$hari = $values['hari'];
			$hari = ($hari < 10) ? '0'. $hari : $hari;
			if ($method == 'new')
			{

				$username = $values['username'];
				// password123456
				$password = md5($values['password']);
				$user_data = array(
					'username' => $username,
					'password' => $password,
					'email' => $values['email'],
					'nama_lengkap' => $values['nama_lengkap'],
					'tgl_lahir' => $values['tahun'].'-'.$bulan.'='.$hari,
					'alamat' => $values['alamat'],
					'no_hp' => $values['no_hp'],
					'status' => 1,
					'grup' => 'konsumen',
				);
				$result = $this->pengguna_m->insert_pengguna($user_data);
			}
			else
			{
				$password = ($values['newpassword'] != '') ? md5($values['newpassword']) : $values['password'];
				$user_data = array(
					'username' => $values['username'],
					'password' => $password,
					'email' => $values['email'],
					'nama_lengkap' => $values['nama_lengkap'],
					'tgl_lahir' => $values['tahun'].'-'.$bulan.'='.$hari,
					'alamat' => $values['alamat'],
					'no_hp' => $values['no_hp'],
					'status' => $values['status'],

				);
				$result = $this->pengguna_m->update_pengguna($user_data, $row_id);
			}
		}
		return $result;
	}

	public function _cek_username()
	{
	 	$cek = $this->pengguna_m->cek_username($this->input->post('username'));
	 	if(!$cek){
	 		$this->form_validation->set_message('_cek_username', '<b>Username</b> yang anda tambahkan sudah ada');
      return false;
	 	}else{
	 		return true;
	 	}
	}

	public function _cek_email()
	{
	 	$cek = $this->pengguna_m->cek_email($this->input->post('email'));
	 	if(!$cek){
	 		$this->form_validation->set_message('_cek_email', '<b>Email</b> yang anda tambahkan sudah ada');
      return false;
	 	}else{
	 		return true;
	 	}
	}

	public function _cek_no_hp()
	{
	 	$cek = $this->pengguna_m->cek_no_hp($this->input->post('no_hp'));
	 	if(!$cek){
	 		$this->form_validation->set_message('_cek_no_hp', '<b>No HP</b> yang anda tambahkan sudah ada');
      return false;
	 	}else{
	 		return true;
	 	}
	}
}