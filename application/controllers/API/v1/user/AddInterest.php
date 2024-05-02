
<?php


require APPPATH . 'libraries/REST_Controller.php';

class AddInterest extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('UserModel');
         header("Access-Control-Allow-Origin: *");
         header('Access-Control-Allow-Methods: GET, POST');
         header("Access-Control-Allow-Headers: *");
    }

    public function index_post()
    {
		
        try {
            $interestSubCategoryId =$this->input->post('interestSubCategoryId');
            $userId=$this->input->post("userId");
			
             if ($userId != "" && $interestSubCategoryId!="" ){
				
              for ($i = 0; $i < count($interestSubCategoryId); $i++) {
				
                    $intrestdata[]=array(
                        "interestSubCategoryId"=>$interestSubCategoryId[$i],
                        "userId"=>$userId,
                        );
                }
				
                $complaintdata = $this->UserModel->insertInterest($intrestdata,'mstuserinterest');
				
                if ($complaintdata == true) {
                    $this->response(array(
                        "status" => DATA_SAVE,
                        "message" => DATA_SAVE_MESSAGE,
                    ), REST_Controller::HTTP_OK);
                } else {
                    $this->response(array(
                        "status" => DATA_SAVE_ERROR,
                        "message" => DATA_SAVE_ERROR_MESSAGE,
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
