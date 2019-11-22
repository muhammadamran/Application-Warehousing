<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListBarang extends CI_Controller {

	public function index()
	{
		$this->load->view('list_brg');
	}
}