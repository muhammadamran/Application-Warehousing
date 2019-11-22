<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StokBarang extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
		parent::__construct();		
		$this->load->model('M_MasterData');
	}

	public function index()
	{
		$data = array(
			'stok'=>$this->M_MasterData->get_stok()
		);
		$this->load->view('stok_brg', $data);
	}

	public function create()
	{
		if(isset($_POST['submit']))
		{
			$id_barang = $this->input->post('id_barang');
			$nama_stok = $this->input->post('nama_stok');
			$jenis_stok = $this->input->post('jenis_stok');
			$stok = $this->input->post('stok');

			$data = array(
				'id_barang' => $id_barang,
				'nama_stok' => $nama_stok,
				'jenis_stok' => $jenis_stok,
				'stok' => $stok
			);
			// var_dump($data);die();
			$this->M_MasterData->input_stok('tb_stok', $data);
		} 
		redirect('StokBarang');	
	}

	public function update($id)
	{
		if(isset($_POST['update']))
		{	
			$data = array(
				'id_barang'=>$this->input->post('id_barang'),
				'nama_stok'=>$this->input->post('nama_stok'),
				'jenis_stok'=>$this->input->post('jenis_stok')
			);
			// var_dump($data);die();
			$this->M_MasterData->update_data_Stok('tb_stok',$data, $id);
		} 
		redirect('StokBarang');	
	}

	public function delete(){
		
		$id['id'] = $this->uri->segment(3);
		
		$this->M_MasterData->DeleteDataStok('tb_stok',$id);

		redirect('StokBarang');	
	}
}