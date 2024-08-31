<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends MY_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index(){
		$data = [
			'gelombangs' => $this->mGelombang->get()->result(),
			'jurusans' => $this->mJurusan->get()->result(),
			'persyaratans' => $this->mPersyaratan->get()->result(),
			'asalsekolahs' => $this->mAsalSekolah->get()->result(),
			'profile' => $this->mProfile->findBy(['id' => 1])->row()
		];
		// $this->session->set_flashdata('success', $data);
		$this->load->view('landing_page', $data);
	}

}
