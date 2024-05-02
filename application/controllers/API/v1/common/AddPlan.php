
<?php


require APPPATH . 'libraries/REST_Controller.php';

class AddPlan extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('UserModel');
    }

    public function index_post()
    {

        try {
            $email = $this->input->post('email');
            $planId = $this->input->post('planId');
            $planStartDate = $this->input->post('planStartDate');
            $planEndDate = $this->input->post('planEndDate');
           
            if ($email != "" && $planId != ""  ) {
           
                    $planData = array(
                        "planId" => $planId,
                        "planStartDate" => $planStartDate,
                        "email" => $email,
                        "planEndDate"=>$planEndDate
                       
                    );
                     if ($this->UserModel->insertPlan($planData, "choosedplan") ==true ) {
                  
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