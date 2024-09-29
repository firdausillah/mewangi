<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cbt extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('RawModel');
        // $this->load->model('GaleriModel');
    }

    public function index()
    {
        $data = [
            'content' => 'front/cbt/index'
        ];

        
        $this->load->view('front/cbt/index');
    }
}
