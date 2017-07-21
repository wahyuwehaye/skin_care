<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jasa_pengiriman extends CI_Controller {

	public function __construct()
  {
    parent::__construct();

    // Page
    $this->page = 'Jasa Pengiriman';
    $this->description = 'pengelolaan data jasa pengiriman';

    // Cek Login
    $this->is_logged_in();

    // load library
    $this->load->library('breadcrumbs');
    $this->load->library('form_validation');

  	// load model
		$this->load->model('jasa_pengiriman_m','',TRUE);
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
		$data['jasa_pengiriman']['entries'] = $this->jasa_pengiriman_m->get_jasa_pengiriman();

		$data['page'] = $this->page;
		$data['description'] = $this->description;

		$data['title'] = 'Daftar Jasa Pengiriman';
		$data['content'] = 'daftar_jasa_pengiriman';

		// add breadcrumbs
		$this->breadcrumbs->push('<i class="fa fa-dashboard"></i> Home&nbsp;', '/admin');
		$this->breadcrumbs->push($data['title'], '/jasa_pengiriman/index');

		$this->template->load('backend','jasa_pengiriman_index',$data);
	}
	
	public function view($id=0)
	{
		
	}

	public function create()
	{
		if($_POST){
			if($this->_update_jasa_pengiriman('new')){	
				$this->session->set_flashdata('success', 'Jasa Pengiriman berhasil ditambahkan');	
				redirect('jasa_pengiriman/index');			
			}else{
				// $data['messages']['error'] = 'Gagal menambah data jasa_pengiriman';
			}
		}

		$data['mode'] = 'Tambah';

		$data['page'] = $this->page;
		$data['description'] = $this->description;

		$data['title'] = 'Tambah Jasa Pengiriman';
		$data['content'] = 'tambah_jasa_pengiriman';


		// add breadcrumbs
		$this->breadcrumbs->push('<i class="fa fa-dashboard"></i> Home&nbsp;', '/admin');
		$this->breadcrumbs->push('Daftar Jasa Pengiriman', '/jasa_pengiriman/index');
		$this->breadcrumbs->push($data['title'], '/');

		$this->template->load('backend','jasa_pengiriman_form',$data);
	}

	public function edit($id=0)
	{
		if($_POST){
			if($this->_update_jasa_pengiriman('edit',$id)){	
				$this->session->set_flashdata('success', 'Jasa Pengiriman berhasil diubah');	
				redirect('jasa_pengiriman/index');			
			}else{
				//$data['messages']['error'] = 'Gagal mengubah data jasa_pengiriman';
			}
		}

		$data['page'] = $this->page;
		$data['description'] = $this->description;

		$data['fields'] = $this->jasa_pengiriman_m->get_jasa_pengiriman_by_id($id);
		
		$data['mode'] = 'Edit';
		
		$data['title'] = 'Edit Jasa Pengiriman';
		$data['content'] = 'edit_jasa_pengiriman';

		// add breadcrumbs
		$this->breadcrumbs->push('<i class="fa fa-dashboard"></i> Home&nbsp;', '/admin');
		$this->breadcrumbs->push('Daftar Jasa Pengiriman', '/jasa_pengiriman/index');
		$this->breadcrumbs->push($data['title'], '/');

		$this->template->load('backend','jasa_pengiriman_form',$data);
	}

	public function delete($id=0)
	{
		// -------------------------------------
		// Delete entry
		// -------------------------------------

		$this->jasa_pengiriman_m->delete_jasa_pengiriman($id);
 
		// -------------------------------------
		// Redirect
		// -------------------------------------
		
    redirect('jasa_pengiriman/index');
	}

	private function _update_jasa_pengiriman($method, $row_id = null)
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
			$fields = $this->jasa_pengiriman_m->get_jasa_pengiriman_by_id($row_id);
			if($values['nama_jasa_pengiriman'] == $fields['nama_jasa_pengiriman']){
				$this->form_validation->set_rules('nama_jasa_pengiriman', '<b>Nama Jasa Pengiriman</b>', 'required');
			}else{
				$this->form_validation->set_rules('nama_jasa_pengiriman', '<b>Nama Jasa Pengiriman</b>', 'required|callback__cek_nama');
			}
		}else{
			$this->form_validation->set_rules('nama_jasa_pengiriman', '<b>Nama Jasa Pengiriman</b>', 'required|callback__cek_nama');
		}

		// Set Error Delimns

		$this->form_validation->set_error_delimiters('<div>', '</div>');
		
		$result = false;

		if ($this->form_validation->run() === true)
		{
			if ($method == 'new')
			{
				$result = $this->jasa_pengiriman_m->insert_jasa_pengiriman($values);
			}
			else
			{
				$result = $this->jasa_pengiriman_m->update_jasa_pengiriman($values, $row_id);
			}
		}
		return $result;
	}

	public function _cek_nama()
	{
	 	$cek = $this->jasa_pengiriman_m->cek_nama($this->input->post('nama_jasa_pengiriman'));
	 	if(!$cek){
	 		$this->form_validation->set_message('_cek_nama', '<b>Nama Jasa Pengiriman</b> yang anda tambahkan sudah ada');
      return false;
	 	}else{
	 		return true;
	 	}
	}
	
}
