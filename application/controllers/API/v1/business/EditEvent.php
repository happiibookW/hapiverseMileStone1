
<?php


require APPPATH . 'libraries/REST_Controller.php';

class EditEvent extends REST_Controller
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
            if($this->input->post('eventName')!=""){
            $eventData['eventName'] = $this->input->post('eventName');
            }
             if($this->input->post('eventDescription')!=""){
            $eventData['eventDescription'] = $this->input->post('eventDescription');
             }
              if($this->input->post('eventTime')!=""){
            $eventData['eventTime'] = $this->input->post('eventTime');
              }
               if($this->input->post('eventDate')!=""){
            $eventData['eventDate'] = $this->input->post('eventDate');
               }
                if($this->input->post('latitude')!=""){
            $eventData['latitude'] = $this->input->post('latitude');
                }
                 if($this->input->post('longitude')!=""){
            $eventData['longitude'] = $this->input->post('longitude');
                 }
                  if($this->input->post('address')!=""){
            $eventData['address'] = $this->input->post('address');
                  }
            $eventId=$this->input->post('eventId');
            if ($businessId != "" && $eventId!="" ) {
           $compare=array(
               "businessId"=>$businessId,
               "eventId"=>$eventId
               );
                if ($this->BusinessModel->editEvent($eventData, "mstevent",$compare) == true) {
                    #sendMail($email,'verfication COde',$verficationCode);
                     $gallaryfile = array();
                    
                    $count = count($_FILES['imageUrl']['name']);
                    
                    for ($i = 0; $i < $count; $i++) {
                        
                        if (!empty($_FILES['imageUrl']['name'][$i])) {
                            
                            $_FILES['file']['name']     = $_FILES['imageUrl']['name'][$i];
                            $_FILES['file']['type']     = $_FILES['imageUrl']['type'][$i];
                            $_FILES['file']['tmp_name'] = $_FILES['imageUrl']['tmp_name'][$i];
                            $_FILES['file']['error']    = $_FILES['imageUrl']['error'][$i];
                            $_FILES['file']['size']     = $_FILES['imageUrl']['size'][$i];
                            
                            $config['upload_path']   = 'business/event/';
                            $config['allowed_types'] = 'jpg|jpeg|png|gif';
                            $config['max_size']      = '5000';
                            $config['file_name']     = $_FILES['imageUrl']['name'][$i];
                            
                            $this->load->library('upload', $config);
                            
                            if ($this->upload->do_upload('file')) {
                                $uploadData = $this->upload->data();
                                $filename   = array(
                                    'eventId' => $eventId,
                                    "imageUrl" => "business/event/".$uploadData['file_name']
                                );
                                
                                $gallaryfile = $filename;
                            }
                        }
                       $this->BusinessModel->eventImage($gallaryfile); 
                    }
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