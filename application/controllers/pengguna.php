<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function __construct()
    {
      parent::__construct();

      // Page
      $this->page = 'Pengguna';
      $this->description = 'pengelolaan data pengguna';

      // Cek Login
      $this->is_logged_in();

      // load library
      $this->load->library('breadcrumbs');
      $this->load->library('form_validation');

    	// load model
			$this->load->model('pengguna_m','',TRUE);
    }

    public function is_logged_in(){

    	// Mengecek apakah siswa sudah login atau belum
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != TRUE)
		{
			redirect('admin/login');
		}

		// Mengecek apakah pengguna adalah seorang pegawai atau bukan
		if($this->session->userdata('grup') != 'pegawai'){
			redirect('admin/index');
		}  
	}

	public function index($grup = NULL)
	{
		$data['user']['entries'] = $this->pengguna_m->get_pengguna($grup);

		$data['page'] = ucfirst($grup);
		$data['description'] = 'kelola data '.$grup;
		$data['grup'] = $grup;

		$data['title'] = 'Daftar '.ucfirst($grup);
		$data['content'] = 'daftar_pengguna';

		// add breadcrumbs
		$this->breadcrumbs->push('<i class="fa fa-dashboard"></i> Home&nbsp;', '/admin');
		$this->breadcrumbs->push(ucfirst($grup), '/pengguna/index');

		$this->template->load('backend','pengguna_index',$data);
	}
	
	public function view($id=0)
	{
		$data['fields'] = $this->pengguna_m->get_pengguna_by_id($id);
		$grup = $data['fields']['grup'];

		$data['page'] = ucfirst($grup);
		$data['description'] = 'kelola data '.$grup;

		$data['fields'] = $this->pengguna_m->get_pengguna_by_id($id);
		
		$data['title'] = 'Detail '.ucfirst($grup);
		$data['content'] = 'detail_pengguna';

		$data['grup'] = $grup;

		// add breadcrumbs
		$this->breadcrumbs->push('<i class="fa fa-dashboard"></i> Home&nbsp;', '/admin');
		$this->breadcrumbs->push($data['page'], '/pengguna/index'.$grup);
		$this->breadcrumbs->push($data['title'], '/');

		$this->template->load('backend','pengguna_entry',$data);
	}

	public function create($grup = NULL)
	{
		if($_POST){
			if($this->_update_user('new')){	
				$this->session->set_flashdata('success', 'Data '.$grup.' berhasil ditambahkan');	
				redirect('pengguna/index/'.$grup);			
			}else{
				//$data['messages']['error'] = 'Gagal menambah data siswa';
			}
		}

		$data['mode'] = 'Tambah';

		$data['page'] = ucfirst($grup);
		$data['description'] = 'kelola data '.$grup;
		$data['grup'] = $grup;

		$data['title'] = 'Tambah '.ucfirst($grup);
		$data['content'] = 'tambah_pengguna';

		// add breadcrumbs
		$this->breadcrumbs->push('<i class="fa fa-dashboard"></i> Home&nbsp;', '/admin');
		$this->breadcrumbs->push($data['page'], '/pengguna/index/'.$grup);
		$this->breadcrumbs->push($data['title'], '/');

		$this->template->load('backend','pengguna_form',$data);
	}

	public function edit($id=0)
	{
		$data['fields'] = $this->pengguna_m->get_pengguna_by_id($id);
		$grup = $data['fields']['grup'];

		if($_POST){
			if($this->_update_user('edit',$id)){	
				$this->session->set_flashdata('success', 'Data '.$grup.' berhasil diubah');	
				redirect('pengguna/index/'.$grup);			
			}else{
				//$data['messages']['error'] = 'Gagal mengubah data siswa';
			}
		}
		$tgl_lahir = explode('-',$data['fields']['tgl_lahir']);
		$data['fields']['tahun'] = $tgl_lahir[0];
		$data['fields']['bulan'] = $tgl_lahir[1];
		$data['fields']['hari'] = $tgl_lahir[2];
		
		$data['page'] = ucfirst($grup);
		$data['description'] = 'kelola data '.$grup;
		$data['grup'] = $grup;

		$data['mode'] = 'Edit';
		
		$data['title'] = 'Edit Data '.ucfirst($grup);
		$data['content'] = 'edit_pengguna';


		// add breadcrumbs
		$this->breadcrumbs->push('<i class="fa fa-dashboard"></i> Home&nbsp;', '/admin');
		$this->breadcrumbs->push($data['page'], '/pengguna/index/'.$grup);
		$this->breadcrumbs->push($data['title'], '/');

		$this->template->load('backend','pengguna_form',$data);
	}

	public function delete($grup = null, $id=0)
	{
		// -------------------------------------
		// Delete entry
		// -------------------------------------

		$this->pengguna_m->delete_pengguna($id);
		$this->session->set_flashdata('error', 'Data pengguna berhasil dihapus');

 
		// -------------------------------------
		// Redirect
		// -------------------------------------
		
    redirect('pengguna/index/'.$grup);
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

			$this->form_validation->set_rules('password', '<b>Password</b>', 'required');
		}else{
			$this->form_validation->set_rules('email', '<b>Email</b>', 'required|valid_email|valid_emails|callback__cek_email');
			$this->form_validation->set_rules('no_hp', '<b>No HP</b>', 'required|is_natural|max_length[12]|callback__cek_no_hp');

		}

		$this->form_validation->set_rules('alamat', '<b>Alamat</b>', 'required');

		if($method == 'edit'){
			$this->form_validation->set_rules('status', '<b>Status</b>', 'required');
		}

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

				$username = $values['email'];
				// password123456
				$password ='cb28e00ef51374b841fb5c189b2b91c9';
				$user_data = array(
					'username' => $username,
					'password' => $password,
					'email' => $values['email'],
					'nama_lengkap' => $values['nama_lengkap'],
					'tgl_lahir' => $values['tahun'].'-'.$bulan.'='.$hari,
					'alamat' => $values['alamat'],
					'no_hp' => $values['no_hp'],
					'status' => 1,
					'grup' => $values['grup'],
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
