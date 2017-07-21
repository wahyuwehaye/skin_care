<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct()
  {
    parent::__construct();

    // Page
    $this->page = 'Produk';
    $this->description = 'pengelolaan data produk';

    // Cek Login
    $this->is_logged_in();

    // load library
    $this->load->library('breadcrumbs');
    $this->load->library('form_validation');

  	// load model
		$this->load->model('produk_m','',TRUE);
		$this->load->model('jenis_produk_m');
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
		$data['produk']['entries'] = $this->produk_m->get_produk();

		$data['page'] = $this->page;
		$data['description'] = $this->description;

		$data['title'] = 'Daftar Produk';
		$data['content'] = 'daftar_produk';

		// add breadcrumbs
		$this->breadcrumbs->push('<i class="fa fa-dashboard"></i> Home&nbsp;', '/admin');
		$this->breadcrumbs->push($data['title'], '/produk/index');

		$this->template->load('backend','produk_index',$data);
	}
	
	public function view($id=0)
	{
		
	}

	public function create()
	{
		if($_POST){
			if($this->_update_produk('new')){	
				$this->session->set_flashdata('success', 'Produk berhasil ditambahkan');	
				redirect('produk/index');			
			}else{
				// $data['messages']['error'] = 'Gagal menambah data produk';
			}
		}

		$data['mode'] = 'Tambah';

		$data['page'] = $this->page;
		$data['description'] = $this->description;

		$data['title'] = 'Tambah Produk';
		$data['content'] = 'tambah_produk';
		$data['jenis_produk']['entries'] = $this->jenis_produk_m->get_jenis_produk();


		// add breadcrumbs
		$this->breadcrumbs->push('<i class="fa fa-dashboard"></i> Home&nbsp;', '/admin');
		$this->breadcrumbs->push('Daftar produk', '/produk/index');
		$this->breadcrumbs->push($data['title'], '/');

		$this->template->load('backend','produk_form',$data);
	}

	public function edit($id=0)
	{
		if($_POST){
			if($this->_update_produk('edit',$id)){	
				$this->session->set_flashdata('success', 'Produk berhasil diubah');	
				redirect('produk/index');			
			}else{
				//$data['messages']['error'] = 'Gagal mengubah data produk';
			}
		}

		$data['page'] = $this->page;
		$data['description'] = $this->description;

		$data['fields'] = $this->produk_m->get_produk_by_id($id);
		$data['jenis_produk']['entries'] = $this->jenis_produk_m->get_jenis_produk();
		
		$data['mode'] = 'Edit';
		
		$data['title'] = 'Edit produk';
		$data['content'] = 'edit_produk';

		// add breadcrumbs
		$this->breadcrumbs->push('<i class="fa fa-dashboard"></i> Home&nbsp;', '/admin');
		$this->breadcrumbs->push('Daftar Produk', '/produk/index');
		$this->breadcrumbs->push($data['title'], '/');

		$this->template->load('backend','produk_form',$data);
	}

	public function delete($id=0)
	{
		// -------------------------------------
		// Delete entry
		// -------------------------------------

		$this->produk_m->delete_produk($id);
 
		// -------------------------------------
		// Redirect
		// -------------------------------------
		
    redirect('produk/index');
	}

	private function _update_produk($method, $row_id = null)
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
			$fields = $this->produk_m->get_produk_by_id($row_id);
			if($values['nama_produk'] == $fields['nama_produk']){
				$this->form_validation->set_rules('nama_produk', '<b>Nama Produk</b>', 'required');
			}else{
				$this->form_validation->set_rules('nama_produk', '<b>Nama Produk</b>', 'required|callback__cek_nama');
			}
			if($values['kd_produk'] == $fields['kd_produk']){
				$this->form_validation->set_rules('kd_produk', '<b>Kode Produk</b>', 'required');
			}else{
				$this->form_validation->set_rules('kd_produk', '<b>Kode Produk</b>', 'required|callback__cek_kode');
			}
		}else{
			$this->form_validation->set_rules('kd_produk', '<b>Kode Produk</b>', 'required|callback__cek_kode');
			$this->form_validation->set_rules('nama_produk', '<b>Nama Produk</b>', 'required|callback__cek_nama');
		}
		$this->form_validation->set_rules('id_jenis_produk', '<b>Jenis Produk</b>', 'required');
		$this->form_validation->set_rules('satuan', '<b>Satuan</b>', 'required');
		
		if($method != 'edit'){
			$this->form_validation->set_rules('stok', '<b>Stok Awal</b>', 'required');
		}
		$this->form_validation->set_rules('min_stok', '<b>Minimum Stok</b>', 'required');
		$this->form_validation->set_rules('harga', '<b>Harga</b>', 'required');
		if($method == 'new'){
			if(!$_FILES['file']['name']){
				$this->form_validation->set_rules('file', '<b>Gambar</b>', 'required');
			}
		}

		// Set Error Delimns

		$this->form_validation->set_error_delimiters('<div>', '</div>');


		$kd_produk = $values['kd_produk'];
		$file_name = 'produk_'.$kd_produk.'_'.rand();

		$config['upload_path'] = './assets/pictures';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '2048';
		// $config['max_width']  = '1024';
		// $config['max_height']  = '768';
		$config['file_name'] = $file_name;

		$this->load->library('upload', $config);
		
		$result = false;

		if ($this->form_validation->run() === true)
		{
			if ($method == 'new')
			{
				if ($_FILES['file']['tmp_name'] != "" && !$this->upload->do_upload('file'))
				{
					$error = array('error' => $this->upload->display_errors());

					$this->session->set_flashdata('error', $error['error']);
				}
				else
				{
					$data_file = $this->upload->data();
					$values['gambar'] = $data_file['orig_name'];
					$result = $this->produk_m->insert_produk($values);
				}
			}
			else
			{
				$return = false;

				if(!$_FILES['file']['name']){
					$gambar = $this->input->post('gambar');
					$return = true;
				} else {
					$data = $this->produk_m->get_produk_by_id($row_id);
	        $file = $data['gambar'];
	        $file_locate = "./assets/pictures/".$file;
					if($this->upload->do_upload('file')){
						if(file_exists($file_locate)){
			       	unlink("./assets/pictures/".$file);
			      }
						$data_file = $this->upload->data();
						$gambar = $data_file['orig_name'];
						$return = true;
					} else {
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('error', $error['error']);
					}
				}

				if($return) {
					$values['gambar'] = $gambar;
					$result = $this->produk_m->update_produk($values, $row_id);
				}
			}
		}
		return $result;
	}

	public function _cek_nama()
	{
	 	$cek = $this->produk_m->cek_nama($this->input->post('nama'));
	 	if(!$cek){
	 		$this->form_validation->set_message('_cek_nama', '<b>Nama</b> yang anda tambahkan sudah ada');
      return false;
	 	}else{
	 		return true;
	 	}
	}
	public function _cek_kode()
	{
	 	$cek = $this->produk_m->cek_kode($this->input->post('kd_produk'));
	 	if(!$cek){
	 		$this->form_validation->set_message('_cek_kode', '<b>Kode Produk</b> yang anda tambahkan sudah ada');
      return false;
	 	}else{
	 		return true;
	 	}
	}

	public function ajax_get_produk_by_id($id){
		$fields = $this->produk_m->get_produk_by_id($id);
		echo json_encode($fields);
	}
	
}
