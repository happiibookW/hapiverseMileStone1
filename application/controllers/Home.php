<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    
    // gujjar saab ka code wah bhai
	var $logdata;
	public function __construct()
	{

		parent::__construct();
		//load database
		$this->load->model("UserModel");
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
		$feedpostapi = base_url() . "index.php/API/v1/post/FetchFeedPost/index_post";
		$userId = array(
			'userId'  => $this->session->userdata('userId'),
		);
		$client = curl_init($feedpostapi);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $userId);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_HTTPHEADER, $this->logdata);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response);
		// print_r($result);
		 $data['profile'] = fetchProfile($this->session->userdata('userId'),$this->session->userdata('userId'),$this->session->userdata('userTypeId'),$this->logdata);
		if ($result->status == DATA_AVAILABLE) {
			$data['post'] = $result->data;
		   
//	print_r($data);
			$this->load->view('home', $data);
		} else if ($result->status == DATA_NOT_AVAILABLE) {
			$data['message'] = "Data Not Available";
			$this->load->view('home', $data);
		}
	}
		public function fetchProfile()
	{
	    if($this->session->userdata('userTypeId')==2){
	         $feedpostapi = base_url() . "index.php/API/v1/business/FetchBusinessProfile/index_post";
	    }else{
	       $feedpostapi = base_url() . "index.php/API/v1/user/FetchUserProfile/index_post";
	    }
	
		$userId = array(
			'userId'  => $this->session->userdata('userId'),
			'myId'=>$this->session->userdata('userId'),
		);
		$client = curl_init($feedpostapi);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $userId);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_HTTPHEADER, $this->logdata);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response);
		// print_r($result);
		 return $result;
	}
	public function photos(){
	    $compare=array(
	        "userId"=>$this->session->userdata('userId'),
	        );
	    $data['title']="Phots | ".SITENAME;
	    $data['subPage']="photos";
	    $data['pageTitle']="Business";
	     $data['profile'] = fetchProfile($this->session->userdata('userId'),$this->session->userdata('userId'),$this->session->userdata('userTypeId'),$this->logdata);
	    $data['photos']=$this->UserModel->fetchPhoto($compare);
	    //print_r($data);
	    $this->load->view("nav/layout",$data);
	}
	public function addPost(){

	    $jobapi=base_url()."/API/v1/post/CreatePost";
         
               $postdata=array(
               "userId"=>$this->session->userdata('userId'),
               "privacy"=>"public",
               "caption"=>$this->session->userdata('userId'),
               "postContentText"=>$this->input->post('postContentText'),
               "content_type"=>"feed",
               "postContentText"=>$this->input->post('postContentText'),
                 "font_color" => "blue",
                    "text_back_ground" => "white",
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
          redirect(base_url("Home/"));
        
	}
	

	public function fetchcomment()
	{
		$commentapi = base_url() . "index.php/API/v1/post/FetchPostComment/index_post";
		$commentdata = array(
            "postId" => $this->input->post('postId'),
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
		if(!empty($result->data)) { foreach ($result->data as $comment) { 
            echo "


                                <div class='media is-comment'>
                                    <!-- User image -->
                                    <div class='media-left'>
                                        <div class='image'>
                                            <img src='".base_url(). $comment->profileImageUrl."' alt=''>
                                        </div>
                                    </div>
                                    <!-- Content -->
                                    <div class='media-content'>
                                        <a href='#'>".$comment->userName."</a>
                                        <span class='time'>".  date("d-m-Y", strtotime($comment->addDate))."</span>
                                        <p>".$comment->comment."</p>
                                        <!-- Comment actions -->
                                        
                                    </div>
                                    <!-- Right side dropdown -->
                                    <div class='media-right'>
                                        <div class='dropdown is-spaced is-right is-neutral dropdown-trigger'>
                                            <div>
                                                <div class='button'>
                                                    <i data-feather='more-vertical'></i>
                                                </div>
                                            </div>
                                            <div class='dropdown-menu' role='menu'>
                                                <div class='dropdown-content'>
                                                    <a class='dropdown-item'>
                                                        <div class='media'>
                                                            <i data-feather='x'></i>
                                                            <div class='media-content'>
                                                                <h3>Hide</h3>
                                                                <small>Hide this comment.</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class='dropdown-divider'></div>
                                                    <a href='#' class='dropdown-item'>
                                                        <div class='media'>
                                                            <i data-feather='flag'></i>
                                                            <div class='media-content'>
                                                                <h3>Report</h3>
                                                                <small>Report this comment.</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
        } } 
	}
	public function business(){
	     $compare=array(
	        "userId"=>$this->session->userdata('userId'),
	        );
	    $data['title']="Phots | ".SITENAME;
	    $data['subPage']="business";
	    $data['pageTitle']="Business";
	     $data['profile'] = fetchProfile($this->session->userdata('userId'),$this->session->userdata('userId'),$this->session->userdata('userTypeId'),$this->logdata);
	    $data['photos']=$this->UserModel->fetchPhoto($compare);
	    //print_r($data);
	    $this->load->view("nav/layout",$data);
	}
		public function peoples(){
	     $compare=array(
	        "userId"=>$this->session->userdata('userId'),
	        );
	    $data['title']="Peoples | ".SITENAME;
	    $data['subPage']="people";
	    $data['pageTitle']="People";
	     $data['profile'] = fetchProfile($this->session->userdata('userId'),$this->session->userdata('userId'),$this->session->userdata('userTypeId'),$this->logdata);
	    $data['photos']=$this->UserModel->fetchPhoto($compare);
	    //print_r($data);
	    $this->load->view("nav/layout",$data);
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
	public function profile($userId=""){
	    $url=base_url("API/v1/post/FetchMyPost/index_post");
	    $url1=base_url("API/v1/user/FetchFriendList/index_post");
	    $compare=array("userId"=>$userId);
	    $data['title']="Profile | ".SITENAME;
	    $data['subPage']="profile";
	    $data['pageTitle']="Profile";
	    $data['profile'] = fetchProfile($this->session->userdata('userId'),$this->session->userdata('userId'),$this->session->userdata('userTypeId'),$this->logdata);
	    $data['userProfile']=fetchProfile($userId,$this->session->userdata('userId'),"1",$this->logdata);
	    if(fetchData($url,$compare,$this->logdata)->data==""){
	    $data['post']=fetchData($url,$compare,$this->logdata)->data;
	    }else{
	         $data['post']=array();
	        $data['postmessage']="Nothing posted yet";
	    }
	    if(fetchData($url1,$compare,$this->logdata)->data==""){
	    $data['friends']=fetchData($url1,$compare,$this->logdata)->data;
	    }else{
	     $data['friends']=array();
	     $data['message']="No friend yet";
	    }
	  // print_r($data['friends']);
	     $data['photos']=$this->UserModel->fetchPhoto($compare);
	    $this->load->view("nav/layout",$data);
	}
	public function businessProfile($businessId=""){
	    $url1=base_url("API/v1/user/FetchFriendList/index_post");
	    $url2=base_url("API/v1/business/FetchProductByBusiness/index_post");
	    $compare=array("userId"=>$businessId);
	    $productcompare=array("businessId"=>$businessId);
	    $data['title']="Profile | ".SITENAME;
	    $data['subPage']="businessProfile";
	    $data['pageTitle']="Business";
	    $data['profile'] = fetchProfile($this->session->userdata('userId'),$this->session->userdata('userId'),$this->session->userdata('userTypeId'),$this->logdata);
	    $data['businessProfile']=fetchProfile($businessId,$this->session->userdata('userId'),"2",$this->logdata);
	    $data['photos']=$this->UserModel->fetchPhoto($compare);
	    if(fetchData($url1,$compare,$this->logdata)->data!=""){
	        $data['noFriendmMssage']="No friend yet";
	    $data['friends']=fetchData($url1,$compare,$this->logdata)->data;
	    }else{
	     $data['friends']=array();
	     $data['noFriendmMssage']="No friend yet";
	    }
	      if(fetchData($url2,$productcompare,$this->logdata)->data!=""){
	        $data['noProductMessage']="No Product yet";
	    $data['products']=fetchData($url2,$productcompare,$this->logdata)->data;
	    }else{
	     $data['products']=array();
	     $data['noProductMessage']="No Product yet";
	    }
	 //  print_r($data['products']);
	   //  $data['photos']=$this->UserModel->fetchPhoto($compare);
	   $this->load->view("nav/layout",$data);
	}
	public function search($keword){
	      $url1=base_url("API/v1/business/SearchBusiness/index_post");
	      $data['title']="Sarch | ".SITENAME;
	      $data['subPage']="search";
	      $data['pageTitle']="Business";
	      $compare=array("keyWord"=>$keword);//$this->input->post("keyWord")
	      $data['business']=fetchData($url1,$compare,$this->logdata)->data;
	      $data['profile'] = fetchProfile($this->session->userdata('userId'),$this->session->userdata('userId'),$this->session->userdata('userTypeId'),$this->logdata);
	    //  $this->load->view("nav/layout",$data);
	}
	public function fetchUsers(){
		$data = $this->UserModel->get();
		echo json_encode($data);
	}
	public function places(){
	    echo"This page is under construnction will be published soon";
	}
		public function chat(){
	    echo"This page is under construnction will be published soon";
	}
		public function covid(){
	    echo"This page is under construnction will be published soon";
	}
		public function music(){
	    echo"This page is under construnction will be published soon";
	}

}
