<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaan extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_MasterData');
	}

	public function index()
	{	
		$barang = $this->M_MasterData->get_barang();
		$vendor = $this->M_MasterData->get_vendor();
		$data = array(
			'barang'=>$barang,
			'vendor'=>$vendor,
		);
		$this->load->view('pen_brg',$data);
	}

	public function create()
	{
		if(isset($_POST['submit']))
		{
			$no_po = $this->input->post('no_po');
			$kd_barang = $this->input->post('kd_barang');
			$nama_barang = $this->input->post('nama_barang');
			$nama_vendor = $this->input->post('nama_vendor');
			$jumlah_barang = $this->input->post('jumlah_barang');
			$tgl_brg_dterima = $this->input->post('tgl_brg_dterima');
			$satuan = $this->input->post('satuan');
		// var_dump($_POST);die();

			$data = array(
				'no_po' => $no_po,
				'kd_barang' => $kd_barang,
				'nama_barang' => $nama_barang,
				'nama_vendor' => $nama_vendor,
				'jumlah_barang' => $jumlah_barang,
				'tgl_brg_dterima' => $tgl_brg_dterima,
				'satuan' => $satuan
			);
			$this->M_MasterData->input_data('tb_penerimaan', $data);
		} 
		redirect('Penerimaan');	
	}

	public function update($id_penerimaan)
	{
		if(isset($_POST['update']))
		{	
			$data = array(
				'no_po'=>$this->input->post('no_po'),
				'kd_barang'=>$this->input->post('kd_barang'),
				'nama_barang'=>$this->input->post('nama_barang'),
				'nama_vendor'=>$this->input->post('nama_vendor'),
				'jumlah_barang'=>$this->input->post('jumlah_barang'),
				'tgl_brg_dterima'=>$this->input->post('tgl_brg_dterima'),
				'satuan'=>$this->input->post('satuan')
			);
			// var_dump($data);die();
			$this->M_MasterData->update_data('tb_penerimaan',$data, $id_penerimaan);
		} 
		redirect('Penerimaan');	
	}

	public function delete(){
		
		$id_penerimaan['id_penerimaan'] = $this->uri->segment(3);
		
		$this->M_MasterData->deleteData('tb_penerimaan',$id_penerimaan);

		redirect('Penerimaan');	
	}
}