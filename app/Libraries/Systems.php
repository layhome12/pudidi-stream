<?php

namespace App\Libraries;

use Config\Database;
use Config\Services;
use DOMDocument;
use DOMXPath;

class Systems
{
    protected $db;
    protected $group_id;

    private $access_active;
    private $access_read;
    private $access_create;
    private $access_update;
    private $access_delete;

    public function __construct()
    {
        $this->db = Database::connect();
        $this->session = Services::session();
        $this->dom = new DOMDocument();
    }
    public function userData($key)
    {
        $data = $this->session->get();
        return $data[$key];
    }
    public function getSidebar($arr = [])
    {
        //Ambil Access Menu
        $DB = $this->db->table('v_sidebar_access');
        $DB->select('
            sidebar_id, 
            sidebar_parent,
            sidebar_nama,
            sidebar_kode,
            create,
            read,
            update,
            delete
        ');

        //Filter Custom
        if ($arr) $DB->where($arr);

        $DB->where('user_group_id', $this->userData('user_group_id'));
        $data = $DB->get()->getRow();

        return $data;
    }

    // ================== USER ACCESS ================== //

    public function userTypeAccess($type = '', $access = [])
    {
        /*
        *   PENGGUNAAN
        *   
        *   $system = new App\Libraries\Systems();
        *   $system->userTypeAccess('admin', [
		*	    'sidebar_kode' => 'sidebar_kode',
		*	    'sidebar_access' => 'read'
		*   ]);
        *
        *   KETERANGAN
        *   sidebar_kode => Kode Sidebar Menu
        *   sidebar_access => create, read, update, delete
        */

        $userType = session()->get('user_type');
        if ($userType != $type) $this->ErrorRespon('Anda tidak memiliki akses ke halaman ini !');

        if ($access && $this->userData('user_group_id') != getenv('GID_DEVELOPER')) {
            $sac = (array) $this->getSidebar(['sidebar_kode' => $access['sidebar_kode']]);
            if (!$sac) $this->ErrorRespon('Anda tidak memiliki akses ke halaman ini !');

            $this->access_active = true;
            $this->access_create = $sac['create'];
            $this->access_read = $sac['read'];
            $this->access_update = $sac['update'];
            $this->access_delete = $sac['delete'];

            if (!$sac[$access['sidebar_access']]) $this->ErrorRespon('Anda tidak memiliki akses untuk aksi ini !');
        } else {

            // Hak Akses Bebas
            $this->access_active = false;
            $this->access_create = true;
            $this->access_read = true;
            $this->access_update = true;
            $this->access_delete = true;
        }
    }
    public function userPublicAccess($type = '', $access = [])
    {
        $userType = session()->get('user_type');
        if ($userType && $userType != $type) $this->ErrorRespon('Anda tidak memiliki akses ke halaman ini !');
    }

    // ================== HTML DOM ================== //

    public function domainAlertSuccess($msg = '', $onClick = '')
    {
        $html = "<div class=\"border-dashed-1 d-flex justify-content-between border-radius-10 p-3\">";
        $html .= "<h5 class=\"checked-success font-size-16 text-blue-primary text-weight-6\"><i class=\"fa fa-check icon-show\"></i>$msg</h5>";
        $html .= "<button type=\"button\" onclick=\"$onClick\" class=\"btn btn-blue-primary float-right text-weight-6\">Lanjut <i class=\"fa fa-arrow-right ml-2\"></i></button>";
        $html .= "</div>";

        return $html;
    }
    public function domainAlertFailed($msg = '')
    {
        $html = "<div class=\"border-dashed-1 d-flex justify-content-between border-radius-10 p-3\">";
        $html .= "<h5 class=\"checked-failed font-size-16 text-danger-primary text-weight-6\"><i class=\"fa fa-times icon-show\"></i>$msg</h5>";
        $html .= "<button type=\"button\" class=\"btn btn-blue-primary float-right text-weight-6 d-none d-md-block\" disabled>Lanjut <i class=\"fa fa-arrow-right ml-2\"></i></button>";
        $html .= "</div>";

        return $html;
    }
    public function buttonAction($type = '', $options = [])
    {
        /*
        *   PENGGUNAAN
        *
        *   $sys=new App\Libraries\Systems();
        *   
        *   DEFAULT BUTTON
        *   $sys->buttonAction('default', [
        *       'button' => 'create',
        *       'data_id' => $value['table_id']
        *   ]);
        *
        *   CUSTOM BUTTON
        *   $sys->buttonAction('custom', [
        *        'button' => 'create',
        *        'attribute' => ['onclick'=>'dt_form(this)'],
        *        'element' => '<button type="submit" class="btn btn-primary btn-block"><i class="far fa-save mr-2"></i> Simpan</button>',
        *        'data_id' => 0
        *    ])
        *
        *   KETERANGAN
        *   type => default, custom
        *   button => read, create, update, delete
        *   data_id => ID dari data
        *   element => Element Button
        *   attribute => array(), bool() # Jika Attribute tipe array data_id bisa dihapus 
        */

        switch ($type) {
            case 'default':

                switch ($options['button']) {
                    case 'read':
                        if ($this->access_read) {
                            $button = "<button onclick=\"dt_read(this)\" target-id=\"$options[data_id]\" class=\"btn mr-1 btn-light\"><i class=\"fas fa-list\"></i></button>";
                        } else {
                            $button = "<button class=\"btn mr-1 btn-light\" disabled><i class=\"fas fa-list\"></i></button>";
                        }
                        break;
                    case 'create':
                        if ($this->access_create) {
                            $button = "<a href=\"javascript:;\" class=\"btn btn-primary\" onclick=\"dt_form(this)\" target-id=\"0\"><i class=\"fa fa-plus mr-2\"></i> Tambah</a>";
                        } else {
                            $button = "<button class=\"btn btn-primary\" disabled><i class=\"fa fa-plus mr-2\"></i> Tambah</button>";
                        }
                        break;
                    case 'update':
                        if ($this->access_update) {
                            $button = "<button onclick=\"dt_form(this)\" target-id=\"$options[data_id]\" class=\"btn mr-1 btn-warning\"><i class=\"far fa-edit\"></i></button>";
                        } else {
                            $button = "<button class=\"btn mr-1 btn-warning\" disabled><i class=\"far fa-edit\"></i></button>";
                        }
                        break;
                    case 'delete':
                        if ($this->access_delete) {
                            $button = "<button onclick=\"dt_delete(this)\" target-id=\"$options[data_id]\" class=\"btn btn-danger\"><i class=\"fa fa-eraser\"></i></button>";
                        } else {
                            $button = "<button class=\"btn btn-danger\" disabled><i class=\"fa fa-eraser\"></i></button>";
                        }
                        break;
                    default:
                        $button = null;
                        break;
                }

                break;
            case 'custom':

                //Cek Attribute array() atau bool()
                $attribute = (is_bool(@$options['attribute'])) ? $options['attribute'] : true;
                $attribute = (is_array(@$options['attribute'])) ? $options['attribute'] : $attribute;

                switch ($options['button']) {
                    case 'read':
                        if ($this->access_read) {
                            $button = $this->DOMButtonAction('enabled', [
                                'attribute' => $attribute,
                                'element' => $options['element'],
                                'data_id' => @$options['data_id']
                            ]);
                        } else {
                            $button = $this->DOMButtonAction('disabled', [
                                'element' => $options['element']
                            ]);
                        }

                        break;
                    case 'create':
                        if ($this->access_create) {
                            $button = $this->DOMButtonAction('enabled', [
                                'attribute' => $attribute,
                                'element' => $options['element'],
                                'data_id' => @$options['data_id']
                            ]);
                        } else {
                            $button = $this->DOMButtonAction('disabled', [
                                'element' => $options['element']
                            ]);
                        }

                        break;
                    case 'update':
                        if ($this->access_update) {
                            $button = $this->DOMButtonAction('enabled', [
                                'attribute' => $attribute,
                                'element' => $options['element'],
                                'data_id' => @$options['data_id']
                            ]);
                        } else {
                            $button = $this->DOMButtonAction('disabled', [
                                'element' => $options['element']
                            ]);
                        }

                        break;
                    case 'delete':
                        if ($this->access_delete) {
                            $button = $this->DOMButtonAction('enabled', [
                                'attribute' => $attribute,
                                'element' => $options['element'],
                                'data_id' => @$options['data_id']
                            ]);
                        } else {
                            $button = $this->DOMButtonAction('disabled', [
                                'element' => $options['element']
                            ]);
                        }

                        break;
                    default:
                        $button = null;
                        break;
                }

                break;
            default:
                #code
                break;
        }

        return $button;
    }
    public function DOMButtonAction($type, $options = [])
    {
        $dom = new DOMDocument();
        $dom->loadHTML($options['element']);

        $xpath = new DOMXPath($dom);
        $element = $xpath->query('//button');

        switch ($type) {
            case 'enabled':
                foreach ($element as $node) {
                    if (is_array($options['attribute'])) {
                        $keys = array_keys($options['attribute']);
                        foreach ($keys as $key) {
                            $node->setAttribute($key, $options['attribute'][$key]);
                        }
                    } else if ($options['attribute'] == true) {
                        $node->setAttribute("onclick", "dt_form(this)");
                        $node->setAttribute("target-id", $options['data_id']);
                    } else {
                        # NULL
                    }
                }
                break;
            case 'disabled':
                foreach ($element as $node) {
                    $node->setAttribute("disabled", "");
                }
                break;
            default:
                #code
                break;
        }

        $html = $dom->saveHTML();
        $html = str_replace('<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">', '', str_replace('</body></html>', '', str_replace('<html><body>', '', $html)));

        return $html;
    }

    // ================== AJAX RESPON ================== //

    public function SuccessRespon($msg, $data = [])
    {
        $json = ['status' => '1', 'msg' => $msg, 'data' => $data];
        echo json_encode($json, JSON_PRETTY_PRINT);
        die;
    }

    public function ErrorRespon($msg, $data = [])
    {
        $json = ['status' => '0', 'msg' => $msg, 'data' => $data];
        echo json_encode($json, JSON_PRETTY_PRINT);
        die;
    }

    // ================== GET FORM ARRAY ================== //

    public function getFormData($arr = [])
    {
        /*
        *   PENGGUNAAN
        *
        *   $sys=new App\Libraries\Systems();
        *
        *   $sys->getFormData([
        *       'table' => 'table',
        *       'input' => $this->input->getPost(),
        *       'except' => ['table_id']
        *   ]);
        *
        *   KETERANGAN
        *   table => Tabel tempat data disimpan
        *   input => Input POST dari client
        *   except => Kolom yang dikecualikan
        */

        $data = [];

        //Hapus form yang dikecualikan
        if (@$arr['except']) {
            foreach ($arr['except'] as $key) {
                unset($arr['input'][$key]);
            }
        }
        //Ambil form yang ada di tabel saja
        $fields = $this->db->getFieldData($arr['table']);
        foreach ($fields as $val) {
            if (isset($arr['input'][$val->name])) $data[$val->name] = $arr['input'][$val->name];
        }

        return $data;
    }

    // ================== ALERT NOTIF LAYANAN ================== //

    public function alertNotifLayanan($status_id)
    {
        switch ($status_id) {
            case 1:
                $html = "<div class=\"alert alert-secondary\" role=\"alert\"><i class=\"fas fa-info-circle mr-2\"></i> Mohon segera membayar agar segera diproses</div>";
                break;
            case 2:
                $html = "<div class=\"alert alert-warning\" role=\"alert\"><i class=\"fas fa-info-circle mr-2\"></i> Layanan ini masih diproses oleh admin</div>";
                break;
            case 3:
                $html = "<div class=\"alert alert-primary\" role=\"alert\"><i class=\"fas fa-info-circle mr-2\"></i> Layanan sudah aktif, silahkan akses link yang diberikan</div>";
                break;
            case 4:
                $html = "<div class=\"alert alert-danger\" role=\"alert\"><i class=\"fas fa-info-circle mr-2\"></i> Layanan ini telah dibatalkan, silahkan untuk order dari awal</div>";
                break;
            case 5:
                $html = "<div class=\"alert alert-secondary\" role=\"alert\"><i class=\"fas fa-info-circle mr-2\"></i> Layanan ini telah expired, lakukan perpanjangan untuk mengaktifkan layanan</div>";
                break;
            default:
                $html = null;
                break;
        }

        return $html;
    }

    // ================== COUNTDOWN TABLE TRANSAKSI ================== //

    public function countDownTable($time, $exp, $options = [])
    {
        /*
        *   Penggunaan !
        *
        *   $sys=new App\Libraries\Systems();
        *
        *   $sys->countDownTable($tenggat, $exp, [
		*		'true_val' => [1, 2],
		*		'status_val' => 2,
		*		'text_true' => 'True Text',
        *       'text_false'=> 'False Text'
		*	]);
        *
        *   Keterangan :
        *
        *   true_val => value jika benar
        *   status_val => status value data
        *   text_true => text jika benar
        *   text_false => text jika salah
        */

        //Unshift Array
        array_unshift($options['true_val'], "number");
        unset($options['true_val'][0]);

        //Text
        $text_true = ($options['text_true']) ?: 'Berhasil';
        $text_false = ($options['text_false']) ?: 'Waktu habis';

        if (array_search($options['status_val'], $options['true_val'])) {
            $html = "<div class=\"countdown-timer countdown-success\"><i class=\"fas fa-stopwatch mr-2\"></i> $text_true</div>";
        } else if ($time >= $exp && $options['status_val'] == 1) {
            $html = "<div class=\"countdown-timer\" data-datetime=\"$time\">";
            $html .= "<i class=\"fas fa-stopwatch mr-2\"></i> <span class=\"h\">00</span>:<span class=\"m\">00</span>:<span class=\"s\">00</span>";
            $html .= "</div>";
        } else {
            $html = "<div class=\"countdown-timer countdown-danger\"><i class=\"fas fa-stopwatch mr-2\"></i> $text_false</div>";
        }

        return $html;
    }

    // ================== LIST NOTIFIKASI ================== //

    public function getListNotifikasi($type, $where = [], $limit = '')
    {
        $where['notifikasi_type'] = $type;

        $DB = $this->db->table('notifikasi')
            ->select('
                notifikasi_icon,
                notifikasi_nama,
                notifikasi_isi,
                notifikasi_link,
                notifikasi_dibaca,
                notifikasi_color
            ');

        if ($where) $DB->where($where);
        if ($limit) $DB->limit($limit);
        $DB->orderBy('created_time', 'desc');

        $data = (object)[];
        $data->result = $DB->get()->getResult();
        $data->count_data = $this->countAllData('notifikasi', $where);

        return $data;
    }

    // ================== SAVE NOTIFIKASI ================== //

    public function saveNotifikasi($type, $to = 'all', $options = [])
    {
        /*
        *   PENGGUNAAN !
        *   
        *   $sys=new App\Libraries\Systems();
        *
        *   $sys->saveNotifikasi('admin','spesial',[
        *        'where'=> ['user_id' => 1],
        *        'notifikasi => [
        *           'notifikasi_icon' => 'fa fa-icon',
		*		    'notifikasi_nama' => 'Notifikasi Judul',
		*		    'notifikasi_isi' => 'Notifikasi Isi',
		*		    'notifikasi_link' => '#link'
        *        ]
        *   ])
        *
        *   Keterangan :
        *
        *   1. $type => admin, customer
        *   2. $to => all, spesial, jika spesial where dibutuhkan
        *   3. notifikasi =>[table_coloumn]
        *
        */

        //Ambil User
        $usDB = $this->db->table('v_users')
            ->select('user_id, user_type');
        $usDB->where('user_type', $type);
        $usDB->where('is_activated', 1);
        $usDB->where('status', 1);

        switch ($to) {
            case 'spesial':
                $usDB->where($options['where']);
                $usData = $usDB->get()->getResult();
                break;
            case 'all':
                $usData = $usDB->get()->getResult();
                break;
            default:
                $this->ErrorRespon('Pilihan untuk notifikasi hanya spesial dan all');
                break;
        }

        // Looping Masukkan Notifikasi
        foreach ($usData as $key => $val) {
            $options['notifikasi']['user_id'] = $val->user_id;
            $options['notifikasi']['notifikasi_type'] = $val->user_type;
            $options['notifikasi']['created_time'] = date('Y-m-d H:i:s');

            $this->db->table('notifikasi')
                ->set($options['notifikasi'])
                ->insert();
        }

        return true;
    }

    // ================== COUNT DATA ================== //

    public function countAllData($table, $where = [])
    {
        $data = $this->db->table($table)
            ->where($where)
            ->countAllResults();

        return $data;
    }
}
