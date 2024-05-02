
<?php


require APPPATH . 'libraries/REST_Controller.php';

class PayWithStripe extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('UserModel');
       
    }

    public function index_post()
    {

      require_once('application/libraries/vendor/stripe/stripe-php/init.php');
        try {  
            $tradeManId=$this->input->post("tradeManId");
                $amount =$this->input->post('amount');
                $isPaid=$this->input->post('isPaid');
                $payment_method ="Stripe"; //$_REQUEST['payment_method'];
          
                $currency = "AUD";
                $cardNumber=$this->input->post("cardNumber");
                $exp_month=$this->input->post("exp_month");
                $exp_year=$this->input->post("exp_year");
                $cvc=$this->input->post("cvc");
                $token=$this->input->post("token");
                $customer = '1';
                $apiKey= $this->config->item('stripe_key');

                $curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => "https://api.stripe.com/v1/charges",
    CURLOPT_POST => 1,
    CURLOPT_HTTPHEADER => [
        "Authorization: Bearer " . $apiKey
    ],
    CURLOPT_POSTFIELDS => http_build_query([
        "amount" => $amount,
        "currency" => 'usd',
        "source" => $token,
        "description" => "Testing"
    ])
]);
$resp = curl_exec($curl);
curl_close($curl);
                if ($resp!="" && !empty($resp)) {
                    // $compare=array(
                    //     "tradeManId"=>$tradeManId,
                     
                    //     );
                    //     $dataToSave=array(
                    //         "isPayed"=>$isPaid,
                    //         );
                    // $this->TradeManModel->update($dataToSave,$compare,"chosedplan");
                    $this->response(array(
                        "status" => DATA_SAVE,
                        "message" => DATA_SAVE_MESSAGE,
                        "data" => $resp,
                    ), REST_Controller::HTTP_OK);
                } else {
                    $this->response(array(
                        "status" => DATA_NOT_AVAILABLE,
                        "message" => DATA_NOT_AVAILABLE_MESSAGE,
                       // "data" => $tradedata
                    ), REST_Controller::HTTP_OK);
                }
            // }else{
            //     $this->response(array(
            //         "status" => REQUIRED_FIELDS,
            //         "message" => REQUIRED_FIELDS_MESSAGE
            //     ), REST_Controller::HTTP_OK);
            // }
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }
}

?>
