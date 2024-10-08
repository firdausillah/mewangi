<?php
class MY_Controller extends CI_Controller
{
    public $logo;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('ProfileModel');
        $this->load->model('PostModel');
        $this->load->model('RawModel');

        $this->logo = $this->ProfileModel->findBy(['id' => 1])->row();
        $this->post = $this->PostModel->get_for_global()->result();

        $global_categories_sql = "
            SELECT
                post_category.nama,
                COUNT(posts.id) AS jumlah
            FROM
                post_category
            LEFT JOIN posts ON post_category.id = posts.id_post_category
            GROUP BY
                post_category.id
            ORDER BY jumlah DESC
        ";
        $this->categories = $this->RawModel->sqlRaw($global_categories_sql)->result();

        $global_tags_sql = "
            SELECT
                nama
            FROM
                tags_t
            GROUP BY
                nama
        ";
        $this->tags = $this->RawModel->sqlRaw($global_tags_sql)->result();

        $this->load->vars('profile', $this->logo);
        $this->load->vars('global_post', $this->post);
        $this->load->vars('global_categories', $this->categories);
        $this->load->vars('global_tags', $this->tags);
    }
}
