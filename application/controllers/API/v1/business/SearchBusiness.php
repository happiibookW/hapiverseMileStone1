
<?php


require APPPATH . 'libraries/REST_Controller.php';

class SearchBusiness extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('BusinessModel');
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
            $latitude = $this->input->post('latitude');
            $longitude = $this->input->post('longitude');
            $distance = $this->input->post('distance');
            $keyWord = $this->input->post('keyWord');
            if ($keyWord != "" ) {
                $data = array(
                    "keyWord" => $keyWord,
                    "latitude" => $latitude,
                    "longitude" => $longitude,
                    "distance" =>$distance
                );
                $profiledata = $this->BusinessModel->searchBusinessProfile($data);
                if ($profiledata != "") {
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
