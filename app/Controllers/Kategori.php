<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kategori extends BaseController
{
    public function index($seo)
    {
        $data['seo'] = $seo;
        return view('landing/kategori/kategori', $data);
    }
}
