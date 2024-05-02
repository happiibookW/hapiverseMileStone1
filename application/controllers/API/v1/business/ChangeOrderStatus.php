
<?php


require APPPATH . 'libraries/REST_Controller.php';

class ChangeOrderStatus extends REST_Controller
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
          
            if ($orderId != "" && $orderStatus!="" ) {
           $compare=array(
               "orderId"=>$orderId,
               );
               $orderData=array(
                   "orderStatus"=>$orderStatus,
                   ($orderStatus==3)?"deleiveredDate":"activeDate"=>date("Y-m-d H:i:s"),
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