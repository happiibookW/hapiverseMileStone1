
<?php


require APPPATH . 'libraries/REST_Controller.php';

class ResetPassword extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('AuthenticationModel');
    }

    public function index_post()
    {

        try {
            $email = $this->input->post('email');
            $verificationCode = $this->input->post('verificationCode');
            $password = $this->input->post('password');
            if ($email != "" && $password!="" && $verificationCode ) {
                $compare = array(
                    "email" => $email,
                    "verificationCode"=>$verificationCode,
                );
                $verificationCode = rand(1000, 9999);
                $data = array(
                    "emailVerified"=>1,
                    "password" => md5($password),
                );
                $profiledata = $this->AuthenticationModel->resetpassword($data, $compare);
                if ($profiledata == false) {
                    $this->response(array(
                        "status" => NOT_EXIST,
                        "message" => NOT_EXIST_MESSAGE,
                    ), REST_Controller::HTTP_OK);
                } else {
                    $this->response(array(
                        "status" => DATA_SAVE,
                        "message" => DATA_SAVE_MESSAGE,
                    ), REST_Controller::HTTP_OK);
                }
            } else {
                $this->response(array(
                    "status" => REQUIRED_FIELDS,
                    "message" => REQUIRED_FIELDS_MESSAGE
                ), REST_Controller::HTTP_OK);
            }
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }
}

?>