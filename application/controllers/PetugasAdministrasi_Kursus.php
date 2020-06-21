<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PetugasAdministrasi_Kursus extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->status != "PetugasAdministrasi") {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data_get = $this->kursus_model->get_list();
		$data = array(
			'info' => $data_get,
			'activeMenu' => 'kursus',
            'title' => 'Kursus'
        );
		$this->slice->view('entities.petugasadministrasi.pages.kursus.index', $data);
	}

	public function create()
	{
		$data_get = $this->pengguna_model->get_list_instruktur();
		$data = array(
			'info_instruktur' => $data_get,
            'title' => 'Tambah Kursus Baru'
        );
		$this->slice->view('entities.petugasadministrasi.pages.kursus.form', $data);
	}

	public function store()
	{
		$this->form_validation->set_rules('nama', 'Nama Kursus', 'required');
		$this->form_validation->set_rules('tingkat_edukasi', 'Tingkat Edukasi', 'required');
		$this->form_validation->set_rules('id_instruktur', 'ID Instruktur', 'required');

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('petugasadministrasi/kursus/create');
		} else {
			$this->kursus_model->store();
			$this->session->set_flashdata('success', 'Kursus baru telah ditambahkan');
			redirect('petugasadministrasi/kursus');
		}
	}
	
	public function show($id)
	{
		$data_get1 = $this->kursus_model->get_data($id);
		$data_get2 = $this->materi_model->get_list($id);
		$data = array(
			'info' => $data_get1,
			'info2' => $data_get2,
			'activeMenu' => 'kursus',
            'title' => 'Tampil Kursus'
        );
		$this->slice->view('entities.petugasadministrasi.pages.kursus.show', $data);
	}

	public function edit($id) {
		$data_get = $this->kursus_model->get_data($id);
		if (empty($data_get)) {
			redirect('kursus');
		}
		$data = array(
			'info' => $data_get,
            'title' => 'Ubah Kursus #'.$id
        );
		$this->slice->view('entities.petugasadministrasi.pages.kursus.form', $data);
	}

	public function update($id)
	{
		$this->form_validation->set_rules('nama_kursus', 'Nama Kursus', 'required');
		$this->form_validation->set_rules('tingkat_edukasi', 'Tingkat Edukasi', 'required');
		$this->form_validation->set_rules('id_instruktur', 'ID Instruktur', 'required');

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('petugasadministrasi/kursus/edit/'.$id);
		} else {
			$this->kursus_model->update($id);
			$this->session->set_flashdata('success', 'Kursus #'.$id.' telah diperbaharui');
			redirect('petugasadministrasi/kursus');
		}
	}

	public function destroy($id)
	{
		$this->kursus_model->destroy($id);
		$this->session->set_flashdata('success', 'Kursus #'.$id.' telah terhapus');
		redirect('petugasadministrasi/kursus');
	}

	public function materi($id)
	{
		$data_get = $this->materi_model->get_data($id);
		$data = array(
			'info_materi' => $data_get,
			'activeMenu' => 'kursus',
            'title' => 'Tampil Materi #'.$data_get->id
        );
		$this->slice->view('entities.petugasadministrasi.pages.kursus.materi', $data);
	}

}
