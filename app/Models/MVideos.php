<?php

namespace App\Models;

use PhpParser\Node\Stmt\Break_;

class MVideos extends BaseModel
{
    //Kategori Video
    public function getKategoriForm($kvid)
    {
        $m = $this->db->table('video_kategori')
            ->where('video_kategori_id', $kvid)
            ->get()
            ->getRowArray();
        return $m;
    }
    public function KategoriSave($data)
    {
        $id = $data['video_kategori_id'];
        unset($data['video_kategori_id']);

        if ($id) {
            $data['updated_time'] = date('Y-m-d H:i:s');
            $this->db->table('video_kategori')
                ->where('video_kategori_id', $id)
                ->set($data)
                ->update();
            $history = $this->historyCrud('update', ['table' => 'video_kategori', 'id' => $id, 'data' => $data]);
        } else {
            $data['created_time'] = date('Y-m-d H:i:s');
            $this->db->table('video_kategori')
                ->set($data)
                ->insert();
            $history = $this->historyCrud('insert', ['table' => 'video_kategori', 'data' => $data]);
        }

        $i = $this->db->affectedRows();
        if (!$i) $this->ErrorRespon('Maaf Server Sedang Perbaikan..');
        return $history;
    }
    public function KategoriDel($uid)
    {
        $this->db->table('video_kategori')
            ->where('video_kategori_id', $uid)
            ->delete();
        $history = $this->historyCrud('delete', ['table' => 'video_kategori', 'id' => $uid]);
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
            ->select('vs.video_slide_nama, vs.video_slide_img, v.video_nama, v.video_id, vk.video_kategori_id, vs.video_slide_id')
            ->join('video as v', 'vs.video_id=v.video_id')
            ->join('video_kategori as vk', 'vk.video_kategori_id=v.video_kategori_id')
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
            ->select('vr.video_review_nama, vr.video_review_img, vr.video_review_isi, vr.is_public, v.video_nama, v.video_id, vk.video_kategori_id, vr.video_review_id')
            ->join('video as v', 'vr.video_id=v.video_id')
            ->join('video_kategori as vk', 'vk.video_kategori_id=v.video_kategori_id')
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

    //Get Tools
    public function getSlideVideo()
    {
        return $this->db->table('video_slide as vs')
            ->select('vs.video_slide_img, v.video_nama, v.video_tahun, vk.video_kategori_nama, v.video_id')
            ->join('video as v', 'v.video_id=vs.video_id')
            ->join('video_kategori as vk', 'vk.video_kategori_id=v.video_kategori_id')
            ->where('v.is_draft', '0')
            ->orderBy('v.created_time', 'desc')
            ->limit('5')
            ->get()
            ->getResultArray();
    }
    public function getListMovies($arr)
    {
        $DB = $this->db->table('video as v');
        $DB->select('v.video_nama, v.video_tahun, v.video_thumbnail, v.video_rating, v.video_dilihat, vk.video_kategori_nama, v.video_id');
        $DB->join('video_kategori as vk', 'v.video_kategori_id=vk.video_kategori_id');
        if (isset($arr['video_kategori_id'])) $DB->where('v.video_kategori_id', $arr['video_kategori_id']);
        if (isset($arr['video_tahun'])) $DB->where('v.video_tahun', $arr['video_tahun']);

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
            $DB->limit('12', 0);
        }

        $data = $DB->get()->getResultArray();
        return $data;
    }
    public function getVideoReview()
    {
        return $this->db->table('video_review')
            ->select('video_review_nama, video_review_seo, video_review_img, video_review_dilihat')
            ->where('is_public', '1')
            ->orderBy('created_time', 'desc')
            ->limit('5')
            ->get()
            ->getResultArray();
    }
    public function getVideoByID($id)
    {
        if (!$id) $this->ErrorRespon('Film Tidak Ditemukan !');
        $this->videoShowLog($id);
        $m = $this->db->table('video as v')
            ->select('v.video_nama, v.video_rating, v.video_tahun, v.video_deskripsi, v.video_thumbnail, v.video_file, v.video_subtitle, v.video_dilihat, vk.video_kategori_nama, vk.video_kategori_img')
            ->join('video_kategori as vk', 'vk.video_kategori_id=v.video_kategori_id')
            ->where('video_id', $id)
            ->get()
            ->getRowArray();
        return $m;
    }
}
