<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ptk extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('PtkModel');
		$this->load->model('RawModel');
	}

	public function index(){
		$data = [
			'title' => 'Guru & Tenaga Pendidik',
			'content' => 'front/ptk/index'
		];

		$this->load->view('layout_front/base', $data);

	}

	public function getPtk()
	{

		if (isset($_GET['page'])) {
			$current_page = $_GET['page'];
		} else {
			$current_page = 1;
		}

		$rows_per_page = 12;
		$offset = ($current_page - 1) * $rows_per_page;

		$sql_count =
			"SELECT
				ptk.id
			FROM
				ptk
			";

		$sql =
			"SELECT
				*
			FROM
				ptk
			ORDER BY ptk.created_on DESC
			LIMIT $rows_per_page
			OFFSET $offset
			";

		$total_rows = $this->RawModel->sqlRaw($sql_count)->num_rows();
		$response = [
			'data' => $this->RawModel->sqlRaw($sql)->result_array(),
			'total_rows' => $total_rows,
			'rows_per_page' => $rows_per_page,
			'current_page' => $current_page
		];


		echo json_encode($response);
	}


}
