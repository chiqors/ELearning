<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelajar_Beranda extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->status != "Pelajar") {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data_get = $this->nilai_model->get_list_pelajar_nilai($this->session->id);
		$data = array(
			'info_list_nilai' => $data_get,
			'activeMenu' => 'nilai',
            'title' => 'Nilai'
        );
		$this->slice->view('entities.pelajar.pages.nilai.index', $data);
	}

}
