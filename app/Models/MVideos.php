<?php

namespace App\Models;

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
            $this->db->table('video_kategori')
                ->where('video_kategori_id', $id)
                ->set($data)
                ->update();
            $history = $this->historyCrud('update', ['table' => 'video_kategori', 'id' => $id, 'data' => $data]);
        } else {
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
            $this->deleteFile(['table' => 'video', 'id' => $vid, 'file' => 'video_file', 'path' => 'video_file']);
            $this->db->table('video')
                ->where('video_id', $vid)
                ->set($data)
                ->update();
            $history = $this->historyCrud('update', ['table' => 'video', 'id' => $vid, 'data' => $data]);
        } else {
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

    //Get Slider
    public function getSlideVideo()
    {
        return $this->db->table('video_slide as vs')
            ->select('vs.video_slide_img, v.video_nama, v.video_tahun, vk.video_kategori_nama')
            ->join('video as v', 'v.video_id=vs.video_id')
            ->join('video_kategori as vk', 'vk.video_kategori_id=v.video_kategori_id')
            ->where('v.is_draft', '0')
            ->get()
            ->getResultArray();
    }
}
