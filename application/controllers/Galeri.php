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

	public function getGaleri()
	{

		if (isset($_GET['q'])) {
			$where = 'WHERE galeri.nama LIKE "%' . $_GET['q'] . '%" OR galeri.content LIKE "%' . $_GET['q'] . '%"';
		} elseif (isset($_GET['category'])) {
			$where = 'WHERE post_category.nama LIKE "%' . $_GET['category'] . '%"';
		} elseif (isset($_GET['tag'])) {
			$where = 'WHERE tags_t.nama LIKE "%' . $_GET['tag'] . '%"';
		} else {
			$where = '';
		}

		if (isset($_GET['page'])) {
			$current_page = $_GET['page'];
		} else {
			$current_page = 1;
		}

		$rows_per_page = 6;
		$offset = ($current_page - 1) * $rows_per_page;

		$sql_count =
			"SELECT
				galeri.id
			FROM
				galeri
			$where
			";

		$sql =
			"SELECT
				galeri.id,
				galeri.nama,
				galeri.foto,
				galeri.link,
				DATE_FORMAT(galeri.created_on, '%d-%M-%Y') as tanggal,
				DATE_FORMAT(galeri.created_on, '%Y/%m/%d') as created_on
			FROM
				galeri
			$where
			ORDER BY galeri.created_on DESC
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
