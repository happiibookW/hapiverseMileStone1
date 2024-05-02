
<?php


require APPPATH . 'libraries/REST_Controller.php';

class DeleteCollection extends REST_Controller
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
            $collectionId = $this->input->post('collectionId');
            if ($collectionId != "") {
                $data = array(
                    "collectionId" => $collectionId,
                );
                $profiledata = $this->BusinessModel->deleteData($data,'productcollection');
                if ($profiledata == true) {
                    $dataToUpdate=array("collectionId"=>NULL);
                    $this->BusinessModel->updatePrdoductData($dataToUpdate,"businessproduct",$data);
                    $this->response(array(
                        "status" => DELETE,
                        "message" => DELETE_MESSAGE,
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
