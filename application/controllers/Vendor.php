<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {

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
		$this->load->view('list_vendor');
	}

	public function create()
	{
		if(isset($_POST['submit']))
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$user_role = $this->input->post('user_role');
			$alamat_vendor = $this->input->post('alamat_vendor');
			$email_vendor = $this->input->post('email_vendor');

			$data = array(
				'username' => $username,
				'password' => $password,
				'user_role' => $user_role,
				'alamat_vendor' => $alamat_vendor,
				'email_vendor' => $email_vendor
			);
			// var_dump($data);die();
			$this->M_MasterData->input_vendor('tb_user', $data);
		} 
		redirect('Vendor');	
	}

	public function update($user_id)
	{
		if(isset($_POST['update']))
		{	
			$data = array(
				'username'=>$this->input->post('username'),
				'password'=>$this->input->post('password'),
				'user_role'=>$this->input->post('user_role'),
				'alamat_vendor'=>$this->input->post('alamat_vendor'),
				'email_vendor'=>$this->input->post('email_vendor')
			);
			// var_dump($data);die();
			$this->M_MasterData->update_data_vendor('tb_user',$data, $user_id);
		} 
		redirect('Vendor');	
	}

	public function delete(){
		
		$user_id['user_id'] = $this->uri->segment(3);
		
		$this->M_MasterData->DeleteDataVendor('tb_user',$user_id);

		redirect('Vendor');	
	}
}