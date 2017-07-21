<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class paket_pengiriman extends CI_Controller {

	public function __construct()
  {
    parent::__construct();

    // Page
    $this->page = 'Paket Pengiriman';
    $this->description = 'pengelolaan data paket pengiriman';

    // Cek Login
    $this->is_logged_in();

    // load library
    $this->load->library('breadcrumbs');
    $this->load->library('form_validation');

  	// load model
		$this->load->model('paket_pengiriman_m','',TRUE);
		$this->load->model('jasa_pengiriman_m');
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
		$data['paket_pengiriman']['entries'] = $this->paket_pengiriman_m->get_paket_pengiriman();

		$data['page'] = $this->page;
		$data['description'] = $this->description;

		$data['title'] = 'Daftar Paket Pengiriman';
		$data['content'] = 'daftar_paket_pengiriman';

		// add breadcrumbs
		$this->breadcrumbs->push('<i class="fa fa-dashboard"></i> Home&nbsp;', '/admin');
		$this->breadcrumbs->push($data['title'], '/paket_pengiriman/index');

		$this->template->load('backend','paket_pengiriman_index',$data);
	}
	
	public function view($id=0)
	{
		
	}

	public function create()
	{
		if($_POST){
			if($this->_update_paket_pengiriman('new')){	
				$this->session->set_flashdata('success', 'Paket Pengiriman berhasil ditambahkan');	
				redirect('paket_pengiriman/index');			
			}else{
				// $data['messages']['error'] = 'Gagal menambah data paket_pengiriman';
			}
		}

		$data['mode'] = 'Tambah';

		$data['page'] = $this->page;
		$data['description'] = $this->description;

		$data['title'] = 'Tambah Paket Pengiriman';
		$data['content'] = 'tambah_paket_pengiriman';
		$data['jasa_pengiriman']['entries'] = $this->jasa_pengiriman_m->get_jasa_pengiriman();


		// add breadcrumbs
		$this->breadcrumbs->push('<i class="fa fa-dashboard"></i> Home&nbsp;', '/admin');
		$this->breadcrumbs->push('Daftar Paket Pengiriman', '/paket_pengiriman/index');
		$this->breadcrumbs->push($data['title'], '/');

		$this->template->load('backend','paket_pengiriman_form',$data);
	}

	public function edit($id=0)
	{
		if($_POST){
			if($this->_update_paket_pengiriman('edit',$id)){	
				$this->session->set_flashdata('success', 'Paket Pengiriman berhasil diubah');	
				redirect('paket_pengiriman/index');			
			}else{
				//$data['messages']['error'] = 'Gagal mengubah data paket_pengiriman';
			}
		}

		$data['page'] = $this->page;
		$data['description'] = $this->description;

		$data['fields'] = $this->paket_pengiriman_m->get_paket_pengiriman_by_id($id);
		$data['jasa_pengiriman']['entries'] = $this->jasa_pengiriman_m->get_jasa_pengiriman();
		
		$data['mode'] = 'Edit';
		
		$data['title'] = 'Edit Paket Pengiriman';
		$data['content'] = 'edit_paket_pengiriman';

		// add breadcrumbs
		$this->breadcrumbs->push('<i class="fa fa-dashboard"></i> Home&nbsp;', '/admin');
		$this->breadcrumbs->push('Daftar Paket Pengiriman', '/paket_pengiriman/index');
		$this->breadcrumbs->push($data['title'], '/');

		$this->template->load('backend','paket_pengiriman_form',$data);
	}

	public function delete($id=0)
	{
		// -------------------------------------
		// Delete entry
		// -------------------------------------

		$this->paket_pengiriman_m->delete_paket_pengiriman($id);
 
		// -------------------------------------
		// Redirect
		// -------------------------------------
		
    redirect('paket_pengiriman/index');
	}

	private function _update_paket_pengiriman($method, $row_id = null)
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

		$this->form_validation->set_rules('id_jasa_pengiriman', '<b>Jasa Pengiriman</b>', 'required');
		$this->form_validation->set_rules('paket_pengiriman', '<b>Paket Pengiriman</b>', 'required');
		$this->form_validation->set_rules('harga', '<b>Harga</b>', 'required');

		// Set Error Delimns

		$this->form_validation->set_error_delimiters('<div>', '</div>');
		
		$result = false;

		if ($this->form_validation->run() === true)
		{
			if ($method == 'new')
			{
				$result = $this->paket_pengiriman_m->insert_paket_pengiriman($values);
			}
			else
			{
				$result = $this->paket_pengiriman_m->update_paket_pengiriman($values, $row_id);
			}
		}
		return $result;
	}
	
}
