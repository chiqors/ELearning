<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PetugasAdministrasi_Pelajar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->status != "PetugasAdministrasi") {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data_get = $this->pengguna_model->get_list_pelajar();
		$data = array(
			'info' => $data_get,
			'activeMenu' => 'pelajar',
            'title' => 'Pelajar'
        );
		$this->slice->view('entities.petugasadministrasi.pages.pelajar.index', $data);
	}

	public function show($id)
	{
		$data_get = $this->pengguna_model->get_data_pelajar($id);
		$data = array(
			'info' => $data_get,
			'activeMenu' => 'pelajar',
            'title' => 'Tampil Pelajar #'.$id
        );
		$this->slice->view('entities.petugasadministrasi.pages.pelajar.show', $data);
	}

	public function edit($id) {
		$data_get = $this->pengguna_model->get_data_pelajar($id);
		if (empty($data_get)) {
			redirect('petugasadministrasi/pelajar');
		}
		$data = array(
			'info' => $data_get,
            'title' => 'Ubah Pelajar #'.$id
        );
		$this->slice->view('entities.petugasadministrasi.pages.pelajar.form', $data);
	}

	public function update($id)
	{
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tempat_tanggal_lahir', 'Tempat, Tanggal Lahir', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('kontak', 'Kontak', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('petugasadministrasi/pelajar/edit/'.$id);
		} else {
			$this->pengguna_model->update_pelajar($id);
			$this->session->set_flashdata('success', 'Pelajar #'.$id.' telah diperbaharui');
			redirect('petugasadministrasi/pelajar');
		}
	}

	public function destroy($id)
	{
		$this->pengguna_model->destroy_pelajar($id);
		$this->session->set_flashdata('success', 'Pelajar #'.$id.' telah terhapus');
		redirect('petugasadministrasi/pelajar');
	}

}
