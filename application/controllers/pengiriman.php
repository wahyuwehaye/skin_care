<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends CI_Controller {

	public function __construct()
  {
    parent::__construct();

    // Page
    $this->page = 'Pengiriman';
    $this->description = 'pengelolaan data pengiriman';

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
		if($this->session->userdata('grup') != (('pegawai') || ('manajer'))){
			redirect('admin/index');
		}  
	}

	public function index()
	{
		$data['pengiriman']['entries'] = $this->pemesanan_m->get_pengiriman();

		$data['page'] = $this->page;
		$data['description'] = $this->description;

		$data['title'] = 'Daftar pemesanan yang siap dikirim';
		$data['content'] = 'daftar_pemesanan';

		// add breadcrumbs
		$this->breadcrumbs->push('<i class="fa fa-dashboard"></i> Home&nbsp;', '/admin');
		$this->breadcrumbs->push($data['title'], '/pembayaran/index');

		$this->template->load('backend','pengiriman_index',$data);
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

		if($this->input->get('f-no_resi')){
			$val_konfirmasi['nomor_resi'] = $this->input->get('f-no_resi');
			$this->konfirmasi_pembayaran_m->update_konfirmasi_pembayaran($val_konfirmasi, $id_pemesanan);
			$this->session->set_flashdata('success', 'Nomor resi telah diperbaharui');	
			redirect('pengiriman/view/'.$id_pemesanan);
		}

		// add breadcrumbs
		$this->breadcrumbs->push('<i class="fa fa-dashboard"></i> Home&nbsp;', '/admin');
		$this->breadcrumbs->push('Daftar Pemesanan', '/pembayaran/index');
		$this->breadcrumbs->push($data['title'], '/');

		$this->template->load('backend','pengiriman_entry',$data);
	}
}
