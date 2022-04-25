<?php

namespace App\Models;

class MSidebar extends BaseModel
{
    // GET METHOD
    public function getSidebars()
    {
        $data = $this->db->table('sidebar')
            ->select('
                sidebar_id,
                sidebar_nama,
                sidebar_icon,
                sidebar_link       
            ')
            ->where('parent_id', 0)
            ->where('status', 1)
            ->get()
            ->getResult();

        foreach ($data as $key => $val) {
            $data[$key]->sidebar_child = $this->getChildSidebar($val->sidebar_id);
        }

        return $data;
    }

    public function getChildSidebar($parent = '')
    {
        $data = $this->db->table('sidebar')
            ->select('
                sidebar_id,
                sidebar_nama,
                sidebar_icon,
                sidebar_link    
            ')
            ->where('parent_id', $parent)
            ->where('status', 1)
            ->get()
            ->getResult();

        return $data;
    }
}
