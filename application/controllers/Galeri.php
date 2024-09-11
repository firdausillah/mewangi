<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('RawModel');
		// $this->load->model('GaleriModel');
	}

	public function index()
	{

		$data = [
			'title' => 'Galeri',
			'content' => 'front/galeri/index'
		];


		$this->load->view('layout_front/base', $data);
	}

}
