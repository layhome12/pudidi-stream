<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Movies extends BaseController
{
    public function index($seo)
    {
        $id = seo_url_decode($seo);
        $data['movies'] = $this->videos->getVideoByID($id);
        $data['genre'] = $this->utils->getGenre($data['movies']['video_genre']);
        $data['terbaru'] = $this->videos->getListMovies(['ordering' => '2', 'limit' => 4]);
        return view('landing/movies/movies', $data);
    }
}
