<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$siteName="Hapiverse";
if ( ! function_exists('dateformat'))
{
    function  dateformat($date = '')
    {
        $newDate = date("d/m/Y", strtotime($date));
        return $newDate;
    }  
    function siteName(){
        return "Hapiverse";
    }
}
if ( ! function_exists('sendMail')){
	function sendMail($emailTo, $subject, $message) {
		try {
			$ci = &get_instance();
			$ci->load->library('email');
			$ci->config->load('email', TRUE);
			$email_config = $ci->config->item('email');
			
			if (is_array($email_config)) {
				$ci->email->initialize($email_config);
			} else {
				log_message('error', 'Email configuration is not an array.');
				return false;
			}
			
			$ci->email->from('abhimanyu.geektech@gmail.com', 'Happiverse Team');
			$ci->email->to($emailTo);
			$ci->email->cc('abhimanyu.geektech@gmail.com');
			$ci->email->bcc('abhimanyu.geektech@gmail.com');
			$ci->email->subject($subject);
			$ci->email->message($message);
	
			if (!$ci->email->send()) {
				// // Get detailed error message
				// $errorMsg = $ci->email->print_debugger();
				// log_message('error', 'Email failed to send: ' . $errorMsg);
	
				// // Consider removing this in production
				// echo "<pre>Error Sending Email: " . $errorMsg . "</pre>";
				return false;
			}
			return true;
		} catch (\Throwable $th) {
			error_log($th->getMessage());
			// Consider adjusting this for production
			echo "<pre>Error: " . $th->getMessage() . "</pre>";
			return false;
		}
	}
   function getSetting($userId){
       $compae=array(
           "userId"=>$userId
           );
       $CI =& get_instance();
    $CI->load->model('UserModel');

    $membres = $CI->UserModel->fetch($compae,"mstuser");  
    return $membres; 
   }
   	 function fetchProfile($userId,$myId,$userTypeId,$token)
	{
	    if($userTypeId==2){
	         $feedpostapi = base_url() . "index.php/API/v1/business/FetchBusinessProfile/index_post";
	    }else{
	       $feedpostapi = base_url() . "index.php/API/v1/user/FetchUserProfile/index_post";
	    }
	
		$userId = array(
			'userId'  => $userId,
			'myId'=>$myId,
		);
	
		$client = curl_init($feedpostapi);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $userId);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_HTTPHEADER, $token);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response);
		// print_r($result);
		 return $result;
	}
	function fetchData($url,$compare,$header){
	    $feedpostapi = $url;
		
		$client = curl_init($feedpostapi);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $compare);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_HTTPHEADER, $header);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response);
		return $result;
	}
}
