<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Friend extends CI_Controller
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
		$fetchfriend = base_url() . "index.php/API/v1/user/FetchFriendList/index_post";
		$userId = array(
			'userId'  => $this->session->userdata('userId'),
		);
		$client = curl_init($fetchfriend);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $userId);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_HTTPHEADER, $this->logdata);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response);
		//print_r($result);
	 $data['profile'] = fetchProfile($this->session->userdata('userId'),$this->session->userdata('userId'),$this->session->userdata('userTypeId'),$this->logdata);
		if ($result->status == DATA_AVAILABLE) {
			$data['friend'] = $result->data;
			
			$this->load->view('friendlist', $data);
		} else if ($result->status == DATA_NOT_AVAILABLE) {
			$data['message'] = "No Friend";
			$this->load->view('friendlist',$data);
		}
	}

    public function fetchdetail($userId)
	{
		$mypostapi = base_url() . "index.php/API/v1/user/FetchUserProfile/index_post";
		$userdata = array(
			'userId'  => $userId,
		);
		$client = curl_init($mypostapi);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $userdata);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_HTTPHEADER, $this->logdata);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response);
		// print_r($result);
		if ($result->status == DATA_AVAILABLE) {
			$data['profile'] = $result->data;
            $data['post'] = $this->fetchpost($userId);
			$this->load->view('friendprofile', $data);
		} else {
			$data = "Data Not Available";
			$this->load->view('friendprofile', $data);
		}
	}


	public function fetchpost($userId)
	{
		$mypostapi = base_url() . "index.php/API/v1/post/FetchMyPost/index_post";
		$userdata = array(
			'userId'  => $userId,
		);
		$client = curl_init($mypostapi);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $userdata);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_HTTPHEADER, $this->logdata);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response);
		// print_r($result);
		if ($result->status == DATA_AVAILABLE) {
			return $result->data;
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

	// public function createpost()
	// {
	// 	$postapi = base_url() . "index.php/API/v1/post/CreatePost/index_post";
	// 	$postdata = array(
	// 		'userId'  => $this->input->post('userId'),
    //         "caption" => $this->input->post('caption'),
    //         "privacy" => $this->input->post('privacy'),
    //         "content_type" => $this->input->post('content_type'),
    //         "postType" => 'text',
    //         "font_color" => $this->input->post('font_color'),
    //         "text_back_ground" => $this->input->post('text_back_ground'),
    //         "posted_date" => date('Y-m-d H:i:s'),
    //         "expire_at" => $this->input->post('expire_at'),
    //         "interest" => $this->input->post('interest'),
    //         "location" => $this->input->post('location'),
    //         "active" => $this->input->post('active'),
    //         "postContentText" => $this->input->post('postContentText'),
	// 	);
	// 	$client = curl_init($postapi);
	// 	curl_setopt($client, CURLOPT_POST, true);
	// 	curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
	// 	curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
	// 	curl_setopt($client, CURLOPT_HTTPHEADER, $this->logdata);
	// 	$response = curl_exec($client);
	// 	curl_close($client);
	// 	$result = json_decode($response);
	// 	// print_r($result);
		
	// }

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

}
