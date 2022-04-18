<?php

namespace App\Controllers;

use App\Models\PassangerModel;

class WniController extends BaseController
{
    public function __construct()
    {

        $this->Passanger = new PassangerModel();
        helper('form');
    }
    public function index()
    {
        if (session()->get('name') == True) {
            $data = [
                'title' => 'Halaman | WNI',
                'wni' => $this->Passanger->getWni(),
                'total' => $this->Passanger->countWni(),
                'L' => $this->Passanger->countMale1(),
                'P' => $this->Passanger->countFemale1()
            ];
            return view('wni/index', $data);
        } else {
            return redirect()->to('Auth/login');
        }
    }
    public function getDetail($id_passanger)
    {
        $data = array(
            'title' => 'WNI | Detail',
            'Detail' => $this->Passanger->getDetail($id_passanger)
        );

        return view('wni/Details', $data);
    }
    public function getUpdate($id_passanger)
    {
        $data = array(
            'title' => 'WNI | Update',
            'role' => $this->Passanger->getRole(),
            'airline' => $this->Passanger->getAirline(),
            'Update' => $this->Passanger->getDetail($id_passanger)
        );
        return view('wni/Update', $data);
    }
    public function EditAction($id_passanger)
    {
        $file = $this->request->getFile('visa');
        if ($file->getError() == 4) {
            $data = [
                'id_passanger' => $id_passanger,
                'passport_number' => $this->request->getPost('passport_number'),
                'role_id' => $this->request->getPost('role_id'),
                'name' => $this->request->getPost('name'),
                'birth_date' => $this->request->getPost('birth_date'),
                'flight_date' => $this->request->getPost('flight_date'),
                'gender' => $this->request->getPost('gender'),
                'country' => $this->request->getPost('country'),
                'flight_number' => $this->request->getPost('flight_number'),
                'airline_id' => $this->request->getPost('airline_id'),

            ];
            $this->Passanger->editData($data);
        } else {



            $file = $this->request->getFile('visa');
            $nama_file = $file->getRandomName();
            $data = [
                'id_passanger' => $id_passanger,
                'passport_number' => $this->request->getPost('passport_number'),
                'role_id' => $this->request->getPost('role_id'),
                'name' => $this->request->getPost('name'),
                'birth_date' => $this->request->getPost('birth_date'),
                'flight_date' => $this->request->getPost('flight_date'),
                'gender' => $this->request->getPost('gender'),
                'country' => $this->request->getPost('country'),
                'flight_number' => $this->request->getPost('flight_number'),
                'airline_id' => $this->request->getPost('airline_id'),
                'visa' => $nama_file
            ];
            // upload file foto
            $file->move('foto/', $nama_file);
            $this->Passanger->editData($data);
        }

        session()->setFlashdata('pesan', 'Data Berhasil Di Ubah.');
        return redirect()->to('/Passanger/wni');
    }
    public function deleteData($id_passanger)
    {

        $this->Passanger->deleteData($id_passanger);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus.');
        return redirect()->to('/Passanger/wni');
    }
}
