
<?php


require APPPATH . 'libraries/REST_Controller.php';

class GroupSearch extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('GroupModel');
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
            $keyword = $this->input->post('keyword');
            if ($userId != "") {
                $data = array(
                    "userId" => $userId,
                    "keyword"=>$keyword
                );
                $groupdata = $this->GroupModel->findgroup($data);
                if ($groupdata != "" && !empty($groupdata)) {
                    $this->response(array(
                        "status" => DATA_AVAILABLE,
                        "message" => DATA_AVAILABLE_MESSAGE,
                        "data" => $groupdata,
                    ), REST_Controller::HTTP_OK);
                } else {
                    $this->response(array(
                        "status" => DATA_NOT_AVAILABLE,
                        "message" => DATA_NOT_AVAILABLE_MESSAGE,
                        "data" => $groupdata
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
