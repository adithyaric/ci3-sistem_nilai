<?php

class Mapel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mapel_model');
        //validasi jika user belum login
        if ($this->session->userdata('masuk') != TRUE) {
            echo '<script>alert("Anda harus login terlebih dahulu");</script>';
            echo '<script>window.location.href = "' . base_url('auth') . '";</script>';
        } else if ($this->session->userdata('akses') != 'admin') {
            echo '<script>alert("Anda tidak diizinkan mengakses halaman ini");</script>';
            echo '<script>window.location.href = "' . base_url('administrator/dashboard') . '";</script>';
        }
    }

    public function index()
    {
        $data['mapel'] = $this->mapel_model->tampil_data('mapel')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('mapel/mapel', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_mapel()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('mapel/mapel_form');
        $this->load->view('templates/footer');
    }

    public function tambah_mapel_aksi()
    {
        $nama_mapel = $this->input->post('nama_mapel');
        $cek = $this->db->get_where('mapel', array('nama_mapel' => $nama_mapel));
        if ($cek->num_rows() != 0) {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
            <strong>Maaf!</strong> Mata Pelajaran Sudah Ada !</div>'
            );
            redirect(base_url() . 'administrator/mapel/tambah_mapel');
            exit();
        }
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->tambah_mapel();
        } else {
            $data = array('nama_mapel' => $nama_mapel);

            $this->mapel_model->insert_data($data, 'mapel');
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data mata pelajaran berhasil ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
            );
            redirect('administrator/mapel');
        }
    }

    public function update($id)
    {
        $where = array('id_mapel' => $id);
        $data['mapel'] = $this->db->get_where('mapel', $where)->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('mapel/mapel_update', $data);
        $this->load->view('templates/footer');
    }

    public function update_aksi()
    {
        $id             = $this->input->post('id_mapel');
        $nama_mapel     = $this->input->post('nama_mapel');

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($id);
        } else {
            $data = array('nama_mapel' => $nama_mapel,);

            $where = array(
                'id_mapel' => $id
            );

            $this->mapel_model->update_data($where, $data, 'mapel');
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Data Mata Pelajaran berhasil diupdate
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
            );
            redirect('administrator/mapel');
        }
    }
    public function delete($id)
    {
        $where = array('id_mapel' => $id);
        $this->mapel_model->hapus_data($where, 'mapel');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Data Mata Pelajaran berhasil dihapus
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
        );
        redirect('administrator/mapel');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_mapel', 'nama_mapel', 'required', [
            'required' => 'Nama mata pelajaran wajib diisi!'
        ]);
    }
}
