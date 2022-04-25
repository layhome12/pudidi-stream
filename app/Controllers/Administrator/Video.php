<?php

namespace App\Controllers\Administrator;

use App\Controllers\BaseController;

class Video extends BaseController
{
    //Kategori Video
    public function video_kategori()
    {
        $this->systems->userTypeAccess('admin');

        return view('administrator/video_kategori/video_kategori');
    }
    public function video_kategori_fetch()
    {
        $this->systems->userTypeAccess('admin');

        $this->datatables->search([
            'video_genre_nama',
            'video_genre_seo',
            'video_genre_id'
        ]);
        $this->datatables->select('
            video_genre_nama,
            video_genre_seo,
            video_genre_img AS jumlah_video,
            video_genre_id
        ');
        $this->datatables->from('video_genre');
        $this->datatables->order_by('video_genre_id', 'desc');
        $m = $this->datatables->get();
        foreach ($m as $key => $value) {
            $button = '';
            $button .= "<button onclick=\"dt_vid(this)\" target-id=\"$value[video_genre_id]\" class=\"btn mr-1 btn-warning\"><i class=\"fa fa-film\"></i></button>";
            $button .= "<button onclick=\"dt_form(this)\" target-id=\"$value[video_genre_id]\" class=\"btn mr-1 btn-primary\"><i class=\"far fa-edit\"></i></button>";
            $button .= "<button onclick=\"dt_del(this)\" target-id=\"$value[video_genre_id]\" class=\"btn btn-secondary\"><i class=\"fa fa-eraser\"></i></button>";
            $m[$key]['jumlah_video'] = $this->utils->countChild(['table' => 'video', 'parent' => 'video_genre', 'id' => $value['video_genre_id']]);
            $m[$key]['video_genre_id'] = "<div class=\"tb-action\">$button</div>";
        }
        $this->datatables->render_no_keys($m);
    }
    public function video_kategori_form()
    {
        $this->systems->userTypeAccess('admin');

        $kvid = $this->input->getPost('kvid');
        $data['katvid'] = $this->videos->getKategoriForm($kvid);
        return view('administrator/video_kategori/video_kategori_form', $data);
    }
    public function video_kategori_save()
    {
        $this->systems->userTypeAccess('admin');

        $input = $this->input->getPost();
        $validate = $this->validate([
            'rules' => 'mime_in[video_genre_img,image/jpg,image/jpeg,image/png]|max_size[video_genre_img,512]'
        ]);
        if (!$validate) $this->ErrorRespon('Format yang Didukung JPG, PNG, JPEG dan Max File 512 KB !');

        $file = $this->input->getFile('video_genre_img');
        if ($file->isValid()) {
            $rname = $file->getRandomName();
            $input['video_genre_img'] = $rname;
            $this->image->withFile($file->getTempName())->save('public/video_kategori_img/' . $rname, 50);
        }

        $m = $this->videos->KategoriSave($input);
        $this->historyUser($m);
        $this->SuccessRespon('Data Berhasil Disimpan');
    }
    public function video_kategori_del()
    {
        $this->systems->userTypeAccess('admin');

        $kvid = $this->input->getPost('kvid');
        $m = $this->videos->KategoriDel($kvid);
        $this->historyUser($m);
        $this->SuccessRespon('Data Berhasil Dihapus');
    }

    //Video
    public function video_list($any)
    {
        $this->systems->userTypeAccess('admin');

        $i = $this->videos->getKategoriForm($any);
        if (!$i) $this->ErrorRespon('Halaman Tidak Ditemukan');
        $data['kvid'] = $any;
        return view('administrator/video/video', $data);
    }
    public function video_fetch()
    {
        $this->systems->userTypeAccess('admin');

        $katvid = $this->input->getPost('kvid');
        $this->datatables->search([
            'c.country_nama',
            'v.video_nama',
            'v.video_tahun',
            'v.video_deskripsi',
            'v.video_dilihat',
            'v.video_id'
        ]);
        $this->datatables->select('
            v.video_nama,
            c.country_nama,
            v.video_tahun,
            v.video_deskripsi,
            v.video_dilihat,
            v.is_draft,
            v.video_id
        ');
        $this->datatables->from('video as v');
        $this->datatables->join('country as c', 'c.country_id=v.country_id', 'left');
        $this->datatables->order_by('video_id', 'desc');
        $this->datatables->where('video_genre_id', $katvid);
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
        $this->systems->userTypeAccess('admin');

        $vid = $this->input->getPost('vid');
        $kvid = $this->input->getPost('kvid');
        $data['kvid'] = $kvid;
        $data['country'] = $this->utils->getCountry();
        $data['vid'] = $this->videos->getVideoForm($vid);
        return view('administrator/video/video_form', $data);
    }
    public function video_upload()
    {
        $this->systems->userTypeAccess('admin');

        $input = [
            'video_genre_id' => $this->input->getPost('kvid'),
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
            $file->move(ROOTPATH . 'public/video_file/', $rname);
        }
        $m = $this->videos->videoUpload($input);
        $vid = $m['vid'];
        unset($m['vid']);
        $this->historyUser($m);
        $this->SuccessRespon('Data Berhasil Disimpan', ['vid' => $vid, 'video_file' => $rname, 'is_draft' => true]);
    }
    public function video_save()
    {
        $this->systems->userTypeAccess('admin');

        $input = $this->input->getPost();
        $input['video_genre'] = json_encode($input['video_genre']);
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
            $subtitle->move(ROOTPATH . 'public/video_subtitle/', $rname);
        }
        $m = $this->videos->videoSave($input);
        $this->historyUser($m);
        $this->SuccessRespon('Data Berhasil Disimpan !');
    }
    public function video_del()
    {
        $this->systems->userTypeAccess('admin');
        
        $vid = $this->input->getPost('vid');
        $m = $this->videos->videoDel($vid);
        $this->historyUser($m);
        $this->SuccessRespon('Data Berhasil Dihapus');
    }
}
