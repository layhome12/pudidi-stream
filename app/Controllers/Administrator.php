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
    public function users_management()
    {
        
    }
    public function admin_management()
    {
        echo "TEST";
    }
}
