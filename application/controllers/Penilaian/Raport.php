<?php

class Raport extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Raport_model');
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
        $this->form_validation->set_rules('nis', 'nis', 'required', [
            'required' => 'NIS wajib diisi'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $nis = $this->input->post('nis', TRUE);

            $data['nilai'] = $this->Raport_model->getDataByID($nis);
            $data['siswa'] = $this->Raport_model->getSiswa($nis);
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('raport/data_raport', $data);
            $this->load->view('templates/footer');
        }
    }
}
