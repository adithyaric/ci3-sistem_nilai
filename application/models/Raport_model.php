<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Raport_model extends CI_Model
{
    public function getDataByID($nis)
    {
        $this->db->select('*');
        $this->db->from('nilai n');
        $this->db->join('mapel m', 'm.id_mapel=n.id_mapel');
        $this->db->join('guru g', 'g.id_guru=n.id_guru');
        $this->db->join('siswa s', 's.username = n.nis');
        $this->db->join('kelas k', 'k.id_kelas=s.id_kelas');
        $this->db->where('n.nis', $nis);
        return $this->db->get()->result_array();
    }
    public function getSiswa($nis)
    {
        $this->db->select('*');
        $this->db->from('siswa s');
        $this->db->join('kelas k', 'k.id_kelas=s.id_kelas');
        $this->db->where('s.username', $nis);
        return $this->db->get()->row();
    }
}
