<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

public function index()
	{
		$this->load->model('supplier_m');
		$data['row'] = $this->supplier_m->get();
		$this->template->load('template', 'supplier/supplier_data', $data);

	}

public function add()
	{
		$supplier = new StdClass();
		$supplier->sup_id=null;
		$supplier->nm_sup=null;
		$supplier->alamat=null;
		$data = array(
				'row' => $supplier
				);
		$this->load->model('supplier_m');
		$data['row'] = $this->supplier_m->get();
		$this->template->load('template', 'supplier/supplier_add', $data);
	}

public function edit($id)
	{
		$this->load->model('supplier_m');
		$query = $this->supplier_m->get($id);
		if($query->num_rows() > 0) {
			$supplier = $query->row();
			$data = array(
				'row' => $supplier
			);
		$this->template->load('template', 'supplier/supplier_edit', $data);
		}
	}

	public function del($id) 
	{
		$this->load->model('supplier_m');
		$this->supplier_m->del($id);
		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data Berhasil Dihapus');</script>";
		}
		echo "<script>window.location='".site_url('supplier')."';</script>";
	}

	public function process()
	{
		$this->load->model('supplier_m');
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->supplier_m->add($post);
		} else if (isset($_POST['edit'])) {
			$this->supplier_m->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data Berhasil Disimpan');</script>";
		} 
		echo "<script>window.location='".site_url('supplier')."';</script>";
	}

}