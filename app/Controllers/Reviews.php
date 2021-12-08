<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Reviews extends BaseController
{
    public function index($seo)
    {
        $data['reviews'] = $this->landing->getReviews($seo);
        $data['terbaru'] = $this->landing->getNewReviews();
        return view('landing/reviews/reviews', $data);
    }
}
