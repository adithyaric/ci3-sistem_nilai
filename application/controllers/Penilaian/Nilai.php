<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Nilai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Nilai_model');
    }
    public function index()
    {
        $id_mapel = $this->session->userdata('ses_id_mapel');
        $id_guru = $this->session->userdata('ses_id');
        $id_wali = $this->session->userdata('ses_id_kelas');
        if ($this->session->userdata('akses') == 'guru') {
            $data['nilai'] = $this->Nilai_model->_getData($id_mapel, $id_guru);
        } else if ($this->session->userdata('akses') == 'wali_kelas') {
            $data['nilai'] = $this->Nilai_model->_getDatas($id_wali);
        } else {
            $data['nilai'] = $this->Nilai_model->getData();
        }

        $data['kelas'] = $this->Nilai_model->get($id_wali);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('nilai/nilai', $data);
        $this->load->view('templates/footer');
    }

    public function uploaddata()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'xlsx|xls';
        $config['file_name']            = 'doc' . time();
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('importexcel')) {
            $mapel = $this->session->userdata('ses_id_mapel');
            $id_guru = $this->session->userdata('ses_id');
            $semester = $this->input->post('semester', TRUE);
            if (empty($semester)) {
                $this->session->set_flashdata(
                    'msg',
                    '<div class="alert alert-warning">
                    <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
                    <strong>Semester!</strong> wajib di-isi !</div>'
                );
                redirect(base_url() . 'penilaian/nilai');
                exit();
            }
            $file = $this->upload->data();
            $reader = ReaderEntityFactory::createXLSXReader();
            $reader->open('uploads/' . $file['file_name']);
            foreach ($reader->getSheetIterator() as $sheet) {
                $numRow = 1;
                foreach ($sheet->getRowIterator() as $row) {
                    if ($numRow > 1) {
                        $databarang = array(
                            'nis'   => $row->getCellAtIndex(1),
                            'tugas'   => $row->getCellAtIndex(2),
                            'uts'        => $row->getCellAtIndex(3),
                            'uas'        => $row->getCellAtIndex(4),
                            'id_mapel' => $mapel,
                            'id_guru' => $id_guru,
                            'semester' => $semester
                        );
                        $this->Nilai_model->import_data($databarang);
                    }
                    $numRow++;
                }
                $reader->close();
                unlink('uploads/.' . $file['file_name']);
                $this->session->set_flashdata('pesan', 'import Data berhasil');
                redirect('penilaian/nilai');
            }
        } else {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
                <strong>Maaf!</strong> File wajib di-isi !</div>'
            );
            redirect(base_url() . 'penilaian/nilai');
            exit();
        }
    }
    public function update($id)
    {
        $data['nilai'] = $this->Nilai_model->getDataByID($id);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('nilai/nilai_update', $data);
        $this->load->view('templates/footer');
    }
    public function update_aksi()
    {
        $id      = $this->input->post('id_nilai');
        $tugas   = $this->input->post('tugas');
        $uts     = $this->input->post('uts');
        $uas     = $this->input->post('uas');

        $data = array(
            'tugas' => $tugas,
            'uts' => $uts,
            'uas' => $uas
        );

        $where = array(
            'id_nilai' => $id
        );

        $this->Nilai_model->update_data($where, $data, 'nilai');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Data Nilai berhasil diupdate
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
        );
        redirect('penilaian/nilai');
    }
    public function delete($id)
    {
        $where = array('id_nilai' => $id);
        $this->Nilai_model->hapus_data($where, 'nilai');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Data Nilai berhasil dihapus
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
        );
        redirect('penilaian/nilai');
    }
}
