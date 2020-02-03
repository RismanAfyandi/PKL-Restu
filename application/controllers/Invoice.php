<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class invoice extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model(['invoice_m', 'service_m']);
		
	}

	
	public function index()
	{
		$data['row'] = $this->invoice_m->get();
		$this->template->load('template', 'invoice/invo_data', $data);
	}

	public function add()
	{
		$table = "tb_invo_serv";
		$field = "invoice";
		$today = date('dmy');

		$prefix = "INS" . $today;
		$lastkode = $this->invoice_m->getMax($prefix, $table, $field);
		;

		$noUrut = (int) substr($lastkode, -4, 4);
		$noUrut++;


		$newkode = $prefix . sprintf('%04s',$noUrut);
		$result = print_r($newkode, true);

		$service = $this->service_m->getServiceSelesai()->result();
		$data = ['service' => $service];
		$data['kode'] = $result;

		
		$this->template->load('template', 'invoice/invo_serv', $data);
		}

	public function piutang()
	{
		$data['row'] = $this->invoice_m->getPiutang();
		$this->template->load('template', 'invoice/piutang_data', $data);
	}

		

	public function process()
	{
		$post = $this->input->post(null, TRUE);	
		if (isset($_POST['add'])) {
			$this->invoice_m->add($post);
			if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Pembayaran berhasil di simpan');</script>";
		} echo "<script>window.location='".site_url('invoice')."';</script>";
	} 
	}
}