<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_list_pelajar($search = FALSE)
	{
		if ($search === FALSE) {
			$this->db->select("pengguna.id, username, nama_lengkap, kontak");
			$this->db->from("pengguna");
			$this->db->join("pelajar", "pengguna.id = pelajar.id_pengguna");
			$query = $this->db->get();
			return $query->result();
		}
	}

	public function get_list_instruktur($search = FALSE)
	{
		if ($search === FALSE) {
			$this->db->select("pengguna.id, username, nama_lengkap, kontak");
			$this->db->from("pengguna");
			$this->db->join("instruktur", "pengguna.id = instruktur.id_pengguna");
			$query = $this->db->get();
			return $query->result();
		}
	}

	public function get_list_petugas($search = FALSE)
	{
		if ($search === FALSE) {
			$this->db->select("pengguna.id, username, nama_lengkap, kontak");
			$this->db->from("pengguna");
			$this->db->join("petugasadministrasi", "pengguna.id = petugasadministrasi.id_pengguna");
			$query = $this->db->get();
			return $query->result();
		}
	}

	public function do_login()
	{
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$query = $this->db->get('pengguna');
		return $query->row();
	}

	public function do_register1()
	{
		$data1 = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'status' => 'Pelajar'
		);
		$this->db->insert('pengguna', $data1);
		return $this->db->insert_id();
	}

	public function do_register2($id_pengguna)
	{
		$data = array(
			'id_pengguna' => $id_pengguna,
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'kontak' => $this->input->post('kontak'),
		);
		$this->db->insert('pelajar', $data);
	}

	public function get_data_pelajar($info)
	{
		$this->db->select("pengguna.id, username, status, nama_lengkap, jenis_kelamin, tempat_tanggal_lahir, alamat, kontak");
		$this->db->from("pengguna");
		$this->db->join("pelajar", "pengguna.id = pelajar.id_pengguna");
		$this->db->where('pengguna.id =', $info);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_data_instruktur($info)
	{
		$this->db->select("pengguna.id, username, status, nama_lengkap, jenis_kelamin, tempat_tanggal_lahir, alamat, kontak, pendidikan_terakhir");
		$this->db->from("pengguna");
		$this->db->join("instruktur", "pengguna.id = instruktur.id_pengguna");
		$this->db->where('pengguna.id =', $info);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_data_petugas($info)
	{
		$this->db->select("pengguna.id, username, status, nama_lengkap, jenis_kelamin, tempat_tanggal_lahir, alamat, kontak");
		$this->db->from("pengguna");
		$this->db->join("petugasadministrasi", "pengguna.id = petugasadministrasi.id_pengguna");
		$this->db->where('pengguna.id =', $info);
		$query = $this->db->get();
		return $query->row();
	}

	public function store()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'status' => $this->input->post('status')
		);
		$this->db->insert('pengguna', $data);
		return $this->db->insert_id();
	}

	public function update($id)
	{
		$data = array(
			'password' => md5($this->input->post('password'))
		);
		$this->db->where('id', $id);
		return $this->db->update('pengguna', $data);
	}

	public function destroy($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('pengguna');
		return true;
	}

	// PELAJAR

	public function store_pelajar($id)
	{
		$data = array(
			'id_pengguna' => $id,
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tempat_tanggal_lahir' => $this->input->post('tempat_tanggal_lahir'),
			'alamat' => $this->input->post('alamat'),
			'kontak' => $this->input->post('kontak'),
		);
		$this->db->insert('pelajar', $data);
	}

	public function update_pelajar($id)
	{
		$data = array(
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tempat_tanggal_lahir' => $this->input->post('tempat_tanggal_lahir'),
			'alamat' => $this->input->post('alamat'),
			'kontak' => $this->input->post('kontak'),
		);
		$this->db->where('id', $id);
		return $this->db->update('pelajar', $data);
	}

	public function destroy_pelajar($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('pelajar');
		return true;
	}

	// INSTRUKTUR

	public function store_instruktur($id)
	{
		$data = array(
			'id_pengguna' => $id,
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tempat_tanggal_lahir' => $this->input->post('tempat_tanggal_lahir'),
			'alamat' => $this->input->post('alamat'),
			'kontak' => $this->input->post('kontak'),
		);
		$this->db->insert('instruktur', $data);
	}

	public function update_instruktur($id)
	{
		$data = array(
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tempat_tanggal_lahir' => $this->input->post('tempat_tanggal_lahir'),
			'alamat' => $this->input->post('alamat'),
			'kontak' => $this->input->post('kontak'),
		);
		$this->db->where('id', $id);
		return $this->db->update('instruktur', $data);
	}

	public function destroy_instruktur($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('instruktur');
		return true;
	}

	// PETUGAS

	public function store_petugas($id)
	{
		$data = array(
			'id_pengguna' => $id,
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tempat_tanggal_lahir' => $this->input->post('tempat_tanggal_lahir'),
			'alamat' => $this->input->post('alamat'),
			'kontak' => $this->input->post('kontak'),
		);
		$this->db->insert('petugas', $data);
	}

	public function update_petugas($id)
	{
		$data = array(
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tempat_tanggal_lahir' => $this->input->post('tempat_tanggal_lahir'),
			'alamat' => $this->input->post('alamat'),
			'kontak' => $this->input->post('kontak'),
		);
		$this->db->where('id', $id);
		return $this->db->update('petugas', $data);
	}

	public function destroy_petugas($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('petugas');
		return true;
	}

}
