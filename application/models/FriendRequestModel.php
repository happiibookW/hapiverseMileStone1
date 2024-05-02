<?php

class FriendRequestModel extends CI_Model
{

    ######################## group model functions ########################
    public function insert($data, $table)
    {
        $status = $this->db->insert($table, $data);
        return $status;
    }
}
?>