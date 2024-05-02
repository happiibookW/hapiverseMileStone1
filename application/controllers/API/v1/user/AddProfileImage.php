
<?php


require APPPATH . 'libraries/REST_Controller.php';

class AddProfileImage extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('UserModel');
                    $upload = array(
                        "upload_path" => "public/userdoc/",
                        "allowed_types" => "jpg|png|jpeg|PNG|JPG|JPEG|PDF|DOC|CSV",
                        "max_size" => 100000,
                        "encrypt_name" => TRUE
                    );

                    $this->load->library('upload', $upload);
                     header("Access-Control-Allow-Origin: *");
         header('Access-Control-Allow-Methods: GET, POST');
         header("Access-Control-Allow-Headers: *");
    }

    public function index_post()
    {

        try {
            $profileimageavatar =$this->input->post('profileimageavatar');
            $userId=$this->input->post("userId");
             if ($userId != ""  ){
                 $profiledata['profileimageavatar']=$profileimageavatar;
               if(isset($_FILES['profileImageUrl']['name']) && !empty($_FILES['profileImageUrl']['name'])){
                         if (!$this->upload->do_upload('profileImageUrl')) {
                        echo $this->upload->display_errors();
                    } else {
                        $data       = $this->upload->data();
                        $profiledata['profileImageUrl'] = "public/userdoc/" . $data['file_name'];
                    }
               }
                    if(isset($_FILES['avatarBgImage']['name']) && !empty($_FILES['avatarBgImage']['name'])){
                         if (!$this->upload->do_upload('avatarBgImage')) {
                        echo $this->upload->display_errors();
                    } else {
                        $data       = $this->upload->data();
                        $profiledata['avatarBgImage'] = "public/userdoc/" . $data['file_name'];
                    }
               }
                $profiledataStatus = $this->UserModel->updateProfile($profiledata,'profileimageavatar');
                if ($profiledataStatus == true) {
                    $this->response(array(
                        "status" => DATA_SAVE,
                        "message" => DATA_SAVE_MESSAGE,
                    ), REST_Controller::HTTP_OK);
                } else {
                    $this->response(array(
                        "status" => DATA_SAVE_ERROR,
                        "message" => DATA_SAVE_ERROR_MESSAGE,
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
