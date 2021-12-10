<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pages extends BaseController
{
    public function index($seo)
    {
        $data['pages'] = $this->utils->getShowItem([
            'table' => 'pages',
            'select' => 'pages_nama, pages_seo, pages_isi',
            'where' => ['pages_seo' => $seo]
        ]);
        return view('landing/pages/pages', $data);
    }
}
