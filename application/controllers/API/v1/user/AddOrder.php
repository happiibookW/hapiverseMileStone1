
<?php


require APPPATH . 'libraries/REST_Controller.php';

class AddOrder extends REST_Controller
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

            $businessId = $this->input->post('businessId');
            $userId = $this->input->post('userId');
            $productId = $this->input->post('productId');
            $orderCost = $this->input->post('orderCost');
            $shippingCost = $this->input->post('shippingCost');
            $shippingAddress = $this->input->post('shippingAddress');
            $orderNo=random_string("alnum",6);
         
            if ($businessId != "" && $userId != "" && $productId!="" && $orderCost!="" ) {
                $orderData=array(
                    "orderNo"=>$orderNo,
                    "userId"=>$userId,
                    "businessId"=>$businessId,
                    "productId"=>$productId,
                    "orderCost"=>$orderCost,
                    "shippingCost"=>$shippingCost,
                    "shippingAddress"=>$shippingAddress,
                    "totalAmount"=>$orderCost+$shippingCost,
                    );
                    
                if ($this->UserModel->insertOrder($orderData, "businessOrders") == true) {
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