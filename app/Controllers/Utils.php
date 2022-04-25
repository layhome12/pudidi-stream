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
                'video_genre_id' => $this->input->getGet('kvid'),
                'is_draft' => '0'
            ],
            'type' => 'json'
        ];
        $this->utils->getSelect2($conf);
    }
    public function get_list_movies()
    {
        $input = $this->input->getPost();
        if ($input['country_id'] == 0) unset($input['country_id']);
        if ($input['video_tahun'] == 0) unset($input['video_tahun']);
        $data['list_movies'] = $this->videos->getListMovies($input);
        return view('landing/utils/listmovies', $data);
    }
    public function get_count_data()
    {
        $input = $this->input->getPost();
        $m = $this->utils->countData([
            'table' => 'video',
            'where' => array_filter($input)
        ]);
        $this->SuccessRespon('Data Berhasil Diambil', ['amount' => $m]);
    }
    public function add_favorit()
    {
        $input = $this->input->getPost();
        $input['user_id'] = $this->session->get('user_id');
        $msg = ($input['fav'] == 0) ? 'Ditambahkan ke Favorit' : 'Dihapus dari Favorit';
        if (!$input['user_id']) $this->ErrorRespon('Anda Harus Login Dahulu !');
        $m = $this->videos->addFavorite($input);
        $this->historyUser($m);
        $this->SuccessRespon($msg);
    }
    public function get_templates()
    {
        $pid = $this->input->getPost('pid');
        $m = $this->utils->getShowItem([
            'table' => 'pages_template',
            'select' => 'pages_template_isi',
            'where' => ['pages_template_id' => $pid]
        ]);
        $this->SuccessRespon('Data Berhasil Diambil', $m);
    }

    //Summernote
    public function summernote_img_save()
    {
        $validate = $this->validate([
            'rules' => 'mime_in[images,image/jpg,image/jpeg,image/png]|max_size[images,1024]'
        ]);
        if (!$validate) $this->ErrorRespon('Format yang Didukung JPG, PNG, JPEG dan Max File 1MB !');

        $file = $this->input->getFile('images');
        if ($file->isValid()) {
            $rname = $file->getRandomName();
            $this->image->withFile($file->getTempName())->save('public/summernote_img/' . $rname, 100);
        }
        $this->SuccessRespon('Berhasil di Upload !', ['url' => base_url('/public/summernote_img' . '/' . $rname)]);
    }
    public function summernote_img_del()
    {
        $file = $this->input->getPost('src');
        $dir = ROOTPATH . 'public\\' . "summernote_img\\" . str_replace(base_url('public/summernote_img' . '/'), '', $file);
        if (!unlink($dir)) $this->ErrorRespon('Gagal Dihapus');
        $this->SuccessRespon('Berhasil Dihapus');
    }

    //MPDF

    public function cetak_pdf()
    {
        $this->printPDF('test.pdf', '<h1>TESTING PRINT</h1>');
    }
}
