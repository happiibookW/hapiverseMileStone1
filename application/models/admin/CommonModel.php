<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CommonModel extends CI_Model {

  // Get DataTable data
  function getCovid($postData=null){

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
      if($searchValue != ''){
          $search_arr[] = " (t2.userName like '%".$searchValue."%' or 
          t2.email like '%".$searchValue."%' or 
          t2.country like'%".$searchValue."%' ) ";
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
      if(count($search_arr) > 0){
          $searchQuery = implode(" and ",$search_arr);
      }

      ## Total number of records without filtering
      $this->db->select('count(*) as allcount');
      $records = $this->db->get('covid')->result();
      $totalRecords = $records[0]->allcount;

      ## Total number of record with filtering
      $this->db->select('count(*) as allcount');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $records = $this->db->get('covid')->result();
      $totalRecordwithFilter = $records[0]->allcount;

      ## Fetch records
    
      
      $records = $this->db->select('t1.*, t2.userName,t2.email,t2.phoneNo,t2.country')
     ->from('covid as t1')
    //  if($searchQuery != ''){
    //  $this->db->where($searchQuery);
    //  }
     ->join('mstuser as t2', 't1.userId = t2.userId', 'LEFT')
    ->order_by($columnName, $columnSortOrder)
     ->limit($rowperpage, $start)
    ->get()->result();

      $data = array();

      foreach($records as $record ){
         
          $data[] = array( 
              "userName"=>$record->userName,
              "email"=>$record->email,
              "phoneNo"=>$record->phoneNo,
              "country"=>$record->country,
              "hospitalName"=>$record->hospitalName,
              "covidStatus"=>$record->covidStatus,
              "action"=>' <div class="dropdown">
              <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                  <i data-feather="more-vertical"></i>
              </button>
              <div class="dropdown-menu">
                  <a class="dropdown-item" href="'.base_url('admin/Business/editBusiness/' . $record->userId).'">
                      <i data-feather="edit-2" class="mr-50"></i>
                      <span>Edit</span>
                  </a>
                  <form method="post" id="'.$record->userId.'" action="'.base_url('admin/Delete/deleteBusiness').'">
                      <input type="hidden" name="table" value="mstuser">
                      <input type="hidden" name="columnName" value="userId">
                      <input type="hidden" name="userId" value="'.$record->userId.'">
                      <input type="hidden" name="pageUrl" value="admin/General/interest">
                      <a onclick="deletedatamultiple('.$record->userId.')">
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