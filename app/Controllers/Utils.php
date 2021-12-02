<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Utils extends BaseController
{
    public function get_select_video()
    {
        $conf = [
            'table' => 'video',
            'where' => [
                'video_genre_id' => $this->input->getGet('kvid'),
                'is_draft' => '0'
            ],
            'type' => 'json'
        ];
        $this->utils->getSelect2($conf);
    }
    public function get_list_movies()
    {
        $input = $this->input->getPost();
        if ($input['country_id'] == 0) unset($input['country_id']);
        if ($input['video_tahun'] == 0) unset($input['video_tahun']);
        $data['list_movies'] = $this->videos->getListMovies($input);
        return view('landing/utils/listmovies', $data);
    }
    public function get_count_data()
    {
        $input = $this->input->getPost();
        $m = $this->utils->countData([
            'table' => 'video',
            'where' => array_filter($input)
        ]);
        $this->SuccessRespon('Data Berhasil Diambil', ['amount' => $m]);
    }
}
