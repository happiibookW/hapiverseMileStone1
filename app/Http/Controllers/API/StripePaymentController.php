<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserTransaction;
use Stripe;
use Illuminate\Support\Facades\Validator;
use App\Models\PaymentCard;


class StripePaymentController extends Controller
{
    public function stripePost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'card_no' => 'required',
            'expiry_month' => 'required',
            'expiry_year' => 'required',
            'cvv' => 'required',
            "amount"       => 'required',
            'description' => 'required',
            'email' => 'required',
             'userId' => 'bail',
            'card_holder_name' => 'bail',
        ]);
        if ($validator->fails()) {
            return response(['status' => 'Error', 'message' => 'required fields are missing', 'error' => $validator->errors()->all()], 422);
        }
        $stripe = Stripe\Stripe::setApiKey('sk_test_51LXnxoB5Y8vfZbFaNSoGoMr36waN9Ofh7bML66J2hooS9i92m0p4Th9mbpqldUVqGGM6XCYXcNBa1EKuLJMLEqTH00v0cSIlNS');
        try {

            $response = \Stripe\Token::create(array(
                "card" => array(
                    "number"    => $request->input('card_no'),
                    "exp_month" => $request->input('expiry_month'),
                    "exp_year"  => $request->input('expiry_year'),
                    "cvc"       => $request->input('cvv'),

                )
            ));

            $charge = \Stripe\Charge::create([
                'card' => $response['id'],
                'currency' => 'USD',
                'amount' =>  $request->input('amount') * 100,
                'description' =>  $request->input('description'),
            ]);

            if ($charge['status'] == 'succeeded') {
                $transaction = UserTransaction::create(
                    [
                        'email' => $request['email'],
                        'transaction_id' => $charge['id'],
                        'status' => $charge['status'],
                        'amount' => $request['amount'],
                    ]
                );
                 $cardDetail = PaymentCard::create([
                    'cardNumber' => $request->input('card_no'),
                    'cvc' => $request->input('cvv'),
                    'expiryMonth' => $request->input('expiry_month'),
                    'expiryYear' => $request->input('expiry_year'),
                    'userId' => $request->input('userId'),
                    'cardHolderName'=>$request->input('card_holder_name'),
                ]);
                return response(['status' => 'Success', 'message' => 'successfully charged'], 200);
            } else {
                return 'error';
            }
        } catch (\Stripe\Exception\CardException $e) {
            return array('status' => 'error', 'message' => $e->getError()->message, 'code' => $e->getHttpStatus());
        }
    }
    
    public function addCard(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'card_no' => 'required',
            'expiry_month' => 'required',
            'expiry_year' => 'required',
            'cvv' => 'required',
            'userId' => 'required',
            'card_holder_name' => 'required',
        ]);
        if ($validator->fails()) {
            return response([
                'status' => 'Error',
                'message' => 'required fields are missing',
                'error' => $validator->errors()->all()
            ], 422);
        }
        $check = PaymentCard::where('cardNumber', $request->input('card_no'))->first();
        if (!empty($check)) {
            return array('status' => 'error', 'message' => 'card already exist');
        }
        $cardDetail = PaymentCard::create([
            'cardNumber' => $request->input('card_no'),
            'cvc' => $request->input('cvv'),
            'expiryMonth' => $request->input('expiry_month'),
            'expiryYear' => $request->input('expiry_year'),
            'userId' => $request->input('userId'),
            'cardHolderName' => $request->input('card_holder_name'),
        ]);
        return response(['status' => 'Success', 'message' => 'Card added successfully'], 200);
    }
    
    public function fetchMyCard($userId)
    {
        $userpayment = PaymentCard::where('userId', $userId)->get();
        return response(['status' => 'Success', 'message' => 'successfully fetch cards', 'data' => $userpayment], 200);
    }
}
