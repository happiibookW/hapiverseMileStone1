<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class BusinessModel extends CI_Model
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
            $search_arr[] = " (businessName like '%" . $searchValue . "%' or 
                email like '%" . $searchValue . "%' or 
                ownerName like '%" . $searchValue . "%' or 
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
        $records = $this->db->get('mstbusiness')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $records = $this->db->get('mstbusiness')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('*');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('mstbusiness')->result();

        $data = array();

        foreach ($records as $record) {

            $data[] = array(
                "businessName" => $record->businessName,
                "ownerName" => $record->ownerName,
                "email" => $record->email,
                "vatNumber" => $record->vatNumber,
                "country" => $record->country,
                "action" => ' <div class="dropdown">
              <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                  <i data-feather="more-vertical"></i>
              </button>
              <div class="dropdown-menu">
              <a class="dropdown-item" href="' . base_url('admin/Business/detail/' . $record->businessId) . '">
              <i data-feather="edit-2" class="mr-50"></i>
              <span>View</span>
          </a>
                  <a class="dropdown-item" href="' . base_url('admin/Business/editBusiness/' . $record->businessId) . '">
                      <i data-feather="edit-2" class="mr-50"></i>
                      <span>Edit</span>
                  </a>
                  <form method="post" id="' . $record->businessId . '" action="' . base_url('admin/Delete/deleteBusiness') . '">
                      <input type="hidden" name="table" value="mstbusiness">
                      <input type="hidden" name="columnName" value="businessId">
                      <input type="hidden" name="userId" value="' . $record->businessId . '">
                      <input type="hidden" name="pageUrl" value="admin/General/interest">
                      <a onclick="deletedatamultiple(' . $record->businessId . ')">
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
    public function BusinessDetail($compare = null)
    {
        $compare = array(
            "t1.businessId" => $compare['businessId'],
            // "token" => $data['token'],
        );
        $users = $this->db->select('t1.*')
            ->from('mstbusiness as t1')
            ->where($compare)
            ->join('mstauthorization as t2', 't1.businessId = t2.userId', 'LEFT')
            ->get()->row_array();
        $i = 0;
        $finalData = array();
        if (!empty($users)) {
            $finalData['businessId'] = $users['businessId'];
            $finalData['businessName'] = $users['businessName'];
            $finalData['email'] = $users['email'];
            $finalData['ownerName'] = $users['ownerName'];
            $finalData['featureImageUrl'] = $users['featureImageUrl'];
            $finalData['logoImageUrl'] = $users['logoImageUrl'];
            $finalData['isAlwaysOpen'] = $users['isAlwaysOpen'];
            $finalData['city'] = $users['city'];
            $finalData['businessContact'] = $users['businessContact'];
            $finalData['country'] = $users['country'];
            $finalData['latitude'] = $users['latitude'];
            $finalData['longitude'] = $users['longitude'];
            $finalData['address'] = $users['address'];
            $finalData['totalFollowing'] = $users['totalFollowing'];
            $finalData['totalFollowers'] = $users['totalFollowers'];
            $finalData['totalPosts'] = $users['totalPosts'];
            $finalData['categoryId'] = $users['categoryId'];
            $finalData['businessType'] = $users['businessType'];
            $finalData['isActive'] = $users['isActive'];
            $finalData['addDate'] = $users['addDate'];
            $finalData['editDate'] = $users['editDate'];
            $finalData['businessHours'] = $this->businessHours($users['businessId']);
        }
        return  $finalData;
    }
    public function businessHours($businessId = null)
    {
        $this->db->where('businessId', $businessId);
        $data = $this->db->get('trnbusinesshours')->result_array();
        $return = array();
        $i = 0;
        foreach ($data as $result) {
            $return[$i]['hoursId'] = $result['hoursId'];
            $return[$i]['businessId'] = $result['businessId'];
            $return[$i]['day'] = $result['day'];
            $return[$i]['openTime'] = date("g:i A", strtotime($result['openTime']));
            $return[$i]['closeTime'] = date("g:i A", strtotime($result['closeTime']));
            $i++;
        }
        return $return;
    }
    function getOrders($postData = null)
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
            $search_arr[] = " (businessName like '%" . $searchValue . "%' or 
                t2.email like '%" . $searchValue . "%' or 
                t1.orderNo like '%" . $searchValue . "%' or 
                t3.userName like '%" . $searchValue . "%' or 
                t3.email like '%" . $searchValue . "%' or 
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
        $records = $this->db->get('businessorders')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $records = $this->db->get('businessorders')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        // $this->db->select('*');


        // $records = $this->db->get('mstbusiness')->result();
        if ($searchQuery != '') {
            $this->db->where($searchQuery);
        }
        $records = $this->db->select('t1.*, t2.userName, t3.businessName,t4.productName')
            ->from('businessorders as t1')
            ->join('mstuser as t2', 't1.userId = t2.userId', 'LEFT')
            ->join('mstbusiness as t3', 't1.businessId = t3.businessId', 'LEFT')
            ->join('businessproduct as t4', 't1.productId = t4.productId', 'LEFT')
            ->order_by($columnName, $columnSortOrder)
            ->limit($rowperpage, $start)
            ->get()->result();
        $data = array();

        foreach ($records as $record) {


            $status = "<span class='badge badge-success' >Active</span>";
            $data[] = array(
                "orderNo" => $record->orderNo,
                "businessName" => $record->businessName,
                "userName" => $record->userName,
                "productName" => $record->productName,
                "shippingCost" => $record->shippingCost,
                "totalAmount" => $record->totalAmount,
                "orderDate" => $record->addDate,
                "status" => $status,
                "action" => ' <div class="dropdown">
              <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                  <i data-feather="more-vertical"></i>
              </button>
              <div class="dropdown-menu">
              <a class="dropdown-item" href="' . base_url('admin/Business/orderDetail/' . $record->orderId) . '">
              <i data-feather="edit-2" class="mr-50"></i>
              <span>View</span>
          </a>
                  <a class="dropdown-item" href="' . base_url('admin/Business/editBusiness/' .$record->orderId) . '">
                      <i data-feather="edit-2" class="mr-50"></i>
                      <span>Edit</span>
                  </a>
                  <form method="post" id="' . $record->orderId . '" action="' . base_url('admin/Delete/deletedata') . '">
                      <input type="hidden" name="table" value="businessorders">
                      <input type="hidden" name="columnName" value="orderId">
                      <input type="hidden" name="userId" value="' . $record->orderId . '">
                      <input type="hidden" name="pageUrl" value="admin/Business/orders">
                      <a onclick="deletedatamultiple(' . $record->orderId . ')">
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
    public function orderDetail($compare = null)
    {
        $records = $this->db->select('t1.*, t2.userName,t2.phoneNo as userPhoneNo,t2.email as userEmail, t3.businessName,t3.country as businessCountry,t3.businessContact,t3.email,t4.productName')
            ->from('businessorders as t1')
            ->where($compare)
            ->join('mstuser as t2', 't1.userId = t2.userId', 'LEFT')
            ->join('mstbusiness as t3', 't1.businessId = t3.businessId', 'LEFT')
            ->join('businessproduct as t4', 't1.productId = t4.productId', 'LEFT')
            ->get()->row_array();
        return $records;
    }
    public function fetchEvent($compare)
    {
        $this->db->where($compare);
        $result = $this->db->get("mstevent")->result_array();
        $i = 0;
        $return = array();
        foreach ($result as $row) {
            $return[$i]['eventId'] = $row['eventId'];
            $return[$i]['businessId'] = $row['businessId'];
            $return[$i]['eventName'] = $row['eventName'];
            $return[$i]['eventDescription'] = $row['eventDescription'];
            $return[$i]['eventTime'] = $row['eventTime'];
            $return[$i]['eventDate'] = $row['eventDate'];
            $return[$i]['latitude'] = $row['latitude'];
            $return[$i]['longitude'] = $row['longitude'];
            $return[$i]['address'] = $row['address'];
            $return[$i]['addDate'] = $row['addDate'];
            $compare1 = array(
                "eventId" => $row['eventId'],
            );
            $return[$i]['images'] = $this->fetchEventImages($compare1);
            $i++;
        }
        return $return;
    }
    public function fetchEventImages($compare)
    {
        $this->db->where($compare);
        return $this->db->get('eventimages')->result_array();
    }
    function getEvents($postData = null)
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
            $search_arr[] = " (eventName like '%" . $searchValue . "%' or 
                t2.businessName like '%" . $searchValue . "%' or 
                t1.eventDescription like '%" . $searchValue . "%' or 
                t2.country like'%" . $searchValue . "%' ) ";
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
        $records = $this->db->get('mstevent')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $records = $this->db->get('mstevent')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        // $this->db->select('*');


        // $records = $this->db->get('mstbusiness')->result();
        if ($searchQuery != '') {
            $this->db->where($searchQuery);
        }
        $records = $this->db->select('t1.*, t2.businessName')
            ->from('mstevent as t1')
            ->join('mstbusiness as t2', 't1.businessId = t2.businessId', 'LEFT')
            ->order_by($columnName, $columnSortOrder)
            ->limit($rowperpage, $start)
            ->get()->result();
        $data = array();

        foreach ($records as $record) {


            $status = "<span class='badge badge-success' >Active</span>";
            $data[] = array(
                "eventName" => $record->eventName,
                "businessName" => $record->businessName,
                "eventTime" => $record->eventTime,
                "eventDate" => $record->eventDate,
                "address" => $record->address,
                "status" => $status,
                "action" => ' <div class="dropdown">
              <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                  <i data-feather="more-vertical"></i>
              </button>
              <div class="dropdown-menu">
              <a class="dropdown-item" href="' . base_url('admin/Business/eventDetail/' . $record->eventId) . '">
              <i data-feather="edit-2" class="mr-50"></i>
              <span>View</span>
          </a>
                  <a class="dropdown-item" href="' . base_url('admin/Business/editEvent/' . $record->eventId) . '">
                      <i data-feather="edit-2" class="mr-50"></i>
                      <span>Edit</span>
                  </a>
                  <form method="post" id="' . $record->eventId . '" action="' . base_url('admin/Delete/deletedata') . '">
                      <input type="hidden" name="table" value="mstevent">
                      <input type="hidden" name="columnName" value="eventId">
                      <input type="hidden" name="userId" value="' . $record->eventId . '">
                      <input type="hidden" name="pageUrl" value="admin/Business/events">
                      <a onclick="deletedatamultiple(' . $record->eventId . ')">
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
}
