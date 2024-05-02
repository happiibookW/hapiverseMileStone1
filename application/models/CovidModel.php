<?php

class CovidModel extends CI_Model
{
    public function add($data,$table){
        return $this->db->insert($table,$data);
    }
    public function fetch($compare,$table){
        $this->db->where($compare);
        return $this->db->get($table)->result_array();
    }
}
