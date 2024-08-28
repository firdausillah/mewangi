<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public $defaultVariable = 'profile';
    public $url_index = 'admin/profile';

    function __construct()
    {
        parent::__construct();
        $this->load->model('ProfileModel', 'defaultModel');
        $this->load->helper('slug');
        $this->load->helper('upload_file');

        if ($this->session->userdata('role') != 'superadmin') {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Edit Data',
            $this->defaultVariable => $this->defaultModel->findBy(['id' => 1])->row(),
            'content' => $this->url_index . '/form'
        ];

        $this->load->view('layout_admin/base', $data);
    }

    public function save_file($file, $slug, $folderPath)
    {
        if (!empty($file)) { // $_FILES untuk mengambil data file
            $cfg = [
                'upload_path' => $folderPath,
                'allowed_types' => 'jpg|png|jpeg',
                'file_name' => $slug,
                'overwrite' => (empty($file) ? FALSE : TRUE),
                // 'max_size' => '2028',
            ];
            $this->load->library('upload', $cfg);

            // print_r($file); exit();

            if ($this->upload->do_upload('foto')) {
                return $file_name = $this->upload->data('file_name');
            } else {
                exit('Error : ' . $this->upload->display_errors());
            }
        }
    }

    public function save()
    {
        $id = 1;
        if (!$this->input->post('file_name')) {
            $slug_foto = slugify('logo '.$this->input->post('nama_sekolah'));
        } else {
            $slug_foto = explode('.', $this->input->post('file_name'))[0];
        }
        $foto_pdf = (isset($_FILES['foto']) ? $_FILES['foto'] : $foto_pdf['name'] = false);
        $folderPath_foto = './uploads/img/profile/';
        $file_name = ($this->input->post('file_name') ? $this->input->post('file_name') : $slug_foto);


        if ($foto_pdf['name'] != null) {
            $file_name = $this->save_file(
                $foto_pdf,
                $slug_foto,
                $folderPath_foto
                // return $foto -> nama foto
            );
        }

        // print_r($file_name); exit();
        $data = [
            'nama_sekolah' => $this->input->post('nama_sekolah'),
            'nama_kepalasekolah' => $this->input->post('nama_kepalasekolah'),
            'foto' => $file_name,
            'alamat' => $this->input->post('alamat'),
            'tahun_ajaran' => $this->input->post('tahun_ajaran'),
            'cp_1' => $this->input->post('cp_1'),
            'cp_2' => $this->input->post('cp_2'),
            'website' => $this->input->post('website'),
            'facebook' => $this->input->post('facebook'),
            'youtube' => $this->input->post('youtube'),
            'twitter' => $this->input->post('twitter'),
            'instagram' => $this->input->post('instagram'),
            'tiktok' => $this->input->post('tiktok')

        ];

        if (empty($id)) {
            unset($id);
            if (!$this->defaultModel->add($data)) exit('Insert Data Error.');
        } else {
            // print_r(['foto' => $foto]); exit();

            if (!$this->defaultModel->update(['id' => 1], $data)) exit("Update Data Error.");
        }

        $this->session->set_flashdata('flash', 'Data berhasil diupdate');
        redirect(base_url('admin/profile'));
    }

    public function delete($id)
    {
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
