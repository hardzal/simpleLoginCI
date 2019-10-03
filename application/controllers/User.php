<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		if ($this->session->userdata('level_id') != 2 && $this->session->userdata('level_id') == 1) {
			redirect('admin');
		}
		$data['title'] = "User Dashboard";
		$data['page'] = "Sistem Login";
		$this->load->view('layouts/admin_header', $data);
		$this->load->view('layouts/admin_sidebar');
		$this->load->view('layouts/admin_topbar');
		$this->load->view('user/index', $data);
		$this->load->view('layouts/admin_footer');
	}
}
