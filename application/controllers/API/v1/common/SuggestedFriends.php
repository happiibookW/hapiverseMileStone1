
<?php


require APPPATH . 'libraries/REST_Controller.php';

class SuggestedFriends extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('UserModel');
        $this->load->model('AppModel');
        $haveAccess = array(
            'userId' => $this->input->get_request_header('userId'),
            // 'token' => $this->input->get_request_header('token'),
        );
        if ($this->AppModel->haveaccess($haveAccess) == false) {
            $this->response(array(
                "status" => UNAUTHORIZED,
                "message" => UNAUTHORIZED_MESSAGE
            ), REST_Controller::HTTP_UNAUTHORIZED);
        }
    }

    public function index_post()
    {

        try {
            $userId = $this->input->post('userId');
            $latitude = $this->input->post('latitude');
            $longitude = $this->input->post('longitude');
            if ($userId != "" && $latitude !="" && $longitude!="") {
                $data = array(
                    "userId" => $userId,
                    "longitude" => $longitude,
                    "latitude" => $latitude,
                    
                );
                $profiledata = $this->UserModel->fetchSuggestedFriend($data);
                if ($profiledata != "" && !empty($profiledata)) {
                    $this->response(array(
                        "status" => DATA_AVAILABLE,
                        "message" => DATA_AVAILABLE_MESSAGE,
                        "data" => $profiledata,
                    ), REST_Controller::HTTP_OK);
                } else {
                    $this->response(array(
                        "status" => DATA_NOT_AVAILABLE,
                        "message" => DATA_NOT_AVAILABLE_MESSAGE,
                        "data" => $profiledata
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
