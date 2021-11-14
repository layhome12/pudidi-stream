<?php

namespace App\Models;

class MUsers extends BaseModel
{
    public function getAuth($data)
    {
        $DB = $this->db->table('user');
        $DB->select('user_level_id, user_nama, email, password, user_id');
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
}
