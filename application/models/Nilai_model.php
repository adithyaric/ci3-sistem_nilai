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

    public function get($id_kelas)
    {
        return $this->db->get_where('kelas', ["id_kelas" => $id_kelas])->row();
    }

    //('akses') == 'guru'
    public function _getData($id_mapel, $id_guru)
    {
        $this->db->select('*');
        $this->db->from('nilai n');
        $this->db->join('mapel m', 'm.id_mapel=n.id_mapel');
        $this->db->join('guru g', 'g.id_guru=n.id_guru');
        $this->db->where('n.id_mapel', $id_mapel);
        $this->db->where('n.id_guru', $id_guru);
        $this->db->order_by('n.semester', 'asc');
        return $this->db->get()->result_array();
    }
    //('akses') == 'wali_kelas'
    public function _getDatas($id_wali)
    {
        $this->db->select('*');
        $this->db->from('nilai n');
        $this->db->join('mapel m', 'm.id_mapel=n.id_mapel');
        $this->db->join('guru g', 'g.id_guru=n.id_guru');
        $this->db->join('siswa s', 's.username = n.nis');
        $this->db->where('s.id_kelas', $id_wali);
        $this->db->order_by('n.id_mapel', 'asc');
        return $this->db->get()->result_array();
    }
    //('akses') == 'admin'
    public function getData()
    {
        $this->db->select('*');
        $this->db->from('nilai n');
        $this->db->join('mapel m', 'm.id_mapel=n.id_mapel');
        $this->db->join('guru g', 'g.id_guru=n.id_guru');
        $this->db->order_by('n.id_mapel', 'asc');
        return $this->db->get()->result_array();
    }
    public function getDataByID($where)
    {
        $this->db->select('*');
        $this->db->from('nilai n');
        $this->db->join('mapel m', 'm.id_mapel=n.id_mapel');
        $this->db->join('guru g', 'g.id_guru=n.id_guru');
        $this->db->join('siswa s', 's.username = n.nis');
        $this->db->where('n.id_nilai', $where);
        return $this->db->get()->result_array();
    }
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
