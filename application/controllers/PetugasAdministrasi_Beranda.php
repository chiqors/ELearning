<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PetugasAdministrasi_Beranda extends CI_Controller {
	
	/*public function __construct()
	{
		parent::__construct();
		if ($this->session->status != "PetugasAdministrasi") {
			redirect('auth/login');
		}
	}*/

	public function index()
	{
		$data = array(
			'activeMenu' => 'beranda',
            'title' => 'Beranda'
        );
		$this->slice->view('entities.petugasadministrasi.pages.beranda', $data);
	}

}
