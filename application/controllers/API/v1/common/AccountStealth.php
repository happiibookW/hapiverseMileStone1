
<?php


require APPPATH . 'libraries/REST_Controller.php';

class AccountStealth extends REST_Controller
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
            $isStealth = $this->input->post('isStealth');
            $userId = $this->input->post('userId');
            $stealthDuration=$this->input->post("stealthDuration");
            $accountType= $this->input->post('accountType');
            
            if ($userId != "" && $isStealth != "" && $stealthDuration!="") {
               
                $stealthData = array(
                    "isStealth" => $isStealth,
                    "userId" => $userId,
                    "stealthDuration"=>$stealthDuration
                );
                $compare=array(
                    "userId"=>$userId,
                    );
                    if($accountType=="business"){
                         $table="mstbusiness";
                    }else{
                        $table="mstuser";
                    }
                if ($this->AuthenticationModel->update($compare,$stealthData,$table) == true) {
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
