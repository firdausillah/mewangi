<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mercure extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('MagazineModel');
		$this->load->model('RawModel');
	}

	public function index(){
		$data = [
			'title' => 'Mercure',
			'content' => 'front/mercure/index'
		];

		$this->load->view('layout_front/base', $data);

	}

	public function getMagazine($id)
	{
		echo json_encode($this->MagazineModel->findBy(['id' => $id])->row());
	}

}
