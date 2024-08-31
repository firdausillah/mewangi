<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ProfileModel');

        if ($this->session->userdata('role') != 'superadmin' && $this->session->userdata('role') != 'contributor') {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'profile' => $this->ProfileModel->findBy(['id' => 1])->row(),
            'content' => 'admin/dashboard'
        ];

        $this->load->view('layout_admin/base', $data);
    }
}
