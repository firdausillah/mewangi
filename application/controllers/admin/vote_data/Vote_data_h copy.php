<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Vote_data_h extends CI_Controller
{
    public $defaultVariable = 'aset_kantor';
    public $url_index = 'admin/vote_data/vote_data_h';

    function __construct()
    {
        parent::__construct();
        $this->load->model('Vote_data_hModel');
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
                'title' => 'Vote Data',
                'vote_data_h' => $this->Vote_data_hModel->get()->result(),
                'content' => 'admin/vote_data/table'
            ];

            $this->load->view('layout_admin/base', $data);
        } else if ($page == 'add') {
            $data = [
                'title' => 'Tambah Data',
                'content' => 'admin/vote_data/form_h',
                'cropper' => 'components/cropper',
                'aspect' => '4/3'
            ];

            $this->load->view('layout_admin/base', $data);
        } else if ($page == 'edit') {
            $id = (isset($_GET['id']) ? $_GET['id'] : '');
            $data = [
                'title' => 'Edit Data',
                'vote_data_h' => $this->Vote_data_hModel->findBy(['id' => $id])->row(),
                'content' => 'admin/vote_data/form_h',
                'cropper' => 'components/cropper',
                'aspect' => '4/3'
            ];

            $this->load->view('layout_admin/base', $data);
        }
    }

    public function getData(){
        echo json_encode(['data'=> $this->Vote_data_hModel->get()->result()]);
    }

    public function save()
    {
        $id = $this->input->post('id');

        $data = [
            'is_active' => 1,
            'nama'  => $this->input->post('nama'),
            'start_date'  => $this->input->post('start_date'),
            'end_date'  => $this->input->post('end_date'),
            'max_voters'  => $this->input->post('max_voters'),
            'keterangan'  => $this->input->post('keterangan')
        ];

        if (empty($id)) {
            unset($id);
            if ($this->Vote_data_hModel->add($data)) {
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dimasukan']);
                redirect(base_url($this->url_index));
            }
            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
        } else {
            if ($this->Vote_data_hModel->update(['id' => $id], $data)) {
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil diupdate']);
                redirect(base_url($this->url_index));
            }
            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
        }
    }

    public function exportExcel()
    {
        // print_r(); exit();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        foreach (range('A', 'F') as $key => $value) {
            $spreadsheet->getActiveSheet()->getColumnDimension($value)->setAutoSize(true);
        }

        $sheet->setCellValue("A1", "nama");
        $sheet->setCellValue("B1", "keterangan");
        $sheet->setCellValue("C1", "tanggal");
        $sheet->setCellValue("D1", "tahun_perolehan");
        $sheet->setCellValue("E1", "nilai_perolehan");
        $sheet->setCellValue("F1", "sumber");
        $sheet->setCellValue("G1", "merk");
        $sheet->setCellValue("H1", "type");
        $sheet->setCellValue("I1", "serial_number");
        $sheet->setCellValue("J1", "jumlah");
        $sheet->setCellValue("K1", "kondisi");
        $sheet->setCellValue("L1", "pengguna");
        $sheet->setCellValue("M1", "foto");
        $sheet->setCellValue("N1", "status_kepemilikan");
        $sheet->setCellValue("O1", "jenis_aset");

        $pelaporan = $this->Vote_data_hModel->findBy(['is_active' => 1, 'jenis_aset' => 'kantor'])->result_array();
        $x = 2;
        foreach ($pelaporan as $key => $value) {
            $sheet->setCellValue("A" . $x, $value["nama"]);
            $sheet->setCellValue("B" . $x, $value["keterangan"]);
            $sheet->setCellValue("C" . $x, $value["created_on"]);
            $sheet->setCellValue("D" . $x, $value["tahun_perolehan"]);
            $sheet->setCellValue("E" . $x, $value["nilai_perolehan"]);
            $sheet->setCellValue("F" . $x, $value["sumber"]);
            $sheet->setCellValue("G" . $x, $value["merk"]);
            $sheet->setCellValue("H" . $x, $value["type"]);
            $sheet->setCellValue("I" . $x, $value["serial_number"]);
            $sheet->setCellValue("J" . $x, $value["jumlah"]);
            $sheet->setCellValue("K" . $x, $value["kondisi"]);
            $sheet->setCellValue("L" . $x, $value["pengguna"]);
            $sheet->setCellValue("M" . $x, $value["foto"]);
            $sheet->setCellValue("N" . $x, $value["status_kepemilikan"]);
            $sheet->setCellValue("O" . $x, $value["jenis_aset"]);
            $x++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'pelaporan-aset-kantor-seblang-wangi-' . date('dmy') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        $writer->save('php://output');
    }

    public function delete($id)
    {
        if ($this->Vote_data_hModel->delete(['id' => $id])) {
            $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dihapus']);
        } else {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
        redirect($this->url_index);
    }

    public function nonaktif($id)
    {
        if ($this->Vote_data_hModel->update(['id' => $id], ['is_active' => 0])) {
            $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dinonaktifkan']);
        } else {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
        redirect($this->url_index);
    }
}
