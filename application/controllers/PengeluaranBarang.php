<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengeluaranBarang extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_MasterData');
	}

	public function index()
	{	
		$barang = $this->M_MasterData->get_Penerimaan();
		$data = array(
			'barang'=>$barang
		);
		$this->load->view('pengeluaran_brg',$data);
	}

	public function create()
	{
		if(isset($_POST['submit']))
		{
			$noreservation = $this->input->post('noreservation');
			$no_sliptf = $this->input->post('no_sliptf');
			$kdbrg = $this->input->post('kdbrg');
			$nama_brg = $this->input->post('nama_brg');
			$nmvdr = $this->input->post('nmvdr');
			$jmlbrg = $this->input->post('jmlbrg');
			$satuan = $this->input->post('satuan');
			$tglbrgkeluar = $this->input->post('tglbrgkeluar');
		// var_dump($_POST);die();

			$data = array(
				'noreservation' => $noreservation,
				'no_sliptf' => $no_sliptf,
				'kdbrg' => $kdbrg,
				'nama_brg' => $nama_brg,
				'nmvdr' => $nmvdr,
				'satuan' => $satuan,
				'jmlbrg' => $jmlbrg,
				'tglbrgkeluar' => $tglbrgkeluar
			);
			$this->M_MasterData->input_data_pengeluaran('tb_pengeluaran', $data);
		} 
		redirect('PengeluaranBarang');	
	}

	public function update($id_pengeluaran)
	{
		if(isset($_POST['update']))
		{	
			$data = array(
				'noreservation'=>$this->input->post('noreservation'),
				'no_sliptf	'=>$this->input->post('no_sliptf'),
				'kdbrg'=>$this->input->post('kdbrg'),
				'nama_brg'=>$this->input->post('nama_brg'),
				'nmvdr'=>$this->input->post('nmvdr'),
				'jmlbrg'=>$this->input->post('jmlbrg'),
				'satuan'=>$this->input->post('jmlbrg'),
				'tglbrgkeluar'=>$this->input->post('tglbrgkeluar')
			);
			// var_dump($data);die();
			$this->M_MasterData->update_data_pengeluaran('tb_pengeluaran',$data, $id_pengeluaran);
		} 
		redirect('PengeluaranBarang');	
	}

	public function delete(){
		
		$id_pengeluaran['id_pengeluaran'] = $this->uri->segment(3);
		
		$this->M_MasterData->deleteDataPengeluaran('tb_pengeluaran',$id_pengeluaran);

		redirect('PengeluaranBarang');	
	}
}