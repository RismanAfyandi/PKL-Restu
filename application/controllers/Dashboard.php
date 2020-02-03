<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(['invoice_m', 'service_m']);
		
	}

	public function index()
	{
		$this->template->load('template', 'dashboard');
	}

	public function getServiceBaru()
	{
		$this->db->query("SELECT COUNT(*) FROM tb_service WHERE status = 'BARU'");
		return $this->db->get();
	}
}
