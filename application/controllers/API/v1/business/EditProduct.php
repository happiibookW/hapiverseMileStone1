
<?php


require APPPATH . 'libraries/REST_Controller.php';

class EditProduct extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('BusinessModel');
                $upload = array(
                    "upload_path" => "business/product",
                    "allowed_types" => "jpg|png|jpeg|PNG|JPG|JPEG|PDF|DOC|CSV|Uint8List",
                    "max_size" => 100000,
                    "encrypt_name" => TRUE
                );
                $this->load->library('upload', $upload);
    }

    public function index_post()
    {

        try {

            $businessId = $this->input->post('businessId');
            $productId = $this->input->post('productId');
              $compare=array(
                    "businessId"=>$businessId,
                    "productId"=>$productId,
                    );
            if($this->input->post('productName')!=""){
            $productData['productName'] = $this->input->post('productName');
            }
            if($this->input->post('productPrice')!=""){
            $productData['productPrice'] = $this->input->post('productPrice');
            }
            if($this->input->post('discouintedPrice')!=""){
            $productData['discouintedPrice'] = $this->input->post('discouintedPrice');
            }
            if($this->input->post('isDiscountActive')!=""){
            $productData['isDiscountActive'] = $this->input->post('isDiscountActive');
            }
            if($this->input->post('productdescription')!=""){
            $productData['productdescription'] = $this->input->post('productdescription');
            }
            if($this->input->post('collectionId')!=""){
            $productData['collectionId'] = $this->input->post('collectionId');
            }
            if ($businessId != "" && $productId != "" ) {
                if ($this->BusinessModel->updatePrdoductData($productData, "businessproduct",$compare) == true) {
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