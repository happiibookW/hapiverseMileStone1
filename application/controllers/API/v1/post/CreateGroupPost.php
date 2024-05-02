
<?php


require APPPATH . 'libraries/REST_Controller.php';

class CreateGroupPost extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('AppModel');
        $this->load->model('PostModel');
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
    }

    public function index_post()
    {

        try {
            $userId = $this->input->post('userId');
            $groupId = $this->input->post('groupId');
            $caption = $this->input->post('caption');
            $privacy = $this->input->post('privacy');
            $content_type = $this->input->post('content_type');
            $postType = $this->input->post('postType');
            $font_color = $this->input->post('font_color');
            $text_back_ground = $this->input->post('text_back_ground');
            $posted_date = $this->input->post('posted_date');
            $expire_at = $this->input->post('expire_at');
            $interest = $this->input->post('interest');
            $location = $this->input->post('location');
            $active = $this->input->post('active');
            $postContentText = $this->input->post('postContentText');
            $lastpostId      = $this->PostModel->maxid();
             $postId         = $lastpostId['max_id'] + 1;
            if ($userId != "" && $content_type != "" && $postType != "" &&  $groupId!="" && $postType!="") {
             
                $groupData = array(
                    "postId"=>$postId,
                    "userId" => $userId,
                    "groupId" =>$groupId,
                    "caption" => $caption,
                    "privacy" => $privacy,
                    "content_type" => $content_type,
                    "postType" => $postType,
                    "font_color" => $font_color,
                    "text_back_ground" => $text_back_ground,
                    "posted_date" => $posted_date,
                    "expire_at" => $expire_at,
                    "interest" => $interest,
                    "location" => $location,
                    "active" => $active,
                    "postContentText" =>$postContentText
                );
                   $gallaryfile = array();
                    if(isset($_FILES['postFileUrl']['name']) && !empty($_FILES['postFileUrl']['name'])){
                    $count = count($_FILES['postFileUrl']['name']);
                    
                    for ($i = 0; $i < $count; $i++) {
                        
                        if (!empty($_FILES['postFileUrl']['name'][$i])) {
                            
                            $_FILES['file']['name']     = $_FILES['postFileUrl']['name'][$i];
                            $_FILES['file']['type']     = $_FILES['postFileUrl']['type'][$i];
                            $_FILES['file']['tmp_name'] = $_FILES['postFileUrl']['tmp_name'][$i];
                            $_FILES['file']['error']    = $_FILES['postFileUrl']['error'][$i];
                            $_FILES['file']['size']     = $_FILES['postFileUrl']['size'][$i];
                            
                            $config['upload_path']   = 'public/postdoc/';
                            $config['allowed_types'] = 'jpg|jpeg|png|gif|mp4|wmv|mkv|MP4|MOV|mov|FLV|flv|HEVC|hevc';
                            $config['max_size'] = '5000000';
                            $config['encrypt_name']      = TRUE;
                            $config['file_name']     = $_FILES['postFileUrl']['name'][$i];
                            
                            $this->load->library('upload', $config);
                            
                            if ($this->upload->do_upload('file')) {
                                $uploadData = $this->upload->data();
                                $filename   = array(
                                    'userId' => $userId,
                                    "postId"=>$postId,
                                    "postFileUrl" => "postdoc/".$uploadData['file_name']
                                );
                                
                                $gallaryfile[] = $filename;
                            }
                        }
                        
                    }
                    $gimage = count($gallaryfile);
								if($gimage > 0) {
									$this->PostModel->addpostfiles($gallaryfile);
								}
                    }
                if ($this->PostModel->insert($groupData, "mstpost") == true) {
                    $this->response(array(
                        "status" => DATA_SAVE,
                        "message" => DATA_SAVE_MESSAGE,
                         "postId"=> $postId
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
