<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HistoriBarangKeluar extends CI_Controller {

	public function index()
	{
		$this->load->view('brg_keluar');
	}
}