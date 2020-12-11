<?php

class Kelas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('kelas_model');
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
        $data['guru'] = $this->kelas_model->tampil_data('guru')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kelas/kelas_form', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_kelas_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_kelas();
        } else {
            $nama_kelas     = $this->input->post('nama_kelas');
            $nama_guru      = $this->input->post('nama_guru');

            $data = array(
                'nama_kelas'    => $nama_kelas,
                'nama_guru'     => $nama_guru,
            );

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
        $data['kelas'] = $this->db->query("SELECT * FROM kelas kl, guru gr WHERE kl.nama_guru=gr.nama_guru AND kl.id_kelas='$id'")->result();
        $data['guru'] = $this->kelas_model->tampil_data('guru')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kelas/kelas_update', $data);
        $this->load->view('templates/footer');
    }

    public function update_aksi()
    {
        $id             = $this->input->post('id_kelas');
        $nama_kelas     = $this->input->post('nama_kelas');
        $nama_guru      = $this->input->post('nama_guru');

        $data = array(
            'nama_kelas'    => $nama_kelas,
            'nama_guru'     => $nama_guru,
        );

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
        $this->form_validation->set_rules('nama_kelas', 'nama_kelas', 'required', [
            'required' => 'Nama Kelas wajib diisi!'
        ]);
        $this->form_validation->set_rules('nama_guru', 'nama_guru', 'required', [
            'required' => 'Nama guru wajib diisi!'
        ]);
    }
}
