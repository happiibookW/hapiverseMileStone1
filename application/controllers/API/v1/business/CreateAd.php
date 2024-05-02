
<?php


require APPPATH . 'libraries/REST_Controller.php';

class CreateAd extends REST_Controller
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
            $adType = $this->input->post('adType');
            $adTitle = $this->input->post('adTitle');
            $adDescription = $this->input->post('adDescription');
            $adContent = $this->input->post('adContent');
            $audianceStartAge = $this->input->post('audianceStartAge');
            $audianceEndAge = $this->input->post('audianceEndAge');
            $startDate = $this->input->post('startDate');
            $endDate = $this->input->post('endDate');
            $totalBudget = $this->input->post('totalBudget');
            $totalimpressions = $this->input->post('totalimpressions');
            $status = $this->input->post('status');
         
            if ($businessId != "" && $adType != "" && $adTitle != "" && $adDescription!="" && $adContent!="") {
                $aData=array(
                    "businessId"=>$businessId,
                    "adType"=>$adType,
                    "adTitle"=>$adTitle,
                    "adDescription"=>$adDescription,
                    "adContent"=>$adContent,
                    "audianceStartAge"=>$audianceStartAge,
                    "audianceEndAge"=>$audianceEndAge,
                    "startDate"=>$startDate,
                    "endDate"=>$endDate,
                    "totalBudget"=>$totalBudget,
                    "totalimpressions"=>$totalimpressions,
                    "status"=>$status,
                    );
                if ($this->BusinessModel->insertAd($aData, "businessads") == true) {
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