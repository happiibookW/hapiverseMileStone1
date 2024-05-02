
<?php


require APPPATH . 'libraries/REST_Controller.php';

class AddCollection extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('BusinessModel');
    }

    public function index_post()
    {

        try {

            $businessId = $this->input->post('businessId');
            $collectionName = $this->input->post('collectionName');
            $oldProductList = $this->input->post('oldProductList');
            $productList = $this->input->post('productList');
            if ($businessId != "" && $collectionName != "" && $productList!="" ) {
                $productData=array(
                    "businessId"=>$businessId,
                    "collectionName"=>$collectionName,
                    );
                    
                if ($this->BusinessModel->insertcollection($productData, "productcollection",$productList,$oldProductList) == true) {
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