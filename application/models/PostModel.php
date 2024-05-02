<?php

class PostModel extends CI_Model
{
     public function maxid()
  {
   $this->db->select_max('postId', 'max_id');
   $query = $this->db->get('mstpost');
   return $query->row_array();
  }

    ######################## post model functions ########################
    public function insert($data, $table)
    {
        if($table=='mstpost'){
            $compare=array(
                "userId"=>$data['userId'],
                "content_type"=>'feeds',
                );
        $total=$this->db->where($compare)->from("mstpost")->count_all_results();
        $totalposts=array(
            'totalPosts'=>$total
            );
            $this->updateNoOfPost($data['userId'],$totalposts);
        }
        $status = $this->db->insert($table, $data);
        return $status;
    }
    public function insertViews($data,$table){
        $this->db->where($data);
        $isAlready=$this->db->get($table)->row_array();
        if($isAlready=="" || empty($isAlready)){
             return $this->db->insert($table, $data);
        }else{
            return true ;
        }
    }
    //update total post in profile
    public function updateNoOfPost($userId,$data){
        $this->db->where("userId",$userId);
        $this->db->update("mstuser",$data);
    }
    //add post Files
    public function addpostfiles($data)
    {
      $this->db->insert_batch('trnpostfiles', $data);
    }

	//add album data
	public function addalbumfiles($data)
    {
      $this->db->insert_batch('albumimages', $data);
    }
	
    // fetch user post
    public function fetchpost($data)
     {
        $compare = array(
            "userId" => $data['userId'],
            "content_type"=>"feeds",
        );
        $user = $this->db->select('*')
            ->from('mstpost')
            ->where($compare)
            ->get()->result_array();
            $i=0;
            $returnData=array();
        foreach($user as $postdata){
            $returnData[$i]['postId']=$postdata['postId'];
            $returnData[$i]['userId']=$postdata['userId'];
            $returnData[$i]['caption']=$postdata['caption'];
            $returnData[$i]['privacy']=$postdata['privacy'];
            $returnData[$i]['content_type']=$postdata['content_type'];
            $returnData[$i]['postType']=$postdata['postType'];
            $returnData[$i]['font_color']=$postdata['font_color'];
            $returnData[$i]['font_color']=$postdata['font_color'];
            $returnData[$i]['text_back_ground']=$postdata['text_back_ground'];
            $returnData[$i]['posted_date']=$postdata['posted_date'];
            $returnData[$i]['expire_at']=$postdata['expire_at'];
            $returnData[$i]['interest']=$postdata['interest'];
            $returnData[$i]['active']=$postdata['active'];
            $returnData[$i]['profileName']=$postdata['profileName'];
            $returnData[$i]['profileImageUrl']=$postdata['profileImageUrl'];
            $returnData[$i]['location']=$postdata['location'];
            $returnData[$i]['postContentText']=$postdata['postContentText'];
            $returnData[$i]['totalLike']=$postdata['totalLike'];
            $returnData[$i]['totalComment']=$postdata['totalComment'];
			$compare=array(
                "postId"=>$postdata['postId'],
                "userId"=>$data['userId'],
                );
			if($this->alreadyExists($compare,"trnlike")==true){
				$returnData[$i]['isLiked']=true;
			}else{
					$returnData[$i]['isLiked']=false;
			}
            $returnData[$i]['postFiles']=$this->fetchPostFile($postdata['postId']);
            $i++;
            
             
        }
        return $returnData;
     }
     public function fetchPostFile($postId){
		$this->db->where("postId",$postId);
		$postFiles = $this->db->get("trnpostfiles")->result_array();
		foreach ($postFiles as &$file) {
			$file['postFileUrl'] = ($this->checkFileInLaravel($file['postFileUrl'])) ? 'https://hapiverse.com/hapiverse/public/'.$file['postFileUrl'] : site_url('public/'.$file['postFileUrl']);
		}
		return $postFiles;
     }
        // check already friend
    public function checkfollowing($compare){
        $this->db->where($compare);
        return $this->db->get("trnfollowerfollowing")->row_array();
    } 
     
