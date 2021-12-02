<?php

namespace App\Models;

class MLanding extends BaseModel
{
    public function getKategori()
    {
        return $this->db->table('video_genre')
            ->select('video_genre_nama, video_genre_seo')
            ->get()
            ->getResultArray();
    }
}
