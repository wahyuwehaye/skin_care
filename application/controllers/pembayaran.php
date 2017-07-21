<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	public function __construct()
  {
    parent::__construct();

    // Page
    $this->page = 'Pembayaran';
    $this->description = 'pengelolaan data pembayaran';

    // Cek Login
    $this->is_logged_in();

    // load library
    $this->load->library('breadcrumbs');
    $this->load->library('form_validation');

  	// load model
		$this->load->model('pemesanan_m','',TRUE);
		$this->load->model('konfirmasi_pembayaran_m');
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
		$data['pembayaran']['entries'] = $this->pemesanan_m->get_pembayaran();

		$data['page'] = $this->page;
		$data['description'] = $this->description;

		$data['title'] = 'Daftar Pemesanan';
		$data['content'] = 'daftar_pemesanan';

		// add breadcrumbs
		$this->breadcrumbs->push('<i class="fa fa-dashboard"></i> Home&nbsp;', '/admin');
		$this->breadcrumbs->push($data['title'], '/pembayaran/index');

		$this->template->load('backend','pembayaran_index',$data);
	}
	
	public function view($id_pemesanan=0)
	{
		$data['pemesanan'] = $this->pemesanan_m->get_pemesanan_by_id($id_pemesanan);
    $data['detail_pemesanan']['entries'] = $this->pemesanan_m->get_detail_pemesanan($id_pemesanan);
    $data['konfirmasi'] = $this->konfirmasi_pembayaran_m->get_konfirmasi_by_idp($id_pemesanan);

		$data['page'] = $this->page;
		$data['description'] = $this->description;

		$data['title'] = 'Detail Pemesanan';
		$data['content'] = 'detail_pemesanan';

		// add breadcrumbs
		$this->breadcrumbs->push('<i class="fa fa-dashboard"></i> Home&nbsp;', '/admin');
		$this->breadcrumbs->push('Daftar Pemesanan', '/pembayaran/index');
		$this->breadcrumbs->push($data['title'], '/');

		$this->template->load('backend','pembayaran_entry',$data);
	}

	public function approve($id_pemesanan = 0){
		$val_pemesanan['status_pembayaran'] = 'Diterima';
		$this->pemesanan_m->update_pemesanan($val_pemesanan, $id_pemesanan);

		$val_konfirmasi['status_konfirmasi'] = 'Diterima';
		$this->konfirmasi_pembayaran_m->update_konfirmasi_pembayaran($val_konfirmasi, $id_pemesanan);

		$this->session->set_flashdata('success', 'Pembayaran dengan nomor pemesanan #'.$id_pemesanan.' telah diterima.');	
		redirect('pembayaran/view/'.$id_pemesanan);		
	}	
}
