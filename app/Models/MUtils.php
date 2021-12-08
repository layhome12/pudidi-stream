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
    public function countData($set = [])
    {
        $i = $this->db->table($set['table'])
            ->where($set['where'])
            ->countAllResults();
        return $i;
    }
    public function countChild($set = [])
    {
        $i = $this->db->table($set['table'])
            ->where($set['parent'] . '_id', $set['id'])
            ->countAllResults();
        return $i;
    }
    public function getShowItem($arr = [])
    {
        $m = $this->db->table($arr['table'])
            ->select($arr['select'])
            ->where($arr['where'])
            ->get()
            ->getRowArray();
        return $m;
    }
    public function getCards()
    {
        $i['users'] = $this->db->table('user')->where('user_level_id', 2)->countAllResults();
        $i['movies'] = $this->db->table('video')->countAllResults();
        return $i;
    }
    public function getSelect2($arr = [])
    {
        $keyword = $this->input->getGet('search');
        $DB = $this->db->table($arr['table']);

        if (isset($arr['customize'])) $DB->select($arr['customize']['value'] . ' as id, ' . $arr['customize']['text'] . ' as text');
        if (!isset($arr['customize'])) $DB->select($arr['table'] . '_id as id,' . $arr['table'] . '_nama as text');

        if ($keyword) $DB->like($arr['table'] . '_nama', $keyword);
        if (isset($arr['where'])) $DB->where($arr['where']);
        if (isset($arr['order_by'])) $DB->orderBy($arr['order_by']['field'], $arr['order_by']['order']);
        if (isset($arr['group_by'])) $DB->groupBy($arr['group_by']);

        $data = $DB->get()->getResultArray();

        switch ($arr['type']) {
            case 'json':
                $this->SuccessRespon('Data Berhasil Diambil', $data);
                break;
            case 'array':
                return $data;
                break;
        }
    }
    public function getGenre($jse)
    {
        $data = [];
        $jsd = json_decode($jse) ? json_decode($jse) : [];
        foreach ($jsd as $id) {
            $m = $this->db->table('video_genre')
                ->select('video_genre_id, video_genre_nama')
                ->where('video_genre_id', $id)
                ->get()
                ->getRowArray();
            $data[] = $m;
        }
        return $data;
    }
    public function getIdentitasWeb()
    {
        return $this->db->table('identitas_web')
            ->where('identitas_web_id', 1)
            ->get()
            ->getRowArray();
    }
    public function identitasWebSave($data)
    {
        $data['updated_time'] = date('Y-m-d H:i:s');
        $this->db->table('identitas_web')
            ->where('identitas_web_id', 1)
            ->set($data)
            ->update();
        $history = $this->historyCrud('update', ['table' => 'identitas_web', 'id' => 1, 'data' => $data]);
        return $history;
    }
}
