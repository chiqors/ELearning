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
		$data_get1 = $this->beranda_model->get_total_kursus_diikuti($this->session->id);
		$data_get2 = $this->beranda_model->get_total_kursus_tercapai($this->session->id);
		$data_get3 = $this->beranda_model->get_total_kursus();
		$data_get4 = $this->beranda_model->get_rekomendasi_kursus();
		$data = array(
			'info_total_kursus_diikuti' => $data_get1,
			'info_total_kursus_tercapai' => $data_get2,
			'info_total_kursus' => $data_get3,
			'info_rekomendasi_kursus' => $data_get4,
			'activeMenu' => 'beranda',
            'title' => 'Beranda'
        );
		$this->slice->view('entities.pelajar.pages.beranda', $data);
	}

	public function join($id)
	{
		$this->beranda_model->gabung_kursus($id,$this->session->id);
		$this->session->set_flashdata('success', 'Kursus #'.$id.' telah didaftarkan, Menunggu Konfirmasi Petugas dan Instruktur');
		redirect('pelajar');
	}

}
