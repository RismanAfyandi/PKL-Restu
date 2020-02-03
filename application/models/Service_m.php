<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_m extends CI_Model {

	public function get($id=null)
	{
		$this->db->from('tb_service');
		if($id != null) {
			$this->db->where('kd_serv', $id);

		}
		$query = $this->db->get();
		return $query;
	}

	public function getServiceBaru()
	{	
		$query = $this->db->query("SELECT * FROM tb_service WHERE status = 'BARU'");
		return $query;
	}
	public function getServiceSelesai()
	{	
		$query = $this->db->query("SELECT * FROM tb_service WHERE status = 'SELESAI'");
		return $query;
	}
	public function getServiceProses()
	{	
		$query = $this->db->query("SELECT * FROM tb_service WHERE status = 'PROSES'");
		return $query;
	}

	public function getServiceKeluar()
	{	
		$query = $this->db->query("SELECT * FROM tb_service WHERE status = 'KELUAR'");
		return $query;
	}

	public function getServiceCancel()
	{	
		$query = $this->db->query("SELECT * FROM tb_service WHERE status = 'CANCEL'");
		return $query;
	}

	

	public function add($post)
	{	
		$status = "BARU";
		$params = [	
		'kd_serv'=> $post['kd_serv'],
		'nm_pel'=> $post['nm_pel'],
		'no_telp'=> $post['no_telp'],
		'tgl_masuk'=> $post['tgl_masuk'],
		'tipe'=> $post['tipe'],
		'kelengkapan'=> $post['kelengkapan'],
		'keluhan'=> $post['keluhan'],
		'status' => $status		
		];
		$this->db->insert('tb_service', $params);
	}

	public function update($post)
	{	
		$status = "PROSES";
		$params = [
			'ket' => $post['ket'],
			'status' => $status
		];
		$this->db->where('kd_serv', $post['kd_serv']);
		$this->db->update('tb_service', $params);
	}

	public function selesai($post)
	{	
		$status = "SELESAI";
		$params = [
			'ket' => $post['ket'],
			'status' => $status,
			'tgl_selesai' => DATE('Y-m-d')
		];
		$this->db->where('kd_serv', $post['kd_serv']);
		$this->db->update('tb_service', $params);
	}

	public function cancel($post)
	{	
		$status = "CANCEL";
		$params = [
			'ket' => $post['ket'],
			'status' => $status
		];
		$this->db->where('kd_serv', $post['kd_serv']);
		$this->db->update('tb_service', $params);
	}

	public function getMax($table=null, $field=null)

	{
		$this->db->select_max($field);
		return $this->db->get($table)->row_array()[$field];
	}

	
	// public function getKode()
	// {
	// 	$this->db->query("SELECT RIGHT(kd_serv, 4) AS kd_serv FROM tb_service_master", FALSE);
	// 	$this->db->order_by('kd_serv','Desc');
	// 	$this->db->limit(1);
	// 	$query = $this->db->get('tb_service_master');
	// 	if ($query->num_rows() <> 0 ) {
	// 		$data = $query->row();
	// 		$kode = intval($data->kd_serv) + 1;
	// 	} else {
	// 		$kode = 1;
	// 	}
	// 	$batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
	// 	$kodetampil = "serv".$batas;
	// 	return $kodetampil;
	// }
	

}