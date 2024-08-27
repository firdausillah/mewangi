<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mulai_memilih extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel');
		$this->load->model('Vote_data_hModel');
		$this->load->model('Vote_data_dModel');
		$this->load->model('Vote_data_tModel');

		if ($this->session->userdata('role') != 'voters') {
			redirect(base_url(""));
		}
	}

	public function index()
	{

		$user_id = $this->session->userdata('id');
		$id_vote_data_h = $this->session->userdata('id_vote_data_h');

		$c_sudah_memilih = $this->Vote_data_tModel->findBy(['id_vote_data_d_voters' => $user_id, 'id_vote_data_h' => $id_vote_data_h])->num_rows();

		$data = [
			'title' => 'Pilih Event',
			'content' => 'mulai_memilih',
			'c_sudah_memilih' => $c_sudah_memilih,
			'vote_data_h' => $this->Vote_data_hModel->findBy(['id' => $id_vote_data_h])->row(),
			'vote_data_d' => $this->Vote_data_dModel->findBy(['id_vote_data_h' => $id_vote_data_h])->result(),
			'vote_data_t' => $this->Vote_data_tModel->findBy(['id_vote_data_d_voters' => $user_id ,'id_vote_data_h' => $id_vote_data_h])->row()
		];

		// if($c_sudah_memilih) {
		// 	$this->session->set_flashdata(['status' => 'success', 'message' => 'Pilihan anda berhasil disimpan!']);
		// }

		$this->load->view('layout_front/base', $data);
	}

	public function getDataBy()
	{
		$id_vote_data_d = $_POST['id_vote_data_d'];
		$vote_data_d = $this->Vote_data_dModel->findBy(['id' => $id_vote_data_d])->row();

		echo json_encode(['data' => $vote_data_d]);
	}

	public function save_vote()
	{
		$id_vote_data_d = $_POST['id_vote_data_d'];
		$id_vote_data_h = $this->session->userdata('id_vote_data_h');
		$user_id = $this->session->userdata('id');

		$data = [
			'id_vote_data_h'	=> $id_vote_data_h,
			'id_vote_data_d'	=> $id_vote_data_d,
			'id_vote_data_d_voters'	=> $user_id,
			'is_active'	=> 1,

		];

		if ($this->Vote_data_tModel->add($data)) {
			echo 1;
		}else {
			echo 0;
		}

	}

}
