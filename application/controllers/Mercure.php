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
		// echo json_encode(['data' => $this->MagazineModel->get()->result_array()]);
		if (isset($_GET['page'])) {
			$current_page = $_GET['page'];
		} else {
			$current_page = 1;
		}

		$rows_per_page = 12;
		$offset = ($current_page - 1) * $rows_per_page;

		$sql_count =
			"SELECT
				magazine.id
			FROM
				magazine
			";

		$sql =
			"SELECT
				*
			FROM
				magazine
			ORDER BY magazine.created_on DESC
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

	public function getMagazineBy($id)
	{
		echo json_encode(['data' => $this->MagazineModel->findBy(['id' => $id])->row()]);
	}

}
