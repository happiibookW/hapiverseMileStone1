
<?php


require APPPATH . 'libraries/REST_Controller.php';

class FetchBusinessRating extends REST_Controller
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
            $businessId = $this->input->post('userId');
            if ($businessId != "") {
                $data = array(
                    "businessId" => $businessId,
                );
                $profiledata = $this->BusinessModel->fetchReviewRating($data,"mstbusinessrating");
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