<?php

class Guru extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('guru_model');
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
    $data['mapel'] = $this->guru_model->tampil_data('mapel')->result();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('guru/guru_form', $data);
    $this->load->view('templates/footer');
  }

  public function tambah_guru_aksi()
  {
    $username      = $this->input->post('username', true);
    $nama_guru     = $this->input->post('nama_guru');
    $alamat        = $this->input->post('alamat');
    $jenis_kelamin = $this->input->post('jenis_kelamin');
    $email         = $this->input->post('email');
    $telp          = $this->input->post('telp');
    $id_mapel      = $this->input->post('id_mapel');
    $password      = $this->input->post('password');
    $photo         = $_FILES['photo']['name'];

    $cek = $this->db->get_where('guru', array('username' => $username));
    if ($cek->num_rows() != 0) {
      $this->session->set_flashdata(
        'msg',
        '<div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
        <strong>Maaf!</strong> NIP Guru Sudah Ada !</div>'
      );
      redirect(base_url() . 'administrator/guru/tambah_guru');
      exit();
    }
    $this->_rules();
    if (empty($photo)) {
      $this->form_validation->set_rules('photo', 'photo', 'required', [
        'required' => 'Foto wajib diisi!'
      ]);
    }
    if ($this->form_validation->run() == FALSE) {
      $this->tambah_guru();
    } else {
      $config['upload_path']   = './assets/uploads';
      $config['allowed_types'] = 'jpg|jpeg|png|gif|tiff';

      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('photo')) {
        echo "Gagal Upload!...";
        die();
      } else {
        $photo = $this->upload->data('file_name');
      }

      $data = array(
        'username'      => $username,
        'password'      => $password,
        'nama_guru'     => $nama_guru,
        'alamat'        => $alamat,
        'jenis_kelamin' => $jenis_kelamin,
        'email'         => $email,
        'telp'          => $telp,
        'photo'         => $photo,
        'id_mapel'      => $id_mapel,
        // 'level'         => $level
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
    $where = array('username' => $id);
    $data['guru']     = $this->guru_model->edit_data($where, 'guru')->result();
    $data['mapel']     = $this->guru_model->tampil_data('mapel')->result();
    $data['detail']    = $this->guru_model->ambil_id_guru($id);
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('guru/guru_update', $data);
    $this->load->view('templates/footer');
  }

  public function update_guru_aksi()
  {

    $this->_rules();

    $id            = $this->input->post('id_guru');
    $username      = $this->input->post('username');
    $password      = $this->input->post('password');
    $nama_guru     = $this->input->post('nama_guru');
    $alamat        = $this->input->post('alamat');
    $jenis_kelamin = $this->input->post('jenis_kelamin');
    $email         = $this->input->post('email');
    $telp          = $this->input->post('telp');
    $id_mapel      = $this->input->post('id_mapel');
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
      'username'      => $username,
      'password'      => $password,
      'nama_guru'     => $nama_guru,
      'alamat'        => $alamat,
      'jenis_kelamin' => $jenis_kelamin,
      'email'         => $email,
      'telp'          => $telp,
      'id_mapel'      => $id_mapel
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

  public function delete($id)
  {
    $where = array('username' => $id);
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
    $this->form_validation->set_rules('username', 'username', 'required', [
      'required' => 'Nip wajib diisi!'
    ]);
    $this->form_validation->set_rules('password', 'password', 'required', [
      'required' => 'Password wajib diisi!'
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
    $this->form_validation->set_rules('id_mapel', 'id_mapel', 'required', [
      'required' => 'Mata Pelajaran wajib diisi!'
    ]);
  }
}
