<?php

namespace App\Controllers\Administrator;

use App\Controllers\BaseController;

class FrontEnd extends BaseController
{
    //Movies Slide
    public function video_slide()
    {
        $this->systems->userTypeAccess('admin');

        return view('administrator/video_slide/video_slide');
    }
    public function video_slide_fetch()
    {
        $this->systems->userTypeAccess('admin');

        $this->datatables->search([
            'svid.video_slide_nama',
            'vid.video_nama',
            'vid.video_tahun',
            'svid.video_slide_id'
        ]);
        $this->datatables->select('
            svid.video_slide_nama,
            vid.video_nama,
            vid.video_tahun,
            svid.video_slide_id
        ');
        $this->datatables->from('video_slide as svid');
        $this->datatables->join('video as vid', 'vid.video_id=svid.video_id');
        $this->datatables->order_by('vid.video_id', 'desc');
        $m = $this->datatables->get();
        foreach ($m as $key => $value) {
            $button = '';
            $button .= "<button onclick=\"dt_form(this)\" target-id=\"$value[video_slide_id]\" class=\"btn mr-1 btn-primary\"><i class=\"far fa-edit\"></i></button>";
            $button .= "<button onclick=\"dt_del(this)\" target-id=\"$value[video_slide_id]\" class=\"btn btn-secondary\"><i class=\"fa fa-eraser\"></i></button>";
            $m[$key]['video_slide_id'] = "<div class=\"tb-action\">$button</div>";
        }
        $this->datatables->render_no_keys($m);
    }
    public function video_slide_form()
    {
        $this->systems->userTypeAccess('admin');

        $svid = $this->input->getPost('svid');
        $data['slidevid'] = $this->videos->getVideoSlideForm($svid);
        return view('administrator/video_slide/video_slide_form', $data);
    }
    public function video_slide_save()
    {
        $this->systems->userTypeAccess('admin');

        $input = $this->input->getPost();
        $validate = $this->validate([
            'rules' => 'mime_in[video_slide_img,image/jpg,image/jpeg,image/png]|max_size[video_slide_img,512]'
        ]);
        if (!$validate) $this->ErrorRespon('Format yang Didukung JPG, PNG, JPEG dan Max File 512 KB !');

        $file = $this->input->getFile('video_slide_img');
        if ($file->isValid()) {
            $rname = $file->getRandomName();
            $input['video_slide_img'] = $rname;
            $this->image->withFile($file->getTempName())->save('public/video_slide_img/' . $rname, 50);
        }

        $m = $this->videos->videoSlideSave($input);
        $this->historyUser($m);
        $this->SuccessRespon('Data Berhasil Disimpan');
    }
    public function video_slide_del()
    {
        $this->systems->userTypeAccess('admin');

        $svid = $this->input->getPost('svid');
        $m = $this->videos->videoSlideDel($svid);
        $this->historyUser($m);
        $this->SuccessRespon('Data Berhasil Dihapus');
    }

    //Review Movies
    public function video_review()
    {
        $this->systems->userTypeAccess('admin');

        return view('administrator/video_review/video_review');
    }
    public function video_review_fetch()
    {
        $this->systems->userTypeAccess('admin');

        $this->datatables->search([
            'rvid.video_review_nama',
            'vid.video_nama',
            'rvid.video_review_dilihat',
            'rvid.is_public',
            'rvid.video_review_id'
        ]);
        $this->datatables->select('
           rvid.video_review_nama,
           vid.video_nama,
           rvid.video_review_dilihat,
           rvid.is_public,
           rvid.video_review_id
        ');
        $this->datatables->from('video_review as rvid');
        $this->datatables->join('video as vid', 'vid.video_id=rvid.video_id');
        $this->datatables->order_by('rvid.created_time', 'desc');
        $m = $this->datatables->get();
        foreach ($m as $key => $value) {
            $button = '';
            $button .= "<button onclick=\"dt_form(this)\" target-id=\"$value[video_review_id]\" class=\"btn mr-1 btn-primary\"><i class=\"far fa-edit\"></i></button>";
            $button .= "<button onclick=\"dt_del(this)\" target-id=\"$value[video_review_id]\" class=\"btn btn-secondary\"><i class=\"fa fa-eraser\"></i></button>";
            $m[$key]['video_review_id'] = "<div class=\"tb-action\">$button</div>";
            $m[$key]['is_public'] = $value['is_public'] == 1 ? 'Publik' : 'Private';
        }
        $this->datatables->render_no_keys($m);
    }
    public function video_review_form()
    {
        $this->systems->userTypeAccess('admin');

        $id = $this->input->getPost('rvid');
        $data['review_vid'] = $this->videos->getVideoReviewForm($id);
        return view('administrator/video_review/video_review_form', $data);
    }
    public function video_review_save()
    {
        $this->systems->userTypeAccess('admin');

        $input = $this->input->getPost();
        $validate = $this->validate([
            'rules' => 'mime_in[video_review_img,image/jpg,image/jpeg,image/png]|max_size[video_review_img,512]'
        ]);
        if (!$validate) $this->ErrorRespon('Format yang Didukung JPG, PNG, JPEG dan Max File 512 KB !');

        $file = $this->input->getFile('video_review_img');
        if ($file->isValid()) {
            $rname = $file->getRandomName();
            $input['video_review_img'] = $rname;
            $this->image->withFile($file->getTempName())->save('public/video_review_img/' . $rname, 50);
        }
        if (!isset($input['is_public'])) $input['is_public'] = '0';
        $input['video_review_seo'] = url_title(strtolower($input['video_review_nama']));

        $m = $this->videos->videoReviewSave($input);
        $this->historyUser($m);
        $this->SuccessRespon('Data Berhasil Disimpan');
    }
    public function video_review_del()
    {
        $this->systems->userTypeAccess('admin');

        $svid = $this->input->getPost('rvid');
        $m = $this->videos->videoReviewDel($svid);
        $this->historyUser($m);
        $this->SuccessRespon('Data Berhasil Dihapus');
    }

    //Identitas Web
    public function info_management()
    {
        $this->systems->userTypeAccess('admin');

        $data['identitas'] = $this->utils->getShowItem([
            'table' => 'identitas_web',
            'select' => 'identitas_web_nama, identitas_web_img, identitas_web_deskripsi, identitas_web_facebook, identitas_web_twitter, identitas_web_instagram, identitas_web_youtube',
            'where' => ['identitas_web_id' => 1]
        ]);
        return view('administrator/identitas_web/identitas_web', $data);
    }
    public function info_management_save()
    {
        $this->systems->userTypeAccess('admin');

        $input = $this->input->getPost();
        $validate = $this->validate([
            'rules' => 'mime_in[identitas_web_img,image/jpg,image/jpeg,image/png]|max_size[identitas_web_img,512]'
        ]);
        if (!$validate) $this->ErrorRespon('Format yang Didukung JPG, PNG, JPEG dan Max File 512 KB !');

        $file = $this->input->getFile('identitas_web_img');
        if ($file->isValid()) {
            $rname = $file->getRandomName();
            $input['identitas_web_img'] = $rname;
            $this->image->withFile($file->getTempName())->save('public/identitas_web_img/' . $rname, 100);
        }

        $m = $this->utils->identitasWebSave($input);
        $this->historyUser($m);
        $this->SuccessRespon('Data Berhasil Disimpan');
    }

    //Pages Management
    public function pages_management()
    {
        $this->systems->userTypeAccess('admin');

        return view('administrator/pages/pages');
    }
    public function pages_management_fetch()
    {
        $this->systems->userTypeAccess('admin');

        $this->datatables->search([
            'p.pages_nama',
            'pt.pages_template_nama',
            'p.pages_seo',
            'p.pages_id'
        ]);
        $this->datatables->select('
           p.pages_nama, 
           pt.pages_template_nama, 
           p.pages_seo,
           p.pages_id
        ');
        $this->datatables->from('pages as p');
        $this->datatables->join('pages_template as pt', 'p.pages_template_id=pt.pages_template_id');
        $this->datatables->order_by('p.created_time', 'desc');
        $m = $this->datatables->get();
        foreach ($m as $key => $value) {
            $button = '';
            $button .= "<button onclick=\"dt_form(this)\" target-id=\"$value[pages_id]\" class=\"btn mr-1 btn-primary\"><i class=\"far fa-edit\"></i></button>";
            $button .= "<button onclick=\"dt_del(this)\" target-id=\"$value[pages_id]\" class=\"btn btn-secondary\"><i class=\"fa fa-eraser\"></i></button>";
            $m[$key]['pages_id'] = "<div class=\"tb-action\">$button</div>";
            $m[$key]['pages_seo'] = "<a href='" . base_url('/pages') . '/' . $value['pages_seo'] . "' style='font-size: 13px;' target='_blank'>" . 'pages/' . $value['pages_seo'] . "</a>";
        }
        $this->datatables->render_no_keys($m);
    }
    public function pages_management_form()
    {
        $this->systems->userTypeAccess('admin');

        $id = $this->input->getPost('pid');
        $data['pages'] = $this->utils->getPagesForm($id);
        return view('administrator/pages/pages_form', $data);
    }
    public function pages_management_save()
    {
        $this->systems->userTypeAccess('admin');

        $input = $this->input->getPost();
        $input['pages_seo'] = url_title(strtolower($input['pages_nama']));

        $m = $this->utils->pagesSave($input);
        $this->historyUser($m);
        $this->SuccessRespon('Data Berhasil Disimpan');
    }
    public function pages_management_del()
    {
        $this->systems->userTypeAccess('admin');

        $pid = $this->input->getPost('pid');
        $m = $this->utils->pagesDel($pid);
        $this->historyUser($m);
        $this->SuccessRespon('Data Berhasil Dihapus');
    }

    //Menu Management
    public function menu_management()
    {
        $this->systems->userTypeAccess('admin');

        return view('administrator/menu_management/menu_management');
    }
    public function menu_management_fetch()
    {
        $this->systems->userTypeAccess('admin');

        $this->datatables->search([
            'menu_landing_nama',
            'menu_landing_parent',
            'menu_landing_link',
            'menu_landing_id'
        ]);
        $this->datatables->select('
            menu_landing_nama,
            menu_landing_parent,
            menu_landing_link,
            menu_landing_id  
        ');
        $this->datatables->from('menu_landing');
        $this->datatables->order_by('created_time', 'desc');
        $m = $this->datatables->get();
        foreach ($m as $key => $value) {
            $button = '';
            $button .= "<button onclick=\"dt_form(this)\" target-id=\"$value[menu_landing_id]\" class=\"btn mr-1 btn-primary\"><i class=\"far fa-edit\"></i></button>";
            $button .= "<button onclick=\"dt_del(this)\" target-id=\"$value[menu_landing_id]\" class=\"btn btn-secondary\"><i class=\"fa fa-eraser\"></i></button>";
            $link = (substr($value['menu_landing_link'], 0, 4) != 'http') ? base_url($value['menu_landing_link']) : $value['menu_landing_link'];
            $m[$key]['menu_landing_id'] = "<div class=\"tb-action\">$button</div>";
            $m[$key]['menu_landing_parent'] = $value['menu_landing_parent'] == 0 ? 'Parent' : 'Child';
            $m[$key]['menu_landing_link'] = "<a href='" . $link .  "' style='font-size: 13px;' target='_blank'>" . $value['menu_landing_link'] . "</a>";
        }
        $this->datatables->render_no_keys($m);
    }
    public function menu_management_form()
    {
        $this->systems->userTypeAccess('admin');

        $id = $this->input->getPost('mid');
        $data['menu_management'] = $this->utils->getMenuManagementForm($id);
        return view('administrator/menu_management/menu_management_form', $data);
    }
    public function menu_management_save()
    {
        $this->systems->userTypeAccess('admin');

        $input = $this->input->getPost();
        $m = $this->utils->menuManagementSave($input);
        $this->historyUser($m);
        $this->SuccessRespon('Data Berhasil Disimpan');
    }
    public function menu_management_del()
    {
        $this->systems->userTypeAccess('admin');
        
        $pid = $this->input->getPost('mid');
        $m = $this->utils->menuManagementDel($pid);
        $this->historyUser($m);
        $this->SuccessRespon('Data Berhasil Dihapus');
    }
}
