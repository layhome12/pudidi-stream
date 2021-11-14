<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Administrator extends BaseController
{
    public function index()
    {
        return view('administrator/dashboard/dashboard');
    }

    public function video()
    {
        echo "TEST";
    }
}
