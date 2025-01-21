<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppdb extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Siswa_baruModel');
		$this->load->model('ProfileModel');
		$this->load->model('PpdbModel');
	}

	public function index()
	{
		
		$data = [
			'title' => 'PPDB',
			'ppdb_setting' => $this->PpdbModel->findBy(['id' => 1])->row(),
			'content' => 'front/ppdb/index'
		];

		$this->load->view('layout_front/base', $data);
	}

	public function informasi()
	{
		
		$data = [
			'title' => 'Informasi PPDB',
			'ppdb_setting' => $this->PpdbModel->findBy(['id' => 1])->row(),
			'content' => 'front/ppdb/informasi'
		];

		$this->load->view('layout_front/base', $data);
	}

	public function save()
	{
		$jumlah_hafalan = '';
		$ppdb_setting = $this->PpdbModel->findBy(['id'=> 1])->row();
		if(isset($_POST['jumlah_hafalan']))
		foreach ($_POST['jumlah_hafalan'] as $key => $value) {
			$separator = ($jumlah_hafalan == '' ? '' : ', ');
			$jumlah_hafalan = $jumlah_hafalan .$separator. $value;
		}

		$data = [
			'is_active' => 1,
			'nama'		=> $this->input->post('nama'),
			'nik'		=> $this->input->post('nik'),
			'nomor_pendaftaran'		=> $this->input->post('nomor_pendaftaran'),
			'nisn'		=> $this->input->post('nisn'),
			'desa_siswa'		=> $this->input->post('desa_siswa'),
			'kecamatan_siswa'		=> $this->input->post('kecamatan_siswa'),
			'kabupaten_siswa'		=> $this->input->post('kabupaten_siswa'),
			'provinsi_siswa'		=> $this->input->post('provinsi_siswa'),
			'agama'		=> $this->input->post('agama'),
			'prestasi'		=> $this->input->post('prestasi'),
			'is_tahfid'		=> $this->input->post('is_tahfid'),
			'jumlah_hafalan'		=> $jumlah_hafalan,
			'no_hp'		=> $this->input->post('no_hp'),
			'nama_ayah'		=> $this->input->post('nama_ayah'),
			'pekerjaan_ayah'		=> $this->input->post('pekerjaan_ayah'),
			'no_hp_ayah'		=> $this->input->post('no_hp_ayah'),
			'desa_ayah'		=> $this->input->post('desa_ayah'),
			'kecamatan_ayah'		=> $this->input->post('kecamatan_ayah'),
			'kabupaten_ayah'		=> $this->input->post('kabupaten_ayah'),
			'provinsi_ayah'		=> $this->input->post('provinsi_ayah'),
			'nama_ibu'		=> $this->input->post('nama_ibu'),
			'pekerjaan_ibu'		=> $this->input->post('pekerjaan_ibu'),
			'no_hp_ibu'		=> $this->input->post('no_hp_ibu'),
			'desa_ibu'		=> $this->input->post('desa_ibu'),
			'kecamatan_ibu'		=> $this->input->post('kecamatan_ibu'),
			'kabupaten_ibu'		=> $this->input->post('kabupaten_ibu'),
			'provinsi_ibu'		=> $this->input->post('provinsi_ibu'),
			'nama_wali'		=> $this->input->post('nama_wali'),
			'pekerjaan_wali'		=> $this->input->post('pekerjaan_wali'),
			'no_hp_wali'		=> $this->input->post('no_hp_wali'),
			'desa_wali'		=> $this->input->post('desa_wali'),
			'kecamatan_wali'		=> $this->input->post('kecamatan_wali'),
			'kabupaten_wali'		=> $this->input->post('kabupaten_wali'),
			'provinsi_wali'		=> $this->input->post('provinsi_wali'),
			'tahun_ajaran'		=> $ppdb_setting->tahun_ajaran
		];

		if ($this->Siswa_baruModel->add($data)) {
			$this->session->set_flashdata(['status' => 'success', 'message' => 'Anda berhasil mendaftar di' . $profile->nama_sekolah]);
			redirect(base_url('ppdb'));
		}
		exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan, silahkan menghubungi admin']));
	}
}
