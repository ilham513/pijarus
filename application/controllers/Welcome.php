<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('DataModel');
	}

	public function index()
	{
		$data['data_produk'] = $this->DataModel->get_data();
		$this->load->view('welcome_message', $data);
	}
}
