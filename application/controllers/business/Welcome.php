<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
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
	    $data['title']="Business - ".SITENAME;
	     $data['subPage']="photos";
	    $data['pageTitle']="Business";
	     $data['profile'] = fetchProfile($this->session->userdata('userId'),$this->session->userdata('userId'),$this->session->userdata('userTypeId'),$this->logdata);
	    $data['photos']=$this->UserModel->fetchPhoto($compare);
	    $this->load->view("business/layout/index",$data);
	}
}