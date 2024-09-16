<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akademik extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('SiswaModel', 'defaultModel');
		$this->load->model('RawModel');
	}

	public function index(){
		$data = [
			'title' => 'Data Siswa',
			'content' => 'front/akademik/siswa'
		];

		$this->load->view('layout_front/base', $data);

	}

	public function getPost()
	{

		if(isset($_GET['q'])){
			$where = 'WHERE posts.nama LIKE "%'.$_GET['q'].'%" OR posts.content LIKE "%'.$_GET['q'].'%"';
		}elseif(isset($_GET['category'])){
			$where = 'WHERE post_category.nama LIKE "%'.$_GET['category'].'%"';
		}elseif(isset($_GET['tag'])){
			$where = 'WHERE tags_t.nama LIKE "%'.$_GET['tag'].'%"';
		}else{
			$where = '';
		}

		if(isset($_GET['page'])){
			$current_page = $_GET['page'];
		}else{
			$current_page = 1;
		}

		$rows_per_page = 6;
		$offset = ($current_page - 1) * $rows_per_page;
		
		$sql_count = 
			"SELECT
				posts.id
			FROM
				posts
			LEFT JOIN tags_t ON posts.id = tags_t.id_post
			LEFT JOIN post_category ON post_category.id = posts.id_post_category
			$where
			GROUP BY posts.id
			"
		;
		
		$sql = 
			"SELECT
				posts.id,
				posts.id_user,
				post_category.nama,
				posts.id_post_category,
				posts.nama,
				posts.content,
				posts.slug,
				posts.foto,
				posts.views,
				DATE_FORMAT(posts.created_on, '%d-%M-%Y') as tanggal,
				DATE_FORMAT(posts.created_on, '%Y/%m/%d') as created_on,
				posts.post_type,
				posts.category_nama,
				posts.author,
				(
				SELECT
					GROUP_CONCAT(tags_t.nama SEPARATOR ',')
				FROM
					tags_t
				WHERE
					tags_t.id_post = posts.id
			) AS tags_t_nama
			FROM
				posts
			LEFT JOIN tags_t ON posts.id = tags_t.id_post
			LEFT JOIN post_category ON post_category.id = posts.id_post_category
			$where
			GROUP BY posts.id
			ORDER BY posts.created_on DESC
			LIMIT $rows_per_page
			OFFSET $offset
			"
		;

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
