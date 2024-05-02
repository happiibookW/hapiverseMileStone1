
<?php


require APPPATH . 'libraries/REST_Controller.php';

class EditProductImage extends REST_Controller
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

            $imageId = $this->input->post('imageId');
            $productId = $this->input->post('productId');
             $compare=array(
                    "imageId"=>$imageId,
                    "productId"=>$productId,
                    );
                    $productData=array();
            if ($imageId != "" && $productId != "" && isset($_FILES['imageUrl']['name']) && !empty($_FILES['imageUrl']['name'])) {
                   if (!$this->upload->do_upload('imageUrl')) {
                        echo $this->upload->display_errors();
                    } else {
                        $data       = $this->upload->data();
                        $productData['imageUrl'] = "business/product/" . $data['file_name'];
                    }
                
                if ($this->BusinessModel->updatePrdoductData($productData, "businessproductimages",$compare) == true) {
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