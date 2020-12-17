<?php

class Nilai_wk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('nilai_wk_model');
    }

    public function index()
    {
        $data['nilai'] = $this->nilai_wk_model->tampil_data();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('nilai_wali_kelas/nilai', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        $where = array('id_siswa' => $id);
        $this->nilai_wk_model->hapus_data($where, 'nilai');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Data siswa berhasil dihapus
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
        );
        redirect('penilaian/nilai_wk');
    }
}
