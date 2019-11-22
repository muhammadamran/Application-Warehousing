<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanPengeluaranBarang extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_MasterData');
	}

	public function index()
	{	
		$tgl_awal = $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir');
		$data = array(
			'laporan' => $this->M_MasterData->search_laporanpenolakan($tgl_awal,$tgl_akhir)
		);
		$this->load->view('lprn_pg_brg',$data);
	}
}