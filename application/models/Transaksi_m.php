<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_m extends CI_Model {

		public function getMax($prefix= null, $table=null, $field=null)

	{
		$this->db->select('invoice');
		$this->db->like($field, $prefix, 'after');
		$this->db->order_by($field, 'desc');
		$this->db->limit(1);

		return $this->db->get($table)->row_array()[$field];
	}
}
