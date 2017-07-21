<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
  {
    parent::__construct();

    // Page
    $this->page = 'Admin';
    $this->description = 'pengelolaan data admin';

    // load library
    $this->load->library('breadcrumbs');
    $this->load->library('form_validation');

  	// load model
  	$this->load->model('pengguna_m','',TRUE);
  }

  public function is_logged_in(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != TRUE)
		{
			redirect('admin/login');
		}
	}

	public function index()
	{
		// Cek Login
    $this->is_logged_in();

    $data['page'] = 'Dashboard';
    $data['description'] = 'control panel';
		$data['title'] = 'Dashboard';
		$data['content'] = 'Dashboard';

		// add breadcrumbs
		$this->breadcrumbs->push('<i class="fa fa-dashboard"></i> Home&nbsp;', '/');
		$this->breadcrumbs->push('Dashboard', '/admin');

		$this->template->load('backend','dashboard',$data);
	}

	public function view($id=0)
	{
		$data['page'] = $this->page;
		$data['description'] = $this->description;

		$data['admin'] = $this->admin_m->get_admin_by_id_admin($id);
		
		$data['title'] = 'Detail Admin';
		$data['content'] = 'detail_admin';

		// add breadcrumbs
		$this->breadcrumbs->push('<i class="fa fa-dashboard"></i> Home&nbsp;', '/admin');
		$this->breadcrumbs->push('Daftar Admin', '/admin/list_admin');
		$this->breadcrumbs->push($data['title'], '/');

		$this->template->load('backend','admin_entry',$data);
	}

	public function login()
	{
   	$is_logged_in = $this->session->userdata('is_logged_in');
		if(isset($is_logged_in) && $is_logged_in == TRUE)
		{
			redirect('admin/index');
		}


		if($_POST){
			if($this->_cek_login()){
				redirect('admin');
			}else{
				$data['messages']['error'] = 'Gagal Login';
			}

		}
		$data['title'] = 'AdminLTE Application';

		$this->load->view('login',$data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect ('admin/login');
	}

	public function _cek_login()
	{
		$this->load->helper(array('form', 'url'));

		$this->form_validation->set_rules('username', '<b>Username</b>', 'required');
		$this->form_validation->set_rules('password', '<b>Password</b>', 'required');

		$this->form_validation->set_error_delimiters('<div>', '</div>');

		$result = false;
		if ($this->form_validation->run() === true)
		{
			$query = $this->pengguna_m->validate_login();

			if($query != "")
			{
				$data = array(
					'id_pengguna' => $query['id_pengguna'],
					'username' => $query['username'],
					'grup' => $query['grup'],
					'is_logged_in' => true
				);
				$this->session->set_userdata($data);
				$result = true;
				
			}
		}
		return $result;
	}
}
