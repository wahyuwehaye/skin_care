<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katalog_produk extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model('produk_m','',TRUE);
    $this->load->model('jenis_produk_m');
    $this->load->model('paket_pengiriman_m');
    $this->load->model('pemesanan_m');
    $this->load->library('cart');
  }

	public function index()
	{
    $data['page'] = 'katalog_produk';
    $data['produk']['entries'] = $this->produk_m->get_produk();
    $data['jenis_produk']['entries'] = $this->jenis_produk_m->get_jenis_produk();
    $this->template->load('frontend', 'katalog_produk', $data);
  }

  public function detail($kd_produk){
    $data['page'] = 'katalog_produk';
    $data['fields'] = $this->produk_m->get_produk_by_id($kd_produk);
    $this->template->load('frontend', 'detail_produk', $data);
  }

  public function view_cart(){
    $data['page'] = 'katalog_produk';
    $data['paket_pengiriman'] = $this->paket_pengiriman_m->get_paket_pengiriman();
    $subtotal = 0;
    $count = count($this->cart->contents());
    foreach ($this->cart->contents() as $items){
      $subtotal = $subtotal+$items['subtotal'];
    }
    // echo '<pre>';
    // var_dump($this->session->all_userdata());
    // die();
    $data['subtotal'] = $subtotal;
    $this->template->load('frontend','cart_entry', $data);
  }

  public function cart(){
    $subtotal = 0;
    $count = count($this->cart->contents());
    foreach ($this->cart->contents() as $items){
      $subtotal = $subtotal+$items['subtotal'];
    }
    echo 'Rp '.number_format($subtotal, 0,',','.').' ('.$count.')';
  }

  public function add_to_cart($kd_produk, $qty){
    $fields = $this->produk_m->get_produk_by_id($kd_produk);
    $fields['qty'] = $qty;
    $data = array(
      'id'      => $kd_produk,
      'qty'     => $qty,
      'price'   => $fields['harga'],
      'name'    => $fields['nama_produk'],
      'jenis_produk'    => $fields['jenis_produk'],
      'gambar'    => $fields['gambar'],
    );

    $this->cart->insert($data);
    $cart_showing = array();
    foreach ($this->cart->contents() as $items){
      if($kd_produk == $items['id']){
        $items['price'] = 'Rp'.number_format($items['price'],0,',','.');
        $items['subtotal'] = 'Rp'.number_format($items['subtotal'],0,',','.');
        $cart_showing = $items;
      }
    }
    echo json_encode($cart_showing); 
  }

  public function delete_cart(){
    unset($_SESSION['cart_contents']);
  }

  public function change_qty($rowid, $qty){
    $data = array(
      'rowid' => $rowid,
      'qty'   => $qty
    );

    $this->cart->update($data);
    $cart_showing = array();
    foreach ($this->cart->contents() as $items){
      if($rowid == $items['rowid']){
        $items['price'] = 'Rp'.number_format($items['price'],0,',','.');
        $items['subtotal'] = 'Rp'.number_format($items['subtotal'],0,',','.');
        $cart_showing = $items;
      }
    }
    echo json_encode($cart_showing); 
  }

  public function set_jasa_pengiriman($id, $harga){
    $data['set_jasa_pengiriman'] = array(
      'id_paket_pengiriman' => $id,
      'harga' => $harga,
    );
    $this->session->set_userdata($data);

    echo json_encode($data['set_jasa_pengiriman']);
  }
}