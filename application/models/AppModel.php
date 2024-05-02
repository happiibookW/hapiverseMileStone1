<?php
class AppModel extends CI_Model
{
    
    public function haveaccess($data)
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: X-API-KEY, Origin,X-Requested-With, Content-Type, Accept, Access-Control-Requested-Method, Authorization");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PATCH, PUT, DELETE");
        $this->db->where($data);
        $query = $this->db->get('mstauthorization');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function insert($data,$table){
        return $this->db->insert($table,$data);
    }
    public function fetch($data,$table){
        if($data['requestType']==1){
              $compare=array(
                  "t1.userId" => $data['userId'],
            );
     $return=$this->db->select('t1.*, t2.userName, t2.profileImageUrl')
     ->from('locationrequest as t1')
     ->where($compare)
     ->join('mstuser as t2', 't1.requesterId = t2.userId', 'LEFT')
     ->get()->result_array();
        }else{
             $compare=array(
                  "requesterId" => $data['userId'],
            );
            $return=$this->db->select('t1.*, t2.userName, t2.profileImageUrl')
     ->from('locationrequest as t1')
     ->where($compare)
     ->join('mstuser as t2', 't1.userId = t2.userId', 'LEFT')
     ->get()->result_array();
        }
        return $return; 
    }
      public function fetchLocation($data,$table){
        if($data['requestType']==1){
              $compare=array(
                  "t1.userId" => $data['userId'],
            );
     $return=$this->db->select('t1.*, t2.userName, t2.profileImageUrl')
     ->from('tracklocation as t1')
     ->where($compare)
     ->join('mstuser as t2', 't1.receiverId = t2.userId', 'LEFT')
     ->get()->result_array();
        }else{
             $compare=array(
                  "receiverId" => $data['userId'],
            );
            $return=$this->db->select('t1.*, t2.userName, t2.profileImageUrl')
     ->from('tracklocation as t1')
     ->where($compare)
     ->join('mstuser as t2', 't1.userId = t2.userId', 'LEFT')
     ->get()->result_array();
        }
        return $return; 
    }
    public function update($compare,$data,$table){
        $this->db->where($compare);
        return $this->db->update($table,$data);
    }
     public function replace($data,$table){
        return $this->db->replace($table,$data);
    }
    public function delete($compare,$table){
        $this->db->where($compare);
        return $this->db->delete($table);
    }

}
