<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ListMovies extends BaseController
{
    public function index($seo)
    {
        $data['seo'] = $seo;
        return view('landing/list/list', $data);
    }
}
