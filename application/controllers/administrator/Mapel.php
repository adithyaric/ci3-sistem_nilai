<?php

class Mapel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mapel_model');
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
        $data['guru'] = $this->mapel_model->tampil_data('guru')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('mapel/mapel_form', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_mapel_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_mapel();
        } else {
            $nama_mapel     = $this->input->post('nama_mapel');
            $nama_guru      = $this->input->post('nama_guru');

            $data = array(
                'nama_mapel'    => $nama_mapel,
                'nama_guru'      => $nama_guru,
            );

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
        $data['mapel'] = $this->db->query("SELECT * FROM mapel mp, guru gr WHERE mp.nama_guru=gr.nama_guru AND mp.id_mapel='$id'")->result();
        $data['guru'] = $this->mapel_model->tampil_data('guru')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('mapel/mapel_update', $data);
        $this->load->view('templates/footer');
    }

    public function update_aksi()
    {
        $id             = $this->input->post('id_mapel');
        $nama_mapel     = $this->input->post('nama_mapel');
        $nama_guru      = $this->input->post('nama_guru');

        $data = array(
            'nama_mapel' => $nama_mapel,
            'nama_guru'      => $nama_guru,
        );

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
        $this->form_validation->set_rules('nama_guru', 'nama_guru', 'required', [
            'required' => 'Nama guru wajib diisi!'
        ]);
    }
}
