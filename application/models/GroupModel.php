<?php

class GroupModel extends CI_Model
{

    ######################## group model functions ########################
    public function groupcreate($data, $table)
    {
        $status = $this->db->insert($table, $data);
        $groupId=$this->db->insert_id();
        $memberData=array(
            
        "groupMemberId"=>$data['groupAdminId'],
        "groupId"=>$groupId,
        "memberRole"=>"Admin",
        "memberStatus"=>1,
        );
        $this->db->insert("trngroupmember",$memberData);
        return $status;
    }
    // function add member 
    public function memeberAdd($data, $table){
        return $this->db->insert($table,$data);
    } 
    
    // fetch user group
    public function fetchgroup($data)
     {   
        $groupArray=array(); 
        $groupData=$this->db->select('t1.*')
     ->from('trngroupmember  as t1')
     ->where('t1.groupMemberId', $data['userId'])
    //  ->join('trngroupmember as t2', 't1.groupId = t2.groupId', 'LEFT')
     ->get()->result_array();
       $i=0;
        foreach($groupData as $group){
            $groupArray[$i]['memberRole']=$group['memberRole'];
            $groupArray[$i]['groupId']=$group['groupId'];
            $groupArray[$i]['groupMemberId']=$group['groupMemberId'];
            $groupdetail=$this->fetchgroupbyId($group['groupId']);
            $groupArray[$i]['groupAdminId']=$groupdetail['groupAdminId'];
            $groupArray[$i]['groupName']=$groupdetail['groupName'];
            $groupArray[$i]['groupImageUrl']=$groupdetail['groupImageUrl'];
            $groupArray[$i]['groupDescription']=$groupdetail['groupDescription'];
            $groupArray[$i]['groupPrivacy']=$groupdetail['groupPrivacy'];
            $compare=array(
                "groupId"=>$group['groupId'],
                );
            $groupArray[$i]['totalMemeber']=$this->totalCount($compare,"trngroupmember");
            $groupArray[$i]['addDate']=$groupdetail['addDate'];
            $groupArray[$i]['editDate']=$groupdetail['editDate'];
            $i++;
        }
        return $groupArray;
     }
     // fetch group 
     public function fetchgroupbyId($groupId){
         $groupArray=array();
         $this->db->where("groupId",$groupId);
         $groupdetail= $this->db->get("mstgroup")->row_array();
         if(!empty($groupdetail)){
            $groupArray['groupId']=$groupdetail['groupId'];
            $groupArray['groupAdminId']=$groupdetail['groupAdminId'];
            $groupArray['groupName']=$groupdetail['groupName'];
            $groupArray['groupImageUrl']=$groupdetail['groupImageUrl'];
            $groupArray['groupDescription']=$groupdetail['groupDescription'];
            $groupArray['groupPrivacy']=$groupdetail['groupPrivacy'];
            $compare=array(
                "groupId"=>$groupdetail['groupId'],
                );
            $groupArray['totalMemeber']=$this->totalCount($compare,"trngroupmember");
            $groupArray['addDate']=$groupdetail['addDate'];
            $groupArray['editDate']=$groupdetail['editDate'];
         }
         return $groupArray;
     }
     // add group invite
    public function addInvite($data,$table){
        return $this->db->insert($table,$data);
    }
    
    function alreadyExists($data, $table)
    {
        $this->db->where($data);
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    // leave group
    public function leave($compare,$table){
        $this->db->where($compare);
        return $this->db->delete($table);
    }
    public function groupdelete($compare,$table){
          $this->db->where($compare);
        return $this->db->delete($table);
    }
    // fetch invitation 
    public function fetchgroupinvite($compare){
        $groupData=$this->db->select('t1.*, t2.username,t2.profileImageUrl')
     ->from('trngroupinvitation as t1')
     ->where('t1.userId', $compare['userId'])
     ->join('mstuser as t2', 't1.inviterId = t2.userId', 'LEFT')
     ->get()->result_array();
        return $groupData;
    }
    public function fetchmember($compare){
      
         return  $groupData=$this->db->select('t1.*,t2.userName,t2.profileImageUrl')
     ->from('trngroupmember  as t1')
     ->where($compare)
      ->join('mstuser as t2', 't1.groupMemberId = t2.userId', 'LEFT')
     ->get()->result_array();
    }
    public function findgroup($data){
        $userId=$data['userId'];
        $this->db->where("groupAdminId!=",$userId);
        if($data['keyword']!=""){
        $this->db->like('groupName', $data['keyword']);
        }
        $res = $this->db->get('mstgroup')->result_array();
        $i=0;
        $return=array();
        foreach($res as $group){
              $compare=array(
                "groupMemberId"=>$data['userId'],
                "groupId"=>$group['groupId'],
                );
        $isAlready=$this->alreadyExists($compare, "trngroupmember");
        if($isAlready==false){
            $return[$i]['groupId']=$group['groupId'];
            $return[$i]['groupAdminId']=$group['groupAdminId'];
            $return[$i]['groupName']=$group['groupName'];
            $return[$i]['groupImageUrl']=$group['groupImageUrl'];
            $return[$i]['groupDescription']=$group['groupDescription'];
            $return[$i]['groupPrivacy']=$group['groupPrivacy'];
            $return[$i]['addDate']=$group['addDate'];
            $return[$i]['totalMemeber']=$this->totalCount(array("groupId"=>$group['groupId']),"trngroupmember");
            $i++;
        }
        }
        return $return;
    }
    public function totalCount($compare,$table){
        return $this->db->where($compare)->from($table)->count_all_results();
    }
}
?>