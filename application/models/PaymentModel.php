<?php
class PaymentModel extends CI_Model
{
    public function insert($data,$table){
        return $this->db->insert($table,$data);
    }
}