<?php

namespace App\Controllers;

use App\Models\PassangerModel;
use \Dompdf\Dompdf;
use \Dompdf\Options;

class Registration extends BaseController
{
    public function __construct()
    {

        $this->Passanger = new PassangerModel();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'Page | Registration',
            'role' => $this->Passanger->getRole(),
            'airline' => $this->Passanger->getAirline()
        ];
        return view('V_Registration', $data);
    }
    public function insertData()
    {
        $visa = $this->request->getFile('visa');
        $nama_file = $visa->getRandomName();
        $data = [
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
        $visa->move('foto/', $nama_file);
        $this->Passanger->insertData($data);
        session()->setFlashdata('tambah', 'Congratulation you have successfully registered.. please download your proof of registration');
        return redirect()->to('/Registration');
    }
    public function Passanger()
    {
        $data = [
            'title' => 'Page | Validation',

        ];
        return view('V_Passanger', $data);
    }
    public function validation()
    {
        $passport_number = $this->request->getPost('passport_number');
        $data_passanger = $this->Passanger->getData($passport_number);
        $data = [
            'passport_number' => $passport_number,
            'data_passanger' => $data_passanger,
            'title' => 'Page | Validation'
        ];

        return view('/V_Passanger', $data);
    }
    public function print($passport_number)
    {
        $data_passanger = $this->Passanger->getData($passport_number);
        $data = [
            'print' => $data_passanger
        ];

        // return 
        $html = view('/V_Print', $data);
        $option = new Options();
        $option->set('IsRemoteEnabled', TRUE);
        $option->set('debugKeepTemp', TRUE);
        $option->set('IsHtml5ParserEnabled', true);
        $dompdf = new Dompdf($option);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream();
    }
}
