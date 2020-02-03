<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(['barang_m', 'transaksi_m']);
		
	}

	public function jual()
	{
		
		$table = "tb_jual";
		$field = "invoice";
		$today = date('dmy');

		$prefix = "INP" . $today;
		$lastkode = $this->transaksi_m->getMax($prefix, $table, $field);
		;

		$noUrut = (int) substr($lastkode, -4, 4);
		$noUrut++;


		$newkode = $prefix . sprintf('%04s',$noUrut);
		$result = print_r($newkode, true);

		$barang = $this->barang_m->get()->result();
		$data = ['barang' => $barang];
		$data['kode'] = $result;
		$this->template->load('template', 'transaksi/jual', $data);
	}
	
	function add()
	{
		//Untuk nge get data JSON yang dikrimkan dari view melalui Javascript / Ajax
		$dataTransaksi = json_decode(file_get_contents('php://input'));

		$data = array(
			"invoice" => $dataTransaksi->invoice,
			"tanggal" => $dataTransaksi->tanggal,
			"user_id" => $dataTransaksi->user_id,
			"nm_pel" => $dataTransaksi->nm_pel,
			"tot_har" => $dataTransaksi->tot_har,
			"tot_bay" => $dataTransaksi->tot_bay,
			"tot_kem" => $dataTransaksi->tot_kem,
			"tot_pot" => $dataTransaksi->tot_pot
		);
		
		$this->db->insert("tb_jual", $data);

		if($this->db->affected_rows() == 1) {
			$totalData = count($dataTransaksi->kd_bar); //Fungsi ini digunakan untuk menghitung berapa banyak jumlah data array nya

			// Untuk Menampung Data Array
			$kdBar = $dataTransaksi->kd_bar; 
			$qty = $dataTransaksi->qty;
			$hJual = $dataTransaksi->hjual;
			$pot = $dataTransaksi->pot;

			//Looping data yang ada dalam array untuk di insert ke table detail
			for ($i=0; $i < $totalData ; $i++) { 
				$dataDetail = array(
					"invoice" => $dataTransaksi->invoice,
					"kd_bar" => $kdBar[$i],
					"qty" => $qty[$i],
					"harga" => $hJual[$i],
					"pot" => $pot[$i]
				);

				$this->db->insert("tb_jual_detail", $dataDetail);
			}
		}
	}

	// function view()
	// {
	// 	$this->load->library("cart");
	// 	$output = '';
	// 	// $output .= '
	// 	// ';
	// 	$count = 0;
	// 	foreach ($this->cart->contens as $items) {

	// 		$count++;
	// 		$output .= '
	// 		<tr>
	// 			<td>'.$items["kd_bar"].'</td>
	// 			<td>'.$items["nm_bar"].'</td>
	// 			<td>'.$items["hjual"].'</td>
	// 			<td>'.$items["qty"].'</td>
	// 			<td>'.$items["pot"].'</td>
	// 		';
	// 	}
	// 	if ($count == 0) {
	// 		$output = 'Cart Is Empty';
	// 	}
	// 	return $output;
	// }
}