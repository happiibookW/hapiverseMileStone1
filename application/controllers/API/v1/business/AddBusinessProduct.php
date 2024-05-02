
<?php


require APPPATH . 'libraries/REST_Controller.php';

class AddBusinessProduct extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('BusinessModel');
                $upload = array(
                    "upload_path" => "business/product/",
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
            $productName = $this->input->post('productName');
            $productPrice = $this->input->post('productPrice');
            $discouintedPrice = $this->input->post('discouintedPrice');
            $isDiscountActive = $this->input->post('isDiscountActive');
            $productdescription = $this->input->post('productdescription');
            $collectionId = $this->input->post('collectionId');
            $productId=$this->BusinessModel->maxid('businessproduct','productId');
            $productId=$productId['max_id']+1;
            if ($businessId != "" && $productName != "" ) {
                $productData=array(
                    "productId"=>$productId,
                    "businessId"=>$businessId,
                    "productName"=>$productName,
                    "productPrice"=>$productPrice,
                    "discouintedPrice"=>$discouintedPrice,
                    "isDiscountActive"=>$isDiscountActive,
                    "productdescription"=>$productdescription,
                    "collectionId"=>$collectionId,
                    );
                if ($this->BusinessModel->insertproduct($productData, "businessproduct") == true) {
                      
                    $gallaryfile = array();
                    
                    $count = count($_FILES['imageUrl']['name']);
                    
                    for ($i = 0; $i < $count; $i++) {
                        
                        if (!empty($_FILES['imageUrl']['name'][$i])) {
                            
                            $_FILES['file']['name']     = $_FILES['imageUrl']['name'][$i];
                            $_FILES['file']['type']     = $_FILES['imageUrl']['type'][$i];
                            $_FILES['file']['tmp_name'] = $_FILES['imageUrl']['tmp_name'][$i];
                            $_FILES['file']['error']    = $_FILES['imageUrl']['error'][$i];
                            $_FILES['file']['size']     = $_FILES['imageUrl']['size'][$i];
                            
                            $config['upload_path']   = 'public/business/product/';
                            $config['allowed_types'] = 'jpg|jpeg|png|gif';
                            $config['max_size']      = '500000';
                            $config['file_name']     = $_FILES['imageUrl']['name'][$i];
                            
                            $this->load->library('upload', $config);
                            
                            if ($this->upload->do_upload('file')) {
                                $uploadData = $this->upload->data();
                                $filename   = array(
                                    'productId' => $productId,
                                    "imageUrl" => "business/product/".$uploadData['file_name']
                                );
                                $this->BusinessModel->businessProductImage($gallaryfile);
                                // $gallaryfile = $filename;
                            }
                        }
                       
                    }
                    
                    
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
