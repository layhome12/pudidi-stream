<?php

namespace App\Models;

class MVideos extends BaseModel
{
    //Kategori Video
    public function getKategoriForm($kvid)
    {
        $m = $this->db->table('video_genre')
            ->where('video_genre_id', $kvid)
            ->get()
            ->getRowArray();
        return $m;
    }
    public function KategoriSave($data)
    {
        $id = $data['video_genre_id'];
        unset($data['video_genre_id']);

        if ($id) {
            $data['updated_time'] = date('Y-m-d H:i:s');
            $this->db->table('video_genre')
                ->where('video_genre_id', $id)
                ->set($data)
                ->update();
            $history = $this->historyCrud('update', ['table' => 'video_genre', 'id' => $id, 'data' => $data]);
        } else {
            $data['created_time'] = date('Y-m-d H:i:s');
            $this->db->table('video_genre')
                ->set($data)
                ->insert();
            $history = $this->historyCrud('insert', ['table' => 'video_genre', 'data' => $data]);
        }

        $i = $this->db->affectedRows();
        if (!$i) $this->ErrorRespon('Maaf Server Sedang Perbaikan..');
        return $history;
    }
    public function KategoriDel($uid)
    {
        $this->db->table('video_genre')
            ->where('video_genre_id', $uid)
            ->delete();
        $history = $this->historyCrud('delete', ['table' => 'video_genre', 'id' => $uid]);
        $i = $this->db->affectedRows();
        if (!$i) $this->ErrorRespon('Maaf Server Sedang Perbaikan..');
        return $history;
    }

    //Video
    public function getVideoForm($vid)
    {
        $m = $this->db->table('video')
            ->where('video_id', $vid)
            ->get()
            ->getRowArray();
        return $m;
    }
    public function videoUpload($data)
    {
        $vid = $data['video_id'];
        unset($data['video_id']);
        if ($vid) {
            $data['updated_time'] = date('Y-m-d H:i:s');
            $this->deleteFile(['table' => 'video', 'id' => $vid, 'file' => 'video_file', 'path' => 'video_file']);
            $this->db->table('video')
                ->where('video_id', $vid)
                ->set($data)
                ->update();
            $history = $this->historyCrud('update', ['table' => 'video', 'id' => $vid, 'data' => $data]);
        } else {
            $data['created_time'] = date('Y-m-d H:i:s');
            $this->db->table('video')
                ->set($data)
                ->insert();
            $vid = $this->db->insertID();
            $history = $this->historyCrud('insert', ['table' => 'video', 'data' => $data]);
        }
        $i = $this->db->affectedRows();
        if (!$i) $this->ErrorRespon('Maaf Server Sedang Perbaikan..');
        return array_merge($history, ['vid' => $vid]);
    }
    public function videoSave($data)
    {
        $vid = $data['video_id'];
        $data['is_draft'] = '0';
        $data['updated_time'] = date('Y-m-d H:i:s');
        unset($data['video_id']);
        $this->db->table('video')
            ->where('video_id', $vid)
            ->set($data)
            ->update();
        $history = $this->historyCrud('update', ['table' => 'video', 'id' => $vid, 'data' => $data]);
        $i = $this->db->affectedRows();
        if (!$i) $this->ErrorRespon('Maaf Server Sedang Perbaikan..');
        return $history;
    }
    public function videoDel($vid)
    {
        $this->deleteFile(['table' => 'video', 'id' => $vid, 'file' => 'video_file', 'path' => 'video_file']);
        $this->db->table('video')
            ->where('video_id', $vid)
            ->delete();
        $history = $this->historyCrud('delete', ['table' => 'video', 'id' => $vid]);
        $i = $this->db->affectedRows();
        if (!$i) $this->ErrorRespon('Maaf Server Sedang Perbaikan..');
        return $history;
    }

