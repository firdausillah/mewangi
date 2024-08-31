<?php
class MY_Controller extends CI_Controller
{
    public $logo;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('ProfileModel');
        $this->load->model('PostModel');

        $this->logo = $this->ProfileModel->findBy(['id' => 1])->row();
        $this->post = $this->PostModel->get_for_global()->result();

        $this->load->vars('profile', $this->logo);
        $this->load->vars('global_post', $this->post);
    }
}
