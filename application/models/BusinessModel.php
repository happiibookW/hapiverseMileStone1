<?php
class BusinessModel extends CI_Model
{
    // get max id of product 
     public function maxid($table,$key)
  {
   $this->db->select_max($key, 'max_id');
   $query = $this->db->get($table);
   return $query->row_array();
  }
    public function insert($data, $table)
    {
        $this->db->trans_begin();
        $status = $this->db->insert($table, $data);
        return $status;
    }
     public function insertRating($data, $table)
    {
        
        $this->db->where("userId",$data['userId']);
        $this->db->where("businessId",$data['businessId']);
        $isAlready=$this->db->get($table)->row_array();
        if($isAlready!="" || !empty($isAlready) ){
           $this->db->where("userId",$data['userId']);
        $this->db->where("businessId",$data['businessId']);
          $status = $this->db->update($table, $data);
      
        }else{
          $status=  $this->db->insert($table,$data);
        }
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
   public function addbusinesshours($data){
        
       return $this->db->insert_batch('trnbusinesshours',$data);
    }
        function fetchprofile($data)
    {
		
        $compare = array(
            "t1.businessId" => $data['userId'],
            // "token" => $data['token'],
        );
        $users = $this->db->select('t1.*')
            ->from('mstbusiness as t1')
            ->where($compare)
            ->join('mstauthorization as t2', 't1.businessId = t2.userId', 'LEFT')
            ->get()->row_array();
        $i=0;
        $finalData=array();
        if(!empty($users)){
            $finalData['businessId']=$users['businessId'];
            $finalData['businessName']=$users['businessName'];
            $finalData['email']=$users['email'];
            $finalData['ownerName']=$users['ownerName'];
            $finalData['featureImageUrl']=($this->checkFileInLaravel($users['featureImageUrl'])) ? 'https://hapiverse.com/hapiverse/public/'.$users['featureImageUrl'] : site_url('public/'.$users['featureImageUrl']);
            $finalData['logoImageUrl']=($this->checkFileInLaravel($users['logoImageUrl'])) ? 'https://hapiverse.com/hapiverse/public/'.$users['logoImageUrl'] : site_url('public/'.$users['logoImageUrl']);
            $finalData['isAlwaysOpen']=$users['isAlwaysOpen'];
            $finalData['city']=$users['city'];
            $finalData['businessContact']=$users['businessContact'];
            $finalData['country']=$users['country'];
            $finalData['latitude']=$users['latitude'];
            $finalData['longitude']=$users['longitude'];
            $finalData['address']=$users['address'];
            $finalData['totalFollowing']=$users['totalFollowing'];
            $finalData['totalFollowers']=$users['totalFollowers'];
            $finalData['totalPosts']=$users['totalPosts'];
            $finalData['categoryId']=$users['categoryId'];
            $finalData['businessType']=$users['businessType'];
            $finalData['isActive']=$users['isActive'];
            $finalData['addDate']=$users['addDate'];
            $finalData['editDate']=$users['editDate'];
            $compareForRating=array(
                "businessId"=>$users['businessId'],
                );
            $finalData['rating']=$this->countrating($compareForRating,"mstbusinessrating");
            $finalData['businessHours']=$this->businessHours($users['businessId']);
            $compare=array(
                "followerId"=>$data['myId'],
                );
                $followingStatus=$this->checkfollowing($compare);
                 $compare=array(
                "userId"=>$data['myId'],
                "followerId"=>$data['userId']
                
                );
            $followingFollowerStatus=$this->checkfollowing($compare);
            
            if(!empty($followingFollowerStatus)){
                $finalData['IsFriend']="Friend";
            }elseif(!empty($followingStatus)){
                $finalData['IsFriend']="Following";
                }else{
                $finalData['IsFriend']="Follow";
            }
        }
        return  $finalData;
    }
	public function checkFileInLaravel($image)
	{
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
    // check already friend
    public function checkfollowing($compare){
        $this->db->where($compare);
        return $this->db->get("trnfollowerfollowing")->row_array();
    } 
    public function businessHours($businessId = null)
    {   $this->db->where('businessId',$businessId);
        $data=$this->db->get('trnbusinesshours')->result_array();
        $return=array();
        $i=0;
        foreach($data as $result){
            $return[$i]['hoursId']=$result['hoursId'];
            $return[$i]['businessId']=$result['businessId'];
            $return[$i]['day']=$result['day'];
            $return[$i]['openTime']=date("g:i A", strtotime($result['openTime']));
            $return[$i]['closeTime']=date("g:i A", strtotime($result['closeTime']));
            $i++;
        }
        return $return ;
    }
    // search business 
    public function searchBusinessProfile($data){
        $lat = $data['latitude'];
        $long = $data['longitude'];
        $distance=$data['distance'];
        $keyWord=$data['keyWord'];
        $timeStamp=date("H:i:s");
        if($lat!="" && $long!=""){
		$businesslist = $this->db->query("SELECT *, (ACOS( COS( RADIANS( $lat  ) ) 
						  * COS( RADIANS( m.latitude ) )
						  * COS( RADIANS( m.longitude ) - RADIANS( $long ) )
						  + SIN( RADIANS( $lat  ) )
						  * SIN( RADIANS( m.latitude ) )
					  )
					* 6371
					) AS distance

			  FROM mstbusiness m where m.businessName LIKE'%$keyWord%'  
			  	having distance <= '$distance'
			 ORDER BY distance;")->result_array();
        }else{
            $businesslist=$this->db->query("SELECT * from mstbusiness where businessName LIKE '%$keyWord%'")->result_array();
        }
			 return $businesslist;
    }
    public function updatebusiness($data,$table){
        $this->db->where('buisnessId',$data['businessId']);
        return $this->db->update($table,$data);
    }
    // product functions
     public function insertproduct($data, $table)
    {
        $status = $this->db->insert($table, $data);
        return $status;
    }
      public function insertAdsData($data, $table)
    {
        $status = $this->db->insert($table, $data);
        return $status;
    }
       public function insertcollection($data, $table,$productList="",$oldProductList="")
    {
        $status = $this->db->insert($table, $data);
        $collectionId = $this->db->insert_id();
        if($productList!=""){
        $productIds=explode(',',$productList);
        foreach($productIds as $row)
        { 
          $updateData=array(
              "collectionId"=>$collectionId
              );
          $this->db->where("productId",$row);
          $this->db->update("businessproduct",$updateData);
          
        }
        }
         if($oldProductList!=""){
        $productIds=explode(',',$oldProductList);
        foreach($productIds as $row)
        { 
          $updateData=array(
              "collectionId"=>NULL
              );
          $this->db->where("productId",$row);
          $this->db->update("businessproduct",$updateData);
          
        }
        }
           return $status;
    }
    
    public function businessProductImage($data){
        return $this->db->insert('businessproductimages',$data);
    }
    public function fetchcollection($compare){
        $this->db->where($compare);
        $result=$this->db->get("productcollection")->result_array();
        $i=0;
        $return=array();
        foreach($result as $row){
            $return[$i]['collectionId']=$row['collectionId'];
            $return[$i]['businessId']=$row['businessId'];
            $return[$i]['collectionName']=$row['collectionName'];
            $return[$i]['addDate']=$row['addDate'];
            $compare1=array(
                "collectionId"=>$row['collectionId'],
                );
            $return[$i]['products']=$this->fetchProduct($compare1);
            $i++;
        }
            
       // $return['otherCollection']=$this->fetchProduct($compare1);
        return $return;
    }
    public function fetchProduct($compare){
        $this->db->where($compare);
        $result =$this->db->get("businessproduct")->result_array();
          $i=0;
        $return=array();
        foreach($result as $row){
            $return[$i]['collectionId']=$row['collectionId'];
            $return[$i]['businessId']=$row['businessId'];
            $return[$i]['productId']=$row['productId'];
            $return[$i]['productName']=$row['productName'];
            $return[$i]['productPrice']=$row['productPrice'];
            $return[$i]['discouintedPrice']=$row['discouintedPrice'];
            $return[$i]['isDiscountActive']=$row['isDiscountActive'];
            $return[$i]['productdescription']=$row['productdescription'];
            $return[$i]['addDate']=$row['addDate'];
            $compare1=array(
                "productId"=>$row['productId'],
                );
            $return[$i]['Images']=$this->fetchproductImage($compare1);
            $i++;
        }
        return $return;
    }
        // discounted product 
    public function fetchDiscountedProduct($compare){
        $this->db->where($compare);
        $this->db->where('discouintedPrice!=','0.00');
        $result =$this->db->get("businessproduct")->result_array();
          $i=0;
        $return=array();
        foreach($result as $row){
            $return[$i]['collectionId']=$row['collectionId'];
            $return[$i]['businessId']=$row['businessId'];
            $return[$i]['productId']=$row['productId'];
            $return[$i]['productName']=$row['productName'];
            $return[$i]['productPrice']=$row['productPrice'];
            $return[$i]['discouintedPrice']=$row['discouintedPrice'];
            $return[$i]['isDiscountActive']=$row['isDiscountActive'];
            $return[$i]['productdescription']=$row['productdescription'];
            $return[$i]['addDate']=$row['addDate'];
            $compare1=array(
                "productId"=>$row['productId'],
                );
            $return[$i]['Images']=$this->fetchproductImage($compare1);
            $i++;
        }
        return $return;
    }
    public function fetchproductImage($compare){
        $this->db->where($compare);
        return $this->db->get('businessproductimages')->result_array();
    }
    public function updatePrdoductData($data,$table,$compare){
        $this->db->where($compare);
        return $this->db->update($table,$data);
    }
    ########################Event Function ###########################
      public function insertEvent($data, $table)
    {
        $status = $this->db->insert($table, $data);
        return $status;
    }
      public function eventImage($data){
        return $this->db->insert('eventimages',$data);
    }
    public function fetchEvent($compare){
            $this->db->where($compare);
        $result=$this->db->get("mstevent")->result_array();
        $i=0;
        $return=array();
        foreach($result as $row){
            $return[$i]['eventId']=$row['eventId'];
            $return[$i]['businessId']=$row['businessId'];
            $return[$i]['eventName']=$row['eventName'];
            $return[$i]['eventDescription']=$row['eventDescription'];
            $return[$i]['eventTime']=$row['eventTime'];
            $return[$i]['eventDate']=$row['eventDate'];
            $return[$i]['latitude']=$row['latitude'];
            $return[$i]['longitude']=$row['longitude'];
            $return[$i]['address']=$row['address'];
            $return[$i]['addDate']=$row['addDate'];
            $compare1=array(
                "eventId"=>$row['eventId'],
                );
            $return[$i]['images']=$this->fetchEventImages($compare1);
            $i++;
        }
        return $return;
    }
    public function fetchEventImages($compare){
        $this->db->where($compare);
        return $this->db->get('eventimages')->result_array();
    }
    public function deleteData($compare,$table){
        $this->db->where($compare);
        return $this->db->delete($table);
    }
    public function editEvent($data,$table,$compare){
        $this->db->where($compare);
        return $this->db->update($table,$data);
    }
       public function countrating($compare,$table){
       $data['totalRating']=$this->db->where($compare)->from($table)->count_all_results();
       $data['averageRating']=0;
	   if($data['totalRating']>0){
	    $this->db->select_sum('rating');
    	$this->db->from($table);
    	$this->db->where($compare);
    	$query = $this->db->get();
   		$get=$query->row()->rating;
		$data['averageRating']=$get/$data['totalRating'];
	   }
	   return $data;
   }
    public function fetchAllREviews($compare,$table){

		$this->db->select('t1.*, t2.businessName AS userName, t2.logoImageUrl AS profileImageUrl')
		->from($table . ' as t1')
		->join('mstbusiness as t2', 't1.businessId = t2.businessId', 'LEFT')
		->join('profileimageavatar as t3', 't1.businessId = t3.userId', 'LEFT');

		if (isset($compare['businessId'])) {
			$this->db->where('t1.businessId', $compare['businessId']);
		}
		
		$results  = $this->db->get()->result_array();

		foreach ($results as &$result) {
			$result['profileImageUrl'] = ($this->checkFileInLaravel($result['profileImageUrl'])) ? 'https://hapiverse.com/hapiverse/public/'.$result['profileImageUrl'] : site_url('public/'.$result['profileImageUrl']);
		}
		return $results;
  }
  public function fetchReviewRating($compare,$table){
      $return = array();
          $reviewData=$this->countrating($compare,$table);
          if(!empty($reviewData)){
	        $return['avergeRating'] = $reviewData['averageRating'];
            $return['totalRating'] = $reviewData['totalRating']; 
          }
            $return['reviews'] = $this->fetchAllREviews($compare,$table);
            return $return;
  }
    public function fetchSingleREviews($compare,$table){
     $this->db->where($compare);
	 return $this->db->get($table)->row_array();
  }
  
  /// fetch data against
       public function fetchOrder($compare,$table){
              $finalData=array();
         $products=  $this->db->select('t1.*,t2.productName,t2.productPrice,t2.productdescription,t3.businessName')
            ->from('businessOrders as t1')
            ->where($compare)
             ->join('businessproduct as t2', 't1.productId = t2.productId', 'LEFT')
             ->join('mstbusiness as t3', 't1.businessId = t3.businessId', 'LEFT')
             ->join('mstuser as t4', 't1.userId = t4.userId', 'LEFT')
            ->get()->result_array();
            $i=0;
            foreach($products as $list){
                 $finalData[$i]['orderId']=$list['orderId'];
            $finalData[$i]['orderNo']=$list['orderNo'];
            $finalData[$i]['productId']=$list['productId'];
            $finalData[$i]['businessId']=$list['businessId'];
            $finalData[$i]['userName']='Ameer';
            $finalData[$i]['userProfileUrl']='photo';
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
    public function update($data,$table,$compare){
        $this->db->where($compare);
        return $this->db->update($table,$data);
    }
    public function insertAd($data,$table){
        
        return $this->db->insert($table,$data);
    }
}
