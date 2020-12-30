<?php

class Kelas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('kelas_model');
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
        $data['kelas'] = $this->kelas_model->tampil_data('kelas')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kelas/kelas', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_kelas()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kelas/kelas_form');
        $this->load->view('templates/footer');
    }

    public function tambah_kelas_aksi()
    {
        $nama_kelas = $this->input->post('nama_kelas');
        $cek = $this->db->get_where('kelas', array('nama_kelas' => $nama_kelas));
        if ($cek->num_rows() != 0) {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
            <strong>Maaf!</strong> Kelas Sudah Ada !</div>'
            );
            redirect(base_url() . 'administrator/kelas/tambah_kelas');
            exit();
        }
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->tambah_kelas();
        } else {
            $data = array('nama_kelas' => $nama_kelas);

            $this->kelas_model->insert_data($data, 'kelas');
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Kelas berhasil ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
            );
            redirect('administrator/kelas');
        }
    }

    public function update($id)
    {
        $where = array('id_kelas' => $id);
        $data['kelas'] = $this->db->get_where('kelas', $where)->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kelas/kelas_update', $data);
        $this->load->view('templates/footer');
    }

    public function update_aksi()
    {
        $id             = $this->input->post('id_kelas');
        $nama_kelas     = $this->input->post('nama_kelas');

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($id);
        } else {
            $data = array('nama_kelas' => $nama_kelas);

            $where = array(
                'id_kelas' => $id
            );

            $this->kelas_model->update_data($where, $data, 'kelas');
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Data Kelas berhasil diupdate
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
            );
            redirect('administrator/kelas');
        }
    }

    public function delete($id)
    {
        $where = array('id_kelas' => $id);
        $this->kelas_model->hapus_data($where, 'kelas');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Data Kelas berhasil dihapus
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
        );
        redirect('administrator/kelas');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_kelas', 'nama_kelas', 'required', ['required' => 'Nama Kelas wajib diisi!']);
    }
}