     // push like 
     public function insertLike($data){
         $query=$this->db->where($data)->from("trnlike")->count_all_results();
        if($query > 0){
            $this->db->where($data);
           $result= $this->db->delete('trnlike');
            $query=$this->db->where('postId',$data['postId'])->from("trnlike")->count_all_results();
            $totalLIke=array(
                "totalLike"=>$query,
                );
            $this->db->where("postId",$data['postId']);
            $this->db->update("mstpost",$totalLIke);
            return $result;
        }else{
            $result = $this->db->insert('trnlike',$data);
            $query=$this->db->where('postId',$data['postId'])->from("trnlike")->count_all_results();
            $totalLIke=array(
                "totalLike"=>$query,
                );
            $this->db->where("postId",$data['postId']);
            $this->db->update("mstpost",$totalLIke);
            return $result;
        }
     }
       public function insertComment($data,$commentId=""){
       
            if($commentId!=""){
                $this->db->where("commentId",$commentId);
                 $result = $this->db->updateComment('trnpostcomment',$data);
            }else{
            $result = $this->db->insert('trnpostcomment',$data);
            $query=$this->db->where('postId',$data['postId'])->from("trnpostcomment")->count_all_results();
            $totalLIke=array(
                "totalComment"=>$query,
                );
            $this->db->where("postId",$data['postId']);
            $this->db->update("mstpost",$totalLIke);
           
            }
             return $result;
        
     }
     public function fetchPostFeed($compare)
	 {
		$userId = $compare['userId'];

		$this->db->where("userId", $userId);
		$interestList = $this->db->select('interestSubCategoryId')->from("mstuserinterest")->get()->result_array();
		$this->db->where('followerId', $userId);
		$followingList = $this->db->select('userId')->from("trnfollowerfollowing")->get()->result_array();
		$interestid = array();
		foreach ($interestList as $interestId) {
			$interestid[] = $interestId['interestSubCategoryId'];
		}
		$userlist = array();
		if (!empty($interestid)) {
			$userlist = $this->db->select("userId")->where_in('interestSubCategoryId', $interestid)->from('mstuserinterest')->get()->result_array();
		}
		$friendlistIds = array();
		foreach ($userlist as $friends) {
			$friendlistIds[] = $friends['userId'];
		}
		$followerIds = array();
		foreach ($followingList as $followers) {
			$followerIds[] = $followers['userId'];
		}

		$uni_friendList = array_unique($friendlistIds);

		$query = $this->db->select("*")
			->from("mstpost")
			->group_start()
				->where('privacy', 'Public')
				->or_group_start()
					->where('privacy', 'Private')
					->where('userId', $userId)
				->group_end()
			->group_end();

		if (!empty($friendlistIds)) {
			$query->where_in('userId', array_unique($friendlistIds));
		}
		

		if (!empty($followerIds)) {
			$query->or_where_in('userId', $followerIds);
		}

		$query->order_by('posted_date', 'DESC');
		$result = $query->get()->result_array();


		
		$returnData=array();
		$i=0;
        foreach($result as $postdata){
			

            // if($userId != $postdata['userId']){
            // if($postdata['privacy'] != 'Private' && in_array($postdata['userId'],$followerIds)){
				
            $userInfo = $this->fetchUserDetail($postdata['userId']);
            $returnData[$i]['postId']=$postdata['postId'];
            $returnData[$i]['userId']=$postdata['userId'];
            if($userInfo["isBusiness"]==false){
            $returnData[$i]['userName']=$userInfo['userName'];
            $returnData[$i]['profileImageUrl']=($this->checkFileInLaravel($userInfo['profileImageUrl'])) ? 'https://hapiverse.com/hapiverse/public/'.$userInfo['profileImageUrl'] : site_url('public/'.$userInfo['profileImageUrl']);
            }else{
                 $returnData[$i]['userName']=$userInfo['businessName'];
            // $returnData[$i]['profileImageUrl']=$userInfo['logoImageUrl'];
            $returnData[$i]['profileImageUrl']=($this->checkFileInLaravel($userInfo['logoImageUrl'])) ? 'https://hapiverse.com/hapiverse/public/'.$userInfo['logoImageUrl'] : site_url('public/'.$userInfo['logoImageUrl']);
            }
            if($postdata['groupId']!=""){
                // $groupInfo = $this->fetchGroupDetail($postdata['groupId']);
                // $returnData[$i]['groupId']=$postdata['groupId'];
                //  $returnData[$i]['groupName']=$groupInfo['groupName'];
                //   $returnData[$i]['groupImageUrl']=$groupInfo['groupImageUrl'];
            }else{
                 $returnData[$i]['groupId']="";
                $returnData[$i]['groupName']="";
                $returnData[$i]['groupImageUrl']="";
            }
            $returnData[$i]['caption']=$postdata['caption'];
            $returnData[$i]['privacy']=$postdata['privacy'];
            $returnData[$i]['content_type']=$postdata['content_type'];
            $returnData[$i]['postType']=$postdata['postType'];
            $returnData[$i]['font_color']=$postdata['font_color'];
            $returnData[$i]['font_color']=$postdata['font_color'];
            $returnData[$i]['text_back_ground']=$postdata['text_back_ground'];
            $returnData[$i]['posted_date']=$postdata['posted_date'];
            $returnData[$i]['expire_at']=$postdata['expire_at'];
            $returnData[$i]['interest']=$postdata['interest'];
            $returnData[$i]['active']=$postdata['active'];
            $returnData[$i]['location']=$postdata['location'];
            $returnData[$i]['postContentText']=$postdata['postContentText'];
            $returnData[$i]['totalLike']=$postdata['totalLike'];
            $returnData[$i]['totalComment']=$postdata['totalComment'];
			$compare=array(
                "followerId"=>$userId,
                );
                $followingStatus=$this->checkfollowing($compare);
                 $compare=array(
                "userId"=>$userId,
                "followerId"=>$postdata['userId']
                
                );
            $followingFollowerStatus=$this->checkfollowing($compare);
            
            if(!empty($followingFollowerStatus)){
                $returnData[$i]['IsFriend']="Friend";
            }elseif(!empty($followingStatus)){
                $returnData[$i]['IsFriend']="Following";
                }else{
                $returnData[$i]['IsFriend']="Follow";
            }
            $compare=array(
                "postId"=>$postdata['postId'],
                "userId"=>$userId,
                );
            if($this->alreadyExists($compare,"trnlike")==true){
                  $returnData[$i]['isLiked']=true;
             }else{
                  $returnData[$i]['isLiked']=false;
             }
            $returnData[$i]['postFiles']=$this->fetchPostFile($postdata['postId']);
              $i++;
		//  }
          
            
             
        }
        return $returnData;
     }

