<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PetugasAdministrasi_Pembayaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->status != "PetugasAdministrasi") {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data_get = $this->pembayaran_model->get_list();
		$data = array(
			'info' => $data_get,
			'activeMenu' => 'pembayaran',
            'title' => 'Pembayaran'
        );
		$this->slice->view('entities.petugasadministrasi.pages.pembayaran.index', $data);
	}

	public function update($id)
	{
		$this->pembayaran_model->accept($id,$this->session->id);
		$this->session->set_flashdata('success', 'Pembayaran #'.$id.' telah diperbaharui');
		redirect('petugasadministrasi/pembayaran');
	}

}
