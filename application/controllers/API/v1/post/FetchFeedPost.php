
<?php


require APPPATH . 'libraries/REST_Controller.php';

class FetchFeedPost extends REST_Controller
{

    public function __construct()
    {
 header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
        $this->load->model('PostModel');
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
			$userId=$this->input->post("userId");
			if($userId!=""){
				$compare=array(
					"userId"=>$userId,
				);
			$postdata = $this->PostModel->fetchPostFeed($compare);
			if ($postdata != "" && !empty($postdata)) {
				$this->response(array(
					"status" => DATA_AVAILABLE,
					"message" => DATA_AVAILABLE_MESSAGE,
					"data" => $postdata,
				), REST_Controller::HTTP_OK);
			} else {
				$this->response(array(
					"status" => DATA_NOT_AVAILABLE,
					"message" => DATA_NOT_AVAILABLE_MESSAGE,
					"data" => $postdata
				), REST_Controller::HTTP_OK);
			}
			}else{
					$this->response(array(
					"status" => REQUIRED_FIELDS,
					"message" => REQUIRED_FIELDS_MESSAGE,
					"data" => $postdata
				), REST_Controller::HTTP_OK);
			}
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }

	
}

?>
