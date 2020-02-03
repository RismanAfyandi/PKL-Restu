<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_m extends CI_Model {

	public function get($id=null)
	{
		$this->db->from('tb_kategori');
		if($id != null) {
			$this->db->where('kat_id', $id);

		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
		'nm_kat'=> $post['nm_kat']
		
		];
		$this->db->insert('tb_kategori', $params);
	}

	public function edit($post)
	{
		$params = [
		'nm_kat'=> $post['nm_kat']
		
		];
		$this->db->where('kat_id', $post['kat_id']);
		$this->db->update('tb_kategori', $params);
	}

	public function del($id)
	{
		$this->db->where('kat_id', $id);
		$this->db->delete('tb_kategori');
	}
}