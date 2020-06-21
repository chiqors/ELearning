<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instruktur_Beranda extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->status != "Instruktur") {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data_get1 = $this->beranda_model->get_total_kursus_ajar($this->session->id);
		$data_get2 = $this->beranda_model->get_total_kursus_pelajar($this->session->id);
		$data_get3 = $this->beranda_model->get_list_kursus_ajar($this->session->id);
		$data = array(
			'info_total_kursus_ajar' => $data_get1,
			'info_total_kursus_pelajar' => $data_get2,
			'info_list_kursus_ajar' => $data_get3,
			'activeMenu' => 'beranda',
            'title' => 'Beranda'
        );
		$this->slice->view('entities.instruktur.pages.beranda', $data);
	}

	public function kursus($id)
	{
		$data_get = $this->kursus_model->get_data();
		$data = array(
			'info_kursus' => $data_get,
			'activeMenu' => 'kursus',
            'title' => 'Kursus'
        );
		$this->slice->view('entities.instruktur.pages.kursus.show', $data);
	}

}
