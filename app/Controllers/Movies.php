<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Movies extends BaseController
{
    public function index()
    {
        return view('landing/movies/movies');
    }
}
