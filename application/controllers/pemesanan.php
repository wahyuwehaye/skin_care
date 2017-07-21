<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model('pemesanan_m','',TRUE);
    $this->load->model('konfirmasi_pembayaran_m');
    $this->load->library('cart');
  }

  public function index(){
    if($this->session->userdata('is_logged_in')){
      $data['pemesanan']['entries'] = $this->pemesanan_m->get_pemesanan();
      $data['page'] = 'pemesanan';
      $this->template->load('frontend', 'pemesanan', $data);
    }else{
      $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu, jika belum mempunyai akun silahkan daftar pada form registrasi');
      redirect('login?redirect=pemesanan');
    }
  }

  public function detail($id_pemesanan){
  	if($this->session->userdata('is_logged_in')){
      $data['pemesanan'] = $this->pemesanan_m->get_pemesanan_by_id($id_pemesanan);
      $data['detail_pemesanan']['entries'] = $this->pemesanan_m->get_detail_pemesanan($id_pemesanan);
      $data['cek_konfirmasi'] = $this->konfirmasi_pembayaran_m->get_konfirmasi_by_idp($id_pemesanan);
      $data['page'] = 'pemesanan';
      $this->template->load('frontend', 'detail_pemesanan', $data);
    }else{
      $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu, jika belum mempunyai akun silahkan daftar pada form registrasi');
      redirect('login?redirect=pemesanan');
    }
  }

  public function create(){
  	if($this->session->userdata('is_logged_in')){
	  	if(count($this->cart->contents()) > 0) {
	      $subtotal = 0;
	      foreach ($this->cart->contents() as $items){
	        $subtotal = $subtotal+$items['subtotal'];
	      }
	      $val_pemesanan['id_konsumen'] = $this->session->userdata('id_pengguna');
	      $val_pemesanan['paket_pengiriman']  = $this->session->userdata('set_jasa_pengiriman')['id_paket_pengiriman'];
	      $val_pemesanan['ongkir'] = $this->session->userdata('set_jasa_pengiriman')['harga'];
	      $val_pemesanan['total_biaya'] = $subtotal+$val_pemesanan['ongkir'];
	      $val_pemesanan['status_pembayaran'] = 'Belum dibayar';
	      $val_pemesanan['tanggal_pemesanan'] = date('Y-m-d H:i:s');

	      $this->pemesanan_m->insert_pemesanan($val_pemesanan);
	      $id_pemesanan = $this->db->insert_id();
	      $val_detail_pemesanan = array();
	      foreach ($this->cart->contents() as $items){
	        $val_detail_pemesanan[] = array(
	          'id_pemesanan'=>$id_pemesanan,
	          'kd_produk'=>$items['id'],
	          'nama_produk'=>$items['name'],
	          'jml_produk'=>$items['qty'],
	          'harga'=>$items['price'],
	          );
	      }
	      $this->pemesanan_m->insert_detail_pemesanan($val_detail_pemesanan);
	      unset($_SESSION['cart_contents']);
	      $this->session->set_flashdata('success', 'Pemesanan anda berhasil ditambahkan');
    		redirect('pemesanan');
	    }
		}else{
			$this->session->set_flashdata('error', 'Anda harus login terlebih dahulu, jika belum mempunyai akun silahkan daftar pada form registrasi');
	    redirect('login?redirect=katalog_produk/view_cart');
		}
	}

	public function konfirmasi_pembayaran(){
		$this->load->helper(array('form', 'url'));
		$this->load->helper('security');

		if($_POST){
			$values = $_POST;
			$id_pemesanan = $_POST['id_pemesanan'];
			$file_name = 'payment_'.$id_pemesanan.'_'.rand();

			$config['upload_path'] = './assets/pictures';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size']	= '2048';
			$config['file_name'] = $file_name;
			$this->load->library('upload', $config);

			if ($_FILES['file']['tmp_name'] != "" && !$this->upload->do_upload('file'))
			{
				$error = array('error' => $this->upload->display_errors());

				$this->session->set_flashdata('error', $error['error']);
			}
			else
			{
				$data_file = $this->upload->data();
				$values['bukti_pembayaran'] = $data_file['orig_name'];
				$values['id_konsumen'] = $this->session->userdata('id_pengguna');
				$values['status_konfirmasi'] = 'Menunggu persetujuan';
				$this->konfirmasi_pembayaran_m->insert_konfirmasi_pembayaran($values);
				$val_pemesanan['status_pembayaran'] = 'Menunggu persetujuan';
				$this->pemesanan_m->update_pemesanan($val_pemesanan, $id_pemesanan);
				$this->session->set_flashdata('success', 'Berhasil melakukan konfirmasi pembayaran');
			}
			redirect('pemesanan/detail/'.$id_pemesanan);
		}else{
			redirect('pemesanan');
		}
	}
}