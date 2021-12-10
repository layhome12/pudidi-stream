<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Users extends BaseController
{
    public function index($uid)
    {
        $uid = str_decrypt($uid);
        $data['user'] = $this->users->getUserbyId($uid);
        if (!$data['user']) $this->ErrorRespon('Enkripsi user tidak sesuai !');
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
    public function favorite()
    {
        $uid = $this->session->get('user_id');
        $data['user_favorite'] = $this->users->getFavoriteUser($uid);
        return view('landing/user/favorite_tab', $data);
    }
    public function setting()
    {
        $uid = $this->session->get('user_id');
        $data['users'] = $this->users->getUserbyId($uid);
        return view('landing/user/setting_tab', $data);
    }
    public function setting_save()
    {
        $input = $this->input->getPost();
        $validate = $this->validate([
            'rules' => 'mime_in[user_img,image/jpg,image/jpeg,image/png]|max_size[user_img,512]',
            'konfirmasi_password' => 'matches[password]'
        ]);
        if (!$validate) $this->ErrorRespon('Mohon Isi dengan Benar, Format yang Didukung JPG, PNG, JPEG dan Max File 512 KB !');

        $file = $this->input->getFile('user_img');
        if ($file->isValid()) {
            $rname = $file->getRandomName();
            $input['user_img'] = $rname;
            $this->image->withFile($file->getTempName())->save('public/users_img/' . $rname, 50);
        }
        if ($input['password'] != '') {
            $input['password'] = password_hash($input['password'], PASSWORD_DEFAULT);
            unset($input['konfirmasi_password']);
        } else {
            unset($input['password'], $input['konfirmasi_password']);
        }

        $m = $this->users->userProfileEdit($input);
        $this->historyUser($m);
        $this->SuccessRespon('Profile Berhasil Diupdate');
    }
}
