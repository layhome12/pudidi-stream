<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Users extends BaseController
{
    public function index($uid)
    {
        $uid = str_decrypt($uid);
        $data['user'] = $this->users->getUserbyId($uid);
        $data['terakhir_dilihat'] = $this->videos->getLastView();
        $data['favorit'] = $this->utils->countData([
            'table' => 'user_favorit',
            'where' => ['user_id' => $uid]
        ]);
        $data['komentar'] = $this->utils->countData([
            'table' => 'video_komentar',
            'where' => ['user_id' => $uid]
        ]);
        $data['list_untukmu'] = $this->videos->getListMovies([
            'ordering' => 1,
            'limit' => 5
        ]);
        return view('landing/user/user', $data);
    }
    public function profile()
    {
        $uid = $this->session->get('user_id');
        $data['user'] = $this->users->getUserbyId($uid);
        $data['terakhir_dilihat'] = $this->videos->getLastView();
        $data['favorit'] = $this->utils->countData([
            'table' => 'user_favorit',
            'where' => ['user_id' => $uid]
        ]);
        $data['komentar'] = $this->utils->countData([
            'table' => 'video_komentar',
            'where' => ['user_id' => $uid]
        ]);
        $data['list_untukmu'] = $this->videos->getListMovies([
            'ordering' => 1,
            'limit' => 5
        ]);
        return view('landing/user/profile_tab', $data);
    }
    public function favorit()
    {
    }
    public function setting()
    {
    }
    public function setting_save()
    {
    }
}
