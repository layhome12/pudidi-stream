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

    public function historyCrud($action, $arr)
    {
        switch ($action) {
            case 'insert':
                $qlog = $this->db->table($arr['table'])
                    ->set($arr['data'])
                    ->getCompiledInsert();
                $history = [
                    'history_icon' => 'fa fa-plus',
                    'history_action' => 'Insert',
                    'history_keterangan' => $qlog
                ];
                break;
            case 'update':
                $qlog = $this->db->table($arr['table'])
                    ->where($arr['table'] . '_id', $arr['id'])
                    ->set($arr['data'])
                    ->getCompiledUpdate();
                $history = [
                    'history_icon' => 'fa fa-edit',
                    'history_action' => 'Update',
                    'history_keterangan' => $qlog
                ];
                break;
            case 'delete':
                $qlog = $this->db->table($arr['table'])
                    ->where($arr['table'] . '_id', $arr['id'])
                    ->getCompiledDelete();
                $history = [
                    'history_icon' => 'fa fa-delete',
                    'history_action' => 'Delete',
                    'history_keterangan' => $qlog
                ];
                break;
            case 'block':
                $qlog = $this->db->table($arr['table'])
                    ->where($arr['table'] . '_id', $arr['id'])
                    ->set(['is_active' => 2])
                    ->getCompiledUpdate();
                $history = [
                    'history_icon' => 'fa fa-lock',
                    'history_action' => 'Block',
                    'history_keterangan' => $qlog
                ];
                break;
            case 'unblock':
                $qlog = $this->db->table($arr['table'])
                    ->where($arr['table'] . '_id', $arr['id'])
                    ->set(['is_active' => 1])
                    ->getCompiledUpdate();
                $history = [
                    'history_icon' => 'fa fa-lock-open',
                    'history_action' => 'Unblock',
                    'history_keterangan' => $qlog
                ];
                break;
            default:
                #code
                break;
        }
        return $history;
    }
    public function deleteFile($set = [])
    {
        $file = $set['file'];
        $m = $this->db->table($set['table'])
            ->select($file)
            ->where($set['table'] . '_id', $set['id'])
            ->get()
            ->getRowArray();
        $path = WRITEPATH . $set['path'] . '\\' . $m[$file];

        if (file_exists($path)) {
            unlink($path);
        }
    }
}
