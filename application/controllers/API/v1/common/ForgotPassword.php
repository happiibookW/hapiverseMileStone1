
<?php


require APPPATH . 'libraries/REST_Controller.php';

class ForgotPassword extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('AuthenticationModel');
		$this->load->library('email');
    }

    public function index_post()
    {

        try {
            $email = $this->input->post('email');
            if ($email != "") {
                $compare = array(
                    "email" => $email,
                );
                $verificationCode = rand(1000, 9999);
                $data = array(
                    "forgotPassword" => 1,
                    "verificationCode" => $verificationCode,
                );
                $profiledata = $this->AuthenticationModel->forgot($data, $compare);
                if ($profiledata == false) {
                    $this->response(array(
                        "status" => NOT_EXIST,
                        "message" => NOT_EXIST_MESSAGE,
                    ), REST_Controller::HTTP_OK);
                } else {
					
					$message="Your verification code is: ".$verificationCode;
					$config['protocol'] = 'smtp';
					$config['smtp_host'] = 'smtp.gmail.com';
					$config['smtp_user'] = 'abhimanyu.geektech@gmail.com';
					$config['smtp_pass'] = 'mtkloecutdwlkzgz';
					$config['smtp_port'] = 587;
					$config['smtp_crypto'] = 'tls';
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
							"status" => MAIL_SENT,
							"message" => MAIL_SENT_MESSAGE,
							"verificationCode"=>$verificationCode,
						), REST_Controller::HTTP_OK);
					} else {
						$this->response(array(
							"status" => DATA_SAVE_ERROR,
							"message" => DATA_SAVE_MESSAGE
						), REST_Controller::HTTP_OK);
					}
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
