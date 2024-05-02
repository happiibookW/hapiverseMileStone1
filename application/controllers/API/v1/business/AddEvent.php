
<?php


require APPPATH . 'libraries/REST_Controller.php';

class AddEvent extends REST_Controller
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
            $eventName = $this->input->post('eventName');
            $eventDescription = $this->input->post('eventDescription');
            $eventTime = $this->input->post('eventTime');
            $eventDate = $this->input->post('eventDate');
            $latitude = $this->input->post('latitude');
            $longitude = $this->input->post('longitude');
            $address = $this->input->post('address');
            $eventId=$this->BusinessModel->maxid('mstevent','eventId');
            $eventId=$eventId['max_id']+1;
            if ($businessId != "" && $eventName != "" && $eventTime!="" && $eventDate!="" ) {
				
                $eventData=array(
                    "eventId"=>$eventId,
                    "businessId"=>$businessId,
                    "eventName"=>$eventName,
                    "eventDescription"=>$eventDescription,
                    "eventTime"=>$eventTime,
                    "eventDate"=>$eventDate,
                    "latitude"=>$latitude,
                    "longitude"=>$longitude,
                    "address"=>$address,
				);
                    
                if ($this->BusinessModel->insertEvent($eventData, "mstevent") == true) {
					
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
                            
                            $config['upload_path']   = 'public/business/event/';
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
