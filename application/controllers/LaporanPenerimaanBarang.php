<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanPenerimaanBarang extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_MasterData');
	}

	public function index()
	{	
		$tgl_awal = $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir');
		$data = array(
			'laporan' => $this->M_MasterData->search_laporanpenrimaan($tgl_awal,$tgl_akhir)
		);
		$this->load->view('lprn_pn_brg',$data);
	}
}