<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PetugasAdministrasi_Beranda extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->status != "PetugasAdministrasi") {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data_get1 = $this->beranda_model->get_total_kursus();
		$data_get2 = $this->beranda_model->get_total_pelajar();
		$data_get3 = $this->beranda_model->get_list_kursus();
		$data = array(
			'info_total_kursus' => $data_get1,
			'info_total_pelajar' => $data_get2,
			'info_list_kursus' => $data_get3,
			'activeMenu' => 'beranda',
            'title' => 'Beranda'
        );
		$this->slice->view('entities.petugasadministrasi.pages.beranda', $data);
	}

}
