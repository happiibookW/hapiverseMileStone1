
<?php


require APPPATH . 'libraries/REST_Controller.php';

class GetMusic extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('PostModel');
        $this->load->model('AppModel');
        // $haveAccess = array(
        //     'userId' => $this->input->get_request_header('userId'),
        //     // 'token' => $this->input->get_request_header('token'),
        // );
        // if ($this->AppModel->haveaccess($haveAccess) == false) {
        //     $this->response(array(
        //         "status" => UNAUTHORIZED,
        //         "message" => UNAUTHORIZED_MESSAGE
        //     ), REST_Controller::HTTP_UNAUTHORIZED);
        // }
    }

    public function index_post()
    {

        try {
            $client_id = 'ad9393e8e1994b5cb04547eca7e7b368'; 
            $client_secret = 'd5b771386fad4175a1ff6a4baed19859'; 

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,            'https://accounts.spotify.com/api/token' );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt($ch, CURLOPT_POST,           1 );
    curl_setopt($ch, CURLOPT_POSTFIELDS,     'grant_type=client_credentials' ); 
    curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret))); 
    $result=curl_exec($ch); 
    $result = json_decode($result, true);
    curl_close($ch);    
   $barerToken=$result['access_token'];
    //find spotify data
    $spotifyURL = 'https://api.spotify.com/v1/recommendations?limit=10&market=PL&seed_artists=4NHQUGzhtTLFvgF5SZesLK%2C5FF8xJSW4qUVU8bk79KYLT&seed_genres=classical&seed_tracks=0c6xIDDpzE81m2q797ordA%2C2Q9nA56DKKJhj4cHMbHlAS';
    $authorization = 'Authorization: Bearer '.$barerToken;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
    curl_setopt($ch, CURLOPT_URL, $spotifyURL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:x.x.x) Gecko/20041107 Firefox/x.x");
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $json = curl_exec($ch);
    //$json = json_decode($json, true);
    curl_close($ch);
   print_r($json);
    // $spotifyURL_artist = $json['artists'][0]['href'];

    // $ch = curl_init();
    // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
    // curl_setopt($ch, CURLOPT_URL, $spotifyURL_artist);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:x.x.x) Gecko/20041107 Firefox/x.x");
    // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // $json_artist = curl_exec($ch);
    // $data_artist = json_decode($json_artist, true);
    // curl_close($ch);

  

           
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }
}

?>
