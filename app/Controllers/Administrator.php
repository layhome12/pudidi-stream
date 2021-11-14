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
            'user.tgl_lahir',
            'user.is_active',
            'user.user_id'
        ]);
        $this->datatables->select('user.user_nama, user.email, country.country_nama, user.user_tgl_lahir, user.is_active, user.user_id');
        $this->datatables->from('user');
        $this->datatables->join('country', 'user.country_id=country.country_id');
        $m = $this->datatables->get();
        foreach ($m as $key => $value) {
            $button = '';
            $button .= "<button onclick=\"dt_edit(this)\" target-id=\"$value[user_id]\" class=\"btn mr-1 btn-primary\"><i class=\"fa fa-edit\"></i></button>";
            $button .= "<button onclick=\"dt_delete(this)\" target-id=\"$value[user_id]\" class=\"btn btn-secondary\"><i class=\"fa fa-trash\"></i></button>";
            $m[$key]['user_id'] = "<div class=\"tb-action\">$button</div>";
        }
        $this->datatables->render_no_keys($m);
    }
    public function admin_management()
    {
        echo "TEST";
    }
}
