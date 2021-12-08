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
    public function getReviews($seo)
    {
        $this->reviewDibaca($seo);
        $m = $this->db->table('video_review')
            ->select('video_review_id, video_review_nama, video_review_seo, video_review_isi, video_review_img, video_review_dilihat, created_time')
            ->where('video_review_seo', $seo)
            ->where('is_public', '1')
            ->get()
            ->getRowArray();
        return $m;
    }
    public function getNewReviews()
    {
        return $this->db->table('video_review')
            ->select('video_review_id, video_review_nama, video_review_img, video_review_seo, video_review_dilihat')
            ->where('is_public', '1')
            ->limit('3')
            ->get()
            ->getResultArray();
    }
    public function reviewDibaca($seo)
    {
        $m = $this->db->table('video_review')
            ->select('video_review_dilihat')
            ->where('video_review_seo', $seo)
            ->get()
            ->getRowArray();
        if (!$m) $this->ErrorRespon('Halaman yang anda cari tidak ditemukan');
        $this->db->table('video_review')
            ->where('video_review_seo', $seo)
            ->set(['video_review_dilihat' => (int)$m['video_review_dilihat'] + 1])
            ->update();
    }
}
