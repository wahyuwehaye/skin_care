<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
  }

	public function index()
	{
    $data['page'] = 'beranda';
  	$this->load->model('produk_m','',TRUE);
  	$data['products'] = $this->produk_m->get_produk_home();
    $this->template->load('frontend', 'beranda', $data);
  }
}