    //Video Slider
    public function getVideoSlideForm($vsid)
    {
        return $this->db->table('video_slide as vs')
            ->select('vs.video_slide_nama, vs.video_slide_img, v.video_nama, v.video_id, vg.video_genre_id, vs.video_slide_id')
            ->join('video as v', 'vs.video_id=v.video_id')
            ->join('video_genre as vg', 'vg.video_genre_id=v.video_genre_id')
            ->where('vs.video_slide_id', $vsid)
            ->get()->getRowArray();
    }
    public function videoSlideSave($data)
    {
        $id = $data['video_slide_id'];
        unset($data['video_slide_id']);

        if ($id) {
            $data['updated_time'] = date('Y-m-d H:i:s');
            $this->db->table('video_slide')
                ->where('video_slide_id', $id)
                ->set($data)
                ->update();
            $history = $this->historyCrud('update', ['table' => 'video_slide', 'id' => $id, 'data' => $data]);
        } else {
            $data['created_time'] = date('Y-m-d H:i:s');
            $this->db->table('video_slide')
                ->set($data)
                ->insert();
            $history = $this->historyCrud('insert', ['table' => 'video_slide', 'data' => $data]);
        }

        $i = $this->db->affectedRows();
        if (!$i) $this->ErrorRespon('Maaf Server Sedang Perbaikan..');
        return $history;
    }
    public function videoSlideDel($id)
    {
        $this->db->table('video_slide')
            ->where('video_slide_id', $id)
            ->delete();
        $history = $this->historyCrud('delete', ['table' => 'video_slide', 'id' => $id]);
        $i = $this->db->affectedRows();
        if (!$i) $this->ErrorRespon('Maaf Server Sedang Perbaikan..');
        return $history;
    }

    //Video Review
    public function getVideoReviewForm($id)
    {
        return $this->db->table('video_review as vr')
            ->select('vr.video_review_nama, vr.video_review_img, vr.video_review_isi, vr.is_public, v.video_nama, v.video_id, vg.video_genre_id, vr.video_review_id')
            ->join('video as v', 'vr.video_id=v.video_id')
            ->join('video_genre as vg', 'vg.video_genre_id=v.video_genre_id')
            ->where('vr.video_review_id', $id)
            ->get()->getRowArray();
    }
    public function videoReviewSave($data)
    {
        $id = $data['video_review_id'];
        unset($data['video_review_id']);

        if ($id) {
            $data['updated_time'] = date('Y-m-d H:i:s');
            $this->db->table('video_review')
                ->where('video_review_id', $id)
                ->set($data)
                ->update();
            $history = $this->historyCrud('update', ['table' => 'video_review', 'id' => $id, 'data' => $data]);
        } else {
            $data['created_time'] = date('Y-m-d H:i:s');
            $this->db->table('video_review')
                ->set($data)
                ->insert();
            $history = $this->historyCrud('insert', ['table' => 'video_review', 'data' => $data]);
        }

        $i = $this->db->affectedRows();
        if (!$i) $this->ErrorRespon('Maaf Server Sedang Perbaikan..');
        return $history;
    }
    public function videoReviewDel($id)
    {
        $this->db->table('video_review')
            ->where('video_review_id', $id)
            ->delete();
        $history = $this->historyCrud('delete', ['table' => 'video_review', 'id' => $id]);
        $i = $this->db->affectedRows();
        if (!$i) $this->ErrorRespon('Maaf Server Sedang Perbaikan..');
        return $history;
    }

    //Get Video Comments
    public function getVideoComment($id)
    {
        return $this->db->table('video_komentar as vg')
            ->select('vg.video_komentar, vg.created_time, u.user_nama, u.user_img')
            ->join('user as u', 'u.user_id=vg.user_id')
            ->where('video_id', $id)
            ->orderBy('created_time', 'asc')
            ->get()
            ->getResultArray();
    }
    public function videoCommentSave($data)
    {
        $data['video_id'] = str_decrypt($data['video_key']);
        $data['created_time'] = date('Y-m-d H:i:s');
        unset($data['video_key']);
        $this->db->table('video_komentar')
            ->set($data)
            ->insert();
        $history = $this->historyCrud('insert', ['table' => 'video_komentar', 'data' => $data]);
        return $history;
    }

