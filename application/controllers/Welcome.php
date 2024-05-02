<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('session');
		// $this->load->library('form_validation');

	}

	public function index()
	{
		$this->load->view('index');
	}

	public function Getlogin()
	{
		$loginApi = base_url() . "index.php/API/v1/common/Authentication/index_post";
		$userdata = array(
			"email" =>  $this
				->input
				->post('email'),
			"password" => $this
				->input
				->post('password'),
			"deviceUUID" => '12345678',
			"deviceName" => $this
				->input
				->post('deviceName'),
			"deviceOS" => $this
				->input
				->post('deviceOS'),
			"osVersion" => $this
				->input
				->post('osVersion'),
			"fcmToken" => $this
				->input
				->post('fcmToken'),
		);

		$client = curl_init($loginApi);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $userdata);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response);
		// print_r($result);
		if ($result->status == DATA_AVAILABLE) {
			$user['authorziationId '] = $result->data->authorziationId;
			$user['userId'] = $result->data->userId;
			$user['email'] = $result->data->email;
			$user['userTypeId'] = $result->data->userTypeId;
			$user['token'] = $result->data->token;
			//print_r($user);
			// $this->input->set_cookie("email", $this->input->post('email'), '33600');
			// $this->input->set_cookie("password", $this->input->post('password'), '33600');
			$this->session->set_userdata($user);
			if ($result->data->userTypeId == 1) {
				redirect(base_url() . 'index.php/Home/');
			} elseif ($result->data->userTypeId == 2) {
				redirect(base_url() . 'index.php/Home/');
			}
		} elseif ($result->status == INVALID) {
			$data['message'] = $result->message;
			$this->load->view('index', $data);
		} elseif ($result->status == NOT_VERIFY) {
			$data['message'] = $result->message;
			$this->load->view('index', $data);
		} elseif ($result->status == REJECTED) {
			$data['message'] = $result->message;
			$this->load->view('index', $data);
		} elseif ($result->status == NOT_APPROVED) {
			$data['message'] = $result->message;
			$this->load->view('index', $data);
		}
	}

	public function signupselect()
	{
		$this->load->view('signupSelect');
	}

	public function refercode()
	{
		$this->load->view('refercode');
	}

	public function signupmail()
	{
		$this->load->view('signupMail');
	}

	public function verifymail()
	{
		$this->load->view('verifyMail');
	}
	public function chooseplan()
	{
		$this->load->view('choseplan');
	}

	public function sendemail()
	{
		$verifyapi = base_url() . "index.php/API/v1/common/EmailVerification/index_post";
		$userdata = array(
			"email" => $this
				->input
				->post('email'),
		);

		$client = curl_init($verifyapi);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $userdata);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response);
		// print_r($result);
		if ($result->status == DATA_SAVE) {
			redirect(base_url() . 'index.php/Welcome/verifymail');
		} elseif ($result->status == DATA_SAVE_ERROR) {
			$data['message'] = $result->message;
			$this->load->view('signupMail', $data);
		} elseif ($result->status == ALREADY_EXIST) {
			$data['message'] = $result->message;
			$this->load->view('signupMail', $data);
		} elseif ($result->status == REQUIRED_FIELDS) {
			$data['message'] = $result->message;
			$this->load->view('signupMail', $data);
		}
	}

	public function verifyotp()
    {
           $verifyapi=base_url()."index.php/Verify_mail/index_post";
           $userdata = array(
                    "email" => $this
                        ->input
                        ->post('email') ,
                    "verificationCode" =>  $this
                        ->input
                        ->post('verificationCode') ,
                );

              $client = curl_init($verifyapi);
          curl_setopt($client, CURLOPT_POST, true);
          curl_setopt($client, CURLOPT_POSTFIELDS, $userdata);
          curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
          $response = curl_exec($client);
          curl_close($client);
          $result=json_decode($response);
          // print_r($result);
              if ($result->status==1) {
              $data['message']=$result->message;
              $this->index($data);
            }elseif ($result->status==2) {
              $data['message']=$result->message;
              $this->index($data);
            } 
    }

    public function signup($data = NULL)
	{
		$data['message'] = '';
		$this->load->view('signup',$data);
	}

	public function adduser()
	{
		   $addUserapi=base_url()."index.php/API/v1/user/UserAdd/index_post";
		   $userdata = array(
			"userName" => $this->input->post('userName'),
            "email" => $this->input->post('email'),
            "DOB" => $this->input->post('DOB'),
            "martialStatus" => $this->input->post('martialStatus'),
            "gender" => $this->input->post('gender'),
            "city" => $this->input->post('city'),
            "postCode" => $this->input->post('postCode'),
            "country" => $this->input->post('country'),
            "lat" => $this->input->post('lat'),
            "long" => $this->input->post('long'),
            "address" => $this->input->post('address'),
            "userTypeId" => '1',
            "password" => $this->input->post('password'),
            "phoneNo" => $this->input->post('phoneNo'),
                );

		      $client = curl_init($addUserapi);
          curl_setopt($client, CURLOPT_POST, true);
          curl_setopt($client, CURLOPT_POSTFIELDS, $userdata);
          curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
          $response = curl_exec($client);
          curl_close($client);
          $result=json_decode($response);
		  print_r($result);
		  if ($result->status == DATA_SAVE) {
			redirect(base_url() . 'index.php/Welcome/');
		} elseif ($result->status == DATA_SAVE_ERROR) {
			$data['message'] = $result->message;
			$this->load->view('signup', $data);
		} elseif ($result->status == REQUIRED_FIELDS) {
			$data['message'] = $result->message;
			$this->load->view('signup', $data);
		}   
	}

	public function forgotpassmail()
	{
		$this->load->view('forgotpassword');
	}

	public function resetpassword()
	{
		$this->load->view('resetpassword');
	}

	public function forgotpassword()
	{
		$verifyapi = base_url() . "index.php/API/v1/common/ForgotPassword/index_post";
		$userdata = array(
			"email" => $this
				->input
				->post('email'),
		);

		$client = curl_init($verifyapi);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $userdata);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response);
		// print_r($result);
		if ($result->status == MAIL_SENT) {
			redirect(base_url() . 'index.php/Welcome/resetpassword');
		} elseif ($result->status == NOT_EXIST) {
			$data['message'] = $result->message;
			$this->load->view('forgotpassword', $data);
		} elseif ($result->status == REQUIRED_FIELDS) {
			$data['message'] = $result->message;
			$this->load->view('forgotpassword', $data);
		}
	}

	public function newpassword()
    {
           $verifyapi=base_url()."index.php/API/v1/common/ResetPassword/index_post";
           $userdata = array(
                    "email" => $this
                        ->input
                        ->post('email') ,
                    "verificationCode" =>  $this
                        ->input
                        ->post('verificationCode') ,
					"password" =>  $this
                        ->input
                        ->post('password') ,
                );

              $client = curl_init($verifyapi);
          curl_setopt($client, CURLOPT_POST, true);
          curl_setopt($client, CURLOPT_POSTFIELDS, $userdata);
          curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
          $response = curl_exec($client);
          curl_close($client);
          $result=json_decode($response);
          // print_r($result);
		  if ($result->status == DATA_SAVE) {
			redirect(base_url() . 'index.php/Welcome/');
		} elseif ($result->status == NOT_EXIST) {
			$data['message'] = $result->message;
			$this->load->view('resetpassword', $data);
		} elseif ($result->status == REQUIRED_FIELDS) {
			$data['message'] = $result->message;
			$this->load->view('resetpassword', $data);
		}
    }

	public function logout()
	{
		// $email=$this->input->cookie('email',true);
		// $password=$this->input->cookie('password');
		// delete_cookie("email");
		// delete_cookie($password,base_url());
		$this->session->sess_destroy();
		redirect(base_url() . 'index.php/Welcome/');
	}
}
