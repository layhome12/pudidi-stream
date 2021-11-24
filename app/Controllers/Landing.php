<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Landing extends BaseController
{
    public function index()
    {
        return view('landing/home/home');
    }
    public function pencarian()
    {
        $data['search'] = $this->input->getGet('keyword');
        return view('landing/pencarian/pencarian', $data);
    }
}
