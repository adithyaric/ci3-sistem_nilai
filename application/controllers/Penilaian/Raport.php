<?php

class Raport extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Raport_model');
        //validasi jika user belum login
        if ($this->session->userdata('masuk') != TRUE) {
            echo '<script>alert("Anda harus login terlebih dahulu");</script>';
            echo '<script>window.location.href = "' . base_url('auth') . '";</script>';
        }
    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('raport/raport');
        $this->load->view('templates/footer');
    }
    public function raport_aksi()
    {
        $nis = $this->input->post('nis', TRUE);
        $semester = $this->input->post('semester', TRUE);
        $cek = $this->db->get_where('siswa', array('username' => $nis));
        $this->form_validation->set_rules('nis', 'nis', 'required', [
            'required' => 'NIS wajib diisi'
        ]);
        $this->form_validation->set_rules('semester', 'semester', 'required', [
            'required' => 'semester wajib diisi'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            if ($cek->num_rows() < 1) {
                $this->session->set_flashdata(
                    'msg',
                    '<div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
                <strong>Maaf!</strong> NIS Siswa Tidak Ada !</div>'
                );
                redirect(base_url() . 'penilaian/raport');
                exit();
            }
            $data['nilai'] = $this->Raport_model->getDataByID($nis, $semester);
            $data['semester'] = $semester;
            $data['siswa'] = $this->Raport_model->getSiswa($nis);
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('raport/data_raport', $data);
            $this->load->view('templates/footer');
        }
    }
}
