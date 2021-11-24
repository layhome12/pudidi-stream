<?php

namespace App\Models;

class MLanding extends BaseModel
{
    public function getKategori()
    {
        return $this->db->table('video_kategori')
            ->select('video_kategori_nama, video_kategori_seo')
            ->get()
            ->getResultArray();
    }
}
