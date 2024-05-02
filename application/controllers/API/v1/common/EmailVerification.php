
<?php


require APPPATH . 'libraries/REST_Controller.php';

class EmailVerification extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('UserModel');
		$this->load->library('email');
    }

    public function index_post()
    {
		
        try {
            $email = $this->input->post('email');
            if ( $email != ""  ) {
                $verificationCode=mt_rand(1000,9999);
                $emailData = array(
                    "email" => $email,
                    "verificationCode"=>$verificationCode
                );
                $user=$this->UserModel->alreadyExists(array("email"=>$email),"mstuser");
				$business=$this->UserModel->alreadyExists(array("email"=>$email),"mstbusiness");
				if($user==false && $business==false){
                if ($this->UserModel->addEmail($emailData, "mstauthorization") == true) {
                    $message="Your verification code is: ".$verificationCode;


					$config['protocol'] = 'smtp';
					$config['smtp_host'] = 'smtp.gmail.com'; // Your SMTP host
					$config['smtp_user'] = 'abhimanyu.geektech@gmail.com'; // Your email address
					$config['smtp_pass'] = 'mtkloecutdwlkzgz'; // Your email password
					$config['smtp_port'] = 587; // SMTP port (Gmail uses 587)
					$config['smtp_crypto'] = 'tls'; // Encryption type
					$config['charset'] = 'utf-8';
					$config['mailtype'] = 'html';
					$config['newline'] = "\r\n";
			
					$this->email->initialize($config);
			
					// Set email parameters
					$this->email->from('abhimanyu.geektech@gmail.com', 'Your Name');
					$this->email->to($email);
					$this->email->subject('Verfication Code By Happiverse');
					$this->email->message($message);
			
					// Send email
					if ($this->email->send()) {
						$this->response(array(
							"status" => DATA_SAVE,
							"message" => DATA_SAVE_MESSAGE,
							"verificationCode"=>$verificationCode,
						// "userId"=>$responseData['userId'],
						), REST_Controller::HTTP_OK);
					} else {
						$this->response(array(
							"status" => DATA_SAVE_ERROR,
							"message" => DATA_SAVE_MESSAGE
						), REST_Controller::HTTP_OK);
					}
                    // $sendMail = sendMail($email,"Verfication Code By Happiverse",$message);
					// if($sendMail){
					// 	// $responseData=$this->UserModel->getUserId($email);
					// 	$this->response(array(
					// 		"status" => DATA_SAVE,
					// 		"message" => DATA_SAVE_MESSAGE,
					// 		"verificationCode"=>$verificationCode,
					// 	// "userId"=>$responseData['userId'],
					// 	), REST_Controller::HTTP_OK);
					// }else{
					// 	$this->response(array(
					// 		"status" => DATA_SAVE_ERROR,
					// 		"message" => DATA_SAVE_ERROR_MESSAGE
					// 	), REST_Controller::HTTP_OK);
					// }
				
                } else {
                    $this->response(array(
                        "status" => DATA_SAVE_ERROR,
                        "message" => DATA_SAVE_MESSAGE
                    ), REST_Controller::HTTP_OK);
                }
                 }else{
                       $this->response(array(
                        "status" => ALREADY_EXIST,
                        "message" => ALREADY_EXIST_MESSAGE,
                        "verificationCode"=>"",
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
