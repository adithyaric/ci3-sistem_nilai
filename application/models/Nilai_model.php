<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_model extends CI_Model
{
    public function import_data($databarang)
    {
        $jumlah = count($databarang);
        if ($jumlah > 0) {
            $this->db->replace('nilai', $databarang);
        }
    }

    public function get($id_mapel)
    {
        return $this->db->get_where('mapel', ["id_mapel" => $id_mapel])->row();
    }

    public function _getData($id_mapel, $id_guru)
    {
        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->where('nilai.id_mapel', $id_mapel);
        $this->db->where('nilai.id_guru', $id_guru);
        $this->db->order_by('nilai.nis', 'asc');
        return $this->db->get()->result_array();
    }
    public function _getDatas($id_wali)
    {
        $this->db->select('*');
        $this->db->from('nilai n');
        $this->db->join('siswa s', 's.username = n.nis');
        $this->db->where('s.id_kelas', $id_wali);
        $this->db->order_by('n.nis', 'asc');
        return $this->db->get()->result_array();
    }
    public function getData()
    {
        return $this->db->get('nilai')->result_array();
    }
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
