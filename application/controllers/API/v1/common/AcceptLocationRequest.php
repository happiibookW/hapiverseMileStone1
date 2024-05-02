
<?php


require APPPATH . 'libraries/REST_Controller.php';

class AcceptLocationRequest extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('AppModel');
        $this->load->model('AuthenticationModel');
        $haveAccess = array(
            'userId' => $this->input->get_request_header('userId'),
            // 'token' => $this->input->get_request_header('token'),
        );
        if ($this->AppModel->haveaccess($haveAccess) == false) {
            $this->response(array(
                "status" => "UNAUTHORIZED",
                "message" => "UNAUTHORIZED_MESSAGE"
            ), REST_Controller::HTTP_UNAUTHORIZED);
        }
    }

    public function index_post()
    {

        try {
            $requestId = $this->input->post('requestId');
            $userId = $this->input->post('userId');
            $lat=$this->input->post("lat");
            $long=$this->input->post("long");
            $address=$this->input->post("address");
            $status=$this->input->post("status");
            
            if ($userId != "" && $status!="") {
               
                $requestData = array(
                    "status"=>$status
                );
                $compare=array(
                    "userId"=>$userId,
                    "requestId"=>$requestId,
                    );
                $acceptRequestData = array(
                    "userId"=>$userId,
                    "lat"=>$lat,
                    "long"=>$long,
                    "address"=>$address,
                );
                   
                if ($this->AppModel->insert($acceptRequestData,"tracklocation") == true) {
                    if($requestId != ""){
                    $this->AppModel->delete($compare,"locationrequest");
                    }
                    $this->response(array(
                        "status" => DATA_SAVE,
                        "message" => DATA_SAVE_MESSAGE
                    ), REST_Controller::HTTP_OK);
                } else {
                    $this->response(array(
                        "status" => DATA_SAVE_ERROR,
                        "message" => DATA_SAVE_MESSAGE
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
