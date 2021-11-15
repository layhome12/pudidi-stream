<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Administrator extends BaseController
{
    public function index()
    {
        return view('administrator/dashboard/dashboard');
    }

    public function video()
    {
        echo "TEST";
    }
    
    //Users
    public function users_management()
    {
        return view('administrator/users_management/users_management');
    }
    public function users_management_fetch()
    {
        $this->datatables->search([
            'user.user_nama',
            'user.email',
            'country.country_nama',
            'user.user_tgl_lahir',
            'user.is_active',
            'user.user_id'
        ]);
        $this->datatables->select('user.user_nama, user.email, country.country_nama, user.user_tgl_lahir, user.is_active, user.user_id');
        $this->datatables->from('user');
        $this->datatables->join('country', 'user.country_id=country.country_id');
        $this->datatables->where('user_level_id', '2');
        $this->datatables->order_by('user_id', 'desc');
        $m = $this->datatables->get();
        foreach ($m as $key => $value) {
            if ($value['is_active'] != 2) {
                $button = '';
                $button .= "<button onclick=\"dt_show(this)\" target-id=\"$value[user_id]\" class=\"btn mr-1 btn-primary\"><i class=\"far fa-eye\"></i></button>";
                $button .= "<button onclick=\"dt_block(this)\" target-id=\"$value[user_id]\" class=\"btn btn-secondary\"><i class=\"fa fa-user-slash\"></i></button>";
                $m[$key]['user_id'] = "<div class=\"tb-action\">$button</div>";
                $m[$key]['is_active'] = $value['is_active'] == 1 ? 'Actived' : 'Not Active';
            } else {
                $button = '';
                $button .= "<button onclick=\"dt_unblock(this)\" target-id=\"$value[user_id]\" class=\"btn btn-warning\"><i class=\"fa fa-unlock-alt\"></i></button>";
                $m[$key]['user_id'] = "<div class=\"tb-action\">$button</div>";
                $m[$key]['is_active'] = 'Blocked';
            }
        }
        $this->datatables->render_no_keys($m);
    }
    public function users_management_form()
    {
        $uid = $this->input->getPost('uid');
        $data['user'] = $this->users->getUserForm($uid);
        return view('administrator/users_management/users_management_form', $data);
    }
    public function users_block()
    {
        $uid = $this->input->getPost();
        $this->users->usersBlock($uid);
    }

    //Admin
    public function admin_management()
    {
        echo "TEST";
    }
}
