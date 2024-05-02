
<?php


require APPPATH . 'libraries/REST_Controller.php';

class ShipOrder extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('BusinessModel');
    }

    public function index_post()
    {

        try {

            $orderId = $this->input->post('orderId');
            $orderStatus=$this->input->post('orderStatus');
            if($this->input->post('shippingBy')!=""){
           $orderData['shippingBy']=$this->input->post('shippingBy');
            }
             if($this->input->post('shippingCost')!=""){
           $orderData['shippingCost']=$this->input->post('shippingCost');
            }
               if($this->input->post('orderStatus')!=""){
           $orderData['orderStatus']=$this->input->post('orderStatus');
            }
  
            if ($orderId != "" ) {
           $compare=array(
               "orderId"=>$orderId,
               );
                if ($this->BusinessModel->update($orderData, "businessOrders",$compare) == true) {
                  
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