
<?php


require APPPATH . 'libraries/REST_Controller.php';

class AddMember extends REST_Controller
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
            $groupMemberId = $this->input->post('groupMemberId');
            $addedById = $this->input->post('addedById');
            $groupId = $this->input->post('groupId');
            $memberRole = $this->input->post('memberRole');
            if ($groupMemberId != "" && $addedById != "" && $groupId != "" && $memberRole!="") {
                $groupData = array(
                    "groupMemberId" => $groupMemberId,
                    "addedById" => $addedById,
                    "groupId" => $groupId,
                    "memberRole" => $memberRole,
                );
                if ($this->GroupModel->memeberAdd($groupData, "trngroupmember") == true) {
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
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }
}

?>
