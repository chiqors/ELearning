<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function login()
	{
		if ($this->session->status == "petugasadministrasi") {
			redirect('petugasadministrasi');
		} else if ($this->session->status == "pelajar") {
			redirect('pelajar');
		} else if ($this->session->status == "instruktur") {
			redirect('instruktur');
		}
		$data = array(
            'title' => 'Login'
        );
		$this->slice->view('entities.auth.pages.login', $data);
	}

	public function do_login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		$login = $this->pengguna_model->do_login();
		if ($login > 0) {
			$data_session = array(
				'username' => $login->username,
				'status' => $login->status
			);
			$this->session->set_userdata($data_session);
			if ($login->status == "petugasadministrasi") {
				redirect('admin');
			} else if ($login->status == "pelajar") {
				redirect('pelajar');
			} else if ($login->status == "instruktur") {
				redirect('instruktur');
			}
		} else {
			$this->session->set_flashdata('error', 'Username atau Password tidak valid!');
			redirect('auth/login');
		}
	}

	public function register()
	{
		if ($this->session->status == "petugasadministrasi") {
			redirect('petugasadministrasi');
		} else if ($this->session->status == "pelajar") {
			redirect('pelajar');
		} else if ($this->session->status == "instruktur") {
			redirect('instruktur');
		}
		$data = array(
            'title' => 'Register'
        );
		$this->slice->view('entities.auth.pages.register', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}

}
