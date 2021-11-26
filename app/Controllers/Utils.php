<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Utils extends BaseController
{
    public function get_select_video()
    {
        $conf = [
            'table' => 'video',
            'where' => [
                'video_kategori_id' => $this->input->getGet('kvid'),
                'is_draft' => '0'
            ]
        ];
        $this->utils->getSelect2($conf);
    }
}
