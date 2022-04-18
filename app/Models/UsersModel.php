<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table   = 'user';
    protected $participant_id = 'user_id';

    public function insertData($data)
    {
        $this->db->table('users')
            ->insert($data);
    }

    public function login_user($email, $password)
    {
        return $this->db->table('user')->where(
            [
                'email' => $email,
                'password' => $password
            ]
        )->get()->getRowArray();
    }

    public function getData()
    {
        $query = $this->db->query("SELECT * FROM user");

        return $query->getResult();
    }

    //hitung jumlah data user
    public function countUsers()
    {
        $query = $this->db->query("SELECT * FROM user");
        $user = $query->getNumRows();
        return $user;
    }

    //edit data user
    public function editData($data, $user_id)
    {
        $query = $this->db->table('users')->update($data, array('user_id' => $user_id));
        return $query;
    }

    //hapus data user
    public function deleteData($user_id)
    {
        $query = $this->db->table('users')->delete(array('id_user' => $user_id));
        return $query;
    }

    //detail data user
    public function getDetail($user_id)
    {

        $sql = "SELECT * FROM users WHERE id_user='$user_id'";
        $query = $this->db->query($sql);
        $data = $query->getResultArray();
        return $data;
    }
}
