
<?php


require APPPATH . 'libraries/REST_Controller.php';

class AddBusinessRating extends REST_Controller
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
            $rating = $this->input->post('rating');
            $comment = $this->input->post('comment');
            $userId = $this->input->post('userId');
            if ($businessId != "" && $userId != "" && $comment != "" && $rating!="") {
                $ratingData=array(
                    "businessId"=>$businessId,
                    "userId"=>$userId,
                    "comment"=>$comment,
                    "rating"=>$rating,
                    );
                if ($this->BusinessModel->insertRating($ratingData, "mstbusinessrating") == true) {
                    #sendMail($email,'verfication COde',$verficationCode);
                    $this->response(array(
                        "userId"=> $businessId,
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