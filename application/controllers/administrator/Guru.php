<?php

class Guru extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('guru_model');
  }

  public function index()
  {
    $data['guru'] = $this->guru_model->tampil_data('guru')->result();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('guru/guru', $data);
    $this->load->view('templates/footer');
  }
  public function detail($id)
  {
    $data['detail'] = $this->guru_model->ambil_id_guru($id);
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('guru/guru_detail', $data);
    $this->load->view('templates/footer');
  }

  public function tambah_guru()
  {
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('guru/guru_form');
    $this->load->view('templates/footer');
  }

  public function tambah_guru_aksi()
  {
    $this->_rules();
    if ($this->form_validation->run() == FALSE) {
      $this->tambah_guru();
    } else {
      $nip           = $this->input->post('nip');
      $nama_guru     = $this->input->post('nama_guru');
      $alamat        = $this->input->post('alamat');
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $email         = $this->input->post('email');
      $telp          = $this->input->post('telp');
      $photo         = $_FILES['photo'];
      if ($photo = '') {
      } else {
        $config['upload_path']   = './assets/uploads';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|tiff';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('photo')) {
          echo "Gagal Upload!";
          die();
        } else {
          $photo = $this->upload->data('file_name');
        }
      }

      $data = array(
        'nip'          => $nip,
        'nama_guru'    => $nama_guru,
        'alamat'        => $alamat,
        'jenis_kelamin' => $jenis_kelamin,
        'email'         => $email,
        'telp'          => $telp,
        'photo'         => $photo,
      );

      $this->guru_model->insert_data($data, 'guru');
      $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data guru berhasil ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      );
      redirect('administrator/guru');
    }
  }

  public function update($id)
  {
    $where = array('nip' => $id);
    $data['guru']     = $this->guru_model->edit_data($where, 'guru')->result();
    $data['detail']    = $this->guru_model->ambil_id_guru($id);
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('guru/guru_update', $data);
    $this->load->view('templates/footer');
  }

  public function update_guru_aksi()
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $id = $this->input->post('id_guru');
      $this->update($id);
    } else {
      $id            = $this->input->post('id_guru');
      $nip          = $this->input->post('nip');
      $nama_guru    = $this->input->post('nama_guru');
      $alamat        = $this->input->post('alamat');
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $email         = $this->input->post('email');
      $telp          = $this->input->post('telp');
      $photo         = $_FILES['userfile']['name'];
      if ($photo) {
        $config['upload_path']   = './assets/uploads';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|tiff';

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('userfile')) {
          $userfile = $this->upload->data('file_name');
          $this->db->set('photo', $userfile);
        } else {
          echo "Photo Gagal di-Upload!";
        }
      }

      $data = array(
        'nip'          => $nip,
        'nama_guru'    => $nama_guru,
        'alamat'        => $alamat,
        'jenis_kelamin' => $jenis_kelamin,
        'email'         => $email,
        'telp'          => $telp
      );

      $where = array(
        'id_guru' => $id,
      );

      $this->guru_model->update_data($where, $data, 'guru');
      $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data guru berhasil diupdate
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      );
      redirect('administrator/guru');
    }
  }

  public function delete($id)
  {
    $where = array('nip' => $id);
    $this->guru_model->hapus_data($where, 'guru');
    $this->session->set_flashdata(
      'pesan',
      '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data guru berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('administrator/guru');
  }

  public function _rules()
  {
    $this->form_validation->set_rules('nip', 'nip', 'required', [
      'required' => 'Nip wajib diisi!'
    ]);
    $this->form_validation->set_rules('nama_guru', 'nama_guru', 'required', [
      'required' => 'Nama guru wajib diisi!'
    ]);
    $this->form_validation->set_rules('alamat', 'alamat', 'required', [
      'required' => 'Alamat wajib diisi!'
    ]);
    $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required', [
      'required' => 'Jenis kelamin wajib diisi!'
    ]);
    $this->form_validation->set_rules('email', 'email', 'required', [
      'required' => 'Email wajib diisi!'
    ]);
    $this->form_validation->set_rules('telp', 'telp', 'required', [
      'required' => 'Nomor telepon wajib diisi!'
    ]);
    $this->form_validation->set_rules('photo', 'photo', 'required', [
      'required' => 'Foto wajib diisi!'
    ]);
  }
}