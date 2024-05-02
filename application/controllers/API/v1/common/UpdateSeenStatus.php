
<?php


require APPPATH . 'libraries/REST_Controller.php';

class UpdateSeenStatus extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
         $this->load->model('AppModel');
        $this->load->model('NotificationModel');
 
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
            $notificationId= $this->input->post('notificationId');
       
            
            if ($notificationId != "" ) {
               
                $compare = array(
                    "notificationId" => $notificationId,
                );
                $status=array(
                    "haveSeen"=>1
                    );
                if ($this->NotificationModel->update($status,$compare,"mstnotification") == true) {
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
