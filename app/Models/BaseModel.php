<?php

namespace App\Models;

use CodeIgniter\Config\Services;
use CodeIgniter\Model;
use Config\Database;

class BaseModel extends Model
{
    public function __construct()
    {
        $this->session = Services::session();
        $this->input = Services::request();
        $this->db = Database::connect();
    }
    public function SuccessRespon($msg, $data = [])
    {
        $json = ['status' => 1, 'msg' => $msg, 'data' => $data];
        echo json_encode($json);
        die;
    }
    public function ErrorRespon($msg)
    {
        $json = ['status' => 0, 'msg' => $msg];
        echo json_encode($json);
        die;
    }
}
