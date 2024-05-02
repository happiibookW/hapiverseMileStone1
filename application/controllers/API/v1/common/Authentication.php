
<?php


require APPPATH . 'libraries/REST_Controller.php';

class Authentication extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('AuthenticationModel');
         header("Access-Control-Allow-Origin: *");
         header('Access-Control-Allow-Methods: GET, POST');
         header("Access-Control-Allow-Headers: *");
    }

    public function index_post()
    {
		
        try {

            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $deviceUUID = $this->input->post('deviceUUID');
            $deviceName = $this->input->post('deviceName');
            $deviceOS = $this->input->post('deviceOS');
            $osVersion = $this->input->post('osVersion');
            $fcmToken = $this->input->post('fcmToken');
			
            $loggedInDate = date('Y-m-d H:i:s');
            if ($email != "" && $password != "" && $deviceUUID!="" ) {
                $data = array(
                    "email" => $email,
                    "password" => md5($password)
                );
                $profiledata=array();
                $profiledata = $this->AuthenticationModel->auth($data);
				
                if ($profiledata == NOT_APPROVED) {
                    $this->response(array(
                        "status" => NOT_APPROVED,
                        "message" => NOT_APPROVED_MESSAGE,
                    ), REST_Controller::HTTP_OK);
                } elseif ($profiledata == NOT_VERIFY) {
                    $this->response(array(
                        "status" => NOT_VERIFY,
                        "message" => NOT_VERIFY_MESSAGE,
                    ), REST_Controller::HTTP_OK);
                } elseif ($profiledata == REJECTED) {
                    $this->response(array(
                        "status" => REJECTED,
                        "message" => REJECTED_MESSAGE,
                    ), REST_Controller::HTTP_OK);
                } elseif ($profiledata != "") {
                      $deviceData = array(
                        "userId" => $profiledata['userId'],
                        "deviceUUID" => $deviceUUID,
                        "deviceName" => $deviceName,
                        "deviceOS" => $deviceOS,
                        "osVersion" => $osVersion,
                        "fcmToken" => $fcmToken,
                        "loginStatus" => 1,
                        "loggedInDate" => $loggedInDate,
                        "lastLoggedInDate" => $loggedInDate,
                    );
                    $this->AuthenticationModel->deviceData($deviceData);
                    $this->response(array(
                        "status" => DATA_AVAILABLE,
                        "message" => DATA_AVAILABLE_MESSAGE,
                        "data" => $profiledata
                    ), REST_Controller::HTTP_OK);
                } else {
                    $this->response(array(
                        "status" => INVALID,
                        "message" => INVALID_MESSAGE,
                        "data" => $profiledata
                    ), REST_Controller::HTTP_OK);
                }
            } else {
                $this->response(array(
                    "status" => "REQUIRED_FIELDS",
                    "message" => "REQUIRED_FIELDS_MESSAGE"
                ), REST_Controller::HTTP_OK);
            }
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }
}

?>