	public function checkFileInLaravel($image) {

		$laravelEndpoint = 'https://hapiverse.com/hapiverse/public/check-file';
		$filePath = $image;
		$url = $laravelEndpoint . '?file=' . urlencode($filePath);
		$response = file_get_contents($url);
		if ($response === '{"status":"exists"}') {
			return true;
		} else {
			return false;
		}
    }

     public function fetchUserDetail($userId){
         $this->db->where("userId",$userId);
         $data=$this->db->get("mstuser")->row_array();
         if(!empty($data)){
             $return=$data;
             $return['isBusiness']=false;
         }else{
             $this->db->where("businessId",$userId);
              $data=$this->db->get("mstbusiness")->row_array();
              $return=$data;
              $return['isBusiness']=true;
         }
         return $return;
     }
     // fetch group detail
      public function fetchGroupDetail($groupId=NULL){
         $this->db->where("groupId",$groupId);
         return $this->db->get("mstgroup")->row_array();
     }
     // check already 
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
    // fetch group post by id 
        public function fetchpostgroup($data)
     {
        $compare = array(
            "groupId" => $data['groupId'],
        );
        $userId=$data['userId'];
        $user = $this->db->select('*')
            ->from('mstpost')
            ->where($compare)
            ->get()->result_array();
            $i=0;
            $returnData=array();
        foreach($user as $postdata){
            $userInfo = $this->fetchUserDetail($postdata['userId']);
            $returnData[$i]['postId']=$postdata['postId'];
            $returnData[$i]['userId']=$postdata['userId'];
            $returnData[$i]['userName']=$userInfo['userName'];
            $returnData[$i]['postId']=$postdata['postId'];
            $returnData[$i]['userId']=$postdata['userId'];
            $returnData[$i]['caption']=$postdata['caption'];
            $returnData[$i]['privacy']=$postdata['privacy'];
            $returnData[$i]['content_type']=$postdata['content_type'];
            $returnData[$i]['postType']=$postdata['postType'];
            $returnData[$i]['font_color']=$postdata['font_color'];
            $returnData[$i]['font_color']=$postdata['font_color'];
            $returnData[$i]['text_back_ground']=$postdata['text_back_ground'];
            $returnData[$i]['posted_date']=$postdata['posted_date'];
            $returnData[$i]['expire_at']=$postdata['expire_at'];
            $returnData[$i]['interest']=$postdata['interest'];
            $returnData[$i]['active']=$postdata['active'];
            $returnData[$i]['profileImageUrl']=($this->checkFileInLaravel($userInfo['profileImageUrl'])) ? 'https://hapiverse.com/hapiverse/public/'.$userInfo['profileImageUrl'] : site_url('public/'.$userInfo['profileImageUrl']);
            $returnData[$i]['location']=$postdata['location'];
            $returnData[$i]['postContentText']=$postdata['postContentText'];
            $returnData[$i]['totalLike']=$postdata['totalLike'];
            $returnData[$i]['totalComment']=$postdata['totalComment'];
              $compare=array(
                "postId"=>$postdata['postId'],
                "userId"=>$userId,
                );
            if($this->alreadyExists($compare,"trnlike")==true){
                  $returnData[$i]['isLiked']=true;
             }else{
                  $returnData[$i]['isLiked']=false;
             }
            $returnData[$i]['postFiles']=$this->fetchPostFile($postdata['postId']);
            $i++;
            
             
        }
        return $returnData;
     }
      public function fetchPostStory($compare){
         $myId=$compare['userId'];
        $friend=$this->db->query("SELECT userId FROM `trnfollowerfollowing`  WHERE userId IN (SELECT userId FROM `mstpost` where content_type='story' ) AND userId IN (SELECT userId FROM `trnfollowerfollowing`  WHERE followerId='$myId' ) AND userId IN (SELECT followerId FROM `trnfollowerfollowing`  WHERE userId='$myId') ")->result_array();
        $stid=array();
        foreach($friend as $stds_id) {
        $stid[] = $stds_id['userId'];
           }
           if(!empty($stid)){
          $userList=$this->db->select("userId,profileImageUrl,userName")->from("mstuser")->where_in('userId',$stid)->get()->result_array();
          $returnData=array();
          $i=0;
        foreach($userList as $postdata){
            if($myId != $postdata['userId']){
            $returnData[$i]['userId']=$postdata['userId'];
            $returnData[$i]['userName']=$postdata['userName'];
            $returnData[$i]['profileImageUrl']=($this->checkFileInLaravel($postdata['profileImageUrl'])) ? 'https://hapiverse.com/hapiverse/public/'.$postdata['profileImageUrl'] : site_url('public/'.$postdata['profileImageUrl']);
            $returnData[$i]['storyItem']=$this->fetchstorypostforuser($postdata['userId']);
          $i++;
        }
      }
        return $returnData;
     }
     }
     function fetchstorypostforuser($userId){
         $this->db->where('userId',$userId);
         $this->db->where('content_type','story');
         $post= $this->db->get("mstpost")->result_array();
			$returnData=array();
          $i=0;
        foreach($post as $postdata){
			$userInfo = $this->fetchUserDetail($postdata['userId']);
            $returnData[$i]['postId']=$postdata['postId'];
            $returnData[$i]['userId']=$postdata['userId'];
            $returnData[$i]['caption']=$postdata['caption'];
            $returnData[$i]['privacy']=$postdata['privacy'];
            $returnData[$i]['content_type']=$postdata['content_type'];
            $returnData[$i]['postType']=$postdata['postType'];
            $returnData[$i]['font_color']=$postdata['font_color'];
            $returnData[$i]['font_color']=$postdata['font_color'];
            $returnData[$i]['text_back_ground']=$postdata['text_back_ground'];
            $returnData[$i]['posted_date']=$postdata['posted_date'];
            $returnData[$i]['expire_at']=$postdata['expire_at'];
            $returnData[$i]['interest']=$postdata['interest'];
            $returnData[$i]['active']=$postdata['active'];
            $returnData[$i]['profileName']=$postdata['profileName'];
            $returnData[$i]['profileImageUrl']=($this->checkFileInLaravel($userInfo['profileImageUrl'])) ? 'https://hapiverse.com/hapiverse/public/'.$userInfo['profileImageUrl'] : site_url('public/'.$userInfo['profileImageUrl']);
            $returnData[$i]['location']=$postdata['location'];
            $returnData[$i]['postContentText']=$postdata['postContentText'];
            $returnData[$i]['totalLike']=$postdata['totalLike'];
            $returnData[$i]['totalComment']=$postdata['totalComment'];
            $compare=array(
                "postId"=>$postdata['postId'],
                "userId"=>$userId,
                );
            if($this->alreadyExists($compare,"trnlike")==true){
                  $returnData[$i]['isLiked']=true;
             }else{
                  $returnData[$i]['isLiked']=false;
             }
            $returnData[$i]['postFiles']=$this->fetchPostFile($postdata['postId']);
            $returnData[$i]['comments']=$this->fetchpostcomment(array("postId"=>$postdata['postId']));
             $returnData[$i]['views']=$this->fetchStoryViews(array("postId"=>$postdata['postId']));
              $i++;

          
        }
          return $returnData;
     }
	 
