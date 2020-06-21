<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PetugasAdministrasi_Self extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->status != "PetugasAdministrasi") {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data_get = $this->pengguna_model->get_list_petugas();
		$data = array(
			'info' => $data_get,
			'activeMenu' => 'petugas',
            'title' => 'Petugas'
        );
		$this->slice->view('entities.petugasadministrasi.pages.petugas.index', $data);
	}

	public function show($id)
	{
		$data_get = $this->pengguna_model->get_data_petugas($id);
		$data = array(
			'info' => $data_get,
			'activeMenu' => 'petugas',
            'title' => 'Tampil Petugas #'.$id
        );
		$this->slice->view('entities.petugasadministrasi.pages.petugas.show', $data);
	}

	public function edit($id) {
		$data_get = $this->pengguna_model->get_data_petugas($id);
		if (empty($data_get)) {
			redirect('petugasadministrasi/petugas');
		}
		$data = array(
			'info' => $data_get,
            'title' => 'Ubah Petugas #'.$id
        );
		$this->slice->view('entities.petugasadministrasi.pages.petugas.form', $data);
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
			redirect('petugasadministrasi/petugas/edit/'.$id);
		} else {
			$this->pengguna_model->update_petugas($id);
			$this->session->set_flashdata('success', 'Petugas #'.$id.' telah diperbaharui');
			redirect('petugasadministrasi/petugas');
		}
	}

	public function destroy($id)
	{
		$this->pengguna_model->destroy_petugas($id);
		$this->session->set_flashdata('success', 'Petugas #'.$id.' telah terhapus');
		redirect('petugasadministrasi/petugas');
	}

}
