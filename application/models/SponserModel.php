<?php

class SponserModel extends CI_Model
{

    ######################## user model functions ########################
    public function insert($data, $table)
    {
        $status = $this->db->insert($table, $data);
        return $status;
    }
    public function fetch($compare,$table){
        $this->db->where($compare);
        return $this->db->get($table)->row_array();
    }
}