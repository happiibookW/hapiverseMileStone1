
<?php


require APPPATH . 'libraries/REST_Controller.php';
use Config\Services;
class CreatePost extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('AppModel');
        $this->load->model('PostModel');
        $haveAccess = array(
            'userId' => $this->input->get_request_header('userId'),
            // 'token' => $this->input->get_request_header('token'),
        );
        if ($this->AppModel->haveaccess($haveAccess) == false) {
            $this->response(array(
                "status" => UNAUTHORIZED,
                "message" => UNAUTHORIZED_MESSAGE
            ), REST_Controller::HTTP_UNAUTHORIZED);
        }

    }

    public function index_post()
    {
	
        try {
			$upload_path = "public/postdoc/";
			// Get current year and month
			$currentYear = date('Y');
			$currentMonth = date('m');
			$currentDate = date('d');
			// Check if the upload directory exists, if not, create it
			if (!is_dir($upload_path . $currentYear)) {
				if (!mkdir($upload_path . $currentYear, 0777, true)) {
					echo "Failed to create year directory";
					exit;
				}
			}

			if (!is_dir($upload_path . $currentYear . '/' . $currentMonth)) {
				if (!mkdir($upload_path . $currentYear . '/' . $currentMonth, 0777, true)) {
					echo "Failed to create month directory";
					exit;
				}
			}

            if (!is_dir($upload_path . $currentYear . '/' . $currentMonth. '/'. $currentDate)) {
				if (!mkdir($upload_path . $currentYear . '/' . $currentMonth. '/'.$currentDate, 0777, true)) {
					echo "Failed to create Date directory";
					exit;
				}
			}

			$upload_path = $upload_path . $currentYear . '/' . $currentMonth . '/' . $currentDate.'/';


            $thumbnail="";
            $userId = $this->input->post('userId');
            $caption = $this->input->post('caption');
            $privacy = $this->input->post('privacy');
            $content_type = $this->input->post('content_type');
            $postType = $this->input->post('postType');
            $font_color = $this->input->post('font_color');
            $text_back_ground = $this->input->post('text_back_ground');
            $posted_date = $this->input->post('posted_date');
            $expire_at = $this->input->post('expire_at');
            $interest = $this->input->post('interest');
            $location = $this->input->post('location');
            $active = $this->input->post('active');
            $isBusiness=$this->input->post('isBusiness');
            $postContentText = $this->input->post('postContentText');
            $lastpostId      = $this->PostModel->maxid();
			$postId         = $lastpostId['max_id'] + 1;
            if ($userId != "" && $content_type != "" && $postType != "" ) {

				

				$upload = array(
					"upload_path" => $upload_path,
					"allowed_types" => "*",
					"max_size" => 100000,
					"encrypt_name" => TRUE
				);
				$this->load->library('upload', $upload);
				
				if (isset($_FILES['thumbnail']['name']) && !empty($_FILES['thumbnail']['name'])) {
                    if (!$this->upload->do_upload('thumbnail')) {
                        echo $this->upload->display_errors();
                    } else {
                        $data       = $this->upload->data();
                        $thumbnail = "postdoc/" . $currentYear . '/' . $currentMonth . '/' . $currentDate.'/'. $data['file_name'];
					}
				}
             
                $groupData = array(
                    "postId"=>$postId,
                    "userId" => $userId,
                    "caption" => $caption,
                    "privacy" => $privacy,
                    "content_type" => $content_type,
                    "postType" => $postType,
                    "font_color" => $font_color,
                    "text_back_ground" => $text_back_ground,
                    "posted_date" => $posted_date,
                    "expire_at" => $expire_at,
                    "interest" => $interest,
                    "location" => $location,
                    "active" => $active,
                    "isBusiness" => $isBusiness,
                    "thumbnailUrl" => $thumbnail,
                    "postContentText" =>$postContentText
                );
				
                   $gallaryfile = array();
                    if(isset($_FILES['postFileUrl']['name']) && !empty($_FILES['postFileUrl']['name'])){
                    $count = count($_FILES['postFileUrl']['name']);
                   
                    for ($i = 0; $i < $count; $i++) {
                        
                        if (!empty($_FILES['postFileUrl']['name'][$i])) {
                            
                            $_FILES['file']['name']     = $_FILES['postFileUrl']['name'][$i];
                            $_FILES['file']['type']     = $_FILES['postFileUrl']['type'][$i];
                            $_FILES['file']['tmp_name'] = $_FILES['postFileUrl']['tmp_name'][$i];
                            $_FILES['file']['error']    = $_FILES['postFileUrl']['error'][$i];
                            $_FILES['file']['size']     = $_FILES['postFileUrl']['size'][$i];
                            
                            $config['upload_path']   = $upload_path;
                            $config['allowed_types'] = '*';
                            $config['max_size'] = '5000000';
                            $config['encrypt_name']      = TRUE;
                            $config['file_name']     = $_FILES['postFileUrl']['name'][$i];
                            
                            $this->load->library('upload', $config);
                            
                            if ($this->upload->do_upload('file')) {
                                $uploadData = $this->upload->data();
                                $filename   = array(
                                    'userId' => $userId,
                                    "postId"=>$postId,
                                    "postFileUrl" => "postdoc/" . $currentYear . '/' . $currentMonth . '/'. $currentDate . '/' . $uploadData['file_name']
                                );

								$albumData   = array(
									"albumId"=>$this->input->post('albumId'),
                                    'userId' => $userId,
                                    "imageUrl" => "postdoc/" . $currentYear . '/' . $currentMonth . '/'. $currentDate . '/' . $uploadData['file_name']
                                );

                                $gallaryfile[] = $filename;
                                $albumfile[] = $albumData;
                            }
                        } 
						$this->sendToLaravel($filename['postFileUrl']);
                    }

					$this->PostModel->addalbumfiles($albumfile);
                    $gimage = count($gallaryfile);
					if($gimage > 0) {
						$this->PostModel->addpostfiles($gallaryfile);
					}
                    }
                if ($this->PostModel->insert($groupData, "mstpost") == true) {
                    $this->response(array(
                        "status" => DATA_SAVE,
                        "message" => DATA_SAVE_MESSAGE,
                        "postId"=> $postId
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

	private function sendToLaravel($image)
    {
		$responses = [];
		try {
			
			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => 'https://hapiverse.com/hapiverse/public/api/upload',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => array('image'=> new CURLFILE('https://hapiverse.com/ci_api/public/'.$image)),
			
			));

			$response = curl_exec($curl);
			if ($response === false) {
				echo 'cURL error: ' . curl_error($curl);
			}else{
				$responses[] = $response;
			}
			curl_close($curl);
			
		} catch (\Throwable $th) {
			echo 'Message: ' . $th->getMessage();
		}
    }
}

?>
