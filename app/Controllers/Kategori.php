<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kategori extends BaseController
{
    public function index($seo)
    {
        $data['genre'] = $this->utils->getShowItem([
            'table' => 'video_genre',
            'select' => 'video_genre_id, video_genre_nama',
            'where' => ['video_genre_seo' => $seo]
        ]);
        $data['negara'] = $this->utils->getSelect2([
            'table' => 'country',
            'order_by' => ['field' => 'country_nama', 'order' => 'asc'],
            'type' => 'array'
        ]);
        $data['tahun'] = $this->utils->getSelect2([
            'table' => 'video',
            'customize' => ['value' => 'video_tahun', 'text' => 'video_tahun'],
            'where' => ['is_draft' => '0'],
            'order_by' => ['field' => 'video_tahun', 'order' => 'desc'],
            'group_by' => 'video_tahun',
            'type' => 'array'
        ]);
        $data['total_movies'] = $this->utils->countData([
            'table' => 'video',
            'where' => ['is_draft' => '0']
        ]);
        $data['list_movies'] = $this->videos->getListMovies(['ordering' => '1', 'video_genre' => $data['genre']['video_genre_id']]);
        $data['rekomendasi'] = $this->videos->getListMovies(['ordering' => '3']);
        return view('landing/kategori/kategori', $data);
    }
}
