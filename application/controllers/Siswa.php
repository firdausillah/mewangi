<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('SiswaModel', 'defaultModel');
		$this->load->model('RawModel');
	}

	public function index(){
		$sql =
			"SELECT
				kelas
			FROM
				siswa
			GROUP BY kelas
			";

		$data = [
			'title' => 'Data Siswa',
			'kelas' => $this->RawModel->sqlRaw($sql)->result(),
			'content' => 'front/kesiswaan/siswa'
		];

		$this->load->view('layout_front/base', $data);

	}

	public function getSiswa()
	{

		$nama = $_GET['nama']?$_GET['nama']:'';
		$kelas = $_GET['kelas']?$_GET['kelas']:'';

		if($nama != '' AND $kelas != ''){
			$sql = 
				"SELECT
					id, nama, kelas, CONCAT(tempat_lahir,', ', tanggal_lahir) AS ttl, nisn
				FROM
					siswa
				WHERE nama LIKE '%$nama%' AND kelas LIKE '%$kelas%'
				"
			;
	
			$data = $this->RawModel->sqlRaw($sql)->result_array();
			echo json_encode(['data' => $data]);
			
		}else{
			echo json_encode(['data' => '']);
			
		}
		
	}

}
