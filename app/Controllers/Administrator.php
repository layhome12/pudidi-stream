<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Administrator extends BaseController
{
    public function index()
    {
        $data['cards'] = $this->utils->getCards();
        return view('administrator/dashboard/dashboard', $data);
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
        $this->datatables->select('
            user.user_nama, 
            user.email, 
            country.country_nama, 
            user.user_tgl_lahir, 
            user.is_active, 
            user.user_id
        ');
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
        $this->datatables->select('
            user.user_nama, 
            user.email, 
            country.country_nama, 
            user.user_tgl_lahir, 
            user.is_active, 
            user.user_id
        ');
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

    //Kategori Video
    public function video_kategori()
    {
        return view('administrator/video_kategori/video_kategori');
    }
    public function video_kategori_fetch()
    {
        $this->datatables->search([
            'video_kategori_nama',
            'video_kategori_seo',
            'video_kategori_id'
        ]);
        $this->datatables->select('
            video_kategori_nama,
            video_kategori_seo,
            video_kategori_img AS jumlah_video,
            video_kategori_id
        ');
        $this->datatables->from('video_kategori');
        $this->datatables->order_by('video_kategori_id', 'desc');
        $m = $this->datatables->get();
        foreach ($m as $key => $value) {
            $button = '';
            $button .= "<button onclick=\"dt_vid(this)\" target-id=\"$value[video_kategori_id]\" class=\"btn mr-1 btn-warning\"><i class=\"fa fa-film\"></i></button>";
            $button .= "<button onclick=\"dt_form(this)\" target-id=\"$value[video_kategori_id]\" class=\"btn mr-1 btn-primary\"><i class=\"far fa-edit\"></i></button>";
            $button .= "<button onclick=\"dt_del(this)\" target-id=\"$value[video_kategori_id]\" class=\"btn btn-secondary\"><i class=\"fa fa-eraser\"></i></button>";
            $m[$key]['jumlah_video'] = $this->utils->countChild(['table' => 'video', 'parent' => 'video_kategori', 'id' => $value['video_kategori_id']]);
            $m[$key]['video_kategori_id'] = "<div class=\"tb-action\">$button</div>";
        }
        $this->datatables->render_no_keys($m);
    }
    public function video_kategori_form()
    {
        $kvid = $this->input->getPost('kvid');
        $data['katvid'] = $this->videos->getKategoriForm($kvid);
        return view('administrator/video_kategori/video_kategori_form', $data);
    }
    public function video_kategori_save()
    {
        $input = $this->input->getPost();
        $validate = $this->validate([
            'rules' => 'mime_in[video_kategori_img,image/jpg,image/jpeg,image/png]|max_size[video_kategori_img,512]'
        ]);
        if (!$validate) $this->ErrorRespon('Format yang Didukung JPG, PNG, JPEG dan Max File 512 KB !');

        $file = $this->input->getFile('video_kategori_img');
        if ($file->isValid()) {
            $rname = $file->getRandomName();
            $input['video_kategori_img'] = $rname;
            $this->image->withFile($file->getTempName())->save('public/video_kategori_img/' . $rname, 50);
        }

        $m = $this->videos->KategoriSave($input);
        $this->historyUser($m);
        $this->SuccessRespon('Data Berhasil Disimpan');
    }
    public function video_kategori_del()
    {
        $kvid = $this->input->getPost('kvid');
        $m = $this->videos->KategoriDel($kvid);
        $this->historyUser($m);
        $this->SuccessRespon('Data Berhasil Dihapus');
    }

    //Video
    public function video($any)
    {
        $i = $this->videos->getKategoriForm($any);
        if (!$i) $this->ErrorRespon('Halaman Tidak Ditemukan');
        $data['kvid'] = $any;
        return view('administrator/video/video', $data);
    }
    public function video_fetch()
    {
        $katvid = $this->input->getPost('kvid');
        $this->datatables->search([
            'c.country_nama',
            'v.video_nama',
            'v.video_tahun',
            'v.video_deskripsi',
            'v.video_id'
        ]);
        $this->datatables->select('
            v.video_nama,
            c.country_nama,
            v.video_tahun,
            v.video_deskripsi,
            v.is_draft,
            v.video_id
        ');
        $this->datatables->from('video as v');
        $this->datatables->join('country as c', 'c.country_id=v.country_id', 'left');
        $this->datatables->order_by('video_id', 'desc');
        $this->datatables->where('video_kategori_id', $katvid);
        $m = $this->datatables->get();
        foreach ($m as $key => $value) {
            if ($value['is_draft'] == 0) {
                $button = '';
                $button .= "<button onclick=\"dt_form(this)\" target-id=\"$value[video_id]\" class=\"btn mr-1 btn-primary\"><i class=\"far fa-edit\"></i></button>";
                $button .= "<button onclick=\"dt_del(this)\" target-id=\"$value[video_id]\" class=\"btn btn-secondary\"><i class=\"fa fa-eraser\"></i></button>";
            } else {
                $button = '';
                $button .= "<button onclick=\"dt_form(this)\" target-id=\"$value[video_id]\" class=\"btn mr-1 btn-warning\"><i class=\"fa fa-inbox\"></i></button>";
            }
            $m[$key]['video_deskripsi'] = substr($value['video_deskripsi'], 0, 30) . '..';
            $m[$key]['video_id'] = "<div class=\"d-flex\">$button</div>";
            unset($m[$key]['is_draft']);
        }
        $this->datatables->render_no_keys($m);
    }
    public function video_form()
    {
        $vid = $this->input->getPost('vid');
        $kvid = $this->input->getPost('kvid');
        $data['kvid'] = $kvid;
        $data['country'] = $this->utils->getCountry();
        $data['vid'] = $this->videos->getVideoForm($vid);
        return view('administrator/video/video_form', $data);
    }
    public function video_upload()
    {
        $input = [
            'video_kategori_id' => $this->input->getPost('kvid'),
            'video_id' => $this->input->getPost('vid')
        ];
        $validate = $this->validate([
            'rules' => 'mime_in[movies,video/mp4]|max_size[movies,51200]'
        ]);
        if (!$validate) $this->ErrorRespon('Format yang Didukung MP4 dan Max 50 MB !');

        $file = $this->input->getFile('movies');
        if ($file->isValid()) {
            $fname = $file->getName();
            $rname = $file->getRandomName();
            $input['video_file'] = $rname;
            $input['video_nama'] = substr($fname, 0, -4);
            $file->move(WRITEPATH . 'video_file', $rname);
        }
        $m = $this->videos->videoUpload($input);
        $vid = $m['vid'];
        unset($m['vid']);
        $this->historyUser($m);
        $this->SuccessRespon('Data Berhasil Disimpan', ['vid' => $vid, 'video_file' => $rname, 'is_draft' => true]);
    }
    public function video_save()
    {
        $input = $this->input->getPost();
        $validate = $this->validate([
            'rules' => 'mime_in[video_thumbnail,image/jpg,image/jpeg,image/png]|max_size[video_thumbnail,512]'
        ]);
        if (!$validate) $this->ErrorRespon('Format Thumbnail JPG/JPEG/PNG dan Max 512 KB !');

        //Thumbnail Upload
        $thumbnail = $this->input->getFile('video_thumbnail');
        if ($thumbnail->isValid()) {
            $rname = $thumbnail->getRandomName();
            $input['video_thumbnail'] = $rname;
            $this->image->withFile($thumbnail->getTempName())->save('public/video_thumbnail/' . $rname, 50);
        }

        //Subtitle Upload
        $subtitle = $this->input->getFile('video_subtitle');
        if ($subtitle->isValid()) {
            $rname = $subtitle->getRandomName();
            $input['video_subtitle'] = $rname;
            $subtitle->move(WRITEPATH . 'video_subtitle', $rname);
        }
        $m = $this->videos->videoSave($input);
        $this->historyUser($m);
        $this->SuccessRespon('Data Berhasil Disimpan !');
    }
    public function video_del()
    {
        $vid = $this->input->getPost('vid');
        $m = $this->videos->videoDel($vid);
        $this->historyUser($m);
        $this->SuccessRespon('Data Berhasil Dihapus');
    }
}
