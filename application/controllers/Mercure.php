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

	public function getMagazine()
	{
		echo json_encode(['data' => $this->MagazineModel->get()->result_array()]);
	}

	public function getMagazineBy($id)
	{
		echo json_encode(['data' => $this->MagazineModel->findBy(['id' => $id])->row()]);
	}

}
