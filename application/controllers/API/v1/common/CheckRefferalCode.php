
<?php


require APPPATH . 'libraries/REST_Controller.php';

class CheckRefferalCode extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('SponserModel');
    }

    public function index_post()
    {

        try {

            $refferalCode = $this->input->post('refferalCode');
         
         
            if ($refferalCode!="") {
       
                $sponserData = array(
                    "refferalCode" => $refferalCode,
                 
                );


              $refferalData=$this->SponserModel->fetch($sponserData, "sponseraccountinfo");
                if ($refferalData !="") {

                    #sendMail($email,'verfication COde',$verficationCode);
                    $this->response(array(
                         "status" => DATA_AVAILABLE,
                        "message" => DATA_AVAILABLE_MESSAGE,
                        "data" => $refferalData,
                    ), REST_Controller::HTTP_OK);
                } else {
                    $this->response(array(
                       "status" => DATA_NOT_AVAILABLE,
                        "message" => DATA_NOT_AVAILABLE_MESSAGE,
                        "data" => $refferalData
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