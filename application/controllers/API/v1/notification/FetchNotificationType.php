
<?php


require APPPATH . 'libraries/REST_Controller.php';

class FetchNotificationType extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('NotificationModel');
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

    public function index_get()
    {

        try {

            $notificationdata = $this->NotificationModel->fetch('mstnotificationtype');
            if ($notificationdata != "") {
                $this->response(array(
                    "status" => DATA_AVAILABLE,
                    "message" => DATA_AVAILABLE_MESSAGE,
                    "data" => $notificationdata,
                ), REST_Controller::HTTP_OK);
            } else {
                $this->response(array(
                    "status" => DATA_NOT_AVAILABLE,
                    "message" => DATA_NOT_AVAILABLE_MESSAGE,
                    "data" => $notificationdata
                ), REST_Controller::HTTP_OK);
            }
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }
}

?>
