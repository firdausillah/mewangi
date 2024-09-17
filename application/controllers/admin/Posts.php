<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posts extends MY_Controller
{
    public $defaultVariable = 'post';
    public $url_index = 'admin/posts';

    function __construct()
    {
        parent::__construct();
        $this->load->model('PostModel', 'defaultModel');
        $this->load->model('TagModel');
        $this->load->model('RawModel');
        $this->load->model('Post_categoryModel');
        $this->load->helper('slug');
        $this->load->helper('upload_file');

        if ($this->session->userdata('role') != 'superadmin' && $this->session->userdata('role') != 'contributor') {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $page = (isset($_GET['page']) ? $_GET['page'] : 'index');

        if ($page == 'index') {
            if($this->session->userdata('role') != 'superadmin'){
                $where = [
                    'id_user' => $this->session->userdata('id'),
                    // 'is_approve' => 1
                ];
            }else{
                $where = [
                    // 'is_approve' => 1
                ];
            }

            $data = [
                'title' => 'Post',
                $this->defaultVariable => $this->defaultModel->findBy($where)->result(),
                'content' => $this->url_index . '/table'
            ];

            $this->load->view('layout_admin/base', $data);
        } else if ($page == 'add') {
            $data = [
                'title' => 'Tambah Data',
                'post_category' => $this->Post_categoryModel->get()->result(),
                'content' => $this->url_index . '/form',
                'cropper' => 'components/hd_cropper',
                'aspect' => '4/3'
            ];

            $this->load->view('layout_admin/base', $data);
        } else if ($page == 'edit') {
            $id = (isset($_GET['id']) ? $_GET['id'] : '');
            $data = [
                'title' => 'Edit Data',
                'post_category' => $this->Post_categoryModel->get()->result(),
                $this->defaultVariable => $this->defaultModel->findBy(['id' => $id])->row(),
                'content' => $this->url_index . '/form',
                'cropper' => 'components/hd_cropper',
                'aspect' => '4/3'
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

    public function getPost(){
        if ($this->session->userdata('role') != 'superadmin') {
            $where = [
                'id_user' => $this->session->userdata('id'),
            ];
        } else {
            $where = [
            ];
        }
        echo json_encode(['data' => $this->defaultModel->findBy($where)->result()]);
    }

    public function update_status_approve()
    {
        if ($this->defaultModel->update(['id' => $_POST['id']], ['is_approve' => $_POST['is_approve']])) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil diupdate']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
    }

    public function save()
    {
        $tags = [];
        $redirect = base_url($this->url_index);

        $id_post_category = $this->input->post('id_post_category');

        $category_nama = (!empty($id_post_category) && $category = $this->Post_categoryModel->findBy(['id' => $id_post_category])->row())
        ? $category->nama
        : '';

        $author = $this->session->userdata('nama');

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
            'is_approve'        => $this->input->post('is_approve'),
            'foto'              => $foto,
            'post_type'         => $this->input->post('post_type'),
            'category_nama'     => $category_nama,
            'author'            => $author
        ];

        if($this->input->post('tags')){
            $tags = explode(',',$this->input->post('tags'));
        }

        // exit();

        if (empty($id)) {
            unset($id);
            $id_post = $this->defaultModel->add($data);
            if ($id_post) {
                $this->TagModel->delete(['id_post' => $id_post]);
                foreach ($tags AS $value) {
                    $this->TagModel->add(['id_post' => $id_post, 'nama' => $value]);
                }
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dimasukan']);
                redirect($redirect);
            }
            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
        } else {
            if ($this->defaultModel->update(['id' => $id], $data)) {
                $this->TagModel->delete(['id_post' => $id]);
                foreach ($tags AS $value) {
                    $this->TagModel->add(['id_post' => $id, 'nama' => $value]);
                }
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil diupdate']);
                redirect($redirect);
            }
            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
        }
    }

    public function delete($id)
    {
        $data = $this->defaultModel->findBy(['id' => $id])->row();
        @unlink(FCPATH . 'uploads/img/post' . $data->foto);
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
