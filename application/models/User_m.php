<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

	public function login($post) 
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('user', $post['user']);
		$this->db->where('pass', md5($post['pass']));
		$query = $this->db->get();
		return $query;
	}
}