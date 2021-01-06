<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Raport_model extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tahun_akademik');
    }
    public function tampil_dataTahun($tahun_akademik)
    {
        return $this->db->get_where('tahun_akademik', ["id" => $tahun_akademik])->row();
    }
    public function getDataByID($nis, $tahun_akademik)
    {
        $this->db->select('*');
        $this->db->from('nilai n');
        $this->db->join('mapel m', 'm.id_mapel=n.id_mapel');
        $this->db->join('guru g', 'g.id_guru=n.id_guru');
        $this->db->join('siswa s', 's.username = n.nis');
        $this->db->join('kelas k', 'k.id_kelas=s.id_kelas');
        $this->db->join('tahun_akademik t', 't.id=n.tahun_akademik');
        $this->db->where('n.nis', $nis);
        $this->db->where('n.tahun_akademik', $tahun_akademik);
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
