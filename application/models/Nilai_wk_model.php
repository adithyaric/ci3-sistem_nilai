<?php

class Nilai_wk_model extends CI_Model
{

    public function tampil_data()
    {
        $this->db->select('*');
        $this->db->from('nilai n');
        $this->db->join('siswa s', 's.id_siswa = n.id_siswa');
        $hasil = $this->db->get();
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return false;
        }
    }

    public function ambil_id_siswa($id)
    {
        $this->db->select('*');
        $this->db->from('nilai s');
        $this->db->join('nilai_detail k', 'k.id_kelas = s.id_kelas');
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
