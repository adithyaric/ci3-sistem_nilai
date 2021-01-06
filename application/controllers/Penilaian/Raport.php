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
        $data['tahun_akademik'] = $this->Raport_model->tampil_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('raport/raport', $data);
        $this->load->view('templates/footer');
    }
    public function raport_aksi()
    {
        $nis = $this->input->post('nis', TRUE);
        $tahun_akademik = $this->input->post('tahun_akademik', TRUE);
        $cek = $this->db->get_where('siswa', array('username' => $nis));
        $this->form_validation->set_rules('nis', 'nis', 'required', [
            'required' => 'NIS wajib diisi'
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
            $data['nis'] = $nis;
            $data['tahun_akademik'] = $this->Raport_model->tampil_dataTahun($tahun_akademik);
            $data['nilai'] = $this->Raport_model->getDataByID($nis, $tahun_akademik);
            $data['siswa'] = $this->Raport_model->getSiswa($nis);
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('raport/data_raport', $data);
            $this->load->view('templates/footer');
        }
    }
    public function pdf()
    {
        $nis = $this->input->post('nis', TRUE);
        $tahun_akademik = $this->input->post('tahun_akademik', TRUE);
        $data['nilai'] = $this->Raport_model->getDataByID($nis, $tahun_akademik);
        $data['tahun_akademik'] = $this->Raport_model->tampil_dataTahun($tahun_akademik);
        $data['siswa'] = $this->Raport_model->getSiswa($nis);
        $this->load->view('templates/header');
        $this->load->view('raport/print', $data);
    }
}
