<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NotFoundPage extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('errors/html/error_404');
    }
}
