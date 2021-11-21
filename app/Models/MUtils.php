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
    public function historyUser($log)
    {
        $log['user_id'] = $this->session->get('user_id');
        $log['user_level_id'] = $this->session->get('user_level_id');
        if (!isset($log['history_keterangan'])) $log['history_keterangan'] = "Melakukan " . $log['history_action'] . " Pada Waktu " . date('Y-m-d H:i:s');
        $log['created_time'] = date('Y-m-d H:i:s');
        $this->db->table('history_user')->set($log)->insert();
    }
    public function countChild($set = [])
    {
        $i = $this->db->table($set['table'])
            ->where($set['parent'] . '_id', $set['id'])
            ->countAllResults();
        return $i;
    }
}
