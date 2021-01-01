<?php
class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dash_model');
        //validasi jika user belum login
        if ($this->session->userdata('masuk') != TRUE) {
            echo '<script>alert("Anda harus login terlebih dahulu");</script>';
            echo '<script>window.location.href = "' . base_url('auth') . '";</script>';
        }
    }
    public function index()
    {
        $id = $this->session->userdata('ses_id');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        if ($this->session->userdata('akses') == 'guru') {
            $data['detail'] = $this->Dash_model->getGuru($id);
            $this->load->view('dashboard/guru', $data);
        } else if ($this->session->userdata('akses') == 'siswa') {
            $data['detail'] = $this->Dash_model->getSiswa($id);
            $this->load->view('dashboard/siswa', $data);
        } else {
            $data['detail'] = $this->Dash_model->getUsers($id);
            $this->load->view('dashboard/users', $data);
        }
        $this->load->view('templates/footer');
    }
}
