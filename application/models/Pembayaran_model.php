<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_list($search = FALSE)
	{
		if ($search === FALSE) {
			
			$this->db->select("pembayaran.id, pelajar.nama_lengkap AS pelajar_username, petugasadministrasi.nama_lengkap AS petugas_username, tanggal, nominal, nama_pembayaran");
			$this->db->from("pembayaran");
			$this->db->join("pelajar", "pembayaran.id_pelajar = pelajar.id", "left");
			$this->db->join("petugasadministrasi", "pembayaran.id_petugas = petugasadministrasi.id","left outer");
			$query = $this->db->get();
			return $query->result();
		}
	}

	public function get_data($info)
	{
		$query = $this->db->get_where('pembayaran', array('id' => $info));
		return $query->row();
	}

	public function store()
	{
		$data = array(
			'id_pelajar' => $this->input->post('id_pelajar'),
			'id_petugas' => $this->input->post('id_petugas'),
			'tanggal' => $this->input->post('tanggal'),
			'nominal' => $this->input->post('nominal'),
			'nama_pembayaran' => $this->input->post('nama_pembayaran')
		);
		return $this->db->insert('pembayaran', $data);
	}

	public function update($id)
	{
		$data = array(
			'id_pelajar' => $this->input->post('id_pelajar'),
			'id_petugas' => $this->input->post('id_petugas'),
			'tanggal' => $this->input->post('tanggal'),
			'nominal' => $this->input->post('nominal'),
			'nama_pembayaran' => $this->input->post('nama_pembayaran')
		);
		$this->db->where('pembayaran', $id);
		return $this->db->update('pembayaran', $data);
	}

	public function accept($id,$id_petugas)
	{
		$data = array(
			'id_petugas' => $id_petugas,
		);
		$this->db->where('id', $id);
		return $this->db->update('pembayaran', $data);
	}

	public function destroy($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('pembayaran');
		return true;
	}

}
