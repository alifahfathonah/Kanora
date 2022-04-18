<?php

namespace App\Controllers;

use App\Models\PassangerModel;

class Home extends BaseController
{
    public function __construct()
    {

        $this->Passanger = new PassangerModel();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'Halaman | Dashboard'
        ];
        if (session()->get('name') == True) {
            $data['wna'] = $this->Passanger->countWna();
            $data['wni'] = $this->Passanger->countWni();
            return view('V_Dashboard_admin', $data);
        } else {
            return redirect()->to('Auth/login');
        }
    }
}
