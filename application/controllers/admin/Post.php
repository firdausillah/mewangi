<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends MY_Controller
{
    public $defaultVariable = 'post';
    public $url_index = 'admin/post';

    function __construct()
    {
        parent::__construct();
        $this->load->model('PostModel', 'defaultModel');
        $this->load->model('RawModel');
        $this->load->model('Post_categoryModel');
        $this->load->helper('slug');
        $this->load->helper('upload_file');

        if ($this->session->userdata('role') != 'superadmin') {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
            redirect(base_url("login"));
        }
    }

    public function opinion()
    {
        $page = (isset($_GET['page']) ? $_GET['page'] : 'index');
        $post_type = 'opinion';

        if ($page == 'index') {
            $data = [
                'title' => 'Posts',
                'post_type' => $post_type,
                $this->defaultVariable => $this->defaultModel->findBy(['post_type' => $post_type])->result(),
                'content' => $this->url_index . '/table'
            ];

            $this->load->view('layout_admin/base', $data);
        } else if ($page == 'add') {
            $data = [
                'title' => 'Tambah Data',
                'post_type' => $post_type,
                'content' => $this->url_index . '/form'
            ];

            $this->load->view('layout_admin/base', $data);
        } else if ($page == 'edit') {
            $id = (isset($_GET['id']) ? $_GET['id'] : '');
            $data = [
                'title' => 'Edit Data',
                'post_type' => $post_type,
                $this->defaultVariable => $this->defaultModel->findBy(['id' => $id])->row(),
                'content' => $this->url_index . '/form'
            ];

            $this->load->view('layout_admin/base', $data);
        } else if ($page == 'detail') {
            $id = (isset($_GET['id']) ? $_GET['id'] : '');
            $data = [
                'title' => 'Detail Data',
                'post_type' => $post_type,
                $this->defaultVariable => $this->defaultModel->findBy(['id' => $id])->row(),
                'content' => $this->url_index . '/detail'
            ];

            $this->load->view('layout_admin/base', $data);
        }
    }

    public function save()
    {
        $id_post_category = $this->input->post('id_post_category');
        $category_nama = $this->Post_categoryModel->findBy(['id' => $id_post_category])->row()->nama;

        $id = $this->input->post('id');
        if (!$this->input->post('gambar')) {
            $slug = slugify_simple($this->input->post('nama'));
        } else {
            $slug = explode('.', $this->input->post('gambar'))[0];
        }

        $file_foto = $this->input->post('file_foto');
        $folderPath = './uploads/img/' . $this->defaultVariable . '/';
        $foto = $this->input->post('gambar'); //jika upload berhasil akan di replace oleh function save_foto()

        if ($file_foto) {
            $foto = save_foto(
                $file_foto,
                $slug,
                $folderPath
                // return $foto -> nama foto
            );
        }

        $data = [
            'is_active'         => 1,
            'id_user'           => $this->session->userdata('id'),
            'id_post_category'  => $id_post_category,
            'nama'              => $this->input->post('nama'),
            'slug'              => $slug,
            'content'           => $this->input->post('content'),
            'tags'              => $this->input->post('tags'),
            'foto'              => $foto,
            'post_type'         => $this->input->post('post_type'),
            'category_nama'     => $category_nama
        ];


        if (empty($id)) {
            unset($id);
            if ($this->defaultModel->add($data)) {
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dimasukan']);
                redirect(base_url($this->url_index));
            }
            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
        } else {
            if ($this->defaultModel->update(['id' => $id], $data)) {
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil diupdate']);
                redirect(base_url($this->url_index));
            }
            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
        }
    }

    public function delete($id)
    {
        $data = $this->defaultModel->findBy(['id' => $id])->row();
        @unlink(FCPATH . 'uploads/file/materi/' . $data->file);
        if ($this->defaultModel->delete(['id' => $id])) {
            $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dihapus']);
        } else {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
        redirect($this->url_index);
    }

    public function nonaktif($id)
    {
        if ($this->defaultModel->update(['id' => $id], ['is_active' => 0])) {
            $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dinonaktifkan']);
        } else {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
        redirect($this->url_index);
    }
}