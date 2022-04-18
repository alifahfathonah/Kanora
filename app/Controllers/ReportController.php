<?php

namespace App\Controllers;

use App\Models\PassangerModel;
use \Dompdf\Dompdf;
use \Dompdf\Options;

class ReportController extends BaseController
{
    public function __construct()
    {

        $this->Passanger = new PassangerModel();
        helper('form');
    }
    public function index()
    {

        $first_date = $this->request->getPost('first_date');
        $end_date = $this->request->getPost('end_date');
        $data_passanger = $this->Passanger->getAll();
        if (session()->get('name') == True) {
            $data = [
                'data_passanger' => $data_passanger,
                'title' => 'Halaman | Report',
                'first_date' => $first_date,
                'end_date' => $end_date

            ];
            return view('report/index', $data);
        } else {
            return redirect()->to('Auth/login');
        }
    }
    public function getData()
    {
        $first_date = $this->request->getPost('first_date');
        $end_date = $this->request->getPost('end_date');

        $data_passanger = $this->Passanger->getDetail2($first_date, $end_date);
        $data = [
            'title' => 'Halaman | Report',
            'data_passanger' => $data_passanger,
            'first_date' => $first_date,
            'end_date' => $end_date
        ];
        return view('report/index', $data);
    }
    public function print($first_date, $end_date)
    {


        $data_passanger = $this->Passanger->getDetail2($first_date, $end_date);
        $data = [
            'title' => 'Halaman | Report',
            'data_passanger' => $data_passanger
        ];
        //return 
        $html = view('report/Print', $data);
        $option = new Options();
        $option->setIsRemoteEnabled(true);
        $option->setIsHtml5ParserEnabled(true);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }
}