     public function fetchStoryViews($compare){
          return  $this->db->select('t1.*, t2.userName,t2.profileImageUrl')
     ->from('trnpoststoryview as t1')
     ->where($compare)
     ->join('mstuser as t2', 't1.userId = t2.userId', 'LEFT')
     ->get()->result_array();
     }

	 public function get_user($compare){

		$this->db->where($compare); // Apply the condition
		$query = $this->db->get('mstuser'); // Use the correct table name
	
		if ($query->num_rows() > 0) {
			return true; // User exists
		} else {
			return false; // User does not exist
		}
	 }
     // fetch my story
     public function fetchStoryMy($compare){
		$this->db->where($compare);
		
		if($compare['userId']){
		   
		   $userdata=$this->db->get("mstuser")->row_array();
		   $checkpost=array(
			   "userId"=>($compare['userId']),
			   "content_type"=>"story",
		   );
		}else{
		   $checkpost=array(
			   "userId"=>($compare['businessId']),
			   "content_type"=>"story",
			   );
		   $userdata=$this->db->get("mstbusiness")->row_array();
		   
		}
		
		$returnData=array();
	   
		$isposted= $this->alreadyExists($checkpost,'mstpost');
		   
		if(!empty($userdata) && $isposted ){
		   
		   $returnData['userId']=($userdata['userId']) ? $userdata['userId'] : $userdata['businessId'];
		   $returnData['userName']=($userdata['userName']) ? $userdata['userName'] : $userdata['businessName'];
		   $returnData['profileImageUrl'] = ($userdata['profileImageUrl']) ?
		   (($this->checkFileInLaravel($userdata['profileImageUrl'])) ?
			   'https://hapiverse.com/hapiverse/public/' . $userdata['profileImageUrl'] :
			   site_url('public/' . $userdata['profileImageUrl'])) :
		   (($this->checkFileInLaravel($userdata['logoImageUrl'])) ?
			   'https://hapiverse.com/hapiverse/public/' . $userdata['logoImageUrl'] :
			   site_url('public/' . $userdata['logoImageUrl']));
	   
		   $returnData['storyItem']=$this->fetchstorypostforuser($returnData['userId']);
		}
		return $returnData;
     }
     
     public function fetchpostcomment($compare){
        $comments = $this->db
        ->select('t1.*, t2.userName, t2.profileImageUrl')
        ->from('trnpostcomment as t1')
        ->where($compare)
        ->join('mstuser as t2', 't1.userId = t2.userId', 'LEFT')
        ->get()
        ->result_array();

		// Iterate through each comment and add site URL to profileImageUrl
		foreach ($comments as &$comment) {
			$comment['profileImageUrl'] = ($this->checkFileInLaravel($comment['profileImageUrl'])) ?
			'https://hapiverse.com/hapiverse/public/' . $comment['profileImageUrl'] :
			site_url('public/' . $comment['profileImageUrl']);
		}

		return $comments;
     }
     // delte comment
     public function delete($compare,$table){
          $this->db->where($compare);
          return  $result= $this->db->delete($table);
     }
     public function update($data,$table,$compare){
         $this->db->where();
         return $this->db->update($table,$data);
     }
}
?>
