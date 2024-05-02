
<?php


require APPPATH . 'libraries/REST_Controller.php';

class GenerateRefferelCode extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('SponserModel');
    }

    public function index_post()
    {

        try {

            $businessId = $this->input->post('businessId');
            $planId = $this->input->post('planId');
            $accountType = $this->input->post('accountType');
            $refferalCode = $this->input->post('refferalCode');
         
         
            if ($businessId != "" && $planId != "" && $accountType != "" && $refferalCode!="") {
       
                $sponserData = array(
                    "businessId" => $businessId,
                    "accountType" => $accountType,
                    "planId" => $planId,
                    "refferalCode" => $refferalCode,
                 
                );



                if ($this->SponserModel->insert($sponserData, "sponseraccountinfo") == true) {

                    #sendMail($email,'verfication COde',$verficationCode);
                    $this->response(array(
                        "userId"=> $businessId,
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