<?php

namespace App\Models;

class MUtils extends BaseModel
{
    public function cekEmail($email)
    {
        $i = $this->db->table('user')->where('email', $email)->countAllResults();
        if ($i > 0) $this->ErrorRespon('Email Sudah Digunakan..');
        $this->SuccessRespon('Email Masih Tersedia..');
    }
    public function getCountry()
    {
        $DB = $this->db->table('country');
        $data = $DB->get()->getResultArray();
        return $data;
    }
    public function otpVerify($data)
    {
        $email = str_decrypt($data['key']);
        $DB = $this->db->table('user')
            ->where('email', $email)
            ->where('kode_otp', $data['kode_otp']);
        $i = $DB->countAllResults();
        if (!$i) $this->ErrorRespon('Kode OTP Tidak Cocok..');
        $DB->set('is_active', '1')->update();
        return $email;
    }
}
