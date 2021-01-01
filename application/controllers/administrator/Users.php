<?php

class Users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        //validasi jika user belum login
        if ($this->session->userdata('masuk') != TRUE) {
            echo '<script>alert("Anda harus login terlebih dahulu");</script>';
            echo '<script>window.location.href = "' . base_url('auth') . '";</script>';
        } else if ($this->session->userdata('akses') != 'admin') {
            echo '<script>alert("Anda tidak diizinkan mengakses halaman ini");</script>';
            echo '<script>window.location.href = "' . base_url('dashboard') . '";</script>';
        }
    }
    public function index()
    {
        $data['users'] = $this->user_model->tampil_data('users')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('users/daftar_users', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_users()
    {
        $data['kelas'] = $this->user_model->tampil_data('kelas')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('users/users_form', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_users_aksi()
    {
        $cek = $this->db->get_where('users', array('username' => $this->input->post('username', true)));
        if ($cek->num_rows() != 0) {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
            <strong>Maaf!</strong> Nama User Sudah Ada !</div>'
            );
            redirect(base_url() . 'administrator/users/tambah_users');
            exit();
        }

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_users();
        } else {
            $data = array(
                'username'   => $this->input->post('username'),
                'password'   => $this->input->post('password'),
                'email'      => $this->input->post('email'),
                'level'      => $this->input->post('level'),
                'blokir'     => $this->input->post('blokir'),
                'id_kelas'   => $this->input->post('id_kelas')
            );

            $this->user_model->insert_data($data, 'users');
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Data user berhasil ditambahkan
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
            );
            redirect('administrator/users');
        }
    }

    public function update($id)
    {
        $where = array('id' => $id);
        $data['users'] = $this->user_model->edit_data($where, 'users')->result();
        $data['kelas']     = $this->user_model->tampil_data('kelas')->result();
        $data['detail']    = $this->user_model->ambil_id_users($id);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('users/users_update', $data);
        $this->load->view('templates/footer');
    }

    public function update_aksi()
    {
        $this->_rules();
        $id         = $this->input->post('id');
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');
        $email      = $this->input->post('email');
        $level      = $this->input->post('level');
        $blokir     = $this->input->post('blokir');
        $id_kelas     = $this->input->post('id_kelas');

        $data = array(
            'username' => $username,
            'password' => $password,
            'email'    => $email,
            'level'    => $level,
            'blokir'   => $blokir,
            'id_kelas'    => $id_kelas
        );

        $where = array('id' => $id);

        $this->user_model->update_data($where, $data, 'users');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data user berhasil diupdate
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
        );
        redirect('administrator/users');
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->user_model->hapus_data($where, 'users');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data user berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
        );
        redirect('administrator/users');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('username', 'username', 'required', [
            'required' => 'Username wajib diisi!'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required', [
            'required' => 'Password wajib diisi!'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required', [
            'required' => 'Email wajib diisi!'
        ]);
        $this->form_validation->set_rules('level', 'level', 'required', [
            'required' => 'Level wajib diisi!'
        ]);
        $this->form_validation->set_rules('blokir', 'blokir', 'required', [
            'required' => 'Blokir wajib diisi!'
        ]);
        $this->form_validation->set_rules('id_kelas', 'id_kelas', 'required', [
            'required' => 'Nama Kelas wajib diisi!'
        ]);
    }
}
