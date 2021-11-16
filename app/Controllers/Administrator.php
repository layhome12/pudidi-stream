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
    public function users_management_block()
    {
        $uid = $this->input->getPost();
        $m = $this->users->usersBlock($uid);
        $this->historyUser($m);
        $this->SuccessRespon('Data Berhasil Disimpan..');
    }

    //Admin
    public function admin_management()
    {
        return view('administrator/admin_management/admin_management');
    }
    public function admin_management_fetch()
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
        $this->datatables->where('user_level_id', '1');
        $this->datatables->where('user_id!=', '1');
        $this->datatables->where('user_id!=', session()->get('user_id'));
        $this->datatables->order_by('user_id', 'desc');
        $m = $this->datatables->get();
        foreach ($m as $key => $value) {
            $button = '';
            $button .= "<button onclick=\"dt_form(this)\" target-id=\"$value[user_id]\" class=\"btn mr-1 btn-primary\"><i class=\"far fa-edit\"></i></button>";
            $button .= "<button onclick=\"dt_del(this)\" target-id=\"$value[user_id]\" class=\"btn btn-secondary\"><i class=\"fa fa-eraser\"></i></button>";
            $m[$key]['user_id'] = "<div class=\"tb-action\">$button</div>";
            $m[$key]['is_active'] = 'Actived';
        }
        $this->datatables->render_no_keys($m);
    }
    public function admin_management_form()
    {
        $uid = $this->input->getPost('uid');
        $data['user'] = $this->users->getUserForm($uid);
        $data['country'] = $this->utils->getCountry();
        return view('administrator/admin_management/admin_management_form', $data);
    }
    public function admin_management_save()
    {
        $input = $this->input->getPost();
        $validate = $this->validate([
            'rules' => 'mime_in[user_img,image/jpg,image/jpeg,image/png]|max_size[user_img,512]'
        ]);
        if (!$validate) $this->ErrorRespon('Format yang Didukung JPG, PNG, JPEG dan Max File 512 KB !');

        $file = $this->input->getFile('user_img');
        if ($file->isValid()) {
            $rname = $file->getRandomName();
            $input['user_img'] = $rname;
            $this->image->withFile($file->getTempName())->save('public/users_img/' . $rname, 50);
        }

        $m = $this->users->adminSave($input);
        $this->historyUser($m);
        $this->SuccessRespon('Data Berhasil Disimpan');
    }
    public function admin_management_del()
    {
        $uid = $this->input->getPost('uid');
        $m = $this->users->adminDel($uid);
        $this->historyUser($m);
        $this->SuccessRespon('Data Berhasil Dihapus');
    }
}
