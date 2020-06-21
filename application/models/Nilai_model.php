<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_list($search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->get('nilai');
			return $query->result();
		}
	}

	public function get_list_pelajar_nilai($id, $search = FALSE)
	{
		if ($search === FALSE) {
			$this->db->where('id_pelajar', $id);
			$query = $this->db->get('nilai');
			return $query->result();
		}
	}

	public function get_list_kursus_nilai($search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->get('nilai');
			return $query->result();
		}
	}

	public function get_data($info)
	{
		$query = $this->db->get_where('nilai', array('id' => $info));
		return $query->row();
	}

	public function store()
	{
		$data = array(
			'id_pelajar' => $this->input->post('id_pelajar'),
			'id_materi' => $this->input->post('id_materi'),
			'nilai_akhir' => $this->input->post('nilai_akhir')
		);
		return $this->db->insert('nilai', $data);
	}

	public function update($id)
	{
		$data = array(
			'id_pelajar' => $this->input->post('id_pelajar'),
			'id_materi' => $this->input->post('id_materi'),
			'nilai_akhir' => $this->input->post('nilai_akhir')
		);
		$this->db->where('nilai', $id);
		return $this->db->update('nilai', $data);
	}

	public function destroy($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('nilai');
		return true;
	}

}
