<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instruktur_Kursus extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->status != "Instruktur") {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data_get = $this->kursus_model->get_list();
		$data = array(
			'info_kursus' => $data_get,
			'activeMenu' => 'kursus',
            'title' => 'Kursus'
        );
		$this->slice->view('entities.instruktur.pages.kursus.index', $data);
	}

	public function create_materi($id)
	{
		$data = array(
			'id_kursus' => $id,
			'title' => 'Tambah Materi Baru'
        );
		$this->slice->view('entities.instruktur.pages.kursus.form_materi', $data);
	}

	public function store_materi()
	{
		$this->form_validation->set_rules('id_kursus', 'ID Kursus', 'required');
		$this->form_validation->set_rules('judul', 'Judul Materi', 'required');
		$this->form_validation->set_rules('deskripsi', 'Harga', 'required');
		$this->form_validation->set_rules('konten', 'Konten', 'required');
		$this->form_validation->set_rules('video', 'Video URL', 'required');

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('instruktur/kursus/materi/create');
		} else {
			$this->materi_model->store();
			$this->session->set_flashdata('success', 'Materi baru telah ditambahkan');
			redirect('instruktur');
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
		$this->slice->view('entities.instruktur.pages.kursus.show', $data);
	}

	public function show_materi($id,$id2)
	{
		$data_get1 = $this->materi_model->get_data($id);
		$data = array(
			'info' => $data_get1,
			'id_kursus' => $id2,
			'activeMenu' => 'kursus',
            'title' => 'Tampil Materi'
        );
		$this->slice->view('entities.instruktur.pages.kursus.materi', $data);
	}

	public function edit_materi($id,$id2) {
		$data_get = $this->materi_model->get_data($id);
		if (empty($data_get)) {
			redirect('instruktur');
		}
		$data = array(
			'info' => $data_get,
			'id_kursus' => $id2,
            'title' => 'Ubah Materi #'.$id
        );
		$this->slice->view('entities.instruktur.pages.kursus.form_materi', $data);
	}

	public function update_materi($id,$id2)
	{
		$this->form_validation->set_rules('id_kursus', 'ID Kursus', 'required');
		$this->form_validation->set_rules('judul', 'Judul Materi', 'required');
		$this->form_validation->set_rules('deskripsi', 'Harga', 'required');
		$this->form_validation->set_rules('konten', 'Konten', 'required');
		$this->form_validation->set_rules('video', 'Video URL', 'required');

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('instruktur/kursus/materi/edit/'.$id);
		} else {
			$this->materi_model->update($id);
			$this->session->set_flashdata('success', 'Materi #'.$id.' telah diperbaharui');
			redirect('instruktur');
		}
	}

	public function destroy_materi($id)
	{
		$this->materi_model->destroy($id);
		$this->session->set_flashdata('success', 'Materi #'.$id.' telah terhapus');
		redirect('instruktur');
	}


}
