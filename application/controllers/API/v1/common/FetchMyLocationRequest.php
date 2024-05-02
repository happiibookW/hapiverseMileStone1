
<?php


require APPPATH . 'libraries/REST_Controller.php';

class FetchMyLocationRequest extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('PaymentModel');
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
            $requestType=$this->input->post('requestType');
            if ($userId != "" && $requestType!="") {
              
                $data = array(
                    "userId" => $userId,
                    "requestType"=>$requestType
                );
              
                $locationdata = $this->AppModel->fetch($data,"locationrequest");
                if ($locationdata != "" && !empty($locationdata)) {
                    $this->response(array(
                        "status" => DATA_AVAILABLE,
                        "message" => DATA_AVAILABLE_MESSAGE,
                        "data" => $locationdata,
                    ), REST_Controller::HTTP_OK);
                } else {
                    $this->response(array(
                        "status" => DATA_NOT_AVAILABLE,
                        "message" => DATA_NOT_AVAILABLE_MESSAGE,
                        "data" => $locationdata
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
