<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        if (session()->get('user_id')) return redirect()->to(base_url('/'));
        return view('landing/login/login');
    }
    public function auth()
    {
        $form = $this->input->getPost();
        $m = $this->users->getAuth($form);
        if (count($m) > 0) {
            if (!password_verify($form['password'], $m[0]['password'])) $this->ErrorRespon('Periksa Email dan Password Anda..');
            if ($m[0]['is_active'] == 2) $this->ErrorRespon('Akun Anda Terblokir.. Hubungi Customer Sevice !');
            $this->session->set($m[0]);
            $this->historyUser(['history_icon' => 'fa fa-sign-in-alt', 'history_action' => 'Login']);
            $this->SuccessRespon('Otentikasi Berhasil..');
        } else {
            $this->ErrorRespon('Periksa Email dan Password Anda..');
        }
    }
    public function logout()
    {
        $this->historyUser(['history_icon' => 'fa fa-sign-out-alt', 'history_action' => 'Logout']);
        $this->session->destroy();
        return redirect()->to('/');
    }
    public function activate()
    {
        
    }
}
