<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Landing extends BaseController
{
    public function index()
    {
        $data['slider'] = $this->videos->getSlideVideo();
        return view('landing/home/home', $data);
    }
    public function pencarian()
    {
        $data['search'] = $this->input->getGet('keyword');
        return view('landing/pencarian/pencarian', $data);
    }
}
