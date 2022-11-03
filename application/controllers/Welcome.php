<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('DataModel');
	}

	public function index($daerah=null, $list_tanggal=null)
	{
		$data['data_produk'] = $this->DataModel->get_data($daerah, $list_tanggal);
		$data['list_daerah'] = $this->DataModel->get_daerah();
		$data['tabel'] = $this->DataModel->get_tabel($daerah, $list_tanggal);
		
		if( isset($list_tanggal) ){
			$tanggal = explode('.',$list_tanggal);
			$data['tgla'] = $tanggal[0];
			$data['tglz'] = $tanggal[1];			
		}
		
		$this->load->view('welcome_message', $data);
	} 
	
	public function go()
	{
		$list_daerah = $this->input->post('list_daerah');
		$tgla = $this->input->post('tgla');
		$tglz = $this->input->post('tglz');
		
		$list_daerah = implode(".",$list_daerah);
		$list_tanggal = [$tgla, $tglz];
		$list_tanggal = implode(".",$list_tanggal);
		
		redirect(site_url('Welcome/index/'.$list_daerah."/".$list_tanggal), 'refresh');
	} 
}
