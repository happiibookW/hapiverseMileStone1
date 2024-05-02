<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BUsiness extends CI_Controller {

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
           $this->load->model('admin/BusinessModel');
    }
	public function index()
	{
        $data['title']="Business |".SITENAME;
        $data['subPage']="admin/business/business";
        $data['addBtnTitle'] = 'Add New';
        $data['addBtnPath'] = 'admin/BUsiness/AddNew';
        $this->load->view('admin/layout/index', $data);

    }
	public function businessList(){

		// POST data
		$postData = $this->input->post();
	
		// Get data
		$data = $this->BusinessModel->get($postData);
	
		echo json_encode($data);
	  }
	  // business detail 
	public function detail( $businessId = null)
	{
		$compare=array(
			"businessId"=>$businessId,
		);
		$data['title']="Detail |".SITENAME;
        $data['subPage']="admin/business/detail";
		$data['detail']=$this->BusinessModel->businessDetail($compare);
        $data['addBtnTitle'] = '';
        $data['addBtnPath'] = '';
        $this->load->view('admin/layout/index', $data);
	}
	public function orders( $var = null)
	{
		$data['title']="Order |".SITENAME;
        $data['subPage']="admin/business/orders";
        $data['addBtnTitle'] = '';
        $data['addBtnPath'] = '';
        $this->load->view('admin/layout/index', $data);
	}
	public function orderList( $var = null)
	{
		$postData = $this->input->post();
	
		// Get data
		$data = $this->BusinessModel->getOrders($postData);
	
		echo json_encode($data);
	}
	public function orderDetail( $orderId = null)
	{
		$compare=array(
			"orderId"=>$orderId,
		);
		$data['title']="Order Detail |".SITENAME;
        $data['subPage']="admin/business/orderDetail";
		$data['business']=$this->BusinessModel->orderDetail($compare);
        $data['addBtnTitle'] = '';
        $data['addBtnPath'] = '';
        $this->load->view('admin/layout/index', $data);
	}
	public function events( $var = null)
    {
        $data['title']="Events |".SITENAME;
        $data['subPage']="admin/business/events";
        $data['addBtnTitle'] = 'Add New';
        $data['addBtnPath'] = 'admin/Business/AddNew';
        $this->load->view('admin/layout/index', $data);
    }
	public function eventList( $var = null)
	{
		$postData = $this->input->post();
	
		// Get data
		$data = $this->BusinessModel->getEvents($postData);
	
		echo json_encode($data);
	}
	public function eventDetail( $eventId = null)
	{
		$compare=array(
			"eventId"=>$eventId,
		);
		$data['title']="Order Detail |".SITENAME;
        $data['subPage']="admin/business/eventdetail";
		$data['business']=$this->BusinessModel->eventDetail($compare);
        $data['addBtnTitle'] = '';
        $data['addBtnPath'] = '';
        $this->load->view('admin/layout/index', $data);
	}
}