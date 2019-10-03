<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model', 'auth_model');
		$this->load->library('form_validation');
		$this->load->helper('captcha');
	}

	public function index()
	{
		$vals = array(
			'word'          => rand(1, 999999),
			'img_path'      => './assets/captcha/images/',
			'img_url'       => base_url('assets') . '/captcha/images/',
			'font_path'     => base_url('assets') . '/captcha/fonts/XYZ.ttf',
			'img_width'     => '150',
			'img_height'    => 30,
			'word_length'   => 8,
			'colors'        => array(
				'background'     => array(255, 255, 255),
				'border'         => array(255, 255, 255),
				'text'           => array(0, 0, 0),
				'grid'           => array(255, 75, 100)
			)
		);


		if ($this->session->userdata('level_id')) {
			redirect('user');
		}

		if (!empty($_POST['captcha'])) {
			$this->form_validation->set_rules('captcha', 'Captcha', 'integer|callback_check_captcha');
			$this->session->set_userdata('captcha_answer', $this->input->post('code'));
		} else {
			$this->form_validation->set_rules('captcha', 'Captcha', 'required');
		}

		$this->form_validation->set_rules('username', 'username', 'required|trim|min_length[6]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
		$this->form_validation->set_message('required', 'Please fill the form %s');
		if ($this->form_validation->run() == false) {
			$data['title'] = "Login Page";
			$data['page'] = "Sistem Login";
			$data['captcha'] = create_captcha($vals);
			$this->load->view('layouts/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('layouts/auth_footer');
		} else {
			$this->_login();
		}
	}

	public function check_captcha($string)
	{
		if ($string != $this->session->userdata('captcha_answer')) :
			$this->session->unset_userdata('captcha_answer');
			$this->form_validation->set_message('check_captcha', 'captcha incorrect');
			return false;
		else :
			return true;
		endif;
	}

	private function _login()
	{
		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);

		$user = $this->auth_model->getUser('username', $username);

		if ($user) {
			if (password_verify($password, $user['password'])) {
				$data = [
					'user_id' => $user['id'],
					'level_id' => $user['level_id'],
					'username' => $user['username']
				];

				$this->session->set_userdata($data);

				if ($data['level_id'] == 1) {
					redirect('admin');
				} else if ($data['level_id'] == 2) {
					redirect('user');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Wrong password!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger">This username not registered!</div>');
			redirect('auth');
		}
	}

	// public function register() {}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('level_id');
		$this->session->set_flashdata('message', '<div class="alert alert-primary">You\'ve been logout.</div>');
		redirect('auth');
	}

	public function blocked()
	{
		$data['title'] = "403 Access Blocked";
		$this->load->view('layouts/header', $data);
		$this->load->view('auth/blocked', $data);
		$this->load->view('layouts/footer');
	}
}
