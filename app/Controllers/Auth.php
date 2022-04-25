<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
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

    // Register

    public function register()
    {
        if (session()->get('user_id')) return redirect()->to(base_url('/'));
        return view('landing/register/register');
    }
    public function form()
    {
        $data['country'] = $this->utils->getCountry();
        return view('landing/register/register_form', $data);
    }
    public function verify()
    {
        $data['key'] = $this->input->getGet('key');
        return view('landing/register/register_verify', $data);
    }
    public function save()
    {
        $data = $this->input->getPost();
        $validate = $this->validate([
            'konfirmasi_password' => 'matches[password]'
        ]);
        if (!$validate) $this->ErrorRespon('Password dan Konfirmasi Password Tidak Sama !');
        unset($data['konfirmasi_password']);
        $otp = $this->users->saveUsers($data);
        $this->sendOtp($otp, $data['email']);
    }
    public function cek_email()
    {
        $email = $this->input->getPost('email');
        $this->utils->cekEmail($email);
    }
    public function otp_verify()
    {
        $key = $this->input->getPost();
        $data['email'] = $this->utils->otpVerify($key);
        $m = $this->users->getAuth($data);
        $this->sesion_get_auth($m);
        $this->SuccessRespon('Akun Telah Berhasil Dibuat..');
    }
    public function sesion_get_auth($m)
    {
        if (session()->get('user_id')) $this->session->destroy();
        $this->session->set($m[0]);
    }
}
