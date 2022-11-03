<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('DataModel');
	}

	public function index($daerah=null)
	{
		$data['data_produk'] = $this->DataModel->get_data($daerah);
		$data['list_daerah'] = $this->DataModel->get_daerah();
		$data['tabel'] = $this->DataModel->get_tabel($daerah);
		
		$this->load->view('welcome_message', $data);
	} 
	
	public function go()
	{
		$list_daerah = $this->input->post('list_daerah');
		$list_daerah = implode(".",$list_daerah);
		redirect(site_url('Welcome/index/'.$list_daerah), 'refresh');
	} 
}
