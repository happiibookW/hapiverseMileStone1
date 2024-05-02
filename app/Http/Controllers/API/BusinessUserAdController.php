<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BusinessAd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class BusinessUserAdController extends Controller
{
    public function index($business_id)
    {
        $myAds = BusinessAd::where('businessId', $business_id)->whereIn('status', [1, 2])->get();
        $myad['spent'] = 0;

        return response(['status' => 'Success', 'message' => 'My ads get successfully', 'data' => $myAds], 200);
    }

    public function update(Request $request, $adId)
    {
        $validator = Validator::make(
            $request->all(),
            ['businessId' => 'required']
        );
        if ($validator->fails()) {
            return response([
                'status' => 'Error',
                'message' => 'required fields are missing',
                'error' => $validator->errors()->all()
            ], 422);
        }
        $myad = BusinessAd::find($adId);
        $myad->update($request->all());
        return response(['status' => 'Success', 'message' => 'My ad update successfully'], 200);
    }

    public function delete(Request $request, $adId)
    {
        $validator = Validator::make(
            $request->all(),
            ['businessId' => 'required']
        );
        if ($validator->fails()) {
            return response([
                'status' => 'Error',
                'message' => 'required fields are missing',
                'error' => $validator->errors()->all()
            ], 422);
        }
        $myad = BusinessAd::where('adId', $adId)->where('businessId', $request->businessId);
        $myad->update(['status' => 0]);
        return response(['status' => 'Success', 'message' => 'My ad deleted successfully'], 200);
    }
}
