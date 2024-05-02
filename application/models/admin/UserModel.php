<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model
{

    // Get DataTable data
    function get($postData = null)
    {

        $response = array();

        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        // Custom search filter 
        //   $startDate = $postData['startDate'];
        //   $endDate= $postData['endDate'];
        //   $searchName = $postData['searchName'];

        ## Search 
        $search_arr = array();
        $searchQuery = "";
        if ($searchValue != '') {
            $search_arr[] = " (userName like '%" . $searchValue . "%' or 
                email like '%" . $searchValue . "%' or 
                country like'%" . $searchValue . "%' ) ";
        }
        //   if($searchCity != ''){
        //       $search_arr[] = " city='".$searchCity."' ";
        //   }
        //   if($searchGender != ''){
        //       $search_arr[] = " gender='".$searchGender."' ";
        //   }
        //   if($searchName != ''){
        //       $search_arr[] = " name like '%".$searchName."%' ";
        //   }
        if (count($search_arr) > 0) {
            $searchQuery = implode(" and ", $search_arr);
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $records = $this->db->get('mstuser')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $records = $this->db->get('mstuser')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('*');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('mstuser')->result();

        $data = array();

        foreach ($records as $record) {

            $data[] = array(
                "userName" => $record->userName,
                "email" => $record->email,
                "phoneNo" => $record->phoneNo,
                "country" => $record->country,
                "action" => ' <div class="dropdown">
              <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                  <i data-feather="more-vertical"></i>
              </button>
              <div class="dropdown-menu">
              <a class="dropdown-item" href="' . base_url('admin/User/profile/' . $record->userId) . '">
              <i data-feather="edit-2" class="mr-50"></i>
              <span>View</span>
          </a>
                  <a class="dropdown-item" href="' . base_url('admin/User/editUser/' . $record->userId) . '">
                      <i data-feather="edit-2" class="mr-50"></i>
                      <span>Edit</span>
                  </a>
                  <form method="post" id="' . $record->userId . '" action="' . base_url('admin/Delete/deleteBusiness') . '">
                      <input type="hidden" name="table" value="mstuser">
                      <input type="hidden" name="columnName" value="userId">
                      <input type="hidden" name="userId" value="' . $record->userId . '">
                      <input type="hidden" name="pageUrl" value="admin/General/interest">
                      <a onclick="deletedatamultiple(' . $record->userId . ')">
                          <i data-feather="trash" class="mr-50"></i>
                          <span>Delete</span>
                      </a>
                  </form>
              </div>
          </div>',
            );
        }

        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }
    public function fetchProfile($compare = null)
    {
        $compare = array(
            "t1.userId" => $compare['userId'],
            // "token" => $data['token'],
        );
        $users = $this->db->select('t1.*')
            ->from('mstuser as t1')
            ->where($compare)
            ->join('mstauthorization as t2', 't1.userId = t2.userId', 'LEFT')
            ->get()->row_array();
        $i = 0;
        $finalData = array();
        if (!empty($users)) {
            $finalData['userId'] = $users['userId'];
            $finalData['userName'] = $users['userName'];
            $finalData['email'] = $users['email'];
            $finalData['DOB'] = $users['DOB'];
            $finalData['martialStatus'] = $users['martialStatus'];
            $finalData['profileImageUrl'] = 'https://hapiverse.com/hapiverse/public'.$users['profileImageUrl'];
            $finalData['gender'] = $users['gender'];
            $finalData['city'] = $users['city'];
            $finalData['postCode'] = $users['postCode'];
            $finalData['phoneNo'] = $users['phoneNo'];
            $finalData['country'] = $users['country'];
            $finalData['lat'] = $users['lat'];
            $finalData['long'] = $users['long'];
            $finalData['address'] = $users['address'];
            $finalData['following'] = $users['following'];
            $finalData['follower'] = $users['follower'];
            $finalData['totalPosts'] = $users['totalPosts'];
            $finalData['userTypeId'] = $users['userTypeId'];
            $finalData['avatarType'] = $users['avatarType'];
            $finalData['flatColor'] = $users['flatColor'];
            $finalData['profileImageText'] = $users['profileImageText'];
            $finalData['isShuffleEnable'] = $users['isShuffleEnable'];
            $finalData['isActive'] = $users['isActive'];
            $finalData['addDate'] = $users['addDate'];
            $finalData['editDate'] = $users['editDate'];
            $finalData['imageData'] = $this->profileImageAvatar($users['userId']);
            $compare = array(
                "userId" => $users['userId'],

            );
            $followingStatus = $this->checkfollowing($compare);
            $compare = array(
                "followerId" => $users['userId']

            );
            $followingFollowerStatus = $this->checkfollowing($compare);

            if (!empty($followingFollowerStatus) && !empty($followingStatus)) {
                $finalData['IsFriend'] = "Friend";
            } elseif (!empty($followingStatus)) {
                $finalData['IsFriend'] = "Following";
            } else {
                $finalData['IsFriend'] = "Follow";
            }
        }
        return  $finalData;
    }
    public function profileImageAvatar($userId)
    {
        $this->db->where("userId", $userId);
        return $this->db->get("profileimageavatar")->row_array();
    }
    // check already friend
    public function checkfollowing($compare)
    {
        $this->db->where($compare);
        return $this->db->get("trnfollowerfollowing")->row_array();
    }
    public function fetchOrder($compare){
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
    public function fetchPosts($data)
     {
        $compare = array(
            "userId" => $data['userId'],
            // "content_type"=>"feeds",
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
            if($postdata['postType']=="image"){
            $returnData[$i]['postFiles']=$this->fetchPostFile($postdata['postId']);
        }
            $i++;
            
             
        }
        return $returnData;
     }
     public function fetchPostFile($postId){
         $this->db->where("postId",$postId);
         return $this->db->get("trnpostfiles")->result_array();
     }
}
