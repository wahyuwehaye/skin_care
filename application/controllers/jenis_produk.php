<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jenis_produk extends CI_Controller {

	public function __construct()
  {
    parent::__construct();

    // Page
    $this->page = 'Jenis Produk';
    $this->description = 'pengelolaan data jenis produk';

    // Cek Login
    $this->is_logged_in();

    // load library
    $this->load->library('breadcrumbs');
    $this->load->library('form_validation');

  	// load model
		$this->load->model('jenis_produk_m','',TRUE);
  }

  public function is_logged_in(){

    	// Mengecek apakah user sudah login atau belum
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != TRUE)
		{
			redirect('admin/login');
		}

		// Mengecek apakah user adalah Bagian Administrator atau bukan
		if($this->session->userdata('grup') != 'pegawai'){
			redirect('admin/index');
		}  
	}

	public function index()
	{
		$data['jenis_produk']['entries'] = $this->jenis_produk_m->get_jenis_produk();

		$data['page'] = $this->page;
		$data['description'] = $this->description;

		$data['title'] = 'Daftar Jenis Produk';
		$data['content'] = 'daftar_jenis_produk';

		// add breadcrumbs
		$this->breadcrumbs->push('<i class="fa fa-dashboard"></i> Home&nbsp;', '/admin');
		$this->breadcrumbs->push($data['title'], '/jenis_produk/index');

		$this->template->load('backend','jenis_produk_index',$data);
	}
	
	public function view($id=0)
	{
		
	}

	public function create()
	{
		if($_POST){
			if($this->_update_jenis_produk('new')){	
				$this->session->set_flashdata('success', 'Jenis Produk berhasil ditambahkan');	
				redirect('jenis_produk/index');			
			}else{
				// $data['messages']['error'] = 'Gagal menambah data jenis_produk';
			}
		}

		$data['mode'] = 'Tambah';

		$data['page'] = $this->page;
		$data['description'] = $this->description;

		$data['title'] = 'Tambah Jenis Produk';
		$data['content'] = 'tambah_jenis_produk';


		// add breadcrumbs
		$this->breadcrumbs->push('<i class="fa fa-dashboard"></i> Home&nbsp;', '/admin');
		$this->breadcrumbs->push('Daftar Jenis Produk', '/jenis_produk/index');
		$this->breadcrumbs->push($data['title'], '/');

		$this->template->load('backend','jenis_produk_form',$data);
	}

	public function edit($id=0)
	{
		if($_POST){
			if($this->_update_jenis_produk('edit',$id)){	
				$this->session->set_flashdata('success', 'Jenis produk berhasil diubah');	
				redirect('jenis_produk/index');			
			}else{
				//$data['messages']['error'] = 'Gagal mengubah data jenis_produk';
			}
		}

		$data['page'] = $this->page;
		$data['description'] = $this->description;

		$data['fields'] = $this->jenis_produk_m->get_jenis_produk_by_id($id);
		
		$data['mode'] = 'Edit';
		
		$data['title'] = 'Edit Jenis Produk';
		$data['content'] = 'edit_jenis_produk';

		// add breadcrumbs
		$this->breadcrumbs->push('<i class="fa fa-dashboard"></i> Home&nbsp;', '/admin');
		$this->breadcrumbs->push('Daftar Jenis Produk', '/jenis_produk/index');
		$this->breadcrumbs->push($data['title'], '/');

		$this->template->load('backend','jenis_produk_form',$data);
	}

	public function delete($id=0)
	{
		// -------------------------------------
		// Delete entry
		// -------------------------------------

		$this->jenis_produk_m->delete_jenis_produk($id);
 
		// -------------------------------------
		// Redirect
		// -------------------------------------
		
    redirect('jenis_produk/index');
	}

	private function _update_jenis_produk($method, $row_id = null)
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

		if($method == 'edit'){
			$fields = $this->jenis_produk_m->get_jenis_produk_by_id($row_id);
			if($values['nama_jenis_produk'] == $fields['nama_jenis_produk']){
				$this->form_validation->set_rules('nama_jenis_produk', '<b>Nama Jenis Produk</b>', 'required');
			}else{
				$this->form_validation->set_rules('nama_jenis_produk', '<b>Nama Jenis Produk</b>', 'required|callback__cek_nama');
			}
		}else{
			$this->form_validation->set_rules('nama_jenis_produk', '<b>Nama Jenis Produk</b>', 'required|callback__cek_nama');
		}

		// Set Error Delimns

		$this->form_validation->set_error_delimiters('<div>', '</div>');
		
		$result = false;

		if ($this->form_validation->run() === true)
		{
			if ($method == 'new')
			{
				$result = $this->jenis_produk_m->insert_jenis_produk($values);
			}
			else
			{
				$result = $this->jenis_produk_m->update_jenis_produk($values, $row_id);
			}
		}
		return $result;
	}

	public function _cek_nama()
	{
	 	$cek = $this->jenis_produk_m->cek_nama($this->input->post('nama_jenis_produk'));
	 	if(!$cek){
	 		$this->form_validation->set_message('_cek_nama', '<b>Nama Jenis Produk</b> yang anda tambahkan sudah ada');
      return false;
	 	}else{
	 		return true;
	 	}
	}
	
}
