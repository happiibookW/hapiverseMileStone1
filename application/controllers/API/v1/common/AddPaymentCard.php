
<?php


require APPPATH . 'libraries/REST_Controller.php';

class AddPaymentCard extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('PaymentModel');
    }

    public function index_post()
    {

        try {
            $userId = $this->input->post('userId');
            $userTypeId = $this->input->post('userTypeId');
            $cardHolderName = $this->input->post('cardHolderName');
            $cardNumber = $this->input->post('cardNumber');
            $cvc = $this->input->post('cvc');
            $expiryDate = $this->input->post('expiryDate');
           
            if ($userId != "" && $userTypeId != "" && $cardHolderName!="" && $cardNumber!="" && $cvc!="" && $expiryDate!="" ) {
           
                    $cardData = array(
                        "userId" => $userId,
                        "userTypeId" => $userTypeId,
                        "cardHolderName" => $cardHolderName,
                        "cardNumber"=>$cardNumber,
                        "cvc"=>$cvc,
                        "expiryDate"=>$expiryDate,
                       
                    );
                     if ($this->PaymentModel->insert($cardData, "userpaymentcard") ==true ) {
                  
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