<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_MasterData');
	}

	
	public function index()
	{
		$this->load->view('list_user');
	}

	public function create()
	{
		if(isset($_POST['submit']))
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$user_role = $this->input->post('user_role');

			$data = array(
				'username' => $username,
				'password' => $password,
				'user_role' => $user_role
			);
			// var_dump($data);die();
			$this->M_MasterData->input_user('tb_user', $data);
		} 
		redirect('Users');	
	}

	public function update($user_id)
	{
		if(isset($_POST['update']))
		{	
			$data = array(
				'username'=>$this->input->post('username'),
				'password'=>$this->input->post('password'),
				'user_role'=>$this->input->post('user_role')
			);
			// var_dump($data);die();
			$this->M_MasterData->update_data_users('tb_user',$data, $user_id);
		} 
		redirect('Users');	
	}

	public function delete(){
		
		$user_id['user_id'] = $this->uri->segment(3);
		
		$this->M_MasterData->DeleteDataUsers('tb_user',$user_id);

		redirect('Users');	
	}
}