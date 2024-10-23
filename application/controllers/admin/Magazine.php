<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Magazine extends MY_Controller
{
    public $defaultVariable = 'magazine';
    public $url_index = 'admin/magazine';

    function __construct()
    {
        parent::__construct();
        $this->load->model('MagazineModel', 'defaultModel');
        $this->load->model('RawModel');
        $this->load->helper('slug');
        $this->load->helper('upload_file');

        if ($this->session->userdata('role') != 'superadmin') {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $page = (isset($_GET['page']) ? $_GET['page'] : 'index');

        if ($page == 'index') {
            $data = [
                'title' => 'Mercure',
                $this->defaultVariable => $this->defaultModel->get()->result(),
                'content' => $this->url_index . '/table'
            ];

            $this->load->view('layout_admin/base', $data);
        } else if ($page == 'add') {
            $data = [
                'title' => 'Tambah Data',
                'content' => $this->url_index . '/form',
                'cropper' => 'components/cropper',
                'aspect' => '3/4'
            ];

            $this->load->view('layout_admin/base', $data);
        } else if ($page == 'edit') {
            $id = (isset($_GET['id']) ? $_GET['id'] : '');
            $data = [
                'title' => 'Edit Data',
                // 'post_category' => $this->Post_categoryModel->get()->result(),
                $this->defaultVariable => $this->defaultModel->findBy(['id' => $id])->row(),
                'content' => $this->url_index . '/form',
                'cropper' => 'components/cropper',
                'aspect' => '3/4'
            ];

            $this->load->view('layout_admin/base', $data);
        }
    }


    public function getMagazine()
    {
        echo json_encode(['data' => $this->defaultModel->get()->result()]);
    }

    public function save_file($file, $slug, $folderPath)
    {
        if (!empty($file)) { // Mengambil data file dari $_FILES
            // Periksa apakah jalur folder ada dan bisa ditulis
            if (!is_dir($folderPath) || !is_writable($folderPath)) {
                exit('Error: Folder tidak ada atau tidak memiliki izin tulis.');
            }

            $config = [
                'upload_path'   => $folderPath,
                'allowed_types' => 'pdf',  // Jenis file yang diizinkan
                'file_name'     => $slug,
                'overwrite'     => TRUE,  // Menimpa file jika ada file dengan nama sama
                // 'max_size'      => 20480,  // Batas ukuran file dalam KB (misalnya 20 MB)
            ];

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {
                return $this->upload->data('file_name');
            } else {
                exit('Error: ' . $this->upload->display_errors());
            }
        } else {
            exit('Error: Tidak ada file yang diunggah.');
        }
    }

    public function save()
    {

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

        // if (!$this->input->post('file_name')) {
        //     $slug_file = slugify($this->input->post('nama'));
        // } else {
        //     $slug_file = explode('.', $this->input->post('file_name'))[0];
        // }

        // $file_pdf = (isset($_FILES['file']) ? $_FILES['file'] : $file_pdf['name'] = false);
        // $folderPath_file = './uploads/file/' . $this->defaultVariable . '/';
        // $file_name = ($this->input->post('file_name') ? $this->input->post('file_name') : $slug_file);


        // if ($file_pdf['name'] != null) {
        //     $file_name = $this->save_file(
        //         $file_pdf,
        //         $slug_file,
        //         $folderPath_file
        //         // return $file -> nama file
        //     );
        // }

        $data = [
            'is_active'         => 1,
            'nama'              => $this->input->post('nama'),
            'link'              => $this->input->post('link'),
            'keterangan'        => $this->input->post('keterangan'),
            'foto'              => $foto
            // 'file'              => $file_name
        ];

        // exit();

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
        @unlink(FCPATH . 'uploads/img/magazine' . $data->foto);
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
