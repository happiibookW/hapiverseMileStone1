
<?php


require APPPATH . 'libraries/REST_Controller.php';

class ChangeAdStatus extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('BusinessModel');
    }

    public function index_post()
    {

        try {

            $adId = $this->input->post('adId');
            $status=$this->input->post('status');
          
            if ($adId != "" && $status!="" ) {
           $compare=array(
               "adId"=>$adId,
               );
               $orderData=array(
                   "status"=>$status,
                   );
                if ($this->BusinessModel->update($orderData, "businessads",$compare) == true) {
                  
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