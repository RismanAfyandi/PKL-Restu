<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('service_m');
		
	}

	public function index()
	{
		
		$data['row'] = $this->service_m->getServiceBaru();
		$this->template->load('template', 'service/service_data_baru', $data);

	}

	public function selesai()
	{
		
		$data['row'] = $this->service_m->getServiceSelesai();
		$this->template->load('template', 'service/service_data_selesai', $data);
	}

	public function proses()
	{
		
		$data['row'] = $this->service_m->getServiceProses();
		$this->template->load('template', 'service/service_data_proses', $data);
	}

	public function keluar()
	{
		
		$data['row'] = $this->service_m->getServiceKeluar();
		$this->template->load('template', 'service/service_data_keluar', $data);
	}

	public function batal()
	{
		
		$data['row'] = $this->service_m->getServiceCancel();
		$this->template->load('template', 'service/service_data_batal', $data);
	}
	public function add()
	{
		$table = "tb_service";
		$field = "kd_serv";

		$lastkode = $this->service_m->getMax($table, $field);

		$noUrut = (int) substr($lastkode, -4, 4);
		$noUrut++;
		$str = "serv";


		$newkode = $str . sprintf('%04s',$noUrut);
		$result = print_r($newkode, true);


		$service = new StdClass();
		$service->nm_pel=null;
		$service->no_telp=null;
		$service->tgl_masuk=null;
		$service->tipe=null;
		$service->kelengkapan=null;
		$service->keluhan=null;
		$service->status=null;
		$service->kode=$result;
		$data = array(
				'row' => $service
				);
		$this->template->load('template', 'service/service_masuk', $data);

	}

	

	public function update($id)
	{
		
		$query = $this->service_m->get($id);
		if($query->num_rows() > 0) {
			$service = $query->row();
			$data = array(
				'row' => $service
			);
		$this->template->load('template', 'service/service_update', $data);
		}
	}

	public function clear($id)
	{
		
		$query = $this->service_m->get($id);
		if($query->num_rows() > 0) {
			$service = $query->row();
			$data = array(
				'row' => $service
			);
		$this->template->load('template', 'service/service_selesai', $data);
		}
	}

	public function cancel($id)
	{
		
		$query = $this->service_m->get($id);
		if($query->num_rows() > 0) {
			$service = $query->row();
			$data = array(
				'row' => $service
			);
		$this->template->load('template', 'service/service_selesai', $data);
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->service_m->add($post);
			if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data Berhasil Disimpan');</script>";
		} echo "<script>window.location='".site_url('service')."';</script>";
		} else if (isset($_POST['update'])) {
			$this->service_m->update($post);
			if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data Berhasil Di Update');</script>";
		} echo "<script>window.location='".site_url('service/proses')."';</script>"; 
		} else if (isset($_POST['selesai'])) {
			$this->service_m->selesai($post);
			if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data Berhasil Di Selesaikan');</script>";
		} echo "<script>window.location='".site_url('service/selesai')."';</script>"; 
		} else if (isset($_POST['cancel'])) {
			$this->service_m->cancel($post);
			if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data Berhasil Di Cancel');</script>";
		} echo "<script>window.location='".site_url('service/batal')."';</script>"; 
		}
			
		}

	


	// public function ambilKode() 
	// {

	// 	
	// 	$data['getKode'] = $this->service_m->getKode();
	// 	$data['tampil'] = $this->db->get('tb_service_master')->result();

	// }
}
