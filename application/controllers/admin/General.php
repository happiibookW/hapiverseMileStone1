<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General extends CI_Controller {

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
           $this->load->model('admin/GeneralModel');
           $upload = array(
            "upload_path" => "public/images/interest/",
            "allowed_types" => "jpg|png|jpeg|PNG|JPG|JPEG|PDF|DOC|CSV",
            "max_size" => 100000,
            "encrypt_name" => TRUE
    );
    $this->load->library('upload', $upload);
    }
    public function plan( $var = null)
    {
        $data['title']="Plan |".SITENAME;
        $data['subPage']="admin/general/plan";
        $data['addBtnTitle'] = 'Add New';
        $data['addBtnPath'] = 'admin/General/AddPlan';
        $data['plans']=$this->GeneralModel->fetch("plans");
        $this->load->view('admin/layout/index', $data);
    }
	public function AddPlan($planId="")
	{
        $data['title']="Add Plan |".SITENAME;
        $data['subPage']="admin/general/addPlan";
        $data['addBtnTitle'] = '';
        $data['addBtnPath'] = '';
         if($planId!=""){
        $compare=array(
            "planId"=>$planId
        );
        $data['plan']=$this->GeneralModel->fetchSingle($compare,"plans");
         }
        $this->form_validation->set_rules('planName', 'Plan Name', 'trim|required');
        $this->form_validation->set_rules('planPrice', 'Plan Price', 'trim|required');
        $this->form_validation->set_rules('planType', 'Plan type', 'trim|required');
        if ($this->form_validation->run() == true) {
            $dataToSave=array(
                "planName"=>$this->input->post('planName'),
                "planType"=>$this->input->post('planType'),
                "planPrice"=>$this->input->post('planPrice'),
            );
         if($planId==""){
           $this->GeneralModel->insert($dataToSave,"plans");
           $this->session->set_flashdata("message",DATA_SAVE_MESSAGE);
           redirect(base_url("admin/General/AddPlan"));
         }else{
          
            $this->GeneralModel->update($dataToSave,"plans",$compare);
            $this->session->set_flashdata("message",DATA_SAVE_MESSAGE);
            redirect(base_url("admin/General/AddPlan"));
         }
        }else{
        $this->load->view('admin/layout/index', $data);
        }

    }
    public function interest( $var = null)
    {
        $data['title']="Interests |".SITENAME;
        $data['subPage']="admin/general/interest";
        $data['addBtnTitle'] = 'Add New';
        $data['addBtnPath'] = 'admin/General/AddInterest';
        $data['interests']=$this->GeneralModel->fetch("mstintrestcategory");
        $this->load->view('admin/layout/index', $data);
    }
   public function AddInterest( $interestId = null)
   {
    $data['title']="Add Interest |".SITENAME;
    $data['subPage']="admin/general/addInterest";
    $data['addBtnTitle'] = '';
    $data['addBtnPath'] = '';
     if($interestId!=""){
    $compare=array(
        "intrestCategoryId"=>$interestId
    );
    $data['interest']=$this->GeneralModel->fetchSingle($compare,"mstintrestcategory");
     }
    $this->form_validation->set_rules('intrestCategoryTitle', 'Interest title', 'trim|required');
    if ($this->form_validation->run() == true) {
        $dataToSave=array(
            "intrestCategoryTitle"=>$this->input->post('intrestCategoryTitle'),
        );
        if(isset($_FILES['interestImage']['name']) && $_FILES['interestImage']['name']!="" ){
        if (!$this->upload->do_upload('interestImage')) {
            echo $this->upload->display_errors();
    } else {
            $logodata    = $this->upload->data();
            $dataToSave['interestImage'] = "public/images/interest/" . $logodata['file_name'];
    }
}
     if($interestId==""){
       $this->GeneralModel->insert($dataToSave,"mstintrestcategory");
       $this->session->set_flashdata("message",DATA_SAVE_MESSAGE);
       redirect(base_url("admin/General/AddInterest"));
     }else{
      
        $this->GeneralModel->update($dataToSave,"mstintrestcategory",$compare);
        $this->session->set_flashdata("message",DATA_SAVE_MESSAGE);
        redirect(base_url("admin/General/AddInterest"));
     }
    }else{
    $this->load->view('admin/layout/index', $data);
    }
   }
   public function subInterest( $var = null)
   {
       $data['title']="Sub Interests |".SITENAME;
       $data['subPage']="admin/general/subInterest";
       $data['addBtnTitle'] = 'Add New';
       $data['addBtnPath'] = 'admin/General/AddSubInterest';
       $data['interests']=$this->GeneralModel->fetchSubInterest();
       $this->load->view('admin/layout/index', $data);
   }
   public function AddSubInterest( $interestSubCategoryId = null)
   {
    $data['title']="Add Interest |".SITENAME;
    $data['subPage']="admin/general/addSubInterest";
    $data['addBtnTitle'] = '';
    $data['addBtnPath'] = '';
      if($interestSubCategoryId==""){
    $compare=array(
        "interestSubCategoryId"=>$interestSubCategoryId
    );
    $data['interest']=$this->GeneralModel->fetchSingleSubInterest($compare);
      }
    $data['interests']=$this->GeneralModel->fetch("mstintrestcategory");
    $this->form_validation->set_rules('interestCategoryId', 'Interest title', 'trim|required');
    $this->form_validation->set_rules('interestSubCategoryTitle', 'Sub Interest  title', 'trim|required');
    if ($this->form_validation->run() == true) {
        $dataToSave=array(
            "interestCategoryId"=>$this->input->post('interestCategoryId'),
            "interestSubCategoryTitle"=>$this->input->post('interestSubCategoryTitle'),
        );
     if($interestSubCategoryId==""){
       $this->GeneralModel->insert($dataToSave,"mstintrestsubcategory");
       $this->session->set_flashdata("message",DATA_SAVE_MESSAGE);
       redirect(base_url("admin/General/AddSubInterest"));
     }else{
      
        $this->GeneralModel->update($dataToSave,"mstintrestsubcategory",$compare);
        $this->session->set_flashdata("message",DATA_SAVE_MESSAGE);
        redirect(base_url("admin/General/AddSubInterest"));
     }
    }else{
    $this->load->view('admin/layout/index', $data);
    }
   }
}