<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        return view('landing/login/login');
    }
    public function auth()
    {
        $form = $this->input->getPost();
        $m = $this->users->getAuth($form);
        if (count($m) > 0) {
            if (!password_verify($form['password'], $m[0]['password'])) $this->ErrorRespon('Periksa Username dan Password Anda..');
            $this->session->set($m[0]);
            $this->SuccessRespon('Otentikasi Berhasil..');
        } else {
            $this->ErrorRespon('Periksa Username dan Password Anda..');
        }
    }
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login');
    }
}
