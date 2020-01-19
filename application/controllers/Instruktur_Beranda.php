<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instruktur_Beranda extends CI_Controller {
	
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
		$this->slice->view('entities.instruktur.pages.beranda', $data);
	}

}
