<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenolakanBarang extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_MasterData');
	}

	public function index()
	{	
		$barang = $this->M_MasterData->get_barangtiga();
		$data = array(
			'barang'=>$barang
		);
		$this->load->view('pnk_brg',$data);
	}

	public function create()
	{
		if(isset($_POST['submit']))
		{
			$kd_barang = $this->input->post('kd_barang');
			$nama_barang = $this->input->post('nama_barang');
			$nama_vendor = $this->input->post('nama_vendor');
			$jumlah = $this->input->post('jumlah');
			$keterangan = $this->input->post('keterangan');
			// var_dump($_POST);die();

			$data = array(
				'kd_barang' => $kd_barang,
				'nama_barang' => $nama_barang,
				'nama_vendor' => $nama_vendor,
				'jumlah' => $jumlah,
				'keterangan' => $keterangan
			);
			$this->M_MasterData->input_penolakan('tb_penolakan', $data);
		} 
		redirect('PenolakanBarang');	
	}

	public function tolak($id_penerimaan)
	{
		if(isset($_POST['update']))
		{	
			$data = array(
				'keterangan'=>$this->input->post('keterangan'),
				'tgl_tolak'=>$this->input->post('tgl_tolak'),
				'status_barang'=>$this->input->post('status_barang')
			);
			// var_dump($data);die();
			$this->M_MasterData->update_data_tolak('tb_penerimaan',$data, $id_penerimaan);
		} 
		redirect('Penerimaan');	
	}
}