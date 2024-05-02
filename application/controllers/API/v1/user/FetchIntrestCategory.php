
<?php


require APPPATH . 'libraries/REST_Controller.php';

class FetchIntrestCategory extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('GeneralModel');
        // $haveAccess = array(
        //     'userId' => $this->input->get_request_header('userId'),
        //     // 'token' => $this->input->get_request_header('token'),
        // );
        // if ($this->AppModel->haveaccess($haveAccess) == false) {
        //     $this->response(array(
        //         "status" => UNAUTHORIZED,
        //         "message" => UNAUTHORIZED_MESSAGE
        //     ), REST_Controller::HTTP_UNAUTHORIZED);
        // }
         header("Access-Control-Allow-Origin: *");
         header('Access-Control-Allow-Methods: GET, POST');
         header("Access-Control-Allow-Headers: *");
    }

    public function index_post()
    {

        try {
            $userId = $this->input->post('userId');
          
                $intrestdata = $this->GeneralModel->fetchIntrest();
                if ($intrestdata  != "" && !empty($intrestdata)) {
                    $this->response(array(
                        "status" => DATA_AVAILABLE,
                        "message" => DATA_AVAILABLE_MESSAGE,
                        "data" => $intrestdata ,
                    ), REST_Controller::HTTP_OK);
                } else {
                    $this->response(array(
                        "status" => DATA_NOT_AVAILABLE,
                        "message" => DATA_NOT_AVAILABLE_MESSAGE,
                        "data" => $intrestdata 
                    ), REST_Controller::HTTP_OK);
                }
         
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }
}

?>
