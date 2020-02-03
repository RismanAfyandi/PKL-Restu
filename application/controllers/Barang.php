<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

public function index()
	{
		$this->load->model('barang_m');
		$data['row'] = $this->barang_m->get();
		$this->template->load('template', 'barang/barang_data', $data);

	}

public function add()
	{
		$this->load->model('barang_m');
		$data['row'] = $this->barang_m->get();
		$this->template->load('template', 'barang/barang_add', $data);
	}

public function edit($id)
	{
		$this->load->model('barang_m');
		$data['row'] = $this->barang_m->get();
		$query = $this->barang_m->get($id);
		if($query->num_rows() > 0) {
			$barang = $query->row();
			$data = array(
				'row' => $barang
			);
		$this->template->load('template', 'barang/barang_edit', $data);
		}
	}

	public function del($id) 
	{
		$this->load->model('barang_m');
		$this->barang_m->del($id);
		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data Berhasil Dihapus');</script>";
		}
		echo "<script>window.location='".site_url('barang')."';</script>";
	}

	public function process()
	{
		$this->load->model('barang_m');
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->barang_m->add($post);
		} else if (isset($_POST['edit'])) {
			$this->barang_m->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data Berhasil Disimpan');</script>";
		} 
		echo "<script>window.location='".site_url('barang')."';</script>";
	}

}