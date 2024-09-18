<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Import_excel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('SiswaModel');

        if ($this->session->userdata('role') != 'superadmin') {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
            redirect(base_url("login"));
        }
    }

    public function import_data_siswa()
    {
        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if (isset($_FILES['excel']['name']) && in_array($_FILES['excel']['type'], $file_mimes)) {
            $arr_file = explode('.', $_FILES['excel']['name']);
            $extension = end($arr_file);
            if ('csv' == $extension
            ) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadsheet = $reader->load($_FILES['excel']['tmp_name']);
            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            // echo "<pre>";
            // print_r($sheetData);
            
            foreach ($sheetData as $key => $value) {
                $data = [
                    'kode_pendaftaran' => $value['1'],
                    'nama' => $value['2'],
                    'nisn' => $value['2'],
                    'tempat_lahir' => $value['2'],
                    'tanggal_lahir' => $value['2'],
                    'kelas' => $value['2'],
                ];
                // echo $key;
                if ($key >= 1) {

                    $cek = $this->SiswaModel->findBy(['nik_siswa' => $data['nik_siswa']])->row();
                    if ($cek == null) {
                        if ($this->SiswaModel->add($data)) {
                            $this->session->set_flashdata('flash', 'Data berhasil dimasukan');
                        } else {
                            $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
                        }
                    } else {
                        if ($this->SiswaModel->update(['nik_siswa' => $data['nik_siswa']], $data)) {
                            $this->session->set_flashdata('flash', 'Data berhasil diupdate');
                        } else {
                            $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
                        }
                    }
                    // echo "<pre>";
                    // print_r($cek);
                }

            }
            redirect(base_url('admin/siswa'));
        }
    }

}
