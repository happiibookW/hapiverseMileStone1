
<?php


require APPPATH . 'libraries/REST_Controller.php';

class CreateGroup extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('AppModel');
        $this->load->model('GroupModel');
        $haveAccess = array(
            'userId' => $this->input->get_request_header('userId'),
            // 'token' => $this->input->get_request_header('token'),
        );
        if ($this->AppModel->haveaccess($haveAccess) == false) {
            $this->response(array(
                "status" => "UNAUTHORIZED",
                "message" => "UNAUTHORIZED_MESSAGE"
            ), REST_Controller::HTTP_UNAUTHORIZED);
        }
    }

    public function index_post()
    {

        try {
			$upload_path = 'public/groupdoc/';
			if (!is_dir($upload_path )) {
				if (!mkdir($upload_path , 0777, true)) {
					echo "Failed to create year directory";
					exit;
				}
			}
            $userId = $this->input->post('userId');
            $groupName = $this->input->post('groupName');
            $groupPrivacy = $this->input->post('groupPrivacy');
            if ($userId != "" && $groupName != "" && $groupPrivacy != "") {
                $verify = array(
                    "groupAdminId"=>$userId,
                    "groupName" => $groupName,
                );
                if ($this->GroupModel->alreadyExists($verify, 'mstgroup') == false) {
                $upload = array(
                    "upload_path" => $upload_path,
                    "allowed_types" => "jpg|png|jpeg|PNG|JPG|JPEG|PDF|DOC|CSV",
                    "max_size" => 100000,
                    "encrypt_name" => TRUE
                );

                $this->load->library('upload', $upload);
                if (!$this->upload->do_upload('groupImageUrl')) {
                    echo $this->upload->display_errors();
                } else {
                    $data       = $this->upload->data();
                    $groupImageUrl = "groupdoc/" . $data['file_name'];
                }
                $groupData = array(
                    "groupAdminId" => $userId,
                    "groupName" => $groupName,
                    "groupImageUrl" => $groupImageUrl,
                    "groupPrivacy" => $groupPrivacy,
                );
                if ($this->GroupModel->groupcreate($groupData, "mstgroup") == true) {
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
                    "status" => ALREADY_EXIST,
                    "message" => ALREADY_EXIST_MESSAGE
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
