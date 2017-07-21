<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsultasi extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model('konsultasi_m','',TRUE);
    $this->load->library('cart');
  }

  public function index(){
    if($this->session->userdata('is_logged_in')){
      $data['konsultasi']['entries'] = $this->konsultasi_m->get_konsultasi();
      $data['page'] = 'konsultasi';
      $this->template->load('frontend', 'konsultasi', $data);
    }else{
      $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu, jika belum mempunyai akun silahkan daftar pada form registrasi');
      redirect('login?redirect=konsultasi');
    }
  }

  public function forum($no_konsultasi){
  	if($this->session->userdata('is_logged_in')){
      $data['konsultasi'] = $this->konsultasi_m->get_konsultasi_by_id($no_konsultasi);
      $data['getkonsultasi'] = $this->konsultasi_m->get_konsultasi();
      $data['page'] = 'konsultasi';
      $this->template->load('frontend', 'forum_konsultasi', $data);
    }else{
      $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu, jika belum mempunyai akun silahkan daftar pada form registrasi');
      redirect('login?redirect=konsultasi');
    }
  }

  public function formkonsultasi(){
  	if($this->session->userdata('is_logged_in')){
      $data['page'] = 'konsultasi';
      $this->template->load('frontend', 'formkonsultasi', $data);
    }else{
      $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu, jika belum mempunyai akun silahkan daftar pada form registrasi');
      redirect('login?redirect=konsultasi');
    }
  }

  public function create(){
  	if($this->session->userdata('is_logged_in')){
	      $data = array(
	      	'tgl_konsultasi' => date('Y-m-d H:i:s'),
	      	'diagnosa' => $this->input->post('diagnosa'),
	      	'id_konsumen' => $this->session->userdata('id_pengguna'),
	      	);
	      $this->konsultasi_m->insert_konsultasi($data);
	      unset($_SESSION['cart_contents']);
	      $this->session->set_flashdata('success', 'Konsultasi anda berhasil ditambahkan');
    		redirect('konsultasi');
		}else{
			$this->session->set_flashdata('error', 'Anda harus login terlebih dahulu, jika belum mempunyai akun silahkan daftar pada form registrasi');
	    redirect('login?redirect=katalog_produk/view_cart');
		}
	}
}