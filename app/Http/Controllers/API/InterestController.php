<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserInterest;
use App\Models\Intrest;
use Illuminate\Support\Facades\Auth;
class InterestController extends Controller
{

    public function deleteInterest(Request $req, $id){
        try {
            if($id){
                $getInterest = UserInterest::where('mstUserInterestId',$id)->first();
                if($getInterest){
                    UserInterest::where('mstUserInterestId',$id)->delete();
                    return response(['status_code' => '200','status'=>'Success', 'message' => 'Interest Deleted'], 200);
                }else{
                    return response(['status' => 'Error', 'result' => 'Interest not found'], 422);
                }
                return response(['status' => 'Error', 'result' => 'Id not found'], 422);
            }
        } catch (\Exception $e) {
            return response(['status_code' => '500','status'=>'Server error', 'message' => 'something went wrong'.$e->getMessage()], 500);
        }

    }
}
