<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct()
    {

            parent::__construct();
           $this->load->model('admin/UserModel');
    }
	public function index()
	{
        $data['title']="Dashboard |".SITENAME;
        $data['subPage']="admin/user/user";
        $data['addBtnTitle'] = 'Add New';
        $data['addBtnPath'] = 'admin/User/AddNew';
        $this->load->view('admin/layout/index', $data);

    }
	public function userList(){

		// POST data
		$postData = $this->input->post();
	
		// Get data
		$data = $this->UserModel->get($postData);
	
		echo json_encode($data);
	  }
	  public function profile( $userId = null)
	  {
		$compare=array(
			"userId"=>$userId,
		);
		$data['title']="Profile |".SITENAME;
        $data['subPage']="admin/User/profile";
        $data['addBtnTitle'] = '';
        $data['addBtnPath'] = '';
		$data['orders']=$this->UserModel->fetchOrder($compare);
		$data['posts']=$this->UserModel->fetchPosts($compare);
		$data['user']=$this->UserModel->fetchProfile($compare);
        $this->load->view('admin/layout/index', $data);
	  }
}