<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

public function index()
	{
		$this->load->model('kategori_m');
		$data['row'] = $this->kategori_m->get();
		$this->template->load('template', 'kategori/kategori_data', $data);

	}

public function add()
	{
		$kategori = new StdClass();
		$kategori->kat_id=null;
		$kategori->nm_kat=null;
		$data = array(
				'row' => $kategori
				);
		$this->load->model('kategori_m');
		$data['row'] = $this->kategori_m->get();
		$this->template->load('template', 'kategori/kategori_add', $data);
	}

public function edit($id)
	{
		$this->load->model('kategori_m');
		$query = $this->kategori_m->get($id);
		if($query->num_rows() > 0) {
			$kategori = $query->row();
			$data = array(
				'row' => $kategori
			);
		$this->template->load('template', 'kategori/kategori_edit', $data);
		}
	}

public function process()
	{
		$this->load->model('kategori_m');
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->kategori_m->add($post);
		} else if (isset($_POST['edit'])) {
			$this->kategori_m->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data Berhasil Disimpan');</script>";
		} 
		echo "<script>window.location='".site_url('kategori')."';</script>";
	}
	public function del($id) 
	{
		$this->load->model('kategori_m');
		$this->kategori_m->del($id);
		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data Berhasil Dihapus');</script>";
		}
		echo "<script>window.location='".site_url('kategori')."';</script>";
	}

}