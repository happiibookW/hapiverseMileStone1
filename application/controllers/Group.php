<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Group extends CI_Controller
{
	var $logdata;
	public function __construct()
	{

		parent::__construct();
		//load database
		$this->logdata = array(
			'token: ' . $this->session->userdata('token'),
			'userId: ' . $this->session->userdata('userId'),
		);
		if (empty($this->session->userdata('userId'))) {
			redirect(base_url() . 'index.php/');
		}
	}

   public function index() 
   {
	$data['subPage']="grouplist";
	$data['title']="Groups |".SITENAME;
	$data['pageTitle']="Groups";
	$groupapi = base_url() . "API/v1/group/FetchGroup";
	$userId = array(
		'userId'  => "2c45a1fd21",
	);
	$client = curl_init($groupapi);
	curl_setopt($client, CURLOPT_POST, true);
	curl_setopt($client, CURLOPT_POSTFIELDS, $userId);
	curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($client, CURLOPT_HTTPHEADER, $this->logdata);
	$response = curl_exec($client);
	curl_close($client);
	$result = json_decode($response);
	// print_r($result);
	if ($result->status == DATA_AVAILABLE) {
		$data['groups'] = $result->data;
				    $data['profile'] = fetchProfile($this->session->userdata('userId'),$this->session->userdata('userId'),$this->session->userdata('userTypeId'),$this->logdata);
		$this->load->view('nav/layout', $data);
	} else if ($result->status == DATA_NOT_AVAILABLE) {
		$data['message'] = "Data Not Available";
		$this->load->view('nav/layout', $data);
	}
   }
   public function groupDetail($groupId){
      $feedpostapi = base_url() . "index.php/API/v1/post/FetchGroupPost/index_post";
		$userId = array(
			'userId'  => $this->session->userdata('userId'),
			"userId"=>$groupId,
		);
		$client = curl_init($feedpostapi);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $userId);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_HTTPHEADER, $this->logdata);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response);
		 $data['profile'] = fetchProfile($this->session->userdata('userId'),$this->session->userdata('userId'),$this->session->userdata('userTypeId'),$this->logdata);
		// print_r($result);
		// fetch group detail
		$url=base_url() . "API/v1/group/FetchSingleGroup/index_post";
		$compare=array("groupId"=>$groupId);
		$data['groupDetail']=fetchData($url,$compare,$this->logdata);
		$data["title"]="Group DEtail";
		$data['subPage']="groupDetail";
		if($result->status==4){
		    $data['post']=$result->data;
		}else{
		$data['message']=array("message"=>"No Data to view");
		}

     // print_r($data['groupDetail']);
       $this->load->view('groupDetail', $data);
       
   }
   	public function addPost(){
	    $jobapi=base_url()."/API/v1/post/CreatePost";
               $groupId=$this->input->post("groupId");
               $postdata=array(
               "userId"=>$this->session->userdata('userId'),
               "privacy"=>"public",
               "groupId"=>$groupId,
               "caption"=>$this->session->userdata('userId'),
               "postContentText"=>$this->input->post('postContentText'),
               "content_type"=>"feed",
               "postContentText"=>$this->input->post('postContentText'),
                 "font_color" => "",
                    "text_back_ground" => "",
                    "posted_date" => "2022-08-31",
                    "expire_at" => "2023-08-31",
                    "interest" => "1",
                    "location" => "",
                    "active" => "",
                    "isBusiness" => 0,
                    "thumbnailUrl" => "",
               );
               if(isset($_FILES['postFileUrl']['name']) && $_FILES['postFileUrl']['name']!=""){
               	$count = count($_FILES['postFileUrl']['name']);
		
		for($i = 0; $i < $count; $i++)
		{
			$galleryimage[$i] = new CURLFile($_FILES['postFileUrl']['tmp_name'][$i], $_FILES['postFileUrl']['type'][$i], $_FILES['postFileUrl']['name'][$i]);
		}
		$postdata['postFileUrl']=$galleryimage[$i] ;
		$postdata['postType']="image" ;
		
	}else{
	    $postdata['postType']="text";
	}
           $client = curl_init($jobapi);
           curl_setopt($client, CURLOPT_POST, true);
          curl_setopt($client, CURLOPT_POSTFIELDS,$this->curl_postfields_flatten($postdata));
          curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
          	curl_setopt($client, CURLOPT_HTTPHEADER, $this->logdata);
          $response = curl_exec($client);
          curl_close($client);
          $result=json_decode($response);
          redirect(base_url("Group/groupDetail/".$groupId));
        
	}
	
	public function fetchgrouppost()
	{
		$grouppostapi = base_url() . "index.php/API/v1/post/FetchGroupPost/index_post";
		$userId = array(
			'userId'  => $this->session->userdata('userId'),
            'groupId' => '27',
		);
		$client = curl_init($grouppostapi);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $userId);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_HTTPHEADER, $this->logdata);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response);
		// print_r($result);
		if ($result->status == DATA_AVAILABLE) {
			$data['post'] = $result->data;
			$this->load->view('group', $data);
		} else {
			$data = "Data Not Available";
			$this->load->view('group', $data);
		}
	}

	public function likepost()
	{
		$postlike = base_url() . "index.php/API/v1/post/LikeAdd/index_post";
		$userdata = array(
			'userId'  => $this->session->userdata('userId'),
			'postId'  => $this->input->post('postId')
		);
		$client = curl_init($postlike);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $userdata);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_HTTPHEADER, $this->logdata);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response);
		// print_r($result);
		
	}

	public function createpost()
	{
		$postapi = base_url() . "index.php/API/v1/post/CreateGroupPost/index_post";
		$postdata = array(
			'userId'  => $this->session->userdata('userId'),
            'groupId' => '27',
            "caption" => $this->input->post('caption'),
            "privacy" => $this->input->post('privacy'),
            "content_type" => $this->input->post('content_type'),
            "postType" => 'text',
            "font_color" => $this->input->post('font_color'),
            "text_back_ground" => $this->input->post('text_back_ground'),
            "posted_date" => date('Y-m-d H:i:s'),
            "expire_at" => $this->input->post('expire_at'),
            "interest" => $this->input->post('interest'),
            "location" => $this->input->post('location'),
            "active" => $this->input->post('active'),
            "postContentText" => $this->input->post('postContentText'),
		);
		$client = curl_init($postapi);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_HTTPHEADER, $this->logdata);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response);
		// print_r($result);
		
	}

	public function postcomment()
	{
		$commentapi = base_url() . "index.php/API/v1/post/AddEditComment/index_post";
		$commentdata = array(
			'userId'  => $this->session->userdata('userId'),
            "postId" => $this->input->post('postId'),
            "comment" => $this->input->post('comment'),
		);
		$client = curl_init($commentapi);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $commentdata);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_HTTPHEADER, $this->logdata);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response);
		// print_r($result);
		
	}
	  	public function curl_postfields_flatten($data, $prefix = '')
	{
  		if (!is_array($data))
		{
			return $data; // in case someone sends an url-encoded string by mistake
		}

  		$output = array();
		
  		foreach($data as $key => $value)
		{
    		$final_key = $prefix ? "{$prefix}[{$key}]" : $key;
    		if (is_array($value))
			{
      			// @todo: handle name collision here if needed
      			$output += $this->curl_postfields_flatten($value, $final_key);
    		}
    		else
			{
      			$output[$final_key] = $value;
    		}
  		}
  		return $output;
	}

}
