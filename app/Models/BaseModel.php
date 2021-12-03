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
                $DB = $this->db->table($arr['table']);
                (is_array($arr['id'])) ? $DB->where($arr['id']) : $DB->where($arr['table'] . '_id', $arr['id']);
                $DB->set($arr['data']);
                $qlog = $DB->getCompiledUpdate();
                $history = [
                    'history_icon' => 'fa fa-edit',
                    'history_action' => 'Update',
                    'history_keterangan' => $qlog
                ];
                break;
            case 'delete':
                $DB = $this->db->table($arr['table']);
                (is_array($arr['id'])) ? $DB->where($arr['id']) : $DB->where($arr['table'] . '_id', $arr['id']);
                $qlog = $DB->getCompiledDelete();
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
        $path = ROOTPATH . 'public\\' . $set['path'] . '\\' . $m[$file];

        if (file_exists($path)) {
            unlink($path);
        }
    }
    public function videoShowLog($id)
    {
        $uid = $this->session->get('user_id');
        if ($uid) {
            $m = $this->db->table('history_dilihat')
                ->select('history_dilihat_id, history_dilihat_loop')
                ->like('created_time', date('Y-m-d'))
                ->where('user_id', $uid)
                ->where('video_id', $id)
                ->get()->getRowArray();

            if (isset($m['history_dilihat_id'])) {
                $this->db->table('history_dilihat')
                    ->where('history_dilihat_id', $m['history_dilihat_id'])
                    ->set(['created_time' => date('Y-m-d H:i:s'), 'history_dilihat_loop' => (int)$m['history_dilihat_loop'] + 1])
                    ->update();
            } else {
                $this->db->table('history_dilihat')->set([
                    'user_id' => $uid,
                    'video_id' => $id,
                    'created_time' => date('Y-m-d H:i:s')
                ])->insert();
            }
        }
        $i = $this->db->table('video')
            ->select('video_dilihat')
            ->where('video_id', $id)
            ->get()
            ->getRowArray()['video_dilihat'];
        $this->db->table('video')->where('video_id', $id)->set([
            'video_dilihat' => (int) $i + 1
        ])->update();
    }
}
