<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Ppdb extends MY_Controller
{
    public $defaultVariable = 'ppdb';
    public $url_index = 'admin/ppdb';

    function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_baruModel');
        $this->load->model('PpdbModel');
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
                'title' => 'Siswa Baru',
                // 'siswa_baru' => $this->Siswa_baruModel->get()->result(),
                'ppdb_setting' => $this->PpdbModel->findBy(['id' => 1])->row(),
                'content' => $this->url_index . '/index',
                'cropper' => 'components/hd_cropper',
                'aspect' => '3/4',
            ];

            // print_r($data['ppdb_setting']); exit;

            $this->load->view('layout_admin/base', $data);
        }
    }

    public function get_siswa_baru()
    {
        $tahun_ajaran = $this->PpdbModel->get()->row()->tahun_ajaran;
        echo json_encode(['data' => $this->Siswa_baruModel->findBy(['tahun_ajaran' => $tahun_ajaran])->result()]);
    }

    public function update_status_approve()
    {
        if ($this->Siswa_baruModel->update(['id' => $_POST['id']], ['is_approve' => $_POST['is_approve']])) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil diupdate']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
    }

    public function exportExcel()
    {
        // print_r(); exit();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $tahun_ajaran = $this->PpdbModel->get()->row()->tahun_ajaran;

        foreach (range('A', 'F') as $key => $value) {
            $spreadsheet->getActiveSheet()->getColumnDimension($value)->setAutoSize(true);
        }
        $sheet->setCellValue("A1", "nama");
        $sheet->setCellValue("B1", "kode");
        $sheet->setCellValue("C1", "keterangan");
        $sheet->setCellValue("D1", "is_active");
        $sheet->setCellValue("E1", "created_on");
        $sheet->setCellValue("F1", "created_by");
        $sheet->setCellValue("G1", "approval");
        $sheet->setCellValue("H1", "nik");
        $sheet->setCellValue("I1", "nisn");
        $sheet->setCellValue("J1", "desa_siswa");
        $sheet->setCellValue("K1", "kecamatan_siswa");
        $sheet->setCellValue("L1", "kabupaten_siswa");
        $sheet->setCellValue("M1", "provinsi_siswa");
        $sheet->setCellValue("N1", "agama");
        $sheet->setCellValue("O1", "prestasi");
        $sheet->setCellValue("P1", "is_tahfid");
        $sheet->setCellValue("Q1", "jumlah_hafalan");
        $sheet->setCellValue("R1", "no_hp");
        $sheet->setCellValue("S1", "nama_ayah");
        $sheet->setCellValue("T1", "pekerjaan_ayah");
        $sheet->setCellValue("U1", "no_hp_ayah");
        $sheet->setCellValue("V1", "desa_ayah");
        $sheet->setCellValue("W1", "kecamatan_ayah");
        $sheet->setCellValue("X1", "kabupaten_ayah");
        $sheet->setCellValue("Y1", "provinsi_ayah");
        $sheet->setCellValue("Z1", "nama_ibu");
        $sheet->setCellValue("AA1", "pekerjaan_ibu");
        $sheet->setCellValue("AB1", "no_hp_ibu");
        $sheet->setCellValue("AC1", "desa_ibu");
        $sheet->setCellValue("AD1", "kecamatan_ibu");
        $sheet->setCellValue("AE1", "kabupaten_ibu");
        $sheet->setCellValue("AF1", "provinsi_ibu");
        $sheet->setCellValue("AG1", "nama_wali");
        $sheet->setCellValue("AH1", "pekerjaan_wali");
        $sheet->setCellValue("AI1", "no_hp_wali");
        $sheet->setCellValue("AJ1", "desa_wali");
        $sheet->setCellValue("AK1", "kecamatan_wali");
        $sheet->setCellValue("AL1", "kabupaten_wali");
        $sheet->setCellValue("AM1", "provinsi_wali");
        $sheet->setCellValue("AN1", "tahun_ajaran");

        $pelaporan = $this->Siswa_baruModel->findBy(['tahun_ajaran' => $tahun_ajaran])->result_array();
        $x = 2;
        foreach ($pelaporan as $key => $value) {
            $sheet->setCellValue("A".$x, $value["nama"]);
            $sheet->setCellValue("B".$x, $value["kode"]);
            $sheet->setCellValue("C".$x, $value["keterangan"]);
            $sheet->setCellValue("D".$x, $value["is_active"]);
            $sheet->setCellValue("E".$x, $value["created_on"]);
            $sheet->setCellValue("F".$x, $value["created_by"]);
            $sheet->setCellValue("G".$x, ($value["is_approve"]==1?"Disetujui":($value["is_approve"]==2?"Ditolak":"Diperiksa")));
            $sheet->setCellValue("H".$x, $value["nik"]);
            $sheet->setCellValue("I".$x, $value["nisn"]);
            $sheet->setCellValue("J".$x, $value["desa_siswa"]);
            $sheet->setCellValue("K".$x, $value["kecamatan_siswa"]);
            $sheet->setCellValue("L".$x, $value["kabupaten_siswa"]);
            $sheet->setCellValue("M".$x, $value["provinsi_siswa"]);
            $sheet->setCellValue("N".$x, $value["agama"]);
            $sheet->setCellValue("O".$x, $value["prestasi"]);
            $sheet->setCellValue("P".$x, $value["is_tahfid"]);
            $sheet->setCellValue("Q".$x, $value["jumlah_hafalan"]);
            $sheet->setCellValue("R".$x, $value["no_hp"]);
            $sheet->setCellValue("S".$x, $value["nama_ayah"]);
            $sheet->setCellValue("T".$x, $value["pekerjaan_ayah"]);
            $sheet->setCellValue("U".$x, $value["no_hp_ayah"]);
            $sheet->setCellValue("V".$x, $value["desa_ayah"]);
            $sheet->setCellValue("W".$x, $value["kecamatan_ayah"]);
            $sheet->setCellValue("X".$x, $value["kabupaten_ayah"]);
            $sheet->setCellValue("Y".$x, $value["provinsi_ayah"]);
            $sheet->setCellValue("Z".$x, $value["nama_ibu"]);
            $sheet->setCellValue("AA".$x, $value["pekerjaan_ibu"]);
            $sheet->setCellValue("AB".$x, $value["no_hp_ibu"]);
            $sheet->setCellValue("AC".$x, $value["desa_ibu"]);
            $sheet->setCellValue("AD".$x, $value["kecamatan_ibu"]);
            $sheet->setCellValue("AE".$x, $value["kabupaten_ibu"]);
            $sheet->setCellValue("AF".$x, $value["provinsi_ibu"]);
            $sheet->setCellValue("AG".$x, $value["nama_wali"]);
            $sheet->setCellValue("AH".$x, $value["pekerjaan_wali"]);
            $sheet->setCellValue("AI".$x, $value["no_hp_wali"]);
            $sheet->setCellValue("AJ".$x, $value["desa_wali"]);
            $sheet->setCellValue("AK".$x, $value["kecamatan_wali"]);
            $sheet->setCellValue("AL".$x, $value["kabupaten_wali"]);
            $sheet->setCellValue("AM".$x, $value["provinsi_wali"]);
            $sheet->setCellValue("AN".$x, $value["tahun_ajaran"]);

            $x++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'siswa-baru-'. $tahun_ajaran.'-' . date('dmy') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        $writer->save('php://output');
    }

    public function save_file($file, $slug, $folderPath)
    {
        if (!empty($file)) { // $_FILES untuk mengambil data file
            $cfg = [
                'upload_path' => $folderPath,
                'allowed_types' => 'pdf|doc|docx|xls|xlsx|ppt|pptx|apk',
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
        $id = 1;
        if (!$this->input->post('gambar')) {
            $slug = slugify('ppdb-man-4-banyuwangi');
        } else {
            $slug = explode('.', $this->input->post('gambar'))[0];
        }

        if (!$this->input->post('file_name')) {
            $slug_file = slugify('ppdb-man-4-banyuwangi');
        } else {
            $slug_file = explode('.', $this->input->post('file_name'))[0];
        }

        $file_foto = $this->input->post('file_foto');
        $folderPath = './uploads/img/ppdb_setting/';
        $foto = ($this->input->post('gambar') ? $this->input->post('gambar') : $slug); //jika upload berhasil akan di replace oleh function save_foto()

        if ($file_foto) {
            $foto = save_foto(
                $file_foto,
                $slug,
                $folderPath
                // return $foto -> nama foto
            );
        }

        $file_pdf = (isset($_FILES['file']) ? $_FILES['file'] : $file_pdf['name'] = false);
        $folderPath_file = './uploads/file/ppdb_setting/';
        $file_name = ($this->input->post('file_name') ? $this->input->post('file_name') : $slug);


        if ($file_pdf['name'] != null) {
            $file_name = $this->save_file(
                $file_pdf,
                $slug_file,
                $folderPath_file
                // return $file -> nama file
            );
        }

        // print_r($_POST); exit();
        $data = [
            'is_active' => 1,
            'tanggal_buka'  => $this->input->post('tanggal_buka'),
            'tanggal_tutup'  => $this->input->post('tanggal_tutup'),
            'tahun_ajaran'  => $this->input->post('tahun_ajaran'),
            'keterangan'  => $this->input->post('keterangan'),
            'link'  => $this->input->post('link'),
            'foto'  => $foto,
            'file'  => $file_name
        ];


        if (empty($id)) {
            unset($id);
            if ($this->PpdbModel->add($data)) {
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dimasukan']);
                redirect(base_url($this->url_index));
            }
            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
        } else {
            if ($this->PpdbModel->update(['id' => $id], $data)) {
                $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil diupdate']);
                redirect(base_url($this->url_index));
            }
            exit($this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']));
        }
    }

    public function delete($id)
    {
        $data = $this->PpdbModel->findBy(['id' => $id])->row();
        @unlink(FCPATH . 'uploads/img/' . $data->foto);
        if ($this->PpdbModel->delete(['id' => $id])) {
            $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dihapus']);
        } else {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
        redirect($this->url_index);
    }

    public function nonaktif($id)
    {
        if ($this->PpdbModel->update(['id' => $id], ['is_active' => 0])) {
            $this->session->set_flashdata(['status' => 'success', 'message' => 'Data berhasil dinonaktifkan']);
        } else {
            $this->session->set_flashdata(['status' => 'error', 'message' => 'Oops! Terjadi kesalahan']);
        }
        redirect($this->url_index);
    }
}
