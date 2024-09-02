<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('PostModel', 'defaultModel');
	}

	public function index(){
		$data = [
			'title' => 'Posts',
			'content' => 'front/post/post'
		];

		$this->load->view('layout_front/base', $data);

	}

	public function getPost($data)
	{
			$data = [
				'is_active' => 1
			];
			echo json_encode(['data' => $this->defaultModel->findBy($data)->result_array()]);
		// if ($_GET['id_event'] != null) {
		// 	$data = [
		// 		'is_active' => 1
		// 	];
		// 	echo json_encode(['data' => $this->defaultModel->findBy($data)->result_array()]);
		// } else {
		// 	echo json_encode([]);
		// }
	}

}
