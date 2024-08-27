<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Vote_data_d extends CI_Controller
{
    public $url_index = 'admin/vote_data/vote_data_h';

    function __construct()
    {
        parent::__construct();
        $this->load->model('Vote_data_dModel');
        $this->load->model('Vote_data_hModel');
        $this->load->model('Vote_data_tModel');
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

    }

    public function getData($id_vote_data_h){
        if (isset($id_vote_data_h)) {
            $sql = 
                "SELECT 
                    a.id, count(b.id) AS counter, a.nama, a.foto, a.file, a.keterangan 
                FROM vote_data_d a 
                LEFT JOIN vote_data_t b ON a.id = b.id_vote_data_d 
                WHERE a.id_vote_data_h = '$id_vote_data_h' 
                    AND a.is_active = 1 
                GROUP BY a.id";

            echo json_encode(['data' => $this->RawModel->sqlRaw($sql)->result()]);
        }else{
            echo json_encode(['data' => []]);
        }
    }

    public function getDataBy(){
        if (isset($_GET['id'])) {
            echo json_encode(['data' => $this->Vote_data_dModel->findBy(['id' => $_GET['id']])->row()]);
        } else {
            echo json_encode(['data' => '']);
        }
    }

    public function cancel_vote()
    {
        if ($this->Vote_data_tModel->delete(['id' => $_POST['id_vote_data_t']])) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil diupdate']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
    }

    public function save_file($file, $slug, $folderPath)
    {
        if (!empty($file)) { // $_FILES untuk mengambil data file
            $cfg = [
                'upload_path' => $folderPath,
                'allowed_types' => 'pdf',
                'file_name' => $slug,
                'overwrite' => (empty($file) ? FALSE : TRUE),
                // 'max_size' => '2028',
            ];
            $this->load->library('upload', $cfg);

            if ($this->upload->do_upload('file')) {
                return $file_name = $this->upload->data('file_name');
            } else {
                exit('Error : ' . $this->upload->display_errors());
            }
        }
    }

    public function save()
    {

        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $id_vote_data_h = $this->input->post('id_vote_data_h');
        $event_data = $this->Vote_data_hModel->findBy(['id' => $id_vote_data_h])->row();

        // begin upload pdf
        if (!$this->input->post('file_name')) {
            $slug = slugify('File ' . '-' . $nama . '-' . $event_data->nama);
        } else {
            $slug = explode('.', $this->input->post('file_name'))[0];
        }

        $file_pdf = $_FILES['file'];
        $folderPath_file = './uploads/file/vote_data_d/';
        $file = ($this->input->post('file_name') ? $this->input->post('file_name') : $slug);
        // print_r($file); exit();

        if ($file_pdf['name']) {
            $file = $this->save_file(
                $file_pdf,
                $slug,
                $folderPath_file
                // return $file -> nama file
            );
        }
        // end upload pdf

        // begin upload foto
        if (!$this->input->post('gambar')) {
            $slug = slugify('Foto ' . '-' . $nama . '-' . $event_data->nama);
        } else {
            $slug = explode('.', $this->input->post('gambar'))[0];
        }

        $file_foto = $this->input->post('file_foto');
        $folderPath = './uploads/img/vote_data_d/';
        $foto = ($this->input->post('gambar') ? $this->input->post('gambar') : $slug); //jika upload berhasil akan di replace oleh function save_foto()

        if ($file_foto) {
            $foto = save_foto(
                $file_foto,
                $slug,
                $folderPath
                // return $foto -> nama foto
            );
        }
        // end upload foto

        $data = [
            'is_active' => 1,
            'id_vote_data_h'    =>  $this->input->post('id_vote_data_h'),
            'nama'    =>  $this->input->post('nama'),
            'keterangan' =>  $this->input->post('keterangan'),

            'file'  => $file,
            'foto'  => $foto
        ];

        if (empty($id)) {
            unset($id);
            if ($this->Vote_data_dModel->add($data)) {
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dimasukan']);
                redirect(base_url('admin/vote_data/vote_data_h?page=detail&id=' . $this->input->post('id_vote_data_h')));
            }
            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
        } else {
            if ($this->Vote_data_dModel->update(['id' => $id], $data)) {
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil diupdate']);
                redirect(base_url('admin/vote_data/vote_data_h?page=detail&id=' . $this->input->post('id_vote_data_h')));
            }
            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
        }
    }


    public function delete($id, $id_h)
    {
        if ($this->Vote_data_d_votersModel->delete(['id' => $id])) {
            $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dihapus']);
        } else {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
        redirect('admin/vote_data/vote_data_h?page=detail&id=' . $id_h);
    }

    public function nonaktif($id, $id_h)
    {
        if ($this->Vote_data_d_votersModel->update(['id' => $id], ['is_active' => 0])) {
            $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dinonaktifkan']);
        } else {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
        redirect('admin/vote_data/vote_data_h?page=detail&id=' . $id_h);
    }
}
