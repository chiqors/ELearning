<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_list_all($search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->get('materi');
			return $query->result();
		}
	}

	public function get_list($id, $search = FALSE)
	{
		if ($search === FALSE) {
			$this->db->where('id_kursus', $id);
			$query = $this->db->get('materi');
			return $query->result();
		}
	}

	public function get_data($info)
	{
		$query = $this->db->get_where('materi', array('id' => $info));
		return $query->row();
	}

	public function store()
	{
		$data = array(
			'id_kursus' => $this->input->post('id_kursus'),
			'judul' => $this->input->post('judul'),
			'deskripsi' => $this->input->post('deskripsi'),
			'konten' => $this->input->post('konten'),
			'video' => $this->input->post('video')
		);
		return $this->db->insert('materi', $data);
	}

	public function update($id)
	{
		$data = array(
			'id_kursus' => $this->input->post('id_kursus'),
			'judul' => $this->input->post('judul'),
			'deskripsi' => $this->input->post('deskripsi'),
			'konten' => $this->input->post('konten'),
			'video' => $this->input->post('video')
		);
		$this->db->where('materi', $id);
		return $this->db->update('materi', $data);
	}

	public function destroy($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('materi');
		return true;
	}

}
