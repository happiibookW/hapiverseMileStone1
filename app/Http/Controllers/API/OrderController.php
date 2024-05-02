<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\TrackLocation;


class OrderController extends Controller
{
    public function changeStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'orderId' => 'required',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return response(['status' => 'Error', 'result' => $validator->errors()->all()], 422);
        }

        $order = Order::where('orderId', $request->orderId)->update(['orderStatus' => $request->status]);
        return response(['status_code' => '200', 'status' => 'Success', 'message' => 'Order status updated successfully'], 200);
    }

    
    public function locationSharingDelete($id)
    {
       
        $find = TrackLocation::where('trackLocationId', $id)->first();
        if (empty($find)) {
            return response(['status_code' => '422', 'status' => 'Error', 'message' => 'id not exist'], 422);
        }

        $find->delete();
        return response(['status_code' => '200', 'status' => 'Success', 'message' => 'Location deleted successfully'], 200);
    }

    public function userLocationSharingDelete($userId)
    {
       
        $find = TrackLocation::where('userId', $userId)->get();
        
        foreach ($find as $f) {
            if (empty($f)) {
            return response(['status_code' => '422', 'status' => 'Error', 'message' => 'user not exist'], 422);
        }
            $f->delete();
        }

   
        return response(['status_code' => '200', 'status' => 'Success', 'message' => 'User location deleted successfully'], 200);
    }
}
