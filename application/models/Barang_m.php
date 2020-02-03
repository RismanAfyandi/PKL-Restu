<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_m extends CI_Model {

	public function get($id=null)
	{
		$this->db->from('tb_brg_master');
		$this->db->join('tb_kategori', 'tb_kategori.kat_id = tb_brg_master.kat_id');
		if($id != null) {
			$this->db->where('kd_bar', $id);

		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
		'kd_bar'=> $post['kd_bar'],
		'nm_bar'=> $post['nm_bar'],
		'stok'=> $post['stok'],
		'kat_id'=> $post['kat_id'],
		'hjual'=> $post['hjual'],
		'hbeli'=> $post['hbeli']
		
		];
		$this->db->insert('tb_brg_master', $params);
	}

	public function edit($post)
	{
		$params = [
		'nm_bar'=> $post['nm_bar'],
		'stok'=> $post['stok'],
		'kat_id'=> $post['kat_id'],
		'hjual'=> $post['hjual'],
		'hbeli'=> $post['hbeli']
		];
		$this->db->where('kd_bar', $post['kd_bar']);
		$this->db->update('tb_brg_master', $params);
	}

	public function del($id)
	{
		$this->db->where('kd_bar', $id);
		$this->db->delete('tb_brg_master');
	}

}