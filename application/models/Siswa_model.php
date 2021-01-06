<?php

class Siswa_model extends CI_Model
{

    public function tampil_data($table)
    {
        return $this->db->get($table);
    }
    public function tampil_data_siswa()
    {
        $this->db->select('*');
        $this->db->from('siswa s');
        $this->db->join('kelas k', 'k.id_kelas = s.id_kelas');
        $this->db->order_by('s.id_kelas');
        $query = $this->db->get();
        return $query;
    }
    public function ambil_id_siswa($id)
    {
        $this->db->select('*, k.nama_kelas as nama_kelas');
        $this->db->from('siswa s');
        $this->db->join('kelas k', 'k.id_kelas = s.id_kelas');
        $this->db->where('username', $id);
        $hasil = $this->db->get();
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return false;
        }
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
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

    public function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
}
