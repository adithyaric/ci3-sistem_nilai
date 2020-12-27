<?php
class Login_model extends CI_Model
{
    function auth_users($username, $password)
    {
        $query = $this->db->query("SELECT * FROM users WHERE username='$username' AND password = '$password' LIMIT 1");
        return $query;
    }

    function auth_guru($username, $password)
    {
        $query = $this->db->query("SELECT * FROM guru WHERE username='$username' AND password = '$password' LIMIT 1");
        return $query;
    }

    function auth_siswa($username, $password)
    {
        $query = $this->db->query("SELECT * FROM siswa WHERE username='$username' AND password = '$password' LIMIT 1");
        return $query;
    }
}
