<?php

namespace App\Models;

class MUsers extends BaseModel
{
    public function getAuth($data)
    {
        $DB = $this->db->table('user');
        $DB->select('user_level_id, user_nama, email, password, user_img, user_id, is_active');
        $DB->where('email', $data['email']);
        $m = $DB->get()->getResultArray();
        return $m;
    }
    public function saveUsers($data)
    {
        $data['user_level_id'] = '2';
        $data['kode_otp'] = rand(111111, 999999);
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $this->db->table('user')->set($data)->insert();
        $i = $this->db->affectedRows();
        if (!$i) $this->ErrorRespon('Maaf Server Sedang Perbaikan..');
        return $data['kode_otp'];
    }
    public function getUserForm($uid)
    {
        $m = $this->db->table('user')
            ->select('user.user_nama, user.email, user.user_tgl_lahir, country.country_nama, user.is_active, user.user_img, user.user_id')
            ->join('country', 'country.country_id=user.country_id')
            ->where('user.user_id', $uid)
            ->get()
            ->getRowArray();
        $dt['history'] = $this->getHistoryUser($m['user_id']);
        return array_merge($m, $dt);
    }
    public function getHistoryUser($uid)
    {
        $m = $this->db->table('history_user')
            ->where('user_id', $uid)
            ->orderBy('created_time', 'desc')
            ->limit('10')
            ->get()
            ->getResultArray();
        return $m;
    }
    public function usersBlock($uid)
    {
        $uid['key'] = $uid['key'] == 'unblock' ? 1 : 2;
        $this->db->table('user')
            ->where('user_id', $uid['uid'])
            ->set(['is_active' => $uid['key']])
            ->update();
        $i = $this->db->affectedRows();
        if (!$i) $this->ErrorRespon('Maaf Server Sedang Perbaikan..');
        $this->SuccessRespon('Data Telah Tersimpan..');
    }
}
