<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Real_count extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel');
		$this->load->model('Vote_data_hModel');
		$this->load->model('Vote_data_dModel');
		$this->load->model('vote_data_tModel');
		$this->load->model('RawModel');

		// if ($this->session->userdata('role') != 'voters') {
		// 	redirect(base_url(""));
		// }
	}

	public function index()
	{
		$data = [
			'title' => 'Real Count',
			'content' => 'real_count/real_count',
			'vote_data_h' => $this->Vote_data_hModel->get()->result()
		];

		$this->load->view('layout_front/base', $data);
	}

	public function real_count_d($id_vote_data_h)
	{
		$data = [
			'title' => 'Detail Real Count',
			'content' => 'real_count/real_count_d',
			'vote_data_d' => $this->Vote_data_dModel->findBy(['id_vote_data_h' => $id_vote_data_h])->result(),
			'id_vote_data_h' => $id_vote_data_h
		];

		$this->load->view('layout_front/base', $data);
	}

	public function get_real_count_data($id_vote_data_h){
		// $id_vote_data_h = $_POST['id_vote_data_h'];
		$sql = " SELECT a.id, count(b.id) AS counter, a.nama, a.foto, a.file FROM vote_data_d a LEFT JOIN vote_data_t b ON a.id = b.id_vote_data_d WHERE a.id_vote_data_h = '$id_vote_data_h' AND a.is_active = 1 GROUP BY a.id ";

		$vote_data_t = $this->RawModel->sqlRaw($sql)->result();
		$total_voters_data = 0;

		foreach($vote_data_t as $value){
			$total_voters_data = $value->counter+ $total_voters_data;
		}

		$max_voters = $this->Vote_data_hModel->findBy(['id' => $id_vote_data_h])->row();

		$percent_total_voters_data = number_format($total_voters_data / $max_voters->max_voters * 100, 2);

		echo json_encode(['data' => $vote_data_t, 'percent_total_voters_data' => $percent_total_voters_data, ]);

	}

	public function login_voters()
	{

		$identity_number = $_POST['identity_number'];
		$id_vote_data_h = $_POST['id_vote_data_h'];

		$cek = $this->AuthModel->cekLogin('vote_data_d_voters', ['identity_number' => $identity_number, 'id_vote_data_h' => $id_vote_data_h])->row();
		$test = $this->AuthModel->cekLogin('vote_data_d_voters', ['identity_number' => $identity_number, 'id_vote_data_h' => $id_vote_data_h])->num_rows();

		if (
			$test > 0
		) {
			$data_session = [
				'id'                => $cek->id,
				'id_vote_data_h'   => $id_vote_data_h,
				'nama'              => $cek->nama,
				'identity_number'   => $cek->identity_number,
				'role'              => 'voters',
				'status'            => 'login'
			];

			$this->session->set_userdata($data_session);

			echo 1;
			exit();
		} else {

			echo 0;
			exit();
		}
	}


}
