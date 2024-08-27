<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
    }

    public function index()
    {
        $data = [
            'title' => 'Wellcome Page',
            'content' => 'index'
        ];

        $this->load->view('layout_front/base', $data);

        // redirect(base_url('login')); 
    }

}
