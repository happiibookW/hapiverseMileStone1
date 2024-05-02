
<?php


require APPPATH . 'libraries/REST_Controller.php';

class ViewClickAds extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('GeneralModel');
    }

    public function index_post()
    {

        try {

            $userId = $this->input->post('userId');
            $adsId = $this->input->post('adsId');
            $deviceType = $this->input->post('deviceType');
            $country = $this->input->post('country');
            $city = $this->input->post('city');
            $latitude = $this->input->post('latitude');
            $longitude = $this->input->post('longitude');
            $isClick = $this->input->post('isClick');
         
            if ($userId != "" && $adsId != "" ) {
       
                $viewsData = array(
                    "userId" => $userId,
                    "adsId" => $adsId,
                    "deviceType" => $deviceType,
                    "country" => $country,
                    "city" => $city,
                    "latitude" => $latitude,
                    "longitude" => $longitude,
                    "isClick" => $isClick,
                 
                );



                if ($this->GeneralModel->insert($viewsData, "viweandclickonads") == true) {

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