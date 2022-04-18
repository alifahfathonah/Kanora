<?php

namespace App\Models;

use CodeIgniter\Model;

class PassangerModel extends Model
{
    protected $table   = 'passanger';
    protected $id_passanger = 'id_passanger';
    protected $createdField         = 'created_at';

    //tambah data
    public function insertData($data)
    {
        $this->db->table('passanger')
            ->insert($data);
    }
    //tambah data
    public function addAirline($data)
    {
        $this->db->table('airlane')
            ->insert($data);
    }
    //get role
    public function getRole()
    {
        return $this->db->table('role')

            ->get()->getResultArray();
    }
    //get airlines
    public function getAirline()
    {
        return $this->db->table('airlane')

            ->get()->getResultArray();
    }
    //get detail airlines
    public function getDetailAirline($airline_id)
    {
        return $this->db->table('airlane')->where('airline_id', $airline_id)
            ->get()->getResultArray();
    }
    //count wna
    public function countWna()
    {
        $query = $this->db->query("SELECT * FROM passanger where role_id = '1'");
        $wna = $query->getNumRows();
        return $wna;
    }
    //count wni
    public function countWni()
    {
        $query = $this->db->query("SELECT * FROM passanger where role_id = '2'");
        $wni = $query->getNumRows();
        return $wni;
    }
    // tampil data WNA
    public function getWna()
    {
        return $this->db->table('passanger')
            ->join('role', 'role.role_id=passanger.role_id')
            ->join('airlane', 'airlane.airline_id=passanger.airline_id')
            ->where('passanger.role_id', '1')
            ->get()->getResultArray();
    }
    // tampil data WNI
    public function getWni()
    {
        return $this->db->table('passanger')
            ->join('role', 'role.role_id=passanger.role_id')
            ->join('airlane', 'airlane.airline_id=passanger.airline_id')
            ->where('passanger.role_id', '2')
            ->get()->getResultArray();
    }
    // tampil data All
    public function getAll()
    {
        return $this->db->table('passanger')
            ->join('role', 'role.role_id=passanger.role_id')
            ->join('airlane', 'airlane.airline_id=passanger.airline_id')
            ->get()->getResultArray();
    }
    // Count data Laki-Laki WNA
    public function countMale()
    {
        $query = $this->db->query("SELECT * FROM passanger WHERE role_id='1' AND gender='Male'");
        $L = $query->getNumRows();
        return $L;
    }
    // Count data Laki-Laki WNI
    public function countMale1()
    {
        $query = $this->db->query("SELECT * FROM passanger WHERE role_id='2' AND gender='Male'");
        $L = $query->getNumRows();
        return $L;
    }
    // Count data Perempuan WNA
    public function countFemale()
    {
        $query = $this->db->query("SELECT * FROM passanger WHERE role_id='1' AND gender='Female'");
        $P = $query->getNumRows();
        return $P;
    }
    // Count data Perempuan WNI
    public function countFemale1()
    {
        $query = $this->db->query("SELECT * FROM passanger WHERE role_id='2' AND gender='Female'");
        $P = $query->getNumRows();
        return $P;
    }
    //detail data passanger
    public function getDetail($id_passanger)
    {
        return $this->db->table('passanger')
            ->join('role', 'role.role_id=passanger.role_id')
            ->join('airlane', 'airlane.airline_id=passanger.airline_id')
            ->where('passanger.id_passanger', $id_passanger)
            ->get()->getResultArray();
    }
    //detail data passanger
    public function getData($passport_number)
    {
        return $this->db->table('passanger')
            ->join('role', 'role.role_id=passanger.role_id')
            ->join('airlane', 'airlane.airline_id=passanger.airline_id')
            ->where('passanger.passport_number', $passport_number)
            ->get()->getResultArray();
    }
    //detail data passanger 2
    public function getDetail2($first_date, $end_date)
    {
        return $this->db->table('passanger')->join('airlane', 'airlane.airline_id=passanger.airline_id')->where('flight_date >=', $first_date)
            ->where('flight_date <=', $end_date)->get()->getResultArray();
    }
    //detail data passanger 3
    public function getDetail3($first_date, $end_date)
    {
        return $this->db->table('passanger')->join('airlane', 'airlane.airline_id=passanger.airline_id')
            ->where('flight_date' . $first_date . $end_date)->get()->getResult();
    }
    // {
    //    $first_date = $this->db->escape($first_date);
    //    $end_date = $this->db->escape($first_date);
    //     $this->db->where('DATE(flight_date) BETWEEN'.$first_date. 'AND' .$end_date);
    //     return $this->db->get('passanger')->getResultArray();
    // }
    //edit data 
    public function editData($data)
    {
        $this->db->table('passanger')
            ->where('id_passanger', $data['id_passanger'])
            ->update($data);
    }
    //edit data airline
    public function editData1($data)
    {
        $this->db->table('airlane')
            ->where('airline_id', $data['airline_id'])
            ->update($data);
    }
    //delete data
    public function deleteData($id_passanger)
    {
        $query = $this->db->table('passanger')->delete(array('id_passanger' => $id_passanger));
        return $query;
    }
    //delete data Airline
    public function deleteData1($airline_id)
    {
        $query = $this->db->table('airlane')->delete(array('airline_id' => $airline_id));
        return $query;
    }
}
