<?php

class Siswa extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('siswa_model');
    $this->load->model('mapel_model');
  }

  public function index()
  {
    $data['siswa'] = $this->siswa_model->tampil_data('siswa')->result();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('siswa/siswa', $data);
    $this->load->view('templates/footer');
  }
  public function detail($id)
  {
    $data['detail'] = $this->siswa_model->ambil_id_siswa($id);
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('siswa/siswa_detail', $data);
    $this->load->view('templates/footer');
  }

  public function tambah_siswa()
  {
    $data['kelas'] = $this->mapel_model->tampil_data('kelas')->result();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('siswa/siswa_form', $data);
    $this->load->view('templates/footer');
  }

  public function tambah_siswa_aksi()
  {
    $this->_rules();
    if ($this->form_validation->run() == FALSE) {
      $this->tambah_siswa();
    } else {
      $nis          = $this->input->post('nis');
      $nama_siswa    = $this->input->post('nama_siswa');
      $alamat        = $this->input->post('alamat');
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $nama_kelas     = $this->input->post('nama_kelas');
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
        'nis'          => $nis,
        'nama_siswa'    => $nama_siswa,
        'alamat'        => $alamat,
        'jenis_kelamin' => $jenis_kelamin,
        'nama_kelas'    => $nama_kelas,
        'photo'         => $photo,
      );

      $this->siswa_model->insert_data($data, 'siswa');
      $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data siswa berhasil ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      );
      redirect('administrator/siswa');
    }
  }

  public function update($id)
  {
    $where = array('nis' => $id);
    $data['siswa']     = $this->db->query("SELECT * FROM siswa s, kelas k WHERE s.nama_kelas=k.nama_kelas AND s.nis='$id'")->result();
    // $data['siswa']     = $this->siswa_model->edit_data($where, 'siswa')->result();
    $data['kelas'] = $this->mapel_model->tampil_data('kelas')->result();
    $data['detail']    = $this->siswa_model->ambil_id_siswa($id);
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('siswa/siswa_update', $data);
    $this->load->view('templates/footer');
  }

  public function update_siswa_aksi()
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $id = $this->input->post('id_siswa');
      $this->update($id);
    } else {
      $id            = $this->input->post('id_siswa');
      $nis          = $this->input->post('nis');
      $nama_siswa    = $this->input->post('nama_siswa');
      $alamat        = $this->input->post('alamat');
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $nama_kelas     = $this->input->post('nama_kelas');
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
        'nis'          => $nis,
        'nama_siswa'    => $nama_siswa,
        'alamat'        => $alamat,
        'jenis_kelamin' => $jenis_kelamin,
        'nama_kelas'    => $nama_kelas,
        // 'photo'         => $photo,
      );

      $where = array(
        'id_siswa' => $id,
      );

      $this->siswa_model->update_data($where, $data, 'siswa');
      $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data siswa berhasil diupdate
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
      );
      redirect('administrator/siswa');
    }
  }

  public function delete($id)
  {
    $where = array('nis' => $id);
    $this->siswa_model->hapus_data($where, 'siswa');
    $this->session->set_flashdata(
      'pesan',
      '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data siswa berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('administrator/siswa');
  }

  public function _rules()
  {
    $this->form_validation->set_rules('nis', 'nis', 'required', [
      'required' => 'nis wajib diisi!'
    ]);
    $this->form_validation->set_rules('nama_siswa', 'nama_siswa', 'required', [
      'required' => 'Nama siswa wajib diisi!'
    ]);
    $this->form_validation->set_rules('alamat', 'alamat', 'required', [
      'required' => 'Alamat wajib diisi!'
    ]);
    $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required', [
      'required' => 'Jenis kelamin wajib diisi!'
    ]);
    $this->form_validation->set_rules('nama_kelas', 'nama_kelas', 'required', [
      'required' => 'Nama Kelas wajib diisi!'
    ]);
    $this->form_validation->set_rules('photo', 'photo', 'required', [
      'required' => 'Foto wajib diisi!'
    ]);
  }
}
