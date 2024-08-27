<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel');
		$this->load->model('Vote_data_hModel');

		// if ($this->session->userdata('role') != 'voters') {
		// 	redirect(base_url(""));
		// }
	}

	public function index()
	{
		$data = [
			'title' => 'Pilih Event',
			'content' => 'event',
			'vote_data_h' => $this->Vote_data_hModel->get()->result()
		];

		$this->load->view('layout_front/base', $data);
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
