<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kursus_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_list_pelajar($id_pengguna, $search = FALSE)
	{
		if ($search === FALSE) {
			$this->db->select("*");
			$this->db->from("kursuspelajar");
			$this->db->join("kursus", "kursus.id = kursuspelajar.id_kursus");
			$this->db->join("pelajar", "pelajar.id = kursuspelajar.id_pelajar");
			$this->db->join("pengguna", "pengguna.id = pelajar.id_pengguna");
			$this->db->where('kursuspelajar.id_pelajar =', $id_pengguna);
			$query = $this->db->get();
			return $query->result();
		}
	}

	public function get_list($search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->get('kursus');
			return $query->result();
		}
	}

	public function get_data($info)
	{
		$query = $this->db->get_where('kursus', array('id' => $info));
		return $query->row();
	}

	public function store()
	{
		$data = array(
			'id_instruktur' => $this->input->post('id_instruktur'),
			'nama' => $this->input->post('nama'),
			'tingkat_edukasi' => $this->input->post('tingkat_edukasi')
		);
		return $this->db->insert('kursus', $data);
	}

	public function update($id)
	{
		$data = array(
			'id_instruktur' => $this->input->post('id_instruktur'),
			'nama' => $this->input->post('nama'),
			'tingkat_edukasi' => $this->input->post('tingkat_edukasi')
		);
		$this->db->where('kursus', $id);
		return $this->db->update('kursus', $data);
	}

	public function destroy($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('kursus');
		return true;
	}

}
