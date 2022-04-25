<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Landing extends BaseController
{
    public function index()
    {
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
        $data['slider'] = $this->videos->getSlideVideo();
        $data['list_movies'] = $this->videos->getListMovies(['ordering' => '1']);
        $data['rekomendasi'] = $this->videos->getListMovies(['ordering' => '3']);
        $data['video_review'] = $this->videos->getVideoReview();
        return view('landing/home/home', $data);
    }

    // ============= Pencarian ============= // 

    public function pencarian()
    {
        $data['search'] = $this->input->getGet('keyword');
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
        $data['list_movies'] = $this->videos->getListMovies(['ordering' => '2', 'like' => ['video_nama' => $data['search']]]);
        $data['rekomendasi'] = $this->videos->getListMovies(['ordering' => '1']);
        return view('landing/pencarian/pencarian', $data);
    }

    // ============= Genre ============= //

    public function genre($seo)
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

    // List Movies

    public function list($seo)
    {
        $data['list'] = $this->listGet($seo);
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
    public function listGet($seo)
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

    // Pages

    public function pages($seo)
    {
        $data['pages'] = $this->utils->getShowItem([
            'table' => 'pages',
            'select' => 'pages_nama, pages_seo, pages_isi',
            'where' => ['pages_seo' => $seo]
        ]);
        return view('landing/pages/pages', $data);
    }

    // Reviews

    public function review($seo)
    {
        $data['reviews'] = $this->landing->getReviews($seo);
        $data['terbaru'] = $this->landing->getNewReviews();
        return view('landing/reviews/reviews', $data);
    }
}
