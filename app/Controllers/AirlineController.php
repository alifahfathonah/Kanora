<?php

namespace App\Controllers;

use App\Models\PassangerModel;

class AirlineController extends BaseController
{
    public function __construct()
    {

        $this->Passanger = new PassangerModel();
        helper('form');
    }
    public function index()
    {
        if (session()->get('name') == True) {
            $data = array(
                'title' => 'Halaman | Maskapai',
                'airline' => $this->Passanger->getAirline()
            );

            echo view('airline/index', $data);
        } else {
            return redirect()->to('Auth/login');
        }
    }
    public function getUpdate($airline_id)
    {
        $data = array(
            'title' => 'Page | Edit',
            'Update' => $this->Passanger->getDetailAirline($airline_id)
        );
        return view('airline/Update', $data);
    }

    public function EditAction($airline_id)
    {


        $data = [
            'airline_id' => $airline_id,
            'airlane_name' => $this->request->getPost('airlane_name')
        ];
        $this->Passanger->editData1($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Ubah.');
        return redirect()->to('/Airlines');
    }
    public function Delete($airline_id)
    {

        $this->Passanger->deleteData1($airline_id);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus.');
        return redirect()->to('/Airlines');
    }
    public function insert()
    {

        $data = [
            'airline_id' => $this->request->getPost('airline_id'),
            'airlane_name' => $this->request->getPost('airlane_name')
        ];
        $this->Passanger->addAirline($data);
        session()->setFlashdata('pesan', 'Data berhasil di tambahkan!');
        return redirect()->to('/Airlines');
    }
    public function Add()
    {
        $data = [
            'title' => 'Add | Maskapai'
        ];
        echo view('airline/Add', $data);
    }
}
