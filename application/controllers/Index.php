<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('BannerModel');
        $this->load->model('rawModel');
        $this->load->model('AuthModel');
    }

    public function index()
    {
        $data = [
            'title' => 'Homepage',
            'banner' => $this->BannerModel->getLimit5()->result(),
            'content' => 'front/home'
        ];

        // print_r($data['banner']); exit();

        $this->load->view('layout_front/base', $data);

        // redirect(base_url('login')); 
    }

    public function getBanner()
    {
        $sql = "
            SELECT
                *
            FROM
                banner
            LIMIT 5
            ORDER BY urutan ASC
        ";
        $data = $this->BannerModel->getLimit5()->result_array();
        echo json_encode(['data' => $data]);
    }

}
