
<?php


require APPPATH . 'libraries/REST_Controller.php';

class EditBusinessHour extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('BusinessModel');
    }

    public function index_post()
    {

        try {
            $hoursId=$this->input->post('hoursId');
            $openTime=$this->input->post('openTime');
            $closeTime=$this->input->post('closeTime');
            if ($hoursId!=""&& $closeTime!="" && $closeTime!="" ) {
              $compare=array(
               "hoursId"=>$hoursId,
          
               );
               $dataToUpdate=array(
                   "openTime"=>$openTime,
                   "closeTime"=>$closeTime,
                   );
                if ($this->BusinessModel->update($dataToUpdate, "trnbusinessHours",$compare) == true) {
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