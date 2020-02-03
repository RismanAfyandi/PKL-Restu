<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Report extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('invoice_m');
    //Codeigniter : Write Less Do More
  }
  function index()
  {
    $this->load->library('pdfgenerator');
    $data['sum'] = $this->invoice_m->getSum();
	  $data['row'] = $this->invoice_m->get();
    // $data['sum'] = $this->invoice_m->getSum();
    $html = $this->load->view('report/table_report', $data, true);
    $filename = 'report_'.time();
    $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
  }
}