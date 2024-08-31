<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel');
		$this->load->model('LogUserModel');
	}

	public function index()
	{
		if (isset($_SESSION['nama'])) {
			if ($_SESSION['role'] == 'superadmin') {
				redirect('admin/dashboard');
			} else {
				redirect($_SESSION['role'] . '/dashboard');
			}
		} else {
			$this->load->view('login', ['is_admin' => 0]);
		}
	}

	public function admin()
	{
		if (isset($_SESSION['nama'])) {
			if ($_SESSION['role'] == 'superadmin') {
				redirect('admin/dashboard');
			}
		} else {
			$this->load->view('login', ['is_admin' => 1]);
		}
	}

	public function auth()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		// $role = $this->input->post('role');

		$where = [
			'username' => $username,
			'password' => $password,
			// 'role' => $role,
			'users.is_active' => 1
		];

		// if ($role == 'superadmin' OR $role == 'contributor') {
			$data = $this->AuthModel->cekLogin('users', $where)->row();
			$test = $this->AuthModel->cekLogin('users', $where)->num_rows();
			$data_session_add = [];
			// print_r($data); exit();

			//https://youtu.be/ubLmRj8eojA jika flashdata tidak hilang otomatis
			$redirect = 'admin/dashboard';
		// } else {
		// 	if ($role == 'member') {
		// 		$data = $this->AuthModel->cekLoginMember($where)->row();
		// 		$test = $this->AuthModel->cekLoginMember($where)->num_rows();
		// 		// print_r($test); exit();
		// 		if ($test > 0) {
		// 			$data_session_add = [
		// 				'foto'	=> $data->foto,
		// 				'instansi'	=> $data->instansi,
		// 				'id_event'	=> $data->id_event,
		// 				'event_nama' => $data->event_nama
		// 			];
		// 			$redirect = 'member/dashboard';
		// 		}
		// 	} elseif ($role == 'trainer') {
		// 		$data = $this->AuthModel->cekLoginTrainer($where)->row();
		// 		$test = $this->AuthModel->cekLoginTrainer($where)->num_rows();
		// 		if ($test > 0) {
		// 			# code...
		// 			$data_session_add = [];
		// 			$redirect = 'trainer/dashboard';
		// 		}
		// 	}
		// }

		if ($test > 0) {
			$data_session_def = [
				'id'	=> $data->id,
				'nama'	=> $data->nama,
				'username'	=> $data->username,
				'password'	=> $data->password,
				'role'	=> $data->role,
				'status'	=> 'login'
			];

			$data_session = array_merge($data_session_def, $data_session_add);


			$this->session->set_userdata($data_session);
			$this->session->set_flashdata(['status' => 'success', 'message' => 'Anda berhasil login']);

			redirect($redirect);
		} else {
			// $this->session->set_flashdata('error', 'Username atau Password salah!');
			$this->session->set_flashdata(['status' => 'error', 'message' => 'Username atau Password salah!']);

			redirect('login');
		}
	}
}
