<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model('dokter_m','',TRUE);
    $this->load->library('cart');
  }

  public function index(){
    if($this->session->userdata('is_logged_in')){
      $data['konsultasi']['entries'] = $this->dokter_m->get_konsultasi();
      $data['page'] = 'konsultasi';
      $this->template->load('frontdokter', 'konsultasi', $data);
    }else{
      $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu, jika belum mempunyai akun silahkan daftar pada form registrasi');
      redirect('login?redirect=dokter');
    }
  }

  public function forum($no_konsultasi){
  	if($this->session->userdata('is_logged_in')){
      $data['konsultasi'] = $this->dokter_m->get_konsultasi_by_id($no_konsultasi);
      $data['forumkonsultasi']['forumentries'] = $this->dokter_m->get_forumkonsultasi();
      $data['getkonsultasi'] = $this->dokter_m->get_konsultasi();
      $data['page'] = 'konsultasi';
      $this->template->load('frontdokter', 'forum_konsultasi', $data);
    }else{
      $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu, jika belum mempunyai akun silahkan daftar pada form registrasi');
      redirect('login?redirect=dokter');
    }
  }

  public function formkonsultasi(){
  	if($this->session->userdata('is_logged_in')){
      $data['konsultasi']['entries'] = $this->dokter_m->get_konsultasi();
      $data['page'] = 'konsultasi';
      $this->template->load('frontdokter', 'formkonsultasi', $data);
    }else{
      $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu, jika belum mempunyai akun silahkan daftar pada form registrasi');
      redirect('login?redirect=dokter');
    }
  }

  public function create(){
  	if($this->session->userdata('is_logged_in')){
	      $data = array(
	      	'tgl_konsultasi' => date('Y-m-d H:i:s'),
	      	'pertanyaan' => $this->input->post('pertanyaan'),
          'diagnosa' => $this->input->post('diagnosa'),
	      	'id_konsumen' => $this->session->userdata('id_pengguna'),
	      	);
	      $this->dokter_m->insert_konsultasi($data);
	      unset($_SESSION['cart_contents']);
	      $this->session->set_flashdata('success', 'Konsultasi anda berhasil ditambahkan');
    		redirect('dokter');
		}else{
			$this->session->set_flashdata('error', 'Anda harus login terlebih dahulu, jika belum mempunyai akun silahkan daftar pada form registrasi');
	    redirect('login?redirect=katalog_produk/view_cart');
		}
	}

  public function createkomen($id){
    if($this->session->userdata('is_logged_in')){
        $data = array(
          'no_konsultasi' => $id,
          'tgl_post' => date('Y-m-d H:i:s'),
          'komentar' => $this->input->post('komentar'),
          'id_user' => $this->session->userdata('id_pengguna'),
          );
        $this->dokter_m->insert_forum_konsultasi($data);
        unset($_SESSION['cart_contents']);
        $this->session->set_flashdata('success', 'komentar anda berhasil ditambahkan');
        redirect('dokter/forum/'.$id);
    }else{
      $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu, jika belum mempunyai akun silahkan daftar pada form registrasi');
      redirect('login?redirect=katalog_produk/view_cart');
    }
  }
}