<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CetakPenerimaan extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_MasterData');
	}

	public function index()
	{
		$this->load->view('print_lpr_penerimaan');
	}
}