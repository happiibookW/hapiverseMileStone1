<?php

class UserModel extends CI_Model
{

    ######################## user model functions ########################
    public function insert($data, $table)
    {
        $this->db->trans_begin();
        $status = $this->db->insert($table, $data);
        return $status;
    }
    public function insertAuth($data)
    {
        $this->db->where("email",$data['email']);
        $this->db->update("mstauthorization", $data);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }
    }
     public function insertInterest($data, $table)
    {
        
        $status = $this->db->insert_batch($table, $data);
        return $status;
    }
    // fetch frnds 
    public function fetchfriend($data){
        $myId=$data['userId'];
        $friend=$this->db->query("SELECT userId FROM `trnfollowerfollowing`  WHERE userId IN (SELECT userId FROM `trnfollowerfollowing`  WHERE followerId='$myId' ) AND userId IN (SELECT followerId FROM `trnfollowerfollowing`  WHERE userId='$myId') ")->result_array();
        $stid=array();
        foreach($friend as $stds_id) {
        	$stid[] = $stds_id['userId'];
		}
		if(!empty($stid)){
			$userlist =  $this->db->select("userId,profileImageUrl,userName")->from("mstuser")->where_in('userId',$stid)->get()->result_array();

		 foreach ($userlist as &$user) {
			$user['profileImageUrl'] = $this->getProfileImageUrl($user['profileImageUrl']);
		}
		return $userlist;
		}
    }
	
    // fetch friends for group invitation 
    public function fetchfriendgroup($data){
        $myId=$data['userId'];
        $friend=$this->db->query("SELECT userId FROM `trnfollowerfollowing`  WHERE userId IN (SELECT userId FROM `trnfollowerfollowing`  WHERE followerId='$myId' ) AND userId IN (SELECT followerId FROM `trnfollowerfollowing`  WHERE userId='$myId') ")->result_array();
          foreach($friend as $stds_id) {
        $stid[] = $stds_id['userId'];
           }
            if(!empty($stid)){
         $returndata= $this->db->select("userId,profileImageUrl,userName")->from("mstuser")->where_in('userId',$stid)->get()->result_array();
         $i=0;
         $groupInvites=array();
         foreach($returndata as $frndList){
             
             $groupInvites[$i]['userId']=$frndList['userId'];
             $groupInvites[$i]['profileImageUrl']=$frndList['profileImageUrl'];
             $groupInvites[$i]['userName']=$frndList['userName'];
             $compare=array(
                 'userId'=>$frndList['userId'],
                 'groupId'=>$data['groupId'],
                 );
             if($this->alreadyExists($compare,"trngroupinvitation")==true){
             $groupInvites[$i]['alreadyInvited']=true;
             }else{
                 $groupInvites[$i]['alreadyInvited']=false;
             }
              $i++;
             }
            
             return $groupInvites;
            }
         }
        
    // fetch user profile
    function fetchprofile($data)
    {
		
        $compare = array(
            "t1.userId" => $data['userId'],
            // "token" => $data['token'],
        );
        $users = $this->db->select('t1.*')
            ->from('mstuser as t1')
            ->where($compare)
            ->join('mstauthorization as t2', 't1.userId = t2.userId', 'LEFT')
			->join('occupation as t3', 't1.userId = t3.userId', 'LEFT')
            ->get()->row_array();
        $i=0;
        $finalData=array();
		$finalData['is_profile_complete'] = false;
        if(!empty($users)){
            $finalData['userId']=$users['userId'];
            $finalData['userName']=$users['userName'];
            $finalData['email']=$users['email'];
            $finalData['DOB']=$users['DOB'];
            $finalData['martialStatus']=$users['martialStatus'];
            $finalData['profileImageUrl']= ($this->checkFileInLaravel($users['profileImageUrl'])) ? 'https://hapiverse.com/hapiverse/public/'.$users['profileImageUrl'] : site_url('public/'.$users['profileImageUrl']);
            $finalData['gender']=$users['gender'];
            $finalData['city']=$users['city'];
            $finalData['state']=$users['state'];
            $finalData['postCode']=$users['postCode'];
            $finalData['phoneNo']=$users['phoneNo'];
            $finalData['country']=$users['country'];
            $finalData['lat']=$users['lat'];
            $finalData['long']=$users['long'];
            $finalData['address']=$users['address'];
            $finalData['following']=$users['following'];
            $finalData['follower']=$users['follower'];
            $finalData['totalPosts']=$users['totalPosts'];
            $finalData['userTypeId']=$users['userTypeId'];
            $finalData['avatarType']=$users['avatarType'];
            $finalData['flatColor']=$users['flatColor'];
            $finalData['firstgredientcolor']=$users['firstgredientcolor'];
            $finalData['secondgredientcolor']=$users['secondgredientcolor'];
            $finalData['profileImageText']=$users['profileImageText'];
            $finalData['isShuffleEnable']=$users['isShuffleEnable'];
            $finalData['isActive']=$users['isActive'];
            $finalData['addDate']=$users['addDate'];
            $finalData['editDate']=$users['editDate'];
            $finalData['height']=$users['height'];
            $finalData['weight']=$users['weight'];
            $finalData['religion']=$users['religion'];
            $finalData['imageData']=$this->profileImageAvatar($users['userId']);
            $compare=array(
                 "userId"=>$data['userId'],
                "followerId"=>$data['myId'],
                );
                $followingStatus=$this->checkfollowing($compare);
                 $compare=array(
                "userId"=>$data['myId'],
                "followerId"=>$data['userId']
                
                );
            $followingFollowerStatus=$this->checkfollowing($compare);
            
            if(!empty($followingFollowerStatus) && !empty($followingStatus)){
                $finalData['IsFriend']="Friend";
            }elseif(!empty($followingStatus)){
                $finalData['IsFriend']="Following";
                }else{
                $finalData['IsFriend']="Follow";
            }

			$get_occupation = $this->get_occupation($users['userId']);
			$finalData['occupation'] = ($get_occupation) ? $get_occupation: [];//

			$get_education = $this->get_education($users['userId']);
			$finalData['education'] = ($get_education) ? $get_education : [];//

			// Set profile status complete/incomplete
			if( ($users['userName']) && ($users['martialStatus']) && ($users['profileImageUrl']) && ($users['gender']) && ($users['city']) && ($users['phoneNo']) && ($users['country']) && ($users['height']) && count($finalData['occupation']) > 0 && count($finalData['education']) > 0 ){
				$finalData['is_profile_complete'] = true;
			}
        }
        return  $finalData;
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

    public function profileImageAvatar($userId){
        $this->db->where("userId",$userId);
        return $this->db->get("profileimageavatar")->row_array();
    }
    // check already friend
    public function checkfollowing($compare){
        $this->db->where($compare);
        return $this->db->get("trnfollowerfollowing")->row_array();
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
    // update function of user model
    public function update($data, $compare, $table)
    {
        $this->db->where($compare);
        return $this->db->update($table, $data);
    }
    public function followerFollowingAdd($data,$table){
        $this->db->where($data);
        $isAlreadyFollow=$this->db->get($table)->row_array();
        if(!empty($isAlreadyFollow)){
           $this->db->where($data);
          $return= $this->db->delete($table);
               $totalfollowing['following']=$this->db->where('followerId',$data['followerId'])->from($table)->count_all_results();
        
        $totalfollower['follower']=$this->db->where('userId',$data['userId'])->from($table)->count_all_results();
          $this->db->where('userId',$data['followerId']);
           $this->db->update("mstuser",$totalfollowing);
           $this->db->where('userId',$data['userId']);
           $this->db->update("mstuser",$totalfollower);
        }else{
             $return= $this->db->insert($table,$data);
        $totalfollowing['following']=$this->db->where('followerId',$data['followerId'])->from($table)->count_all_results();
        
        $totalfollower['follower']=$this->db->where('userId',$data['userId'])->from($table)->count_all_results();
        $this->db->where('userId',$data['followerId']);
        $this->db->update("mstuser",$totalfollowing);
        $this->db->where('userId',$data['userId']);
        $this->db->update("mstuser",$totalfollower);
        }
        return $return;
    }
    public function search($keyword,$userId){
         $this->db->like("interestSubCategoryTitle",$keyword);
         $interestList=$this->db->select('interestSubCategoryId')->from("mstintrestsubcategory")->get()->result_array();
         $this->db->where_in($interestList);
         $userlist=$this->db->select("userId")->from('mstuserinterest')->get()->result_array();
        $this->db->like("userName",$keyword);
        $checkuserarray=$this->db->select("*")->from('mstuser')->get()->result_array();
        if(!empty($checkuserarray)){ 
            $this->db->like("userName",$keyword);
        }
        $query=$this->db->select("*")->from('mstuser')->where_in($userlist)->get()->result_array();
         $i=0;
        $finalData=array();
        foreach($query as $users){
            if($userId !=$users['userId']){
            $finalData[$i]['userId']=$users['userId'];
            $finalData[$i]['userName']=$users['userName'];
            $finalData[$i]['email']=$users['email'];
            $finalData[$i]['DOB']=$users['DOB'];
            $finalData[$i]['martialStatus']=$users['martialStatus'];
            $finalData[$i]['profileImageUrl']=$users['profileImageUrl'];
            $finalData[$i]['gender']=$users['gender'];
            $finalData[$i]['city']=$users['city'];
            $finalData[$i]['postCode']=$users['postCode'];
            $finalData[$i]['phoneNo']=$users['phoneNo'];
            $finalData[$i]['country']=$users['country'];
            $finalData[$i]['lat']=$users['lat'];
            $finalData[$i]['long']=$users['long'];
            $finalData[$i]['address']=$users['address'];
            $finalData[$i]['following']=$users['following'];
            $finalData[$i]['follower']=$users['follower'];
            $finalData[$i]['totalPosts']=$users['totalPosts'];
            $finalData[$i]['userTypeId']=$users['userTypeId'];
            $finalData[$i]['isActive']=$users['isActive'];
            $finalData[$i]['addDate']=$users['addDate'];
            $finalData[$i]['editDate']=$users['editDate'];
            $compare=array(
                "followerId"=>$userId,
                );
                $followingStatus=$this->checkfollowing($compare);
                 $compare=array(
                "userId"=>$userId,
                "followerId"=>$users['userId']
                
                );
            $followingFollowerStatus=$this->checkfollowing($compare);
            
            if(!empty($followingFollowerStatus)){
                $finalData[$i]['IsFriend']="Friend";
            }elseif(!empty($followingStatus)){
                $finalData[$i]['IsFriend']="Following";
                }else{
                $finalData[$i]['IsFriend']="Follow";
            }
            $i++;
         }
            
        }
        return  $finalData;
    }
    public function updateProfile($data,$table){
        return $this->db->insert($table,$data);
    }
    public function addEmail($data,$table){
        $this->db->where("email",$data['email']);
        $res=$this->db->get($table)->row_array();
        if(!empty($res)){
            $this->db->where("email",$data['email']);
            $status = $this->db->update($table,$data);
        }else{
           $status= $this->db->insert($table,$data);
         }
        return $status;
    }
    public function fetchplan($compare){
         $this->db->where($compare);
         return $this->db->get("plans")->result_array();
        
    }
     public function insertPlan($data, $table)
    {   $compare=array(
        "email"=>$email
    
         );
        $this->db->where($compare);
        $isAlready=$this->db->get($table)->row_array();
        if($isAlready != "" && !empty($isAlready)){
             $status = $this->db->update($table, $data);
        }else{
        $status = $this->db->insert($table, $data);
        }
        return $status;
    }
    public function fetch($compare,$table){
        $this->db->where($compare);
        return $this->db->get($table)->row_array();
    }
    public function fetchIntrest($compare){
		
           $users = $this->db->select('t1.*,t2.*')
            ->from('mstuserinterest as t1')
            ->where($compare)
            ->join('mstintrestsubcategory as t2', 't1.interestSubCategoryId = t2.interestSubCategoryId', 'LEFT')
            ->get()->result_array();
			return $users;
    }
    public function fetchSuggestedFriend($compare){
	
		$userId=$compare["userId"];
		$lat=$compare["latitude"];
		$long=$compare["longitude"];
		$this->db->where("userId",$userId);
		$interestList=$this->db->select('interestSubCategoryId')->from("mstuserinterest")->get()->result_array();
		$interestid=array();
        foreach($interestList as $interestId) {
        	$interestid[] = $interestId['interestSubCategoryId'];
		}
           
		$userlist=array();
		if(!empty($interestid)){
         	$userlist=$this->db->select("userId")->where_in($interestid)->from('mstuserinterest')->get()->result_array();
		}
		$friendlistIds=array();
        foreach($userlist as $friends) {
        	$friendlistIds[] = $friends['userId'];
		}

		$friends = $this->db->select('followerId')->from("trnfollowerfollowing")->where("userId",$userId)->get()->result_array();
		$friendIdList = implode(',', array_map(function($friend) {
			return $this->db->escape($friend['followerId']);
		}, $friends));
		
		$get_user = $this->db->select('*')
			->from('mstuser')
			->where('userId', $userId)
			->get()->result_array();

		if (!empty($get_user)) {
			$userlist = $this->db->query("SELECT userId, userName, profileImageUrl, (ACOS( COS( RADIANS( $lat  ) ) 
				* COS( RADIANS( m.lat ) )
				* COS( RADIANS( m.long ) - RADIANS( $long ) )
				+ SIN( RADIANS( $lat  ) )
				* SIN( RADIANS( m.lat ) )
				)
				* 6371
				) AS distance
				FROM mstuser AS m WHERE userId != '$userId' " . 
				(!empty($friendIdList) ? "AND userId NOT IN ($friendIdList)" : "") . "
				HAVING distance <= 10000
				ORDER BY distance LIMIT 10;"
			)->result_array();
		} else {
			$queryCondition = (!empty($friendIdList) ? "AND businessId NOT IN ($friendIdList)" : "");
			$userlist = $this->db->query("SELECT businessId AS userId, businessName AS userName, logoImageUrl AS profileImageUrl, (ACOS( COS( RADIANS( $lat  ) ) 
				* COS( RADIANS( m.latitude ) )
				* COS( RADIANS( m.longitude ) - RADIANS( $long ) )
				+ SIN( RADIANS( $lat  ) )
				* SIN( RADIANS( m.latitude ) )
				)
				* 6371
				) AS distance
				FROM mstbusiness AS m WHERE businessId != '$userId' $queryCondition
				HAVING distance <= 10000
				ORDER BY distance LIMIT 10;"
			)->result_array();
		}

		foreach ($userlist as &$user) {
			$user['profileImageUrl'] = $this->getProfileImageUrl($user['profileImageUrl']);
		}
		return $userlist;
    }

	public function getProfileImageUrl($imageUrl)
	{
		return ($this->checkFileInLaravel($imageUrl)) ? 'https://hapiverse.com/hapiverse/public/' . $imageUrl : site_url('public/' . $imageUrl);
	}
    public function insertOrder($data,$table){
        return $this->db->insert($table,$data);
    }
    public function fetchOrder($compare,$table){
        $finalData=array();
         $products=  $this->db->select('t1.*,t2.productName,t2.productPrice,t2.productdescription,t3.businessName')
            ->from('businessOrders as t1')
            ->where($compare)
            ->join('businessproduct as t2', 't1.productId = t2.productId', 'LEFT')
             ->join('mstbusiness as t3', 't1.businessId = t3.businessId', 'LEFT')
            ->get()->result_array();
            $i=0;
            foreach($products as $list){
                 $finalData[$i]['orderId']=$list['orderId'];
            $finalData[$i]['orderNo']=$list['orderNo'];
            $finalData[$i]['productId']=$list['productId'];
            $finalData[$i]['businessId']=$list['businessId'];
            $finalData[$i]['userId']=$list['userId'];
            $finalData[$i]['orderCost']=$list['orderCost'];
            $finalData[$i]['shippingCost']=$list['shippingCost'];
            $finalData[$i]['shippingAddress']=$list['shippingAddress'];
            $finalData[$i]['totalAmount']=$list['totalAmount'];
            $finalData[$i]['orderStatus']=$list['orderStatus'];
            $finalData[$i]['activeDate']=$list['activeDate'];
            $finalData[$i]['shippingDate']=$list['shippingDate'];
            $finalData[$i]['deleiveredDate']=$list['deleiveredDate'];
            $finalData[$i]['shippingBy']=$list['shippingBy'];
            $finalData[$i]['businessName']=$list['businessName'];
            $finalData[$i]['addDate']=$list['addDate'];
            $finalData[$i]['productName']=$list['productName'];
            $finalData[$i]['productPrice']=$list['productPrice'];
            $finalData[$i]['productdescription']=$list['productdescription'];
            $finalData[$i]['images']=$this->fetchImages($list['productId']);
            $i++;
            }
            return $finalData;
            
    }
    public function fetchImages($productId){
        $this->db->where("productId",$productId);
        return $this->db->get("businessproductimages")->result_array();
    }
    public function getUserId($email){
        $this->db->where("email",$email);
        return $this->db->get("mstauthorization")->row_array();
    }
     public function fetchmyplan($compare){
         return  $this->db->select('t1.*,t2.planName,t2.planType')
            ->from('choosedplan as t1')
            ->where($compare)
            ->join('plans as t2', 't1.planId = t2.planId', 'LEFT')
            ->get()->row_array();
    }
    public function fetchPhoto($compare){
        $this->db->where($compare);
        return $this->db->get("trnpostfiles")->result_array();
    }
    public function get(){
           ## Fetch records
        $this->db->select('*');
        // if ($searchQuery != '')
        //     $this->db->where($searchQuery);
        // $this->db->order_by($columnName, $columnSortOrder);
        // $this->db->limit($rowperpage, $start);
        $records = $this->db->get('mstuser')->result();

        $data = array();

        foreach ($records as $record) {

            $data[] = array(
                "title" => $record->userName,
                "thumb" => base_url($record->profileImageUrl),
                "text" => $record->country,
                "url" => "Home/profile/".$record->userId,
                );
        }
        return $data;
    }

	public function get_occupation($user_id){
		$this->db->where("userId",$user_id);
        return $this->db->get("occupation")->result_array();
	}
	public function get_education($user_id){
		$this->db->where("userId",$user_id);
        return $this->db->get("education")->result_array();
	}
}