    //Get Tools
    public function getSlideVideo()
    {
        $id = $this->session->get('user_id');
        $data = $this->db->table('video_slide as vs')
            ->select('vs.video_slide_img, v.video_nama, v.video_tahun, vg.video_genre_nama, v.video_id')
            ->join('video as v', 'v.video_id=vs.video_id')
            ->join('video_genre as vg', 'vg.video_genre_id=v.video_genre_id')
            ->where('v.is_draft', '0')
            ->orderBy('v.created_time', 'desc')
            ->limit('5')
            ->get()
            ->getResultArray();
        if ($id) $data = $this->checkFavorit($id, $data);
        return $data;
    }
    public function getListMovies($arr)
    {
        $id = $this->session->get('user_id');
        $DB = $this->db->table('video as v');
        $DB->select('v.video_nama, v.video_tahun, v.video_thumbnail, v.video_rating, v.video_dilihat, v.video_deskripsi, vg.video_genre_nama, v.video_id');
        $DB->join('video_genre as vg', 'v.video_genre_id=vg.video_genre_id');
        if (isset($arr['like'])) $DB->like($arr['like']);
        if (isset($arr['where'])) $DB->where($arr['where']);
        if (isset($arr['country_id'])) $DB->where('v.country_id', $arr['country_id']);
        if (isset($arr['video_tahun'])) $DB->where('v.video_tahun', $arr['video_tahun']);
        if (isset($arr['video_genre']) && $arr['video_genre'] != 0) $DB->where('vg.video_genre_id', $arr['video_genre']);

        switch ($arr['ordering']) {
            case '1':
                $DB->orderBy('v.video_dilihat', 'desc');
                break;
            case '2':
                $DB->orderBy('v.video_tahun', 'desc');
                break;
            case '3':
                $DB->orderBy('v.video_rating', 'desc');
                break;
            default:
                #code
                break;
        }

        if (isset($arr['pagination'])) {
            $dari = 12 * (int) $arr['pagination'];
            $DB->limit('12', $dari);
        } else {
            isset($arr['limit']) ? $DB->limit($arr['limit'], 0) : $DB->limit('12', 0);
        }

        $data = $DB->get()->getResultArray();
        if ($id) $data = $this->checkFavorit($id, $data);
        return $data;
    }
    public function checkFavorit($uid, $res)
    {
        $data = [];
        foreach ($res as $key => $value) {
            $m = $this->db->table('user_favorit')
                ->where('video_id', $value['video_id'])
                ->where('user_id', $uid)
                ->get()
                ->getRowArray();
            $data[$key] = $res[$key];
            if ($m) $data[$key]['is_favorit'] = true;
        }
        return $data;
    }
    public function getVideoReview()
    {
        return $this->db->table('video_review as vir')
            ->select('vir.video_review_nama, vir.video_review_seo, vir.video_review_img, vir.video_review_dilihat')
            ->join('video as vid', 'vir.video_id=vid.video_id')
            ->where('vir.is_public', '1')
            ->orderBy('vir.created_time', 'desc')
            ->limit('5')
            ->get()
            ->getResultArray();
    }
    public function getVideoByID($id)
    {
        $uid = $this->session->get('user_id');
        if (!$id) $this->ErrorRespon('Film Tidak Ditemukan !');
        $this->videoShowLog($id);
        $m = $this->db->table('video as v')
            ->select('v.video_nama, v.video_rating, v.video_tahun, v.video_deskripsi, v.video_thumbnail, v.video_file, v.video_subtitle, v.video_dilihat, vg.video_genre_nama, vg.video_genre_img, v.video_genre, v.video_id')
            ->join('video_genre as vg', 'vg.video_genre_id=v.video_genre_id')
            ->where('video_id', $id)
            ->get()
            ->getRowArray();
        if ($uid) $m = $this->checkFavorit($uid, array($m))[0];
        return $m;
    }
    public function addFavorite($data)
    {
        $is_fav = $data['fav'];
        $data['video_id'] = str_decrypt($data['eid']);
        unset($data['fav'], $data['eid']);

        if ($is_fav == 0) {
            $data['created_time'] = date('Y-m-d');
            $this->db->table('user_favorit')->set($data)->insert();
            $history = $this->historyCrud('insert', ['table' => 'user_favorit', 'data' => $data]);
        } else {
            $this->db->table('user_favorit')->where($data)->delete();
            $history = $this->historyCrud('delete', ['table' => 'user_favorit', 'id' => $data]);
        }

        $i = $this->db->affectedRows();
        if (!$i) $this->ErrorRespon('Maaf Server Sedang Perbaikan..');
        return $history;
    }
    public function getLastView()
    {
        $uid = $this->session->get('user_id');
        $data = $this->db->table('history_dilihat as hd')
            ->distinct()
            ->select('v.video_nama, hd.created_time, hd.history_dilihat_loop, v.video_id')
            ->join('video as v', 'v.video_id=hd.video_id')
            ->join('video_genre as vg', 'vg.video_genre_id=v.video_genre_id')
            ->where('hd.user_id', $uid)
            ->orderBy('hd.created_time', 'desc')
            ->limit(5)
            ->get()
            ->getResultArray();
        return $data;
    }
}
