<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galery extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('RawModel');
		// $this->load->model('GaleryModel');
	}

	public function index()
	{

		$data = [
			'title' => 'Galery',
			'content' => 'front/galery/index'
		];


		$this->load->view('layout_front/base', $data);
	}

}
