<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Users extends BaseController
{
    public function index($uid)
    {
        $uid = str_decrypt($uid);
        $data['user'] = $this->users->getUserbyId($uid);
        return view('landing/user/user', $data);
    }
}
