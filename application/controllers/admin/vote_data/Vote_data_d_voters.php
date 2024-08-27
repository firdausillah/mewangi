<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Vote_data_d_voters extends CI_Controller
{
    public $url_index = 'admin/vote_data/vote_data_h';

    function __construct()
    {
        parent::__construct();
        $this->load->model('Vote_data_d_votersModel');
        $this->load->model('Vote_data_hModel');
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
        //     echo json_encode(['data' => $this->Vote_data_d_votersModel->findBy(['id_vote_data_h' => $id_vote_data_h])->result()]);

            $sql =
                "SELECT
                    a.id,
                    COUNT(b.id) AS counter,
                    a.nama,
                    a.identity_number, 
                    b.id AS id_vote_data_t
                FROM
                    vote_data_d_voters a
                LEFT JOIN vote_data_t b ON
                    a.id = b.id_vote_data_d_voters
                WHERE
                    a.id_vote_data_h = '$id_vote_data_h' AND a.is_active = 1
                GROUP BY
                    a.id";

            echo json_encode(['data' => $this->RawModel->sqlRaw($sql)->result()]);
        }else{
            echo json_encode(['data' => []]);
        }
    }

    public function getDataBy(){
        if (isset($_GET['id'])) {
            echo json_encode(['data' => $this->Vote_data_d_votersModel->findBy(['id' => $_GET['id']])->row()]);
        } else {
            echo json_encode(['data' => '']);
        }
    }

    public function save()
    {
        $this->update_total_pemilih($this->input->post('id_vote_data_h'));

        $id = $this->input->post('id');

        $data = [
            'is_active' => 1,
            'id_vote_data_h'    =>  $this->input->post('id_vote_data_h'),
            'nama'    =>  $this->input->post('nama'),
            'identity_number' =>  $this->input->post('identity_number')
        ];

        if (empty($id)) {
            unset($id);
            if ($this->Vote_data_d_votersModel->add($data)) {
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dimasukan']);
                redirect(base_url('admin/vote_data/vote_data_h?page=detail&id=' . $this->input->post('id_vote_data_h')));
            }
            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
        } else {
            if ($this->Vote_data_d_votersModel->update(['id' => $id], $data)) {
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil diupdate']);
                redirect(base_url('admin/vote_data/vote_data_h?page=detail&id=' . $this->input->post('id_vote_data_h')));
            }
            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
        }
    }


    public function exportExcel($id)
    {
        // print_r(); exit();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $event_name = $this->Vote_data_hModel->findBy(['id' => $id])->row();

        $slug = slugify($event_name->nama);

        foreach (range('A', 'F') as $key => $value) {
            $spreadsheet->getActiveSheet()->getColumnDimension($value)->setAutoSize(true);
        }

        $sheet->setCellValue("A1", "no");
        $sheet->setCellValue("B1", "nama");
        $sheet->setCellValue("C1", "nomor identitas");

        $writer = new Xlsx($spreadsheet);
        $fileName = 'voters-import-' . $slug . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        $writer->save('php://output');
    }

    public function importExcel()
    {
        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if (isset($_FILES['excel']['name']) && in_array($_FILES['excel']['type'], $file_mimes)) {
            $arr_file = explode('.', $_FILES['excel']['name']);
            $extension = end($arr_file);
            if (
                'csv' == $extension
            ) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadsheet = $reader->load($_FILES['excel']['tmp_name']);
            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            foreach ($sheetData as $key => $value) {
                $data = [
                    'id_vote_data_h' => $this->input->post('id_vote_data_h'),
                    'nama' => $value['1'],
                    'identity_number' => $value['2'],
                    'is_active' => 1
                ];
                if ($key >= 1) {

                    $cek = $this->Vote_data_d_votersModel->findBy(['identity_number' => $data['identity_number']])->row();
                    if ($cek == null) {
                        if ($this->Vote_data_d_votersModel->add($data)) {
                            $this->session->set_flashdata('flash', 'Data berhasil dimasukan');
                        } else {
                            $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
                        }
                    } else {
                        if ($this->Vote_data_d_votersModel->update(['identity_number' => $data['identity_number']], $data)) {
                            $this->session->set_flashdata('flash', 'Data berhasil diupdate');
                        } else {
                            $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
                        }
                    }
                }
            }
            $this->update_total_pemilih($this->input->post('id_vote_data_h'));
            redirect(base_url('admin/vote_data/vote_data_h?page=detail&id=' . $this->input->post('id_vote_data_h')));
        }
    }

    public function update_total_pemilih($id_vote_data_h){
        $c_data = count($this->Vote_data_d_votersModel->findBy(['id_vote_data_h' => $id_vote_data_h, 'is_active' => '1'])->result());
        $this->Vote_data_hModel->update(['id' => $id_vote_data_h], ['max_voters' => $c_data]);
    }
    
    public function delete($id, $id_h)
    {
        if ($this->Vote_data_d_votersModel->delete(['id' => $id])) {
            $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dihapus']);
        } else {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
        $this->update_total_pemilih($id_h);
        redirect('admin/vote_data/vote_data_h?page=detail&id=' . $id_h);
    }

    public function nonaktif($id, $id_h)
    {
        if ($this->Vote_data_d_votersModel->update(['id' => $id], ['is_active' => 0])) {
            $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dinonaktifkan']);
        } else {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
        $this->update_total_pemilih($id_h);
        redirect('admin/vote_data/vote_data_h?page=detail&id=' . $id_h);
    }
}
