<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_MasterData');
	}

	public function index()
	{
		if(@$this->input->post('search')){
			$barang = $this->M_MasterData->search_pemesanan($this->input->post('search'));
		}else{
			$barang = $this->M_MasterData->get_barangdua();
		}
		$stok = $this->M_MasterData->get_stok();
		$vendor = $this->M_MasterData->get_vendor();
		$data = array(
			'barang'=>$barang,
			'stok'=>$stok,
			'vendor'=>$vendor
		);
		$this->load->view('pemesanan_barang',$data);
	}

	public function create()
	{
		if(isset($_POST['submit']))
		{
			$kode_brg = $this->input->post('kode_brg');
			$nama_brg = $this->input->post('nama_brg');
			$nm_vendor = $this->input->post('nm_vendor');
			$jml_brg = $this->input->post('jml_brg');
			$tgl_pesan = $this->input->post('tgl_pesan');
			$satuan = $this->input->post('satuan');
			$tgl_expired = $this->input->post('tgl_expired');
		// var_dump($_POST);die();

			$data = array(
				'kode_brg' => $kode_brg,
				'nama_brg' => $nama_brg,
				'nm_vendor' => $nm_vendor,
				'jml_brg' => $jml_brg,
				'tgl_pesan' => $tgl_pesan,
				'satuan' => $satuan,
				'tgl_expired' => $tgl_expired
			);
			$this->M_MasterData->input_data_pemesanan('tb_pemesanan', $data);
		} 
		redirect('Pemesanan');	
	}

	public function update($id_pemesanan)
	{
		if(isset($_POST['update']))
		{	
			$data = array(
				'kode_brg'=>$this->input->post('kode_brg'),
				'nama_brg'=>$this->input->post('nama_brg'),
				'nm_vendor'=>$this->input->post('nm_vendor'),
				'jml_brg'=>$this->input->post('jml_brg'),
				'tgl_pesan'=>$this->input->post('tgl_pesan'),
				'satuan'=>$this->input->post('satuan'),
				'tgl_expired'=>$this->input->post('tgl_expired')
			);
			// var_dump($data);die();
			$this->M_MasterData->update_data_pemesanan('tb_pemesanan',$data, $id_pemesanan);
		} 
		redirect('Pemesanan');	
	}

	public function set_status($id_pemesanan)
	{
		if(isset($_POST['set_update']))
		{	
			$data = array(
				'status'=>$this->input->post('status')
			);
			// var_dump($data);die();
			$this->M_MasterData->update_data_selesai('tb_pemesanan',$data, $id_pemesanan);
		} 
		redirect('Pemesanan');	
	}

	public function delete(){
		
		$id_pemesanan['id_pemesanan'] = $this->uri->segment(3);
		
		$this->M_MasterData->deleteDataPemesanan('tb_pemesanan',$id_pemesanan);

		redirect('Pemesanan');	
	}
}