
<?php


require APPPATH . 'libraries/REST_Controller.php';

class RequestLocation extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('AppModel');
    }

    public function index_post()
    {

        try {
            $userId = $this->input->post('userId');
            $requesterId = $this->input->post('requesterId');
            $locationType = $this->input->post('locationType');
            $status = $this->input->post('status');
            if ($userId != "" && $requesterId != "" && $locationType!=""  ) {
           
                    $requestData = array(
                        "userId" => $userId,
                        "requesterId" => $requesterId,
                        "locationType" => $locationType,
                    );
                     if ($this->AppModel->replace($requestData,"locationrequest") ==true ) {
                  
                        #sendMail($email,'verfication COde',$verficationCode);
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