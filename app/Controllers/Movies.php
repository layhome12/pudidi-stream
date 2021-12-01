<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Movies extends BaseController
{
    public function index($seo)
    {
        $id = seo_url_decode($seo);
        $data['key'] = str_encrypt($id);
        $data['movies'] = $this->videos->getVideoByID($id);
        $data['genre'] = $this->utils->getGenre($data['movies']['video_genre']);
        $data['comment'] = $this->videos->getVideoComment($id);
        $data['terbaru'] = $this->videos->getListMovies([
            'ordering' => '2',
            'limit' => 4
        ]);
        $data['ammount_comment'] = $this->utils->countData([
            'table' => 'video_komentar',
            'where' => ['video_id' => $id]
        ]);
        $data['rekomendasi'] = $this->videos->getListMovies([
            'ordering' => '3',
            'limit' => 8
        ]);
        return view('landing/movies/movies', $data);
    }
    public function get_comments()
    {
        $id = $this->input->getPost('vid');
        $data['comment'] = $this->videos->getVideoComment(str_decrypt($id));
        return view('landing/movies/movies_comment', $data);
    }
    public function comments_save()
    {
        $uid = $this->session->get('user_id');
        $input = $this->input->getPost();
        if (!str_decrypt($input['video_key'])) $this->ErrorRespon('Video Tidak Ditemukan');
        if (!$uid) $this->ErrorRespon('Mohon Login Terlebih Dahulu');
        $input['user_id'] = $uid;
        $m = $this->videos->videoCommentSave($input);
        $this->historyUser($m);
        $i = $this->utils->countData([
            'table' => 'video_komentar',
            'where' => ['video_id' => str_decrypt($input['video_key'])]
        ]);
        $this->SuccessRespon('Komentar Berhasil Disimpan !', ['ammount' => $i]);
    }
}
