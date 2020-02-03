<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_m extends CI_Model {

	public function get($id=null)
	{	
		$query = $this->db->query("SELECT * FROM view_invoice WHERE status = 'LUNAS' OR status = 'CASH'");
		return $query;

	}

	public function getPiutang($id=null)
	{
		$query = $this->db->query("SELECT * FROM tb_invo_serv JOIN tb_service ON tb_invo_serv.kd_serv = tb_service.kd_serv AND tb_invo_serv.status = 'PIUTANG'");
		return $query;
	}

	public function add($post)
	{	

		$params = [	
		'invoice'=> $post['invoice'],
		'tgl_transaksi'=> $post['tgl_transaksi'],
		'kd_serv'=> $post['kd_serv'],
		'biaya'=> $post['biaya'],
		'tindakan'=> $post['tindakan'],
		'status'=> $post['status']
		];
		$this->db->insert('tb_invo_serv', $params);

		$status = "KELUAR";
		$array = [
			'status' => $status,
			'tgl_keluar' => DATE('Y-m-d')
		];
		$this->db->where('kd_serv', $post['kd_serv']);
		$this->db->update('tb_service', $array);

	}

	public function getMax($prefix= null, $table=null, $field=null)

	{
		$this->db->select('invoice');
		$this->db->like($field, $prefix, 'after');
		$this->db->order_by($field, 'desc');
		$this->db->limit(1);

		return $this->db->get($table)->row_array()[$field];
	}

	public function getSum()
	{
		$query = "SELECT sum(biaya) as total from view_invoice WHERE status = 'LUNAS' or status ='CASH'";
		$result = $this->db->query($query);
		return $result->row()->total;

	}
}