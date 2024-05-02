<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
        $this->load->model("admin/AdminModel");
        $data['response'] = "";
        $data['responseCode'] = "";
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
        $data['title'] = 'Login | '.SITENAME;
        if ($this->form_validation->run() == true) {
          $email = $this->input->post('email');
          $password = $this->input->post('password');
            $admincredentails = array(
              'email' => $email,
              'password' => $password
    
            );
            
            $admindata = $this->AdminModel->login($admincredentails);
            if (!empty($admindata)) {
              $this->session->set_userdata($admindata);
              redirect(base_url("admin/Dashboard"));
            } else {
             $this->session->set_flashdata('message','Incorrect detail');
             $this->load->view('admin/login', $data);
            }
          
        }else{
        $this->session->set_flashdata('message',"");
        $this->load->view('admin/login', $data);
        }
	}
}
