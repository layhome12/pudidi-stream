<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Movies extends BaseController
{
    public function index($seo)
    {
        $id = seo_url_decode($seo);
        $data['movies'] = $this->videos->getVideoByID($id);
        return view('landing/movies/movies', $data);
    }
}
