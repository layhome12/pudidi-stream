<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ListMovies extends BaseController
{
    public function index($seo)
    {
        $data['list'] = $this->listget($seo);
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
        $data['list_movies'] = $this->videos->getListMovies(['ordering' => $data['list']['id']]);
        $data['rekomendasi'] = $this->videos->getListMovies(['ordering' => '1']);
        return view('landing/list/list', $data);
    }
    public function listget($seo)
    {
        $data = [
            'populer' => ['id' => '1', 'val' => 'Populer'],
            'terbaru' => ['id' => '2', 'val' => 'Terbaru'],
            'terbaik' => ['id' => '3', 'val' => 'Terbaik']
        ];
        $m = array_key_exists($seo, $data) ? $data[$seo] : [];
        if (!$m) $this->ErrorRespon('Halaman yang anda cari tidak ada');
        return $m;
    }
}
