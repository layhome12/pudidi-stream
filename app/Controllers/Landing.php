<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Landing extends BaseController
{
    public function index()
    {
        $data['negara'] = $this->utils->getSelect2([
            'table' => 'country',
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
    public function pencarian()
    {
        $data['search'] = $this->input->getGet('keyword');
        return view('landing/pencarian/pencarian', $data);
    }
}
