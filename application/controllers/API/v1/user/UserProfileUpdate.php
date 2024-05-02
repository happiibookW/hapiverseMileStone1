
<?php


require APPPATH . 'libraries/REST_Controller.php';

class UserProfileUpdate extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('UserModel');
        $this->load->model('AppModel');
        $haveAccess = array(
            'userId' => $this->input->get_request_header('userId'),
            // 'token' => $this->input->get_request_header('token'),
        );
        if ($this->AppModel->haveaccess($haveAccess) == false) {
            $this->response(array(
                "status" => UNAUTHORIZED,
                "message" => UNAUTHORIZED_MESSAGE
            ), REST_Controller::HTTP_UNAUTHORIZED);
        }
         header("Access-Control-Allow-Origin: *");
         header('Access-Control-Allow-Methods: GET, POST');
         header("Access-Control-Allow-Headers: *");
    }

    public function index_post()
    {

        try {
            if($this->input->post('userName')!="" && !empty($this->input->post('userName'))){
            $updateData['userName'] = $this->input->post('userName');
            }
            if($this->input->post('email')!=""){
            $updateData['email'] = $this->input->post('email');
            }
            if($this->input->post('DOB')!=""){
            $updateData['DOB'] = $this->input->post('DOB');
            }
            if($this->input->post('martialStatus')!=""){
            $updateData['martialStatus'] = $this->input->post('martialStatus');
            }
            if($this->input->post('profileImageUrl')!=""){
            $updateData['profileImageUrl'] = $this->input->post('profileImageUrl');
            }
            if($this->input->post('gender')!=""){
            $updateData['gender'] = $this->input->post('gender');
            }
            if($this->input->post('city')!=""){
            $updateData['city'] = $this->input->post('city');
            }
			if($this->input->post('state')!=""){
				$updateData['state'] = $this->input->post('state');
				}
            if($this->input->post('postCode')!=""){
            $updateData['postCode'] = $this->input->post('postCode');
            }
            if($this->input->post('country')!=""){
            $updateData['country'] = $this->input->post('country');
            }
            if($this->input->post('lat')!=""){
            $updateData['lat'] = $this->input->post('lat');
            }
            if($this->input->post('long')!=""){
            $updateData['long'] = $this->input->post('long');
            }
            if($this->input->post('address')!=""){
            $updateData['address'] = $this->input->post('address');
            }
            if($this->input->post('userTypeId')!=""){
            $updateData['userTypeId'] = $this->input->post('userTypeId');
            }
            if($this->input->post('phoneNo')!=""){
            $updateData['phoneNo'] = $this->input->post('phoneNo');
            }
			if($this->input->post('height')!=""){
				$updateData['height'] = $this->input->post('height');
			}
			if($this->input->post('religion')!=""){
				$updateData['religion'] = $this->input->post('religion');
			}
			if($this->input->post('weight')!=""){
				$updateData['weight'] = $this->input->post('weight');
			}
             // if($this->input->post('avatarType')!=""){
            $updateData['avatarType'] = $this->input->post('avatarType');
           // }
            //  if($this->input->post('flatColor')!=""){
            $updateData['flatColor'] = $this->input->post('flatColor');
           // }
           //   if($this->input->post('profileImageText')!=""){
            $updateData['profileImageText'] = $this->input->post('profileImageText');
           // }
            //  if($this->input->post('isShuffleEnable')!=""){
            $updateData['isShuffleEnable'] = $this->input->post('isShuffleEnable');
          //  }
            $userId = $this->input->post('userId');
            if ($userId != "" ) {
                ////! Check Email Available in user Master Table
                $upload = array(
                    "upload_path" => "public/userdoc/",
                    "allowed_types" => "*",
                    "max_size" => 500000,
                    "encrypt_name" => TRUE
                );
                $profileImageUrl="";
				
				if(isset($_FILES['profileImageUrl']['name']) && !empty($_FILES['profileImageUrl']['name'])){
                $this->load->library('upload', $upload);
				
                if (!$this->upload->do_upload('profileImageUrl')) {
					
                    echo $this->upload->display_errors();
					exit;
                } else {
                    $data       = $this->upload->data();
                    $updateData['profileImageUrl'] = "userdoc/" . $data['file_name'];
                }
                 }
                // $userData = array(
                //     "userId" => $userId,
                //     "userName" => $userName,
                //     "email" => $email,
                //     "DOB" => $DOB,
                //     "martialStatus" => $martialStatus,
                //     "profileImageUrl" => $profileImageUrl,
                //     "gender" => $gender,
                //     "city" => $city,
                //     "postCode" => $postCode,
                //     "country" => $country,
                //     "lat" => $lat,
                //     "long" => $long,
                //     "address" => $address,
                //     "userTypeId" => $userTypeId,
                //     "phoneNo" => $phoneNo,
                // );

                $compare = array(
                    "userId" => $userId,
                );
                if ($this->UserModel->update($updateData, $compare, "mstuser") == true) {
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
