<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Register extends BaseController
{
    public function index()
    {
        $data['country'] = $this->utils->getCountry();
        return view('landing/register/register', $data);
    }
    public function save()
    {
        $data = $this->input->getPost();
        $otp = $this->users->saveUsers($data);
        $this->sendOtp($otp, $data['email']);
    }
    public function cek_email()
    {
        $email = $this->input->getPost('email');
        $this->utils->cekEmail($email);
    }
}
