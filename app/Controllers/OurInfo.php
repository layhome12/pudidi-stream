<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class OurInfo extends BaseController
{
    public function tentang()
    {
        return view('landing/ourinfo/tentang');
    }
    public function kontak()
    {
        return view('landing/ourinfo/kontak');
    }
    public function kebijakan_privasi()
    {
        return view('landing/ourinfo/kebijakan_privasi');
    }
    public function donasi()
    {
        return view('landing/ourinfo/donasi');
    }
}
