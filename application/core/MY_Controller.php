<?php
class MY_Controller extends CI_Controller
{
    public $logo;

    public function __construct()
    {
        parent::__construct();

        // Load model untuk mengambil data profile
        $this->load->model('ProfileModel');

        // Ambil data logo dari database
        $this->logo = $this->ProfileModel->findBy(['id' => 1])->row();

        // Membuat data logo tersedia di semua view
        $this->load->vars('profile', $this->logo);
    }
}
