<?php

class AuthenticationModel extends CI_Model
{
    // login model for users
    public function auth($credentials)
    {
        $this->db->where($credentials);
        $data = $this->db->select("`userId`, `isActive`, `email`, `userTypeId`, `password`, `token`,`emailVerified`")->from("mstauthorization")->get()->row_array();
		
        if ($data != "" && $data['isActive'] == 0) {
            return "NOT_APPROVED";
        } elseif ($data != "" && $data['isActive'] == 2) {
            return "REJECTED";
        } elseif ($data != "" && $data['emailVerified'] != 1) {
            return "NOT_VERIFY";
        } elseif ($data != "") {
            return $data;
        } else {
            return $data;
        }
    }
    // forgot password
    public function forgot($data, $compare)
    {
        $this->db->where($compare);
        $is_exist = $this->db->get("mstauthorization")->row_array();
        if ($is_exist == "") {
            return false;
        } else {
            $this->db->where($compare);
            return $this->db->update('mstauthorization', $data);
        }
    }
    // reset password 
    public function resetpassword($data,$compare)
    {
        $this->db->where($compare);
        $is_exist = $this->db->get("mstauthorization")->row_array();
        if ($is_exist == "") {
            return false;
        } else {
            $this->db->where($compare);
            return $this->db->update('mstauthorization', $data);
        }
    }
      // store deveice data 
    public function deviceData($data)
    {
        $compare = array(
            "deviceUUID" => $data['deviceUUID'],
            "userId" => $data['userId'],

        );
        $this->db->where($compare);
        $isExist = $this->db->get("mstdevicedata")->row_array();
        if (!empty($isExist)) {
            $this->db->where($compare);
            return $this->db->update('mstdevicedata', $data);
        } else {
            return $this->db->insert("mstdevicedata", $data);
        }
    }
    public function update($compare,$data,$table){
        $this->db->where($compare);
        return $this->db->update($table,$data);
        
    }
    public function stealthStatus($compare){
      return   $this->db->select('isStealth,stealthtime,stealthDuration')
        ->from("mstuser")
        ->where($compare)
        ->get()->row_array();
    }
     public function personalStatus($compare){
      return   $this->db->select('isPrivate')
        ->from("mstuser")
        ->where($compare)
        ->get()->row_array();
    }
}
