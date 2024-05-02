
<?php


require APPPATH . 'libraries/REST_Controller.php';

class UserAdd extends REST_Controller
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
            $userName = $this->input->post('userName');
            $email = $this->input->post('email');
            $DOB = $this->input->post('DOB');
            $martialStatus = $this->input->post('martialStatus');
            $gender = $this->input->post('gender');
            $city = $this->input->post('city');
            $postCode = $this->input->post('postCode');
            $country = $this->input->post('country');
            $lat = $this->input->post('lat');
            $long = $this->input->post('long');
            $address = $this->input->post('address');
            $userTypeId = $this->input->post('userTypeId');
            $password = $this->input->post('password');
            $phoneNo = $this->input->post('phoneNo');
            $userId = random_string('unique', 10);
            $token = random_string('alnum', 100);
            if ($userName != "" && $phoneNo != ""  && $password != "" && $userTypeId!="") {
                ////! Check Email Available in user Master Table
                $verify = array(
                    "email" => $email,
                );
                // if ($this->UserModel->alreadyExists($verify, 'mstauthorization') == false) {
                    $upload = array(
                        "upload_path" => "public/userdoc/",
                        "allowed_types" => "jpg|png|jpeg|PNG|JPG|JPEG|PDF|DOC|CSV",
                        "max_size" => 100000,
                        "encrypt_name" => TRUE
                    );

                    $this->load->library('upload', $upload);
                    if(isset($_FILES['profileImageUrl']['name']) && !empty($_FILES['profileImageUrl']['name'])){
                         if (!$this->upload->do_upload('profileImageUrl')) {
                        echo $this->upload->display_errors();
                    } else {
                        $data       = $this->upload->data();
                        $profileImageUrl = "public/userdoc/" . $data['file_name'];
                    }
                       
                       
                    }else{
                        
                     $profileImageUrl = "public/userdoc/profile.png";
                    
                    }
                    $verificationCode = rand(1000, 9999);
                    $userData = array(
                        "userId" => $userId,
                        "userName" => $userName,
                        "email" => $email,
                        "DOB" => $DOB,
                        "martialStatus" => $martialStatus,
                        "profileImageUrl" => $profileImageUrl,
                        "gender" => $gender,
                        "city" => $city,
                        "postCode" => $postCode,
                        "country" => $country,
                        "lat" => $lat,
                        "long" => $long,
                        "address" => $address,
                        "userTypeId" => $userTypeId,
                        "phoneNo" => $phoneNo,
                    );
                    $authdata = array(
                        "userId" => $userId,
                        "email" => $email,
                        "phoneNo" => $phoneNo,
                        "password" => md5($password),
                        "token" => $token,
                        "verificationCode" => $verificationCode,
                    );
                    $profileImagedata=array(
                        "userId"=>$userId,
                        "profileImageUrl"=>$profileImageUrl
                        );

                    if ($this->UserModel->insert($userData, "mstuser") ==true ) {
                  
                        $this->UserModel->insertauth($authdata);
                        $this->UserModel->updateProfile($profileImagedata,"profileimageavatar");
                        #sendMail($email,'verfication COde',$verficationCode);
                        $this->response(array(
                            "userId"=>$userId,
                            "status" => DATA_SAVE,
                            "message" => DATA_SAVE_MESSAGE
                        ), REST_Controller::HTTP_OK);
                    } else {
                        $this->response(array(
                            "status" => DATA_SAVE_ERROR,
                            "message" => DATA_SAVE_MESSAGE
                        ), REST_Controller::HTTP_OK);
                    }
                // } else {
                //     $this->response(array(
                //         "status" => ALREADY_EXIST,
                //         "message" => ALREADY_EXIST_MESSAGE
                //     ), REST_Controller::HTTP_OK);
                // }
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
