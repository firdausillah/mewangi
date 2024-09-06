<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Read extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('PostModel');
	}

	public function index($tahun, $bulan, $tanggal, $slug)
	{
		$post = $this->PostModel->findBy(['slug' => $slug])->row();
		
		$data = [
			'title' => $post->nama,
			'title2' => "Detail Post",
			'post' => $post,
			'content' => 'front/post/read'
		];

		$this->load->view('layout_front/base', $data);
	}
}
