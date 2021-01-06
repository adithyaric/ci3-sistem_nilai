<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dash_model extends CI_Model
{
    public function getGuru($id)
    {
        $this->db->select('*');
        $this->db->from('guru g');
        $this->db->join('kelas k', 'k.id_kelas = g.id_kelas');
        $this->db->join('mapel m', 'm.id_mapel=g.id_mapel');
        $this->db->where('g.id_guru', $id);
        return $this->db->get()->row();
    }
    public function getSiswa($id)
    {
        $this->db->select('*');
        $this->db->from('siswa s');
        $this->db->join('kelas k', 'k.id_kelas = s.id_kelas');
        $this->db->where('s.id_siswa', $id);
        return $this->db->get()->row();
    }
    public function getUsers($id)
    {
        $this->db->select('*');
        $this->db->from('users u');
        // $this->db->join('kelas k', 'k.id_kelas = u.id_kelas');
        $this->db->where('u.id', $id);
        return $this->db->get()->row();
    }
}
