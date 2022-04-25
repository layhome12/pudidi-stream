<?php

namespace App\Controllers\Administrator;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $this->systems->userTypeAccess('admin');

        $data['cards'] = $this->utils->getCards();
        return view('administrator/dashboard/dashboard', $data);
    }
    public function get_chart()
    {
        $this->systems->userTypeAccess('admin');
        
        $data = [];
        $input = $this->input->getPost('tahun');

        for ($i = 12; $i >= 1; $i--) {
            $month = ($i < 10) ? '0' . $i : $i;
            $st = $this->utils->getStatistikChart($input . '-' . $month);
            $data[] = ['month_name' => month_name($i), 'value' => $st->statistik_count];
        }

        $this->SuccessRespon('Data Berhasil Diambil', $data);
    }
}
