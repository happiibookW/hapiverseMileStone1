
<?php


require APPPATH . 'libraries/REST_Controller.php';

class PushNotification extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('NotificationModel');
        $this->load->model('AppModel');
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
            $senderId = $this->input->post('senderId');
            $receiverId = $this->input->post('receiverId');
            $notificationTypeId = $this->input->post('notificationTypeId');
            $subject = $this->input->post('subject');
            $body = $this->input->post('body');
            $id = $this->input->post('id');
            if ($senderId != "" && $receiverId != "" && $notificationTypeId != "" && $subject != "" && $body != "") {
                $notificationData = array(
                    "senderId" => $senderId,
                    "receiverId" => $receiverId,
                    "notificationTypeId" => $notificationTypeId,
                    "subject" => $subject,
                    "body" => $body,
                    "id"=>$id
                );
                if ($this->NotificationModel->insert($notificationData, "mstnotification") == true) {
                    $userSetting=getSetting($receiverId);
                    if(($notificationTypeId==3 && $userSetting['groupNotification']==0) || ($notificationTypeId==4 && $userSetting['postNotification']==0) ||
                        ($notificationTypeId==5 &&
                        $userSetting['allNotification']==0
                           )){
                             $userInfo=$this->NotificationModel->fetchToken($receiverId);
                //   $to=$userInfo['fcmToken'];
                foreach($userInfo as $tokens){
                    //   $to=$tokens['fcmToken'];
                  $to = "en5sZtwG1EoPsplaYK8gZd:APA91bHTiWAo4vtC0MCw33X0YSdPgZSxlHdxuyn2oz85lVWEJ7r5xZS1EGF9O0zdTXoiq_Jlu2ZtDodCob1MZ3_E40qsI2fgYzMprS8Jvhuo2OU9aYp4D878hgGuaeRyBDGktWpKjtfS";
                    $test=$this->sendnotification($to,$subject,$body);
                    print_r($test);
                }
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
    function sendnotification($to, $title, $message, $img = "", $datapayload = "")
    {
        $msg = urlencode($message);
        $data = array(
            'title' => $title,
            'sound' => "default",
            'msg' => $msg,
            // 'data' => $datapayload,
            'body' => $message,
            'color' => "#79bc64"
        );
        if ($img) {
            $data["image"] = $img;
            $data["style"] = "picture";
            $data["picture"] = $img;
        }
        $fields = array(
            'to' => $to,
            'notification' => $data,
            // 'data' => $datapayload,
            "priority" => "high",
        );
		$token = $this->config->item('MAP_API_KEY');
        $headers = array(
            'Authorization:key='.$token.'',
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}

?>
