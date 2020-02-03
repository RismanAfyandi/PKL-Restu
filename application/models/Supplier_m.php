<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_m extends CI_Model {

	public function get($id=null)
	{
		$this->db->from('tb_supplier');
		if($id != null) {
			$this->db->where('sup_id', $id);

		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
		'nm_sup'=> $post['nm_sup'],
		'alamat'=> $post['alamat']
		];
		$this->db->insert('tb_supplier', $params);
	}

	public function edit($post)
	{
		$params = [
		'nm_sup'=> $post['nm_sup'],
		'alamat'=> $post['alamat']
		];
		$this->db->where('sup_id', $post['sup_id']);
		$this->db->update('tb_supplier', $params);
	}

	public function del($id)
	{
		$this->db->where('sup_id', $id);
		$this->db->delete('tb_supplier');
	}
}