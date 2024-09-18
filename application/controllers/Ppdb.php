<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppdb extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('PostModel');
	}

	public function index()
	{
		
		$data = [
			'title' => 'PPDB',
			'content' => 'front/ppdb/index'
		];

		$this->load->view('layout_front/base', $data);
	}

	public function daftar()
	{

		$data = [
			'title' => 'Daftar',
			'content' => 'front/ppdb/daftar'
		];

		$this->load->view('layout_front/base', $data);
	}

	public function juknis()
	{
		
		$data = [
			'title' => 'Juknis PPDB',
			'content' => 'front/ppdb/juknis'
		];

		$this->load->view('layout_front/base', $data);
	}
}
